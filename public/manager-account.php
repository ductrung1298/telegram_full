<?php
    include 'header.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $id=isset($_GET['id'])?intval($_GET['id']):0;
    if ($id != 0) {
        $url = 'http://localhost:2020/telegram/get_list_group_chat_telegram?id='.$id;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'Authorization: '.$_SESSION['user_token']
        ]);
        // response
        $list_group_chat = json_decode(curl_exec($curl), true);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpcode == 500) {
            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'loginerror.php';
            echo("<script>window.location.href='https://". $host.$uri.'/'.$extra."'</script>;");
            exit;
        }
        else if ($httpcode!=200) {
            // header('Location: badrequest.php');
            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'badrequest.php';
            echo("<script>window.location.href='https://". $host.$uri.'/'.$extra."'</script>;");
            exit;
        }
        else {
            $url2='http://localhost:2020/telegram/get_friend?id='.$id;
            $curl2=curl_init($url2);
            curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl2, CURLOPT_HTTPHEADER, [
                'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'Authorization: '.$_SESSION['user_token']
            ]);
            // response 2
            $list_friend =json_decode(curl_exec($curl2), true);
            curl_close($curl2);
            // get name account 
            $url3='http://localhost:2020/telegram/get_user_telegram?id='.$id;
            $curl3=curl_init($url3);
            curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl3, CURLOPT_HTTPHEADER, [
                'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'Authorization: '.$_SESSION['user_token']
            ]);
            // response 2
            $info_account =json_decode(curl_exec($curl3), true);
            curl_close($curl3);

            // get list contact
            $url4='http://localhost:2020/telegram/get_contact';
            $curl4=curl_init($url4);
            curl_setopt($curl4, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl4, CURLOPT_HTTPHEADER, [
                'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'Authorization: '.$_SESSION['user_token']
            ]);
            // list contact
            $list_contact =json_decode(curl_exec($curl4), true);
            curl_close($curl4);
        }
    }
    // } else {
    //     // header('Location: badrequest.php');
    //     $host  = $_SERVER['HTTP_HOST'];
    //     $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    //     $extra = 'badrequest.php';
    //     echo("<script>window.location.href='http://". $host.$uri.'/'.$extra."'</script>;");
    //     exit;
    // }
    
?>
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
    <div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
        id="kt_content">
        <!-- begin:: Subheader -->
        <div class="kt-subheader mb-5  kt-grid__item" id="kt_subheader">
            <div class="kt-container ">
                <div class="kt-subheader__main">
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="add-account-tool-telegram.php" class="kt-subheader__breadcrumbs-link">
                            Danh sách tài khoản </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            <?php echo $info_account['data']['first_name']." ". $info_account['data']['last_name']; ?></a>
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
                                    href="#kt_portlet_content_1_1_tab_content" role="tab" aria-selected="true">
                                    <i class="flaticon-profile-1"></i>Danh sách bạn bè
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_content_1_2_tab_content"
                                    role="tab" aria-selected="false">
                                    <i class="flaticon-earth-globe"></i>Danh sách group chat
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_content_1_3_tab_content"
                                    role="tab" aria-selected="false">
                                    <i class="flaticon2-group"></i>Gửi tin nhắn
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_content_1_4_tab_content"
                                    role="tab" aria-selected="false">
                                    <i class="flaticon2-group"></i>Join nhóm chat
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <!-- begin:: block 1 danh sách bạn bè-->
                        <div class="tab-pane active " id="kt_portlet_content_1_1_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">
                                        <div class="kt-section__info d-flex justify-content-end">
                                            <div class="mr-1">
                                                <button type="button" id="exportfile" class="btn btn-success exportfile"><i class="la la-download"></i> File CSV
                                                </button>
                                            </div>
                                        </div>
                                        <div class="tab-pane active" id="kt_widget4_top10_rating">
                                            <div class="kt-list-timeline">
                                                <div class="kt-section__content">
                                                    <table class="table" id="dttable_1">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>#</th>
                                                                <th width="25%" class="text-center">Name</th>
                                                                <th class="text-center">Số điện thoại</th>
                                                                <th class="text-center">Username</th>
                                                                <th width="15%">Thuộc tệp khách hàng</th>
                                                                <th width="20%">Bạn bè tài khoản khác</th>
                                                            </tr>
                                                            <tr class="row-search">
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
                                                            if (!empty($list_friend)) {
                                                            foreach($list_friend as $index => $contact)
                                                            {
                                                            echo ' <tr>
                                                                <th scope="row">'.((int)$index+1).'</th>
                                                                    <td class="text-center">'.(isset($contact['first_name'])?str_replace("<","&lt;",$contact['first_name']) . ' ' :'').(isset($contact['last_name'])?str_replace("<","&lt;",$contact['last_name']):'').'
                                                                        <div class="d-none">'.
                                                                        (isset($contact['first_name'])?str_replace("<","&lt;",khong_dau($contact['first_name'])) . ' ' :'').(isset($contact['last_name'])?str_replace("<","&lt;",khong_dau($contact['last_name'])):'') .'
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-center">'.(isset($contact['phone'])?$contact['phone']:'').'
                                                                    </td>
                                                                    <td class="text-center">'.(isset($contact['username'])?str_replace("<","&lt;",$contact['username']):'').'
                                                                    </td>';
                                                                    $data = isset($contact['othergroup']) ? $contact['othergroup'] : [];

                                                                    echo '<td>';
                                                                    foreach($data as $key => $item) {
                                                                        echo '<span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill m-1">'.$item.'</span>';
                                                                    }
                                                                    echo '</td>
                                                                    <td>';
                                                                    $data2 = isset($contact['otherfriend']) ? $contact['otherfriend'] : [];
                                                                    foreach($data2 as $item2) {
                                                                        echo '<span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill m-1">'.$item2.'</span>';
                                                                    }
                                                                    echo '
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
                        <!-- begin block 2: gửi tin nhắn -->
                        <div class="tab-pane " id="kt_portlet_content_1_3_tab_content" role="tabpanel">
                            <div class="form-group row form-group-marginless">
									<div class="kt-grid kt-wizard-v3 kt-wizard-v3--white" id="kt_wizard_v3" data-ktwizard-state="step-first" style="width: 100%">
										<div class="kt-grid__item">
											<!--begin: Form Wizard Nav -->
											<div class="kt-wizard-v3__nav">
												<div class="kt-wizard-v3__nav-items kt-wizard-v3__nav-items--clickable">
													<div class="kt-wizard-v3__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
														<div class="kt-wizard-v3__nav-body">
															<div class="kt-wizard-v3__nav-label">
																<span>1</span> Gửi tin nhắn đến bạn bè Telegram
															</div>
															<div class="kt-wizard-v3__nav-bar"></div>
														</div>
													</div>
													<div class="kt-wizard-v3__nav-item" data-ktwizard-type="step">
														<div class="kt-wizard-v3__nav-body">
															<div class="kt-wizard-v3__nav-label">
																<span>2</span> Gửi tin nhắn đến người dùng trong tệp khách hàng
															</div>
															<div class="kt-wizard-v3__nav-bar"></div>
														</div>
													</div>
													<div class="kt-wizard-v3__nav-item" data-ktwizard-type="step">
														<div class="kt-wizard-v3__nav-body">
															<div class="kt-wizard-v3__nav-label">
																<span>3</span> Gửi tin nhắn đến group chat
															</div>
															<div class="kt-wizard-v3__nav-bar"></div>
														</div>
													</div>
												</div>
											</div>

											<!--end: Form Wizard Nav -->
										</div>
										<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v3__wrapper">
											<!--begin: Form Wizard Form-->
											<form class="kt-form" id="kt_form">
                                                <div class="row container">
                                                    <div class="col-12 form-group">
                                                        <div class="form-row">
                                                            <div class="col-10">
                                                                <label for="">Nội dung tin nhắn</label>
                                                                <textarea class="form-control" name="message"></textarea>
                                                            </div>
                                                            <div class="col-2 d-flex align-items-end">
                                                                <button class="btn btn-outline-success btn-sendallmsg"><i class="fa fa-paper-plane"></i> Gửi</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <table class="table borderless">
                                                        <thead>
                                                            <tr>
                                                                <th width="20%"></th>
                                                                <th width="80%"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <lable>Hẹn giờ gửi tin:</lable>
                                                                        <select class="kt-input form-control col-lg-10 type-time">
                                                                            <option value="0">Gửi một lần</option>
                                                                            <option value="1">Gửi theo chu kì</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                <div class="row form-group">
                                                                    <div class="sendone col-lg-5 display-block" style="display:none;">
                                                                        <lable>Thời gian gửi tin: </lable>
                                                                        <input type="datetime-local"
                                                                            class="form-control time-send-msg" name="time-send-msg">
                                                                    </div>
                                                                    <div class="sendone col-lg-2 display-block" style="display:none;">
                                                                        <button type="button" class="btn btn-outline-success btn-date-now mt-4"><i class="far fa-clock"></i> Now</button>
                                                                    </div>
                                                                    <div class="sendauto col-lg-9" style="display:none;">
                                                                        <lable>Kiểu gửi tin: </lable>
                                                                        <select class="kt-input form-control type-autosend">
                                                                            <option value="0">Daily</option>
                                                                            <option value="1">Date to Date</option>
                                                                        </select>
                                                                        <div class="form-group date-to-date" style="display:none;">
                                                                            <label>Date to Date:</label>
                                                                            <div class="row">
                                                                                <div class="input-daterange input-group col-9"
                                                                                    id="kt_datepicker_5">
                                                                                    <input type="date" class="form-control col-lg-10" name="start"
                                                                                        placeholder="Từ ngày" autocomplete="off">
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text"><i
                                                                                                class="la la-ellipsis-h"></i></span>
                                                                                    </div>
                                                                                    <input type="date" class="form-control col-lg-10" name="end"
                                                                                        placeholder="Đến ngày" autocomplete="off">
                                                                                </div>
                                                                                <div class="input-group col-3">
                                                                                    <input class="form-control" type="time" name="at">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="daily form-group display-block"
                                                                            style="display:none;">
                                                                            <label>Tự động chạy sau (Giờ):</label>
                                                                            <input type="text" class="form-control" name="time"
                                                                                placeholder="Giờ">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
												<!--begin: Form Wizard Step 1 Gửi tin nhắn tới bạn bè telegram-->
												<div class="kt-wizard-v3__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                                    <div class="form-group col-lg-12 row mt-4 loichao">
                                                        <!-- begin:: Notification 1 -->
                                                        <div class="tab-pane active " id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel">
                                                            <div class="kt-portlet__body">
                                                                <div class="row ">
                                                                    <div class="kt-section col-12">
                                                                        <h2 class="text-center">Danh sách bạn bè</h2>
                                                                        <div class="kt-scroll">
                                                                            <div class="kt-list-timeline">
                                                                                <div class="kt-section__content">
                                                                                    <table class="table" id="dttable_3">
                                                                                    <thead class="thead-light">
                                                                                        <tr>
                                                                                            <th>
                                                                                                <label class="kt-checkbox align-top kt-checkbox--bold kt-checkbox--success">
                                                                                                    <input id="all-mess-friend" type="checkbox">
                                                                                                    <span></span>
                                                                                                </label>
                                                                                            </th>
                                                                                            <th>Tên</th>
                                                                                            <th>Số điện thoại</th>
                                                                                            <th>Username</th>
                                                                                            <th>Thuộc danh bạ</th>
                                                                                        </tr>
                                                                                        <tr class="row-search">
                                                                                            <th data-is-search="false"></th>
                                                                                            <th data-is-search="true"></th>
                                                                                            <th data-is-search="true"></th>
                                                                                            <th data-is-search="true"></th>
                                                                                            <th data-is-search="false"></th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <?php 
                                                                                        foreach ($list_friend as $index => $msg) {
                                                                                            {
                                                                                            echo '<tr>
                                                                                            <td> <label class="kt-checkbox align-top kt-checkbox--bold kt-checkbox--success"><input type="checkbox" class="form-control send-mess-friend" data-type=0 
                                                                                                data-user_id='.$msg['id'].' data-access_hash='.$msg['access_hash'].' data-phone='.(isset($msg['phone'])?$msg['phone']:(isset($msg['username'])?$msg['username']:'')).'>
                                                                                                <span></span>
                                                                                                </label>
                                                                                            </td>';
                                                                                            echo '<td>'.(isset($msg['first_name'])?$msg['first_name']:"").' '.(isset($msg['last_name'])?$msg['last_name']:'').'</td>
                                                                                            <td>'.(isset($msg['phone'])?$msg['phone']:'').'</td>
                                                                                            <td>'.(isset($msg['username']) ? $msg['username'] : '').'</td>
                                                                                            <td>';
                                                                                                $data = isset($msg['othergroup']) ? $msg['othergroup'] : [];
                                                                                                    foreach($data as $key => $item) {
                                                                                                        echo '<span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill m-1">'.$item.'</span>';
                                                                                                    }
                                                                                            echo '</td>
                                                                                            </tr>';
                                                                                            }
                                                                                        }?>
                                                                                    
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
												<!--end: Form Wizard Step 1-->

												<!--begin: Form Wizard Step 2 gửi tin nhắn đến người dùng trong tệp khách hàng-->
												<div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
                                                    <div class="form-group col-lg-12 row mt-4">
                                                        <!-- begin:: Notification 1 -->
                                                        <div class="col-lg-12">
                                                            <h2 class="text-center">Danh sách tệp khách hàng</h2>
                                                            <div class="kt-list-timeline">
                                                                <div class="kt-section__content">
                                                                    <table class="table" id="dttable_4">
                                                                    <thead class="thead-light">
                                                                        <tr>
                                                                            <th>
                                                                                <label class="kt-checkbox align-top kt-checkbox--bold kt-checkbox--success">
                                                                                    <input id="all-mess-contact" type="checkbox">
                                                                                    <span></span>
                                                                                </label>
                                                                            </th>
                                                                            <th scope="col">#</th>
                                                                            <th>Tên</th>
                                                                            <th class="text-center">Số lượng thành viên</th>
                                                                            <th class="text-center">Bạn bè Telegram</th>
                                                                        </tr>
                                                                        <tr class="row-search">
                                                                            <th data-is-search="false"></th>
                                                                            <th data-is-search="true"></th>
                                                                            <th data-is-search="true"></th>
                                                                            <th data-is-search="true"></th>
                                                                            <th data-is-search="false"></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php
                                                                        foreach($list_contact as $index => $list) {
                                                                            echo '<tr>
                                                                            <td> <label class="kt-checkbox align-top kt-checkbox--bold kt-checkbox--success"><input type="checkbox" class="form-control send-mess-contact" data-type=2
                                                                                data-idcontact="'.$list["Id"].'">
                                                                                <span></span>
                                                                                </label>
                                                                            </td>
                                                                            <td>'.intval($index+1).'</td>
                                                                            <td>'.$list["Name"].'</td>
                                                                            <td class="text-center">'.$list["length"].'</td>
                                                                            <td class="text-center">'.$list["lengthfriend"].'/'.$list["length"].'</td>
                                                                            </tr>';
                                                                        }
                                                                        ?>
                                                                    </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
												</div>

												<!--end: Form Wizard Step 2-->

												<!--begin: Form Wizard Step 3 gửi đến group chat-->
												<div class="kt-wizard-v3__content" data-ktwizard-type="step-content" style="width: 100%;">
                                                    <div class="kt-section col-12">
                                                        <div class="kt-section__content">
                                                            <h2 class="text-center">Danh sách group chat</h2>
                                                            <table class="table" id="dttable_5">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>
                                                                        <label class="kt-checkbox align-top kt-checkbox--bold kt-checkbox--success">
                                                                            <input id="all-mess-group" type="checkbox">
                                                                            <span></span>
                                                                        </label>
                                                                    </th>      
                                                                    <th>ID</th>
                                                                    <th>Tên nhóm</th>
                                                                    <th>Username nhóm</th>
                                                                    <th class="text-center">Số lượng</th>
                                                                    <th class="text-center">Kiểu</th>
                                                                </tr>
                                                                <tr class="row-search">
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
                                                            
                                                            foreach ($list_group_chat['chats'] as $index => $msg) {
                                                                // echo "<pre>";
                                                                // print_r($msg);
                                                                // echo "</pre>";
                                                                if ($msg['_']=="chat")
                                                                {
                                                                    echo '
                                                                <tr>
                                                                    <td> <label class="kt-checkbox align-top kt-checkbox--bold kt-checkbox--success"><input type="checkbox" class="form-control send-mess-group" data-type=1
                                                                        data-chat_id='.$msg['id'].'>
                                                                            <span></span>
                                                                            </label>
                                                                    </td>
                                                                    <td>'.$msg['id'].'</td>
                                                                    <td>'.$msg['title'].'</td>
                                                                    <td></td>
                                                                    <td class="text-center">'.$msg['count'].'</td>
                                                                    <td class="text-center"><span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill m-1">CHAT</span></td>
                                                                </tr>';
                                                                }
                                                                else if ($msg['_']=="channel") 
                                                                {
                                                                    echo '
                                                                <tr>
                                                                    <td> <label class="kt-checkbox align-top kt-checkbox--bold kt-checkbox--success"><input type="checkbox" class="form-control send-mess-group" data-type=3
                                                                        data-chat_id='.$msg['id'].' data-access_hash='.$msg['access_hash'].'">
                                                                            <span></span>
                                                                            </label>
                                                                    </td>
                                                                    <td>'.$msg['id'].'</td>
                                                                    <td>'.$msg['title'].'</td>
                                                                    <td>'.(isset($msg['username'])?$msg['username']:"").'</td>
                                                                    <td class="text-center">'.$msg['count'].'</td>
                                                                    <td class="text-center"><span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill m-1">'.(isset($msg['megagroup'])?"SUPERGROUP":"CHANNEL").'</span></td>
                                                                </tr>';
                                                                }
                                                            }
                                                            ?>
                                                            </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
												</div>

												<!--end: Form Wizard Step 3-->
											</form>

											<!--end: Form Wizard Form-->
										</div>
									</div>
                                </div>
                        </div>
                        <!-- begin:: block 3 Danh sach group chat  -->
                        <div class="tab-pane " id="kt_portlet_content_1_2_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">                                        
                                        <div class="kt-section__content">
                                            <table class="table" id="dttable_2">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th class="text-center">ID</th>
                                                        <th class="text-center">Tên nhóm chat</th>
                                                        <th class="text-center">Số lượng</th>
                                                        <th class="text-center">Kiểu</th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                    <tr class="row-search">
                                                        <th data-is-search="false"></th>
                                                        <th data-is-search="true"></th>
                                                        <th data-is-search="true"></th>
                                                        <th data-is-search="true"></th>
                                                        <th data-is-search="true"></th>
                                                        <th data-is-search="false"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (!empty($list_group_chat['chats']))
                                                    foreach($list_group_chat['chats'] as $index => $group)
                                                    {
                                                    echo ' <tr>
                                                        <th scope="row">'.((int)$index+1).'</th>
                                                        <td class="text-center">
                                                                '.(isset($group['id'])?$group['id']:'').'
                                                        </td>';
                                                        echo '<td>
                                                            <a href="list-user-in-group.php?id='.$id.(($group['_']=="chat")?("&chat_id=".$group['id']):("&channel_id=".$group['id']."&access_hash=".$group['access_hash'])).'" target="_blank">'.(isset($group['title'])?$group['title']:'').'</a>
                                                        </td>';
                                                        echo '<td class="text-center">
                                                            '.((isset($group['count']) && $group['count']!=0) ?$group['count']:('Chưa có dữ liệu <a href="list-user-in-group.php?id='.$id.(($group['_']=="chat")?("&chat_id=".$group['id']):("&channel_id=".$group['id']."&access_hash=".$group['access_hash'])).'" target="_blank"><span class="kt-badge kt-badge--brand kt-badge--xl"><i class="flaticon2-circular-arrow"></i></span></a>')).'
                                                        </td>';
                                                        echo '<td class="text-center"><span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill m-1">
                                                            '. (($group['_']=="chat") ? "GROUP" : (($group['_']=="channel" && isset($group['megagroup']))? "SUPER GROUP" : "CHANNEL")) .'</span>
                                                        </td>';
                                                        echo '<td class="d-flex justify-content-center" >
                                                        <div class="dropdown">
                                                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Chức năng
                                                            </button>
                                                            <div class="dropdown-menu add-group-chat" aria-labelledby="dropdownMenu2">
                                                                <a class="dropdown-item btn btn-label-linkedin move_user_to_group" data-toggle="modal" data-target="#exampleModalCenter" data-name="'.$group['title'].'" data-id="'.$group['id'].'"><i class="fas fa-address-book"></i>Mời người dùng vào group khác</a>                                                                
                                                                <a class="dropdown-item btn btn-label-linkedin send_msg_all_user_in_group" data-id="'.$group['id'].'" data-toggle="modal" data-target="#send_msg_view"><i class="fab fa-facebook-messenger"></i>Nhắn tin tới thành viên trong group</a>                                                                
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
                        <!-- begin block 4: tìm và thêm người dùng vào group chat -->
                        <div class="tab-pane active " id="kt_portlet_content_1_4_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">
                                        
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
<input type="hidden" name="from_id_group">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group form-group-marginless">
                    <!-- cho thành table  -->
                    <div class="kt-grid kt-wizard-v1 kt-wizard-v1--white" id="kt_wizard_v1" data-ktwizard-state="step-first">
                        <div class="kt-grid__item">

                            <!--begin: Form Wizard Nav -->
                            <div class="kt-wizard-v1__nav">

                                <!--doc: Remove "kt-wizard-v1__nav-items--clickable" class and also set 'clickableSteps: false' in the JS init to disable manually clicking step titles -->
                                <div class="kt-wizard-v1__nav-items kt-wizard-v1__nav-items--clickable">
                                    <div class="kt-wizard-v1__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
                                        <div class="kt-wizard-v1__nav-body">
                                            <div class="kt-wizard-v1__nav-icon">
                                                <i class="flaticon-profile-1"></i>
                                            </div>
                                            <div class="kt-wizard-v1__nav-label">
                                                1. Chọn tài khoản mời người dùng vào nhóm
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-wizard-v1__nav-item" data-ktwizard-type="step">
                                        <div class="kt-wizard-v1__nav-body">
                                            <div class="kt-wizard-v1__nav-icon">
                                                <i class="flaticon2-talk"></i>
                                            </div>
                                            <div class="kt-wizard-v1__nav-label">
                                                2. Chọn nhóm đích
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Nav -->
                        </div>
                        <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v1__wrapper">

                            <!--begin: Form Wizard Form-->
                            <form class="kt-form">
                                <!--begin: Form Wizard Step 1-->
                                <div class="kt-wizard-v1__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                    <div class="kt-heading kt-heading--md">Danh sách tài khoản sử dụng mời vào nhóm</div>
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="kt-wizard-v1__form">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="">#</th>
                                                        <th class="kt-font-bolder">Tài khoản sử dụng</th>
                                                        <th>Chọn</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td>Chọn tất cả</td>
                                                        <td>
                                                        <label class="p-2 flex-shrink-1 bd-highlight kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                                            <input value="" class="checkall_user" type="checkbox">
                                                            <span></span>
                                                        </label>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        $url='http://localhost:2020/telegram/get_list_user_telegram';
                                                        $curl=curl_init($url);
                                                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                                        curl_setopt($curl, CURLOPT_HTTPHEADER, [
                                                            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                                                            'Authorization: '.$_SESSION['user_token']
                                                        ]);
                                                        $response2 = json_decode(curl_exec($curl), true);
                                                        curl_close($curl);
                                                        if (!empty($response2)) {
                                                            foreach ($response2 as $index => $user) {  
                                                                echo '<tr>
                                                                    <td>'.((int)$index+1).'</td>
                                                                    <td>'.(isset($user['first_name'])?$user['first_name']:"").' '.(isset($user['last_name'])?$user['last_name']: "").'</td>
                                                                    <td>
                                                                        <label class="p-2 flex-shrink-1 bd-highlight kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                                                            <input data-user_id="'.$user['Id'].'" class="user" type="checkbox">
                                                                            <span></span>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                ';
                                                            }
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!--end: Form Wizard Step 1-->

                                <!--begin: Form Wizard Step 2-->
                                <div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
                                    <div class="kt-heading kt-heading--md">Danh sách group chat</div>
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="kt-wizard-v1__form">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th class="kt-font-bolder">Tên nhóm</th>
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
                                                foreach($list_group_chat['chats'] as $index => $group)
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
                                </div>

                                <!--end: Form Wizard Step 2-->

                                <!--begin: Form Actions -->
                                <div class="kt-form__actions">
                                    <button class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
                                        Previous
                                    </button>
                                    <button class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u btn_add_group_chat">
                                        Submit
                                    </button>
                                    <button class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
                                        Next Step
                                    </button>
                                </div>
                                <!--end: Form Actions -->
                            </form>
                            <!--end: Form Wizard Form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="send_msg_view" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Nhắn tin tới tất cả người dùng trong group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12 form-group">
                    <div class="form-row">
                        <div class="col-10">
                            <label for="">Nội dung tin nhắn</label>
                            <textarea class="form-control" name="message_all_user"></textarea>
                        </div>
                        <div class="col-2 d-flex align-items-end">
                            <button class="btn btn-outline-success btn-send_msg_broadcast"><i class="fa fa-paper-plane"></i> Gửi</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 form-group row">
                    <div class="text-center w-100 loading"  style="display:none;">
                        <button class="btn btn-outline-success kt-spinner kt-spinner--sm kt-spinner--danger ">Đang tải dữ liệu</button>
                    </div>
                    <table class="table list_user">
                    </table>
                    <div class="text-center w-100 loadmore" data-page="1" data-hash="0" data-count="0" style="display:none;">
                        <button class="btn btn-outline-success">Load More<i class="flaticon2-down"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include 'footer.php';
    ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js">
</script>

<script type="text/javascript">
jQuery(document).ready(function($) {
    $('.move_user_to_group').click(function() {
        $('#exampleModalLongTitle1').text("Thêm người dùng từ group " + $(this).data('name') + " sang group khác");
        $('input[name="from_id_group"]').val($(this).attr('data-id'));
    })
    function timeDifference(current, previous) {
        var msPerMinute = 60 * 1000;
        var msPerHour = msPerMinute * 60;
        var msPerDay = msPerHour * 24;
        var msPerMonth = msPerDay * 30;
        var msPerYear = msPerDay * 365;
        var elapsed = current - previous;
        
        if (elapsed < msPerMinute) {
            return Math.round(elapsed/1000) + ' giây trước';   
        }
        
        else if (elapsed < msPerHour) {
            return Math.round(elapsed/msPerMinute) + ' phút trước';   
        }
        
        else if (elapsed < msPerDay ) {
            return Math.round(elapsed/msPerHour ) + ' giờ trước';   
        }

        else if (elapsed < msPerMonth) {
            return 'khoảng ' + Math.round(elapsed/msPerDay) + ' ngày trước';   
        }
        
        else if (elapsed < msPerYear) {
            return 'khoảng ' + Math.round(elapsed/msPerMonth) + ' tháng trước';   
        }
        
        else {
            return 'khoảng ' + Math.round(elapsed/msPerYear ) + ' năm trước';   
        }
    }

    // get list user in group chat
    $('.send_msg_all_user_in_group').click(function() {
        $('.loading').attr('style', "display: block");
        $('.loadmore').attr('style', "display: none");
        $('.list_user').html("");
        var body_html = '';
        $.ajax({
            url: "./createapp.php",
            type: "POST",
            data: {
                "function": "get_user_in_group_realtime",
                "id": <?php echo $id; ?>,
                "group_chat": $(this).data('id'),
                "hash": 0,
                "page" : 1,
            },
            success: function (dt) {
                $('.loading').attr('style', "display: none");
                $('.loadmore').attr('style', "display: block");
                if (dt) dt= JSON.parse(dt);
                if (dt && dt.data.length!=0 ) {
                    var count =0;
                    for (let index of dt.data) {
                        count++;
                        body_html = body_html + `
                        <tr>
                            <td> <label class="kt-checkbox align-top kt-checkbox--bold kt-checkbox--success"><input type="checkbox" class="form-control user_in_group"
                                data-user_id=${index.id} data-access_hash=${index.access_hash}>
                                <span></span>
                                </label>
                            </td>
                            <td>${count}</td>
                            <td>${index.id}</td>
                            <td>${(index.first_name)?index.first_name:""} ${(index.last_name)?index.last_name:""}</td>
                            <td>${(index.username)?index.username:""}</td>
                            <td>${(index.status.was_online)?(timeDifference(new Date(), new Date(index.status.was_online*1000))):""}
                            </td>
                            <td id="${index.id}"></td>
                        </tr>
                        `;
                    }
                }
                let html = `
                    <thead class="thead-light">
                        <tr>
                            <th>
                                <label class="kt-checkbox align-top kt-checkbox--bold kt-checkbox--success">
                                    <input id="select_all_page" type="checkbox">
                                    <span></span>
                                </label>
                            </th>
                            <th width="10%">#</th>
                            <th width="10%">ID</th>
                            <th width="30%">Tên người dùng</th>
                            <th width="20%">Username</th>
                            <th width="20%">Online lần cuối</th>
                            <th width="10%">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody id="body_table">
                        ${body_html}
                    </tbody>
                `;
                $('.loadmore').attr('data-hash', dt.hash);
                $('.loadmore').attr('data-count', count);
                $('.list_user').html(html);
            }
        })
    })
    $('.loadmore').click(function() {
        $('.loadmore').attr('data-page', Number($('.loadmore').attr('data-page')) + 1);
        $.ajax({
            url: "./createapp.php",
            type: "POST",
            data: {
                "function": "get_user_in_group_realtime",
                "id": <?php echo $id; ?>,
                "group_chat": $('input[name="from_id_group"]').val(),
                "hash": $(this).attr('data-hash'),
                "page" : $(this).attr('data-page'),
            },
            success: function (dt) {
                if (dt) dt= JSON.parse(dt);
                var body_html = "";
                if (dt && dt.data.length!=0 ) {
                    var count = (Number($('.loadmore').attr('data-count')) ) ;
                    for (let index of dt.data) {
                        count++;
                        body_html = body_html + `
                        <tr>
                            <td> <label class="kt-checkbox align-top kt-checkbox--bold kt-checkbox--success"><input type="checkbox" class="form-control user_in_group"
                                data-user_id=${index.id} data-access_hash=${index.access_hash}>
                                <span></span>
                                </label>
                            </td>
                            <td>${count}</td>
                            <td>${index.id}</td>
                            <td>${(index.first_name)?index.first_name:""} ${(index.last_name)?index.last_name:""}</td>
                            <td>${(index.username)?index.username:""}</td>
                            <td>${(index.status.was_online)?(timeDifference(new Date(), new Date(index.status.was_online*1000))):""}
                            </td>
                            <td id="${index.id}"></td>
                        </tr>
                        `;
                    }
                }
                $('.loadmore').attr('data-hash', dt.hash);
                $('.loadmore').attr('data-count', count);
                $('.list_user').append(body_html);
            }
        })
    })
    // send msg toi nguoi dung trong nhom
    $('.btn-send_msg_broadcast').click(function() {
        if ($('textarea[name="message_all_user"]').val()!="") {
            var array_user = [];
            $('.user_in_group:checkbox').map(function(){
                if (this.checked && $(this).attr('data-user_id') != "")
                    array_user.push({
                        user_id: $(this).attr('data-user_id'),
                        access_hash: $(this).attr('data-access_hash'),
                    })
                });
            if (array_user.length==0) {
                Swal.fire(
                    'Lỗi...',
                    'Danh sách người dùng nhận tin nhắn rỗng',
                    'error',
                );
            }
            else {
                for (let user of array_user) {
                    $(`#${user.user_id}`).html('<div class="col-sm"><div class="kt-spinner kt-spinner--lg kt-spinner--warning"></div></div>');
                }
                for (let user of array_user) {
                    $.ajax({
                        url: "./createapp.php",
                        type: "POST",
                        data: {
                            "function": "sendMessage",
                            "id": <?php echo $id?>,
                            "type": 0,
                            "type_time": 0,
                            "user_id": user.user_id,
                            "access_hash": user.access_hash,
                            "message": ($('textarea[name="message_all_user"]').val()),
                        },
                        success: function (dt) {
                            if (dt) dt= JSON.parse(dt);
                            if (dt && dt.id) {
                                $(`#${user.user_id}`).html('<span class="btn btn-bold btn-sm btn-font-sm  btn-label-success">Success</span>')
                            }
                            else $(`#${user.user_id}`).html('<span class="btn btn-bold btn-sm btn-font-sm  btn-label-danger">Error</span>')
                        }
                    })
                }
            }
        }
        else  Swal.fire(
                'Lỗi...',
                'Nội dung tin nhắn rỗng',
                'error',
            );
    })
    // check all
    $("#all-mess-friend").click(function() {
        $(".send-mess-friend").prop("checked", $(this).prop("checked"));
    });
    $("#all-mess-group").click(function() {
        $(".send-mess-group").prop("checked", $(this).prop("checked"));
    })
    $("#all-mess-contact").click(function() {
        $(".send-mess-contact").prop("checked", $(this).prop("checked"));
    })
    $('.btn-date-now').click(function() {
        $('input[name="time-send-msg"]').val(moment(new Date()).format('YYYY-MM-DDTHH:mm'));
    })
    $('body').on('click','#select_all_page',function() {
        $('.user_in_group:checkbox').not(this).prop('checked', this.checked);
    })
    //send msg
    $(".btn-sendallmsg").click(function() {
        $(".wrapp-loading").css('display','block');
        var count = 0;
        var countmsg=0;
        $(this).hide()
        $("input[type=checkbox]").map(function() {
            if (this.checked && $(this).attr("data-type")) {
                countmsg++;
                $.ajax({
                    url: "./createapp.php",
                    type: "POST",
                    async: false,
                    data: {
                        "id": <?php echo $id; ?> ,
                        "type" : $(this).attr("data-type"),
                        "chat_id": $(this).attr("data-chat_id"),
                        "user_id": $(this).attr("data-user_id"),
                        "access_hash": $(this).attr("data-access_hash"),
                        "message": $('textarea[name="message"]').val(),
                        "type_time": (($(".type-time").val()==1)?1:0),
                        "time_send_one": $(".time-send-msg").val(),
                        "type_send_auto": (($(".type-autosend").val()==1)?1:0),
                        "time_start": $("input[name=start]").val(),
                        "time_stop": $("input[name=end]").val(),
                        "at": $("input[name=at]").val(),
                        "hours":Number($("input[name=time]").val()),
                        "function": "sendMessage",
                        "idcontact": ($(this).attr("data-idcontact")),
                    },
                    success: function(response) {
                        if (response) count++;
                    }
                });
                $(this).prop("checked", false);
            }
        })
        $(this).show();
        if ($(".type-time").val() ==1)
            Swal.fire({
                type: 'success',
                title: 'Thành công',
                text: 'Lên lịch gửi thành công tới '+count+'/'+countmsg+' người dùng!',
                })
        else
            Swal.fire({
            type: 'success',
            title: 'Thành công',
            text: 'Gửi thành công tới '+count+'/'+countmsg+' người dùng!',
            })
        $('textarea[name="message"]').val("");
        $('input[name="time"]').val("");
        $('input[name="at"]').val("");
        $('input[name="start"]').val("");
        $('input[name="end"]').val("");
        $('.time-send-msg').val("");
    });
    //group contact
    
    $(".type-time").change(function() {
        let selected=$(this).children("option:selected").val();
        if (selected==0) {
            $('.sendauto').removeClass('display-block');
            $('.sendone').addClass('display-block');
        }
        else if (selected==1) {
            $('.sendone').removeClass('display-block');
            $('.sendauto').addClass('display-block');
        }
    })
    $('.type-autosend').change(function() {
        let selected=$(this).children("option:selected").val();
        if (selected==0) {
            $('.date-to-date').removeClass('display-block');
            $('.daily').addClass('display-block');
        }
        else if (selected==1) {
            $('.daily').removeClass('display-block');
            $('.date-to-date').addClass('display-block');
        }
    })
    // phan trang block ban be
    $('#dttable_1 thead .row-search th').each( function () {
            if($(this).data('is-search')) {
            var title = $(this).text();
                    $(this).html('<input type="text" style="width:100%;" placeholder="" />' );
            }
        } );

        // DataTable
        var table = $('#dttable_1').DataTable({
            "ordering": true,
            "searching":true,
            
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
    // pha trang block group chat
    $('#dttable_2 thead .row-search th').each( function () {
            if($(this).data('is-search')) {
            var title = $(this).text();
                    $(this).html('<input type="text" style="width:100%;" placeholder="" />' );
            }
        } );

        // DataTable
        var table2 = $('#dttable_2').DataTable({
            "ordering": true,
            "searching":true
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
    $('#dttable_3 thead .row-search th').each( function () {
        if($(this).data('is-search')) {
        var title = $(this).text();
                $(this).html('<input type="text" style="width:100%;" placeholder="" />' );
        }
    } );

    // DataTable
    var table3 = $('#dttable_3').DataTable({
        "ordering": true,
        "searching":true,
        "paging": false,
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
    $('#dttable_4 thead .row-search th').each( function () {
        if($(this).data('is-search')) {
        var title = $(this).text();
                $(this).html('<input type="text" style="width:100%;" placeholder="" />' );
        }
    } );

    // DataTable
    var table4 = $('#dttable_4').DataTable({
        "ordering": true,
        "searching":true,
        "paging": false,

    });

    // Apply the search
    table4.columns().every( function () {
        var that = this;
        $( 'input', this.header() ).on( 'keyup change clear', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value)
                    .draw();
            }
        } );
    });
    $('#dttable_5 thead .row-search th').each( function () {
        if($(this).data('is-search')) {
        var title = $(this).text();
                $(this).html('<input type="text" style="width:100%;" placeholder="" />' );
        }
    } );

    // DataTable
    var table5 = $('#dttable_5').DataTable({
        "ordering": true,
        "searching":true,
        "paging": false,
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
                <?php
                    $filename="./export/contact_id_".$id."_".date("Y-m-d").".csv";
                    $output=fopen($filename, "w");
                    fputs($output, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
                    foreach($list_friend as $contact) {
                        fputcsv($output, array(isset($contact['phone'])?$contact['phone']:'', isset($contact['first_name'])?$contact['first_name']:'', isset($contact['last_name'])?$contact['last_name']:'', isset($contact['username'])?$contact['username']:'',
                    $contact['id']));
                    }
                    fclose($output);
                    echo 'window.location = "download.php?filename='.$filename.'";';
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
    // moi nguoi dùng vào nhóm
    $('.send_msg_all_user_in_group').click(function () {
        $('input[name="from_id_group"]').val($(this).attr('data-id'));
    })
   
    $('.all_account').click(function() {
        $('.account:checkbox').not(this).prop('checked', this.checked);
    })
    $('.checkall_user').click(function() {
        $('.user:checkbox').not(this).prop('checked', this.checked);
    })
    $('.checkall').click(function() {
        $('.cbx:checkbox').not(this).prop('checked', this.checked);
    })
    $('.btn_add_group_chat').click(function(){
        let from_id = $('input[name="from_id_group"]').val();
        let array_chat_id = [];
        $('.cbx:checkbox').map(function(){
            if (this.checked && $(this).attr('data-id') != "")
                array_chat_id.push({
                    id: $(this).attr('data-id'),
                    type: $(this).attr('data-type')
                })
        })
        let array_user = [];
        $('.user:checkbox').map(function() {
            if (this.checked && $(this).attr('data-user_id')!= "")
                array_user.push($(this).attr('data-user_id'))
        })
        if (array_chat_id.length == 0) {
            Swal.fire(
                'Lỗi...',
                'Danh sách group chat Telegram rỗng',
                'error',
            );
        }
        else if (array_user.length == 0 ) {
            Swal.fire(
                'Lỗi...',
                'Danh sách người dùng để thêm vào nhóm rỗng',
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
                    "from_id_group": from_id,
                    "id": <?php echo $id; ?>,
                    "list_user": JSON.stringify(array_user),
                },
                success: function (dt) {
                    if (dt) dt= JSON.parse(dt);
                    if (dt && dt.process_id) 
                    {
                        window.location.href="inviter-user-to-group.php?&process_id="+ dt.process_id;
                    }
                    else 
                    if (dt) {
                        Swal.fire(
                            'Thêm thành công',
                            'Thêm thành công ' + dt + ' người dùng vào ' + array_chat_id.length + ' nhóm chat',
                            'success',
                        );
                    } else Swal.fire(
                        'Lỗi...',
                        'Lỗi khi thêm người dùng vào nhóm chat',
                        'error',
                    );
                }
            })
        }
    })
})
</script>