<?php

class weatherClass{
    public function createWeather($cityName = '无锡'){
        $fileName = time() . '.jpg';

        $this->createImg($cityName, $fileName);

        return $fileName;
    }

    private function getToken(){
        $url = 'https://api.weixin.qq.com/cgi-bin/token';
        $url = $url . '?grant_type=client_credential';
        $url = $url . '&appid=wx85eb7fd25b8d5bcb';
        $url = $url . '&secret=ed81c345c49eb03aff1167ffd81a189c';

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $str = curl_exec($curl);

        curl_close($curl);

        $json = json_decode($str);

        return $json->access_token;
    }

    private function createImg($cityName = '无锡', $fileName = 'wd.jpg'){
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

        $textcolor = imagecolorallocate($im, 255, 255, 255);
        $fontType = 'msyhbd.ttc';

        if($im){
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

        imagejpeg($im, $fileName);

        $im = imagecreatefromjpeg('weather_mini.jpg');

        if($im){
            imagettftext($im, 18, 0, 10, 34, $textcolor, $fontType, $city . ' ' . $pinyin);
            imagettftext($im, 14, 0, 10, 74, $textcolor, $fontType, '今日：' . $weather);
            imagettftext($im, 14, 0, 10, 104, $textcolor, $fontType, '温度：' . $h_tmp . '-' . $l_tmp . '℃');
            imagettftext($im, 14, 0, 10, 134, $textcolor, $fontType, '风向：' . $WD);
            imagettftext($im, 14, 0, 10, 164, $textcolor, $fontType, '风速：' . $WS);
        }

        imagejpeg($im, 'mini_' . $fileName);

        return true;
    }
}

