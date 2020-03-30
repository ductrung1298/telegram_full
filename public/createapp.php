<?php
    session_start();
    if ($_POST['function']=="addaccount") {
        $body=[
            'phone'=> $_POST['phone'],
            'api_hash' => $_POST['api_hash'],
            'api_id' => $_POST['api_id']
        ];
        $url='http://192.168.1.13:3000/telegram/add_user_telegram';
        $curl=curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'Authorization: '.$_SESSION['user_token']
        ]);
        curl_setopt($curl, CURLOPT_POST,1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($body));
        $response = json_decode(curl_exec($curl), true);
        $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpcode==200) 
            echo $response['id'];
        else if($httpcode==405) {
            echo 0;
        }
        else echo null;
    }
    if ($_POST['function']=="requestSendCode") {
        $body=[
            'phone'=> $_POST['phone']
        ];
        $url='http://192.168.1.13:3000/telegram/request_send_code';
        $curl=curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'Authorization: '.$_SESSION['user_token']
        ]);
        curl_setopt($curl, CURLOPT_POST,1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($body));
        $response = json_decode(curl_exec($curl), true);
        $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpcode==200) 
            echo $response['id'];
        else if($httpcode==403) {
            echo 0;
        } else if($httpcode==406) {
            echo -1;
        }
        else echo null;
    }
    if ($_POST['function']=="authcode") {
        $body=[
            'id'=> $_POST['id'],
            'code' => $_POST['code'],
        ];
        $url='http://192.168.1.13:3000/telegram/send_code';
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'Authorization: '.$_SESSION['user_token']
        ]);
        curl_setopt($curl, CURLOPT_POST,1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($body));
        $response = curl_exec($curl);
        $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpcode==200) echo "success";
        else echo null;
    }
    if ($_POST['function']=="addbot") {
        $body=[
            "token" => $_POST['token'],
        ];
        $url="http://192.168.1.13:3000/telbot/addbot";
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'Authorization: '.$_SESSION['user_token']
        ]);
        curl_setopt($curl, CURLOPT_POST,1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($body));
        $response = curl_exec($curl);
        $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpcode==200) echo "success";
        else if ($httpcode==202) echo "exist";
        else echo null;
    }
    if ($_POST['function']=="updatebot") {
        $body=[
            "id" => $_POST['id'],
            "idbaocao" => $_POST['idbaocao'],
            "greeting" => $_POST['greeting'],
            "greeting2" => $_POST['greeting2'],
            "invitation" => $_POST['invitation'],
            "connect" => $_POST['connect'],
            "autosendmsg" => $_POST['autosendmsg'],
        ];
        $url="http://192.168.1.13:3000/telbot/updatebot";
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'Authorization: '.$_SESSION['user_token']
        ]);
        curl_setopt($curl, CURLOPT_POST,1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($body));
        $response = curl_exec($curl);
        $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpcode==200) echo "success";
        else echo null;
    }
    if ($_POST['function']=="sendMessage") {
        $body=[
            "id" => $_POST['id'],
            "type" => $_POST['type'],
            "chat_id" => $_POST['chat_id'],
            "user_id" => $_POST['user_id'],
            "access_hash" => $_POST['access_hash'],
            "message"=> $_POST['message'],
            "type_time"=> $_POST['type_time'],
            "time_send_one"=> $_POST['time_send_one'],
            "type_send_auto"=> $_POST['type_send_auto'],
            "time_start"=> $_POST['time_start'],
            "time_stop"=> $_POST['time_stop'],
            "at"=> $_POST['at'],
            "hours"=> $_POST['hours'],
        ];
        $url="http://192.168.1.13:3000/telegram/send_message";
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'Authorization: '.$_SESSION['user_token']
        ]);
        curl_setopt($curl, CURLOPT_POST,1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($body));
        $response = curl_exec($curl);
        $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpcode==200) echo "success";
        else echo null;
    }
    if ($_POST['function']=="getlistgroup") {
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://192.168.1.13:3000/telegram/get_contact?idgroupcontact=" . $_POST['idgroup'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            'Authorization: '.$_SESSION['user_token']
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
    if ($_POST['function']=="joingroup") {
        $body=[
            "id" => $_POST['id'],
            "chat_id" => $_POST["chat_id"],
            "user_id" => $_POST["user_id"],
            "access_hash" => $_POST["access_hash"]
        ];
        $url="http://192.168.1.13:3000/telegram/add_friend_to_group_chat";
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'Authorization: '.$_SESSION['user_token']
        ]);
        curl_setopt($curl, CURLOPT_POST,1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($body));
        $response = curl_exec($curl);
        $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpcode==200) echo "success";
        else echo null;
    }
    if ($_POST['function']=="pushgroupcontact") {
        $body=[
            "id" => $_POST['id'],
            "group" => $_POST["group"],
            "user_id" => $_POST['user_id'],
            "first_name" => $_POST['first_name'],
            "last_name"=> $_POST['last_name'],
            "access_hash" => $_POST['access_hash'],
            "phone"=> $_POST['phone']
        ];
        $url="http://192.168.1.13:3000/telegram/add_friend_to_contact";
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'Authorization: '.$_SESSION['user_token']
        ]);
        curl_setopt($curl, CURLOPT_POST,1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($body));
        $response = json_decode(curl_exec($curl));
        $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpcode==200) echo '1';
        else echo '0';
    }
    if ($_POST['function']=="addgroupcontact") {
        $body=[
            "id" => $_POST['id'],
            "name" => $_POST["name"],
        ];
        $url="http://192.168.1.13:3000/telegram/add_contact";
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'Authorization: '.$_SESSION['user_token']
        ]);
        curl_setopt($curl, CURLOPT_POST,1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($body));
        $response=curl_exec($curl);
        $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpcode==200) echo '1';
        else echo null;
    }
?>