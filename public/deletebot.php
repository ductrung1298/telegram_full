<?php
session_start();
$id=isset($_GET['id'])?intval($_GET['id']):0;
if ($id!=0)
{
    $url='http://localhost:3000/telbot/deletebot';
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'Authorization: '.$_SESSION['user_token']
        ]);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(["id" => $id]));
        $response = curl_exec($curl);
        $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
        if ($httpcode==200)
            header('Location: list-bot-telegram.php');
        else 
            header('Location: badrequest.php');
        curl_close($curl);
}
else 
    header('Location: badrequest.php');
?>