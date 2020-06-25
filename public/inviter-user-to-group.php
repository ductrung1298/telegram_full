<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

$process_id = isset($_GET['process_id'])?intval($_GET['process_id']): 0;
include 'header.php';
$url='http://localhost:2020/telegram/get_process/'.$process_id;
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
    'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
    'Authorization: ' . $_SESSION['user_token']
]);
$info_process = json_decode(curl_exec($curl), true);
$httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
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
                        <a href="add-account-tool-telegram.php" class="kt-subheader__breadcrumbs-link">
                            Danh sách tài khoản </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            Mời người dùng từ group <?php echo isset($info_process['data']['from']['name'])?$info_process['data']['from']['name']:"" ?> sang group khác</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:: Subheader -->
        <!-- begin:: Content -->
        <div class="kt-container  kt-grid__item kt-grid__item--fluid">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__body">
                <?php 
                        $to_html = '';
                        if (!empty($info_process['data']['to'])) 
                        foreach($info_process['data']['to'] as $to ) {
                            $to_html = $to_html.$to['name']." ";
                        }
                        echo '
                        <div class="col-xl-3">
                            <div class="kt-portlet kt-portlet--height-fluid">
                                <div class="kt-portlet__body">
                                    <div class="kt-widget kt-widget--user-profile-2">
                                        <div class="kt-widget__head">
                                            <div class="kt-widget__info">
                                                <span class="kt-widget__username" style="display: block;">
                                                    Nguồn: '.$info_process['data']['from']['name'].'
                                                </span>
                                                <span class="kt-widget__desc">
                                                    Đích: '.$to_html.'
                                                </span>
                                            </div>
                                        </div>
                                        <div class="kt-widget__body">
                                            <div class="kt-widget__item">
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Trạng thái:</span>
                                                    <span class="kt-widget__data btn btn-outline-brand stop_inviter" '.(($info_process['data']['status']==1)?'data-toggle="kt-tooltip" title="STOP"':"").'>'.(($info_process['data']['status']==1)?"Running":"Finish").'</span>
                                                </div>
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Tổng số người dùng:</span>
                                                    <span class="kt-widget__data">'.$info_process['data']['from']['total_user'].'</span>
                                                </div>
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Tổng số lượt mời thành công:</span>
                                                    <span class="kt-widget__data">'.$info_process['data']['success'].'</span>
                                                </div>
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Tổng số lượt mời thất bại:</span>
                                                    <span class="kt-widget__data">'.$info_process['data']['error'].'</span>
                                                </div>
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Thời gian bắt đầu:</span>
                                                    <span class="kt-widget__data">'.date('d/m/y h:i:s', strtotime($info_process['data']['create_at'])).'</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        if ($info_process['data']['status'] == 1) 
                        echo '<div class="text-center">
                                <div class="spinner-border loading" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>';
                    ?>
                    
                    <!-- <div class="d-flex flex-row-reverse bd-highlight">
                        <div class="btn btn-danger font-weight-bolder font-size-sm stop_inviter">Dừng quét</div>
                    </div> -->
                    <div class="tab-content">
                        <div class="tab-pane active " id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">                                        
                                        <div class="kt-section__content">
                                            <table class="table table-hover" id="datatb">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Người mời</th>
                                                        <th>Người được mời</th>
                                                        <th>Group nguồn</th>
                                                        <th>Group đích</th>
                                                        <th>Trạng thái</th>
                                                        <th>Nội dung</th>
                                                        <th>Vào lúc</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="list_process">
                                                    <?php
                                                        $url='http://localhost:2020/telegram/log_inviter?process_id='.$process_id;
                                                        $curl = curl_init($url);
                                                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                                        curl_setopt($curl, CURLOPT_HTTPHEADER, [
                                                            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                                                            'Authorization: ' . $_SESSION['user_token']
                                                        ]);
                                                        $log_inviter = json_decode(curl_exec($curl), true);
                                                        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
                                                        if ($httpcode == 200 ) {
                                                            $int = 0;
                                                            foreach($log_inviter as $log) {
                                                                $int ++;
                                                                if ($log['status']==1) $message = json_decode($log['message'], true);
                                                                echo '
                                                                <tr>
                                                                    <th scope="row">'.$int.'</th>
                                                                    <td>'.$log['account_name'].'</td>
                                                                    <td>
                                                                        '.$log['from_user_name'].'
                                                                    </td>
                                                                    <td>
                                                                        '.$info_process['data']['from']['name'].'
                                                                    </td>
                                                                    <td>
                                                                        '.$log['to_group_name'].'
                                                                    </td>
                                                                    <td>
                                                                        '.(($log['status']==0)?'<span class="btn btn-bold btn-sm btn-font-sm btn-label-danger">Error</span>':'<span class="btn btn-bold btn-sm btn-font-sm btn-label-success">Success</span>').'
                                                                    </td>
                                                                    <td style="word-break: break-all;">
                                                                        '.(($log['status']==0)?$log['message']:($message['users'][1]['first_name'] . ' ' .$message['users'][1]['last_name'] )).'
                                                                    </td>
                                                                    <td>
                                                                        '.date('d/m/y h:i:s', strtotime($log['at'])).'
                                                                    </td>
                                                                </tr>';
                                                            }
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

    $('#datatb thead .row-search th').each( function () {
        if($(this).data('is-search')) {
        var title = $(this).text();
                $(this).html('<input type="text" style="width:100%;" placeholder="" />' );
        }
    } );

    // DataTable
    var table5 = $('#datatb').DataTable({
        "ordering": true,
        "searching":true,
        "paging": true,
    });

    // Apply the search
    table5.columns().every( function () {
        var that = this;
        $( 'input', this.header() ).on( 'keyup change clear', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value)
                    .draw();
            }
        } );
    });

<?php
    if (($info_process['data']['status'] == 1)):
?>
jQuery(document).ready(function($) {
    $('.stop_inviter').click(function() {
        Swal.fire({
                title: 'Dừng tiến trình',
                text: "Dừng tiến trình thêm người dùng vào nhóm?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Stop!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "./createapp.php",
                        type: "POST",
                        data: {
                            "function": "stop_process",
                            "id": <?php echo $process_id;?>,
                        },
                        success: function (dt) {
                            if (dt) {
                                Swal.fire(
                                    'Thành công!',
                                    'Dừng mời người dùng vào nhóm thành công',
                                    'success'
                                    )
                                location.reload();
                            }
                            else  Swal.fire(
                            'Thất bại!',
                            'Dừng mời người dùng vào nhóm thất bại',
                            'error'
                        );
                        }
                    })
                }
            })
    })
})

var socket = io("https://mydas.life:2020", {
    query: {token: "<?php echo $_SESSION['user_token']?>"}
});
let int = 0;
socket.on(<?php echo $process_id; ?>, function(data)
{
    int ++;
    if (data && data.length!=0 && data!= "END") 
    {
        try {
            data = JSON.parse(data);
        }
        catch(e) {
        }
        let html = `
        <tr>
            <th scope="row">${int}</th>
            <td>${data.account_name}</td>
            <td>
                ${data.from_user_name}
            </td>
            <td>
                ${data.from_group}
            </td>
            <td>
                ${data.to_group_name}
            </td>
            <td>
                ${((data.status==0)?'<span class="btn btn-bold btn-sm btn-font-sm btn-label-danger">Error</span>':'<span class="btn btn-bold btn-sm btn-font-sm btn-label-success">Success</span>')}
            </td>
            <td>
                ${data.message}
            </td>
            <td>
                ${new Date(data.at).toLocaleString()}
            </td>   
        </tr>`;
    $("#list_process").prepend(html);
    }
    else if (data == "END") 
    {
        $('.loading').hide();
        socket.disconnect();
    }
});

<?php endif; 
?>

</script>