<?php
    session_start();
    if ($_POST['function']=="addaccount") {
        $body=[
            'phone'=> $_POST['phone'],
            'api_hash' => $_POST['api_hash'],
            'api_id' => $_POST['api_id']
        ];
        $url='http://localhost:2020/telegram/add_user_telegram';
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
        $url='http://localhost:2020/telegram/request_send_code';
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
        $url='http://localhost:2020/telegram/send_code';
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
        $url="http://localhost:2020/telbot/addbot";
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
            "textbaocao" => $_POST['textbaocao'],
            "greeting" => $_POST['greeting'],
            "greeting2" => $_POST['greeting2'],
            "textketnoi" => $_POST['textketnoi'],
            "invitation" => $_POST['invitation'],
            "connect" => $_POST['connect'],
            "autosendmsg" => $_POST['autosendmsg'],
            "btn_inline" => $_POST['btn_inline'],
        ];
        $url="http://localhost:2020/telbot/updatebot";
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
            "idcontact" => $_POST['idcontact']
        ];
        $url="http://localhost:2020/telegram/send_message";
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
        CURLOPT_URL => "http://localhost:2020/telegram/get_contact?idgroupcontact=" . $_POST['idgroup'],
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
        $url="http://localhost:2020/telegram/add_friend_to_contact";
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
            "describe" => isset($_POST["describe"])?$_POST["describe"]:"",
        ];
        $url="http://localhost:2020/telegram/add_contact";
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
    if ($_POST['function']=="get_list_user_group") {
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://localhost:2020/telegram/get_user_in_group_chat?id=" . $_POST['id'].'&chat_id='.$_POST['chat_id'],
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
        $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpcode==200)
            echo $response;
        else echo null;
    }
    if ($_POST['function']=="export_user_in_group") {
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://localhost:2020/telegram/get_user_in_group_chat?id=" . $_POST['id'].'&chat_id='.$_POST['chat_id'],
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
        $response = json_decode(curl_exec($curl), true);
        $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpcode==200)
        {
            $filename="./export/contact_id=".$_POST['id']."_".date("Y-m-d")."_group_chat.csv";
            $output=fopen($filename, "w");
            fputs($output, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
            foreach($response['users'] as $contact) {
                fputcsv($output, array(isset($contact['phone'])?$contact['phone']:'', isset($contact['first_name'])?$contact['first_name']:'', isset($contact['last_name'])?$contact['last_name']:'', isset($contact['username'])?$contact['username']:''));
            }
            fclose($output);
            echo $filename;
        }
        else echo null;
    }
    if ($_POST['function']=="export_user_in_contact") {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://localhost:2020/telegram/get_list_user_in_contact?id=" . $_POST['id'].'&group='.$_POST['idcontact'],
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
        $response= json_decode(curl_exec($curl), true);
        $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpcode==200)
        {
            $filename="./export/contact_id=".$_POST['id']."_".date("Y-m-d")."_group_chat.csv";
            $output=fopen($filename, "w");
            fputs($output, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
            foreach($response as $contact) {
                fputcsv($output, array(isset($contact['phone'])?$contact['phone']:'', isset($contact['user_first_name'])?$contact['user_first_name']:'', isset($contact['user_last_name'])?$contact['user_last_name']:''));
            }
            fclose($output);
            echo $filename;
        }
        else echo null;
    }
    
    if ($_POST['function']=='add_friend_tel_from_contact') 
    {
        $body=[
            "id" => $_POST['id'],
            "idgroup" => $_POST["idcontact"],
        ];
        $url="http://localhost:2020/telegram/add_friend_from_contact";
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'Authorization: '.$_SESSION['user_token']
        ]);
        curl_setopt($curl, CURLOPT_POST,1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($body));
        $response=json_decode(curl_exec($curl), true);
        $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpcode==200) echo $response['length'];
        else echo null;
    }
    if ($_POST['function']=='add_group_chat_telegram') {
        $body=[
            "id" => $_POST['id'],
            "id_group_chat" => $_POST["id_group_chat"],
            "id_contact" => $_POST["id_contact"],
        ];
        $url="http://localhost:2020/telegram/add_contact_to_group_chat";
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
        if ($httpcode==200) echo $response;
        else echo null;
    }
    if ($_POST['function']=="createbot") {
        $body=[
            "namebot" => $_POST["namebot"],
            "usernamebot" => $_POST["usernamebot"],
        ];
        $url="http://localhost:2020/telegram/create_bot";
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
        if ($httpcode==200) $result = [
            "res" => "success",
            "api" => $response
        ];
        else $result = [
            "res" => "error",
            "api" => $response
        ];
        echo json_encode($result);
    }
    if ($_POST['function']=="forwardbot") {
        $body=[
            "id" =>$_POST['id'],
            // "from" =>  $_POST['from'],
            // "to" => $_POST['to'],
            // "typeto" => $_POST['typeto'],
            // "typesend" => $_POST['typesend'],
            // "countdown" => $_POST['countdown'],
            "list_forward" => $_POST['list_forward'],
        ];
        $url="http://localhost:2020/telbot/forwardmsg";
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
        if ($httpcode==200) echo 'success';
        else echo null;
    }
    if ($_POST['function']=="commandbot") {
        $body=[
            "id" =>$_POST['id'],
            "content" => $_POST['content'],
        ];
        $url="http://localhost:2020/telbot/config_command_bot";
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
        if ($httpcode==200) echo 'success';
        else echo null;
    }
?>