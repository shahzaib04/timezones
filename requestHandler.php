<?php

function getTimeZoneAccordingly()
{
    $default_time_zone = 'Asia/Karachi';
    try {
        //we are using below API to get user's current timezone and other info.
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://freegeoip.app/json/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "content-type: application/json"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return $default_time_zone;
        } else {
            $response = json_decode($response, true);
            return $response['time_zone'];
        }
    } catch (\Exception $e) {
        return $default_time_zone;
    }
}

function calculateTimeDiffference($db_time, $tz = 'Asia/Karachi', $format = 'ha T')
{
    // Set User Time Zone
    $usersTimezone = new DateTimeZone($tz);

    // Get Date Object by user time zone
    $date = new DateTime($db_time);
    $date->setTimeZone($usersTimezone);

    return $date->format($format);
}

?>
