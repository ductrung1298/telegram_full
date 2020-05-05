<?php
$id=isset($_GET['id'])?intval($_GET['id']):0;
include 'header.php';
if ($id!=0) {
    $url='http://localhost:2020/telbot/get_log_bot?id='.$id;
    $curl=curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
        'Authorization: '.$_SESSION['user_token']
    ]);
    $list_log=json_decode(curl_exec($curl), true);
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
                        <a href="get-user-group.php?id=<?php echo $id;?>" class="kt-subheader__breadcrumbs-link">
                            Group chat Telegram </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            Member group chat </a>
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
                                    <i class="flaticon2-group"></i>Danh sách member
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active " id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel">
                            <div class="kt-portlet__head kt-portlet__head--lg">
                                <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon">
                                        <i class="kt-font-brand flaticon2-line-chart"></i>
                                    </span>
                                    <h3 class="kt-portlet__head-title">
                                        Group chat: <?php echo $list_user['name']; ?> - <?php echo $list_user['lengthuser']; ?>/<?php echo $list_user['total'];?>
                                    </h3>
                                </div>
                                <div class="kt-portlet__head-toolbar">
                                    <div class="kt-portlet__head-wrapper">
                                        <div class="kt-portlet__head-actions">
                                            <div class="dropdown dropdown-inline">
                                                <button type="button" class="btn mb-2 btn-default btn-icon-sm export_user">
                                                    <i class="la la-download"></i> Export
                                                </button>
                                                <button type="button" class="btn btn-brand btn-elevate btn-icon-sm mb-2">
                                                    <i class="la la-plus"></i> Mời vào nhóm
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th>ID</th>
                                            <th scope="col">First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                            <th>Phone</th>
                                            <th>Bạn bè Telegram</th>
                                            <th>Loại</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($list_user) && !empty($list_user['users']))
                                        foreach($list_user['users'] as $index => $user)
                                        if (isset($user['id']))
                                        {
                                        echo ' <tr>
                                            <th scope="row">'.((int)$index+1 + $page*50).'</th>
                                            <td>
                                                <label>
                                                    '.(isset($user['user_id'])?$user['user_id']:'').'
                                                </label>
                                            </td>';
                                            echo '<td>
                                                <label>'.(isset($user['first_name'])?$user['first_name']:"").'
                                                </label>
                                            </td>';
                                            echo '<td>
                                                <label>'.(isset($user['last_name'])?$user['last_name']:'').'
                                                </label>
                                            </td>';
                                            echo '<td>
                                                <label>'.(isset($user['username'])?$user['username']:'').'
                                                </label>
                                            </td>';
                                            echo '<td>
                                                <label>'.(isset($user['phone'])?$user['phone']:'').'
                                                </label>
                                            </td>';
                                            echo '<td>
                                                <label>'.(isset($user['contact'])?'<button class="btn btn-sm btn-outline-success"><i class="la la-check"></i></button>':'').'
                                                </label>
                                            </td>';
                                            if (isset($user['bot']) && $user['bot']==true)
                                                echo '<td>
                                                <span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill m-1">BOT
                                                    </span>
                                                </td>';
                                            else
                                            echo '<td>
                                            <span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill m-1">USER
                                                </span>
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
<?php include 'footer.php'; ?>
<script> 
var KTDatatablesAdvancedColumnRendering = function() {
	var initTable1 = function() {
		var table = $('#kt_table_1');

		// begin first table
		table.DataTable({
			responsive: true,
			paging: true,
			columnDefs: [
			],
		});
	};
	return {
		//main function to initiate the module
		init: function() {
			initTable1();
		}
	};
}();

jQuery(document).ready(function() {
	KTDatatablesAdvancedColumnRendering.init();
});

$(".export_user").on("click", function() {
Swal.fire({
    title: 'Are you sure?',
    text: "Tải xuống file danh sách người dùng!",
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Download now!'
    })
    .then((result) => {
        if (result.value) {
            <?php
                $filename="./export/contact_id=".$id."_".date("Y-m-d").".csv";
                $output=fopen($filename, "w");
                fputs($output, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
                fputcsv($output, array("phone", "user_id", "access_hash", "first name", "last name", "user name"));
                foreach($list_user['users'] as $contact) {
                    fputcsv($output, array(isset($contact['phone'])?$contact['phone']:'', isset($contact['id'])?$contact['id']:'',isset($contact['access_hash'])?$contact['access_hash']:"",isset($contact['first_name'])?$contact['first_name']:'', isset($contact['last_name'])?$contact['last_name']:'', isset($contact['username'])?$contact['username']:''));
                }
                fclose($output);
                echo 'window.location="'.$filename.'";';
            ?>
            Swal.fire(
                'Download!',
                'Tải xuống thành công.',
                'success'
                )
        }
        else Swal.fire(
                'Download!',
                'Tải xuống thất bại',
                'error'
                )
    })
})
</script>