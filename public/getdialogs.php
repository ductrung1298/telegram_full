<?php

    include 'header.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $id=isset($_GET['id'])?intval($_GET['id']):0;
    if ($id != 0) {
        $url = 'http://192.168.1.13:3000/telegram/getdialogs?id='.$id;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'Authorization: '.$_SESSION['user_token']
        ]);
        $response = json_decode(curl_exec($curl), true);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpcode == 500) {
            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'loginerror.php';
            echo("<script>window.location.href='http://". $host.$uri.'/'.$extra."'</script>;");
            exit;
        }
        else if ($httpcode!=200) {
            // header('Location: badrequest.php');
            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'badrequest.php';
            echo("<script>window.location.href='http://". $host.$uri.'/'.$extra."'</script>;");
            exit;
        }
        else {
            $url2='http://192.168.1.13:3000/telegram/getcontact?id='.$id;
            $curl2=curl_init($url2);
            curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl2, CURLOPT_HTTPHEADER, [
                'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'Authorization: '.$_SESSION['user_token']
            ]);
            $response2=json_decode(curl_exec($curl2), true);
            curl_close($curl2);
            $curl3=curl_init('http://192.168.1.13:3000/telegram/getuserid?id='.$id);
            curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl3, CURLOPT_HTTPHEADER, [
                'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'Authorization: '.$_SESSION['user_token']
            ]);
            $response3=json_decode(curl_exec($curl3), true);
            curl_close($curl3);
        }
    } else {
        // header('Location: badrequest.php');
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'badrequest.php';
        echo("<script>window.location.href='http://". $host.$uri.'/'.$extra."'</script>;");
        exit;
    }
?>
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
    <div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
        id="kt_content">
        <!-- begin:: Subheader -->
        <div class="kt-subheader mb-5  kt-grid__item" id="kt_subheader">
            <div class="kt-container ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Tool Telegram </h3>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="add-account-tool-telegram.php" class="kt-subheader__breadcrumbs-link">
                            Tài khoản </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            Tin nhắn </a>
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
                                <a class="nav-link active" data-toggle="tab"
                                    href="#kt_portlet_base_demo_1_1_tab_content" role="tab" aria-selected="true">
                                    <i class="flaticon-profile-1"></i>Gửi cho bạn bè
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_3_tab_content"
                                    role="tab" aria-selected="false">
                                    <i class="flaticon2-group"></i>Gửi cho nhóm chát
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_2_tab_content"
                                    role="tab" aria-selected="false">
                                    <i class="flaticon-earth-globe"></i>Gửi theo danh bạ
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        
                        <div class="row container">
                            <div class="col-12 form-group">
                              <label for="">Nội dung tin nhắn</label>
                              <textarea class="form-control" name="message" id="message"></textarea>
                              <button class="btn mt-2 btn-outline-success btn-sendallmsg"><i class="fa fa-paper-plane"></i> Gửi</button>
                            </div>
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
                        </div>
                        <!-- begin:: Notification 1 -->
                        <div class="tab-pane active " id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">
                                    <h2 class="text-center">Danh sách bạn bè</h2>
                                        <div class="kt-scroll" data-scroll="true" data-height="400" style="height: 400px;">
                                            <div class="kt-list-timeline">
                                                <div class="table-responsive">
                                                    <div class="kt-section__content">
                                                    
                                                        <table class="table table-hover">
                                                        <thead class="thead-light">
                                                            <tr>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Số điện thoại</th>
                                                            <th scope="col">username</th>
                                                            <th scope="col">Nhóm chat</th>
                                                            <th scope="col" class="text-center">Chọn</th>
                                                            </tr>
                                                        </thead>
                                                        <tr>
                                                            <td colspan="4"><span class="kt-link kt-font-boldest">Chọn tất cả</span></td>
                                                            <td><input type="checkbox" id="all-mess-friend" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tbody>
                                                        <?php 
                                                            $curl=curl_init('http://192.168.1.13:3000/telegram/getcontact?id='.$id);
                                                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                                            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                                                                'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                                'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                                                                'Authorization: '.$_SESSION['user_token']
                                                            ]);
                                                            $response=json_decode(curl_exec($curl), true);
                                                            curl_close($curl);
                                                            
                                                            foreach ($response as $index => $msg) {
                                                                {
                                                                echo '<tr>';
                                                                echo '<td><span class="kt-font-bolder">'.$msg['first_name'].' '.(isset($msg['last_name'])?$msg['last_name']:'').'</span></td>
                                                                <td>'.$msg['phone'].'</td>
                                                                <td>'.(isset($msg['username']) ? $msg['username'] : '').'</td>
                                                                <td></td>
                                                                <td><input type="checkbox" class="form-control send-mess-friend" data-type=0 
                                                                    data-user_id='.$msg['id'].' data-access_hash='.$msg['access_hash'].' data-phone='.(isset($msg['phone'])?$msg['phone']:(isset($msg['username'])?$msg['username']:'')).'></td>';
                                                                echo '</tr>';
                                                                }
                                                            }?>
                                                           
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

                        <div class="tab-pane " id="kt_portlet_base_demo_1_3_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">
                                        <span class="kt-section__info">
                                                <h2 class="text-center">Nhóm chat</h2>
                                        </span>
                                        <div class="kt-section__content">
                                            <table class="table table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Tên nhóm</th>
                                                    <th scope="col">Số thành viên</th>
                                                    <th scope="col" class="text-center">Chọn</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td colspan="2"><span class="kt-link kt-font-boldest">Chọn tất cả</span></td>
                                                <td><input type="checkbox" id="all-mess-group" class="form-control">
                                                </td>
                                            </tr>
                                            <?php
                                            $curl2=curl_init('http://192.168.1.13:3000/telegram/getdialogs?id='.$id);
                                            curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
                                            curl_setopt($curl2, CURLOPT_HTTPHEADER, [
                                                'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                                                'Authorization: '.$_SESSION['user_token']
                                            ]);
                                            $response2=json_decode(curl_exec($curl2), true);
                                            curl_close($curl2);

                                            foreach ($response2['chats'] as $index => $msg) {
                                                if ($msg['_']=='channel' || $msg['_']=='chat')
                                                {
                                                    echo '<tr>
                                                    <td>'.$msg['title'].'</td>
                                                    <td></td>
                                                    <td><input type="checkbox" class="form-control send-mess-group" data-type=1 data-chat_id='.$msg['id'].'></td>';
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

                        <!-- begin:: Notification 2  -->
                        <div class="tab-pane " id="kt_portlet_base_demo_1_2_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">
                                        <div class="kt-section__content">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label"><span class="kt-font-transform-u">Danh sách Danh bạ:</span></label>
                                                <div class="col-sm-5">
                                                    <select class="kt-input form-control groupcontact">
                                                        <option value=-1>-Không sử dụng-</option>
                                                        <?php
                                                            $url3='http://192.168.1.13:3000/telegram/getlistgroupcontact?id='.$id;
                                                            $curl3=curl_init($url3);
                                                            curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true);
                                                            curl_setopt($curl3, CURLOPT_HTTPHEADER, [
                                                            'X-RapidAPI-Host:
                                                            contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                                                            'Authorization: '.$_SESSION['user_token']
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
                                                </div>
                                            </div>
                                                    <!-- <tr>
                                                        <td><b>Chọn tất cả</b></td>
                                                        <td><input type="checkbox" id="allmes" class="form-control">
                                                        </td>
                                                    </tr> -->
                                            <div class="kt-scroll" data-scroll="true" data-height="400" style="height: 400px;">
                                            <div class="kt-list-timeline">
                                                <div class="table-responsive">
                                                    <div class="kt-section__content">
                                                    
                                                        <table class="table table-hover">
                                                        <thead class="thead-light">
                                                            <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Số điên thoại</th>
                                                            <th scope="col" class="text-center">chọn</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody  class=" send-mess-directory">
                                                            
                                                        </tbory>
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
    $("#all-mess-friend").click(function() {
        $(".send-mess-friend").prop("checked", $(this).prop("checked"));
    });
    $("#all-mess-group").click(function() {
        $(".send-mess-group").prop("checked", $(this).prop("checked"));
    })
    
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
            $.ajax({
                url: './createapp.php',
                type: "POST",
                data: {
                    "idgroup" : selected,
                    "function": "getlistgroup"
                },
                success: function(data) {
                    let value = JSON.parse(data);
                    let table = $(".send-mess-directory");
                    table.html("");
                    if($.isEmptyObject(value)) {
                        table.append(`<tr><td><span class="kt-font-danger">Không có dữ liệu</span></td></tr>`);
                    } else {
                        table.append(` 
                            <td colspan="3"><span class="kt-link kt-font-boldest">Chọn tất cả</span></td>
                            <td><input type="checkbox" id="all-mess-directory" class="form-control">
                            </td>`
                        );
                        $("#all-mess-directory").click(function() {
                            $(".send-mess-directory").prop("checked", $(this).prop("checked"));
                        })
                        value.forEach(function(item,index) {
                            let tmp = `
                            <tr>
                                <td>
                                    ${index+1}
                                </td>
                                <td>
                                    <span class="kt-font-bolder">
                                    ${item.user_first_name} ${item.user_last_name}
                                    </span>
                                </td>
                                <td>
                                    <span class="kt-font-bolder">
                                    ${item.phone}
                                    </span>
                                </td>
                                <td>
                                    <input type="checkbox" class="form-control send-mess-directory" data-type=0  data-user_id="${item.user_id}" data-access_hash="${item.access_hash}" data-phone="${item.phone}">
                                </td>
                            </tr>`;
                            table.append(tmp);
                        });
                    }
                    
                }
            });
        }
    });
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