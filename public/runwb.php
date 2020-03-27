<?php
    $id=$_POST['id'];
    $option=($_POST['select']=='daily')?0:1;
    if (isset($id))
        {
            $url='http://192.168.1.13:3000/toolget/autorun';
                $curl=curl_init($url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_HTTPHEADER, [
                    'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                    'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'Authorization: '.$_SESSION['user_token']
                ]);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
                if ($option==0) 
                {   
                    $time=$_POST['time'];
                    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(["id" => $id, "TypeTime" => $option, "timeautorun" =>$time]));
                            
                }
                else 
                {   $start=$_POST['start'];
                    $end=$_POST['end'];
                    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(["id" => $id, "TypeTime" => $option, "timestart" =>$start, "timestop" =>$end]));
                }
                $response = curl_exec($curl);
                $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
                if ($httpcode==200)
                {
                    header('Location: index.php');
                }
                else 
                {    
                    header('Location: badrequest.php');
                }
                curl_close($curl);
    }
    else header('Location: badrequest.php');
?>