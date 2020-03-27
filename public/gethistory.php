<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$id=isset($_GET['id'])?intval($_GET['id']):0;
$type=isset($_GET['type'])?intval($_GET['type']): 0;
$chat_id=(isset($_GET['chat_id'])?(!empty($_GET['chat_id'])?intval($_GET['chat_id']):0):0);
$user_id=(isset($_GET['user_id'])?(!empty($_GET['user_id'])?intval($_GET['user_id']):0):0);
$channel_id=(isset($_GET['channel_id'])?(!empty($_GET['channel_id'])?intval($_GET['channel_id']):0):0);
$access_hash=(isset($_GET['access_hash'])?(!empty($_GET['access_hash'])?intval($_GET['access_hash']):0):0);
if ($id!=0) {
$url='http://192.168.1.13:3000/telegram/getHistory?id='.$id.'&type='.$type.'&chat_id='.$chat_id.'&user_id='.$user_id.'&access_hash='.$access_hash.'&channel_id='.$channel_id;
$curl=curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'Authorization: '.$_SESSION['user_token']
    ]);
    $response=json_decode(curl_exec($curl), true);
    $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
    curl_close($curl);
    if ($httpcode==500)
        header('Location: loginerror.php');
    else if ($httpcode!=200)
        header('Location: badrequest.php');
    else {
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
                                <a class="nav-link active" data-toggle="tab" role="tab" aria-selected="true">
                                    <i class="flaticon-bell"></i>Tin nhắn
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="row ">
                        <div class="kt-section col-12">
                            <div class="kt-section__content">
                                <?php
                                    if ($user_id !=0 && $access_hash!=0 )
                                    {
                                        $user=curl_init('http://192.168.1.13:3000/telegram/getinfobyuserid?id='.$id.'&user_id='.$user_id.'&access_hash='.$access_hash);
                                        curl_setopt($user, CURLOPT_RETURNTRANSFER, true);
                                        curl_setopt($user, CURLOPT_HTTPHEADER, [
                                            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'Authorization: '.$_SESSION['user_token']
                                        ]);
                                        $info=json_decode(curl_exec($user), true);
                                        curl_close($user);
                                        if (isset($info) && isset($info['first_name'])) 
                                            echo '<label><font color="#33ccff"><b><big>'.$info['first_name'].'</big></b></font></label>';
                                        }
                                    else if ($chat_id!=0 ) {
                                        $urlgroup='http://192.168.1.13:3000/telegram/getusergroup?id='.$id.'&chat_id='.$chat_id;
                                        $curlgroup=curl_init($urlgroup);
                                        curl_setopt($curlgroup, CURLOPT_RETURNTRANSFER, true);
                                        curl_setopt($curlgroup, CURLOPT_HTTPHEADER, [
                                            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'Authorization: '.$_SESSION['user_token']
                                        ]);
                                        $group=json_decode(curl_exec($curlgroup), true);
                                        curl_close($curlgroup);
                                        if (isset($group) && isset($group['chats'][0]['title']))
                                            echo '<label><font color="#33ccff"><b><big>'.$group['chats'][0]['title'].'</big></b></font></label>';
                                    }
                                        ?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="40%"></th>
                                            <th width="40%"></th>
                                            <th width="13%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="message"
                                                    placeholder="Nội dung tin nhắn">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sendmsg">Gửi</button>
                                            </td>

                                        </tr>
                                        <tr>
                                                        <td>
                                                        <div class="form-group">
                                                        <lable>Tùy chọn gửi tin:</lable>
                                                            <select class="kt-input form-control col-lg-12 type-time">
                                                                <option value="0">Gửi một lần</option>
                                                                <option value="1">Gửi theo chu kì</option>
                                                            </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                        <div class="row form-group">
                                                            <div class="sendone col-lg-5 display-block" style="display:none;">
                                                                <lable>Thời gian gửi tin: </lable>
                                                                <input type="datetime-local"
                                                                    class="form-control time-send-msg" name="time-send-msg">
                                                            </div>
                                                            <div class="sendauto col-lg-12 row" style="display:none;">
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
                                        <?php
                                        $curl2=curl_init('http://192.168.1.13:3000/telegram/getuserid?id='.$id);
                                        curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
                                        curl_setopt($curl2, CURLOPT_HTTPHEADER, [
                                            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'Authorization: '.$_SESSION['user_token']
                                        ]);
                                        $response2=json_decode(curl_exec($curl2), true);
                                        curl_close($curl2);
                                        foreach($response as $index => $msg)
                                        {
                                            echo ' <tr>';
                                            if (!empty($msg['from_id']) && $msg['from_id']==$response2['user_id']) 
                                            {
                                                echo '<td></td>';
                                                if (isset($msg['message']) && $msg['message']!='') 
                                                    echo '<td style="text-align:right;" bgcolor="#e6f2ff">'.str_replace("<","&lt;",$msg['message']).'</td>';
                                                else if (isset($msg['media']) && $msg['media']['_']!='')
                                                    echo '<td style="text-align:right;" bgcolor="#e6f2ff">'.$msg['media']['_'].'</td>';
                                                else if (isset($msg['action']) && $msg['action']['_']!='')
                                                    echo '<td style="text-align:right;" bgcolor="#e6f2ff">'.$msg['action']['_'].'</td>';
                                            }
                                            else 
                                            {
                                                if (isset($msg['message']) && $msg['message']!='') 
                                                    echo '<td style="text-align:left;" bgcolor="#f0f5f5">'.str_replace("<","&lt;",$msg['message']).'</td>';
                                                else if (isset($msg['media']) && $msg['media']['_']!='')
                                                    echo '<td style="text-align:left;" bgcolor="#f0f5f5">'.$msg['media']['_'].'</td>';
                                                else if (isset($msg['action']) && $msg['action']['_']!='')
                                                    echo '<td style="text-align:left;" bgcolor="#f0f5f5">'.$msg['action']['_'].'</td>';
                                                echo '<td></td>';
                                            }
                                            echo '<td>'.date("d/M/Y h:i:s",$msg['date']).'</td>';
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
        </div>
    </div>
</div>
<?php include 'footer.php';
        ?>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $(".btn-sendmsg").on("click", function() {
        $(".btn-sendmsg").hide();
        $.ajax({
            type: "POST",
            url: "./createapp.php",
            data: {
                <?php echo '
                "id" : '.$_GET['id'].',
                "type": '.$_GET['type'].',
                "chat_id": '.(isset($_GET['chat_id'])?(!empty($_GET['chat_id'])?$_GET['chat_id']:0):0).',
                "user_id": '.(isset($_GET['user_id'])?(!empty($_GET['user_id'])?$_GET['user_id']:0):0).',
                "access_hash": '.(isset($_GET['access_hash'])?(!empty($_GET['access_hash'])?$_GET['access_hash']:0):0).','; ?>
                "message": $("input[name=message]").val(),
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
                if (response) {
                location.reload();
            } else alert("Đã xảy ra lỗi. Vui lòng thử lại sau");
            }
        });
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