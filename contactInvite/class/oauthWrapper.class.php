<?php
	abstract class oauthWrapper {
		
		protected $consumer_key;
        protected $consumer_secret;
        protected $callback_url;
        protected $request_token_url;
        protected $access_token_url;
        protected $sig_method = OAUTH_SIG_METHOD_HMACSHA1;
        protected $auth_type = OAUTH_AUTH_TYPE_AUTHORIZATION;
        
        protected $oauth;
        protected $classname;
        
        public function __construct(){
			
			$provider = $_REQUEST['provider'];
			
			global $domain,$contactinvite_folder;
		
			$this->callback_url = $domain."/".$contactinvite_folder."/handle.php?provider=".$provider;

			if(!class_exists("OAuth",false)){
				throw new Exception("You must install php5-oauth to use this class");
			}
			
			if(!function_exists("curl_init")){
				throw new Exception("You must install php5-curl to use this class");
			}
			
			if(is_null($this->consumer_key)||is_null($this->consumer_secret)){
				throw new Exception("Please specify both the consumer_key and the secret key in you class definition");
			}
			
			if(is_null($this->request_token_url)){
				throw new Exception("Please specifiy a request token url");
			}
			
			if(is_null($this->access_token_url)){
				throw new Exception("Please specifiy a access token url");
			}
			
			if(is_null($this->callback_url)){
				throw new Exception("Please specifiy a callback url");
			}
			
			$this->classname = get_class($this);
			
			$this->oauth = new Oauth($this->consumer_key,$this->consumer_secret,$this->sig_method,$this->auth_type);
			
		}
		
		public function getRequestToken(){
			
			try {
				
				$request_token_info = $this->oauth->getRequestToken($this->request_token_url);
				foreach($request_token_info as $id => $val){
					$_SESSION['oauth'][$this->classname]['request'][$id] = $val;
				}
			
			} catch (OAuthException $E){
				echo "Error : ".$E->getMessage();
				exit;
			}
         
			
		}
		
		public function handleCallback($token){
			
			try {
				
				$this->oauth->setToken($token,$_SESSION['oauth'][$this->classname]['request']['oauth_token_secret']);
			
				$access_token_info = $this->oauth->getAccessToken($this->access_token_url);
			
				foreach($access_token_info as $id => $val){
					$_SESSION['oauth'][$this->classname]['access'][$id] = $val;
				}
				
				return true;
			
			} catch (OAuthException $E){
				return false;
			}
			
		}
		
	}
?>