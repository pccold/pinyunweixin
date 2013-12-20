<?php

define("TOKEN", "tripal");
require_once ($_SERVER['DOCUMENT_ROOT'].'/TASiteInface/TASiteInface.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/indexExtra/indexExtra.php');
$wechatObj = new wechatCallbackapiTest();
$wechatObj->weixin_run(); //执行接收器方法

class wechatCallbackapiTest
{
	public function weixin_run(){
		$indexExtra = new wechat();
		$indexExtra->responseMsg();
		$TASiteRecommodPackage=new TASiteInterface('http://sso.lvbao114.com/WeChartWebService/ServiceEntrance.asmx?wsdl', TAGUID, IsTMS, Template);
		$returnArr=$TASiteRecommodPackage->ConstructArray();
		// print_r($returnArr);
		$returnStr=$indexExtra->fun_xml("news", $returnArr, array(6,0));
		//$this->Error_log($returnStr);
		echo $returnStr;

	}
}

?>