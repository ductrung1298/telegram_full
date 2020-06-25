<?php
if ($_GET['function']=="check_sub_bot")
    if (isset($_GET['phone']) && isset($_GET['bot_id'])) 
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://localhost:2020/check_sub_bot?phone=" . $_GET['phone'] . "&bot_id=" . $_GET['bot_id'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $_SESSION['user_token']
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }
if ($_GET['function'] == "get_list_bot") 
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://localhost:2020/list_bot",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $_SESSION['user_token']
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }
?>