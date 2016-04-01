<?php
//消息回复模板
function getTemplate($type = 'default_wz'){
    switch($type){
        //订阅时回复的消息
        case 'subscribe_tw':
            return "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[news]]></MsgType>
                        <ArticleCount>1</ArticleCount>
                        <Articles>
                        <item>
                            <Title><![CDATA[感谢关注]]></Title>
                            <Description><![CDATA[感谢您的关注]]></Description>
                            <PicUrl><![CDATA[http://77l54v.com1.z0.glb.clouddn.com/FiBZV7Dj_5dyiOPX-rO7iJBcpsss]]></PicUrl>
                            <Url><![CDATA[https://limeng0403.github.io]]></Url>
                        </item>
                        </Articles>
                    </xml>";
            break;
        //默认回复文字消息
        default:
            return "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        <FuncFlag>0</FuncFlag>
                    </xml>";
    }
}

?>
