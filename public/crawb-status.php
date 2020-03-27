<?php
    include 'header.php';
    include 'connection.php';
    $status = new Connection();
    $news = $status->connect('toolget/getlistwebsite');
?>

<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
    <div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
        id="kt_content">

        <!-- begin:: Subheader -->
        <div class="kt-subheader kt-grid__item mb-5" id="kt_subheader">
            <div class="kt-container ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Crawler Website </h3>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="crawb-status.php" class="kt-subheader__breadcrumbs-link">
                            Trạng thái </a>
                    </div>
                </div>

            </div>
        </div>
        <!-- end:: Subheader -->
        <!-- begin:: Content -->
        <div class="kt-container  kt-grid__item kt-grid__item--fluid">
            <div class="col-xl-12 col-lg-12 order-lg-2 order-xl-1 order-last">
                <!--begin:: Widgets/Audit Log-->
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Trạng thái của các website lấy tin
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_widget4_tab_all">
                                <div class="kt-scroll" data-scroll="true" data-height="400" style="height: 400px;">
                                    <div class="kt-list-timeline">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tên Website</th>
                                                        <th>Trạng thái</th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($news)) {
                                                        foreach ($news as $index => $post) {
                                                            if ($post['Status']==1)
                                                                $status='Running';
                                                            else 
                                                                $status= 'Stop';
                                                            echo '<tr>'.'<th scope="row">'.((int)$index+1).'</th>';
                                                            echo '<td> <a href="listwb.php?id='.$post['Id'].'" >'.$post['Name'].'</a> </td>';
                                                            if ($status=='Running') echo '<td><span><span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill">'.'Running'.'</span></span>';
                                                            else echo '<td><span><span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill">'.'Stop'.'</span></span>';
                                                            echo '</td>';
                                                            echo '<td>';
                                                                echo '<span>';
                                                                    echo '<a title="Edit" href="editwb.php?id='.$post['Id'].'" class="btn btn-sm btn-clean btn-icon btn-icon-sm"><i class="fas fa-edit"></i></a>';
                                                                    if ($status=='Running') echo '<a title="Stop" href="stop.php?id='.$post['Id'].'" class="btn btn-sm btn-clean btn-icon btn-icon-sm btn-stop-wb"><i class="fas fa-hand-paper"></i></a>';
                                                                    else echo '<a title="Running" class="btn btn-sm btn-clean btn-icon btn-icon-sm "data-toggle="modal" data-target="#kt_modal_5" data-id='.$post['Id'].'><i class="fas fa-play"></i></a>';
                                                                    echo '<a title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-sm btn-del-wb" data-id='.$post['Id'].'><i class="fas fa-trash"></i></a>';
                                                                echo '</span>';
                                                            echo '</td>';
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
                        
                    </div>
                </div>

                <!--end:: Widgets/Audit Log-->
                 <!--begin::Modal-->
                 <div class="modal fade" id="kt_modal_5" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" style="display: none;"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <form class="rowadd" onsubmit="return confirm('Xác nhận lấy tin?');"
                            action="runwb.php" method="POST">
                            <div class="modal-content">
                                <input type="hidden" value="" name="id" id="data-id" />
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Chọn điều
                                        kiện</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="row">
                                        <div class="col-lg-4">
                                            <label>Kiểu thời gian lấy tin:</label>
                                            <select class="form-control kt-input get-list-tool"
                                                name="select" data-col-index="2">
                                                <option value="daily">Daily</option>
                                                <option value="datetodate">Date to Date
                                                </option>
                                            </select>
                                            <!-- <span class="form-text text-muted">Please enter </span> -->
                                        </div>
                                        <div class="col-lg-4 date-to-date"
                                            style="display:none;">
                                            <label class="">Date to Date:</label>
                                            <div class="input-daterange input-group"
                                                id="kt_datepicker_5">
                                                <input type="text" class="form-control"
                                                    name="start" placeholder="Từ ngày"
                                                    autocomplete="off">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i
                                                            class="la la-ellipsis-h"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    name="end" placeholder="Đến ngày"
                                                    autocomplete="off">
                                            </div>
                                            <!-- <span class="form-text text-muted">Linked pickers for date range selection</span> -->
                                        </div>
                                        <div class="col-lg-4 set-time-run-auto display-block"
                                            style="display:none;">
                                            <label class="">Tự động chạy sau (Giờ):</label>
                                            <input type="text" class="form-control" name="time"
                                                placeholder="Giờ" value=2>
                                            <!-- <span class="form-text text-muted">Enable clear and today helper buttons</span> -->
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Hủy</button>
                                    <button type="submit" class="btn btn-primary">Lấy
                                        tin</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--end::Modal-->
            </div>
        </div>
    </div>
</div>
<?php 
    include 'footer.php';
?>
<script>
jQuery(document).ready(function($) {

    $('#kt_modal_5').on('show.bs.modal', function(e) {
        var Id = $(e.relatedTarget).data('id');
        if (Id)
            $("#data-id").val(Id).trigger("change");
    });
});
</script>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('.btn-del-wb').on('click', function() {
        var ok = prompt('Vui lòng nhập mã CODE quản trị viên để xóa cấu hình', '');
        if (ok!='' && ok!=null) 
            window.location.href = "deletewb.php?id="+$(this).data('id')+"&code="+ok;
        else if (ok=='') 
        alert("Vui lòng nhập mã CODE để xóa. Liên hệ quản trị viên để có được mã CODE");
    });
})
</script>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('.btn-stop-wb').on('click', function() {
        return confirm('Dừng quét website?');
    });

    $('.btn-del-wp').on('click', function() {
        var ok = prompt('Vui lòng nhập mã CODE quản trị viên để xóa cấu hình', '');
        if (ok!='' && ok!=null) 
            window.location.href = "deleteconfig.php?id="+$(this).data('id')+"&code="+ok;
        else if (ok=='')
            alert("Vui lòng nhập mã CODE để xóa. Liên hệ quản trị viên để có được mã CODE");
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
