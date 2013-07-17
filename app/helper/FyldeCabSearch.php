<?php

include(dirname(__FILE__) . '/../../lib/simplehtmldom/simple_html_dom.php');


function request($url, $params = array()){

    $ch                 = curl_init();

    $options            = array    (
        CURLOPT_URL                 => $url,
        CURLOPT_USERAGENT           => APPLICATION_NAME . " spider",
        //CURLOPT_COOKIESESSION     => TRUE,
        CURLOPT_FOLLOWLOCATION      => TRUE,
        CURLOPT_HEADER              => TRUE,
        CURLOPT_RETURNTRANSFER      => TRUE,
        CURLOPT_SSL_VERIFYPEER      => FALSE,
        CURLINFO_HEADER_OUT         => TRUE,
        CURLOPT_CONNECTTIMEOUT      => 30,
        CURLOPT_TIMEOUT             => 30,
        CURLOPT_MAXREDIRS           => 30,
        CURLOPT_VERBOSE             => TRUE,
        CURLOPT_COOKIEJAR           => __DIR__ . DIRECTORY_SEPARATOR . 'cookies.txt',
        CURLOPT_COOKIEFILE          => __DIR__ . DIRECTORY_SEPARATOR . 'cookies.txt',
        CURLOPT_HTTPHEADER          => array (
            //'Host: licensing.fylde.gov.uk',
            'Pragma:',
            'Expect:',
            'Keep-alive: 115',
            'Connection: keep-alive',
            'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            'Accept-Language: en-us,en;q=0.5',
            //'Accept-Encoding: gzip,deflate',
            'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7',
            'Content-Type: application/x-www-form-urlencoded',
        ),
    );

    if(!empty($params['referrer']))
    {
        $options[CURLOPT_REFERER]       = $params['referrer'];
    }

    if(!empty($params['post']))
    {
        $options[CURLOPT_POST]          = TRUE;
        $options[CURLOPT_POSTFIELDS]    = $params['post'];
    }

    curl_setopt_array($ch, $options);

    $return             = array();
    $return['body']     = curl_exec($ch);
    $info               = curl_getinfo($ch);
    //die(var_dump( curl_getinfo($ch, CURLINFO_HEADER_OUT) ));
    //$return['header']   = http_parse_headers(substr($return['body'], 0, $info['header_size']));
    $return['header']   = substr($return['body'], 0, $info['header_size']);
    $return['body']     = substr($return['body'], $info['header_size']);

    /*if(!empty($return['header']['Location']))
    {
        $params['referrer'] = $url;
        return request($ch, substr($url, 0, strrpos($url, '/')+1) . $return['header']['Location'], $params);
    }*/

    return $return;
}

class FyldeCabSearch{
    public function search($car_registration){

        //https://licensing.fylde.gov.uk/protected/wca/publicRegisterVehicleSearch.jsp
        //https://licensing.fylde.gov.uk/protected/wca/publicRegisterVehicleSearch.jsp
        //protected/actions/PublicRegister.action

        //"/protected/actions/PublicRegister.action"
        $url = "http://licensing.fylde.gov.uk/protected/wca/publicRegisterVehicleSearch.jsp";
        $return = request($url, $params);

        var_dump($return);

        return 1;

    }
}

?>
