<?php
/**
* Class làm việc với Curl.
* - Dùng làm Restfull client:
*   $curl = new Curl('http://abc.com/url');
*   $curl->useAuth = 'username:password';
*   $this->posts = array(
*       'key1' => 'value1',
*       'key2' => 'value2',
*   );
*   // return after run
*   $data = $curl->run();   // data response
*   $this->code;            // http code
*   $this->message;         // http message
*   $this->header;          // http hearder
* 
* - Dùng để lấy dữ liệu:
*   $curl = new Curl('http://abc.com/url');
*   // Nếu cần login: trang cần lấy bắt đăng nhập
*   $curl->login_url = 'http://victim.com/login';
*   $this->login_username = 'usernameField=usernameAcc'  // usernameField là name của input username. usernameAcc: username của trang victim
*   $this->login_password = 'passwordField=passwordAcc'  // passwordField là name của input password. passwordAcc: password của trang victim    
*   
*   $curl
*   // Nếu cần tham số post
*   $this->posts = array(
*       'key1' => 'value1',
*       'key2' => 'value2',
*   );
*   // return after run
*   $data = $curl->run();   // data response
*   $this->code;            // http code
*   $this->message;         // http message
*   $this->header;          // http hearder
* 
*   More: http://php.net/manual/en/function.curl-setopt.php
*/
class Curl {
    // set trực tiếp các thuộc tính trước khi run() nếu cần
    
    public $url = '';
    public $isAuth = FALSE; // request is authentication
    public $accAuth = ''; // basic|digest acc: 'username:password'
    
    public $sslVerify = FALSE;
    
    // login page
    public $login_url = '';
    public $login_username = '';    // usernameField=username
    public $login_password = '';    // passwordField=password
    
    // post params
    public $posts = array();
    
    public $headers = array(
        "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
        "Accept-Language: en-us,en;q=0.5",
        "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7",
        "Keep-Alive: 115",
        "Connection: keep-alive",
    );
    public $cookie          = '';   // set cookie: fruit=apple; colour=red
    public $remoteIp        = '';
    public $proxy           = '';   // ip:port
    public $referer         = '';   // url referer
    public $userAgent       = '';
    public $includeHeader   = FALSE;
    public $noBody          = FALSE;
    
    // attributes return after run()
    public $content             = NULL;
    public $header              = '';
    public $code              = NULL;
    public $message              = NULL;
    
    
    public function __construct($url = ''){
        $this->url = $url;
    }
    
    // set random userAgents
    public function setRandomSearchEngineUserAgent($userAgents = array())
    {
        if(!$userAgents){
            $userAgents = array(
                'Google - Googlebot/2.1 ( http://www.googlebot.com/bot.html)',
                'Google Image - Googlebot-Image/1.0 ( http://www.googlebot.com/bot.html)',
                'MSN Live - msnbot-Products/1.0 (+http://search.msn.com/msnbot.htm)',
                'Yahoo - Mozilla/5.0 (compatible; Yahoo! Slurp; http://help.yahoo.com/help/us/ysearch/slurp)',
            );
        }
        $randKey = array_rand($userAgents, 1);
        $this->userAgent = $userAgents[$randKey];
    }
    
    


    // set $this->header = header trả về sau khi run()
    function setHeaderFunction($curl, $headerStr){
        $this->header .= $headerStr;
        return strlen($headerStr);
    }
    
    // set $this->message = message trả về sau khi run()
    protected function setMessageFunction(){
        $headers = explode("\r\n\r\n", $this->header);
        
        $header = NULL;
        
        $i = count($headers)-1;
        while ($i>=0) {
            $header=trim($headers[$i--]);
            if (!empty($header)) break;
        }

        preg_match('|^\s*HTTP/\d+\.\d+\s+(\d+)\s*(.*\S)|', $header, $m);
        if(isset($m[2])){
            $this->message = $m[2];    
        }
    }
    
    // Chạy Curl
    public function run($url = NULL)
    {
        $url = $url ? $url : $this->url;

        $ch = curl_init();
        
        if($this->accAuth){
            $this->isAuth = TRUE;
            curl_setopt($ch, CURLOPT_USERPWD, $this->useAuth);
        }
        if($this->isAuth){
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);  
        }
                    
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->sslVerify);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
        
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        if($this->remoteIp){
            $this->headers = array_merge($this->headers, array(
                "REMOTE_ADDR: {$this->remoteIp}", 
                "HTTP_X_FORWARDED_FOR: {$this->remoteIp}"
            ));
        }
        if($this->headers)          curl_setopt($ch,CURLOPT_HTTPHEADER, $this->headers); 
        if($this->proxy)            curl_setopt($ch,CURLOPT_PROXY,$this->proxy); 
        if($this->referer)          curl_setopt($ch,CURLOPT_REFERER,$this->referer);
        if($this->userAgent)        curl_setopt($ch,CURLOPT_USERAGENT,$this->userAgent);
        
        if($this->includeHeader)    curl_setopt($ch,CURLOPT_HEADER,true);
        if($this->noBody)           curl_setopt($ch,CURLOPT_NOBODY,true);
        
        if($this->cookie)           curl_setopt($ch,CURLOPT_COOKIE, $this->cookie);           
        
        // login trước  
        if($this->login_url){
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_URL, $this->login_url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "{$this->login_username}&{$this->login_password}");
            //fopen('curl_cookie.txt', 'w');
            //echo is_writable(realpath('curl_cookie.txt')) ? 'writable' : 'not writable'; die;
            curl_setopt($ch, CURLOPT_COOKIEJAR, realpath('curl_cookie.txt'));
            curl_setopt($ch, CURLOPT_COOKIEFILE, realpath('curl_cookie.txt')); 
            curl_exec($ch);
        }

        // lấy dữ liệu
        curl_setopt($ch, CURLOPT_URL, $url);
        if($this->posts){
            if(is_array($this->posts)){
                $this->posts = http_build_query($this->posts, FALSE, '&');
            }
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->posts);
        }
        curl_setopt($ch, CURLOPT_HEADERFUNCTION, array($this, 'setHeaderFunction'));

        $this->content  = curl_exec($ch);

        $this->setMessageFunction();
        $this->code   = curl_getinfo($ch,CURLINFO_HTTP_CODE); 

        curl_close($ch);
        
        return $this->content;
    }
}



