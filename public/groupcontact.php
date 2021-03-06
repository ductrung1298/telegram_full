<?php
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$user = isset($_GET['user']) ? intval($_GET['user']) : 0;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$search = isset($_GET['search']) ? intval($_GET['search']) : '';
$style = '<style type="text/css">
    #datatb_filter {
        display:none;
    }
</style>';
include 'header.php';
if ($id != 0) {
    $url = 'http://localhost:2020/telegram/get_contact?idgroupcontact=' . $id . '&user='. $user. '&page=' .$page. '&search=' . $search;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
        'Authorization: ' . $_SESSION['user_token']
    ]);
    $list_user_in_contact = json_decode(curl_exec($curl), true);
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    include 'connection.php';

    $group = new Connection();
    $value = $group->connect('telegram/get_contact?idcontact=' . $id);
    $length = $list_user_in_contact['userLength'];
    $countPage = ceil($length / $list_user_in_contact['pagination']['perPage']);
    $list_user_in_contact = $list_user_in_contact['data'];

    function pagination_link($page) {
        if(strpos($_SERVER['REQUEST_URI'], 'page=') !== false) {
            return preg_replace("/page=([0-9]+)/",'page='. $page,$_SERVER['REQUEST_URI']);
        } else {
            return $_SERVER['REQUEST_URI']. '&page='.$page;
        }
    }

}
?>
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
    <div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
         id="kt_content">
        <!-- begin:: Subheader -->
        <div class="kt-subheader mb-5 kt-grid__item" id="kt_subheader">
            <div class="kt-container ">
                <div class="kt-subheader__main">
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="getcontact.php" class="kt-subheader__breadcrumbs-link">
                            Danh sách tệp khách hàng </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="groupcontact.php?id=<?php echo $id; ?>" class="kt-subheader__breadcrumbs-link">
                            <?= $value['Name'] ?> </a>  
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
                                    <i class="flaticon2-group"></i>Danh sách thành viên
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#add_user_to_this_contact"
                                   role="tab" aria-selected="false">
                                    <i class="flaticon-users"></i> Thêm người dùng vào tệp khách hàng
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active " id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel">
                            <div class="kt-portlet__body pt-0">
                                <div class="row ">
                                    <div class="col-12 mb-3" style="padding: 0;">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex">
                                                <div class="form-group mb-0">
                                                    <select class="form-control" name="action" id="exampleSelect1">
                                                        <option value="0">Hành động</option>
                                                        <option value="add_friend_tel">Thêm bạn bè Telegram</option>
                                                        <option value="add_friend_zalo">Thêm bạn bè Zalo</option>
                                                        <option value="inviter_group_tel">Mời vào nhóm Telegram</option>
                                                        <option value="delete">Xoá</option>
                                                    </select>
                                                </div>
                                                <div class="form-group ml-2 mb-0">
                                                    <button id="doAction" class="btn btn-info">Thực hiện</button>
                                                </div>
                                            </div>
                                            <form method="get" action="" class="d-flex">
                                                <input type="hidden" name="id" value="<?= $id; ?>">
                                                <div class="form-group mb-0 mr-2">
                                                     <input class="form-control" type="text" name="search" placeholder="Tìm kiếm số điện thoại" required>
                                                </div>
                                                    <button type="submit" class="btn btn-info">Tìm kiếm</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="kt-section col-12">
                                        <div class="kt-section__content">
                                            <table class="table table-hover" id="datatb">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        <label class="align-top kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                                                <input id="checkAll" type="checkbox">
                                                                <span></span>
                                                            </label>
                                                    </th>
                                                    <th class="kt-font-bolder">#</th>
                                                    <th class="kt-font-bolder">Tên</th>
                                                    <th class="kt-font-bolder">Số điện thoại</th>
                                                    <th class="kt-font-bolder">Tệp khách hàng khác</th>
                                                    <th class="kt-font-bolder">Bạn bè Telegram</th>
                                                    <th class="kt-font-bolder">Xem thêm</th>
                                                </tr>
                                                <tr id="row-search">
                                                    <th data-is-search="false"></th>
                                                    <th data-is-search="false"></th>
                                                    <th data-is-search="true"></th>
                                                    <th data-is-search="true"></th>
                                                    <th data-is-search="true"></th>
                                                    <th data-is-search="true"></th>
                                                    <th data-is-search="false"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                <?php
                        
                                                if (!empty($list_user_in_contact))
                                                    // echo "<pre>";
                                                    // print_r($list_user_in_contact);
                                                    foreach ($list_user_in_contact as $index => $contact) {
                                                        echo ' <tr>
                                                        <th><label class="align-top mt-0 kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                                                                <input value="'. $contact["Id"].'" class="cbx" type="checkbox">
                                                                                <span></span>
                                                                            </label></th>';
                                                        echo '<th scope="row">' . ((int)$index + 1 + ($page-1)*10) . '</th>';
                                                        echo '<td>
                                                            <label>' . (isset($contact['user_first_name']) ? $contact['user_first_name'] : ''). ' '.(isset($contact['user_last_name']) ? $contact['user_last_name'] : '') . '</label>
                                                            <div class="d-none">' . (isset($contact['user_last_name']) ? khong_dau($contact['user_last_name']) : '').' '.(isset($contact['user_last_name']) ? khong_dau($contact['user_last_name']) : '') . '</div>
                                                        </td>
                                                        <td>
                                                            ' . (isset($contact['phone']) ? $contact['phone'] : '') . '
                                                        </td>
                                                        <td>';
                                                            if (count($contact['othergroup']) > 0) {
                                                                foreach ($contact['othergroup'] as $group) {
                                                                    echo '<lable class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill m-1">' . $group . '</lable><div class="d-none">'.khong_dau($group).'</div>';
                                                                }
                                                            }
                                                        echo '
                                                        </td>
                                                        <td>';
                                                            if (count($contact['friend_tele']) > 0) {
                                                                foreach ($contact['friend_tele'] as $friend) {
                                                                    echo '<lable class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill m-1">' . $friend . '</lable><div class="d-none">'.khong_dau($friend).'</div>';
                                                                }
                                                            }
                                                        echo '</td>
                                                        <td>';
                                                            echo '<button type="button" data-id="'.$contact['Id'].'" data-toggle="modal" data-target="#exampleModalCenter_'.$contact['Id'].'"><i class="flaticon-more-1"></i></button>';
                                                        ?>
                                                        <div class="modal fade" id="exampleModalCenter_<?php echo $contact['Id'] ?>" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết : <strong><?php echo $contact['user_first_name']." ".$contact['user_last_name'] ?></strong></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group form-group-marginless">
                                                                            <div class="user_info_field">
                                                                                <label>First Name: </label>
                                                                                <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter name" id="user_first_name"><?= $contact['user_first_name'] ?><i class="fa fa-edit ml-3"></i></a>
                                                                            </div>
                                                                            <div class="user_info_field">
                                                                                <label>Last Name: </label>
                                                                                <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter name" id="user_last_name"><?= $contact['user_last_name'] ?><i class="fa fa-edit ml-3"></i></a>
                                                                            </div>
                                                                            <div class="user_info_field">
                                                                                <label>Phone: </label>
                                                                                <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter username" id="phone"><?= $contact['phone'] ?><i class="fa fa-edit ml-3"></i></a>
                                                                            </div>
                                                                            <div class="bg-light py-1 text-center">
                                                                                <a class="toggleDetailOption" href="javascript:void(0);">Xem thêm <i class="fas fa-plus"></i></a>
                                                                            </div>
                                                                            <div style="display: none;">
                                                                                <div class="user_info_field">
                                                                                    <label>Extra Phone:</label>
                                                                                     <a class="editable_on" href="#" data-type="text"data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter username" href="#" id="extra_phone">
                                                                                    <?php

                                                                                        if(!empty($contact['extra_phone'])) {
                                                                                                $stt = 0;
                                                                                                foreach(json_decode($contact['extra_phone'],true) as $index => $value) {
                                                                                                    if($stt > 0) {
                                                                                                        echo ','.$value;
                                                                                                    }else {
                                                                                                        echo $value;
                                                                                                    }
                                                                                                    $stt++;
                                                                                                }
                                                                                            }
                                                                                        ?>
                                                                                    <i class="fa fa-edit ml-3"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="user_info_field">
                                                                                    <label>Address: </label>
                                                                                    <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter username"  id="address"><?= $contact['address'] ?><i class="fa fa-edit ml-3"></i></a>
                                                                                </div>
                                                                                <div class="user_info_field">
                                                                                    <label>Extra Address:</label>
                                                                                     <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter username" id="extra_address"><?= $contact['extra_address'] ?><i class="fa fa-edit ml-3"></i></a>
                                                                                </div>
                                                                                <div class="user_info_field">
                                                                                    <label>Email:</label>
                                                                                     <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter username" id="email"><?= $contact['email'] ?><i class="fa fa-edit ml-3"></i></a>
                                                                                </div>
                                                                                <div class="user_info_field">
                                                                                    <label>Extra Email:</label>
                                                                                     <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter username" id="extra_email"><?= $contact['extra_email'] ?><i class="fa fa-edit ml-3"></i></a>
                                                                                </div>
                                                                                <div class="user_info_field">
                                                                                    <label>Birthday:</label>
                                                                                     <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter username" id="birthday"><?= $contact['birthday'] ?><i class="fa fa-edit ml-3"></i></a>
                                                                                </div>
                                                                                <div class="user_info_field">
                                                                                    <label>CMND:</label>
                                                                                     <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter username" id="identify_cardid"><?= $contact['identify_cardid'] ?><i class="fa fa-edit ml-3"></i></a>
                                                                                </div>
                                                                                <div class="user_info_field">
                                                                                    <label>Passport Number:</label>
                                                                                     <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter username" id="passport_number"><?= $contact['passport_number'] ?><i class="fa fa-edit ml-3"></i></a>
                                                                                </div>
                                                                                <div class="user_info_field">
                                                                                    <label>Country:</label>
                                                                                     <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter username" id="country"><?= $contact['country'] ?><i class="fa fa-edit ml-3"></i></a>
                                                                                </div>
                                                                                <div class="user_info_field">
                                                                                    <label>City:</label>
                                                                                     <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter username" id="city"><?= $contact['city'] ?><i class="fa fa-edit ml-3"></i></a>
                                                                                </div>
                                                                                <div class="user_info_field">
                                                                                    <label>District:</label>
                                                                                     <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter username" id="district"><?= $contact['district'] ?><i class="fa fa-edit ml-3"></i></a>
                                                                                </div>
                                                                                <div class="user_info_field">
                                                                                    <label>State:</label>
                                                                                     <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter username" id="state"><?= $contact['state'] ?><i class="fa fa-edit ml-3"></i></a>
                                                                                </div>
                                                                                <div class="user_info_field">
                                                                                    <label>Zipcode:</label>
                                                                                     <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter username" id="zipcode"><?= $contact['zipcode'] ?><i class="fa fa-edit ml-3"></i></a>
                                                                                </div>
                                                                                <div class="user_info_field">
                                                                                    <label>Thông tin bổ sung:</label>
                                                                                     <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter username" id="extra_id"><?= $contact['extra_id'] ?><i class="fa fa-edit ml-3"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                                                    </div>
                                                                </div>
                                                            </div>
</div>
                                                        <?php
                                                        echo '</td>';
                                                        echo '</tr>';
                                                    }
                                                ?>
                                                </tbody>
                                            </table>
                                            <div class="d-flex flex-wrap py-2 justify-content-end">
                                                <?php if($page != 1): ?>
                                                <a href="<?= pagination_link(1) ?>" class="btn btn-icon btn-sm btn-light mr-2 my-1"><i class="fas fa-angle-double-left icon-xs"></i></a>
                                                <a href="<?= pagination_link($page - 1) ?>" class="btn btn-icon btn-sm btn-light mr-2 my-1"><i class="fas fa-angle-left icon-xs"></i></a>
                                                <?php endif; ?>
                                                <?php for($i = 1;$i <= $countPage;$i ++):
                                                if($i == $page): ?>
                                                    <a href="<?= pagination_link($i) ?>" class="btn btn-icon btn-sm border-0 btn-light btn-hover-primary active mr-2 my-1"><?= $i ?></a>
                                                <?php else: ?>
                                                    <a href="<?= pagination_link($i) ?>" class="btn btn-icon btn-sm border-0 btn-light mr-2 my-1"><?= $i ?></a>
                                                <?php endif; ?>
                                                <?php endfor; ?>
                                                <?php if($page != $countPage && $countPage != 0 ): ?>
                                                <a href="<?= pagination_link($page + 1) ?>" class="btn btn-icon btn-sm btn-light mr-2 my-1"><i class="fas fa-angle-right icon-xs"></i></a>
                                                <a href="<?= pagination_link($countPage) ?>" class="btn btn-icon btn-sm btn-light mr-2 my-1"><i class="fas fa-angle-double-right icon-xs"></i></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="add_user_to_this_contact" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">
                                        <form class="kt-form kt-form--label-right" onsubmit="return beforeSubmit();"
                                              action="addcontact.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="groupcontact" value="<?= $id ?>">
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
                                                <div class="form-group col-lg-15 mt-3 row">
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
                                                <div class="form-group col-lg-15 mt-3 row box_detail_option" id="detail_option_file" style="display: none;">
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
                                                <div class="row">
                                                    <div class="col-sm-3 d-flex align-items-end">
                                                        <label class="kt-checkbox kt-checkbox--success">
                                                            <input type="checkbox" name="addFriend" value="thembanbe">
                                                            Thêm làm bạn bè Telegram
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-3 d-flex align-items-end">
                                                        <label class="kt-checkbox kt-checkbox--success">
                                                            <input type="checkbox" disabled name="addFriendZalo" value="thembanbezalo">
                                                            Thêm làm bạn bè Zalo
                                                            <span></span>
                                                        </label>
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
</div>

<?php include 'footer.php'; ?>
<!-- edit trung 22/5 -->
<script src="../assets/js/pages/custom/wizard/wizard-3.js" type="text/javascript"></script>
<script>
    function beforeSubmit() {
        if ($('#myfile').val()) {
            var ext = $('#myfile').val().split('.').pop().toLowerCase();
            if (ext !== 'csv') {
                Swal.fire(
                    'Oops...',
                    'Vui lòng nhập đúng định dạng đuôi CSV, phân tách bởi dấu phẩy.',
                    'error'
                )
                return false;
            } else return confirm('Thực hiện thêm tệp khách hàng?');
        } else if ($('input[name="phone[]"]').val())
            return confirm('Thực hiện thêm tệp khách hàng?');
        else {
            Swal.fire(
                'Lỗi...',
                'Danh sách nhập vào trống!',
                'error',
            );
            return false;
        }
    }

    $(document).ready(function() {

        $(".toggleDetailOption").click(function() {
            $(this).parent("div").next("div").slideToggle('fast');
            $(this).parent().remove();

        });

         $("#checkAll").click(function(){
            $('.cbx:checkbox').not(this).prop('checked', this.checked);
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
         // doAction

        $("#doAction").click(function() {
            // console.log($("select[name=action]").val());
            var name_action = $("select[name=action]").val();
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
                if(name_action=="delete") {
                    var searchIDs = $(".cbx:checked").map(function(){
                      return $(this).val();
                    }).get();
                    if(searchIDs.length > 0) {
                        $.ajax({
                            url: "./createapp.php",
                            type: "POST",
                            data: {
                                "function": "do_action",
                                "ids": JSON.stringify(searchIDs),
                                "table": "user",
                                "action": "delete",
                                "id": <?php echo $id; ?>
                            },
                            success: function (dt) {
                                if (dt) {
                                    Swal.fire(
                                        'Thao tác thành công',
                                        'Thao tác thành công',
                                        'success',
                                    );
                                    // location.reload();
                                } else Swal.fire(
                                    'Lỗi...',
                                    'Lỗi khi thực hiện tác vụ',
                                    'error',
                                );
                            }
                        });
                    }else{
                        Swal.fire(
                            'Lỗi...',
                            'Bạn chưa đánh đấu record !',
                            'error',
                        );
                    }
                    
                }
                else if (name_action == "add_friend_tel") {
                    Swal.fire({
                        title: 'Vui lòng chọn tài khoản Telegram',
                        input: 'select',
                        inputOptions: list_option,
                        inputAttributes: {
                            autocapitalize: 'off'
                        },
                        showCancelButton: true,
                        confirmButtonText: 'Thêm',
                        showLoaderOnConfirm: true,
                        allowOutsideClick: () => !Swal.isLoading()
                        }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: "./createapp.php",
                                type: "POST",
                                data: {
                                    "function": "add_friend_tel_from_contact",
                                    "id": result.value,
                                    "idcontact": <?php echo $id; ?>,
                                },
                                success: function (response) {
                                    if (response) {
                                        Swal.fire(
                                            'Success!',
                                            'Thêm thành công ' + response + ' người dùng vào bạn bè Telegram.',
                                            'success'
                                        )
                                    } else Swal.fire(
                                        'Error!',
                                        'Thêm bạn bè thất bại',
                                        'error'
                                    )
                                }
                            })
                        }
                        })
                }
                else if (name_action == "add_friend_zalo") {
                    Swal.fire(
                    'Lỗi...',
                    'Tính năng này đang phát triển. Vui lòng thử lại sau',
                    'error',
                );
                }
                else if (name_action == "inviter_group_tel") {
                    let html = `<select class="form-control multi_select" name="multi_select_name[]" multiple>`;
                    for (let index of list_account) {
                        html = html + `<option value="${index.Id}">${index.phone}</option>`
                    }
                    html = html + `</select>`;
                    var list_group = <?php 
                        $url='http://localhost:2020/telegram/get_all_group_chat_telegram_by_login';
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
                    var list_option_group = {};
                    if (list_group.data.length!=0) 
                        for (let index of list_group.data) {
                            let key = index.chat_id;
                            list_option_group[key] = index.name
                        }

                    Swal.mixin({
                        confirmButtonText: 'Next &rarr;',
                        showCancelButton: true,
                        progressSteps: ['1', '2']
                        }).queue([
                        {
                            title: 'Chọn tài khoản sử dụng thêm vào group',
                            text: 'Tài khoản này được sử dụng để luân phiên mời người dùng vào nhóm',
                            onOpen: function() {
                                $(".multi_select").select2({
                                });
                            },
                            html: html,
                            preConfirm: () => {
                                let array_select = [];
                                $(".multi_select option:selected").map(function()
                                { 
                                    array_select.push($(this).val())
                                })
                                return array_select;
                            }
                        },
                        {
                            title: 'Chọn group cần thêm người dùng vào nhóm', 
                            text: 'Danh sách người dùng trong tệp khách hàng này sẽ được mời vào trong group chat đã chọn',
                            input: 'select',
                            inputPlaceholder: 'Vui lòng chọn nhóm',
                            inputOptions: list_option_group,
                        },
                        ]).then((result) => {
                            if (result.value) {
                                let array_chat_id = [{id: result.value[1]}];
                                
                                $.ajax({
                                    url: "./createapp.php",
                                    type: "POST",
                                    data: {
                                        "function": "add_group_chat_telegram",
                                        "id_group_chat": JSON.stringify(array_chat_id),
                                        "id_contact": <?php echo $id; ?>,
                                        "list_user": JSON.stringify(result.value[0]),
                                    },
                                    success: function (dt) {
                                        if (dt) dt= JSON.parse(dt);
                                        if (dt && dt.process_id) 
                                        {
                                            window.location.href="inviter-user-to-group.php?process_id="+ dt.process_id;
                                        }
                                        else 
                                        if (dt) {
                                            Swal.fire(
                                                'Thêm thành công',
                                                'Thêm thành công ' + dt + ' người dùng vào ' + array_chat_id.length + ' nhóm chat',
                                                'success',
                                            );
                                            // location.reload();
                                        } else Swal.fire(
                                            'Lỗi...',
                                            'Lỗi khi thêm người dùng vào nhóm chat',
                                            'error',
                                        );
                                    }
                                })
                            }
                        })
                }
            }else {
                Swal.fire(
                    'Lỗi...',
                    'Hãy chọn hành động bạn muốn thực hiện',
                    'error',
                );
            }
            
        });

        $(".editable_on").editable({
            mode:'inline',
            params:  {'function':'update_user'},
            emptytext: 'Chưa có',
            error: function(response, newValue) {
                if(response.status === 500) {
                    response = JSON.parse(response.responseText);
                    console.log(response);
                    toastr.error(response.sqlMessage,response.code);
                    // if(response.code == 'ER_DATA_TOO_LONG') {
                        // toastr.error('Dữ liệu quá dài !');
                    // }else {
                        // toastr.error('Đã có lỗi xảy ra !');
                    // }
                }
            }
        });


        $('#datatb').ready(function() {
            $('#datatb thead #row-search th').each( function () {
            if($(this).data('is-search')) {
                var title = $(this).text();
                $(this).html('<input type="text" style="width:100%;" placeholder="" />' );
            }
            });
 
            // DataTable
            var table = $('#datatb').DataTable({
                // "ordering": false,
                "paging": false,
                "bInfo" : false,
                "searching":false
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

        });
    });
</script>