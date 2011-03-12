<?php

$api_key = "cbq1I79DDL8Eec1ctSheVP3psj6YSaPP";

function do_act( $target_url , $type , $data , $cookie_file = NULL)
{
    $ch = curl_init();
    if ($type == 'GET')
    {
        $target_url .= http_build_query( $data );
        curl_setopt($ch, CURLOPT_URL, $target_url );
    }
    else
    {
        curl_setopt($ch, CURLOPT_URL , $target_url);
        curl_setopt($ch, CURLOPT_POST , true);
        curl_setopt($ch, CURLOPT_POSTFIELDS , http_build_query($data));
    }
    if (isset($cookie_file))
    {
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec( $ch );
    curl_close( $ch );
    return $result;
}
$response = (do_act(
    "http://www.plurk.com/API/Realtime/getUserChannel",
    "POST",
    array(
        "api_key"  => "$api_key",
    ),
    "/tmp/plurk_cookie"
));
$response = json_decode($response);
$url = $response->comet_server;
    $response = (do_act(
        "$url",
        "POST",
        array(
            "api_key"  => "$api_key",
        ),
        "/tmp/plurk_cookie"
    ));
    
?>
