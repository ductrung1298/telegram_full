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
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="col-12 mb-3" style="padding: 0 -10px;">
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
                                                        data-target="#exampleModalCenter">
                                                    <i class="fa fa-book"></i> Thêm danh bạ
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

                                        <h4 class="kt-font-danger">Danh sách thành viên</h4>

                                        <div class="kt-section__content">
                                            <table class="table dataTable table-hover">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>
                                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                                                <input id="checkAll" type="checkbox">
                                                                <span></span>
                                                            </label>
                                                    </th>
                                                    <th>#</th>
                                                    <th>First_name</th>
                                                    <th>Last_name</th>
                                                    <th>Phone_Number</th>
                                                    <!--                                                    <th>Address</th>-->
                                                    <th>Danh bạ khác</th>
                                                    <th>Bạn bè Telegram</th>
                                                    <th>Bạn bè Zalo</th>
                                                    <th>Xem thêm</th>
                                                </tr>
                                                <tr>
                                                   
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                if (!empty($list_user_in_contact))
                                                    foreach ($list_user_in_contact as $index => $contact) {
                                                        echo ' <tr>
                                                        <th><label class="kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                                                                <input value="'. $contact["Id"].'" class="cbx" type="checkbox">
                                                                                <span></span>
                                                                            </label></th>
                                                        <th scope="row">' . ((int)$index + 1) . '</th>
                                                        <td>
                                                            <label class="get_first_name">
                                                                ' . (isset($contact['user_first_name']) ? $contact['user_first_name'] : '') . '
                                                            </label>
                                                        </td>';
                                                        echo '<td>
                                                            <label class="get_last_name">' . (isset($contact['user_last_name']) ? $contact['user_last_name'] : '') . '</label>
                                                        </td>';
                                                        echo '<td>';
                                                        echo '<label class="get_phone">' . (isset($contact['phone']) ? $contact['phone'] : '') . '
                                                            </label>';
                                                        if ($extra_phone = json_decode($contact['extra_phone'], true)) {
                                                            echo "<div class='get_extra_phone d-none'>";
                                                            foreach ($extra_phone as $key => $phone) {
                                                                if ($key === array_key_last($extra_phone))
                                                                    echo '<label class="kt-font-bolder"> ' . $phone . '
                                                                     </label>';
                                                                else
                                                                    echo '<label class="kt-font-bolder"> ' . $phone . '<span class="mx-2">,</span>
                                                                     </label>';
                                                            }
                                                            echo "</div>";
                                                        }
                                                        if (isset($contact['address'])) {
                                                            echo '<div class="get_address d-none">
                                                             <label class="kt-font-bolder">' . $contact['address'] . '</label>
                                                         </div>';
                                                        }
                                                        $data = isset($contact['othergroup']) ? $contact['othergroup'] : [];
                                                        echo '<td class="get_othergroup">';
                                                        foreach ($data as $key => $item) {
                                                            if ($item != $value["Name"])
                                                                echo '<span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill m-1">' . $item . '</span>';
                                                        }

                                                        echo '</td>';

                                                        echo '<td>
                                                            ' . ((($contact['friend_tele']) == 1) ? '<button class="btn btn-sm btn-outline-success get_friend_tele"><i class="la la-check"></i></button>' : '') . '
                                                        </td>
                                                        <td></td>';
                                                        echo '<td>
                                                            <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-info btn-more-info">Xem thêm</button>
                                                        </td>';
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group form-group-marginless">
                    <div>
                        <label>First name: <strong id="set_first_name"></strong></label>
                    </div>
                    <div>
                        <label>Last name: <strong id="set_last_name"></strong></label>
                    </div>
                    <div>
                        <label>Phone: <strong id="set_phone"></strong></label>
                    </div>
                    <div>
                        <label>Extra Phone: <strong id="set_extra_phone"></strong></label>
                    </div>
                    <div>
                        <label>Address: <strong id="set_address"></strong></label>
                    </div>
                    <div>
                        <label>Other Group: <strong id="set_othergroup"></strong></label>
                    </div>
                    <div>
                        <label>Bạn bè Telegram: <strong id="set_friend_tele"></strong></label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
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
        $(".btn-more-info").click(function () {
            // alert(123);
            var first_name = $(this).parent().parent("tr").find(".get_first_name");
            var last_name = $(this).parent().parent("tr").find(".get_last_name");
            var phone = $(this).parent().parent("tr").find(".get_phone");
            var address = $(this).parent().parent("tr").find(".get_address");
            var extra_phone = $(this).parent().parent("tr").find(".get_extra_phone");
            var othergroup = $(this).parent().parent("tr").find(".get_othergroup");
            var friend_tele = $(this).parent().parent("tr").find(".get_friend_tele");
            console.log(othergroup);
            $("#set_first_name").text(first_name.text());
            $("#set_last_name").text(last_name.text());
            $("#set_phone").text(phone.text());
            if (extra_phone.length) $("#set_extra_phone").html(extra_phone.html());
            else $("#set_extra_phone").html("<label>Không có</label>");
            if (address.length) $("#set_address").html(address.html());
            else $("#set_address").html("<label>Không có</label>");
            if (othergroup.find("span").length) $("#set_othergroup").html(othergroup.html());
            else $("#set_othergroup").html("<label>Không có</label>");
            if (othergroup.find("span").length) $("#set_othergroup").html(othergroup.html());
            else $("#set_othergroup").html("<label>Không có</label>");
            if (friend_tele.length) $("#set_friend_tele").html(friend_tele.html());
            else $("#set_friend_tele").html("<label>Không có</label>");
        });
    });
</script>