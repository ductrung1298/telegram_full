<?php 
    include 'header.php';
    include 'connection.php';
?>

<?php 
    $result = new Connection();
    $response2 = $result->connect('toolget/listwordpress') ;

?>

<!-- end:: Header -->
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
    <div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
        id="kt_content">

        <!-- begin:: Subheader -->
        <div class="kt-subheader mb-5  kt-grid__item" id="kt_subheader">
            <div class="kt-container ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Crawler Website </h3>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="crawb-status.php" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="crawb-config.php" class="kt-subheader__breadcrumbs-link">
                            Cấu hình </a>
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
                                    <i class="flaticon-bell"></i> Danh sách
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_2_tab_content"
                                    role="tab" aria-selected="false">
                                    <i class="flaticon-bell"></i> Thêm mới cấu hình
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
                                    <label class="col-10 text-left"><strong>DANH SÁCH CẤU HÌNH</strong></label>
                                    <div class="kt-section__content">
                                        <table class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tên</th>
                                                    <th>Địa chỉ</th>
                                                    <th>Phương thức lưu trữ</th>
                                                    <th>Địa chỉ database</th>
                                                    <th>Tên database</th>
                                                    <th>Tên đăng nhập</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    
                                                    if (!empty($response2)) {
                                                        foreach ($response2 as $index => $post) {   
                                                            echo '<tr>'.'<th scope="row">'.((int)$index+1).'</th>';
                                                            echo '<td> <label>'.$post['Name'].'</label> </td>';
                                                            echo '<td> <label>'.$post['Url'].'</label> </td>';
                                                            if ($post['typesave']==0)
                                                                echo '<td> <label>SỬ DỤNG WORDPRESS REST API</label> </td>';
                                                            else echo '<td> <label>LƯU TRỰC TIẾP VÀO DATABASE</label> </td>';
                                                            echo '<td> <label>'.$post['DBHost'].'</label> </td>';
                                                            echo '<td> <label>'.$post['DBName'].'</label> </td>';
                                                            echo '<td> <label>'.$post['username'].'</label> </td>';
                                                            echo '<td> <a title="Delete" data-id='.$post['Id'].' class="btn btn-sm btn-clean btn-icon btn-icon-sm btn-del-wp"><i class="fas fa-trash"></i></a></td>';
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
                        <!-- end:: Notification 1-->
                        <!-- begin:: Notification 2 -->
                        <div class="tab-pane" id="kt_portlet_base_demo_1_2_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">
                                        <form class="kt-form kt-form--label-right"
                                            onsubmit="return confirm('Thực hiện thêm mới cấu hình?');"
                                            action="requestwp.php" method="post">
                                            <div class="kt-portlet__body">
                                                <div class="form-group row form-group-marginless kt-margin-t-20">
                                                    <label class="col-10 text-left"><strong>TÙY CHỌN CẤU HÌNH LƯU
                                                            TIN:</strong></label><br>
                                                    <div class="col-lg-5">
                                                        <label>Phương thức lưu tin:</label>
                                                        <select class="form-control kt-input type-save" name="typesave">
                                                            <option value=0>SỬ DỤNG WORDPRESS REST API</option>
                                                            <option value=1>LƯU TRỰC TIẾP VÀO DATABASE</option>
                                                        </select>
                                                    </div>
                                                    <label class="col-10 text-left mt-4"><strong>THÔNG TIN CẤU
                                                            HÌNH:</strong></label> <br>
                                                    <div class="col-lg-5">
                                                        <label>Tên cấu hình:</label>
                                                        <input type="text" class="form-control" name="Name"
                                                            placeholder="Tên cấu hình"
                                                            oninvalid="this.setCustomValidity('Trường name không thể để rỗng')"
                                                            oninput="setCustomValidity('')" required="">
                                                        <!-- <span class="form-text text-muted">Please enter </span> -->
                                                    </div>
                                                    <div class="col-lg-5 diachi-luutin display-block" style="display:none;">
                                                        <label>Địa chỉ Website lưu tin:</label>
                                                        <input type="text" class="form-control" name="Url-luu"
                                                            placeholder="Địa chỉ Website lưu tin">
                                                        <!-- <span class="form-text text-muted">Please enter </span> -->
                                                    </div>
                                                    <div class="col-lg-5 diachi-chaytool" style="display:none;">
                                                        <label>Địa chỉ Website lưu tin:</label>
                                                        <input type="text" class="form-control" name="Url-web"
                                                            placeholder="Địa chỉ Website lưu tin">
                                                        <!-- <span class="form-text text-muted">Please enter </span> -->
                                                    </div>
                                                    <label class="col-10 text-left mt-4 option-api display-block"
                                                        style="display:none;"><strong>TÀI KHOẢN ĐĂNG NHẬP TRANG QUẢN LÍ
                                                            WORDPRESS:</strong></label> <br>
                                                    <label class="col-10 text-left mt-4 option-db"
                                                        style="display:none;"><strong>TÀI KHOẢN ĐĂNG NHẬP
                                                            DATABASE:</strong></label> <br>
                                                    <div class="col-lg-5 database-host" style="display:none;">
                                                        <label>Địa chỉ database:</label>
                                                        <input type="text" class="form-control" name="DBHost"
                                                            placeholder="Địa chỉ database">
                                                        <!-- <span class="form-text text-muted">Please enter </span> -->
                                                    </div>
                                                    <div class="col-lg-5 database-name" style="display:none;">
                                                        <label>Tên database:</label>
                                                        <input type="text" class="form-control" name="DBName"
                                                            placeholder="Database Name">
                                                        <!-- <span class="form-text text-muted">Please enter </span> -->
                                                    </div>
                                                    <div class="col-lg-5 mt-2">
                                                        <label>Tên đăng nhập:</label>
                                                        <input type="text" class="form-control" name="username"
                                                            placeholder="Tên đăng nhập"
                                                            oninvalid="this.setCustomValidity('Trường Userame không thể để rỗng')"
                                                            oninput="setCustomValidity('')" required="">
                                                        <!-- <span class="form-text text-muted">Please enter </span> -->
                                                    </div>
                                                    <div class="col-lg-5 mt-2">
                                                        <label>Mật khẩu:</label>
                                                        <input type="text" class="form-control" name="password"
                                                            placeholder="Mật khẩu"
                                                            oninvalid="this.setCustomValidity('Trường Password không thể để rỗng')"
                                                            oninput="setCustomValidity('')" required="">
                                                        <!-- <span class="form-text text-muted">Please enter </span> -->
                                                    </div>
                                                    <div class="col-lg-5 mt-2 database-socketpath" style="display:none;">
                                                        <label>Socket Path:</label>
                                                        <input type="text" class="form-control" name="socketpath"
                                                            placeholder="Socket Path">
                                                        <!-- <span class="form-text text-muted">Please enter </span> -->
                                                    </div>
                                                </div>
                                                <div class="kt-portlet__foot">
                                                    <div class="kt-form__actions">
                                                        <div class="row">
                                                            <div class="col-lg-12 text-center">
                                                                <button type="submit" class="btn btn-success">Thêm
                                                                    mới</button>
                                                                <button type="reset" class="btn btn-secondary">Huỷ</button>
                                                            </div>
                                                        </div>
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
                        <!-- end:: Notification 2-->
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
<script>
jQuery(document).ready(function($) {

    $('#kt_modal_5').on('show.bs.modal', function(e) {
        var Id = $(e.relatedTarget).data('id');
        if (Id)
            $("#data-id").val(Id).trigger("change");
    });

    $('.btn-stop-wb').on('click', function() {
        return confirm('Dừng quét website?');
    });

    $('.btn-del-wp').on('click', function() {
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
        title: 'Xác nhận xóa cấu hình lưu tin?',
        text: "Bạn không thể khôi phục dữ liệu sau khi xóa",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Xóa ngay',
        cancelButtonText: 'Hủy bỏ',
        reverseButtons: true
        }).then((result) => {
        if (result.value) {
            window.location.href = "deleteconfig.php?id="+$(this).data('id')
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Hủy bỏ',
            'Hủy bỏ thành công',
            'error'
            )
        }
        })
    });
})
</script>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('.btn-success').on('click', function() {
        // xoa khoang trang kieu danh so
        let numberpage = $('input[name="NumberPage"]').val();
        numberpage = numberpage.replace(" ", "");
        $('input[name="NumberPage"]').val(numberpage);
        // gan gia tri mac dinh cho so trang
        let page = $('input[name="countPage"]').val();
        if (page == "") $('input[name="countPage"]').val(1);
        //thay doi dau nhay kep thanh nhay don
        let value = $('input[name="selectlist"]').val();
        value = value.replace(/"/g, "\'");
        $('input[name="selectlist"]').val(value);
        $('input[name="select[]"]').each(function() {
            let value = $(this).val();
            value = value.replace(/"/g, "\'");
            $(this).val(value);
        })
        $('input[name="string[]"]').each(function() {
            let value = $(this).val();
            value = value.replace(/"/g, "\'");
            $(this).val(value);
        })
        $('input[name="stringreplace[]"]').each(function() {
            let value = $(this).val();
            value = value.replace(/"/g, "\'");
            $(this).val(value);
        })
        $('input[name="selectsel[]"]').each(function() {
            let value = $(this).val();
            value = value.replace(/"/g, "\'");
            $(this).val(value);
        })
        $('input[name="stringreplacesel[]"]').each(function() {
            let value = $(this).val();
            value = value.replace(/"/g, "\'");
            $(this).val(value);
        })
    })
})
</script>
