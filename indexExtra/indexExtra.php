<?php
	class wechat{
		private $fromUsername;
		private $toUsername;
		private $times;
		private $keyword;
		
		public function Error_log($log){
			file_put_contents("log.txt",$log,FILE_APPEND);
	}
   
   
		public function valid(){
			$echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

		public function responseMsg(){
		/*$this->fromUsername = "Trpal";
        $this->toUsername = "user";
        $this->keyword = "测试";
        $this->times = time();
		*/
        
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
		$this->Error_log($postStr);
		if (!empty($postStr)){
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $this->fromUsername = $postObj->FromUserName;
                $this->toUsername = $postObj->ToUserName;
                $this->keyword = trim($postObj->Content);
				$this->times = time();
        }else {
        	echo "this a file for weixin API!";
        	exit;
        }
		
    }
	
	//微信封装类,
	//type: text 文本类型, news 图文类型
	//text,array(内容),array(ID)
	//news,array(array(标题,介绍,图片,超链接),...小于10条),array(条数,ID)
	
		public function fun_xml($type,$value_arr,$o_arr=array(0)){
	  //=================xml header============
	   $con="<xml><ToUserName><![CDATA[%s]]></ToUserName>
				<FromUserName><![CDATA[%s]]></FromUserName>
				<CreateTime>%s</CreateTime>
				<MsgType><![CDATA[%s]]></MsgType>";
      $timeStamp=time();
	 $con=sprintf($con,$this->fromUsername,$this->toUsername,$timeStamp,$type);
				
      //=================type content============
	  switch($type){
	  
	    case "text" : 
		  $con.="<Content><![CDATA[{$value_arr[0]}]]></Content>";  
		break;
		
		case "news" : 
		  $con.="<ArticleCount>{$o_arr[0]}</ArticleCount>
		  <Articles>";
		 foreach($value_arr as $id=>$v){
			if($id>=$o_arr[0]) break; else null; //判断数组数不超过设置数
			$con.="<item>
			<Title><![CDATA[{$v[0]}]]></Title>
			<Description><![CDATA[{$v[1]}]]></Description>
			<PicUrl><![CDATA[{$v[2]}]]></PicUrl>
			<Url><![CDATA[{$v[3]}]]></Url>
			</item>";
		 }
		 $con.="</Articles>";  
		break;
		
	  } //end switch
	  
	 //=================end return============
	  return $con."</xml>";
	}
		
		
		
	private function checkSignature()
	{
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];	
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
	}
?>