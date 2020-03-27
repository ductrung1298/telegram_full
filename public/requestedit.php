<?php
if ($_POST['TypePage']=='scroll') 
    $NumberPage = $_POST['countPage'];
else
    $NumberPage = $_POST['NumberPage'];
//selectdetail
$arrayselectlist = array();
$select=isset($_POST['select']) ? $_POST['select'] : '';
if (isset($select) && is_array($select))
{
    foreach($select as $i => $detail)
    {
        if (isset($detail) && !empty($detail))
            $arrayselectlist[$i]= json_encode(['select' => $detail]);
    };
};
$name=$_POST['name'];
foreach($name as $i => $detail) {
    if (isset($arrayselectlist[$i]))
    {
        $data=json_decode($arrayselectlist[$i]);
        $data->name=$detail;
        $arrayselectlist[$i]=$data;
    };
};
$type=$_POST['type'];
foreach($type as $i => $detail) {
    if (isset($arrayselectlist[$i]))
    {
        $data=$arrayselectlist[$i];
        $data->type=$detail;
        $arrayselectlist[$i]=$data;
    }
}
//replace text
$arrayselecttext = array();
$selectstring=isset($_POST['string']) ? $_POST['string'] : '';
$stringreplace= isset($_POST['stringreplace']) ? $_POST['stringreplace'] : '';
if (isset($selectstring))
    {
        if (is_array($selectstring))
        {
            foreach($selectstring as $i => $detail)
            {
                if (isset($detail)&& !empty($detail))
                    $arrayselecttext[$i] = json_encode(['string' => $detail]);
            };
            foreach($stringreplace as $a => $detail) {
                if (isset($arrayselecttext[$a]))
                {
                $d=json_decode($arrayselecttext[$a]);
                $d->stringreplace=$detail;
                $arrayselecttext[$a]=$d;
                }
            };
        }
    };
//replace select
$arrayselect = array();
$select=isset($_POST['selectsel']) ? $_POST['selectsel'] : '';
if (isset($select) && is_array($select))
{
    foreach($select as $i => $detail)
    {
        if (isset($detail) && !empty($detail))
            $arrayselect[$i]= json_encode(['select' => $detail]);
    };
};
$name=$_POST['stringreplacesel'];
foreach($name as $i => $detail) {
    if (isset($arrayselect[$i]))
    {
        $data=json_decode($arrayselect[$i]);
        $data->stringreplace=$detail;
        $arrayselect[$i]=$data;
    };
};
$type=$_POST['typesel'];
foreach($type as $i => $detail) {
    if (isset($arrayselect[$i]))
    {
        $data=$arrayselect[$i];
        $data->type=$detail;
        $arrayselect[$i]=$data;
    }
}
//
$body=[
'id' => intval($_GET['id']),
'Url' => isset($_POST['Url']) ? $_POST['Url'] : '',
'Name' => isset($_POST['Name']) ? $_POST['Name'] : '',
'Note' => isset($_POST['Note']) ? $_POST['Note'] : '',
'IdWP' => isset($_POST['WP']) ? $_POST['WP'] : '',
'categories' => isset($_POST['categories']) ? $_POST['categories'] : '',
'author' => isset($_POST['author']) ? $_POST['author'] : '',
'dellink' => ($_POST['deletelink']=='on') ? 1 : 0,
'saveimg' => ($_POST['saveimage']=='on') ? 1 : 0,
'TypePage' => ($_POST['TypePage']=='scroll') ? 1 : 0,
'NumberPage' => $NumberPage,
'SelectLoadMore' => isset($_POST['SelectLoadMore']) ? $_POST['SelectLoadMore'] : '',
'SelectList' => json_encode([ 
    'select' => isset($_POST['selectlist']) ? $_POST['selectlist'] : '',
    'type' => isset($_POST['typelist']) ? $_POST['typelist'] : '',
]),
'SelectDetail' => json_encode($arrayselectlist),
'ReplaceText' => json_encode($arrayselecttext),
'ReplaceSelect' => json_encode($arrayselect),
];
$url='http://192.168.1.13:3000/toolget/updatewebsite';
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
        header('Location: index.php');
    else 
        header('Location: badrequest.php');
        ?>