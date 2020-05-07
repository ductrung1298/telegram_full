<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

$id=isset($_GET['id'])?intval($_GET['id']):0;
include 'header.php';
if ($id!=0) {
    $url='http://localhost:2020/telbot/log?id='.$id;
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
                        <a href="list-bot-telegram.php" class="kt-subheader__breadcrumbs-link">
                            Danh sách bot </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            Thống kê câu lệnh </a>
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
                                    <i class="flaticon2-group"></i>Thống kê
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active " id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <table class="table table-striped- table-bordered table-hover table-checkable table-responsive" id="kt_table_2" style="white-space: nowrap;">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th>BOT</th>
                                            <th>Người gửi</th>
                                            <th>Lúc</th>
                                            <th>Nội dung</th>
                                            <th>Trả lời</th>
                                        </tr>
                                        <tr id="row-search">
                                            <th data-is-search="false"></th>
                                            <th data-is-search="true"></th>
                                            <th data-is-search="true"></th>
                                            <th data-is-search="true"></th>
                                            <th data-is-search="true"></th>
                                            <th data-is-search="true"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($list_log))
                                        foreach($list_log as $index => $log)
                                        {
                                        echo ' <tr>
                                            <th scope="row">'.$log['Id'].'</th>
                                            <td>
                                                <label>
                                                    '.(isset($log['title'])?$log['title']:'').'
                                                </label>
                                                <div class="d-none">' . (isset($log['title']) ? khong_dau($log['title']) : '') . '</div>
                                            </td>';
                                            echo '<td>
                                                <label>'.(isset($log['first_name'])?$log['first_name']:"").'
                                                </label>
                                                <div class="d-none">' . (isset($log['first_name']) ? khong_dau($log['first_name']) : '') . '</div>
                                            </td>';
                                            echo '<td>
                                                <label>'.date("Y-m-d h:i:sa", strtotime($log['date'])).'
                                                </label>
                                            </td>';
                                            echo '<td>
                                                <label>'.($log['action']).'
                                                </label>
                                                <div class="d-none">' . (isset($log['action']) ? khong_dau($log['action']) : '') . '</div>
                                            </td>';
                                            echo '<td>
                                                <label>'.($log['text']).'
                                                </label>
                                                <div class="d-none">' . (isset($log['text']) ? khong_dau($log['text']) : '') . '</div>
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
$('#kt_table_2 thead #row-search th').each( function () {
    if($(this).data('is-search')) {
    var title = $(this).text();
            $(this).html('<input type="text" style="width:100%;" placeholder="" />' );
    }
} );

// DataTable
var table = $('#kt_table_2').DataTable({
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
</script>