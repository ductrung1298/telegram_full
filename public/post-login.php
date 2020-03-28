<?php

    if (isset($_GET['username']) && isset($_GET['password'])) {
        $body = [
            'username' => $_GET['username'],
            'password' => $_GET['password']
        ];
        $url = 'http://192.168.1.13:3000/auth/signin';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx'
        ]);
        curl_setopt($curl, CURLOPT_POST,1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($body));
        $response = json_decode(curl_exec($curl), true);

        $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpcode==200) {
            session_start();
            $_SESSION["user_token"] = $response['token'];
            $result = [
                "status" => "success",
                "message" => 'Đăng nhập thành công'
            ];
        }
        else {
            $result = [
                "status" => "danger",
                "message" => 'Sai tên tài khoản hoặc mật khẩu'
            ];
        }
    } else {
        $result = [
            "status" => "danger",
            "message" => 'Sai tên tài khoản hoặc mật khẩu'
        ];
    }
    
    echo json_encode($result);
    return;
?>