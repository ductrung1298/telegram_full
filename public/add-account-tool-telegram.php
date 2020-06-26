<?php include 'header.php';?>
<!-- end:: Header -->
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
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_4_tab_content"
                                    role="tab" aria-selected="false">
                                    <i class="la la-user-plus"></i> Tạo mới tài khoản Telegram
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
                                                            <div class="col-lg-12 d-flex justify-content-center">
                                                                <button type="button" class="btn btn-outline-brand btn-square btn-elevate btn-pill sendOtpToRegister" style="display:none;">Xác nhận</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="overlay">
                                                    <div class="cv-spinner">
                                                        <span class="spinner"></span>
                                                    </div>
                                                </div>
                                                <div class="kt-portlet__body">
                                                    <div class="form-group row form-group-marginless kt-margin-t-20">
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>Truy cập vào <a style="color:blue; font-size:16px !important;" href="tele-document.php" target="_blank">👉đây</a> để biết cách lấy API_ID và API_HASH</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end:: Notification 1-->
                        
                        <div class="tab-pane active" id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">
                                        <label class="col-10 text-center">
                                            <h2>DANH SÁCH TÀI KHOẢN</h2>
                                        </label>
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tên</th>
                                                        <th>Họ</th>
                                                        <th>User_ID</th>
                                                        <th>Số điện thoại</th>
                                                        <th class="text-center"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
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
                                                        foreach ($response2 as $index => $post) {   
                                                            echo '<tr>'.'<th scope="row">'.((int)$index+1).'</th>';
                                                            echo '<td>'.str_replace("<","&lt;",$post['first_name']).'</td>';
                                                            echo '<td>'.str_replace("<","&lt;",$post['last_name']).'</td>';
                                                            echo '<td>'.str_replace("<","&lt;",$post['user_id']).'</td>';
                                                            echo '<td>'.str_replace("<","&lt;",$post['phone']).'</td>';
                                                            echo '<td class="d-flex justify-content-center" >';
                                                            echo '<a href="manager-account.php?id='.$post['Id'].'" class="btn btn-sm btn-info"><i class="flaticon-menu-2"></i> Chi tiết</a>';
                                                        echo '
                                                        </td>
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

                        <div class="tab-pane" id="kt_portlet_base_demo_1_2_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">
                                        <div class="row verify_show">
                                            <div class="col-6 form-group ">
                                                <label>Số điện thoại</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="phone_number" placeholder="+84xxxxxxxxxxx" aria-describedby="basic-addon2">
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
                                                <button type="button" class="btn btn-outline-success btn-elevate btn-pill sendcodeotp">Đăng nhập </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- begin tạo mới tài khoản telegram -->
                        <div class="tab-pane  " id="kt_portlet_base_demo_1_4_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">
                                        <form class="kt-form kt-form--label-right">
                                            <div class="kt-portlet__body">
                                                <div class="form-group row form-group-marginless kt-margin-t-20">
                                                    <div class="col-sm-12 row">
                                                        <div class="form-group col-6">
                                                            <label>MÃ TOKEN TÀI KHOẢN OTP SIM:</label>
                                                            <input type="text" class="form-control" name="token_register"
                                                                required="">
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label>NHÀ MẠNG:</label>
                                                            <select class="form-control" name="network">
                                                                <option value="5">Viettel</option>
                                                                <option value="6">Mobifone</option>
                                                                <option value="2">Vinaphone</option>
                                                                <option value="7">Vietnamobile</option>
                                                                <option value="8">Gmobile</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label>API_ID:</label>
                                                            <input type="text" class="form-control" name="api_id_register"
                                                                value="1391312">
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label>API_HASH:</label>
                                                            <input type="text" class="form-control" name="api_hash_register"
                                                                value="22fb1522a31b1f9eaaef6202ec102367">
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label>SỐ TÀI KHOẢN TẠO:</label>
                                                            <input type="number" class="form-control" name="count_register">
                                                        </div>
                                                        <div class="col-6"></div>
                                                        <div class="form-group col-6">
                                                            <label>TÊN TÀI KHOẢN FIRST_NAME:</label>
                                                            <input type="text" class="form-control" name="first_name_register">
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label>TÊN TÀI KHOẢN LAST_NAME:</label>
                                                            <input type="text" class="form-control" name="last_name_register">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="kt-portlet__foot">
                                                    <div class="kt-form__actions">
                                                        <div class="row">
                                                            <div class="col-lg-12 text-center bt-end">
                                                                <button type="button"
                                                                    class="btn btn-outline-brand btn-square btn-elevate btn-pill btn-register">Khởi tạo</button>
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
                        <!-- end tạo mới tài khoản telegram -->
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

    $('.btn-register').click(function() {
        if ($('input[name="token_register"]').val().length==0) {
            Swal.fire(
                'Lỗi...',
                'Mã token không được rỗng. Vui lòng đăng nhập địa chỉ http://otpsim.com để lấy mã token của tài khoản',
                'error',
            );
        }
        else 
        if (!($('input[name="count_register"]').val() > 0 )) {
            Swal.fire(
                'Lỗi...',
                'Số tài khoản tạo không được rỗng',
                'error',
            );
        }
        else {
            $.ajax( 
                {
                    url: "./createapp.php",
                    type: "POST",
                    data: {
                        "function": "register_account",
                        "token": $('input[name="token_register"]').val(),
                        "network": $('select[name="network"]').val(),
                        "api_id": $('input[name="api_id_register"]').val(),
                        "api_hash": $('input[name="api_hash_register').val(),
                        "count": $('input[name="count_register"]').val(),
                        "first_name": $('input[name="first_name_register"]').val(),
                        "last_name": $('input[name="last_name_register"]').val()
                    },
                    success: function (dt) {
                        if (dt) dt= JSON.parse(dt);
                        if (dt.status) {
                            Swal.fire(
                                'Success...',
                                'Yêu cầu tạo tài khoản thành công',
                                'success',
                            );
                            location.reload();
                        }
                        else Swal.fire(
                            'Lỗi...',
                            'Lỗi hệ thống không thể tạo tài khoản',
                            'error',
                        );
                    }
                }
            )
        }
    })

    // delete account
    $('.btn-del-acc').on('click', function() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
            title: 'Xác nhận xóa tài khoản?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes!',
            cancelButtonText: 'No!',
            reverseButtons: true
            }).then((result) => {
            if (result.value) {
                window.location.href = 'deleteaccount.php?id=' + $(this).data('id');
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                'Cancelled',
                '',
                'error'
                )
            }
            })
    });
   
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
                        $(".btn-addaccount").hide();
                        $('.btn-pill').hide();
                        $(".otp_form_hide").show(2000);
                        $('.id_account_add').val(data);
                        $(".sendOtpToRegister").addClass("display-block");
                    } 
                    else if (data ==-1 ){
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