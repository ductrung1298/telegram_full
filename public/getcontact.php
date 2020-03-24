<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$id=isset($_GET['id'])?intval($_GET['id']):0;
if ($id!=0)
{
$url='localhost:3000/telegram/getcontact?id='.$id;
    $curl=curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx'
    ]);
    $response=json_decode(curl_exec($curl), true);
    $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
    curl_close($curl);
    if ($httpcode==500)
            header('Location: loginerror.php');
    else if ($httpcode!=200)
        header('Location: badrequest.php');
    else 
        include 'header.php';
}
else header('Location: badrequest.php');
?>
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
                                <a class="nav-link" href="telegram.php" role="tab" aria-selected="false">
                                    <i class="flaticon-bell"></i>Tài khoản
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab"
                                    href="#kt_portlet_base_demo_1_1_tab_content" role="tab" aria-selected="true">
                                    <i class="flaticon-bell"></i>Danh bạ
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_2_tab_content"
                                    role="tab" aria-selected="false">
                                    <i class="flaticon-bell"></i> Thêm danh bạ
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_3_tab_content"
                                    role="tab" aria-selected="false">
                                    <i class="flaticon-bell"></i> Thêm nhóm người dùng
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
                                    <div class="kt-section col-12">
                                        <span class="kt-section__info">
                                            Nhóm người dùng
                                        </span>
                                        <div class="kt-section__content">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tên nhóm người dùng</th>
                                                        <th>Số lượng thành viên</th>
                                                        <th>Ngày tạo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $url2='localhost:3000/telegram/getlistgroupcontact?id='.$id;
                                                    $curl2=curl_init($url2);
                                                    curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
                                                    curl_setopt($curl2, CURLOPT_HTTPHEADER, [
                                                    'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                    'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx'
                                                    ]);
                                                    $response2=json_decode(curl_exec($curl2), true);
                                                    $httpcode2=curl_getinfo($curl2,CURLINFO_HTTP_CODE);
                                                    curl_close($curl2);
                                                    if (isset($response2))
                                                    foreach($response2 as $index => $list) {
                                                        echo '<tr>
                                                            <th scope="row">'.((int)$index+1).'</th>
                                                            <td>
                                                                <a href="groupcontact.php?id='.$list["Id"].'&user='.$id.'" >'.str_replace("<","&lt;",$list['Name']).'</a>
                                                                </td>
                                                            <td><label>'.$list["length"].'</label></td>
                                                            <td><label>'.date("d/M/Y h:i:s",strtotime($list["createAt"])).'</label></td>
                                                        </tr>    
                                                                ';
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit">
                                                </div>
                                        <span class="kt-section__info">
                                            Danh bạ &nbsp;&nbsp;&nbsp;
                                            <button type="button" id="exportfile" class="exportfile">Export CSV  
                                            </button>
                                        </span>
                                        <div class="kt-section__content">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>First_name</th>
                                                        <th>Last_name</th>
                                                        <th>Phone_Number</th>
                                                        <th>User_Name</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach($response as $index => $contact)
                                                    {
                                                    echo ' <tr>
                                                        <th scope="row">'.((int)$index+1).'</th>
                                                            <td>'.(isset($contact['first_name'])?str_replace("<","&lt;",$contact['first_name']):'').'
                                                            </td>
                                                            <td>'.(isset($contact['last_name'])?str_replace("<","&lt;",$contact['last_name']):'').'
                                                            </td>
                                                            <td>'.(isset($contact['phone'])?$contact['phone']:'').'
                                                            </td>
                                                            <td>'.(isset($contact['username'])?str_replace("<","&lt;",$contact['username']):'').'
                                                            </td>
                                                        </tr>';
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="kt_portlet_base_demo_1_2_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">
                                        <form class="kt-form kt-form--label-right" onsubmit="return beforeSubmit();" 
                                        action="addcontact.php" method="post"
                                            enctype="multipart/form-data">
                                            <span class="kt-section__info">
                                                Thêm danh bạ
                                            </span>
                                            <div class="kt-section__content">
                                                <div class="form-group col-lg-15 row list-contact">
                                                    <div class=" kt-margin-t-5 col-lg-12 row">
                                                        <div class="col-lg-3 col-md-5">
                                                            <label> <strong>Số điện thoại
                                                                </strong></label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-5">
                                                            <label><strong>First_Name</strong></label>
                                                        </div>
                                                        <div class="col-lg-2 col-md-2">
                                                            <label><strong>Last_Name
                                                                </strong></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 kt-margin-t-20 row">
                                                        <input type="hidden" name="id" value=<?php echo $id?>>
                                                        <div class="col-lg-3 input-group">
                                                            <input type="text" class="form-control" name="phone[]"
                                                                placeholder="+84xxxxxxxxx">
                                                        </div>
                                                        <div class="col-lg-3 input-group">
                                                            <input type="text" class="form-control" name="first_name[]"
                                                                placeholder="First_name">
                                                        </div>
                                                        <div class="col-lg-3 input-group">
                                                            <input type="text" class="form-control" name="last_name[]"
                                                                placeholder="Last_name">
                                                        </div>
                                                        <div class="col-lg-1 col-md-1 delete-phone kt-margin-b-5"
                                                            style="display: none;">
                                                            <i class="far fa-minus-square"
                                                                style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                                        </div>
                                                        <div class="col-lg-1 col-md-1 add-phone kt-margin-b-5">
                                                            <i class="far fa-plus-square"
                                                                style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label for="myfile">Thêm từ file:</label>
                                                <input type="file" id="myfile" name="myfile"
                                                    accept=".csv">
                                                <div class="form-group col-lg-15 mt-3 row">
                                                    <div class="col-lg-3">
                                                        <label>Vị trí trường Phone</label>
                                                        <input type="number" class="form-control" name="index_phone"
                                                        value="1">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label>Vị trí trường First_Name</label>
                                                        <input type="number" class="form-control" name="index_firstname"
                                                        value="2">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label>Vị trí trường Last_Name</label>
                                                        <input type="number" class="form-control" name="index_lastname"
                                                        value="3">
                                                    </div>
                                                </div>
                                                <label for="groupcontact">Thêm vào nhóm liên hệ:</label>
                                                    <select class="kt-input col-lg-2 mb-3 groupcontact"
                                                        name="groupcontact">
                                                        <option value=-1>-Không sử dụng-</option>
                                                        <option value=0>-Tạo mới-</option>
                                                        <?php
                                                            $url2='localhost:3000/telegram/getlistgroupcontact?id='.$id;
                                                            $curl2=curl_init($url2);
                                                            curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
                                                            curl_setopt($curl2, CURLOPT_HTTPHEADER, [
                                                            'X-RapidAPI-Host:
                                                            contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx'
                                                            ]);
                                                            $response2=json_decode(curl_exec($curl2), true);
                                                            $httpcode2=curl_getinfo($curl2,CURLINFO_HTTP_CODE);
                                                            curl_close($curl2);
                                                            if (isset($response2))
                                                            foreach($response2 as $index) {
                                                            echo '<option value='.$index['Id'].'>'.str_replace("<","&lt;",$index['Name']).'
                                                            </option>';
                                                            }
                                                        ?>
                                                    </select>
                                                    <div class="col-lg-3 namegroup" style="display:none;">
                                                        <label>Tên nhóm liên hệ</label>
                                                        <input type="text" class="form-control" name="name_group">
                                                    </div>
                                            </div>
                                            <div class="kt-portlet__foot">
                                                <div class="kt-form__actions">
                                                    <div class="row">
                                                        <div class="col-lg-12 text-center">
                                                            <button type="submit" class="btn btn-success">Thêm
                                                            </button>
                                                            <button type="reset" class="btn btn-secondary">Huỷ</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="kt_portlet_base_demo_1_3_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">
                                        <form class="kt-form kt-form--label-right"> 
                                            <span class="kt-section__info">
                                                Thêm nhóm liên hệ
                                            </span>
                                            <div class="kt-section__content">
                                                <div class="form-group col-lg-15 row list-contact">
                                                    <div class=" kt-margin-t-5 col-lg-12 row">
                                                        <div class="col-lg-4 col-md-5">
                                                            <label>Tên nhóm liên hệ
                                                                </label>
                                                        </div>
                                                    <div class="col-lg-12 kt-margin-t-20 row">
                                                        <div class="col-lg-4 input-group">
                                                            <input type="text" class="form-control" name="name"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-portlet__foot">
                                                <div class="kt-form__actions">
                                                    <div class="row">
                                                        <div class="col-lg-12 text-center">
                                                            <button type="button" class="btn btn-success addgroupcontact">Thêm
                                                            </button>
                                                            <button type="reset" class="btn btn-secondary">Huỷ</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
<?php include 'footer.php'; ?>
<script type="text/javascript">
    function beforeSubmit(){
            if ($('#myfile').val())
            {
            var ext = $('#myfile').val().split('.').pop().toLowerCase();
            if(ext!=='csv') {
                alert('Vui lòng nhập đúng định dạng file csv');
                return false;
            }
            else return confirm('Thực hiện thêm danh bạ?');
        }
        else return confirm('Thực hiện thêm danh bạ?'); 
    }
</script>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $("select.groupcontact").change(function() {
        let selected = $(this).children("option:selected").val();
        if (selected == 0) {
            $(".namegroup").addClass("display-block");
        } else {
            $(".namegroup").removeClass("display-block");
        }
    });
    $('.addgroupcontact').on('click', function(){
        if ($('input[name=name]').val()=='') alert("Trường tên nhóm liên hệ không được rỗng");
        else {
        $('.addgroupcontact').hide();
        $.ajax({
            url: "./createapp.php",
            type: "POST",
            data: {
                "function": "addgroupcontact",
                "name": $('input[name=name]').val(),
                "id": <?php echo $id; ?>
            },
            success: function(dt) {
                if (dt==1) {
                    alert("Thêm nhóm liên hệ " + $('input[name=name]').val() + " thành công");
                    location.reload();
                }
            }
        })
    }
    })
})
</script>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $("#exportfile").on("click", function() {
        var ok=confirm('Tải xuống danh bạ?');
        if (ok==true) {
        <?php
            $filename="./export/contact_id=".$id."_".date("Y-m-d").".csv";
            $output=fopen($filename, "w");
            fputs($output, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
            foreach($response as $contact) {
                fputcsv($output, array(isset($contact['phone'])?$contact['phone']:'', isset($contact['first_name'])?$contact['first_name']:'', isset($contact['last_name'])?$contact['last_name']:'', isset($contact['username'])?$contact['username']:''));
            }
            fclose($output);
            echo 'window.location="'.$filename.'"';
        ?>
        }
    })
})
</script>