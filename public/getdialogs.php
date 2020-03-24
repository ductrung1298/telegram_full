<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$id=isset($_GET['id'])?intval($_GET['id']):0;
if ($id!=0)
{
$url='localhost:3000/telegram/getdialogs?id='.$id;
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
    else
    if ($httpcode!=200)
        header('Location: badrequest.php');
    else {
        $url2='localhost:3000/telegram/getcontact?id='.$id;
        $curl2=curl_init($url2);
        curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl2, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx'
        ]);
        $response2=json_decode(curl_exec($curl2), true);
        curl_close($curl2);
        $curl3=curl_init('localhost:3000/telegram/getuserid?id='.$id);
        curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl3, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx'
        ]);
        $response3=json_decode(curl_exec($curl3), true);
        curl_close($curl3);
        include 'header.php';
    }
} else header('Location: badrequest.php');
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
                                    <i class="flaticon-bell"></i>Tin nhắn
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_2_tab_content"
                                    role="tab" aria-selected="false">
                                    <i class="flaticon-bell"></i>Gửi cho tất cả
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
                                            Tin nhắn user
                                        </span>
                                        <div class="kt-section__content">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">#</th>
                                                        <th width="15%">Date</th>
                                                        <th width="50%">Message</th>
                                                        <th width="10%">From</th>
                                                        <th width="10%">To</th>
                                                        <th width="10%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $int=0;
                                        foreach($response['messages'] as $msg)
                                        {
                                            if ($msg['to_id']['_']=='peerUser')
                                        {
                                            $int++;
                                            echo ' <tr>
                                                <th scope="row">'.$int.'</th>';
                                            echo '
                                                <td>'.date("Y-m-d H:i:s",$msg['date']).'</td>' ;
                                                $from=''; $to=''; $access_hash='';
                                                foreach($response2 as $index => $contact) {
                                                    if ($contact['id']==$msg['from_id']) 
                                                    {
                                                        $user_id=$contact['id'];
                                                        $access_hash=$contact['access_hash'];
                                                        $from=$contact['first_name'].' '.(isset($contact['last_name'])?str_replace("<","&lt;",$contact['last_name']):'');
                                                    }
                                                    else if ($msg['from_id']==$response3['user_id']) $from="ME";
                                                    else if ($msg['from_id']==777000) 
                                                    {
                                                        $from="TELEGRAM";
                                                        $user_id=$msg['from_id'];
                                                    }
                                                    else 
                                                    {
                                                        $user_id=$msg['from_id'];
                                                    }
                                                    if ($contact['id']==$msg['to_id']['user_id']) 
                                                    {
                                                        $user_id=$contact['id'];
                                                        $access_hash=$contact['access_hash'];
                                                        $to=$contact['first_name'].' '.(isset($contact['last_name'])?str_replace("<","&lt;",$contact['last_name']):'');
                                                    }
                                                    else if ($msg['to_id']['user_id']==$response3['user_id']) $to="ME";
                                                    else if ($msg['to_id']['user_id']==777000) 
                                                    {
                                                        $to="TELEGRAM";
                                                        $user_id=$msg['to_id']['user_id'];
                                                    }
                                                    else {
                                                        $user_id=$msg['to_id']['user_id'];
                                                    }
                                                }
                                                if ($from=='') $from="Hệ thống";
                                                if ($to=='') $to="Hệ thống";
                                                if ($from=="Hệ thống" || $to=="Hệ thống")
                                                {
                                                    echo '<td>'.(isset($msg['message'])?(str_replace("<","&lt;",$msg['message'])):$msg['action']['_']).'</td>
                                                    <td><label>'.$from.'</label></td>
                                                    <td><label>'.$to.'<label></td>
                                                    <td></td>
                                                    </tr>';
                                                }
                                                else
                                                echo '
                                                <td><a href="gethistory.php?id='.$id.'&type=0&user_id='.$user_id.'&access_hash='.$access_hash.'">'.(isset($msg['message'])?(str_replace("<","&lt;",$msg['message'])):$msg['action']['_']).'</a></td>
                                                <td><label>'.$from.'</label></td>
                                                <td><label>'.$to.'<label></td>
                                                <td><span>
                                                    <a title="Gửi tin nhắn" href="gethistory.php?id='.$id.'&type=0&user_id='.$user_id.'&access_hash='.$access_hash.'" class="btn btn-sm btn-clean btn-icon btn-icon-sm"><i class="fas fa-sms"></i></a>
                                                </span></td>
                                            </tr>';
                                        }
                                    }
                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit">
                                                </div>
                                        <span class="kt-section__info">
                                            Tin nhắn group
                                        </span>
                                        <div class="kt-section__content">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">#</th>
                                                        <th width="15%">Date</th>
                                                        <th width="50%">Message</th>
                                                        <th width="20%">Title</th>
                                                        <th width="10%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $count=0;
                                        foreach($response['chats'] as $msg)
                                        {
                                            if ($msg['_']=='chat') {
                                                $count++;
                                            echo ' <tr>';
                                                echo '<th scope="row">'.$count.'</th>';
                                            echo '
                                                <td><label>'.date("Y-m-d H:i:s",$msg['date']).'</label></td>
                                                ';
                                                $text='';
                                                foreach($response['messages'] as $index => $content)
                                                {
                                                    if ($content['to_id']['_']=='peerChat')
                                                        if ($msg['id']==$content['to_id']['chat_id']) 
                                                            $text=isset($content['message'])?str_replace("<","&lt;",$content['message']):'';
                                                }
                                                if ($text=='') echo '<td></td>';
                                                else echo '<td><a href="gethistory.php?id='.$id.'&type=1&chat_id='.$msg['id'].'">'.$text.'</a></td>';
                                                echo '
                                                <td><label>'.$msg['title'].'</label></td>
                                                <td><span>
                                                    <a title="Trò chuyện" href="gethistory.php?id='.$id.'&type=1&chat_id='.$msg['id'].'" class="btn btn-sm btn-clean btn-icon btn-icon-sm"><i class="fas fa-sms"></i></a>
                                                    <a title="Thêm vào nhóm" href="joingroup.php?id='.$id.'&idgroup='.$msg['id'].'" class="btn btn-sm btn-clean btn-icon btn-icon-sm"><i class="fas fa-user-plus"></i></a>
                                                </span></td>
                                            </tr>';
                                            }
                                            else if ($msg['_']=='channel') {
                                                $count++;
                                                echo ' <tr>
                                                <th scope="row">'.$count.'</th>
                                                <td><label>'.date("Y-m-d H:i:s",$msg['date']).'</label></td>
                                                ';
                                                $text='';
                                                foreach($response['messages'] as $index => $content)
                                                {
                                                    if ($content['to_id']['_']=='peerChannel')
                                                        if ($msg['id']==$content['to_id']['channel_id']) 
                                                            $text=isset($content['message'])?str_replace("<","&lt;",$content['message']):'';
                                                }
                                                if ($text=='') echo '<td></td>';
                                                else echo '<td><a href="gethistory.php?id='.$id.'&type=2&channel_id='.$msg['id'].'&access_hash='.$msg['access_hash'].'">'.$text.'</a></td>';
                                                echo '
                                                <td><label>'.$msg['title'].'</label></td>
                                                <td><span>
                                                    <a title="Trò chuyện" href="gethistory.php?id='.$id.'&type=2&channel_id='.$msg['id'].'&access_hash='.$msg['access_hash'].'" class="btn btn-sm btn-clean btn-icon btn-icon-sm"><i class="fas fa-sms"></i></a>
                                                    <a title="Thêm vào nhóm" href="joingroup.php?id='.$id.'&idchannel='.$msg['id'].'&access_hash='.$msg['access_hash'].'" class="btn btn-sm btn-clean btn-icon btn-icon-sm"><i class="fas fa-user-plus"></i></a>
                                                </span></td>
                                            </tr>';
                                            }
                                        }
                                        ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- begin:: Notification 2  -->
                        <div class="tab-pane " id="kt_portlet_base_demo_1_2_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">
                                        <div class="kt-section__content">
                                            <table class="table borderless">
                                                <thead>
                                                    <tr>
                                                        <th width="20%"></th>
                                                        <th width="10%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <textarea id="message" rows="5" cols="100" class="form-control"
                                                                placeholder="Nội dung tin nhắn"></textarea>
                                                        </td>
                                                        <td>
                                                            <button type="button"
                                                                class="btn btn-success btn-sendallmsg">Gửi</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table class="table borderless">
                                                <thead>
                                                    <tr>
                                                        <th width="20%"></th>
                                                        <th width="80%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                        <div class="form-group">
                                                        <lable>Tùy chọn gửi tin:</lable>
                                                            <select class="kt-input form-control col-lg-10 type-time">
                                                                <option value="0">Gửi một lần</option>
                                                                <option value="1">Gửi theo chu kì</option>
                                                            </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                        <div class="row form-group">
                                                            <div class="sendone col-lg-3 display-block" style="display:none;">
                                                                <lable>Thời gian gửi tin: </lable>
                                                                <input type="datetime-local"
                                                                    class="form-control time-send-msg" name="time-send-msg">
                                                            </div>
                                                            <div class="sendauto row" style="display:none;">
                                                                <lable>Kiểu gửi tin: </lable>
                                                                <select class="kt-input form-control type-autosend">
                                                                    <option value="0">Daily</option>
                                                                    <option value="1">Date to Date</option>
                                                                </select>
                                                                <div class="form-group date-to-date" style="display:none;">
                                                                    <label>Date to Date:</label>
                                                                    <div class="row">
                                                                    <div class="input-daterange input-group col-9"
                                                                        id="kt_datepicker_5">
                                                                        <input type="text" class="form-control col-lg-10" name="start"
                                                                            placeholder="Từ ngày" autocomplete="off">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i
                                                                                    class="la la-ellipsis-h"></i></span>
                                                                        </div>
                                                                        <input type="text" class="form-control col-lg-10" name="end"
                                                                            placeholder="Đến ngày" autocomplete="off">
                                                                       
                                                                    </div>
                                                                    <div class="input-group col-3">
                                                                            <input class="form-control" type="time" name="at">
                                                                        </div>
                                                                        </div>
                                                                </div>
                                                                <div class="daily form-group display-block"
                                                                    style="display:none;">
                                                                    <label>Tự động chạy sau (Giờ):</label>
                                                                    <input type="text" class="form-control" name="time"
                                                                        placeholder="Giờ">
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                                    <?php
                                        $curl2=curl_init('localhost:3000/telegram/getdialogs?id='.$id);
                                        curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
                                        curl_setopt($curl2, CURLOPT_HTTPHEADER, [
                                            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx'
                                        ]);
                                        $response2=json_decode(curl_exec($curl2), true);
                                        curl_close($curl2);

                                        $curl=curl_init('localhost:3000/telegram/getcontact?id='.$id);
                                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                        curl_setopt($curl, CURLOPT_HTTPHEADER, [
                                            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx'
                                        ]);
                                        $response=json_decode(curl_exec($curl), true);
                                        curl_close($curl);
                                        ?>
                                        <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th width="20%"></th>
                                                        <th width="80%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><b>Danh sách nhóm liên hệ</b></td>
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
                                                            echo '<option value='.$index['Id'].'>'.str_replace("<","&lt;",$index['Name']).'
                                                            </option>';
                                                            }
                                                        ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Chọn tất cả</b></td>
                                                        <td><input type="checkbox" id="allmes" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>DANH BẠ</b></td>
                                                        <td></td>
                                                    </tr>
                                                    <?php 
                                        foreach ($response as $index => $msg)
                                        {
                                            {
                                                echo '<tr>';
                                                echo '<td>'.$msg['first_name'].' '.(isset($msg['last_name'])?$msg['last_name']:'').'</td><td><input type="checkbox" class="form-control" data-type=0 
                                                    data-user_id='.$msg['id'].' data-access_hash='.$msg['access_hash'].' data-phone='.(isset($msg['phone'])?$msg['phone']:(isset($msg['username'])?$msg['username']:'')).'></td>';
                                                echo '</tr>';
                                            }
                                        }?>
                                                    <tr>
                                                        <td><b>GROUP</b></td>
                                                        <td></td>
                                                    </tr>
                                                    <?php
                                        foreach ($response2['chats'] as $index => $msg) {
                                            if ($msg['_']=='channel' || $msg['_']=='chat')
                                            {
                                                echo '<tr>
                                                <td>'.$msg['title'].'</td><td><input type="checkbox" class="form-control" data-type=1 data-chat_id='.$msg['id'].'></td>';
                                                echo '</tr>';
                                            }
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
<?php
        include 'footer.php';
        ?>
<script type="text/javascript">
jQuery(document).ready(function($) {
    // check all
    $("#allmes").click(function() {
        $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
    });
    //send msg
    $(".btn-sendallmsg").click(function() {
        var count = 0;
        $(this).hide()
        $("input[type=checkbox]").map(function() {
            if (this.checked && $(this).attr("data-type")) {
                $.ajax({
                    url: "./createapp.php",
                    type: "POST",
                    async: false,
                    data: {
                        "id": <?php echo $id; ?> ,
                        "type" : $(this).attr("data-type"),
                        "chat_id": $(this).attr("data-chat_id"),
                        "user_id": $(this).attr("data-user_id"),
                        "access_hash": $(this).attr("data-access_hash"),
                        "message": $("textarea#message").val(),
                        "type_time": (($(".type-time").val()==1)?1:0),
                        "time_send_one": $(".time-send-msg").val(),
                        "type_send_auto": (($(".type-autosend").val()==1)?1:0),
                        "time_start": $("input[name=start]").val(),
                        "time_stop": $("input[name=end]").val(),
                        "at": $("input[name=at]").val(),
                        "hours":Number($("input[name=time]").val()),
                        "function": "sendMessage"
                    },
                    success: function(response) {
                        if (response) count++;
                    }
                });
                $(this).prop("checked", false);
            }
        })
        $(this).show();
        if ($(".type-time").val() ==1)
            alert("Lên lịch thành công " + count + " tin nhắn");
        else
            alert("Gửi thành công " + count + " tin nhắn");
        $("textarea#message").val("");
        $("input[name=time]").val("");
        $("input[name=at]").val("");
        $("input[name=start]").val("");
        $("input[name=end]").val("");
        $(".time-send-msg").val("");
    });
    //group contact
    $("select.groupcontact").change(function() {
        let selected = $(this).children("option:selected").val();
        if (selected != -1) {
            var settings = {
                "data": { "idgroup": selected, "function": "getlistgroup"},
                "type": "POST",
                "url": "./createapp.php"
            };
            $.ajax(settings).done(function(response) {
                if (response) {
                    response=JSON.parse(response);
                    response.Contacts = JSON.parse(response.Contacts);
                    for (let index of response.Contacts) {
                        $("input[type=checkbox]").map(function() {
                            if (index.phone.slice(0, 1) == '+') index.phone = index.phone.slice(1, index.length);
                            if ($(this).attr("data-phone") == index.phone)
                                $(this).prop("checked", true);
                        })
                    }
                }
            });
        }
    })
    $(".type-time").change(function() {
        let selected=$(this).children("option:selected").val();
        if (selected==0) {
            $('.sendauto').removeClass('display-block');
            $('.sendone').addClass('display-block');
        }
        else if (selected==1) {
            $('.sendone').removeClass('display-block');
            $('.sendauto').addClass('display-block');
        }
    })
    $('.type-autosend').change(function() {
        let selected=$(this).children("option:selected").val();
        if (selected==0) {
            $('.date-to-date').removeClass('display-block');
            $('.daily').addClass('display-block');
        }
        else if (selected==1) {
            $('.daily').removeClass('display-block');
            $('.date-to-date').addClass('display-block');
        }
    })
})
</script>