<?php
$id=isset($_GET['id'])?intval($_GET['id']):0;
$user=isset($_GET['user'])?intval($_GET['user']):0;
include 'header.php';
if ($id!=0 && $user!=0) {
    $url='http://192.168.1.13:3000/telegram/get_contact?idgroupcontact='.$id;
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

    include 'connection.php';
    $group = new Connection();
    $value = $group->connect('telegram/get_contact?idcontact='.$id);

    if ($httpcode==500)
            header('Location: loginerror.php');
    else if ($httpcode!=200)
        header('Location: badrequest.php');
    }
    else header('Location: badrequest.php');
?>
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
    <div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
        id="kt_content">
        <!-- begin:: Subheader -->
        <div class="kt-subheader mb-5 kt-grid__item" id="kt_subheader">
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
                        <a href="getcontact.php?id=<?php echo $user; ?>" class="kt-subheader__breadcrumbs-link">
                            Danh bạ </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            quản lý danh bạ </a>
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
                                    <i class="flaticon2-group"></i>Danh bạ
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_2_tab_content"
                                    role="tab" aria-selected="false">
                                    <i class="flaticon-list"></i>Thêm người dùng vào danh bạ
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
                                        <h3>
                                            Tên danh bạ: <?php 
                                                echo $value['Name'];
                                            ?>
                                            <hr>
                                        </h3>
                                        
                                        <h4 class="kt-font-danger">Danh sách thành viên</h4>
                                        
                                        <div class="kt-section__content">
                                            <table class="table table-hover">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>First_name</th>
                                                        <th>Last_name</th>
                                                        <th>Phone_Number</th>
                                                        <th>Bạn bè</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $url2='http://192.168.1.13:3000/telegram/get_list_user_telegramgroup?id='.$user.'&group='.$id;
                                                    $curl2=curl_init($url2);
                                                    curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
                                                    curl_setopt($curl2, CURLOPT_HTTPHEADER, [
                                                        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                                                        'Authorization: '.$_SESSION['user_token']
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
                                                        echo '<td>
                                                            '. ((isset($contact['user_id'])) ? '<button class="btn btn-sm btn-outline-success"><i class="la la-check"></i></button>' : '<button class="btn btn-sm btn-outline-primary"><i class="la la-user-plus"></i> kết bạn</button>') .'
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
                                        <h3>
                                            Thêm người dùng vào danh bạ: <?php 
                                                echo $value['Name'];
                                            ?>
                                            <hr>
                                        </h3>
                                        <div class="col-lg-12">
                                            <h4 class="kt-font-danger"><i class="la la-user-plus"></i> Chọn bạn bè từ danh sách</h4>
                                        </div>
                                        <div class="kt-section__content">
                                            <div class="tab-pane active" id="kt_widget4_tab_all">
                                                <div class="kt-scroll" data-scroll="true" data-height="400" style="height: 400px;">
                                                    <div class="kt-list-timeline">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th >#</th>
                                                                        <th >First_name</th>
                                                                        <th >Last_name</th>
                                                                        <th >Phone_Number</th>
                                                                        <th class="text-center">Chọn</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                $url3='http://192.168.1.13:3000/telegram/get_friend?id='.$user;
                                                                $curl3=curl_init($url3);
                                                                curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true);
                                                                curl_setopt($curl3, CURLOPT_HTTPHEADER, [
                                                                    'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                                    'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                                                                    'Authorization: '.$_SESSION['user_token']
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
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td><span class="kt-link kt-font-boldest">Chọn tất cả</span></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td><input type="checkbox" id="addallgroup"
                                                                            class="form-control">
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                        <br>
                                            <button type="submit" class="btn btn-outline-brand btn-elevate btn-pill" id="addcontact"><i class="la la-plus-square"></i> Thêm vào danh bạ</button>
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
            // alert("Đã thêm thành công "+ count+" vào group chat");
            Swal.fire({ type: 'success', title: "Đã thêm thành công "+ count+" người vào group chat", showConfirmButton: false, timer: 1500 });
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
            // location.reload();
        }
        else Swal.fire('Thất bại', 'Đã xảy ra lỗi, vui lòng thử lại sau', 'error');
    })
})
</script>