<?php
$id=isset($_GET['id'])?intval($_GET['id']):0;
if ($id!=0)
{
$url='localhost:3000/telegram/getcontact?id='.$id;
    $curl=curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx'
    ]);
    $response=json_decode(curl_exec($curl), true);
    $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
    curl_close($curl);
    if ($httpcode==500)
            header('Location: loginerror.php');
    else if ($httpcode!=200)
        header('Location: badrequest.php');
    else {
        if (isset($_GET['idgroup']))
            $url2='localhost:3000/telegram/getusergroup?id='.$id.'&chat_id='.$_GET['idgroup'];
        else $url2='localhost:3000/telegram/getusergroup?id='.$id.'&channel_id='.$_GET['idchannel'].'&access_hash='.$_GET['access_hash'];
        $curl2=curl_init($url2);
        curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl2, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx'
        ]);
        $response2=json_decode(curl_exec($curl2), true);
        curl_close($curl2);
        include 'header.php';
    }
}
else header('Location: badrequest.php');
        ?>
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
    <div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
        id="kt_content">
        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Tool Telegram </h3>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="index.php" class="kt-subheader__breadcrumbs-link">
                            Crawler </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="telegram.php" class="kt-subheader__breadcrumbs-link">
                            Telegram </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:: Subheader -->
        <!-- begin:: Content -->
        <div class="kt-container  kt-grid__item kt-grid__item--fluid">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-toolbar">
                        <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-success nav-tabs-line-2x" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" href="telegram.php" role="tab" aria-selected="false">
                                    <i class="flaticon-bell"></i>Tài khoản
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab"
                                    href="#kt_portlet_base_demo_1_1_tab_content" role="tab" aria-selected="true">
                                    <i class="flaticon-bell"></i>Thêm vào group
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_2_tab_content"
                                    role="tab" aria-selected="false">
                                    <i class="flaticon-bell "></i> Danh sách thành viên
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <!-- begin:: Notification 1 -->
                        <div class="tab-pane active " id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">
                                        <span class="kt-section__info">
                                            Thêm vào group: <?php echo $response2['chats'][0]['title']?>
                                        </span>
                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="btn btn-success" id="addcontact">Thêm
                                            </button>
                                        </div>
                                        <div class="kt-section__content">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th width="10%">#</th>
                                                        <th width="20%">First_name</th>
                                                        <th width="20%">Last_name</th>
                                                        <th width="10%">Phone_Number</th>
                                                        <th width="5%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                        <td><b>Danh sách nhóm liên hệ</b></td><td></td><td></td><td></td>
                                                        <td style="text-align:center;">
                                                            <select class="kt-input groupcontact">
                                                                <option value=-1>-Không sử dụng-</option>
                                                                <?php
                                                            $url3='localhost:3000/telegram/getlistgroupcontact?id='.$id;
                                                            $curl3=curl_init($url3);
                                                            curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true);
                                                            curl_setopt($curl3, CURLOPT_HTTPHEADER, [
                                                            'X-RapidAPI-Host:
                                                            contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx'
                                                            ]);
                                                            $response3=json_decode(curl_exec($curl3), true);
                                                            $httpcode3=curl_getinfo($curl3,CURLINFO_HTTP_CODE);
                                                            curl_close($curl3);
                                                            if (isset($response3))
                                                            foreach($response3 as $index) {
                                                            echo '<option value='.$index['Id'].'>'.$index['Name'].'
                                                            </option>';
                                                            }
                                                        ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Chọn tất cả</b></td><td></td><td></td><td></td>
                                                        <td><input type="checkbox" id="addallgroup" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>DANH BẠ</b></td><td></td><td></td><td></td>
                                                        <td></td>
                                                    </tr>
                                                    <?php
                                        foreach($response as $index => $contact)
                                        {
                                            echo ' <tr>';
                                                echo '<th scope="row">'.((int)$index+1).'</th>';
                                                echo '<td>'.(isset($contact['first_name'])?$contact['first_name']:'').'</td>';
                                                if (isset($contact['last_name']))
                                                    echo '<td>'.($contact['last_name']).'</td>';
                                                else if (isset($contact['username']))
                                                    echo '<td>'.($contact['username']).'</td>';
                                                else echo '<td></td>';
                                                echo '<td>'.(isset($contact['phone'])?$contact['phone']:'').'</td>';
                                                $check=0;
                                                if ($response2['users'])
                                                foreach ($response2['users'] as $query)
                                                    if ($contact['id']==$query['id']) $check=1;
                                                if ($check==1) echo '<td></td>';
                                                else echo '<td><input type="checkbox" class="form-control" data-user_id='.$contact['id'].' data-access_hash='.$contact['access_hash'].' data-phone='.$contact['phone'].'></td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane " id="kt_portlet_base_demo_1_2_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">
                                        <span class="kt-section__info">
                                            Danh sách thành viên &nbsp;&nbsp;&nbsp;
                                            <button type="button" id="exportfile" class="exportfile">Export CSV  
                                            </button>
                                        </span>
                                        <div class="kt-section__content">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>First_name</th>
                                                        <th>Last_name</th>
                                                        <th>User_name</th>
                                                        <th>Phone_Number</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if ($response2['users'])
                                                    foreach($response2['users'] as $index => $contact)
                                                    {
                                                    echo ' <tr>
                                                        <th scope="row">'.((int)$index+1).'</th>
                                                        <td>
                                                            '.(isset($contact['first_name'])?$contact['first_name']:'').'
                                                        </td>
                                                        <td>
                                                            '.(isset($contact['last_name'])?$contact['last_name']:'').'
                                                        </td>
                                                        <td>
                                                            '.(isset($contact['username'])?$contact['username']:'').'
                                                        </td>
                                                        <td>
                                                            '.(isset($contact['phone'])?$contact['phone']:'').'
                                                        </td>
                                                        </tr>';
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';
        ?>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $("#addallgroup").click(function() {
        $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
    });
    var count = 0;
    $("#addcontact").on("click", function() {
        $("input[type=checkbox]").map(function() {
            if (this.checked) {
                var settings = {
                    "url": "./createapp.php",
                    "method": "POST",
                    "data": {
                        "id": <?php echo $id ?>,
                        "chat_id": <?php echo (isset($_GET['idgroup'])?$_GET['idgroup']:$_GET['idchannel']) ?> ,
                        "user_id": $(this).attr("data-user_id"),
                        "access_hash": $(this).attr("data-access_hash"),
                        "function": "joungroup"
                    }
                };
                $.ajax(settings).done(function(response) {
                    count++;
                });
            }
        })
        alert("Đã thêm " + count + " vào group");
        location.reload();
    });
    $("select.groupcontact").change(function() {
        let selected = $(this).children("option:selected").val();
        if (selected != -1) {
            var settings = {
            "url": "./createapp.php",
            "method": "POST",
            "data": {"idgroup": selected, "function": "getlistgroup"}
            };
            $.ajax(settings).done(function (response) {
                if (response) {
                    response=JSON.parse(response);
                    response.Contacts=JSON.parse(response.Contacts);
                    for(let index of response.Contacts)
                    {
                        $("input[type=checkbox]").map(function() {
                            if (index.phone.slice(0,1)=='+') index.phone=index.phone.slice(1, index.phone.length);
                            if ($(this).attr("data-phone")== index.phone )
                                $(this).prop("checked", true);
                        })
                    }
                }
            });
        }
    })
})
</script>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $("#exportfile").on("click", function() {
        var ok=confirm('Tải xuống danh sách thành viên group?');
        if (ok==true){
        <?php
            $filename="./export/group_id=".$_GET['idgroup']."_".date("Y-m-d").".csv";
            $output=fopen($filename, "w");
            fputs($output, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
            foreach($response2['users'] as $contact) {
                fputcsv($output, array(isset($contact['phone'])?$contact['phone']:'', isset($contact['first_name'])?$contact['first_name']:'', isset($contact['last_name'])?$contact['last_name']:''));
            }
            fclose($output);
            echo 'window.location="'.$filename.'"';
        ?>
        }
    })
})
</script>