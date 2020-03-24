<?php

$arraycontact = array();
$phone=isset($_POST['phone']) ? $_POST['phone'] : '';
if (isset($phone) && is_array($phone))
{
    foreach($phone as $i => $p)
    {
        if (isset($p) && !empty($p))
            $arraycontact[$i]= json_encode(['phone' => $p]);
    };
};
$firstname=$_POST['first_name'];
foreach($firstname as $i => $first) {
    if (isset($arraycontact[$i]))
    {
        $data=json_decode($arraycontact[$i]);
        $data->first_name=$first;
        $arraycontact[$i]=$data;
    };
};
$lastname=$_POST['last_name'];
foreach($lastname as $i => $last) {
    if (isset($arraycontact[$i]))
    {
        $data=$arraycontact[$i];
        $data->last_name=$last;
        $arraycontact[$i]=$data;
    }
};
//add contact from file
if (isset($_FILES["myfile"])) {
    $filename= $_FILES['myfile']['tmp_name'];
    if ($_FILES['myfile']['size'] > 0 && $_FILES['myfile']['size'] < 10*1024*1024) {
        $file=fopen($filename, 'r');
        while (!feof($file)) 
        {
            $column=fgetcsv($file);
            if (!empty($column[$_POST['index_phone']-1]))
                array_push($arraycontact,(['phone' => $column[$_POST['index_phone']-1], 'first_name' => (!empty($column[$_POST['index_firstname']-1])?$column[$_POST['index_firstname']-1]:''), 'last_name' => (!empty($column[$_POST['index_lastname']-1])?$column[$_POST['index_lastname']-1]:'')]));
        }
    }
}
if ($_POST['groupcontact']==0)
    $body=[
    'id' => isset($_POST['id']) ? intval($_POST['id']): '',
    'contacts' => json_encode($arraycontact),
    'idgroupcontact' => $_POST['groupcontact'],
    'namegroupcontact' => isset($_POST['name_group'])?$_POST['name_group']:'',
    ];
else 
    $body=[
        'id' => isset($_POST['id']) ? intval($_POST['id']): '',
        'contacts' => json_encode($arraycontact),
        'idgroupcontact' => $_POST['groupcontact'],
        ];
$url='localhost:3000/telegram/importcontact';
    $curl=curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx'
    ]);
    curl_setopt($curl, CURLOPT_POST,1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($body));
    $response = curl_exec($curl);
    $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
    curl_close($curl);
    if ($httpcode==200)
        header('Location: getcontact.php?id='.intval($_POST['id']));
    else if ($httpcode==500) 
        header('Location: loginerror.php');
    else 
        header('Location: badrequest.php');
?>