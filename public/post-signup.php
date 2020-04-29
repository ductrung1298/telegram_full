<?php

    if (isset($_GET['username']) && isset($_GET['password']) && isset($_GET['fullname']) && isset($_GET['repassword'])) {
        $body = [
            'username' => $_GET['username'],
            'password' => $_GET['password'],
            'fullname' => $_GET['fullname'],
            'repassword' => $_GET['repassword'],
        ];
        $url = 'http://localhost:2020/auth/signup';
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
            $result = [
                "status" => "success",
                "message" => 'Đăng kí thành công'
            ];
        }
        else if ($httpcode==403) {
            $result = [
                "status" => "danger",
                "message" => 'Tên đăng nhập đã tồn tại'
            ];
        }
        else 
        {
            $result = [
                "status" => "danger",
                "message" => 'Vui lòng nhập đúng và đủ nội dung yêu cầu'
            ];
        }
    } else {
        $result = [
            "status" => "danger",
            "message" => 'Vui lòng nhập đúng và đủ nội dung yêu cầu'
        ];
    }
    echo json_encode($result);
    return;
?>