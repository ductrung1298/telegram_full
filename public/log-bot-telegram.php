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
                                    <i class="flaticon2-group"></i>Log tin nhắn
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab"
                                    href="#kt_portlet_base_demo_1_2_tab_content" role="tab" aria-selected="true">
                                    <i class="flaticon-users"></i>Log mời người dùng vào nhóm
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab"
                                    href="#kt_portlet_base_demo_1_3_tab_content" role="tab" aria-selected="true">
                                    <i class="flaticon-users"></i>Thống kê mời người dùng vào nhóm
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
                                            <th>Người gửi</th>
                                            <th>Người nhận</th>
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
                                                <label>'.(isset($log['first_name'])?$log['first_name']:"").'
                                                </label>
                                                <div class="d-none">' . (isset($log['first_name']) ? khong_dau($log['first_name']) : '') . '</div>
                                            </td>
                                            <td>
                                            <label>
                                                '.(isset($log['title'])?$log['title']:'').'
                                            </label>
                                                <div class="d-none">' . (isset($log['title']) ? khong_dau($log['title']) : '') . '</div>
                                            </td>   
                                            <td>
                                                <label>'.date("Y-m-d h:i:sa", strtotime($log['date'])).'
                                                </label>
                                            </td>
                                            <td>
                                                <label>'.($log['action']).'
                                                </label>
                                                <div class="d-none">' . (isset($log['action']) ? khong_dau($log['action']) : '') . '</div>
                                            </td>
                                            <td>
                                                <label>'.($log['text']).'
                                                </label>
                                                <div class="d-none">' . (isset($log['text']) ? khong_dau($log['text']) : '') . '</div>
                                            </td>
                                            </tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--  end block 1 -->
                        <!-- start thống kê thêm người dùng vào nhóm -->
                        <div class="tab-pane" id="kt_portlet_base_demo_1_2_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <table class="table table-striped- table-bordered table-hover table-checkable table-responsive" id="kt_table_3" style="white-space: nowrap;">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th>BOT quản lý</th>
                                            <th>Nhóm chat</th>
                                            <th>Người mời</th>
                                            <th>Người được mời</th>
                                            <th>Lúc</th>
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
                                         $url2='http://localhost:2020/telbot/log_inviter?id='.$id;
                                         $curl2=curl_init($url2);
                                         curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
                                         curl_setopt($curl2, CURLOPT_HTTPHEADER, [
                                             'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                             'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                                             'Authorization: '.$_SESSION['user_token']
                                         ]);
                                         $list_log_inviter=json_decode(curl_exec($curl2), true);
                                         curl_close($curl2);
                                        if (!empty($list_log_inviter))
                                        foreach($list_log_inviter as $index => $log_inviter)
                                        {
                                        echo ' <tr>
                                            <th scope="row">'.( $index + 1 ).'</th>
                                            <td>
                                                <label>
                                                    '.(isset($log_inviter['first_name'])?$log_inviter['first_name']:'').'
                                                </label>
                                                <div class="d-none">' . (isset($log_inviter['first_name']) ? khong_dau($log_inviter['first_name']) : '') . '</div>
                                            </td>';
                                            echo '<td>
                                                <label>'.(isset($log_inviter['group_name'])?$log_inviter['group_name']:"").'
                                                </label>
                                                <div class="d-none">' . (isset($log_inviter['group_name']) ? khong_dau($log_inviter['group_name']) : '') . '</div>
                                            </td>';
                                            echo '<td>
                                                <label>'.(isset($log_inviter['user_inviter_name'])?$log_inviter['user_inviter_name']:"").'
                                                </label>
                                                <div class="d-none">' . (isset($log_inviter['user_inviter_name']) ? khong_dau($log_inviter['user_inviter_name']) : '') . '</div>
                                            </td>';
                                            echo '<td>
                                                <label>'.(isset($log_inviter['guest_name'])?$log_inviter['guest_name']:"").'
                                                </label>
                                                <div class="d-none">' . (isset($log_inviter['guest_name']) ? khong_dau($log_inviter['guest_name']) : '') . '</div>
                                            </td>';
                                            echo '<td>
                                                <label>'.date("Y-m-d h:i:sa", strtotime($log_inviter['at'])).'
                                                </label>
                                            </td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- start block 3 -->
                        <div class="tab-pane" id="kt_portlet_base_demo_1_3_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="card-toolbar d-flex flex-row-reverse bd-highlight">
                                    <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                                        <li class="nav-item">
                                            <a class="nav-link py-2 px-4 month" data-type="month">Month</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link py-2 px-4 week" data-type="week">Week</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link py-2 px-4 day" data-type="day">Day</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link py-2 px-4 active all" data-type="all">All</a>
                                        </li>
                                    </ul>
                                </div>
                                <table class="table table-striped- table-bordered table-checkable" id="kt_table_4" style="white-space: nowrap;">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th>Người dùng</th>
                                            <th>Tổng lượt mời</th>
                                            <th>Mời người dùng vào group</th>
                                            <th>Chi tiết</th>
                                        </tr>
                                        <tr id="row-search">
                                            <th data-is-search="false"></th>
                                            <th data-is-search="true"></th>
                                            <th data-is-search="true"></th>
                                            <th data-is-search="true"></th>
                                            <th data-is-search="false"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="statistical_body">
                                        <?php
                                            $url3='http://localhost:2020/telbot/statistical?id='.$id;
                                            $curl3=curl_init($url3);
                                            curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true);
                                            curl_setopt($curl3, CURLOPT_HTTPHEADER, [
                                                'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                                                'Authorization: '.$_SESSION['user_token']
                                            ]);
                                            $statistical_inviter=json_decode(curl_exec($curl3), true);
                                            curl_close($curl3);
                                            if (!empty($statistical_inviter))
                                            foreach($statistical_inviter as $index => $statistical)
                                            { 
                                                echo '<tr>
                                                <th scope="row">'.($index + 1).'</th>
                                                <td>
                                                    <label>'.(isset($statistical['user_inviter_name'])?$statistical['user_inviter_name']:"").'
                                                    </label>
                                                    <div class="d-none">' . (isset($statistical['user_inviter_name']) ? khong_dau($statistical['user_inviter_name']) : '') . '</div>
                                                </td>
                                                <td>
                                                   '.(isset($statistical['count_invite_user'])?$statistical['count_invite_user']:"").'
                                                </td>
                                                <td>';
                                                foreach($statistical['list_group_name'] as $group) {
                                                    echo '<span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill m-1 load_more_info_inviter" data-id_group="'.$group.'" data-user_id="'.$statistical['user_inviter_id'].'" data-toggle="modal" data-target="#exampleModalCenter_4">'.$group.'</span>
                                                    <div class="d-none">' . (isset($group) ? khong_dau($group) : '') . '</div>';
                                                }
                                                echo '
                                                </td>
                                                <td>
                                                    <button type="button" data-type="all" data-user_id="'.$statistical['user_inviter_id'].'" data-toggle="modal" data-target="#exampleModalCenter_4" class="btn btn-info btn-more-info load_more_info_inviter">Xem thêm</button>
                                                </td>
                                                </tr>';
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end block 3 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter_4" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <input type="hidden" name="user_id_inviter">
                <input type="hidden" name="input_group">
            </div>
            <div class="modal-body">
               <table class="table table-striped- table-bordered table-checkable ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>Người mời</th>
                            <th>Người được mời</th>
                            <th>Vào group</th>
                            <th>Lúc</th>
                        </tr>
                    </thead>
                    <tbody id="statistical_inviter">
                        
                    </tbody>
               </table>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<script> 
$(document).ready(function() {
    $('#kt_table_4').on("click",".load_more_info_inviter", function(e) {
        let user_id = $(this).data('user_id');
        let input_group = $(this).data('id_group');
        let type= $(this).data('type');
        if (!type) type="";
        if (!input_group) input_group = "";
        $.ajax({
            url: "./createapp.php",
            type: "POST",
            data:  
            {
                "function": "get_user_inviter",
                "id": <?php echo $id; ?>,
                "user_inviter": user_id,
                "input_group": input_group,
                "type": type
            },
            success: function (data) {
                if (data && data.length!=0 ) {
                    data = JSON.parse( data);
                    let html="";
                    let row =0;
                    if (data) 
                        for (let index of data) {
                            row++;
                            html = html + `
                            <tr>
                                <th scope="row">${row}</th>
                                <td>
                                    ${(index.user_inviter_name)}
                                </td>
                                <td>
                                    ${(index.guest_name)}
                                </td>
                                <td>
                                    ${index.group_name}
                                </td>
                                <td>
                                    <label>${new Date(index.at).toLocaleString()}
                                    </label>
                                </td>';
                            `;
                        }
                    $('#statistical_inviter').html(html);
                } 
            }
        })
    })
    // hien thi dau xanh khi click vao
    $('.day').click(function() {
        $('.week').removeClass('active');
        $('.all').removeClass('active');
        $('.month').removeClass('active');
        $('.day').addClass('active');
    })
    $('.week').click(function() {
        $('.day').removeClass('active');
        $('.all').removeClass('active');
        $('.month').removeClass('active');
        $('.week').addClass('active');
    })
    $('.month').click(function() {
        $('.week').removeClass('active');
        $('.all').removeClass('active');
        $('.day').removeClass('active');
        $('.month').addClass('active');
    })
    $('.all').click(function() {
        $('.week').removeClass('active');
        $('.day').removeClass('active');
        $('.month').removeClass('active');
        $('.all').addClass('active');
    })
    $('.py-2').click(function() {
        $.ajax({
            type: "POST",
            url: "./createapp.php",
            data: {
                "function": "statistical",
                "id": <?php echo $id; ?> ,
                "type" : $(this).data("type"),
            },
            success: function(data) {
                if (data ) {
                    data = JSON.parse(data);
                    let html = "";
                    let count=0;
                    if (data )
                        for(let index of data) {
                            count ++;
                            html = html + `
                            <tr>
                                <th scope="row">${count}</th>
                                <td>${index.user_inviter_name}
                                    <div class="d-none">${index.user_inviter_name}</div>
                                </td>
                                <td>
                                ${index.count_invite_user}
                                    <div class="d-none">${index.count_invite_user}</div>
                                </td>
                                <td>`;
                                for(let group of index.list_group_name) {
                                html = html + `<span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill m-1 load_more_info_inviter" data-type="${index.type}" data-id_group="${group}" data-user_id="${index.user_inviter_id}" data-toggle="modal" data-target="#exampleModalCenter_4">${group}</span>
                                    <div class="d-none">${group}</div>`;
                                }
                                html = html + `
                                </td>
                                <td>
                                    <button type="button" data-type="${index.type}" data-user_id="${index.user_inviter_id}" data-toggle="modal" data-target="#exampleModalCenter_4" class="btn btn-info btn-more-info load_more_info_inviter">Xem thêm</button>
                                </td>
                                </tr>
                            `;
                        }
                    $('#statistical_body').html(html);
                }
            }
        })
    })

$('#kt_table_2 thead #row-search th').each( function () {
    if($(this).data('is-search')) {
    var title = $(this).text();
            $(this).html('<input type="text" style="width:100%;" placeholder="" />' );
    }
} );

// DataTable
var table1 = $('#kt_table_2').DataTable({
    // "ordering": false,
    // searching:false
});
    
// Apply the search
table1.columns().every( function () {
    var that = this;
    $( 'input', this.header() ).on( 'keyup change clear', function () {
        if ( that.search() !== this.value ) {
            that
                .search( this.value)
                .draw();
        }
    } );
});
$('#kt_table_3 thead #row-search th').each( function () {
    if($(this).data('is-search')) {
    var title = $(this).text();
            $(this).html('<input type="text" style="width:100%;" placeholder="" />' );
    }
} );

// DataTable
var table2 = $('#kt_table_3').DataTable({
    // "ordering": false,
    // searching:false
});
    
// Apply the search
table2.columns().every( function () {
    var that = this;
    $( 'input', this.header() ).on( 'keyup change clear', function () {
        if ( that.search() !== this.value ) {
            that
                .search( this.value)
                .draw();
        }
    } );
});
$('#kt_table_4 thead #row-search th').each( function () {
    if($(this).data('is-search')) {
    var title = $(this).text();
            $(this).html('<input type="text" style="width:100%;" placeholder="" />' );
    }
} );
jQuery.extend( jQuery.fn.dataTableExt.oSort, {
    "formatted-num-pre": function ( a ) {
        a = (a === "-" || a === "") ? 0 : a.replace( /[^\d\-\.]/g, "" );
        return parseFloat( a );
    },
 
    "formatted-num-asc": function ( a, b ) {
        return a - b;
    },
 
    "formatted-num-desc": function ( a, b ) {
        return b - a;
    }
} );

// DataTable
var table3 = $('#kt_table_4').DataTable({
    // "ordering": false,
    // searching:false
});
    
// Apply the search
table3.columns().every( function () {
    var that = this;
    $( 'input', this.header() ).on( 'keyup change clear', function () {
        if ( that.search() !== this.value ) {
            that
                .search( this.value)
                .draw();
        }
    } );
});
})
</script>