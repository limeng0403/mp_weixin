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
                            <Title><![CDATA[感谢订阅]]></Title>
                            <Description><![CDATA[回复任意信息查看目录]]></Description>
                            <PicUrl><![CDATA[http://www.limeng.pw/mpweixin/imgs/FED.jpg]]></PicUrl>
                            <Url><![CDATA[http://www.limeng.pw/mpweixin/fed.html]]></Url>
                        </item>
                        </Articles>
                    </xml>";
            break;
        case 'work_list':
            return "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[news]]></MsgType>
                        <ArticleCount>5</ArticleCount>
                        <Articles>
                        <item>
                            <Title><![CDATA[我的博客]]></Title>
                            <Description><![CDATA[个人收集的名家之作，值得细细口味。]]></Description>
                            <PicUrl><![CDATA[http://www.limeng.pw/mpweixin/imgs/blog.jpg]]></PicUrl>
                            <Url><![CDATA[https://github.com/limeng0403/libs/blob/master/README.md]]></Url>
                        </item>
                        <item>
                            <Title><![CDATA[移动网站演示一]]></Title>
                            <Description><![CDATA[模仿淘宝的移动端网页演示]]></Description>
                            <PicUrl><![CDATA[http://www.limeng.pw/mpweixin/imgs/taobao.jpg]]></PicUrl>
                            <Url><![CDATA[http://www.limeng.pw/mobile_personal/index.html]]></Url>
                        </item>
                        <item>
                            <Title><![CDATA[移动网站演示二]]></Title>
                            <Description><![CDATA[点击图标弹出效果演示]]></Description>
                            <PicUrl><![CDATA[http://www.limeng.pw/mpweixin/imgs/tan.jpg]]></PicUrl>
                            <Url><![CDATA[http://www.limeng.pw/mobile_personal/demo1.html]]></Url>
                        </item>
                        <item>
                            <Title><![CDATA[移动网站演示三]]></Title>
                            <Description><![CDATA[3D滑出侧边栏的效果演示]]></Description>
                            <PicUrl><![CDATA[http://www.limeng.pw/mpweixin/imgs/ce_hua.jpg]]></PicUrl>
                            <Url><![CDATA[http://www.limeng.pw/zcool_mobi/index.html]]></Url>
                        </item>
                        <item>
                            <Title><![CDATA[移动网站演示四]]></Title>
                            <Description><![CDATA[animo.js演示]]></Description>
                            <PicUrl><![CDATA[http://www.limeng.pw/mpweixin/imgs/animojs.jpg]]></PicUrl>
                            <Url><![CDATA[http://www.limeng.pw/animo_js/index.html]]></Url>
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
