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
                            <PicUrl><![CDATA[https://wx.44162148.vip/imgs/FED.jpg]]></PicUrl>
                            <Url><![CDATA[https://wx.44162148.vip/fed.html]]></Url>
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
                            <PicUrl><![CDATA[https://wx.44162148.vip/imgs/blog.jpg]]></PicUrl>
                            <Url><![CDATA[https://blog.44162148.vip/]]></Url>
                        </item>
                        <item>
                            <Title><![CDATA[移动网站演示一]]></Title>
                            <Description><![CDATA[模仿淘宝的移动端网页演示]]></Description>
                            <PicUrl><![CDATA[https://wx.44162148.vip/imgs/taobao.jpg]]></PicUrl>
                            <Url><![CDATA[https://wx.44162148.vip/project/mobile_persional/index.html]]></Url>
                        </item>
                        <item>
                            <Title><![CDATA[移动网站演示二]]></Title>
                            <Description><![CDATA[点击图标弹出效果演示]]></Description>
                            <PicUrl><![CDATA[https://wx.44162148.vip/imgs/tan.jpg]]></PicUrl>
                            <Url><![CDATA[https://wx.44162148.vip/project/mobile_persional/demo1.html]]></Url>
                        </item>
                        <item>
                            <Title><![CDATA[移动网站演示三]]></Title>
                            <Description><![CDATA[3D滑出侧边栏的效果演示]]></Description>
                            <PicUrl><![CDATA[https://wx.44162148.vip/imgs/ce_hua.jpg]]></PicUrl>
                            <Url><![CDATA[https://wx.44162148.vip/project/zcool_mobi/index.html]]></Url>
                        </item>
                        <item>
                            <Title><![CDATA[移动网站演示四]]></Title>
                            <Description><![CDATA[animo.js演示]]></Description>
                            <PicUrl><![CDATA[https://wx.44162148.vip/imgs/animojs.jpg]]></PicUrl>
                            <Url><![CDATA[https://wx.44162148.vip/project/animo_js/index.html]]></Url>
                        </item>
                        </Articles>
                    </xml>";
            break;
        case 'weather':
            return "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[news]]></MsgType>
                        <ArticleCount>1</ArticleCount>
                        <Articles>
                        <item>
                            <Title><![CDATA[今日天气]]></Title>
                            <Description><![CDATA[点击查看更多天气信息]]></Description>
                            <PicUrl><![CDATA[https://wx.44162148.vip/weather/mini_%s]]></PicUrl>
                            <Url><![CDATA[https://wx.44162148.vip/weather_detail.html?filename=%s]]></Url>
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
                        <MsgType><![CDATA[text]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        <FuncFlag>0</FuncFlag>
                    </xml>";
    }
}

?>
