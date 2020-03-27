<?php 
    $id=isset($_GET['id'])?intval($_GET['id']):0;
    if ($id!=0){
    $url='http://192.168.1.13:3000/toolget/getinfowebsite?id='.$id;
    $curl=curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'Authorization: '.$_SESSION['user_token']
    ]);
    $response = json_decode(curl_exec($curl), true);
    $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
    if ($httpcode!=200)
    {
        header('Location: badrequest.php');
    }
    curl_close($curl);
} else header('Location: badrequest.php');
?>
<?php 
    $url='http://192.168.1.13:3000/toolget/listwordpress';
    $curl=curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'Authorization: '.$_SESSION['user_token']
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

            <div class="kt-portlet ">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-toolbar">
                        <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-success nav-tabs-line-2x" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php" role="tab" aria-selected="false">
                                    <i class="flaticon-bell"></i>Trang chủ
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" role="tab" aria-selected="true">
                                    <i class="flaticon-bell"></i>Xem thông tin website
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="kt-portlet__body">
                            <div class="row">
                                <!--begin::Portlet-->
                                <div class="col-12">
                                    <!--begin::Form-->
                                    <form class="kt-form kt-form--label-right">
                                        <div class="kt-portlet__body">
                                            <div class="form-group row form-group-marginless kt-margin-t-20">
                                                <label class="col-12 text-left"><strong>THÔNG TIN
                                                        WEBSITE:</strong></label> <br>
                                                <div class="col-lg-4">
                                                    <label>Tên website:</label>
                                                    <input readonly="readonly" type="text" class="form-control"
                                                        name="Name" value="<?php echo str_replace("<","&lt;",$response['Name']);?>">
                                                    <!-- <span class="form-text text-muted">Please enter </span> -->
                                                </div>
                                                <div class="col-lg-3">
                                                    <label class="">Ghi chú:</label>
                                                    <input readonly="readonly" type="text" class="form-control"
                                                        name="Note" value="<?php echo str_replace("<","&lt;",$response['Note']);?>">
                                                    <!-- <span class="form-text text-muted">Please enter </span> -->
                                                </div>
                                                <div class="col-lg-5"> </div>
                                                <div class="col-lg-4">
                                                    <label class="">Website lưu tin:</label>
                                                    <select disabled class="form-control kt-input type-dom" name="WP">
                                                        <?php
                                                                                if (!empty($listwp)) {
                                                                                    foreach ($listwp as $index => $post) {
                                                                                        if ($post['Id']==$response['IdWP'])
                                                                                        echo '<option value='.$post['Id'].'>'.$post['Name'].'</option>';
                                                                                    }
                                                                                }
                                                                            ?>
                                                    </select>
                                                    <!-- <span class="form-text text-muted">Please enter </span> -->
                                                </div>
                                                <div class="col-lg-3">
                                                    <label class="">ID Chuyên mục:</label>
                                                    <input readonly="readonly" type="text" class="form-control"
                                                        name="categories" value="<?php echo $response['Categories'];?>">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label class="">ID Tác giả đăng bài:</label>
                                                    <input readonly="readonly" type="text" class="form-control"
                                                        name="author" value="<?php echo $response['Author'];?>">
                                                </div>
                                                <div class="col-lg-1">
                                                    <label>Xóa liên kết: </label>
                                                    <input disabled type="checkbox" class="form-control"
                                                        name="deletelink" <?php if ($response['dellink']==1) echo 'checked';
                                                            ?>>
                                                </div>
                                                <div class="col-lg-1">
                                                    <label>Lưu ảnh: </label>
                                                    <input disabled type="checkbox" class="form-control"
                                                        name="deleteimage" <?php if ($response['saveimg']==1) echo 'checked';
                                                            ?>>
                                                </div>
                                            </div>
                                            <div
                                                class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit">
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 text-left"><strong>CẤU HÌNH LẤY DANH SÁCH BÀI
                                                        VIẾT:</strong></label> <br>
                                                <div class="col-lg-4">
                                                    <label>Đường dẫn bản tin:</label>
                                                    <input readonly="readonly" type="text" class="form-control"
                                                        name="Url" value="<?php echo str_replace("<","&lt;",$response['Url']);?>">
                                                    <!-- <span class="form-text text-muted">Please enter </span> -->
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Loại phân trang:</label>
                                                    <select disabled class="form-control kt-input type-pagination"
                                                        name="TypePage" data-col-index="2">
                                                        <?php 
                                                                            if ($response['TypePage']==1)
                                                                                echo '<option value="scroll">Scroll </option>';  
                                                                            else echo '<option value="number">Đánh số</option>';
                                                                        ?>
                                                    </select>
                                                    <!-- <span class="form-text text-muted">Please enter </span> -->
                                                </div>
                                                <?php 
                                                    if ($response['TypePage']==0) 
                                                    echo 
                                                    '<div class="col-lg-3 type-pagination-number">
                                                        <label>Kiểu đánh số:</label>
                                                        <input readonly="readonly" type="text" class="form-control"
                                                            name="NumberPage" value="'.str_replace("<","&lt;",$response['NumberPage']).'">
                                                    </div>';
                                                    else echo
                                                    '<div class="col-lg-3 type-pagination-scroll">
                                                        <label>Selector phân trang:</label>
                                                        <input readonly="readonly" type="text" class="form-control"
                                                            name="SelectLoadMore"
                                                            value="'.str_replace("<","&lt;",$response['SelectLoadMore']).'">
                                                    </div>
                                                    <div class="col-lg-2 type-pagination-numberpage">
                                                        <label>Số trang:</label>
                                                        <input readonly="readonly" type="text" class="form-control"
                                                            name="countPage" value="'.str_replace("<","&lt;",$response['NumberPage']).'">
                                                        <!-- <span class="form-text text-muted">Please enter </span> -->
                                                    </div>';
                                                ?>
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
                                                                    <input readonly="readonly" type="text"
                                                                        class="form-control" name="selectlist"
                                                                        value="<?php echo str_replace("<","&lt;",$response['SelectList']['select']);?>">
                                                                </div>
                                                                <!-- <span class="form-text text-danger">Enable clear and today helper buttons</span> -->
                                                            </div>
                                                            <div
                                                                class="col-lg-2 col-md-2 type-dom-detail kt-margin-b-5">
                                                                <select disabled class="form-control kt-input type-dom"
                                                                    name="typelist" data-col-index="2">
                                                                    <?php 
                                                                                                if ($response['SelectList']['type']==1)
                                                                                                    echo '<option value=1>Selector</option>  
                                                                                                    <option value=2>Xpath</option>';
                                                                                                else echo '<option value=2>Xpath</option>
                                                                                                         <option value=1>Selector</option>';
                                                                                            ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group col-lg-12 row list-dom-get-detail">
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
                                                                    <label><strong>Loại đường dẫn:</strong> </label>
                                                                </div>
                                                            </div>
                                                            <?php
                                                                                    if ($response['SelectDetail'])
                                                                                    foreach($response['SelectDetail'] as $detail)
                                                                                    {
                                                                                        echo '
                                                                                        <div class="col-lg-12 kt-margin-t-20 row">
                                                                                        <div class="col-lg-6 col-md-8    kt-margin-b-5">
                                                                                            <div class="input-group">
                                                                                                <input readonly="readonly" type="text" class="form-control" name="select[]" value= "'.str_replace("<","&lt;",$detail['select']).'">
                                                                                            </div>
                                                                                            <!-- <span class="form-text text-danger">Enable clear and today helper buttons</span> -->

                                                                                        </div>
                                                                                        <div class="col-lg-3 col-md-2 kt-margin-b-5">
                                                                                            <div class="input-group">
                                                                                                <input readonly="readonly" type="text" class="form-control" name="name[]" value="'.str_replace("<","&lt;",$detail['name']).'">
                                                                                            </div>
                                                                                            <!-- <span class="form-text text-danger">Enable clear and today helper buttons</span> -->

                                                                                        </div>
                                                                                        <div class="col-lg-2 col-md-1 type-dom-detail kt-margin-b-5">
                                                                                            <select disabled class="form-control kt-input type-dom" name="type[]" data-col-index="2">';
                                                                                            if ($detail['type']==1)
                                                                                                echo '<option value=1>Selector</option>  
                                                                                                    <option value=2>Xpath</option>';
                                                                                            else echo '<option value=2>Xpath</option>
                                                                                                     <option value=1>Selector</option>';
                                                                                            echo '
                                                                                                </select>
                                                                                        </div>
                                                                                        </div>';
                                                                                    };
                                                                                    ?>
                                                        </div>
                                                        <div class="form-group col-lg-12 row list-dom-replace">
                                                            <label class="col-12 text-left"><strong>THAY THẾ BẰNG
                                                                    TEXT:</strong></label>
                                                            <div class=" kt-margin-t-5 col-lg-12 row">
                                                                <div class="col-lg-6 col-md-6">
                                                                    <label> <strong>Chuỗi cần thay</strong></label>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6">
                                                                    <label><strong>Thay bằng chuỗi</strong></label>
                                                                </div>
                                                            </div>
                                                            <?php
                                                                                    if ($response['ReplaceText'])
                                                                                    foreach($response['ReplaceText'] as $detail)
                                                                                    {
                                                                                        echo '
                                                                                    <div class="col-lg-12 kt-margin-t-20 row">
                                                                                        <div class="col-lg-6 col-md-6 kt-margin-b-5">
                                                                                            <div class="input-group">
                                                                                                <input readonly="readonly" type="text" class="form-control" name="string[]" value="'.str_replace("<","&lt;",$detail['string']).'">
                                                                                            </div>
                                                                                            <!-- <span class="form-text text-danger">Enable clear and today helper buttons</span> -->

                                                                                        </div>
                                                                                        <div class="col-lg-5 col-md-5 kt-margin-b-5">
                                                                                            <div class="input-group">
                                                                                                <input readonly="readonly" type="text" class="form-control" name="stringreplace[]" value="'.str_replace("<","&lt;",$detail['stringreplace']).'"">
                                                                                            </div>
                                                                                            <!-- <span class="form-text text-danger">Enable clear and today helper buttons</span> -->

                                                                                        </div>
                                                                                    </div>';
                                                                                    };
                                                                                    ?>
                                                        </div>
                                                        <div class="form-group col-lg-12 row list-dom-replace-select">
                                                            <label class="col-12 text-left"><strong>THAY THẾ BẰNG
                                                                    ĐƯỜNG DẪN:</strong></label>
                                                            <div class=" kt-margin-t-5 col-lg-12 row">
                                                                <div class="col-lg-6 col-md-5">
                                                                    <label> <strong>Đường dẫn cần
                                                                            thay</strong></label>
                                                                </div>
                                                                <div class="col-lg-3 col-md-5">
                                                                    <label><strong>Thay bằng chuỗi</strong></label>
                                                                </div>
                                                                <div class="col-lg-2 col-md-2">
                                                                    <label><strong>Loại đường dẫn</strong></label>
                                                                </div>
                                                            </div>
                                                            <?php
                                                                                    if ($response['ReplaceSelect'])
                                                                                    foreach($response['ReplaceSelect'] as $detail)
                                                                                    {
                                                                                        echo '
                                                                                    <div class="col-lg-12 kt-margin-t-20 row">
                                                                                        <div class="col-lg-6 col-md-5 kt-margin-b-5">
                                                                                            <div class="input-group">
                                                                                                <input readonly="readonly" type="text" class="form-control" name="selectsel[]" value="'.str_replace("<","&lt;",$detail['select']).'">
                                                                                            </div>
                                                                                            <!-- <span class="form-text text-danger">Enable clear and today helper buttons</span> -->

                                                                                        </div>
                                                                                        <div class="col-lg-3 col-md-5 kt-margin-b-5">
                                                                                            <div class="input-group">
                                                                                                <input readonly="readonly" type="text" class="form-control" name="stringreplacesel[]" value="'.str_replace("<","&lt;",$detail['stringreplace']).'">
                                                                                            </div>
                                                                                            <!-- <span class="form-text text-danger">Enable clear and today helper buttons</span> -->

                                                                                        </div>
                                                                                    <div class="col-lg-2 col-md-2 type-dom-detail kt-margin-b-5">
                                                                                        <select disabled class="form-control kt-input type-dom" name="typesel[]" data-col-index="2">';
                                                                                            if ($detail['type']==1)
                                                                                            echo '<option value=1>Selector</option>  
                                                                                            <option value=2>Xpath</option> ';
                                                                                            else echo '<option value=2>Xpath</option>  
                                                                                            <option value=1>Selector</option>';
                                                                                        echo '                                    
                                                                                        </select>
                                                                                    </div>
                                                                                </div>';
                                                                                    };
                                                                                    ?>
                                                        </div>
                                                        <!-- kieu thoi gian -->
                                                        <div class="col-lg-10 kt-margin-t-20 row">
                                                            <label class="col-10 text-left"><strong>DANH SÁCH BÀI
                                                                    VIẾT</strong></label>
                                                        </div>
                                                        <div class="col-lg-10 kt-margin-t-20 row">
                                                            <div class="col-lg-1 col-md-1 kt-margin-b-5">
                                                                <label>
                                                                    <strong>STT</strong>
                                                                </label>
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 kt-margin-b-5">
                                                                <label>
                                                                    <strong>ID</strong>
                                                                </label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 kt-margin-b-5">
                                                                <label>
                                                                    <strong>Đường dẫn</strong>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <?php
                                                                            if ($response['ListWebsite'])
                                                                            foreach($response['ListWebsite'] as $index => $detail)
                                                                            {
                                                                                echo '
                                                                                <div class="col-lg-11 kt-margin-t-20 row">
                                                                                    <div class="col-lg-1 col-md-1 kt-margin-b-5">
                                                                                            <strong>'.($index+1).'</strong>
                                                                                    </div>
                                                                                    <div class="col-lg-1 col-md-1 kt-margin-b-5">
                                                                                            <strong>'.$detail['Id'].'</strong>
                                                                                    </div>
                                                                                    <div class="col-lg-8 col-md-8 kt-margin-b-5">
                                                                                            <a href="'.$detail['Content'].'">'.$detail['Link'].'</a>
                                                                                    </div>
                                                                                </div>';
                                                                            };
                                                                            ?>
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
            </div>

        </div>

        <!-- end:: Content -->
    </div>
</div>


<!-- begin:: Footer -->
<?php include 'footer.php';?>