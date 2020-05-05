<?php
include 'header.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
    <div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
         id="kt_content">
        <!-- begin:: Subheader -->
        <div class="kt-subheader  mb-5 kt-grid__item" id="kt_subheader">
            <div class="kt-container ">
                <div class="kt-subheader__main">
                    <h4 class="kt-subheader__title">
                        Tool Telegram </h4>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="add-account-tool-telegram.php" class="kt-subheader__breadcrumbs-link">
                            Tài khoản </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            Danh bạ </a>
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
                                    <i class="flaticon2-group"></i>Graphics
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active " id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-label-instagram" data-toggle="modal"
                                                    data-target="#exampleModalCenter">
                                                <i class="fa fa-book"></i> Thêm graphic
                                            </button>
                                        </div>
                                    </div>
                                    <div class="kt-section col-12">
                                        <span class="kt-section__info">
                                            Graphics
                                        </span>
                                        <div class="tab-pane active" id="kt_widget4_top10_rating">
                                            <!-- <div class="kt-scroll" data-scroll="true" data-height="400" style="height: 400px;">
                                                <div class="kt-list-timeline">
                                                    <div class="table-responsive">
                                                        <div class="kt-section__content"> -->
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tiếng Việt</th>
                                                        <th>Tiếng Anh</th>
                                                        <th>Note</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php


                                                    $url4 = 'http://localhost:2020/telegram/get_graphics';
                                                    $curl4 = curl_init($url4);
                                                    curl_setopt($curl4, CURLOPT_RETURNTRANSFER, true);
                                                    curl_setopt($curl4, CURLOPT_HTTPHEADER, [
                                                        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                                                        'Authorization: ' . $_SESSION['user_token']
                                                    ]);
                                                    $response4 = json_decode(curl_exec($curl4), true);
                                                    $httpcode4 = curl_getinfo($curl4, CURLINFO_HTTP_CODE);
                                                    curl_close($curl4);
                                                    if($response4) {
                                                        foreach($response4 as $index => $graphic) {
                                                            echo '<tr><th>'.++$index.'</th>';
                                                            echo '<td>'.$graphic['name_vi'].'</td>';
                                                            echo '<td>'.$graphic['name_en'].'</td>';
                                                            echo '<td>'.$graphic['note'].'</td>';
                                                            echo '</tr>';
                                                        }
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- </div>
                                        </div>
                                    </div>
                                </div> -->
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
    <!--begin::Modal-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Thêm danh bạ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group form-group-marginless">
                        <label>Tên nhóm danh bạ</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="name" aria-describedby="basic-addon2">
                            <div class="input-group-append"><span class="input-group-text" id="basic-addon2"><i
                                        class="la la-group"></i></span></div>
                        </div>
                        <label>Mô tả</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="describe" aria-describedby="basic-addon3">
                            <div class="input-group-append"><span class="input-group-text" id="basic-addon3"><i
                                        class="fas fa-sticky-note"></i></span></div>
                        </div>
                        <label>Danh bạ</label>
                        <div class="input-group">
                            <select type="text" class="form-control" name="parent_id" aria-describedby="basic-addon4">
                                <option value="0">-- Root --</option>
                                <?php if (isset($response2))
                                    echo dequy($response2);
                                ?>
                            </select>
                            <div class="input-group-append"><span class="input-group-text" id="basic-addon4"><i
                                        class="fas fa-sticky-note"></i></span></div>
                        </div>
                        <label>Chuyên mục</label>
                        <div class="input-group">
                            <select multiple type="text" class="form-control" name="cat_id[]"
                                    aria-describedby="basic-addon4">
                                <!--                                <option value="0">-- Root --</option>-->
                                <?php if (isset($response4))
                                    echo dequycate($response4);
                                ?>
                            </select>
                            <div class="input-group-append"><span class="input-group-text" id="basic-addon4"><i
                                        class="fas fa-sticky-note"></i></span></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary addgroupcontact">Thêm mới</button>
                </div>
            </div>
        </div>
    </div>
    <!--end::Modal-->
</div>
<?php include 'footer.php'; ?>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('.addcat').on('click', function () {
            if ($('input[name="cat_name_vi"]').val() == '') alert("Trường tên chuyên mục liên hệ không được rỗng");
            else {
                $('.addcat').hide();
                $.ajax({
                    url: "./createapp.php",
                    type: "POST",
                    data: {
                        "function": "addcat",
                        "name_vi": $('input[name="cat_name_vi"]').val(),
                        "name_en": $('input[name="cat_name_en"]').val(),
                        "note": $('input[name="cat_note"]').val(),
                        "parent_id": $('select[name="cat_parent_id"]').val(),
                        "id": <?php echo $id; ?>
                    },
                    success: function (dt) {
                        if (dt == 1) {
                            Swal.fire(
                                'Thêm chuyên mục danh bạ',
                                'Thêm mới chuyên mục danh bạ thành công',
                                'success',
                            );
                            location.reload();
                        } else Swal.fire(
                            'Lỗi...',
                            'Lỗi khi thêm mới chuyên danh bạ',
                            'error',
                        );
                    }
                })
            }
        });
    })
</script>