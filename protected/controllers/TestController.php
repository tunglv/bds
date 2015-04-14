<?php

    class TestController extends Controller
    {
        /**
        * @link http://anuong.dev/test/soap
        */
        public function actionSoap(){
            $client=new SoapClient('http://anuong.dev/soap/service');
            echo $client->getPrice('GOOGLE');
        }
        /**
        * @link http://anuong.dev/test/sms
        */
        public function actionSms(){
            $client=new SoapClient('http://smsvl.tk/sms/index.php?wsdl');
            $a = $client->insert_data('0989030623', 'test api sms', 5, 'anuong.net', 'eb2b9f2a81dd794454d229b3ab27c3e8', 'en');
            echo '<pre>';print_r($a);echo '</pre>';
        }


        /**
        * @link http://anuong.dev/test/rest
        */
        public function actionRest(){
            Yii::import('ext.Curl');


            //            $curl = new Curl('http://anuong.hehe.vn/api/user/login');
            //            $curl->posts = array(
            //                'username' => 'manhhaiphp@gmail.com',
            //                'password' => '123456',
            //            );




            //            $curl = new Curl('http://anuong.dev/api/feature/getCityByIp?decimal_ip=27.66.136.68');
            $curl = new Curl('http://anuong.hehe.vn/api/search/branch');
            //            $curl = new Curl('http://anuong.dev/api/app/getToken');
            $curl->posts = array(
                'city_id'     => '2',
                'keyword'     => 'cafe',
            );

            //            $curl = new Curl('http://anuong.dev/api/user/createPhone');
            //            $curl->posts = array(
            //                'phone'     => '0987678715',
            //                'password'   => '123456',
            //                'name'   => 'manhhaiphone',
            //            );

            //            $curl = new Curl('http://anuong.dev/api/user/createPhoneVerify');
            //            $curl->posts = array(
            //                'code'     => '9133',
            //            );

            //            $curl = new Curl('http://anuong.dev/api/user/loginOpenid');
            //            $curl->posts = array(
            //                'openid_id'     => 'AItOawle4RLPrzYKGJpSKuLsI6AMcDtEndYqanw',
            //                'openid_service'     => 'GOOGLE',
            //                'email'     => 'manhhaiphp@gmail.com',
            //                'name'     => 'Dao Manh Hai',
            //                'dob'     => '1985-10-03',
            //                'gender'     => 'MALE',
            //            );
            $curl->useAuth = 'test:test';

            $content = $curl->run();

            echo '<pre>';print_r($curl->header);echo '</pre>';
            echo '<pre>';print_r($curl->code);echo '</pre>';
            echo '<pre>';print_r($curl->message);echo '</pre>';
            echo '<pre>';print_r($content);echo '</pre>';die;

            Yii::import('api.extensions.RESTful.RESTCaller');
            $caller = new RESTCaller();
            $caller->httpUsername = 'test';
            $caller->httpPassword = 'test';

            $caller->url = 'http://anuong.dev/api/user/login';
            $data = $caller->post(array(
                'username'     => 'manhhaiphp@gmail.com',
                'password'   => '123456'
            ));
            //            $caller->url = 'http://anuong.dev/api/user/createPhone';
            //            $data = $caller->post(array(
            //                'phone'     => '0987678765',
            //                'password'   => '123456',
            //                'name'   => 'manhhaiphone',
            //            ));


            echo '<pre>'; print_r($caller->code); echo '</pre>';
            echo '<pre>'; print_r($caller->message); echo '</pre>';
            echo '<pre>'; print_r($data); echo '</pre>';
        }




        /**
        * @link http://anuong.dev/test/index
        */        
        public function actionIndex()
        {
            Yii::import('ext.Openssl');

            $password = 'manhhaiphp@gmail.com';
            $priKeyText = '-----BEGIN RSA PRIVATE KEY-----
            Proc-Type: 4,ENCRYPTED
            DEK-Info: DES-EDE3-CBC,985438A848D76328

            JAVfgdlwTb83Ac5dfFEJR+tndWX6VTRGDMBXtOrP9yU6Dr6v7PXd+kphwAEcpDJB
            uefj/FAq1ZWPqsyn2vvV1QAD+EOliQKBGfadhnjyA/emBzlzc2UNbwxwz0i2ssGr
            PVz/Bcw18pBym6q8C452uS+Fna3uxlZf+klIERSj2ckLjp1ENK7HMNgsgxZmEbQk
            zfMEaIokZpu9VaYSEb+YRL1UlAXIK062lHrBD1KdYK8jP4/Gvrvyggb0ZRjxpwqj
            /ZnOOBIJhkQbXPZxYsS6e8dlUqQC02+wfDsrGEfAiJ/tAN7pH2HDgsRPxz5+JQmV
            oR1GazTkaiCb1tAE7jCK7a83ClNM+d7BldqPDWdpUilFiu2gsud9/BeKJawdWw/U
            luo9tM0OzappAF4ApkpaAROIWRqwAlwPS6rFtt/7Fq0gahu+c2woY4aPlLo2hVSe
            vHCeKMQmYuutkOvDsW7xFVuHwAjqfE6wXIXPid54MHJyGL0sY1O+OJ1rZPhN+ehd
            864M/qHEwynMAE76DpArF5ReI3TUyNuK/OWvuwISVsCBF5uMnI/Vf7tSh3WMNe8C
            lmTXVCr6ARtOlYq1OeZgyapHCpupheG4GKrzd5CIszIEhCLhmBliy2JvlU+t+yP/
            njI6JRhW35yWHKVim6QNiSHYLBLwtTyi53oeRncUt3GqsbkYotp/79mTTEPGHKQq
            KmygY0o49ODrujbKVomYTAgLbXZCtTnkL0RjcvQ5n3QYdnZ8/IYWfIadBoFvtP4Y
            SlB/0fH9xRsnpAlwiPpWaUrzcp0BVpfiRdM8mHqJl1GXx8oGT9UigA==
            -----END RSA PRIVATE KEY-----';
            $pubKeyText = '-----BEGIN PUBLIC KEY-----
            MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDD81a/cNldwpecvb/EWGZ5ds4m
            Q1ta5WgKPQa4iDBI7N2rAMhpZ+eIjFb8pgN19Nck701FUn5dcXQ9oUeg2cOSwT5q
            VfPSXV5umCiJot/JrTLbFJORSCC1wvi9Ne7N6RDoogvfnckxAh/2sYAXMbOaMmpO
            Y7iBVSrMkm9IlZMblwIDAQAB
            -----END PUBLIC KEY-----';


            $openssl = new Openssl();

            // genarate keys and insert
            //            list($cert, $priKey, $pubKey) = $openssl->genKeysByCsr($password);
            //            $httpkey = new HttpKey();
            //            $httpkey->name = 'Person name';
            //            $httpkey->dn = json_encode($openssl->dn);
            //            $httpkey->cert = $cert;
            //            $httpkey->pri_key_pw = $password;
            //            $httpkey->pri_key = $priKey;
            //            $httpkey->pub_key = $pubKey;
            //            $httpkey->pub_key_id = uniqid();
            //            $httpkey->insert();
            //            die;



            // encode text
            $plaintext = 'Nhà em có con mèo mướp';
            $encodetext = $openssl->encode($plaintext, $pubKeyText);

            // decode text
            $plaintext2 = $openssl->decode($encodetext, $priKeyText, $password);


            echo '<pre>';print_r($plaintext);echo '</pre>';
            echo '<pre>';print_r($plaintext2);echo '</pre>';
            die;
        }



        /**
        * @link http://anuong.dev/test/solrIndex
        * 
        */
        public function actionSolrIndex(){
            $search = new Search('branch', TRUE);
            $search->removeBranch();die;

            Yii::import('ext.TextParser');

            $branchs = Branch::model()->with('params')->findAll(array(
                'condition' => 'city_id = 2',
                'limit' => 100,
                'order' => 'id ASC',
            ));


            $search->indexBranch($branchs, TRUE);

            die('Index sucessfull!');
        }

        /**
        * @link http://anuong.dev/test/solrSearch
        * 
        */
        public function actionSolrSearch(){
            $search = new Search('branch', TRUE);
            $data = $search->searchBranch(array(
                'city_id' => 2,
                'keyword' => 'cafe',
            ));
            echo '<pre>';print_r($data);echo '</pre>';die;
        }

        public function cropCircle($sourceFile, $destFile){
            //$dims is an array with the width, height, x, y of the region in the rectangular image (whose path on disk is $tempfile)


            $circle = new Imagick();
            $circle->newImage(185.5, 185.5, 'none');
            $circle->setimageformat('png');
            $circle->setimagematte(true);

            $draw = new ImagickDraw();
            $draw->setfillcolor('#ffffff');
            $draw->circle(185.5/2, 185.5/2, 185.5/2, 185.5);
            $circle->drawimage($draw);

            $imagick = new Imagick();
            $imagick->readImage($sourceFile);
            $imagick->setImageFormat( "png" );
            $imagick->setimagematte(true);
            $imagick->cropimage(185.5, 185.5, 253, 0);
            $imagick->compositeimage($circle, Imagick::COMPOSITE_DSTIN, 0, 0);
            $imagick->writeImage($destFile);
            $imagick->destroy();
        }


        /**
        * @link http://anuong.hehe.vn/test/imagick
        * 
        */
        public function actionImagick(){
            $sourceFile = 'upload/test.jpg';
            $destFile = 'upload/test.png';
            $this->cropCircle($sourceFile, $destFile);
            echo "<img src='/{$destFile}'/>";
        }

        /**
        * @link http://anuong.dev/test/wideimage
        * 
        */
        public function actionWideimage($t = 'w'){
            Yii::import('ext.wideimage.lib.WideImage');  

            $w = 900;
            $h = 600;
            $sourceFile = "upload/{$t}.jpg";
            $img = WideImage::load($sourceFile);

            $img = $img->resize(NULL, $h, 'outside', 'down');
            $img = $img->crop('center', 'center', $w, $h);
            
            $img->output('jpg', 90);
        }
    }
