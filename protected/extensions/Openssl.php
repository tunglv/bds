<?php
    /**
    * http://www.openssl.org/docs/apps/req.html
    * http://3stepsbeyond.co.uk/2010/12/openssl-and-php-tutorial-part-one/
    * DEMO gen keys:
            Yii::import('ext.Openssl');

            $openssl = new Openssl();
            //$openssl->dn = array();
            $password = 'manhhaiphp@gmail.com';
            list($cert, $pkKey,$pubKey) = $openssl->genKeysByCsr($password);

            $httpkey = new HttpKey();
            $httpkey->name = 'Person name';
            $httpkey->dn = json_encode($openssl->dn);
            $httpkey->cert = $cert;
            $httpkey->pri_key_pw = $password;
            $httpkey->pri_key = $pkKey;
            $httpkey->pub_key = $pubKey;
            $httpkey->insert();
    */
    class Openssl
    {
        //distinguished_name
        public $dn = array();

        public function __construct(){
            $this->dn = array(
                'countryName' => 'VN',
                'stateOrProvinceName' => 'HANOI',
                'localityName' => 'Hà Nội',
                'organizationalUnitName' => 'Vatgia.com',
                'commonName' => 'Ẩm Thực',
                'emailAddress' => 'manhhaiphp@gmail.com',
            );
        }

        public function genKeysByCsr($password = NULL, $keyBit = 1024, $keyType = OPENSSL_KEYTYPE_RSA) {
            $priv_key = openssl_pkey_new(
                array(
                    'private_key_bits' => $keyBit,
                    'private_key_type' => $keyType
                )
            );
            $csr = openssl_csr_new($this->dn, $priv_key);
            $sscert = openssl_csr_sign($csr, null, $priv_key, 365);

            openssl_x509_export($sscert, $cert);
            openssl_pkey_export($priv_key, $pkKey, $password);

            $priv_key_detail = openssl_pkey_get_details($priv_key);
            $pubKey = $priv_key_detail['key'];
            openssl_free_key($priv_key);
            return array($cert, $pkKey,$pubKey);
        }

        public function genKeys($password = NULL, $keyBit = 1024, $keyType = OPENSSL_KEYTYPE_RSA) {
            $priv_key = openssl_pkey_new(
                array(
                    'private_key_bits' => $keyBit,
                    'private_key_type' => $keyType
                )
            );
            openssl_pkey_export($priv_key, $pkKey, $password);
            $priv_key_detail = openssl_pkey_get_details($priv_key);
            $pubKey = $priv_key_detail['key'];
            openssl_free_key($priv_key);
            return array($pkKey, $pubKey);
        }

        public function encode($plaintext, $pubKey) {
            $publicKey = openssl_pkey_get_public($pubKey);
            $encrypted = '';
            $is_encrypt = openssl_public_encrypt($plaintext, $encrypted, $publicKey);
            openssl_free_key($publicKey);
            if(!$is_encrypt) return FALSE;

            return $encrypted;
        }

        public function decode($encrypted, $priKey, $password = NULL){ 
            $priv_key = openssl_pkey_get_private($priKey, $password);
            if(!$priv_key) return FALSE;

            $decrypted = '';
            $is_decrypt = openssl_private_decrypt($encrypted, $decrypted, $priv_key);
            openssl_free_key($priv_key);
            if(!$is_decrypt) return FALSE;

            return $decrypted;
        }

}



