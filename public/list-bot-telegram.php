<?php
    include 'header.php';
    include 'connection.php';
    $status = new Connection();
    $resbot = $status->connect('telbot/get');
?>
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
    <div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
        id="kt_content">

        <!-- begin:: Subheader -->
        <div class="kt-subheader kt-grid__item mb-5" id="kt_subheader">
            <div class="kt-container ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Bot telegram </h3>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="list-bot-telegram.php" class="kt-subheader__breadcrumbs-link">
                            Danh sách Bot </a>
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
                                Danh sách tài khoản
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_widget4_tab_all">
                                <div class="kt-scroll" data-scroll="true" data-height="400"
                                        style="height: 400px;">
                                    <div class="kt-list-timeline">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tên Website</th>
                                                        <th>Trạng thái</th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                            <?php 
                                            if (!empty($resbot)){
                                                foreach ($resbot as $index => $post) {   
                                                    echo '<tr>'.'<th scope="row">'.((int)$index+1).'</th>';
                                                    echo '<td> <label>'.str_replace("<","&lt;",$post['first_name']).'</label> </td>';
                                                    echo '<td> <label>'.str_replace("<","&lt;",$post['username']).'</label> </td>';
                                                    echo '<td> <span> <a title="Cấu hình" data-id='.$post['id'].' class="btn btn-sm btn-clean btn-icon btn-icon-sm editbot"><i class="fas fa-tools"></i></a>';
                                                                echo '<a title="Xóa" class="btn btn-sm btn-clean btn-icon btn-icon-sm del-bot" data-id='.$post['id'].'><i class="fas fa-trash"></i></a>'; 
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
    $('.del-bot').on('click', function() {
        Swal.fire({
            title: 'Xóa tài khoản BOT Telegram',
            text: "Mọi dữ liệu và hoạt động BOT đều không thể khôi phục. Xác nhận xóa?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                window.location.href = "deletebot.php?id="+$(this).data('id')
            }
            })
    });
    $('.editbot').on('click', function() {
        window.location.href = "editbot.php?id="+$(this).data('id');
    });
})
</script>

