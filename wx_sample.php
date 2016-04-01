<?php
/**
 * wechat php test
 */
include_once('wx_template.php');
// define your token
define("TOKEN", "limeng123456789");
$wechatObj = new wechatCallbackapiTest();
//$wechatObj->valid();
$wechatObj->responseMsg();

class wechatCallbackapiTest{
    public function valid(){
        $echoStr = $_GET ["echostr"];

        // valid signature , option
        if($this->checkSignature()){
            echo $echoStr;
            exit ();
        }
    }

    public function responseMsg(){
        // get post data, May be due to the different environments
        $postStr = $GLOBALS ["HTTP_RAW_POST_DATA"];

        // extract post data
        if(!empty ($postStr)){
            /*
             * libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
             * the best way is to check the validity of xml by yourself
             */
            libxml_disable_entity_loader(true);
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $event = $postObj->Event;
            $time = time();
            $textTpl = getTemplate();

            if($event == 'subscribe'){
                $textTpl = getTemplate('subscribe_tw');
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time);
                echo $resultStr;
            }

            if(!empty ($keyword)){
                $msgType = "text";
                $contentStr = 'Come back soon!';
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }else{
                echo "Input something...";
            }
        }else{
            echo "";
            exit ();
        }
    }

    private function checkSignature(){
        // you must define TOKEN by yourself
        if(!defined("TOKEN")){
            throw new Exception ('TOKEN is not defined!');
        }

        $signature = $_GET ["signature"];
        $timestamp = $_GET ["timestamp"];
        $nonce = $_GET ["nonce"];

        $token = TOKEN;
        $tmpArr = array(
            $token,
            $timestamp,
            $nonce
        );
        // use SORT_STRING rule
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if($tmpStr == $signature){
            return true;
        }else{
            return false;
        }
    }
}

?>
