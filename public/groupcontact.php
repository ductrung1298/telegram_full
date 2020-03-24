<?php
$id=isset($_GET['id'])?intval($_GET['id']):0;
$user=isset($_GET['user'])?intval($_GET['user']):0;
if ($id!=0 && $user!=0)
{
$url='localhost:3000/telegram/getlistgroupcontact?idgroupcontact='.$id;
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
    else 
        include 'header.php';
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
                                    <i class="flaticon-bell"></i>Nhóm người dùng
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_2_tab_content"
                                    role="tab" aria-selected="false">
                                    <i class="flaticon-bell"></i>Thêm người dùng vào nhóm
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active " id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">
                                        <span class="kt-section__info">
                                            Nhóm người dùng: <?php 
                                                echo $response['Name'];
                                            ?>
                                        </span>
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
                                                            <textarea id="message" rows="5" cols="100"
                                                                class="form-control"
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
                                                                <select
                                                                    class="kt-input form-control col-lg-10 type-time">
                                                                    <option value="0">Gửi một lần</option>
                                                                    <option value="1">Gửi theo chu kì</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="row form-group">
                                                                <div class="sendone col-lg-3 display-block"
                                                                    style="display:none;">
                                                                    <lable>Thời gian gửi tin: </lable>
                                                                    <input type="datetime-local"
                                                                        class="form-control time-send-msg"
                                                                        name="time-send-msg">
                                                                </div>
                                                                <div class="sendauto row" style="display:none;">
                                                                    <lable>Kiểu gửi tin: </lable>
                                                                    <select class="kt-input form-control type-autosend">
                                                                        <option value="0">Daily</option>
                                                                        <option value="1">Date to Date</option>
                                                                    </select>
                                                                    <div class="form-group date-to-date"
                                                                        style="display:none;">
                                                                        <label>Date to Date:</label>
                                                                        <div class="row">
                                                                            <div class="input-daterange input-group col-9"
                                                                                id="kt_datepicker_5">
                                                                                <input type="text"
                                                                                    class="form-control col-lg-10"
                                                                                    name="start" placeholder="Từ ngày"
                                                                                    autocomplete="off">
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i
                                                                                            class="la la-ellipsis-h"></i></span>
                                                                                </div>
                                                                                <input type="text"
                                                                                    class="form-control col-lg-10"
                                                                                    name="end" placeholder="Đến ngày"
                                                                                    autocomplete="off">

                                                                            </div>
                                                                            <div class="input-group col-3">
                                                                                <input class="form-control" type="time"
                                                                                    name="at">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="daily form-group display-block"
                                                                        style="display:none;">
                                                                        <label>Tự động chạy sau (Giờ):</label>
                                                                        <input type="text" class="form-control"
                                                                            name="time" placeholder="Giờ">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <span class="kt-section__info">
                                            Danh sách thành viên:
                                        </span>
                                        <div class="kt-section__content">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>First_name</th>
                                                        <th>Last_name</th>
                                                        <th>Phone_Number</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $url2='localhost:3000/telegram/getlistusergroup?id='.$user.'&group='.$id;
                                                    $curl2=curl_init($url2);
                                                    curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
                                                    curl_setopt($curl2, CURLOPT_HTTPHEADER, [
                                                        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx'
                                                    ]);
                                                    $response2=json_decode(curl_exec($curl2), true);
                                                    $httpcode2=curl_getinfo($curl2,CURLINFO_HTTP_CODE);
                                                    curl_close($curl2);
                                                    foreach($response2 as $index => $contact)
                                                    {
                                                    echo ' <tr>
                                                        <th scope="row">'.((int)$index+1).'</th>
                                                        <td>
                                                            <label>
                                                                '.(isset($contact['user_first_name'])?$contact['user_first_name']:'').'
                                                            </label>
                                                        </td>';
                                                        echo '<td>
                                                            <label>'.(isset($contact['user_last_name'])?$contact['user_last_name']:'').'</label>
                                                        </td>';
                                                        echo '<td>
                                                            <label>'.(isset($contact['phone'])?$contact['phone']:'').'
                                                            </label>
                                                        </td>';
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
                                            Thêm người dùng vào nhóm: <?php 
                                                echo $response['Name'];
                                            ?>
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
                                                        <td><b>Chọn tất cả</b></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><input type="checkbox" id="addallgroup"
                                                                class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>DANH BẠ</b></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <?php
                                                $url3='localhost:3000/telegram/getcontact?id='.$user;
                                                $curl3=curl_init($url3);
                                                curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true);
                                                curl_setopt($curl3, CURLOPT_HTTPHEADER, [
                                                    'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                    'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx'
                                                ]);
                                                $response3=json_decode(curl_exec($curl3), true);
                                                $httpcode3=curl_getinfo($curl3,CURLINFO_HTTP_CODE);
                                                curl_close($curl3);
                                                $count=0;
                                                foreach($response3 as $index => $contact)
                                                {
                                                    $check=0;
                                                    if ($response2)
                                                        foreach ($response2 as $query)
                                                            if ($contact['phone']==$query['phone']) $check=1;
                                                    if ($check==0) 
                                                    {
                                                        $count++;
                                                        echo '<tr>';
                                                        echo '<th scope="row">'.$count.'</th>';
                                                        echo '<td>'.(isset($contact['first_name'])?$contact['first_name']:'').'</td>';
                                                        echo '<td>'.(isset($contact['last_name'])?$contact['last_name']:'').'</td>';
                                                        echo '<td>'.(isset($contact['phone'])?$contact['phone']:'').'</td>';
                                                        echo '<td><input type="checkbox" class="form-control" data-phone='.$contact['phone'].' data-user_id='.$contact['id'].
                                                        ' data-first_name="'.$contact['first_name'].'" data-last_name="'.(isset($contact['last_name'])?$contact['last_name']:'').'" data-access_hash='.$contact['access_hash'].'></td>';
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
<?php include 'footer.php'; ?>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $("#addallgroup").click(function() {
        $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
    });
    $(".type-time").change(function() {
        let selected = $(this).children("option:selected").val();
        if (selected == 0) {
            $('.sendauto').removeClass('display-block');
            $('.sendone').addClass('display-block');
        } else if (selected == 1) {
            $('.sendone').removeClass('display-block');
            $('.sendauto').addClass('display-block');
        }
    })
    $('.type-autosend').change(function() {
        let selected = $(this).children("option:selected").val();
        if (selected == 0) {
            $('.date-to-date').removeClass('display-block');
            $('.daily').addClass('display-block');
        } else if (selected == 1) {
            $('.daily').removeClass('display-block');
            $('.date-to-date').addClass('display-block');
        }
    })
    $(".btn-sendallmsg").click(function() {
        var count = 0;
        $(this).hide();
        var contacts = <?php echo json_encode($response2,JSON_UNESCAPED_UNICODE) ?> ;
        var count = 0;
        for (let contact of contacts) {
            $.ajax({
                url: "./createapp.php",
                type: "POST",
                async: false,
                data: {
                    "function": "sendMessage",
                    "id": <?php echo $user; ?> ,
                    "type" : "0",
                    "chat_id": "",
                    "user_id": contact.user_id,
                    "access_hash": contact.access_hash,
                    "message": $("textarea#message").val(),
                    "type_time": (($(".type-time").val() == 1) ? 1 : 0),
                    "time_send_one": $(".time-send-msg").val(),
                    "type_send_auto": (($(".type-autosend").val() == 1) ? 1 : 0),
                    "time_start": $("input[name=start]").val(),
                    "time_stop": $("input[name=end]").val(),
                    "at": $("input[name=at]").val(),
                },
                success: function(data) {
                    count++;
                }
            })
        }
        alert("Đã gửi thành công " + count + " tin nhắn");
        location.reload();
    })
    $("#addcontact").on("click", function() {
        var count=0;
        $("input[type=checkbox]").map(function() {
            if (this.checked && $(this).attr('data-user_id')) {
                $.ajax({
                    url: "./createapp.php",
                    type: "POST",
                    async: false,
                    data: {
                        "function": "pushgroupcontact",
                        "id": <?php echo $user; ?>,
                        "group": <?php echo $id; ?>,
                        "user_id": $(this).attr('data-user_id'),
                        "first_name": $(this).attr('data-first_name'),
                        "last_name": $(this).attr('data-last_name'),
                        "access_hash": $(this).attr('data-access_hash'),
                        "phone": $(this).attr('data-phone')
                    },
                    success: function(data) {
                        if (data==1)
                        count++;
                    }
            })
        }
        })
        if (count!=0)
        {
            alert("Đã thêm thành công "+ count+" vào group chat");
            location.reload();
        }
        else alert("Đã xảy ra lỗi, vui lòng thử lại sau"); 
    })
})
</script>