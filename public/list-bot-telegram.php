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
                                Danh sách BOT
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
                                                        <th>Tên BOT</th>
                                                        <th>Username BOT</th>
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
                                                    echo '<td> <span> <a title="Cấu hình" data-id='.$post['id'].' class="btn btn-sm btn-clean btn-icon btn-icon-sm editbot"><i class="flaticon2-gear"></i></a>';
                                                        echo '<a title="Thống kê" href="log-bot-telegram.php?id='.$post['id'].'" class="btn btn-sm btn-clean btn-icon btn-icon-sm"><i class="flaticon-graphic-2"></i></a>'; 
                                                        echo '<a title="Xóa" class="btn btn-sm btn-clean btn-icon btn-icon-sm del-bot" data-id='.$post['id'].'><i class="flaticon2-trash"></i></a>'; 
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

