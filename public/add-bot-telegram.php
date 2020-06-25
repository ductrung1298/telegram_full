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
                        <a href="list-bot-telegram.php" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="add-bot-telegram.php" class="kt-subheader__breadcrumbs-link">
                            Tạo BOT Telegram</a>
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
                                <a class="nav-link active" data-toggle="tab" href="#kt_portlet_base_demo_1_2_tab_content"
                                    role="tab" aria-selected="false">
                                    <i class="flaticon-users"></i> Tạo BOT Telegram
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                    <!-- end:: Notification 1-->
                    <div class="tab-pane active" id="kt_portlet_base_demo_1_3_tab_content" role="tabpanel">
                        <div class="kt-portlet__body">
                            <div class="row ">
                                <div class="kt-section col-12">
                                    <form class="kt-form kt-form--label-right">
                                        <div class="col-lg-12 text-center">
                                            <button type="button" class="btn btn-primary add_bot">Nhập mã Token</button>
                                            <button type="button" class="btn btn-primary create_bot">Tạo mới BOT</button>
                                        </div>
                                        <div class="add_bot_telegram" style="display:none;">
                                            <div class="kt-portlet__body">
                                                <div class="form-group row form-group-marginless kt-margin-t-20">
                                                    <label class="col-10 text-left"><strong>THÊM BOT TELEGRAM
                                                        </strong></label><br>
                                                    <div class="col-lg-5 mt-2">
                                                        <label>Mã Token BOT: </label>
                                                        <input type="text" class="form-control token" name="token">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-portlet__foot">
                                                <div class="kt-form__actions">
                                                    <div class="row">
                                                        <div class="col-lg-12 text-center">
                                                            <button type="button" class="btn btn-success addbot">Thêm
                                                                mới</button>
                                                            <button type="reset" class="btn btn-secondary cancel">Huỷ</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="create_bot_telegram" style="display:none;">
                                            <div class="kt-portlet__body">
                                                <div class="form-group row form-group-marginless kt-margin-t-20">
                                                    <label class="col-10 text-left"><strong>TẠO MỚI BOT TELEGRAM
                                                        </strong></label><br>
                                                    <div class="col-lg-5 mt-2">
                                                        <label>Tên hiển thị BOT: </label>
                                                        <input type="text" class="form-control" name="name_bot">
                                                    </div>
                                                    <div class="col-lg-5 mt-2">
                                                        <label>Username BOT (Yêu cầu kết thúc bằng `bot`): </label>
                                                        <input type="text" class="form-control" name="username_bot">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-portlet__foot">
                                                <div class="kt-form__actions">
                                                    <div class="row">
                                                        <div class="col-lg-12 text-center">
                                                            <button type="button" class="btn btn-success createbot">Thêm
                                                                mới</button>
                                                            <button type="reset" class="btn btn-secondary cancel_create">Huỷ</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__body">
                                                <label><strong>DANH SÁCH CÁC LỆNH: </strong>
                                                </label><br>
                                                <label><b>/start:</b> Đăng kí kênh.</label>
                                                <label><b>#mes:</b> Gửi tin nhắn cho tất cả người dùng đã đăng kí kênh. Cú pháp gửi tin: #mes (nội dung tin nhắn).</label>
                                                <label><b>Báo cáo:</b> Báo cáo số lượng bạn bè đã giới thiệu và toàn bộ người dùng đăng kí kênh. Nhập giá trị trường Chỉ định người dùng được nhấn báo cáo bằng 0 để cho phép tất cả mọi người đều có thể sử dụng tính năng.</label>
                                                <label><b>Kết nối cộng đồng:</b> Hiển thị danh sách các kênh kết nối.</label>
                                                <label><b>#getid:</b> Hiển thị id người dùng.</label>
                                                <label><b>{id}:</b> Thay thế {id} bằng id của người nhận tin nhắn.</label>
                                                <label><b>{displayname}:</b> Thay thế {displayname} bằng tên của người nhận tin nhắn.</label>
                                        </div>
                                    </form>
                                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit">
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
    $('.add_bot').click(function() {
        $('.create_bot_telegram').removeClass('display-block');
        $('.add_bot_telegram').removeClass('display-block');
        $('.add_bot_telegram').addClass('display-block');
    })
    $('.create_bot').click(function() {
        $('.add_bot_telegram').removeClass('display-block');
        $('.create_bot_telegram').removeClass('display-block');
        $('.create_bot_telegram').addClass('display-block');
    })
    $('.cancel_create').click(function() {
        $('.create_bot_telegram').removeClass('display-block');
    })
    $('.cancel').click(function() {
        $('.add_bot_telegram').removeClass('display-block');
    })
    $('.createbot').click(function() {
        if ($('input[name="name_bot"]').val() && $('input[name="username_bot"]').val()) 
        {
            $.ajax({
                type: "POST",
                url: "./createapp.php",
                data: {
                    "function": "createbot",
                    "usernamebot": $('input[name="username_bot"]').val(),
                    "namebot": $('input[name="name_bot"]').val(),
                },
                success: function(data) {
                    data=JSON.parse(data);
                    if (data.res=="success") {
                        Swal.fire({
                            position: 'inherit',
                            type: 'success',
                            title: 'Đăng kí thành công',
                            text: 'Đăng kí thành công bot '+$('input[name="name_bot"]').val()+", API Token: "+data.api,
                            showConfirmButton: true,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK!'
                        })
                        .then((result) => {
                            if (result && result.value) {
                                $.ajax({
                                    type: "POST",
                                    url: "./createapp.php",
                                    data: {
                                        "function": "addbot",
                                        "token": data.api,
                                    },
                                    success: function(data) {
                                        if (data == "success") {
                                            Swal.fire({
                                                position: 'inherit',
                                                type: 'success',
                                                title: 'Thêm mới BOT thành công',
                                                showConfirmButton: false,
                                                timer: 1500
                                                });
                                            window.location.href="list-bot-telegram.php";
                                        } 
                                        else
                                        if (data=="exist") Swal.fire({
                                            type: 'error',
                                            title: 'Lỗi',
                                            text: 'Tài khoản BOT đã tồn tại!',
                                            })
                                        else 
                                        Swal.fire({
                                        type: 'error',
                                        title: 'Lỗi',
                                        text: 'Không thể kết nối đến server, đăng kí thất bại',
                                        })
                                    }
                                })
                            }
                        })
                    }
                    else  
                    Swal.fire({
                        type: 'error',
                        title: 'Lỗi',
                        text: data.api,
                    })
                }
            })
        }
        else Swal.fire({
            type: 'error',
            title: 'Lỗi',
            text: 'Vui lòng nhập đầy đủ các trường',
        })
    })
    $('.addbot').on('click', function() {
        if ($('.token').val() != '') {
            $.ajax({
                type: "POST",
                url: "./createapp.php",
                data: {
                    "function": "addbot",
                    "token": $('.token').val(),
                },
                success: function(data) {
                    if (data == "success") {
                        Swal.fire({
                            position: 'inherit',
                            type: 'success',
                            title: 'Thêm mới BOT thành công',
                            showConfirmButton: false,
                            timer: 1500
                            });
                        window.location.href="list-bot-telegram.php";
                    } else
                    if (data=="exist") Swal.fire({
                        type: 'error',
                        title: 'Lỗi',
                        text: 'Tài khoản BOT đã tồn tại!',
                        })
                    else 
                    Swal.fire({
                    type: 'error',
                    title: 'Lỗi',
                    text: 'Không thể kết nối đến server, đăng kí thất bại',
                    })
                }
            })
        } else Swal.fire({
                type: 'error',
                title: 'Lỗi',
                text: 'Trường token không được rỗng',
                })
    });
    $('.btn-del-acc').on('click', function() {
        var ok = prompt('Vui lòng nhập mã CODE quản trị viên để xóa tài khoản', '');
        if (ok != '' && ok != null)
            window.location.href = 'deleteaccount.php?id=' + $(this).data('id') + '&code=' + ok;
        else if (ok == '')
            alert("Vui lòng nhập mã CODE để xóa. Liên hệ quản trị viên để có được mã CODE");
    });
    $('.btn-addaccount').on('click', function() {
        $('.bt-end').hide();
        $.ajax({
            type: "POST",
            url: "./createapp.php",
            data: {
                "phone": $(".phone").val(),
                "function": "addaccount",
                "api_id": Number($(".api_id").val()),
                "api_hash": $(".api_hash").val(),
            },
            success: function(data) {
                if (data) {
                    $('.otpcodeclass').addClass('display-block');
                    $('.btnsendcode').addClass('display-block');
                    $('.id_account').val(data);
                } else alert("Đã xảy ra lỗi, xin thử lại sau");
            }
        })
    })
    $('.sendcodeotp').on('click', function() {
        $.ajax({
            type: "POST",
            url: "./createapp.php",
            data: {
                "id": $('.id_account').val(),
                "function": "authcode",
                "code": $(".otpcode").val()
            },
            success: function(data) {
                if (data == "success") {
                    alert("Xác thực thành công");
                    location.reload();
                } else alert("Đã xảy ra lỗi, xin thử lại sau");
            }
        })
    })
    $('.del-bot').on('click', function() {
        var ok = prompt('Vui lòng nhập mã CODE quản trị viên để xóa cấu hình', '');
        if (ok!='' && ok!=null) 
            window.location.href = "deletebot.php?id="+$(this).data('id')+"&code="+ok;
        else if (ok=='') 
        alert("Vui lòng nhập mã CODE để xóa. Liên hệ quản trị viên để có được mã CODE");
    });
    $('.editbot').on('click', function() {
        var ok = prompt('Vui lòng nhập mã CODE quản trị viên để chỉnh sửa cấu hình', '');
        if (ok!='' && ok!=null) 
            window.location.href = "editbot.php?id="+$(this).data('id')+"&code="+ok;
        else if (ok=='') 
        alert("Vui lòng nhập mã CODE để chỉnh sửa. Liên hệ quản trị viên để có được mã CODE");
    });
})
</script>