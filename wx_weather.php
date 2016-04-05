<?php

function createImg(){
    $url = 'http://apis.baidu.com/apistore/weatherservice/cityname';
    $params = '?cityname=无锡';

        // create a new cURL resource
        $ch = curl_init();

        // set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, $url . $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'apikey:b9879e5e82c630b8de50e26b1759db30'
        ));

        // grab URL and pass it to the browser
        $json = json_decode(curl_exec($ch), true);

        // close cURL resource, and free up system resources
        curl_close($ch);

        if($json && $json['retData']){
            $city = $json['retData']['city'];
            $pinyin = $json['retData']['pinyin'];
            $date = $json['retData']['date'];
            $weather = $json['retData']['weather'];
            $l_tmp = $json['retData']['l_tmp'];
            $h_tmp = $json['retData']['h_tmp'];
            $WD = $json['retData']['WD'];
            $WS = $json['retData']['WS'];
        $sunrise = $json['retData']['sunrise'];
        $sunset = $json['retData']['sunset'];
    }

    $im = imagecreatefromjpeg('weatherbg.jpg');

    if($im){
        $textcolor = imagecolorallocate($im, 255, 255, 255);
        $fontType = 'msyhbd.ttc';

        imagettftext($im, 24, 0, 50, 50, $textcolor, $fontType, $city);
        imagettftext($im, 24, 0, 126, 55, $textcolor, $fontType, $pinyin);
        imagettftext($im, 18, 0, 50, 100, $textcolor, $fontType, $date);
        imagettftext($im, 18, 0, 50, 150, $textcolor, $fontType, '天气：' . $weather);
        imagettftext($im, 18, 0, 50, 200, $textcolor, $fontType, '最高温度：' . $h_tmp . '℃');
        imagettftext($im, 18, 0, 50, 250, $textcolor, $fontType, '最低温度：' . $l_tmp . '℃');
        imagettftext($im, 18, 0, 50, 300, $textcolor, $fontType, '风向：' . $WD);
        imagettftext($im, 18, 0, 50, 350, $textcolor, $fontType, '风速：' . $WS);
        imagettftext($im, 18, 0, 50, 400, $textcolor, $fontType, '日出时间：' . $sunrise);
        imagettftext($im, 18, 0, 50, 450, $textcolor, $fontType, '日落时间：' . $sunset);
        imagettftext($im, 10, 0, 50, 550, $textcolor, $fontType, '数据来源：百度API天气');
    }

    Header('Content-Type: image/jpeg');
    imagejpeg($im);
}