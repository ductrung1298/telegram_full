<?php include 'header.php';?>
<!-- end:: Header -->
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
                                <a class="nav-link active" data-toggle="tab"
                                    href="#kt_portlet_base_demo_1_1_tab_content" role="tab" aria-selected="true">
                                    <i class="flaticon-bell"></i> Tài khoản
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" 
                                    href="#kt_portlet_base_demo_1_2_tab_content" role="tab" aria-selected="true">
                                    <i class="flaticon-bell"></i> Tài khoản
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
                                        <form class="kt-form kt-form--label-right">
                                            <div class="kt-portlet__body">
                                                <div class="form-group row form-group-marginless kt-margin-t-20">
                                                    <label class="col-10 text-left"><strong>THÊM TÀI KHOẢN
                                                        </strong></label><br>
                                                    <div class="col-lg-5">
                                                        <label>Số điện thoại:</label>
                                                        <input type="text" class="form-control phone" name="phone"
                                                            placeholder="+84xxxxxxxxx"
                                                            oninvalid="this.setCustomValidity('Trường số điện thoại không thể để rỗng')"
                                                            oninput="setCustomValidity('')" required="" value="+84966315840">
                                                    </div>
                                                    <div class="col-lg-5"> </div>
                                                    <div class="col-lg-5 mt-2">
                                                        <label>API_ID:</label>
                                                        <input type="text" class="form-control api_id" name="api_id"
                                                            placeholder="xxxxxxx" value="1203697">
                                                    </div>
                                                    <div class="col-lg-5 mt-2">
                                                        <label>API_HASH:</label>
                                                        <input type="text" class="form-control api_hash" name="api_hash"
                                                            placeholder="xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx">
                                                    </div>
                                                    <div class="col-lg-5 mt-2 otpcodeclass" style="display:none;">
                                                        <label>OTP CODE:</label>
                                                        <input type="text" class="form-control otpcode">
                                                    </div>
                                                    <div class="col-lg-12 mt-5 text-center btnsendcode"
                                                        style="display:none;">
                                                        <div class="row justify-content-center">
                                                            <button type="button"
                                                                class="btn btn-success sendcodeotp">Gửi</button>
                                                        </div>
                                                    </div>
                                                    <div class="id_account" style="display:none;">
                                                    </div>
                                                </div>
                                                <div class="kt-portlet__foot">
                                                    <div class="kt-form__actions">
                                                        <div class="row">
                                                            <div class="col-lg-12 text-center bt-end">
                                                                <button type="button"
                                                                    class="btn btn-success btn-addaccount">Thêm
                                                                    mới</button>
                                                                <button type="reset"
                                                                    class="btn btn-secondary">Huỷ</button>
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
                                    <div
                                        class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit">
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end:: Notification 1-->
                    <!-- begin:: Notification 1 -->
                    <div class="tab-pane " id="kt_portlet_base_demo_1_2_tab_content" role="tabpanel">
                        <div class="kt-portlet__body">
                            <div class="row ">
                            
                            </div>
                        </div>
                    </div>
                    <!-- end:: Notification 2 -->
                    
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

    $('.addbot').on('click', function() {
        if ($('.token').val() != '') {
            var connect=[];
            $('input[name="text"]').map(function() {
                if ($(this).val()!='')
                connect.push({"text": $(this).val()})
            })
            let index=0;
            $('input[name="url"]').map(function() {
                if (connect[index])
                connect[index].url=$(this).val();
                index++;
            })
            let greeting=[];
            $('input[name="loichao"').map(function() {
                if ($(this).val()!='')
                greeting.push({"text": $(this).val()})
            })
            index=0;
            $('input[name="checkid"]').map(function() {
                if (greeting[index])
                greeting[index].userid=($(this).prop('checked')==true)?1:0;
                index++;
            })
            $.ajax({
                type: "POST",
                url: "./createapp.php",
                data: {
                    "function": "addbot",
                    "token": $('.token').val(),
                    "idbaocao": $('.idbaocao').val(),
                    "greeting": JSON.stringify(greeting),
                    "invitation": ($('.invitation').prop('checked') ==true)?1:0,
                    "connect": JSON.stringify(connect)
                },
                success: function(data) {
                    if (data == "success") {
                        alert("Đăng kí thành công");
                        location.reload();
                    } else
                    if (data=="exist") alert("Tài khoản Bot đã tồn tại");
                    else 
                    alert("Đăng kí thất bại");
                }
            })
        } else alert("Trường mã token không được để rỗng");
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