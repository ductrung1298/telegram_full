<?php
    // session_start();
    // if (!isset($_SESSION['username'])) {
    //     header('Location: login.php');
    // }
?>
<?php 
    $url='localhost:3000/toolget/getlistwebsite';
    $curl=curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx'
    ]);
    $response = json_decode(curl_exec($curl), true);
    curl_close($curl);
    $news = ($response);
?>
<?php 
    $url='localhost:3000/toolget/listwordpress';
    $curl=curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx'
    ]);
    $response2 = json_decode(curl_exec($curl), true);
    curl_close($curl);
    $listwp = ($response2);
?>
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
                        Crawler Website </h3>
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
                                    <i class="flaticon-bell"></i> Trạng thái
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_2_tab_content"
                                    role="tab" aria-selected="false">
                                    <i class="flaticon-bell"></i> Cấu hình
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_3_tab_content"
                                    role="tab" aria-selected="false">
                                    <i class="flaticon-bell "></i> Nguồn dữ liệu
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="howtouse.php" role="tab" aria-selected="false">
                                    <i class="flaticon-bell "></i> Tài liệu hướng dẫn
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
                                        <span class="kt-section__info">
                                            Danh sách website lấy tin:
                                        </span>
                                        <div class="kt-section__content">
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
                        <!-- end:: Notification 1-->
                        <!-- begin:: Notification 3 -->
                        <div class="tab-pane" id="kt_portlet_base_demo_1_3_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row">
                                    <!--begin::Portlet-->
                                    <div class="col-12">
                                        <!--begin::Form-->
                                        <form class="kt-form kt-form--label-right"
                                            onsubmit="return confirm('Thực hiện thêm mới Website?');"
                                            action="request.php" method="post">
                                            <div class="kt-portlet__body">
                                                <div class="form-group row form-group-marginless kt-margin-t-20">
                                                    <label class="col-12 text-left"><strong>THÔNG TIN NGUỒN WEBSITE LẤY
                                                            TIN:</strong></label> <br>
                                                    <div class="col-lg-4">
                                                        <label>Tên nguồn website:</label>
                                                        <input type="text" class="form-control" name="Name"
                                                            placeholder="Tên nguồn website"
                                                            oninvalid="this.setCustomValidity('Trường Name không thể để rỗng')"
                                                            oninput="setCustomValidity('')" required="">
                                                        <!-- <span class="form-text text-muted">Please enter </span> -->
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label class="">Ghi chú:</label>
                                                        <input type="text" class="form-control" name="Note"
                                                            placeholder="Ghi chú">
                                                        <!-- <span class="form-text text-muted">Please enter </span> -->
                                                    </div>
                                                    <div class="col-lg-5"> </div>
                                                    <div class="col-lg-4">
                                                        <label class="">Cấu hình lưu tin:</label>
                                                        <select class="form-control kt-input type-dom" name="WP">
                                                            <?php
                                                                                if (!empty($listwp)) {
                                                                                    foreach ($listwp as $index => $post) {
                                                                                        echo '<option value='.$post['Id'].'>'.$post['Name'].'</option>';
                                                                                    }
                                                                                }
                                                                            ?>
                                                        </select>
                                                        <!-- <span class="form-text text-muted">Please enter </span> -->
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label class="">ID Chuyên mục:</label>
                                                        <input type="text" class="form-control" name="categories"
                                                            placeholder="Categories ID"
                                                            oninvalid="this.setCustomValidity('Trường Categories không thể để rỗng')"
                                                            oninput="setCustomValidity('')" required="">
                                                        <!-- <span class="form-text text-muted">Please enter </span> -->
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label class="">ID Tác giả đăng bài:</label>
                                                        <input type="text" class="form-control" name="author"
                                                            placeholder="Author ID"
                                                            oninvalid="this.setCustomValidity('Trường Tác giả không thể để rỗng')"
                                                            oninput="setCustomValidity('')" required="">
                                                        <!-- <span class="form-text text-muted">Please enter </span> -->
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <label>Xóa liên kết: </label>
                                                        <input type="checkbox" class="form-control" name="deletelink">
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <label>Lưu ảnh: </label>
                                                        <input type="checkbox" class="form-control" name="deleteimage">
                                                    </div>
                                                </div>
                                                <div
                                                    class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit">
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-12 text-left"><strong>CẤU HÌNH LẤY DANH SÁCH BÀI
                                                            VIẾT:</strong></label> <br>
                                                    <div class="col-lg-4">
                                                        <label>Đường dẫn nguồn tin:</label>
                                                        <input type="text" class="form-control" name="Url"
                                                            placeholder="Url.."
                                                            oninvalid="this.setCustomValidity('Trường URL không thể để rỗng')"
                                                            oninput="setCustomValidity('')" required="">
                                                        <!-- <span class="form-text text-muted">Please enter </span> -->
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label>Loại phân trang:</label>
                                                        <select class="form-control kt-input type-pagination"
                                                            name="TypePage" data-col-index="2">
                                                            <option value="scroll">Scroll </option>
                                                            <option value="number">Đánh số</option>

                                                        </select>
                                                        <!-- <span class="form-text text-muted">Please enter </span> -->
                                                    </div>
                                                    <div class="col-lg-3 type-pagination-number" style="display:none;">
                                                        <label>Kiểu đánh số:</label>
                                                        <input type="text" class="form-control" name="NumberPage"
                                                            placeholder="?page=1">
                                                        <!-- <span class="form-text text-muted">Please enter </span> -->
                                                    </div>
                                                    <div class="col-lg-3 type-pagination-scroll display-block"
                                                        style="display:none;">
                                                        <label>Selector phân trang:</label>
                                                        <input type="text" class="form-control" name="SelectLoadMore"
                                                            placeholder="div.loadmore">
                                                    </div>
                                                    <div class="col-lg-2 type-pagination-numberpage display-block"
                                                        style="display:none;">
                                                        <label>Số trang cần lấy:</label>
                                                        <input type="text" class="form-control" name="countPage"
                                                            placeholder="2">
                                                        <!-- <span class="form-text text-muted">Please enter </span> -->
                                                    </div>
                                                    <div class="col-12 kt-margin-t-20">
                                                        <div>
                                                            <div class="form-group row"
                                                                style="border: 2px solid #1dc9b7; padding-top: 1rem;">
                                                                <p
                                                                    style="position: absolute;transform: translate(10%,-100%); background-color: #fff; padding: 0.5rem;">
                                                                    <strong>CẤU HÌNH</strong></p>
                                                                <div class="form-group col-lg-12 row">
                                                                    <label class="col-12 text-left"><strong>LẤY DANH
                                                                            SÁCH</strong></label>

                                                                    <label><strong>Đường dẫn:</strong></label>
                                                                    <div class="col-lg-8">
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control"
                                                                                name="selectlist"
                                                                                placeholder="Enter ....."
                                                                                oninvalid="this.setCustomValidity('Trường đường dẫn không thể để rỗng')"
                                                                                oninput="setCustomValidity('')"
                                                                                required="">
                                                                        </div>
                                                                        <!-- <span class="form-text text-danger">Enable clear and today helper buttons</span> -->
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-2 col-md-2 type-dom-detail kt-margin-b-5">
                                                                        <select class="form-control kt-input type-dom"
                                                                            name="typelist" data-col-index="2">
                                                                            <option value=1>Selector</option>
                                                                            <option value=2>Xpath</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div
                                                                    class="form-group col-lg-12 row list-dom-get-detail">
                                                                    <label class="col-12 text-left"><strong>LẤY CHI
                                                                            TIẾT</strong></label>
                                                                    <div class="kt-margin-t-5 col-lg-12 row">
                                                                        <div class="col-lg-6 col-md-6">
                                                                            <label> <strong>Đường dẫn:</strong></label>
                                                                        </div>
                                                                        <div class="col-lg-3 col-md-3">
                                                                            <label><strong>Đặt tên:</strong> </label>
                                                                        </div>
                                                                        <div class="col-lg-2 col-md-2">
                                                                            <label><strong>Loại đường dẫn:</strong>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 kt-margin-t-20 row">
                                                                        <div class="col-lg-6 col-md-7    kt-margin-b-5">
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="select[]"
                                                                                    placeholder="div .class p">
                                                                            </div>
                                                                            <!-- <span class="form-text text-danger">Enable clear and today helper buttons</span> -->

                                                                        </div>
                                                                        <div class="col-lg-3 col-md-2 kt-margin-b-5">
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="name[]" placeholder="Title"
                                                                                    value="Title">
                                                                            </div>
                                                                            <!-- <span class="form-text text-danger">Enable clear and today helper buttons</span> -->

                                                                        </div>

                                                                        <div
                                                                            class="col-lg-2 col-md-1 type-dom-detail kt-margin-b-5">
                                                                            <select
                                                                                class="form-control kt-input type-dom"
                                                                                name="type[]" data-col-index="2">
                                                                                <option value=1>Selector</option>
                                                                                <option value=2>Xpath</option>

                                                                            </select>
                                                                        </div>
                                                                        <div
                                                                            class="col-lg-1 col-md-1 delete-dom-detail kt-margin-b-5">
                                                                            <i class="far fa-minus-square"
                                                                                style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 kt-margin-t-20 row">
                                                                        <div class="col-lg-6 col-md-7 kt-margin-b-5">
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="select[]"
                                                                                    placeholder="div .class p">
                                                                            </div>
                                                                            <!-- <span class="form-text text-danger">Enable clear and today helper buttons</span> -->

                                                                        </div>
                                                                        <div class="col-lg-3 col-md-2 kt-margin-b-5">
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="name[]" placeholder="Summary"
                                                                                    value="Summary">
                                                                            </div>
                                                                            <!-- <span class="form-text text-danger">Enable clear and today helper buttons</span> -->

                                                                        </div>

                                                                        <div
                                                                            class="col-lg-2 col-md-1 type-dom-detail kt-margin-b-5">
                                                                            <select
                                                                                class="form-control kt-input type-dom"
                                                                                name="type[]" data-col-index="2">
                                                                                <option value=1>Selector</option>
                                                                                <option value=2>Xpath</option>

                                                                            </select>
                                                                        </div>
                                                                        <div
                                                                            class="col-lg-1 col-md-1 delete-dom-detail kt-margin-b-5">
                                                                            <i class="far fa-minus-square"
                                                                                style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-12 kt-margin-t-20 row">
                                                                        <div class="col-lg-6 col-md-7 kt-margin-b-5">
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="select[]"
                                                                                    placeholder="div .class p">
                                                                            </div>
                                                                            <!-- <span class="form-text text-danger">Enable clear and today helper buttons</span> -->
                                                                        </div>
                                                                        <div class="col-lg-3 col-md-2 kt-margin-b-5">
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="name[]" placeholder=".....">
                                                                            </div>
                                                                            <!-- <span class="form-text text-danger">Enable clear and today helper buttons</span> -->

                                                                        </div>

                                                                        <div
                                                                            class="col-lg-2 col-md-1 type-dom-detail kt-margin-b-5">
                                                                            <select
                                                                                class="form-control kt-input type-dom"
                                                                                name="type[]" data-col-index="2">
                                                                                <option value=1>Selector</option>
                                                                                <option value=2>Xpath</option>

                                                                            </select>
                                                                        </div>
                                                                        <div
                                                                            class="col-lg-1 col-md-1 add-dom-detail kt-margin-b-5">
                                                                            <i class="far fa-plus-square"
                                                                                style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                                                        </div>
                                                                        <div class="col-lg-1 col-md-1 delete-dom-detail kt-margin-b-5"
                                                                            style="display:none;">
                                                                            <i class="far fa-minus-square"
                                                                                style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-lg-12 row list-dom-replace">
                                                                    <label class="col-12 text-left"><strong>THAY THẾ
                                                                            BẰNG TEXT:</strong></label>
                                                                    <div class=" kt-margin-t-5 col-lg-12 row">
                                                                        <div class="col-lg-6 col-md-6">
                                                                            <label> <strong>Chuỗi cần
                                                                                    thay</strong></label>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6">
                                                                            <label><strong>Thay bằng
                                                                                    chuỗi</strong></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 kt-margin-t-20 row">
                                                                        <div class="col-lg-6 col-md-6 kt-margin-b-5">
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="string[]"
                                                                                    placeholder="Chuỗi cần thay .....">
                                                                            </div>
                                                                            <!-- <span class="form-text text-danger">Enable clear and today helper buttons</span> -->

                                                                        </div>
                                                                        <div class="col-lg-5 col-md-5 kt-margin-b-5">
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="stringreplace[]"
                                                                                    placeholder="Thay bằng chuỗi .....">
                                                                            </div>
                                                                            <!-- <span class="form-text text-danger">Enable clear and today helper buttons</span> -->

                                                                        </div>
                                                                        <div class="col-lg-1 col-md-1 delete-dom-replace kt-margin-b-5"
                                                                            style="display: none;">
                                                                            <i class="far fa-minus-square"
                                                                                style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                                                        </div>
                                                                        <div
                                                                            class="col-lg-1 col-md-1 add-dom-replace kt-margin-b-5">
                                                                            <i class="far fa-plus-square"
                                                                                style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="form-group col-lg-12 row list-dom-replace-select">
                                                                    <label class="col-12 text-left"><strong>THAY THẾ
                                                                            BẰNG ĐƯỜNG DẪN:</strong></label>
                                                                    <div class=" kt-margin-t-5 col-lg-12 row">
                                                                        <div class="col-lg-6 col-md-5">
                                                                            <label> <strong>Đường dẫn cần
                                                                                    thay</strong></label>
                                                                        </div>
                                                                        <div class="col-lg-3 col-md-5">
                                                                            <label><strong>Thay bằng
                                                                                    chuỗi</strong></label>
                                                                        </div>
                                                                        <div class="col-lg-2 col-md-2">
                                                                            <label><strong>Loại đường
                                                                                    dẫn</strong></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 kt-margin-t-20 row">
                                                                        <div class="col-lg-6 col-md-5 kt-margin-b-5">
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="selectsel[]"
                                                                                    placeholder="Đường dẫn cần thay .....">
                                                                            </div>
                                                                            <!-- <span class="form-text text-danger">Enable clear and today helper buttons</span> -->

                                                                        </div>
                                                                        <div class="col-lg-3 col-md-5 kt-margin-b-5">
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control"
                                                                                    name="stringreplacesel[]"
                                                                                    placeholder="Thay bằng chuỗi .....">
                                                                            </div>
                                                                            <!-- <span class="form-text text-danger">Enable clear and today helper buttons</span> -->

                                                                        </div>
                                                                        <div
                                                                            class="col-lg-2 col-md-1 type-dom-detail kt-margin-b-5">
                                                                            <select
                                                                                class="form-control kt-input type-dom"
                                                                                name="typesel[]" data-col-index="2">
                                                                                <option value=1>Selector</option>
                                                                                <option value=2>Xpath</option>

                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-1 col-md-1 delete-dom-replace-select kt-margin-b-5"
                                                                            style="display: none;">
                                                                            <i class="far fa-minus-square"
                                                                                style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                                                        </div>
                                                                        <div
                                                                            class="col-lg-1 col-md-1 add-dom-replace-select kt-margin-b-5">
                                                                            <i class="far fa-plus-square"
                                                                                style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="kt-portlet__foot">
                                                    <div class="kt-form__actions">
                                                        <div class="row">
                                                            <div class="col-lg-12 text-center">
                                                                <button type="submit" class="btn btn-success">Thêm
                                                                    mới</button>
                                                                <button type="reset"
                                                                    class="btn btn-secondary">Huỷ</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        </form>

                                        <!--end::Form-->
                                    </div>
                                    <!--end::Portlet-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end:: Notification 3-->
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
                                <label class="col-10 text-left"><strong>DANH SÁCH CẤU HÌNH</strong></label>
                                <div class="kt-section__content">
                                    <table class="table">
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
                                                                    $url='localhost:3000/toolget/listwordpress';
                                                                    $curl=curl_init($url);
                                                                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                                                    curl_setopt($curl, CURLOPT_HTTPHEADER, [
                                                                        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                                        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx'
                                                                    ]);
                                                                    $response2 = json_decode(curl_exec($curl), true);
                                                                    curl_close($curl);
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
                <!-- end:: Notification 2-->
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
