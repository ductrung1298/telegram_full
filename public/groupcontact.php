<?php
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$user = isset($_GET['user']) ? intval($_GET['user']) : 0;
include 'header.php';
if ($id != 0) {
    $url = 'http://localhost:2020/telegram/get_contact?idgroupcontact=' . $id;
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

}
?>
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
    <div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
         id="kt_content">
        <!-- begin:: Subheader -->
        <div class="kt-subheader mb-5 kt-grid__item" id="kt_subheader">
            <div class="kt-container ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Tool Telegram </h3>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="add-account-tool-telegram.php" class="kt-subheader__breadcrumbs-link">
                            Tài khoản </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="getcontact.php?id=<?php echo $user; ?>" class="kt-subheader__breadcrumbs-link">
                            Danh bạ </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            Quản lý danh bạ </a>
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
                                    <i class="flaticon2-group"></i>Danh bạ
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#add_user_to_this_contact"
                                   role="tab" aria-selected="false">
                                    <i class="flaticon-users"></i> Thêm người dùng vào danh bạ này
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
                                                        <option value="delete">Xoá</option>
                                                    </select>
                                                </div>
                                                <div class="form-group ml-2 mb-0">
                                                    <button id="doAction" class="btn btn-info">Thực hiện</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-section col-12">
                                        <h3>
                                            Danh bạ: <?php
                                            echo $value['Name'];
                                            ?>
                                            <hr>
                                        </h3>

                                        <!-- <h4 class="kt-font-danger">Danh sách thành viên</h4> -->

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
                                                    <!-- <th>First_name</th> -->
                                                    <th class="kt-font-bolder">Name</th>
                                                    <th class="kt-font-bolder">Địa chỉ</th>
                                                    <th class="kt-font-bolder">Phone_Number</th>
                                                    <!-- <th>Danh bạ khác</th> -->
                                                    <th class="kt-font-bolder"  width="10%">Bạn bè</th>
                                                    <th class="kt-font-bolder"  width="15%">Xem thêm</th>
                                                </tr>
                                                <tr id="row-search">
                                                    <th data-is-search="false"></th>
                                                    <th data-is-search="false"></th>
                                                    <th data-is-search="true"></th>
                                                    <th data-is-search="true"></th>
                                                    <th data-is-search="true"></th>
                                                    <th data-is-search="false"></th>
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
                                                        echo '<th scope="row">' . ((int)$index + 1) . '</th>';
                                                        echo '<td>
                                                            <label>' . (isset($contact['user_last_name']) ? $contact['user_last_name'] : '') . '</label>
                                                            <div class="d-none">' . (isset($contact['user_last_name']) ? khong_dau($contact['user_last_name']) : '') . '</div>
                                                        </td>';
                                                        echo '<td>
                                                            <label>
                                                                ' . (isset($contact['address']) ? $contact['address'] : '') . '
                                                            </label>
                                                            <div class="d-none">' . (isset($contact['address']) ? khong_dau($contact['address']) : '') . '</div>
                                                        </td>';
                                                        echo '<td>';
                                                        echo '<label>' . (isset($contact['phone']) ? $contact['phone'] : '') . '
                                                            </label>';
                                                        echo '<td>
                                                            ' . ((($contact['friend_tele']) == 1) ? '<button class="btn btn-sm btn-outline-success get_friend_tele"><i class="la la-check"></i></button>' : '') . '
                                                        </td>';
                                                        echo '<td>';
                                                            echo '<button type="button" data-id="'.$contact['Id'].'" data-toggle="modal" data-target="#exampleModalCenter_'.$contact['Id'].'" class="btn btn-info btn-more-info">Xem thêm</button>';
                                                        ?>
                                                        <div class="modal fade" id="exampleModalCenter_<?php echo $contact['Id'] ?>" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết : <strong><?php echo $contact['user_last_name'] ?></strong></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group form-group-marginless">
                                                                            <div class="user_info_field">
                                                                                <label>Name: </label>
                                                                                <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter name" id="user_last_name"><?= $contact['user_last_name'] ?></a>
                                                                            </div>
                                                                            <div class="user_info_field">
                                                                                <label>Phone: </label>
                                                                                <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter username" id="phone"><?= $contact['phone'] ?></a>
                                                                            </div>
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
                                                                                </a>
                                                                            </div>
                                                                            <div class="user_info_field">
                                                                                <label>Address: </label>
                                                                                <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter username"  id="address"><?= $contact['address'] ?></a>
                                                                            </div>
                                                                            <div class="user_info_field">
                                                                                <label>Extra Address:</label>
                                                                                 <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter username" id="extra_address"><?= $contact['extra_address'] ?></a>
                                                                            </div>
                                                                            <div class="user_info_field">
                                                                                <label>Other Group: </label>
                                                                                <a class="" href="#"></a>
                                                                            </div>
                                                                            <div class="user_info_field">
                                                                                <label>Bạn bè Telegram:</label>
                                                                                 <a class="" href="#"></a>
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
                                                        <label>Vị trí cột Address</label>
                                                        <input type="number" class="form-control" name="index_address"
                                                               value="4">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 d-flex align-items-end">
                                                    <label class="kt-checkbox kt-checkbox--success">
                                                        <input type="checkbox" name="addFriend" value="thembanbe">
                                                        Thêm làm bạn bè Telegram
                                                        <span></span>
                                                    </label>
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
    }

    $(document).ready(function() {

         $("#checkAll").click(function(){
            $('.cbx:checkbox').not(this).prop('checked', this.checked);
        });

        
         // doAction

        $("#doAction").click(function() {
            // console.log($("select[name=action]").val());
            var name_action = $("select[name=action]").val();
            if(name_action != 0) {
                if(name_action) {
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
                                console.log(dt);
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
                    }else{
                        Swal.fire(
                            'Lỗi...',
                            'Bạn chưa đánh đấu record !',
                            'error',
                        );
                    }
                    
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
            params:  {'function':'update_user'}
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
                "ordering": false,
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

        });
    });
</script>