<?php
    include 'header.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $id=(isset($_GET['id'])?intval($_GET['id']):0);
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
                                    <i class="flaticon2-group"></i>Danh bạ
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_2_tab_content"
                                    role="tab" aria-selected="false">
                                    <i class="flaticon-users"></i> Thêm người dùng vào danh bạ
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
                                            <button type="button" class="btn btn-label-instagram" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="fa fa-book"></i> Thêm danh bạ
                                            </button>
                                        </div>
                                    </div>
                                    <div class="kt-section col-12">
                                        <span class="kt-section__info">
                                            DANH BẠ
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
                                                                    <th>Tên danh bạ</th>
                                                                    <th>Số lượng thành viên</th>
                                                                    <th>Bạn bè Telegram</th>
                                                                    <th>Mô tả</th>
                                                                    <th>Ngày tạo</th>
                                                                    <th>Chức năng</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $url2='http://localhost:2020/telegram/get_contact?id='.$id;                                                                ;
                                                                $curl2=curl_init($url2);
                                                                curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
                                                                curl_setopt($curl2, CURLOPT_HTTPHEADER, [
                                                                'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                                'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                                                                'Authorization: '.$_SESSION['user_token']
                                                                ]);
                                                                $response2=json_decode(curl_exec($curl2), true);
                                                                $httpcode2=curl_getinfo($curl2,CURLINFO_HTTP_CODE);
                                                                curl_close($curl2);
                                                                if ($httpcode2!=200) {
                                                                    $host  = $_SERVER['HTTP_HOST'];
                                                                    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                                                                    $extra = 'loginerror.php';
                                                                    echo("<script>window.location.href='http://". $host.$uri.'/'.$extra."'</script>;");
                                                                    exit;
                                                                }
                                                                else {
                                                                if (isset($response2))
                                                                foreach($response2 as $index => $list) {
                                                                    echo '<tr>
                                                                        <th scope="row">'.((int)$index+1).'</th>
                                                                        <td>
                                                                            <a href="groupcontact.php?id='.$list["Id"].(($id!=0)?('&user='.$id):"").'" >'.str_replace("<","&lt;",$list['Name']).'</a>
                                                                            </td>
                                                                        <td><label>'.$list["length"].'</label></td>
                                                                        <td><label>'.$list["lengthfriend"].'/'.$list["length"].'</label></td>
                                                                        <td><label>'.(isset($list["describe"])?str_replace("<", "&lt;",$list['describe']):"").'</label></td>
                                                                        <td><label>'.date("d/M/Y h:i:s",strtotime($list["createAt"])).'</label></td>
                                                                        <td class="d-flex justify-content-center">
                                                                            
                                                                            <div class="dropdown">
                                                                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    Action
                                                                                </button>
                                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                                    <a class="dropdown-item  btn btn-label-linkedin" href="groupcontact.php?id='.$list["Id"].'&user='.$id.'"><i class="fas fa-list"></i>Chi tiết</a>
                                                                                    '.(!empty($id)?('<a class="dropdown-item  btn btn-label-twitter add-group-chat" data-toggle="modal" data-target="#data_modal_list_group_chat" data-idcontact="'.$list["Id"].'"><i class="fas fa-comments"></i>Thêm vào group chat</a>
                                                                                    <a class="dropdown-item  btn btn-label-linkedin add-friend-telegram" data-idcontact="'.$list["Id"].'"><i class="fab fa-telegram-plane"></i>Thêm vào bạn bè Telegram</a>'
                                                                                    ):"").'<a class="dropdown-item  btn btn-label-twitter export-contact" data-idcontact="'.$list["Id"].'"><i class="fas fa-download"></i>Export CSV</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>';
                                                                    }
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                         <!--begin::Modal-->
                                                        <div class="modal fade" id="data_modal_list_group_chat" tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" style="display: none;"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-center" role="document">
                                                                <div class="modal-content">
                                                                    <input type="hidden" name="id_contact">
                                                                    <div class="modal-header">
                                                                        <h4>Thêm vào group chat Telegram</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <table class="table table-hover">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>#</th>
                                                                                    <th>Name</th>
                                                                                    <th>Thêm</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                    $url3='http://localhost:2020/telegram/get_list_group_chat_telegram?id='.$id;                                                                ;
                                                                                    $curl3=curl_init($url3);
                                                                                    curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true);
                                                                                    curl_setopt($curl3, CURLOPT_HTTPHEADER, [
                                                                                    'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                                                    'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                                                                                    'Authorization: '.$_SESSION['user_token']
                                                                                    ]);
                                                                                    $list_group_chat=json_decode(curl_exec($curl3), true);
                                                                                    $httpcode3=curl_getinfo($curl3,CURLINFO_HTTP_CODE);
                                                                                    curl_close($curl3);
                                                                                    if (isset($list_group_chat))
                                                                                    foreach($list_group_chat['chats'] as $index => $list) {
                                                                                        echo '<tr>
                                                                                        <th scope="col">'.intval($index+1).'</th>
                                                                                        <th scope="col">'.$list["title"].'</th>
                                                                                        <th><input type="checkbox" class="form-control add_group_tel" data-type="'.$list['_'].'" data-chat_id="'.$list["id"].'"></th>
                                                                                        </tr>';
                                                                                    } 
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="reset" class="btn btn-secondary"
                                                                            data-dismiss="modal">Hủy</button>
                                                                        <button type="submit" class="btn btn-primary btn_add_group_chat_telegram">Thêm</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end modal -->
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
                        <div class="tab-pane" id="kt_portlet_base_demo_1_2_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">
                                        <form class="kt-form kt-form--label-right" onsubmit="return beforeSubmit();" 
                                        action="addcontact.php" method="post"
                                            enctype="multipart/form-data">
                                            <span class="kt-section__info">
                                               
                                            </span>
                                            <div class="kt-section__content">
                                                <h4>Thêm bằng tay</h4>
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
                                                </div>
                                                <h4>Thêm vào danh bạ</h4>
                                                <div class="form-group row">
                                                    <div class="col-sm-2">
                                                        <label for="inputPassword" class="col-form-label">Tên danh bạ:</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <select class=" form-control col-lg-12 groupcontact"
                                                            name="groupcontact">
                                                            <option value=-1>-Không sử dụng-</option>
                                                            <?php
                                                                if (isset($response2))
                                                                foreach($response2 as $index) {
                                                                echo '<option value='.$index['Id'].'>'.str_replace("<","&lt;",$index['Name']).'
                                                                </option>';
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 d-flex align-items-end">
                                                    <label class="kt-checkbox kt-checkbox--success">
															<input type="checkbox" name="addFriend" value="thembanbe"> Thêm làm bạn bè Telegram
															<span></span>
														</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-portlet__foot">
                                                <div class="kt-form__actions">
                                                    <div class="row">
                                                        <div class="col-lg-12 text-center">
                                                            <button type="submit" class="btn btn-outline-brand"><i class="la flaticon2-avatar"></i> Thêm mới
                                                            </button>
                                                            <button type="reset" class="btn btn-outline-secondary"><i class="la flaticon2-delete"></i> Huỷ</button>
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
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    <div class="input-group-append"><span class="input-group-text" id="basic-addon2"><i class="la la-group"></i></span></div>
                </div>
                <label>Mô tả</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="describe" aria-describedby="basic-addon3">
                    <div class="input-group-append"><span class="input-group-text" id="basic-addon3"><i class="fas fa-sticky-note"></i></span></div>
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
    function beforeSubmit(){
            if ($('#myfile').val())
            {
                var ext = $('#myfile').val().split('.').pop().toLowerCase();
                if(ext!=='csv') {
                    Swal.fire(
                        'Oops...',
                        'Vui lòng nhập đúng định dạng đuôi CSV, phân tách bởi dấu phẩy.',
                        'error'
                        )
                    return false;
                }
                else return confirm('Thực hiện thêm danh bạ?');
            }
            else if ($('input[name="phone[]"]').val()) 
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

jQuery(document).ready(function($) {
    $('.add-group-chat').click(function(){
        $('input[name="id_contact"]').val($(this).attr('data-idcontact'));
    })
    $('.btn_add_group_chat_telegram').click(function(){
        let array_chat_id=[];
        $('.add_group_tel').map(function() {
            if (this.checked && $(this).attr('data-chat_id')!="") 
                array_chat_id.push({
                    id: $(this).attr('data-chat_id'), 
                    type: $(this).attr('data-type')
                })
        })
        if (array_chat_id.length==0 || $('input[name="id_contact"]').val()=="") {
            Swal.fire(
                'Lỗi...',
                'Danh sách group chat Telegram rỗng',
                'error',
            );
        }
        else {
            $.ajax({
            url: "./createapp.php",
            type: "POST",
            data: {
                "function": "add_group_chat_telegram",
                "id_group_chat": JSON.stringify(array_chat_id),
                "id_contact": $('input[name="id_contact"]').val(),
                "id": <?php echo $id; ?>
            },
            success: function(dt) {
                if (dt) {
                    Swal.fire(
                        'Thêm thành công',
                        'Thêm thành công ' + dt + ' người dùng vào ' + array_chat_id.length + ' nhóm chat',
                        'success',
                    );
                    location.reload();
                }
                else Swal.fire(
                'Lỗi...',
                'Lỗi khi thêm người dùng vào nhóm chat',
                'error',
            );
            }
        })
        }
    })
    $("select.groupcontact").change(function() {
        let selected = $(this).children("option:selected").val();
        if (selected == 0) {
            $(".namegroup").addClass("display-block");
        } else {
            $(".namegroup").removeClass("display-block");
        }
    });
    $('.addgroupcontact').on('click', function(){
        if ($('input[name="name"]').val()=='') alert("Trường tên nhóm liên hệ không được rỗng");
        else {
        $('.addgroupcontact').hide();
        $.ajax({
            url: "./createapp.php",
            type: "POST",
            data: {
                "function": "addgroupcontact",
                "name": $('input[name="name"]').val(),
                "describe": $('input[name="describe"]').val(),
                "id": <?php echo $id; ?>
            },
            success: function(dt) {
                if (dt==1) {
                    Swal.fire(
                        'Thêm danh bạ',
                        'Thêm mới danh bạ thành công',
                        'success',
                    );
                    location.reload();
                }
                else Swal.fire(
                'Lỗi...',
                'Lỗi khi thêm mới danh bạ',
                'error',
            );
            }
        })
    }
    })

    $(".export-contact").on("click", function() {
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
                        "id": <?php echo $id; ?>,
                        "idcontact": $(this).attr('data-idcontact'),
                    },
                    success: function(response) {
                        if (response) 
                            {
                                window.location=response;
                                swalWithBootstrapButtons.fire(
                                    'Downloaded!',
                                    'Tải xuống thành công',
                                    'success'
                                    )
                                }
                        else swalWithBootstrapButtons.fire(
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
    })
    $('.add-friend-telegram').click(function() {
        Swal.fire({
            title: 'Thêm bạn bè Telegram?',
            text: "Thêm danh sách thành viên trong danh bạ vào bạn bè Telegram?",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, add friend!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "./createapp.php",
                    type: "POST",
                    data: {
                        "function": "add_friend_tel_from_contact",
                        "id": <?php echo $id; ?>,
                        "idcontact": $(this).attr('data-idcontact'),
                    },
                    success: function(response) {
                        if (response) 
                            {
                                Swal.fire(
                                    'Success!',
                                    'Thêm thành công '+response+' người dùng vào bạn bè Telegram.',
                                    'success'
                                    )
                                }
                        else Swal.fire(
                            'Error!',
                            'Thêm bạn bè thất bại',
                            'error'
                            )
                        }
                    })
            }
            })
    })
})
</script>