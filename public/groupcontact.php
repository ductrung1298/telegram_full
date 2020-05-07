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
                                                        <option value="delete">Xoá</option>
                                                    </select>
                                                </div>
                                                <div class="form-group ml-2 mb-0">
                                                    <button id="doAction" class="btn btn-info">Thực hiện</button>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-label-instagram" data-toggle="modal"
                                                        data-target="#exampleModalCenter2">
                                                    <i class="fa fa-book"></i> Thêm khách hàng vào danh bạ này
                                                </button>
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
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>
                                                        <label class="align-top kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                                                <input id="checkAll" type="checkbox">
                                                                <span></span>
                                                            </label>
                                                    </th>
                                                    <!-- <th>#</th> -->
                                                    <!-- <th>First_name</th> -->
                                                    <th>Name</th>
                                                    <th>Địa chỉ</th>
                                                    <th>Phone_Number</th>
                                                    <!-- <th>Danh bạ khác</th> -->
                                                    <th width="10%">Bạn bè</th>
                                                    <th width="15%">Xem thêm</th>
                                                </tr>
                                                <tr id="row-search">
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
                                                        // echo '<th scope="row">' . ((int)$index + 1) . '</th>';
                                                        echo '<td>
                                                            <label>' .(isset($contact['user_first_name'])?$contact['user_first_name']:"")." ". (isset($contact['user_last_name']) ? $contact['user_last_name'] : '') . '</label>
                                                            <div class="d-none">' .(isset($contact['user_first_name'])?$contact['user_first_name']:"")." ". (isset($contact['user_last_name']) ? khong_dau($contact['user_last_name']) : '') . '</div>
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
                                                                            <div>
                                                                                <label>First Name: <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter name" id="user_first_name"><?php echo (isset($contact['user_first_name'])?$contact['user_first_name']:"") ?></a></label>
                                                                            </div>
                                                                            <div>
                                                                                <label>Last Name: <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter name" id="user_last_name"><?php echo (isset($contact['user_last_name'])?$contact['user_last_name']:"") ?></a></label>
                                                                            </div>
                                                                            <div>
                                                                                <label>Phone: <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter username" id="phone"><?= $contact['phone'] ?></a></label>
                                                                            </div>
                                                                            <div>

                                                                                
                                                                                <label>Extra Phone: <a class="editable_on" href="#" data-type="text"data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter username" href="#" id="extra_phone">
                                                                                <?php

                                                                                    if(!empty($contact['extra_phone'])) {
                                                                                            foreach(json_decode($contact['extra_phone'],true) as $index => $value) {
                                                                                                if($index > 0) {
                                                                                                    echo ','.$value;
                                                                                                }else {
                                                                                                    echo $value;
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    ?>
                                                                                </a></label>
                                                                            </div>
                                                                            <div>
                                                                                <label>Address: <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter username"  id="address"><?= $contact['address'] ?></a></label>
                                                                            </div>
                                                                            <div>
                                                                                <label>Extra Address: <a class="editable_on" href="#" data-type="text" data-pk="<?= $contact['Id'] ?>" data-url="createapp.php" data-title="Enter username" id="extra_address"><?= $contact['extra_address'] ?></a></label>
                                                                            </div>
                                                                            <div>
                                                                                <label>Other Group: <a class="" href="#"></a></label>
                                                                            </div>
                                                                            <div>
                                                                                <label>Bạn bè Telegram: <a class="" href="#"></a></label>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
<script>
    $(document).ready(function() {

         $("#checkAll").click(function(){
            $('.cbx:checkbox').not(this).prop('checked', this.checked);
        });

        
         // doAction

        $("#doAction").click(function() {
            console.log($("select[name=action]").val());
            var searchIDs = $(".cbx:checked").map(function(){
              return $(this).val();
            }).get();
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
        });
            // $(".editable_on").editable({
            //     mode:'inline',
            //     params:  {'function':'update_user'}
            // });
        $(".editable_on").editable({
            mode:'inline',
            params:  {'function':'update_user'}
        });

        $('#datatb').load('.editable_on', function() {
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


    //     $("#datatb").on('click','.btn-more-info',function () {
    //         // alert('call');
    //         var id = $(this).data('id');
    //         $.ajax({
    //             url: "./createapp.php",
    //             type: "POST",
    //             data: {
    //                 "function": "get_user",
    //                 "id": id
    //             },
    //             success: function (dt) {
    //                 if (dt) {
    //                     var data = JSON.parse(dt);
    //                     for(let item in data) {
    //                         var elm = $("#set_" + item);
    //                         if(item === 'extra_phone') {
    //                             var extra_phone = JSON.parse(data[item]);
    //                             var xhtml = "";
    //                             for(phone in extra_phone) {
    //                                 xhtml += '<p class="kt-font-bolder d-inline-block mb-0">'+ extra_phone[phone] +'</p>';
    //                             }
    //                             elm.html(xhtml);
    //                         } else {
    //                             elm.text(data[item]);
    //                         }
    //                         elm.editable({mode:'inline'});
    //                     }
    //                 } else {
    //                     console.log('error');
    //                 }
    //             }
    //         })
    //     })
    });
</script>