<?php
$id=isset($_GET['id'])?intval($_GET['id']):0;
include 'header.php';
if ($id!=0) {
    $url='http://localhost:2020/telegram/get_list_group_chat_telegram?id='.$id;
    $curl=curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
        'Authorization: '.$_SESSION['user_token']
    ]);
    $list_group_chat=json_decode(curl_exec($curl), true);
    $list_group=$list_group_chat['chats'];
    $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
    curl_close($curl);
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
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            Group chat</a>
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
                                    <i class="flaticon2-group"></i>Danh sách group chat
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
                                        <div class="kt-section__content">
                                            <table class="table table-hover">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Số lượng</th>
                                                        <th>Kiểu</th>
                                                        <th>Hành động<th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (!empty($list_group))
                                                    foreach($list_group as $index => $group)
                                                    {
                                                    echo ' <tr>
                                                        <th scope="row">'.((int)$index+1).'</th>
                                                        <td>
                                                            <label>
                                                                '.(isset($group['id'])?$group['id']:'').'
                                                            </label>
                                                        </td>';
                                                        echo '<td>
                                                            <a href="list-user-in-group.php?id='.$id.(($group['_']=="chat")?("&chat_id=".$group['id']):("&channel_id=".$group['id']."&access_hash=".$group['access_hash'])).'">'.(isset($group['title'])?$group['title']:'').'</a>
                                                        </td>';
                                                        echo '<td>
                                                            <label>'.(isset($group['count'])?$group['count']:'').'
                                                            </label>
                                                        </td>';
                                                        echo '<td><span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill m-1">
                                                            '. (($group['_']=="chat") ? "GROUP" : (($group['_']=="channel" && isset($group['megagroup']))? "SUPER GROUP" : "CHANNEL")) .'</span>
                                                        </td>';
                                                        echo '<td class="d-flex justify-content-center" >
                                                        <div class="dropdown">
                                                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu add-group-chat" aria-labelledby="dropdownMenu2" data-id="'.$group['id'].'">
                                                                <a class="dropdown-item btn btn-label-linkedin" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-address-book"></i>Thêm vào group chat</a>                                                                
                                                            </div>
                                                        </div>';
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Thêm vào group chat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group form-group-marginless">
                    <!-- cho thành table  -->
                <input type="hidden" name="from_id_group">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên nhóm</th>
                        <th>Chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td>Chọn tất cả</td>
                        <td>
                        <label class="p-2 flex-shrink-1 bd-highlight kt-checkbox kt-checkbox--bold kt-checkbox--success">
                            <input value="" class="cbx checkall" type="checkbox">
                            <span></span>
                        </label>
                        </td>
                    </tr>
                    <?php 
                    foreach($list_group as $index => $group)
                    {
                        echo '
                    <tr>
                        <td>'.intval($index+1).'</td>
                        <td>'.(isset($group['title'])?$group['title']:'').'</td>
                        <td>
                        <label class="p-2 flex-shrink-1 bd-highlight kt-checkbox kt-checkbox--bold kt-checkbox--success">
                            <input data-id="'.$group['id'].'" data-type="'.$group['_'].'" class="cbx" type="checkbox">
                            <span></span>
                        </label>
                        </td>
                    </tr>';
                    }
                    ?>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add_group_chat" data-dismiss="modal">Thêm</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<script>
$('.add-group-chat').click(function () {
    $('input[name="from_id_group"]').val($(this).attr('data-id'));
})
$('.checkall').click(function() {
    $('.cbx:checkbox').not(this).prop('checked', this.checked);
})
$('.add_group_chat').click(function(){
    let array_chat_id = [];
    $('.cbx:checkbox').map(function(){
        if (this.checked && $(this).attr('data-id') != "")
            array_chat_id.push({
                id: $(this).attr('data-id'),
                type: $(this).attr('data-type')
            })
    })
    if (array_chat_id.length == 0) {
        Swal.fire(
            'Lỗi...',
            'Danh sách group chat Telegram rỗng',
            'error',
        );
    } else {
        $.ajax({
            url: "./createapp.php",
            type: "POST",
            data: {
                "function": "add_group_chat_telegram",
                "id_group_chat": JSON.stringify(array_chat_id),
                "from_id_group": $('input[name="from_id_group"]').val(),
                "id": <?php echo $id; ?>
            },
            success: function (dt) {
                if (dt=="success") 
                {
                    Swal.fire(
                        'Thêm thành công',
                        'Lên lịch thành công thêm người dùng vào nhóm chat',
                        'success',
                    );
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
</script>