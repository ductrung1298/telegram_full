<?php
$id=isset($_GET['id'])?intval($_GET['id']):0;
if ($id!=0)
{
    $url='localhost:3000/toolget/stopautorun';
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx'
        ]);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(["id" => $id]));
        $response = curl_exec($curl);
        $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
        if ($httpcode==200)
            header('Location: index.php');
        else 
            header('Location: badrequest.php');
        curl_close($curl);
}
else header('Location: badrequest.php');
?>