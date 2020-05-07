<?php
    include 'header.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    if ($id != 0)
    {
    $url='http://localhost:2020/telegram/get_friend?id='.$id;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'Authorization: ' . $_SESSION['user_token']
        ]);
        $response = json_decode(curl_exec($curl), true);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);

        if ($response == null ) {
            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'loginerror.php';
            echo("<script>window.location.href='http://". $host.$uri.'/'.$extra."'</script>;");
            exit;
        }
        curl_close($curl);
        if ($httpcode==500) {
            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'loginerror.php';
            echo("<script>window.location.href='http://". $host.$uri.'/'.$extra."'</script>;");
            exit;
        }   
        else if ($httpcode!=200) {
            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'badrequest.php';
            echo("<script>window.location.href='http://". $host.$uri.'/'.$extra."'</script>;");
            exit;
        }
            
    }
    else {
        $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'badrequest.php';
            echo("<script>window.location.href='http://". $host.$uri.'/'.$extra."'</script>;");
            exit;
    }
?>
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
    <div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
        id="kt_content">
        <!-- begin:: Subheader -->
        <div class="kt-subheader  mb-5 kt-grid__item" id="kt_subheader">
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
                            Bạn bè Telegram </a>
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
                                    <i class="flaticon2-group"></i>Danh sách bạn bè
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
                                        <h3 class="text-center">Danh sách bạn bè</h3>
                                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit">
                                    </div>
                                        <div class="kt-section__info d-flex justify-content-end">
                                            <div class="mr-1">
                                                Export &nbsp;&nbsp;&nbsp;
                                                <button type="button" id="exportfile" class="btn btn-outline-brand btn-elevate btn-pill exportfile"><i class="la la-download"></i> File CSV
                                                </button>
                                            </div>
                                            <div class="mr-1">
                                                <button type="button" id="exportfile" class="btn btn-outline-brand btn-elevate btn-pill exportfile"><i class="la la-plus"></i> Thêm vào danh bạ
                                                </button>
                                            </div>
                                            <div>
                                                <button type="button" id="exportfile" class="btn btn-outline-brand btn-elevate btn-pill exportfile"><i class="la la-plus"></i> Thêm vào danh bạ
                                                </button>
                                            </div>
                                        </div>
                                        <div class="tab-pane active" id="kt_widget4_top10_rating">
                                            <div>
                                                <div class="kt-list-timeline">
                                                    <div class="table-responsive">
                                                        <div class="kt-section__content">
                                                            <table class="table" id="datatb">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Name</th>
                                                                        <th>Phone_Number</th>
                                                                        <th>User_Name</th>
                                                                        <th>Thuộc danh bạ</th>
                                                                        <!--  -->
                                                                    </tr>
                                                                    <tr id="row-search">
                                                                        <th data-is-search="false"></th>
                                                                        <th data-is-search="true"></th>
                                                                        <th data-is-search="false"></th>
                                                                        <th data-is-search="false"></th>
                                                                        <th data-is-search="false"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    if (!empty($response)) {
                                                                    foreach($response as $index => $contact)
                                                                    {
                                                                    echo ' <tr>
                                                                        <th scope="row">'.((int)$index+1).'</th>
                                                                            <td>'.(isset($contact['first_name'])?str_replace("<","&lt;",$contact['first_name']) . ' ' :'').(isset($contact['last_name'])?str_replace("<","&lt;",$contact['last_name']):'').'
                                                                                <div class="d-none">'.
                                                                                (isset($contact['first_name'])?str_replace("<","&lt;",khong_dau($contact['first_name'])) . ' ' :'').(isset($contact['last_name'])?str_replace("<","&lt;",khong_dau($contact['last_name'])):'') .'
                                                                                </div>
                                                                            </td>
                                                                            <td>'.(isset($contact['phone'])?$contact['phone']:'').'
                                                                            </td>
                                                                            <td>'.(isset($contact['username'])?str_replace("<","&lt;",$contact['username']):'').'
                                                                            </td>';
                                                                            $data = isset($contact['othergroup']) ? $contact['othergroup'] : [];

                                                                            echo '<td>';
                                                                            foreach($data as $key => $item) {
                                                                                echo '<span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill m-1">'.$item.'</span>';
                                                                            }
                                                                            echo '</td>
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
                        <!--  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<script type="text/javascript">
jQuery(document).ready(function($) {
    // $('#datatb').ready(function() {
        // DataTable
        $('#datatb thead #row-search th').each( function () {
            if($(this).data('is-search')) {
            var title = $(this).text();
                    $(this).html('<input type="text" style="width:100%;" placeholder="" />' );
            }
        } );

        // DataTable
        var table = $('#datatb').DataTable({
            "ordering": false,
            "searching":true
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

        // Apply the search

    // });
// <?php
//                         $filename="./export/contact_id=".$id."_".date("Y-m-d").".csv";
//                         $output=fopen($filename, "w");
//                         fputs($output, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
//                         foreach($response as $contact) {
//                             fputcsv($output, array(isset($contact['phone'])?$contact['phone']:'', isset($contact['first_name'])?$contact['first_name']:'', isset($contact['last_name'])?$contact['last_name']:'', isset($contact['username'])?$contact['username']:''));
//                         }
//                         fclose($output);
//                         echo 'window.location="'.$filename.'";';
//                     ?>

    $("#exportfile").on("click", function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "Tải xuống file danh sách bạn bè!",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Download now!'
            })
            .then((result) => {
                if (result.value) {
                    
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
})
</script>