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
                        Bot telegram </h3>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="add-bot-telegram.php" class="kt-subheader__breadcrumbs-link">
                            Tạo tài khoản </a>
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
                                    <i class="flaticon-users"></i> Tạo tài khoản
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        
                    <!-- end:: Notification 1-->
                    
                    <!-- end:: Notification 2 -->
                    <div class="tab-pane active" id="kt_portlet_base_demo_1_3_tab_content" role="tabpanel">
                        <div class="kt-portlet__body">
                            <div class="row ">
                                <div class="kt-section col-12">
                                    <form class="kt-form kt-form--label-right">
                                        <div class="kt-portlet__body">
                                            <div class="form-group row form-group-marginless kt-margin-t-20">
                                                <label class="col-10 text-left"><strong>THÊM BOT TELEGRAM
                                                    </strong></label><br>
                                                <div class="col-lg-5 mt-2">
                                                    <label>Mã Token BOT: </label>
                                                    <input type="text" class="form-control token" name="token">
                                                </div>
                                                <div class="col-lg-5 mt-2"> </div>
                                                <div class="form-group col-lg-12 row mt-4 loichao">
                                                    <label class="col-12 text-left">Lời chào khi đăng kí kênh:</label>
                                                    <div class="col-lg-12 kt-margin-t-20 row">
                                                        <div class="col-lg-9 col-md-7 kt-margin-b-5">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    name="loichao" placeholder="Chào mừng bạn đã đến với ...">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-md-1">
                                                            <div class="input-group">
                                                                <label for="checkid" class="form-control"><input type="checkbox" id="checkid" name="checkid"> Đính kèm mã ID</label> 
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1 col-md-1 add-loichao kt-margin-b-5">
                                                            <i class="far fa-plus-square"
                                                                style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                                        </div>
                                                        <div class="col-lg-1 col-md-1 delete-loichao kt-margin-b-5"
                                                            style="display:none;">
                                                            <i class="far fa-minus-square"
                                                                style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Đính kèm danh sách kết nối cộng đồng: </label>
                                                    <input type="checkbox" class="col-lg-3 form-control invitation">
                                                </div>
                                                <div class="form-group col-lg-12 row mt-4 ketnoi">
                                                    <div class="kt-margin-t-5 col-lg-12 row">
                                                        <div class="col-lg-6 col-md-6">
                                                            <label>Text hiển thị:</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3">
                                                            <label>Đường dẫn:</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 kt-margin-t-20 row">
                                                        <div class="col-lg-6 col-md-7 kt-margin-b-5">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    name="text" placeholder="Tên website">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5 col-md-2 kt-margin-b-5">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    name="url" placeholder="https://eplus.vn/">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1 col-md-1 add-url kt-margin-b-5">
                                                            <i class="far fa-plus-square"
                                                                style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                                        </div>
                                                        <div class="col-lg-1 col-md-1 delete-url kt-margin-b-5"
                                                            style="display:none;">
                                                            <i class="far fa-minus-square"
                                                                style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <label>Báo cáo: Chỉ định ID người dùng được nhấn báo cáo (0 để cho phép tất cả): </label>
                                                    <input type="number" class="form-control idbaocao" value="0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__foot">
                                            <div class="kt-form__actions">
                                                <div class="row">
                                                    <div class="col-lg-12 text-center">
                                                        <button type="button" class="btn btn-success addbot">Thêm
                                                            mới</button>
                                                        <button type="reset" class="btn btn-secondary">Huỷ</button>
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