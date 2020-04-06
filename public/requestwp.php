<?php
session_start();
$body=[
'Url' => ($_POST['typesave']==0) ? $_POST['Url-luu'] : $_POST['Url-web'],
'Name' => isset($_POST['Name']) ? $_POST['Name'] : '',
'username' => isset($_POST['username']) ? $_POST['username'] : '',
'password' => isset($_POST['password']) ? $_POST['password'] : '',
'typesave' => ($_POST['typesave']==1) ? 1 : 0,
'DBName' => isset($_POST['DBName']) ? $_POST['DBName'] : '',
'DBHost' => isset($_POST['DBHost']) ? $_POST['DBHost'] : '',
'socketpath' => isset($_POST['socketpath']) ? $_POST['socketpath'] : '',
];
$url='http://localhost:3000/toolget/addconfigwp';
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
    if ($httpcode==200)
        header('Location: crawb-config.php');
    else 
        header('Location: badrequest.php');
?>