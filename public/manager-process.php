<?php
include 'header.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
  // get list tiến trình đang có
  $url5='http://localhost:2020/telegram/get_process';
  $curl5=curl_init($url5);
  curl_setopt($curl5, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl5, CURLOPT_HTTPHEADER, [
      'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
      'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
      'Authorization: '.$_SESSION['user_token']
  ]);
  $list_process =json_decode(curl_exec($curl5), true);
  curl_close($curl5);
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
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            Danh sách tiến trình</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:: Subheader -->
        <!-- begin:: Content -->
        <div class="kt-container  kt-grid__item kt-grid__item--fluid">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__body">
                    <div class="row">
                        <?php
                            if ($list_process['status']==true) {
                                if (!empty($list_process['data'])) {
                                    foreach($list_process['data'] as $process) {
                                        $to_html = '';
                                        if (!empty($process['to'])) 
                                        foreach($process['to'] as $to ) {
                                            $to_html = $to_html.$to['name']." ";
                                        }
                                        echo '
                                        <div class="col-xl-6">
                                            <div class="kt-portlet kt-portlet--height-fluid">
                                                <div class="kt-portlet__body">
                                                    <div class="kt-widget kt-widget--user-profile-2">
                                                        <div class="kt-widget__head">
                                                            <div class="kt-widget__info">
                                                                <span class="kt-widget__titel kt-hidden-">
                                                                    '.(($process['action']=="invite")?"Chuyển user từ group này sang group khác": "Gửi tin nhắn đến các user trong group").'
                                                                </span>
                                                                <span class="kt-widget__username" style="display: block;">
                                                                    Nguồn: '.$process['from']['name'].'
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
                                                                    <span class="kt-widget__data btn btn-outline-brand">'.(($process['status']==1)?"Running":"Finish").'</span>
                                                                </div>
                                                                <div class="kt-widget__contact">
                                                                    <span class="kt-widget__label">Tổng số người dùng:</span>
                                                                    <span class="kt-widget__data">'.$process['from']['total_user'].'</span>
                                                                </div>
                                                                <div class="kt-widget__contact">
                                                                    <span class="kt-widget__label">Tổng số lượt mời thành công:</span>
                                                                    <span class="kt-widget__data">'.$process['success'].'</span>
                                                                </div>
                                                                <div class="kt-widget__contact">
                                                                    <span class="kt-widget__label">Tổng số lượt mời thất bại:</span>
                                                                    <span class="kt-widget__data">'.$process['error'].'</span>
                                                                </div>
                                                                <div class="kt-widget__contact">
                                                                    <span class="kt-widget__label">Thời gian bắt đầu:</span>
                                                                    <span class="kt-widget__data">'.date('d/m/y h:i:s', strtotime($process['create_at'])).'</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="kt-widget__footer">
                                                            <a class="btn btn-label-warning btn-lg btn-upper" target="_blank" href="inviter-user-to-group.php?process_id='.$process['id'].'">Xem tiến trình</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
