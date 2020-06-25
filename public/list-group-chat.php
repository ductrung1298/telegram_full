<?php
include 'header.php';
// lay list user telegram
$url='http://localhost:2020/telegram/get_list_user_telegram';
$curl=curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
    'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
    'Authorization: '.$_SESSION['user_token']
]);
$list_user_telegram=json_decode(curl_exec($curl), true);
$httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
curl_close($curl);

// lay danh sach group chat telegram
$list_group = array();
if (!empty($list_user_telegram))
    foreach($list_user_telegram as $user) {
        $url='http://localhost:2020/telegram/get_list_group_chat_telegram?id='.$user['Id'];
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'Authorization: '.$_SESSION['user_token']
        ]);
        $list_group_chat=(json_decode(curl_exec($curl), true))['chats'];
        curl_close($curl);
        if (!empty($list_group_chat)) {
            foreach($list_group_chat as $group) {
                if (!array_search($group['id'], array_column($list_group, 'id')))
                {
                    $group['user'] = [$user];
                    array_push($list_group, $group);
                }
                else 
                if (!array_search($user, $list_group[array_search($group, $list_group)]['user'])) 
                array_push($list_group[array_search($group, $list_group)]['user'], $user);
            }
        }
    }
// foreach($list_group as $group) {
//     echo '<pre>';
//     echo print_r($group);
//     echo '</pre>';
// }
?>
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
    <div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
        id="kt_content">
        <!-- begin:: Subheader -->
        <div class="kt-subheader mb-5 kt-grid__item" id="kt_subheader">
            <div class="kt-container ">
                <div class="kt-subheader__main">
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            Danh sách group chat Telegram</a>
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
                                    <i class="flaticon2-group"></i>Danh sách group chat
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
                                        <div class="kt-section__content">
                                            <table class="table">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th width="5%">#</th>
                                                        <th width="10%">ID</th>
                                                        <th width="20%">Tên nhóm chat</th>
                                                        <th width="15%">Số lượng</th>
                                                        <th width="13%">Kiểu</th>
                                                        <th width="10%">Số account join group</th>
                                                        <th width="27%">Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (!empty($list_group))
                                                    foreach($list_group as $index => $group)
                                                    {
                                                    echo ' <tr>
                                                        <th scope="row">'.((int)$index+1).'</th>
                                                        <td>'.(isset($group['id'])?$group['id']:'').'</td>
                                                        <td><a href="list-user-in-group.php?id='.$group['user'][0]['Id'].(($group['_']=="chat")?("&chat_id=".$group['id']):("&channel_id=".$group['id']."&access_hash=".$group['access_hash'])).'" target="_blank">'.(isset($group['title'])?$group['title']:'').'</a>
                                                        </td>
                                                        <td>'.((isset($group['count']) && $group['count']!=0) ?$group['count']:('Chưa có dữ liệu <a href="list-user-in-group.php?id='.$group['user'][0]['Id'].(($group['_']=="chat")?("&chat_id=".$group['id']):("&channel_id=".$group['id']."&access_hash=".$group['access_hash'])).'" target="_blank"><span class="kt-badge kt-badge--brand kt-badge--xl"><i class="flaticon2-circular-arrow"></i></span></a>')).'
                                                        </td>
                                                        <td><span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill m-1">
                                                            '. (($group['_']=="chat") ? "GROUP" : (($group['_']=="channel" && isset($group['megagroup']))? "SUPER GROUP" : "CHANNEL")) .'</span>
                                                        </td>
                                                        <td class="text-center">
                                                        <a class="dropdown-item btn btn-label-linkedin" data-toggle="modal" data-target="#view_group_of_user'.$group['id'].'">'.count($group['user']).'</a>                                                                
                                                        <div class="modal fade" id="view_group_of_user'.$group['id'].'" tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">Danh sách tài khoản đã tham gia nhóm chat</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group form-group-marginless">
                                                                            <table class="table">
                                                                                <thead class="thead-light">
                                                                                    <tr>
                                                                                        <th>#</th>
                                                                                        <th>Tên tài khoản</th>
                                                                                        <th>Số điện thoại</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>';
                                                                                    foreach($group['user'] as $int => $account) {
                                                                                        echo '
                                                                                        <tr>
                                                                                            <th scope="row">'.((int)$int+1).'</th>
                                                                                            <td><a href="manager-account.php?id='.$account['Id'].'" target="_blank">'.((isset($account['first_name'])?$account['first_name']:"") . ' '. (isset($account['last_name'])?$account['last_name']:"")).'</a></td>
                                                                                            <td>'.$account['phone'].'</td>
                                                                                        </tr>';
                                                                                    }   
                                                                                echo 
                                                                                '</tbody>
                                                                            </table>';
                                                                    echo '
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </td>
                                                        <td class="d-flex justify-content-center" >
                                                            <a class="btn btn-bold btn-label-brand btn-sm mr-2 move_user_to_group" data-toggle="modal" data-target="#exampleModalCenter" data-name="'.$group['title'].'">Chuyển user sang nhóm khác</a>                                                                
                                                            <a class="btn btn-bold btn-label-brand btn-sm mr-2 send_msg_all_user_in_group" data-id="'.$group['id'].'" data-name="'.$group['title'].'" data-toggle="modal" data-target="#send_msg_view">Nhắn tin user trong group</a>
                                                            <a class="btn btn-bold btn-label-brand btn-sm export_all_user_in_group" data-id="'.$group['id'].'" >Export CSV</a>
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
<input type="hidden" name="from_id_group">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle2"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group form-group-marginless">
                    <div class="kt-grid kt-wizard-v1 kt-wizard-v1--white" id="kt_wizard_v1" data-ktwizard-state="step-first">
                        <div class="kt-grid__item">

                            <!--begin: Form Wizard Nav -->
                            <div class="kt-wizard-v1__nav">

                                <!--doc: Remove "kt-wizard-v1__nav-items--clickable" class and also set 'clickableSteps: false' in the JS init to disable manually clicking step titles -->
                                <div class="kt-wizard-v1__nav-items kt-wizard-v1__nav-items--clickable">
                                    <div class="kt-wizard-v1__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
                                        <div class="kt-wizard-v1__nav-body">
                                            <div class="kt-wizard-v1__nav-icon">
                                                <i class="flaticon-profile-1"></i>
                                            </div>
                                            <div class="kt-wizard-v1__nav-label">
                                                1. Chọn tài khoản mời người dùng vào nhóm
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-wizard-v1__nav-item" data-ktwizard-type="step">
                                        <div class="kt-wizard-v1__nav-body">
                                            <div class="kt-wizard-v1__nav-icon">
                                                <i class="flaticon2-talk"></i>
                                            </div>
                                            <div class="kt-wizard-v1__nav-label">
                                                2. Chọn nhóm đích
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Nav -->
                        </div>
                        <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v1__wrapper">

                            <!--begin: Form Wizard Form-->
                            <form class="kt-form" id="kt_form">
                                <!--begin: Form Wizard Step 1-->
                                <div class="kt-wizard-v1__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                    <div class="kt-heading kt-heading--md">Danh sách tài khoản sử dụng thêm vào nhóm</div>
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="kt-wizard-v1__form">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="">#</th>
                                                        <th class="kt-font-bolder">Tên tài khoản</th>
                                                        <th>Chọn</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td>Chọn tất cả</td>
                                                        <td>
                                                        <label class="p-2 flex-shrink-1 bd-highlight kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                                            <input value="" class="checkall_user" type="checkbox">
                                                            <span></span>
                                                        </label>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        if (!empty($list_user_telegram)) {
                                                            foreach ($list_user_telegram as $index => $user) {  
                                                                echo '<tr>
                                                                    <td>'.((int)$index+1).'</td>
                                                                    <td>'.(isset($user['first_name'])?$user['first_name']:"").' '.(isset($user['last_name'])?$user['last_name']: "").'</td>
                                                                    <td>
                                                                        <label class="p-2 flex-shrink-1 bd-highlight kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                                                            <input data-user_id="'.$user['Id'].'" class="user" type="checkbox">
                                                                            <span></span>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                ';
                                                            }
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!--end: Form Wizard Step 1-->

                                <!--begin: Form Wizard Step 2-->
                                <div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
                                    <div class="kt-heading kt-heading--md">Danh sách group chat</div>
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="kt-wizard-v1__form">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th class="kt-font-bolder">Tên nhóm</th>
                                                        <th>Chọn</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td>Chọn tất cả</td>
                                                        <td>
                                                            <label class="p-2 flex-shrink-1 bd-highlight kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                                                <input value="" class="checkall" type="checkbox">
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                <?php 
                                                foreach($list_group as $index => $group)
                                                {
                                                    echo '
                                                <tr>
                                                    <td>'.intval($index+1).'</td>
                                                    <td>'.(isset($group['title'])?$group['title']:'').'</td>
                                                    <td>
                                                    <label class="p-2 flex-shrink-1 bd-highlight kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                                        <input data-id="'.$group['id'].'" data-type="'.$group['_'].'" class="cbx" type="checkbox">
                                                        <span></span>
                                                    </label>
                                                    </td>
                                                </tr>';
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!--end: Form Wizard Step 2-->
                                <!--begin: Form Actions -->
                                <div class="kt-form__actions">
                                    <button class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
                                        Previous
                                    </button>
                                    <button class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u add_group_chat">
                                        Submit
                                    </button>
                                    <button class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
                                        Next Step
                                    </button>
                                </div>
                                <!--end: Form Actions -->
                            </form>
                            <!--end: Form Wizard Form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="send_msg_view" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle3">Nhắn tin tới tất cả người dùng trong group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12 form-group">
                    <div class="form-row">
                        <div class="col-10">
                            <label for="">Nội dung tin nhắn</label>
                            <textarea class="form-control" name="message_all_user"></textarea>
                        </div>
                        <div class="col-2 d-flex align-items-end">
                            <button class="btn btn-outline-success btn-send_msg_broadcast"><i class="fa fa-paper-plane"></i> Gửi</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 form-group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Tài khoản nhắn tin</label>
                    <div class=" col-lg-4 col-md-9 col-sm-12">
                        <select class="form-control kt-select2" id="kt_select2_4_modal" name="account_send_msg" multiple="multiple">
                            <option></option>
                            <?php
                                foreach($list_user_telegram as $index =>  $account_send) {
                                    echo '<option value="'.$account_send['Id'].'">'.((isset($account_send['first_name'])?$account_send['first_name']: "") .' '. (isset($account_send['last_name'])?$account_send['last_name']:"")). '</option>';
                                } 
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12 form-group row">
                    <div class="text-center w-100 loading"  style="display:none;">
                        <button class="btn btn-outline-success kt-spinner kt-spinner--sm kt-spinner--danger ">Đang tải dữ liệu</button>
                    </div>
                    <table class="table list_user">
                    </table>
                    <div class="text-center w-100 loadmore" data-id="" data-page="1" data-hash="0" data-count="0" style="display:none;">
                        <button class="btn btn-outline-success">Load More<i class="flaticon2-down"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>

<script>

jQuery(document).ready(function($) {
    $('.move_user_to_group').click(function() {
        $('#exampleModalLongTitle2').text("Chuyển User từ group " + $(this).data('name') + " sang group khác");
    });
    $('#kt_select2_4_modal').select2({
        placeholder: "Danh sách tài khoản để nhắn tin",
        allowClear: true
    }); 
    function timeDifference(current, previous) {
        var msPerMinute = 60 * 1000;
        var msPerHour = msPerMinute * 60;
        var msPerDay = msPerHour * 24;
        var msPerMonth = msPerDay * 30;
        var msPerYear = msPerDay * 365;
        var elapsed = current - previous;
        
        if (elapsed < msPerMinute) {
            return Math.round(elapsed/1000) + ' giây trước';   
        }
        
        else if (elapsed < msPerHour) {
            return Math.round(elapsed/msPerMinute) + ' phút trước';   
        }
        
        else if (elapsed < msPerDay ) {
            return Math.round(elapsed/msPerHour ) + ' giờ trước';   
        }

        else if (elapsed < msPerMonth) {
            return 'khoảng ' + Math.round(elapsed/msPerDay) + ' ngày trước';   
        }
        
        else if (elapsed < msPerYear) {
            return 'khoảng ' + Math.round(elapsed/msPerMonth) + ' tháng trước';   
        }
        
        else {
            return 'khoảng ' + Math.round(elapsed/msPerYear ) + ' năm trước';   
        }
    }

    // get list user in group chat
    $('.send_msg_all_user_in_group').click(function() {
        $('#exampleModalLongTitle3').text("Nhắn tin tới tất cả người dùng trong group " + $(this).data('name'));
        $('.loading').attr('style', "display: block");
        $('.loadmore').attr('style', "display: none");
        $('.list_user').html("");
        var body_html = '';
        $('.loadmore').attr('data-id', $(this).data('id'));
        $.ajax({
            url: "./createapp.php",
            type: "POST",
            data: {
                "function": "get_user_in_group_realtime",
                "id": <?php echo $list_user_telegram[0]['Id']; ?>,
                "group_chat": $(this).data('id'),
                "hash": 0,
                "page" : 1,
            },
            success: function (dt) {
                $('.loading').attr('style', "display: none");
                $('.loadmore').attr('style', "display: block");
                if (dt) dt= JSON.parse(dt);
                if (dt && dt.data.length!=0 ) {
                    var count =0;
                    for (let index of dt.data) {
                        count++;
                        body_html = body_html + `
                        <tr>
                            <td> <label class="kt-checkbox align-top kt-checkbox--bold kt-checkbox--success"><input type="checkbox" class="form-control user_in_group"
                                data-user_id=${index.id} data-access_hash=${index.access_hash}>
                                <span></span>
                                </label>
                            </td>
                            <td>${count}</td>
                            <td>${index.id}</td>
                            <td>${(index.first_name)?index.first_name:""} ${(index.last_name)?index.last_name:""}</td>
                            <td>${(index.username)?index.username:""}</td>
                            <td>${(index.status.was_online)?(timeDifference(new Date(), new Date(index.status.was_online*1000))):""}
                            </td>
                            <td id="${index.id}"></td>
                        </tr>
                        `;
                    }
                }
                let html = `
                    <thead class="thead-light">
                        <tr>
                            <th>
                                <label class="kt-checkbox align-top kt-checkbox--bold kt-checkbox--success">
                                    <input class="select_all_page" type="checkbox">
                                    <span></span>
                                </label>
                            </th>
                            <th width="10%">#</th>
                            <th width="10%">ID</th>
                            <th width="30%">Tên người dùng</th>
                            <th width="20%">Username</th>
                            <th width="20%">Online lần cuối</th>
                            <th width="10%">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody id="body_table">
                        ${body_html}
                    </tbody>
                `;
                $('.loadmore').attr('data-hash', dt.hash);
                $('.loadmore').attr('data-count', count);
                $('.list_user').html(html);
            }
        })
    })
    $('.loadmore').click(function() {
        $('.loadmore').attr('data-page', Number($('.loadmore').attr('data-page')) + 1);
        $.ajax({
            url: "./createapp.php",
            type: "POST",
            data: {
                "function": "get_user_in_group_realtime",
                "id": <?php echo $list_user_telegram[0]['Id']; ?>,
                "group_chat": $(this).data('id'),
                "hash": $(this).attr('data-hash'),
                "page" : $(this).attr('data-page'),
            },
            success: function (dt) {
                if (dt) dt= JSON.parse(dt);
                var body_html = "";
                if (dt && dt.data.length!=0 ) {
                    var count = (Number($('.loadmore').attr('data-count')) ) ;
                    for (let index of dt.data) {
                        count++;
                        body_html = body_html + `
                        <tr>
                            <td> <label class="kt-checkbox align-top kt-checkbox--bold kt-checkbox--success"><input type="checkbox" class="form-control user_in_group"
                                data-user_id=${index.id} data-access_hash=${index.access_hash}>
                                <span></span>
                                </label>
                            </td>
                            <td>${count}</td>
                            <td>${index.id}</td>
                            <td>${(index.first_name)?index.first_name:""} ${(index.last_name)?index.last_name:""}</td>
                            <td>${(index.username)?index.username:""}</td>
                            <td>${(index.status.was_online)?(timeDifference(new Date(), new Date(index.status.was_online*1000))):""}
                            </td>
                            <td id="${index.id}"></td>
                        </tr>
                        `;
                    }
                }
                $('.loadmore').attr('data-hash', dt.hash);
                $('.loadmore').attr('data-count', count);
                $('.list_user').append(body_html);
            }
        })
    })

    $('.add-group-chat').click(function () {
        $('input[name="from_id_group"]').val($(this).attr('data-id'));
    })

    $('.checkall').click(function() {
        $('.cbx:checkbox').not(this).prop('checked', this.checked);
    })

    $('.checkall_user').click(function() {
        $('.user:checkbox').not(this).prop('checked', this.checked);
    })

    $('.all_account').click(function() {
        $('.account:checkbox').not(this).prop('checked', this.checked);
    })
    $('body').on('click','.select_all_page',function() {
        $('.user_in_group:checkbox').not(this).prop('checked', this.checked);
    })

    $('.add_group_chat').click(function(){
        let array_chat_id = [];
        $('.cbx:checkbox').map(function(){
            if (this.checked && $(this).attr('data-id') != "")
                array_chat_id.push({
                    id: $(this).attr('data-id'),
                    type: $(this).attr('data-type')
                })
        })
        let array_user = [];
        $('.user:checkbox').map(function() {
            if (this.checked && $(this).attr('data-user_id')!= "")
                array_user.push($(this).attr('data-user_id'))
        })
        if (array_chat_id.length == 0) {
            Swal.fire(
                'Lỗi...',
                'Danh sách group chat Telegram rỗng',
                'error',
            );
        }
        else if (array_user.length == 0 ) {
            Swal.fire(
                'Lỗi...',
                'Danh sách người dùng để thêm vào nhóm rỗng',
                'error',
            );
        } 
        else {
            $.ajax({
                url: "./createapp.php",
                type: "POST",
                data: {
                    "function": "add_group_chat_telegram",
                    "id_group_chat": JSON.stringify(array_chat_id),
                    "from_id_group": $('input[name="from_id_group"]').val(),
                    "id": array_user[0],
                    "list_user": JSON.stringify(array_user),
                },
                success: function (dt) {
                    if (dt) dt= JSON.parse(dt);
                    if (dt && dt.process_id) 
                    {
                        window.location.href="inviter-user-to-group.php?&process_id="+ dt.process_id;
                    }
                    else 
                    if (dt) {
                        Swal.fire(
                            'Thêm thành công',
                            'Thêm thành công ' + dt + ' người dùng vào ' + array_chat_id.length + ' nhóm chat',
                            'success',
                        );
                        // location.reload();
                    } else Swal.fire(
                        'Lỗi...',
                        'Lỗi khi thêm người dùng vào nhóm chat',
                        'error',
                    );
                }
            })
        }
    })
    $('.btn-send_msg_broadcast').click(function() {
        if ($('textarea[name="message_all_user"]').val()!="") {
            var array_user = [];
            $('.user_in_group:checkbox').map(function(){
                if (this.checked && $(this).attr('data-user_id') != "")
                    array_user.push({
                        user_id: $(this).attr('data-user_id'),
                        access_hash: $(this).attr('data-access_hash'),
                    })
                });
            if (array_user.length==0) {
                Swal.fire(
                    'Lỗi...',
                    'Danh sách người dùng nhận tin nhắn rỗng',
                    'error',
                );
            }
            else {
                for (let user of array_user) {
                    $(`#${user.user_id}`).html('<div class="col-sm"><div class="kt-spinner kt-spinner--lg kt-spinner--warning"></div></div>');
                }
                var index_account = 0;
                let array_account = $('select[name="account_send_msg"]').val();
                for (let user of array_user) {
                    $.ajax({
                        url: "./createapp.php",
                        type: "POST",
                        data: {
                            "function": "sendMessage",
                            "id": array_account[index_account],
                            "type": 0,
                            "type_time": 0,
                            "user_id": user.user_id,
                            "access_hash": user.access_hash,
                            "message": ($('textarea[name="message_all_user"]').val()),
                        },
                        success: function (dt) {
                            if (dt) dt= JSON.parse(dt);
                            if (dt && dt.id) {
                                $(`#${user.user_id}`).html('<span class="btn btn-bold btn-sm btn-font-sm  btn-label-success">Success</span>')
                            }
                            else {
                                $(`#${user.user_id}`).html('<span class="btn btn-bold btn-sm btn-font-sm  btn-label-danger">Error</span>')
                                index_account ++;
                            }
                            if (index_account == array_account.length) index_account = 0;
                        }
                    })
                }
            }
        }
        else  Swal.fire(
                'Lỗi...',
                'Nội dung tin nhắn rỗng',
                'error',
            );
    })
    $('.export_all_user_in_group').click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "Tải xuống file danh sách thành viên nhóm chat!",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Download now!'
            })
            .then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "./createapp.php",
                        type: "POST",
                        data: {
                            "function": "get_full_user_export",
                            "chat_id": $(this).data('id'),
                        },
                        success: function (filename) {
                            if ( filename) {
                                window.location = "download.php?filename=" + filename;
                                Swal.fire(
                                'Download!',
                                'Tải xuống thành công.',
                                'success'
                                )
                            }
                            else Swal.fire(
                                'Download!',
                                'Tải xuống thất bại',
                                'error'
                                )
                        }
                    })
                }
                else Swal.fire(
                        'Download!',
                        'Tải xuống thất bại',
                        'error'
                        )
            })
    })
})
</script>