
<?php
include 'header.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
$url='http://localhost:2020/telegram/get_list_user_telegram';
$curl=curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
    'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
    'Authorization: '.$_SESSION['user_token']
]);
$list_user_telegram=json_decode(curl_exec($curl), true);
$httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
curl_close($curl);

?>
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
    <div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
         id="kt_content">
        <!-- begin:: Subheader -->
        <div class="kt-subheader  mb-5 kt-grid__item" id="kt_subheader">
            <div class="kt-container ">
                <div class="kt-subheader__main">
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            Danh sách tệp khách hàng </a>
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
                                    <i class="flaticon2-group"></i>Danh sách tệp khách hàng
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#add_user_to_contact"
                                   role="tab" aria-selected="false">
                                    <i class="flaticon-users"></i> Thêm người dùng vào tệp khách hàng
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel">
                            <div class="kt-portlet__body pt-0">
                                <div class="row ">
                                    <div class="col-12 mb-3 px-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex">
                                                <div class="form-group mb-0">
                                                    <select class="form-control" name="action" id="exampleSelect1">
                                                        <option value="0">Hành động</option>
                                                        <option value="export">Export</option>
                                                        <option value="delete">Xoá</option>
                                                    </select>
                                                </div>
                                                <div class="form-group ml-2 mb-0">
                                                    <button id="doAction" class="btn btn-info">Thực hiện</button>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-label-instagram" data-toggle="modal"
                                                        data-target="#exampleModalCenter">
                                                    <i class="fa fa-book"></i> Thêm tệp khách hàng
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="kt-section col-12">
                                        <div class="tab-pane" id="kt_widget4_top10_rating">
                                            <!-- <div class="kt-scroll" data-scroll="true" data-height="400" style="height: 400px;">
                                                <div class="kt-list-timeline">
                                                    <div class="table-responsive">
                                                        <div class="kt-section__content"> -->
                                            <div class="table-responsive">
                                                <?php 
//  GET CATEGORY CONTACT
                                                    $url4 = 'http://localhost:2020/telegram/get_cat';
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
                                                    // GET CATE BY CAT_ID
                                                   
                                                    // echo "<pre>";
                                                    // print_r($response6);
                                                    // echo "</pre>";
                                                ?>
                          
                                                <table class="table" style="margin-top:0 !important;" id="datatb">
                                                    <thead>
                                                    <tr>
                                                        <th>
                                                            <label class="kt-checkbox align-top kt-checkbox--bold kt-checkbox--success">
                                                                <input id="checkAll" type="checkbox">
                                                                <span></span>
                                                            </label>
                                                        </th>
                                                        <th width="5%">#</th>
                                                        <th width="20%">Tên tệp khách hàng</th>
                                                        <th width="15%">Loại tệp</th>
                                                        <th width="7%">Số lượng</th>
                                                        <th width="7%">Bạn bè Telegram</th>
                                                        <th width="20%">Mô tả</th>
                                                        <th width="15%">Ngày tạo</th>
                                                        <th width="10%">Quản lí tệp khách hàng</th>
                                                    </tr>
                                                    <tr id="row-search">
                                                        <th data-is-search="false"></th>
                                                        <th data-is-search="false"></th>
                                                        <th data-is-search="true"></th>
                                                        <th data-is-search="true"></th>
                                                        <th data-is-search="false"></th>
                                                        <th data-is-search="false"></th>
                                                        <th data-is-search="false"></th>
                                                        <th data-is-search="false"></th>
                                                        <th data-is-search="false"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    function dequycate2($data, $parent = [], $text = "")
                                                    {
                                                        $array = [];
                                                        foreach ($data as $index => $value) {
                                                            $array[$value['Id']] = $value;
                                                        }
                                                        return $array;
                                                    }
                                                    $exists2 = [];
                                                    function dequycateoption($data, $parent = [], $text = "", $is = false)
                                                    {
                                                        global $exists2;
                                                        foreach($parent as $item) {
                                                            $exists2[] = $item;
                                                        }
                                                        $xhtml = '';
                                                        if (!$is) {
                                                            foreach ($data as $index => $value) {
                                                                if(!in_array($value['Id'],$exists2)) {
                                                                    $xhtml .= "<option value='{$value['Id']}'>{$text} {$value['name_vi']}</option>";
                                                                    if ($value['child_ids']) {
                                                                        $xhtml .= dequycateoption($data, $value['child_ids'], $text . "--", true);
                                                                    }
                                                                }
                                                            }
                                                        } else {
                                                            foreach ($parent as $index => $value) {
                                                                    $xhtml .= "<option value='{$data[$value]['Id']}'>{$text} {$data[$value]['name_vi']}</option>";

                                                                if ($data[$value]['child_ids']) {
                                                                    $xhtml .= dequycateoption($data, $data[$value]['child_ids'], $text . "--", true);
                                                                }
                                                            }
                                                        }
                                                        return $xhtml;
                                                    }

                                                    function dequy($data, $parent = 0, $text = "")
                                                    {
                                                        $xhtml = '';
                                                        foreach ($data as $index => $value) {
                                                            if ($value['parent_id'] == $parent) {
                                                                $id = $value['Id'];
                                                                $xhtml .= '<option value="' . $id . '">' . $text . $value['Name'] . "</option>";
                                                                $xhtml .= dequy($data, $id, $text . "--");
                                                            }
                                                        }
                                                        return $xhtml;
                                                    }

                                                    function dequycate($data, $parent = 0, $text = "")
                                                    {
                                                        $xhtml = '';
                                                        foreach ($data as $index => $value) {
                                                            if ($value['parent_id'] == $parent) {
                                                                $id = $value['Id'];
                                                                $xhtml .= '<option value="' . $id . '">' . $text . $value['name_vi'] . ' | ' . $value['name_en'] . "</option>";
                                                                $xhtml .= dequycate($data, $id, $text . "--");
                                                            }
                                                        }
                                                        return $xhtml;
                                                    }

                                                    $stt = 0;
                                                    function dequytable($response2, $parent = 0, $text = "")
                                                    {
                                                        global $stt;
                                                        $stt++;

                                                        global $id;
                                                        $xhtml = '';
                                                        foreach ($response2 as $index => $list) {
                                                            if ($list['parent_id'] == $parent) {
                                                                echo '<tr>
                                                                        <td><label class="kt-checkbox align-top mt-0 kt-checkbox--bold kt-checkbox--success">
                                                                                <input value="'. $list["Id"].'" class="cbx" type="checkbox">
                                                                                <span></span>
                                                                            </label></td>
                                                                        <th scope="row">' . $stt . '</th>
                                                                        <td>
                                                                            <a href="groupcontact.php?id=' . $list["Id"] . '" >' . $text . ' ' . str_replace("<", "&lt;", $list['Name']) . '</a>
                                                                            <div class="d-none">'.khong_dau($list['Name']).'</div>
                                                                            </td>
                                                                            ';
                                                                echo '<td>';
                                                                if (count($list['cat']) > 0) {
                                                                    foreach ($list['cat'] as $index => $_cat) {
                                                                        echo '<a href="getcategory.php?id='.$_cat['id'].'" class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill m-1">' . $_cat['name_vi'] . '</label><div class="d-none">'.khong_dau($_cat['name_vi']).'</div>';
                                                                    }
                                                                }
                                                                echo '</td>';
                                                                echo '<td><label>' . $list["length"] . '</label></td>
                                                                        <td><label>' . $list["lengthfriend"] . '/' . $list["length"] . '</label></td>
                                                                        <td><label>' . (isset($list["describe"]) ? str_replace("<", "&lt;", $list['describe']) : "") . '</label></td>
                                                                        <td><label>' . date("d/M/Y h:i:s", strtotime($list["createAt"])) . '</label></td>
                                                                        <td class="d-flex justify-content-center">
                                                                                <a class="btn btn-info" href="groupcontact.php?id=' . $list["Id"].'">
                                                                                    Chi tiết
                                                                                </a>
                                                                        </td>
                                                                    </tr>';
                                                                $xhtml .= dequytable($response2, $list["Id"], $text . '<i class="fas fa-long-arrow-alt-right mr-1"></i>', $stt);
                                                            }
                                                        }
                                                        return $xhtml;
                                                    }

                                                    $url2 = 'http://localhost:2020/telegram/get_contact';
                                                    $curl2 = curl_init($url2);
                                                    curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
                                                    curl_setopt($curl2, CURLOPT_HTTPHEADER, [
                                                        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                                                        'Authorization: ' . $_SESSION['user_token']
                                                    ]);
                                                    $response2 = json_decode(curl_exec($curl2), true);
                                                    $httpcode2 = curl_getinfo($curl2, CURLINFO_HTTP_CODE);
                                                    curl_close($curl2);
                                                    if ($httpcode2 != 200) {
                                                        $host = $_SERVER['HTTP_HOST'];
                                                        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                                                        $extra = 'loginerror.php';
                                                        echo("<script>window.location.href='http://" . $host . $uri . '/' . $extra . "'</script>;");
                                                        exit;
                                                    } else {
                                                        if (isset($response2));
                                                            echo dequytable($response2);
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
                        <div class="tab-pane" id="add_user_to_contact" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">
                                        <form class="kt-form kt-form--label-right" onsubmit="return beforeSubmit(event);"
                                              action="addcontact.php" method="post"
                                              enctype="multipart/form-data">
                                            <span class="kt-section__info">

                                            </span>
                                            <div class="kt-section__content">
                                                <h4>Thêm bằng tay</h4>
                                                <div class="form-group col-lg-15 row list-contact">
                                                    <div class=" kt-margin-t-5 col-lg-12 row">
                                                        <div class="col-lg-3 col-md-5">
                                                            <label><strong>Số điện thoại
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
                                                        <input type="hidden" name="id" value=<?php echo $id ?>>
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
                                                         <div class="modal fade" id="detail_one" tabindex="-1" role="dialog"
                                                             aria-labelledby="detail_oneTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết user muốn thêm</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group form-group-marginless">
                                                                            <label>Số điện thoại bổ sung ( <span class="text-muted">Mỗi số cách nhau một dấu phẩy</span> ) </label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="extra_phone[]" aria-describedby="basic-addon2">
                                                                            </div>
                                                                            <label>Sinh nhật</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="birthday[]" aria-describedby="basic-addon2">
                                                                            </div>
                                                                            <label>Email</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="email[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            <label>Email bổ sung</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="extra_email[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            <label>Địa chỉ</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="address[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            <label>Địa chỉ bổ sung</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="extra_address[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            <label>CMND</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="identify_card_id[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            <label>Số hộ chiếu</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="passport_number[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            <label>Đất nước</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="country[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            <label>Thành phố</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="city[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            <label>Huyện</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="district[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            <label>Tiểu bang</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="state[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            <label>Zipcode</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="zipcode[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            <label>Thông tin bổ sung</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="extra_id[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1 col-md-1 detail_one_user kt-margin-b-5">
                                                               <p class="fas fa-info-circle" data-toggle="modal"
                                                        data-target="#detail_one" style="font-size: 2rem; color: dimgrey; cursor: pointer;"></p>
                                                        </div>
                                                        <div class="col-lg-1 col-md-1 delete-phone kt-margin-b-5"
                                                             style="display: none;">
                                                            <i class="far fa-minus-square"
                                                               style=" font-size: 2rem; color: #fd1361; cursor: pointer;"></i>
                                                        </div>
                                                        <div class="col-lg-1 col-md-1 add-phone kt-margin-b-5">
                                                            <i class="far fa-plus-square"
                                                               style=" font-size: 2rem; color: #1dc9b7; cursor: pointer;"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4>Thêm từ File CSV</h4>
                                                <label for="myfile">Thêm từ file:</label>
                                                <input type="file" id="myfile" name="myfile"
                                                       accept=".csv">
                                                <div class="form-group col-lg-15 mt-3 mb-0 row">
                                                    <div class="col-lg-3">
                                                        <label>Vị trí cột Phone trong file danh bạ</label>
                                                        <input type="number" class="form-control" name="index_phone"
                                                               value="1">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label>Vị trí cột First_Name</label>
                                                        <input type="number" class="form-control" name="index_firstname"
                                                               value="2">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label>Vị trí cột Last_Name</label>
                                                        <input type="number" class="form-control" name="index_lastname"
                                                               value="3">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label class="text-center w-100">Hiển thị tất cả option</label>
                                                        <button type="button" data-id-elm="detail_option_file" class="btn btn-show-detail w-100 btn-secondary d-block">Thêm chi tiết<i class="fas fa-plus ml-2" style="font-size:12px;"></i></button>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-15 mt-3 row box_detail_option" id="detail_option_file">
                                                    <div class="col-lg-3">
                                                        <label>Vị trí cột Birthday</label>
                                                        <input type="number" class="form-control" name="index_birthday"
                                                               value="0">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label>Vị trí cột Email</label>
                                                        <input type="number" class="form-control" name="index_email"
                                                               value="0">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label>Vị trí cột Extra Email</label>
                                                        <input type="number" class="form-control" name="index_extra_email"
                                                               value="0">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label>Vị trí cột Address</label>
                                                        <input type="number" class="form-control" name="index_address"
                                                               value="0">
                                                    </div>
                                                    <div class="col-lg-3 mt-3">
                                                        <label>Vị trí cột Extra Address</label>
                                                        <input type="number" class="form-control" name="index_extra_address"
                                                               value="0">
                                                    </div>
                                                    <div class="col-lg-3 mt-3">
                                                        <label>Vị trí cột Identify Card ID</label>
                                                        <input type="number" class="form-control" name="index_identify_card_id"
                                                               value="0">
                                                    </div>
                                                    <div class="col-lg-3 mt-3">
                                                        <label>Vị trí cột Passport Number</label>
                                                        <input type="number" class="form-control" name="index_passport_number"
                                                               value="0">
                                                    </div>
                                                    <div class="col-lg-3 mt-3">
                                                        <label>Vị trí cột Country</label>
                                                        <input type="number" class="form-control" name="index_country"
                                                               value="0">
                                                    </div>
                                                    <div class="col-lg-3 mt-3">
                                                        <label>Vị trí cột District</label>
                                                        <input type="number" class="form-control" name="index_district"
                                                               value="0">
                                                    </div>
                                                    <div class="col-lg-3 mt-3">
                                                        <label>Vị trí cột City</label>
                                                        <input type="number" class="form-control" name="index_city"
                                                               value="0">
                                                    </div>
                                                    <div class="col-lg-3 mt-3">
                                                        <label>Vị trí cột State</label>
                                                        <input type="number" class="form-control" name="index_state"
                                                               value="0">
                                                    </div>
                                                    <div class="col-lg-3 mt-3">
                                                        <label>Vị trí cột Zipcode</label>
                                                        <input type="number" class="form-control" name="index_zipcode"
                                                               value="0">
                                                    </div>
                                                    <div class="col-lg-3 mt-3">
                                                        <label>Vị trí cột Extra ID</label>
                                                        <input type="number" class="form-control" name="index_extra_id"
                                                               value="0">
                                                    </div>
                                                </div>
                                                <h4 class="mt-3">Thêm vào tệp khách hàng</h4>
                                                <div class="form-group row">
                                                    <div class="col-sm-2">
                                                        <label for="inputPassword" class="col-form-label">Tên tệp khách hàng:</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <select class=" form-control col-lg-12 groupcontact"
                                                                name="groupcontact">
                                                            <option value=-1>-Lựa chọn tệp khách hàng-</option>
                                                            <?php
                                                            if (isset($response2))
                                                                if (isset($response2))
                                                                    echo dequy($response2);
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 d-flex align-items-end">
                                                        <label class="kt-checkbox kt-checkbox--success">
                                                            <input type="checkbox" name="addFriend" value="thembanbe">
                                                            Thêm làm bạn bè Telegram
                                                            <span></span>
                                                        </label>
                                                        &nbsp;&nbsp;
                                                        <label class="kt-checkbox kt-checkbox--success">
                                                            <input disabled type="checkbox" name="addzalo" value="themzalo">
                                                            Thêm làm bạn bè Zalo (đang phát triển)
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row account_add_friend_telegram" style="display:none;">
                                                    <div class="col-sm-2">
                                                        <label for="inputPassword" class="col-form-label">Tài khoản thêm bạn bè:</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <select class=" form-control col-lg-12"
                                                                name="id">
                                                            <?php
                                                                if (!empty($list_user_telegram)) {
                                                                    foreach($list_user_telegram as $user) {
                                                                        echo '<option value="'.$user['Id'].'">'.$user['phone'].'</option>';
                                                                    }
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>   
                                            </div>
                                            <div class="kt-portlet__foot">
                                                <div class="kt-form__actions">
                                                    <div class="row">
                                                        <div class="col-lg-12 text-center">
                                                            <button type="submit" class="btn btn-outline-brand"><i
                                                                        class="la flaticon2-avatar"></i> Thêm mới
                                                            </button>
                                                            <button type="reset" class="btn btn-outline-secondary"><i
                                                                        class="la flaticon2-delete"></i> Huỷ
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
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
    </div>
    <!--begin::Modal-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Thêm tệp khách hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group form-group-marginless">
                        <label>Tên tệp khách hàng</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="name" aria-describedby="basic-addon2">
                            <div class="input-group-append"><span class="input-group-text" id="basic-addon2"><i
                                            class="la la-group"></i></span></div>
                        </div>
                        <label>Mô tả</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="describe" aria-describedby="basic-addon3">
                            <div class="input-group-append"><span class="input-group-text" id="basic-addon3"><i
                                            class="fas fa-sticky-note"></i></span></div>
                        </div>
                        <label>Thuộc tệp khách hàng cha</label>
                        <div class="input-group mb-3">
                            <select type="text" class="form-control" name="parent_id" aria-describedby="basic-addon4">
                                <option value="0">-- Root --</option>
                                <?php if (isset($response2))
                                    echo dequy($response2);
                                ?>
                            </select>
                            <div class="input-group-append"><span class="input-group-text" id="basic-addon4"><i
                                            class="fas fa-sticky-note"></i></span></div>
                        </div>
                        <label>Loại tệp khách hàng</label>
                        <div>
                            <select multiple="multiple" class="form-control kt-select2" id="kt_select2_3" name="cat_id[]"
                                    aria-describedby="basic-addon4">
                                <option value="0">-- Root --</option>
                                <?php if (isset($response4))
                                    echo dequycateoption(dequycate2($response4));
                                ?>
                            </select>
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
    <div class="modal fade" id="chuyenmucModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Thêm loại tệp khách hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group form-group-marginless">
                        <label>Tên loại tệp khách hàng</label>
                        <div class="input-group mb-3">
                            <input type="text" placeholder="Tiếng Việt" class="form-control" name="cat_name_vi"
                                   aria-describedby="basic-addon2">
                            <div class="input-group-append"><span class="input-group-text" id="basic-addon2"><i
                                            class="la la-group"></i></span></div>
                        </div>
                        <div class="input-group">
                            <input type="text" placeholder="Tiếng Anh" class="form-control" name="cat_name_en"
                                   aria-describedby="basic-addon2">
                            <div class="input-group-append"><span class="input-group-text" id="basic-addon2"><i
                                            class="la la-group"></i></span></div>
                        </div>
                        <label>Mô tả</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="cat_note" aria-describedby="basic-addon3">
                            <div class="input-group-append"><span class="input-group-text" id="basic-addon3"><i
                                            class="fas fa-sticky-note"></i></span></div>
                        </div>
                        <label>Thuộc loại tệp</label>
                        <div class="input-group">
                            <select type="text" class="form-control" name="cat_parent_id[]"
                                    aria-describedby="basic-addon4" multiple>
                                <option value="0">-- Root --</option>
                                <?php if (isset($response4))
                                    echo dequycateoption(dequycate2($response4));
                                ?>
                            </select>
                            <div class="input-group-append"><span class="input-group-text" id="basic-addon4"><i
                                            class="fas fa-sticky-note"></i></span></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary addcat">Thêm mới</button>
                </div>
            </div>
        </div>
    </div>
    <!--end::Modal-->
</div>
<?php include 'footer.php'; ?>
<script type="text/javascript">
    function beforeSubmit(e) {
        if($(".groupcontact").val() != -1) {
            if ($('#myfile').val()) {
                var ext = $('#myfile').val().split('.').pop().toLowerCase();
                if (ext !== 'csv') {
                    Swal.fire(
                        'Oops...',
                        'Vui lòng nhập đúng định dạng đuôi CSV, phân tách bởi dấu phẩy.',
                        'error'
                    )
                    return false;
                } else return confirm('Thực hiện thêm danh bạ?');
            } else if ($('input[name="phone[]"]').val())
                return confirm('Thực hiện thêm danh bạ?');
            else {
                Swal.fire(
                    'Lỗi...',
                    'Danh sách nhập vào trống!',
                    'error',
                );
                return false;
            }
        }else {
            e.preventDefault();
            Swal.fire(
                'Lỗi...',
                'Chưa chọn danh bạ để thêm !',
                'error',
            );
            return false;
                    
            // e.preventDefault();

        }
    }

    jQuery(document).ready(function ($) {

        function formatSelection(val) {
            var str = val.text.replace(/-+/g, '');
            return str;
        }
        $('input[name="addFriend"]').change(function() {
            if ($(this).is(':checked')) {
                $('.account_add_friend_telegram').addClass('display-block');
            }
            else $('.account_add_friend_telegram').removeClass('display-block');
        })
        $('#kt_select2_3').select2({
          templateSelection: formatSelection
        });

        $("#checkAll").click(function(){
            $('.cbx:checkbox').not(this).prop('checked', this.checked);
        });
        // DataTable
        $('#datatb thead #row-search th').each( function () {
            if($(this).data('is-search')) {
            var title = $(this).text();
                    $(this).html('<input type="text" style="width:100%;" placeholder="" />' );
            }
        } );
 
        // DataTable
        var table = $('#datatb').DataTable({
            // "ordering": false,
            // searching:false
        });
         
        // Apply the search
        table.columns().every( function () {
            var that = this;
            $( 'input', this.header() ).on( 'keyup change clear', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value)
                        .draw();
                }
            } );
        });
        // doAction

        $("#doAction").click(function() {
            var name_action = $("select[name=action]").val();
            var searchIDs = $(".cbx:checked").map(function(){
                        return $(this).val();
                    }).get();
            if (searchIDs.length==0) 
                Swal.fire(
                    'Lỗi...',
                    'Vui lòng chọn tệp liên hệ cần thao tác',
                    'error',
                );
            else
            if(name_action != 0) {
                var list_account = <?php 
                    $url='http://localhost:2020/telegram/get_list_user_telegram';
                    $curl=curl_init($url);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_HTTPHEADER, [
                        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                        'Authorization: '.$_SESSION['user_token']
                    ]);
                    $response2 = curl_exec($curl);
                    curl_close($curl);
                    echo $response2;
                ?>;
                var list_option = {};
                if (list_account.length!=0) 
                    for (let index of list_account) {
                        let key = index.Id;
                        list_option[key] = index.phone
                    }
                if(name_action == "delete") {
                    var searchIDs = $(".cbx:checked").map(function(){
                        return $(this).val();
                    }).get();
                    if(searchIDs.length > 0) {
                        const swalWithBootstrapButtons = Swal.mixin({
                            customClass: {
                                confirmButton: 'btn btn-success',
                                cancelButton: 'btn btn-danger'
                            },
                            buttonsStyling: false
                        })
                        swalWithBootstrapButtons.fire({
                            title: 'Xóa tệp khách hàng',
                            text: "Thực hiện xóa tệp khách hàng?",
                            type: 'question',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, delete!',
                            cancelButtonText: 'No, cancel!',
                            reverseButtons: true
                        }).then((result) => {
                            if (result.value) {
                                $.ajax({
                                    url: "./createapp.php",
                                    type: "POST",
                                    data: {
                                        "function": "do_action",
                                        "ids": JSON.stringify(searchIDs),
                                        "table": "contact",
                                        "action": "delete",
                                    },
                                    success: function (dt) {
                                        if (dt) {
                                            Swal.fire(
                                                'Thao tác thành công',
                                                'Thao tác thành công',
                                                'success',
                                            );
                                            location.reload();
                                        } else Swal.fire(
                                            'Lỗi...',
                                            'Lỗi khi thực hiện tác vụ',
                                            'error',
                                        );
                                    }
                                });
                            }
                            else if (result.dismiss === Swal.DismissReason.cancel) {
                                swalWithBootstrapButtons.fire(
                                    'Cancelled',
                                    '',
                                    'error'
                                )
                            }
                        })
                    }else{
                        Swal.fire(
                            'Lỗi...',
                            'Bạn chưa đánh đấu record !',
                            'error',
                        );
                    }
                        
                }
                else 
                if (name_action == "export") {
                    var searchIDs = $(".cbx:checked").map(function(){
                        return $(this).val();
                    }).get();
                    if(searchIDs.length > 0) {
                        const swalWithBootstrapButtons = Swal.mixin({
                            customClass: {
                                confirmButton: 'btn btn-success',
                                cancelButton: 'btn btn-danger'
                            },
                            buttonsStyling: false
                        })
                        swalWithBootstrapButtons.fire({
                            title: 'Export Contact',
                            text: "Tải xuống file CSV danh bạ?",
                            type: 'question',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, download now!',
                            cancelButtonText: 'No, cancel!',
                            reverseButtons: true
                        }).then((result) => {
                            if (result.value) {
                                $.ajax({
                                    url: "./createapp.php",
                                    type: "POST",
                                    data: {
                                        "function": "export_user_in_contact",
                                        "list_id": JSON.stringify(searchIDs),
                                    },
                                    success: function (response) {
                                        if (response) {
                                            window.location = "download.php?filename=" + response;
                                            Swal.fire(
                                                'Downloaded!',
                                                'Tải xuống thành công',
                                                'success'
                                            )
                                        } else Swal.fire(
                                            'Download!',
                                            'Tải xuống thất bại',
                                            'error'
                                        )
                                    }
                                })
                            }
                            else if (result.dismiss === Swal.DismissReason.cancel) {
                                swalWithBootstrapButtons.fire(
                                    'Cancelled',
                                    '',
                                    'error'
                                )
                            }
                        })
                    }
                    else {
                        Swal.fire(
                            'Lỗi...',
                            'Bạn chưa đánh đấu record !',
                            'error',
                        );
                    }
                }
            }
            else if (name_action ==0){
                Swal.fire(
                    'Lỗi...',
                    'Hãy chọn hành động bạn muốn thực hiện',
                    'error',
                );
            }
            
        });

        // show detail option

        $(".btn-show-detail").click(function() {
            var idElm = $(this).data('id-elm');
            $("#" + idElm).slideToggle({
              start: function () {
                $(this).css({
                  display: "flex"
                })
              }
            });
        });

        $("select.groupcontact").change(function () {
            let selected = $(this).children("option:selected").val();
            if (selected == 0) {
                $(".namegroup").addClass("display-block");
            } else {
                $(".namegroup").removeClass("display-block");
            }
        });
        $('.addgroupcontact').on('click', function () {
            if ($('input[name="name"]').val() == '') alert("Trường tên nhóm liên hệ không được rỗng");
            else {
                $('.addgroupcontact').hide();
                $.ajax({
                    url: "./createapp.php",
                    type: "POST",
                    data: {
                        "function": "addgroupcontact",
                        "name": $('input[name="name"]').val(),
                        "describe": $('input[name="describe"]').val(),
                        "parent_id": $('select[name="parent_id"]').val(),
                        "cat_id": $('select[name="cat_id[]"]').val()
                    },
                    success: function (dt) {
                        if (dt == 1) {
                            Swal.fire(
                                'Thêm danh bạ',
                                'Thêm mới danh bạ thành công',
                                'success',
                            );
                            location.reload();
                        } else Swal.fire(
                            'Lỗi...',
                            'Lỗi khi thêm mới danh bạ',
                            'error',
                        );
                    }
                })
            }
        });

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
                        "parent_id": $('select[name="cat_parent_id[]"]').val(),
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

