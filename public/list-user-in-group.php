<?php
$id=isset($_GET['id'])?intval($_GET['id']):0;
$page= isset($_GET['page'])?intval($_GET['page']):1;
include 'header.php';
if ($id!=0) {
    // get nguoi dung trong group chat
    if (isset($_GET['chat_id']))
        $url='http://localhost:2020/telegram/get_user_in_group_chat?id='.$id.'&chat_id='.$_GET['chat_id'].'&page='.$page;
    else if (isset($_GET['channel_id'])) 
        $url='http://localhost:2020/telegram/get_user_in_group_chat?id='.$id.'&channel_id='.$_GET['channel_id'].'&access_hash='.$_GET['access_hash'].'&page='.$page;
    $curl=curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
        'Authorization: '.$_SESSION['user_token']
    ]);
    $list_user=json_decode(curl_exec($curl), true);
    curl_close($curl);
        // get list group chat
    $url2='http://localhost:2020/telegram/get_list_group_chat_telegram?id='.$id;
    $curl2=curl_init($url2);
    curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl2, CURLOPT_HTTPHEADER, [
        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
        'Authorization: '.$_SESSION['user_token']
    ]);
    $list_group_chat=json_decode(curl_exec($curl2), true);
    $list_group=$list_group_chat['chats'];
    curl_close($curl2);

    // get list user
    $url3='http://localhost:2020/telegram/get_list_user_telegram';
    $curl3=curl_init($url3);
    curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl3, CURLOPT_HTTPHEADER, [
        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
        'Authorization: '.$_SESSION['user_token']
    ]);
    $list_account = json_decode(curl_exec($curl3), true);
    curl_close($curl3);

    // phan trang
    if (isset($_GET['channel_id'])) 
    {
    $length = $list_user['lengthuser'];
    $countPage = ceil($length / $list_user['pagination']['perPage']);
    }
    function pagination_link($page) {
        if(strpos($_SERVER['REQUEST_URI'], 'page=') !== false) {
            return preg_replace("/page=([0-9]+)/",'page='. $page,$_SERVER['REQUEST_URI']);
        } else {
            return $_SERVER['REQUEST_URI']. '&page='.$page;
        }
    }
}
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
                        <a href="add-account-tool-telegram.php" class="kt-subheader__breadcrumbs-link">
                            Danh sách tài khoản </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="list-group-chat.php?id=<?php echo $id;?>" class="kt-subheader__breadcrumbs-link">
                           Danh sách group chat </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            Group <?php echo $list_user['name']; ?></a>
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
                                    <i class="flaticon2-group"></i>Danh sách thành viên
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active " id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel">
                            <div class="kt-portlet__head kt-portlet__head--lg">
                                <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon">
                                        <i class="kt-font-brand flaticon2-line-chart"></i>
                                    </span>
                                    <h3 class="kt-portlet__head-title">
                                        Group chat: <?php echo $list_user['name']; ?> - <?php echo $list_user['lengthuser']; ?>/<?php echo $list_user['total'];?>
                                    </h3>
                                </div>
                                <div class="kt-portlet__head-toolbar">
                                    <div class="kt-portlet__head-wrapper">
                                        <div class="kt-portlet__head-actions">
                                            <div class="dropdown dropdown-inline">
                                                <button type="button" class="btn mb-2 btn-default btn-icon-sm export_user">
                                                    <i class="la la-download"></i> Export
                                                </button>
                                                <button type="button" class="btn btn-brand btn-elevate btn-icon-sm mb-2 move_user_to_group" data-toggle="modal" data-target="#inviter_to_group" data-name="<?php echo $list_user['name']; ?>">
                                                    <i class="la la-plus"></i> Mời người dùng vào group khác
                                                </button>
                                                <button type="button" class="btn btn-brand btn-elevate btn-icon-sm mb-2 send_msg_all_user_in_group" data-id="<?php echo (isset($_GET['channel_id'])?$_GET['channel_id']:$_GET['chat_id']);?>" data-name="<?php echo $list_user['name']; ?>" data-toggle="modal" data-target="#send_msg_to_user_group">
                                                    <i class="fab fa-facebook-messenger"></i> Nhắn tin tới user trong group
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <table class="table table-striped- table-bordered table-hover table-checkable" id="table_get_user_group">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th>ID</th>
                                            <th>Tên người dùng</th>
                                            <th>Username</th>
                                            <th>Số điện thoại</th>
                                            <th>Bạn bè Telegram</th>
                                            <th>Loại</th>
                                        </tr>
                                        <tr id="row-search">
                                            <th data-is-search="false"></th>
                                            <th data-is-search="true"></th>
                                            <th data-is-search="true"></th>
                                            <th data-is-search="true"></th>
                                            <th data-is-search="true"></th>
                                            <th data-is-search="false"></th>
                                            <th data-is-search="true"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($list_user) && !empty($list_user['users']))
                                        {
                                            foreach($list_user['users'] as $index => $user)
                                            if (isset($user['id']))
                                            {
                                            echo ' <tr>
                                                <th scope="row">'.((int)$index+1 + ($page-1)*10).'</th>
                                                <td>
                                                    <label>
                                                        '.(isset($user['user_id'])?$user['user_id']:$user['id']).'
                                                    </label>
                                                </td>';
                                                echo '<td>
                                                    <label>'.(isset($user['first_name'])?($user['first_name']):"").' '.(isset($user['last_name'])?$user['last_name']:"").'
                                                    </label>
                                                    <div class="d-none">' . (isset($user['first_name'])?(khong_dau($user['first_name'])):"").' '.(isset($user['last_name'])?khong_dau($user['last_name']):""). '</div>
                                                </td>';
                                                echo '<td>
                                                    <label>'.(isset($user['username'])?$user['username']:'').'
                                                    </label>
                                                </td>';
                                                echo '<td>
                                                    <label>'.(isset($user['phone'])?$user['phone']:'').'
                                                    </label>
                                                </td>';
                                                echo '<td>
                                                    <label>'.((isset($user['contact']) && $user['contact']==1)?'<button class="btn btn-sm btn-outline-success"><i class="la la-check"></i></button>':'').'
                                                    </label>
                                                </td>';
                                                if (isset($user['bot']) && $user['bot']==true)
                                                    echo '<td>
                                                    <span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill m-1">BOT
                                                        </span>
                                                    </td>';
                                                else
                                                echo '<td>
                                                <span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill m-1">USER
                                                    </span>
                                                </td>';
                                                
                                                echo '</tr>';
                                            }
                                        }
                                        else 
                                        echo '
                                        <div class="text-center">
                                            <h4>Đang quét dữ liệu</h4>
                                            <button onClick="window.location.reload();" class="btn btn-brand btn-icon btn-reload kt-spinner kt-spinner--sm kt-spinner--light">Cập nhật</button>&nbsp;
                                        </div>
                                        ';
                                        ?>
                                    </tbody>
                                </table>
                                <?php if (isset($_GET['channel_id'])): ?>
                                    <div class="d-flex flex-wrap py-2 justify-content-end">
                                        <!-- ve dau trang -->
                                        <?php if($page > 3): ?>
                                        <a href="<?= pagination_link(1) ?>" class="btn btn-icon btn-sm bbtn-light mr-2 my-1"><i class="fas fa-angle-double-left icon-xs"></i></a>
                                        <?php endif; ?>
                                        <!-- trang truoc -->
                                        <?php if($page != 1): ?>
                                        <a href="<?= pagination_link($page - 1) ?>" class="btn btn-icon btn-sm bbtn-light mr-2 my-1"><?= $page-1 ?></a>
                                        <?php endif; ?>
                                        <!-- trang hien tai -->
                                        <a href="<?= pagination_link($page) ?>" class="btn btn-icon btn-sm border-0 btn-light btn-hover-primary active mr-2 my-1"><?= $page ?></a>
                                        <!-- trang sau -->
                                        <?php if($page != $countPage && $countPage != 0 ): ?>
                                        <a href="<?= pagination_link($page + 1) ?>" class="btn btn-icon btn-sm btn-light mr-2 my-1"><?= $page+1?></a>
                                        <?php endif; ?>
                                        <!-- trang cuoi -->
                                        <?php if(($page+1) != $countPage): ?>
                                        <a href="<?= pagination_link($countPage) ?>" class="btn btn-icon btn-sm btn-light mr-2 my-1"><i class="fas fa-angle-double-right icon-xs"></i></a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="inviter_to_group" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group form-group-marginless">
                    <!-- cho thành table  -->
                <input type="hidden" name="from_id_group">
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
                                    <div class="kt-heading kt-heading--md">Danh sách tài khoản sử dụng mời vào nhóm</div>
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
                                                        $url='http://localhost:2020/telegram/get_list_user_telegram';
                                                        $curl=curl_init($url);
                                                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                                        curl_setopt($curl, CURLOPT_HTTPHEADER, [
                                                            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                                                            'Authorization: '.$_SESSION['user_token']
                                                        ]);
                                                        $response2 = json_decode(curl_exec($curl), true);
                                                        curl_close($curl);
                                                        if (!empty($response2)) {
                                                            foreach ($response2 as $index => $user) {  
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
                                                                <input value="" class="cbx checkall" type="checkbox">
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                <?php 
                                                foreach($list_group_chat['chats'] as $index => $group)
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
<div class="modal fade" id="send_msg_to_user_group" tabindex="-1" role="dialog"
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
                                foreach($list_account as $index =>  $account_send) {
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
// send msg
    $('.move_user_to_group').click(function() {
        $('#exampleModalLongTitle1').text("Thêm người dùng từ group " + $(this).data('name') + " sang group khác");
    })
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
                "id": <?php echo $id; ?>,
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
                "id": <?php echo $id; ?>,
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
    $('body').on('click','.select_all_page',function() {
        $('.user_in_group:checkbox').not(this).prop('checked', this.checked);
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
    $('.all_account').click(function() {
        $('.account:checkbox').not(this).prop('checked', this.checked);
    })
    $('.checkall_user').click(function() {
        $('.user:checkbox').not(this).prop('checked', this.checked);
    })
    $('.checkall').click(function() {
        $('.cbx:checkbox').not(this).prop('checked', this.checked);
    })
    //
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
        }  else {
            $.ajax({
                url: "./createapp.php",
                type: "POST",
                data: {
                    "function": "add_group_chat_telegram",
                    "id_group_chat": JSON.stringify(array_chat_id),
                    "from_id_group": <?php if (isset($_GET['chat_id'])) echo $_GET['chat_id']; else echo $_GET['channel_id']; ?>,
                    "id": <?php echo $id; ?>,
                    "list_user": JSON.stringify(array_user),
                },
                success: function (dt) {
                    if (dt) dt= JSON.parse(dt);
                    if (dt && dt.process_id) 
                    {
                        window.location.href="inviter-user-to-group.php?id=<?php echo $id; ?>&from_group="+$('input[name="from_id_group"]').val() + "&process_id="+ dt.process_id;
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
    $('#table_get_user_group thead #row-search th').each( function () {
        if($(this).data('is-search')) {
        var title = $(this).text();
                $(this).html('<input type="text" style="width:100%;" placeholder="" />' );
        }
    } );

    // DataTable
    var table = $('#table_get_user_group').DataTable({
        "ordering": false,
        <?php if (isset($_GET['channel_id'])): ?>
        "paging": false,
        "bInfo" : false
        <?php endif;?>
        // searching:false
    });
        
    // Apply the search
    table.columns().every( function () {
        var that = this;
        $( 'input', this.header() ).on( 'keyup change clear', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value)
                    .draw();
            }
        } );
    });
    // jQuery(document).ready(function() {
    // 	KTDatatablesAdvancedColumnRendering.init();
    // });

    $(".export_user").on("click", function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "Tải xuống file danh sách người dùng!",
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Download now!'
        })
        .then((result) => {
            if (result.value) {
                <?php
                    if (isset($_GET['channel_id'])) 
                    {
                        $url3='http://localhost:2020/telegram/get_full_user_in_group_chat?id='.$id.'&channel_id='.$_GET['channel_id'].'&access_hash='.$_GET['access_hash'];
                        $curl3=curl_init($url3);
                        curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($curl3, CURLOPT_HTTPHEADER, [
                            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                            'Authorization: '.$_SESSION['user_token']
                        ]);
                        $list_full_user=json_decode(curl_exec($curl3), true);
                        curl_close($curl3);
                    }

                    $filename="./export/contact_id=".$id."_".date("Y-m-d").".csv";
                    $output=fopen($filename, "w");
                    fputs($output, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
                    fputcsv($output, array("phone", "user_id", "access_hash", "first name", "last name", "user name"));
                    if (isset($_GET['chat_id']))
                    foreach($list_user['users'] as $contact) {
                        fputcsv($output, array(isset($contact['phone'])?$contact['phone']:'', isset($contact['id'])?$contact['id']:'',isset($contact['access_hash'])?$contact['access_hash']:"",isset($contact['first_name'])?$contact['first_name']:'', isset($contact['last_name'])?$contact['last_name']:'', isset($contact['username'])?$contact['username']:''));
                    }
                    else 
                    foreach($list_full_user['data'] as $contact) {
                        fputcsv($output, array(isset($contact['phone'])?$contact['phone']:'', isset($contact['user_id'])?$contact['user_id']:'',isset($contact['access_hash'])?$contact['access_hash']:"",isset($contact['first_name'])?$contact['first_name']:'', isset($contact['last_name'])?$contact['last_name']:'', isset($contact['username'])?$contact['username']:''));
                    }
                    fclose($output);
                    echo 'window.location="download.php?filename='.$filename.'";';
                ?>
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
        })
    })
</script>