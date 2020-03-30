<?php include 'header.php';?>
<!-- end:: Header -->
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
                                    <i class="flaticon-list"></i> Danh sách
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_2_tab_content"
                                    role="tab" aria-selected="false">
                                    <i class="flaticon-safe-shield-protection"></i> Xác thực tài khoản
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_3_tab_content"
                                    role="tab" aria-selected="false">
                                    <i class="la la-user-plus"></i> Đăng ký tài khoản
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <!-- begin:: Notification 1 -->
                        <div class="tab-pane  " id="kt_portlet_base_demo_1_3_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">
                                        <form class="kt-form kt-form--label-right">
                                            <div class="kt-portlet__body">
                                                <div class="form-group row form-group-marginless kt-margin-t-20">
                                                   
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>SỐ ĐIỆN THOẠI:</label>
                                                            <input type="text" class="form-control phone_add" name="phone_add"
                                                                placeholder="+84xxxxxxxxx" required="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>API_ID:</label>
                                                            <input type="text" class="form-control api_id_add" name="api_id_add"
                                                                placeholder="xxxxxxx" required="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>API_HASH:</label>
                                                            <input type="text" class="form-control api_hash_add" name="api_hash_add"
                                                                placeholder="xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" required="">
                                                        </div>
                                                        
                                                        <div class="id_account_add" style="display:none;">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                    <div class="form-group mt-3 mb-5">
                                                        <span class="kt-font-bold"><span class="kt-font-danger">*</span> Nếu bạn chưa biết cách lấy mã API_ID và API_HASH vui lòng xem hướng dẫn sử dụng<a target="_blank" href="tele-document.php"> tại đây</a></span>
                                                    </div>
                                                    <div class="form-group otp_form_hide">
                                                            <label><span class="kt-font-success">OTP CODE:</span> </label>
                                                            <input type="text" class="form-control" name="otp_code_add"
                                                                placeholder="OTP code" required>
                                                        </div>
                                                    </div>

                                                </div>
                                                <br>
                                                <div class="kt-portlet__foot">
                                                    <div class="kt-form__actions">
                                                        <div class="row">
                                                            <div class="col-lg-12 text-center bt-end">
                                                                <button type="button"
                                                                    class="btn btn-outline-brand btn-square btn-elevate btn-pill btn-addaccount">Thêm
                                                                    mới </button>
                                                                <button type="reset"
                                                                    class="btn btn-secondary btn-elevate btn-pill">Huỷ</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="overlay">
                                                    <div class="cv-spinner">
                                                        <span class="spinner"></span>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end:: Notification 1-->
                        
                        <div class="tab-pane active" id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">
                                    <div
                                            class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit">
                                        </div>
                                        <label class="col-10 text-center">
                                            <h2>DANH SÁCH TÀI KHOẢN</h2>
                                        </label>
                                        <div class="kt-section__content table-responsive">
                                            <table class="table table-hover ">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>First_Name</th>
                                                        <th>Last_Name</th>
                                                        <th>Phone_Number</th>
                                                        <th class="text-center">Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $url='http://192.168.1.13:3000/telegram/get_list_user_telegram';
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
                                                        foreach ($response2 as $index => $post) {   
                                                            echo '<tr>'.'<th scope="row">'.((int)$index+1).'</th>';
                                                            echo '<td> <label>'.str_replace("<","&lt;",$post['first_name']).'</label> </td>';
                                                            echo '<td> <label>'.str_replace("<","&lt;",$post['last_name']).'</label> </td>';
                                                            echo '<td> <label>'.str_replace("<","&lt;",$post['phone']).'</label> </td>';
                                                            echo '<td class="d-flex justify-content-center" > <span>';
                                                            echo '<a title="Danh bạ" href="getcontact.php?id='.$post['Id'].'" class="btn btn-label-linkedin"><i class="fas fa-book"></i>Danh bạ</a>';
                                                            echo '<a title="Bạn bè" href="list-friend.php?id='.$post['Id'].'" class="btn btn-label-twitter"><i class="fas fa-user"></i>Bạn bè</a>';
                                                            echo '<a title="Gửi tin nhắn" href="getdialogs.php?id='.$post['Id'].'" class="btn btn-label-google"><i class="fas fa-sms"></i>Gửi tin nhắn</a>';
                                                            echo '<a title="Xóa" class="btn btn-label-instagram btn-del-acc" data-id='.$post['Id'].'><i class="fas fa-trash"></i>Xóa</a>';
                                                            echo '</span></td>';
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

                        <div class="tab-pane" id="kt_portlet_base_demo_1_2_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">
                                        <div class="row verify_show">
                                            <div class="col-6 form-group ">
                                                <label>Số điện thoại</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="phone_number" placeholder="+84xxxxxxxxxxx" value="+84966315840" aria-describedby="basic-addon2">
                                                    <div class="input-group-append"><span class="input-group-text" id="basic-addon2"><i class="la la-phone"></i></span></div>
                                                </div>
                                            </div>
                                            <div class="col-6 form-group d-flex align-items-end">
                                                <button type="button" class="btn btn-outline-brand btn-elevate btn-pill vertify_pending">Xác thực </button>
                                            </div>
                                        </div>
                                        <div class="id_account" style="display:none;"></div>
                                        <div class="row verify_hide">
                                            <div class="col-6 form-group ">
                                                <label>Mã OTP</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="otpcode" placeholder="XXXXXX"  aria-describedby="basic-addon2">
                                                    <div class="input-group-append"><span class="input-group-text" id="basic-addon2"><i class="la la-code"></i></span></div>
                                                </div>
                                            </div>
                                            <div class="col-6 form-group d-flex align-items-end">
                                                <button type="button" class="btn btn-outline-success btn-elevate btn-pill C">Đăng nhập </button>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- end:: Content -->
    </div>
</div>
<!-- begin:: Footer -->
<?php include 'footer.php';?>
<script type="text/javascript">
jQuery(document).ready(function($) {

    // delete account
    $('.btn-del-acc').on('click', function() {
        window.location.href = 'deleteaccount.php?id=' + $(this).data('id');
    });
   
    function sendPhoneToGetID(a_func = 'addaccount', phone, api_id, api_hash, add = 1){
        $.ajax({
            type: "POST",
            url: "./createapp.php",
            data: {
                "phone": phone,
                "function": a_func,
                "api_id": Number(api_id),
                "api_hash": api_hash,
            },
            success: function(data) {
                if (data && data != 0) {
                    if (add == 1) {
                        $(".verify_show").hide(1500);
                        $('.id_account').val(data);
                        $(".verify_hide").show(2000);
                    } else {
                        $(".btn-addaccount").addClass("sendOtpToRegister");
                        $(".btn-addaccount").text("Xác nhận");
                        $(this).prop('disabled', false);
                        $(".btn-addaccount").removeClass("btn-addaccount");
                        $(".otp_form_hide").show(2000);
                        $('.id_account_add').val(data);
                    }
                } 
                else if (data ==0 ){
                    Swal.fire('Thông báo', 'Tài khoản đã đăng nhập trước đó', 'success');
                } else {
                    Swal.fire('Lỗi', 'Đã xảy ra lỗi, xin thử lại sau', 'error');
                    $(this).prop('disabled', false);
                }
            }
        })
    }

    function sendOTPCodeToVerify(id, opt_code){
        $.ajax({
            type: "POST",
            url: "./createapp.php",
            data: {
                "id": id,
                "function": "authcode",
                "code": opt_code
            },
            success: function(data) {
                if (data == "success") {
                    Swal.fire({ type: 'success', title: 'Xác thực thành công', showConfirmButton: false, timer: 1500 });
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                } else Swal.fire('Lỗi', 'Đã xảy ra lỗi, xin thử lại sau', 'error');
            }
        })
    }

    //send info to server => get OTP register
    $(".otp_form_hide").hide();
    $(".btn-addaccount").click(function(){
        let phone = $(".phone_add").val();
        let api_id = $(".api_id_add").val();
        let api_hash = $(".api_hash_add").val();

        if (phone == '' || api_id == '' || api_hash == '') {
            Swal.fire('Lỗi', 'Vui lòng nhập đầy đủ các trường để đăng ký', 'warning');
            return;
        } else {
            $(this).append(`<i style="padding:unset" class="fas fa-circle-notch fa-spin"></i>`);
            $(this).prop('disabled', true);

            $.ajax({
                type: "POST",
                url: "./createapp.php",
                data: {
                    "phone": phone,
                    "function": 'addaccount',
                    "api_id": Number(api_id),
                    "api_hash": api_hash,
                },
                success: function(data) {
                    if (data && data != 0) {
                        $(".btn-addaccount").addClass("sendOtpToRegister");
                        $(".btn-addaccount").text("Xác nhận");
                        $(".btn-addaccount").removeAttr("disabled");
                        $(".btn-addaccount").removeClass("btn-addaccount");
                        $(".otp_form_hide").show(2000);
                        $('.id_account_add').val(data);
                    } 
                    else if (data ==0 ){
                        Swal.fire('Thông báo', 'Số điện thoại đã được đăng ký', 'warning');
                        $(".btn-addaccount").removeAttr("disabled");
                        $("i.fas.fa-circle-notch.fa-spin").removeClass("fa-circle-notch");
                    } else {
                        Swal.fire('Lỗi', 'Đã xảy ra lỗi, xin thử lại sau', 'error');
                        $(".btn-addaccount").removeAttr("disabled");
                        $("i.fas.fa-circle-notch.fa-spin").removeClass("fa-circle-notch");
                    }
                }
            })

            $(".sendOtpToRegister").click(function(){
                let id = $('.id_account_add').val();
                let otp_code = $('input[name="otp_code_add"]').val();
                sendOTPCodeToVerify(id, otp_code);
            });
        }
    });


    // send phone to server => get OTP code to verify
    $(".verify_hide").hide();
    $(".vertify_pending").click(function(){
        let phone_number = $('input[name="phone_number"]').val();
        $(this).append(`<i style="padding:unset" class="fas fa-circle-notch fa-spin"></i>`);
        $(this).prop('disabled', true);

        $.ajax({
            type: "POST",
            url: "./createapp.php",
            data: {
                "phone": phone_number,
                "function": "requestSendCode",
            },
            success: function(data) {
                if (data && data > 0) {
                    $(".verify_show").hide(1500);
                    $('.id_account').val(data);
                    $(".verify_hide").show(2000);
                
                } 
                else if (data == 0 ){
                    Swal.fire('Thông báo', 'Tài khoản đã đăng nhập trước đó', 'success');
                    $(".vertify_pending").removeAttr("disabled");
                    $("i.fas.fa-circle-notch.fa-spin").removeClass("fa-circle-notch");
                } 
                else if (data == -1 ){
                    Swal.fire('Thông báo', 'Số điện thoại chưa được đăng ký', 'error');
                    $(".vertify_pending").removeAttr("disabled");
                    $("i.fas.fa-circle-notch.fa-spin").removeClass("fa-circle-notch");
                } 
                else {
                    Swal.fire('Lỗi', 'Đã xảy ra lỗi, xin thử lại sau', 'error');
                    $(this).prop('disabled', false);
                    $(".vertify_pending").removeAttr("disabled");
                    $("i.fas.fa-circle-notch.fa-spin").removeClass("fa-circle-notch");
                }
            }
        })
    });

    // send OTP to server => verify 
    $('.sendcodeotp').on('click', function() {
        sendOTPCodeToVerify($('.id_account').val(), $('input[name="otpcode"]').val());
    })

})


</script>