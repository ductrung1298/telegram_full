<?php 
    include 'header.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $id=isset($_GET['id'])?intval($_GET['id']):0;
    if ($id!=0)
        {
        $url='http://localhost:2020/telbot/getbot?id='.$id;
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'Authorization: '.$_SESSION['user_token']
        ]);
        $response = json_decode(curl_exec($curl), true);
        $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
        if ($httpcode!=200)
        {
            header('Location: badrequest.php');
        }
        curl_close($curl);
    }
    else header('Location: badrequest.php');
?>
<!-- end:: Header -->
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
    <div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
        id="kt_content">
        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container ">
                <div class="kt-subheader__main">
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="list-bot-telegram.php" class="kt-subheader__breadcrumbs-link">
                            Danh sách BOT </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            BOT <?php echo $response['username']; ?></a>
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
                                    <i class="flaticon2-bell-2"></i> BOT Welcome
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_2_tab_content"
                                    role="tab" aria-selected="true">
                                    <i class="flaticon-reply"></i> Forward Tin nhắn
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_3_tab_content"
                                    role="tab" aria-selected="true">
                                    <i class="flaticon2-gear"></i> Sổ lệnh
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_4_tab_content"
                                    role="tab" aria-selected="true">
                                    <i class="flaticon2-chat-1"></i> Gửi tin nhắn
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_7_tab_content"
                                    role="tab" aria-selected="true">
                                    <i class="flaticon-cogwheel-1"></i> Khảo sát
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_5_tab_content"
                                    role="tab" aria-selected="true">
                                    <i class="flaticon2-telegram-logo"></i> Thông báo nhóm
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_6_tab_content"
                                    role="tab" aria-selected="true">
                                    <i class="flaticon-cogwheel-1"></i> Quản lí nhóm
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <!-- begin:: block 1 -->
                        <div class="tab-pane active" id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="form-group row form-group-marginless">
									<div class="kt-grid kt-wizard-v3 kt-wizard-v3--white" id="kt_wizard_v3" data-ktwizard-state="step-first" style="width: 100%">
										<div class="kt-grid__item">
											<!--begin: Form Wizard Nav -->
											<div class="kt-wizard-v3__nav">
												<!--doc: Remove "kt-wizard-v3__nav-items--clickable" class and also set 'clickableSteps: false' in the JS init to disable manually clicking step titles -->
												<div class="kt-wizard-v3__nav-items kt-wizard-v3__nav-items--clickable">
													<div class="kt-wizard-v3__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
														<div class="kt-wizard-v3__nav-body">
															<div class="kt-wizard-v3__nav-label">
																<span>1</span> Lời chào khi subscribe kênh
															</div>
															<div class="kt-wizard-v3__nav-bar"></div>
														</div>
													</div>
													<div class="kt-wizard-v3__nav-item" data-ktwizard-type="step">
														<div class="kt-wizard-v3__nav-body">
															<div class="kt-wizard-v3__nav-label">
																<span>2</span> Tự động gửi tin nhắn
															</div>
															<div class="kt-wizard-v3__nav-bar"></div>
														</div>
													</div>
													<div class="kt-wizard-v3__nav-item" data-ktwizard-type="step">
														<div class="kt-wizard-v3__nav-body">
															<div class="kt-wizard-v3__nav-label">
																<span>3</span> Cấu hình Button Inline
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
												<!--begin: Form Wizard Step 1-->
												<div class="kt-wizard-v3__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                                    <div class="form-group col-lg-12 row mt-4 loichao">
                                                        <label class="col-12 text-left"><strong>Lời chào khi subscribe
                                                                kênh:</strong></label>
                                                        <?php 
                                                                $response['greeting']=json_decode($response['greeting'], true);
                                                                if (!empty($response['greeting']))
                                                                foreach($response['greeting'] as $loichao) {
                                                                        echo '
                                                                        <div class="col-lg-12 kt-margin-t-20 row">
                                                                        <div class="col-lg-11 col-md-7 kt-margin-b-5">
                                                                            <div class="input-group">
                                                                                <textarea rows="1" cols="10" class="form-control"
                                                                                    name="loichao">'.$loichao['text'].'</textarea>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-lg-1 col-md-1 add-loichao kt-margin-b-5" style="display:none;">
                                                                            <i class="far fa-plus-square"
                                                                                style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                                                        </div>
                                                                        <div class="col-lg-1 col-md-1 delete-loichao kt-margin-b-5"
                                                                            >
                                                                            <i class="far fa-minus-square"
                                                                                style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                                                        </div>
                                                                    </div>';
                                                                    }
                                                                    echo '
                                                                    <div class="col-lg-12 kt-margin-t-20 row">
                                                                        <div class="col-lg-11 col-md-7 kt-margin-b-5">
                                                                            <div class="input-group">
                                                                            <textarea rows="1" cols="10" class="form-control"
                                                                                    name="loichao" placeholder="Chào mừng bạn đã đến với ..."></textarea>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-lg-1 col-md-1 add-loichao kt-margin-b-5">
                                                                            <i class="far fa-plus-square"
                                                                                style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                                                        </div>
                                                                        <div class="col-lg-1 col-md-1 delete-loichao kt-margin-b-5"
                                                                            style="display:none;">
                                                                            <i class="far fa-minus-square"
                                                                                style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                                                        </div>
                                                                    </div>';
                                                                ?>
                                                    </div>
                                                    <div class="row col-lg-12 form-group">
                                                        <label class="text-left mb-3 col-lg-3"><strong>Tin nhắn danh sách kênh kết
                                                                nối:</strong></label>
                                                        <textarea rows="1" cols="10" class="form-control col-lg-6" name="textketnoi"
                                                            placeholder="Danh sách kết nối cộng đồng"><?php if (isset($response['textketnoi'])) echo $response['textketnoi'];?></textarea>
                                                    </div>
                                                    <div class= "row">
                                                        <div class="col-lg-3">
                                                            <label>Đính kèm kênh kết nối: </label>
                                                            <input type="checkbox" class="col-lg-3 form-control invitation"
                                                                <?php if ($response['invitation']==1) echo "checked"?>>
                                                        </div>
                                                        <div class="form-group col-lg-9 row ketnoi">
                                                            <div class="kt-margin-t-5 col-lg-12 row">
                                                                <div class="col-lg-6 col-md-6">
                                                                    <label>Text hiển thị:</label>
                                                                </div>
                                                                <div class="col-lg-3 col-md-3">
                                                                    <label>Đường dẫn:</label>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        $response['listconnect']=json_decode($response['listconnect'], true); 
                                                        if (!empty($response['listconnect']))
                                                        foreach($response['listconnect'] as $connect)
                                                        {
                                                        echo '
                                                        <div class="col-lg-12 kt-margin-t-20 row">
                                                            <div class="col-lg-6 col-md-7 kt-margin-b-5">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                        name="text" value="'.$connect['text'].'">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-5 col-md-2 kt-margin-b-5">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                        name="url" value="'.$connect['url'].'">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 add-url kt-margin-b-5" style="display:none;">
                                                                <i class="far fa-plus-square"
                                                                    style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 delete-url kt-margin-b-5"
                                                                >
                                                                <i class="far fa-minus-square"
                                                                    style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                                            </div>
                                                        </div>';
                                                        };
                                                        echo '
                                                        <div class="col-lg-12 kt-margin-t-20 row">
                                                            <div class="col-lg-6 col-md-7 kt-margin-b-5">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                        name="text" placeholder="Tên website">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-5 col-md-2 kt-margin-b-5">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                        name="url" placeholder="https://eplus.vn/">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 add-url kt-margin-b-5">
                                                                <i class="far fa-plus-square"
                                                                    style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 delete-url kt-margin-b-5"
                                                                style="display:none;">
                                                                <i class="far fa-minus-square"
                                                                    style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                                            </div>
                                                        </div>';
                                                        ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-12 row mt-4 loichao2">
                                                        <?php
                                                            $response['greeting2']=json_decode($response['greeting2'], true); 
                                                            if (!empty($response['greeting2']))
                                                            foreach($response['greeting2'] as $loichao)
                                                            {
                                                            echo '
                                                            <div class="col-lg-12 kt-margin-t-20 row">
                                                                <div class="col-lg-9 col-md-7 kt-margin-b-5">
                                                                    <div class="input-group">
                                                                        <textarea rows="1" cols="10" class="form-control"
                                                                            name="loichao2">'.$loichao['text'].'</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-md-1">
                                                                    <div class="input-group">
                                                                        <label for="checkid2" class="form-control"><input type="checkbox" id="checkid2" name="checkid2" '.(($loichao['userid']==1)?"checked":"").'> Đính kèm mã ID</label> 
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-1 col-md-1 add-loichao2 kt-margin-b-5" style="display:none;">
                                                                    <i class="far fa-plus-square"
                                                                        style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                                                </div>
                                                                <div class="col-lg-1 col-md-1 delete-loichao2 kt-margin-b-5">
                                                                    <i class="far fa-minus-square"
                                                                        style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                                                </div>
                                                            </div>';
                                                            };
                                                            ?>
                                                        <div class="col-lg-12 kt-margin-t-20 row">
                                                            <div class="col-lg-11 col-md-7 kt-margin-b-5">
                                                                <div class="input-group">
                                                                    <textarea rows="1" cols="10" class="form-control" name="loichao2"
                                                                        placeholder="Chào mừng bạn đã đến với ..."></textarea>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-lg-2 col-md-1">
                                                                <div class="input-group">
                                                                    <label for="checkid2" class="form-control"><input type="checkbox"
                                                                            id="checkid2" name="checkid2"> Đính kèm mã ID</label>
                                                                </div>
                                                            </div> -->
                                                            <div class="col-lg-1 col-md-1 add-loichao2 kt-margin-b-5">
                                                                <i class="far fa-plus-square"
                                                                    style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 delete-loichao2 kt-margin-b-5"
                                                                style="display:none;">
                                                                <i class="far fa-minus-square"
                                                                    style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

												<!--end: Form Wizard Step 1-->

												<!--begin: Form Wizard Step 2-->
												<div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
                                                    <div class="form-group col-lg-12 row mt-4 autosendmes">
                                                        <label class="col-10 text-left"><strong>Hẹn giờ tự động gửi tin
                                                                nhắn</strong></label>
                                                        <div class=" kt-margin-t-5 col-lg-12 row">
                                                            <div class="col-lg-5 col-md-5">
                                                                <label> <strong>Nội dung tin nhắn:</strong></label>
                                                            </div>
                                                            <div class="col-lg-1 col-md-5">
                                                                <label> <strong>Đính kèm liên kết:</strong></label>
                                                            </div>
                                                            <div class="col-lg-4 col-md-5">
                                                                <label><strong>Thời gian gửi tin:</strong></label>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        $response['autosendmsg']=json_decode($response['autosendmsg'], true); 
                                                        if (!empty($response['autosendmsg']))
                                                        foreach($response['autosendmsg'] as $mes)
                                                        {
                                                        echo '
                                                        <div class="col-lg-12 kt-margin-t-20 row">
                                                            <div class="col-lg-5 col-md-7 kt-margin-b-5">
                                                                <div class="input-group">
                                                                    <textarea rows="1" cols="10" class="form-control"
                                                                        name="message">'.$mes['msg'].'</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <input type="checkbox" name= "attach" class="form-control" '.(($mes['attach']==1)?"checked":"").'>
                                                            </div>
                                                            <div class="col-lg-5 col-md-1">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Sau</span>
                                                                    </div>
                                                                    <input type="number" name="day" class="form-control col-lg-2" value="'.$mes["day"].'">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">ngày đăng kí. Lúc</span>
                                                                    </div>
                                                                    <input type="time" name="hours" class="form-control col-lg-4" value="'.$mes["hours"].':'.$mes["mins"].'">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 add-automsg kt-margin-b-5" style="display:none;">
                                                                <i class="far fa-plus-square"
                                                                    style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 delete-automsg kt-margin-b-5">
                                                                <i class="far fa-minus-square"
                                                                    style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                                            </div>
                                                            <div class="col-lg-12 mt-2 row col-md-2 link_url '.(($mes['attach']==1)?"display-block":"").'" style="display:none;">';
                                                            if ($mes['attach']==1) {
                                                                foreach ($mes['linkattach'] as $attach) {
                                                                    echo '
                                                                    <div class="col-lg-12 kt-margin-t-20 row">    
                                                                        <div class="col-lg-5 col-md-2">
                                                                            <div class="input-group">
                                                                                <textarea rows="1" cols="10" name="link_text" class="form-control" placeholder="Đường dẫn hiển thị">'.$attach["link_text"].'</textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-2">
                                                                            <div class="input-group">
                                                                                <textarea rows="1" cols="10" name="link" class="form-control" placeholder="Liên kết">'.$attach["link"].'</textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-1 col-md-1 add-link_url kt-margin-b-5" style="display:none;">
                                                                        <i class="far fa-plus-square"
                                                                            style=" font-size: 2rem; color: #1dc9b7; cursor: pointer;"></i>
                                                                        </div>
                                                                        <div class="col-lg-1 col-md-1 delete-link_url kt-margin-b-5">
                                                                            <i class="far fa-minus-square"
                                                                                style=" font-size: 2rem; color: #fd1361; cursor: pointer;"></i>
                                                                        </div>
                                                                    </div>';
                                                                }
                                                            }
                                                                echo '
                                                                <div class="col-lg-12 kt-margin-t-20 row">    
                                                                        <div class="col-lg-5 col-md-2">
                                                                            <div class="input-group">
                                                                                <textarea rows="1" cols="10" name="link_text" class="form-control" placeholder="Đường dẫn hiển thị"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-2">
                                                                            <div class="input-group">
                                                                                <textarea rows="1" cols="10" name="link" class="form-control" placeholder="Liên kết"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-1 col-md-1 add-link_url kt-margin-b-5" >
                                                                        <i class="far fa-plus-square"
                                                                            style=" font-size: 2rem; color: #1dc9b7; cursor: pointer;"></i>
                                                                        </div>
                                                                        <div class="col-lg-1 col-md-1 delete-link_url kt-margin-b-5" style="display:none;">
                                                                            <i class="far fa-minus-square"
                                                                                style=" font-size: 2rem; color: #fd1361; cursor: pointer;"></i>
                                                                        </div>
                                                                    </div>';
                                                            echo '
                                                            </div>
                                                        </div>';
                                                        };
                                                        ?>
                                                        <div class="col-lg-12 kt-margin-t-20 row">
                                                            <div class="col-lg-5 col-md-7 kt-margin-b-5">
                                                                <div class="input-group">
                                                                    <textarea rows="1" cols="10" class="form-control" name="message"
                                                                        placeholder="Tin nhắn"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <input type="checkbox" class="form-control" name="attach">
                                                            </div>
                                                            <div class="col-lg-5 col-md-1">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Sau</span>
                                                                    </div>
                                                                    <input type="number" name="day" class="form-control col-lg-2">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">ngày đăng kí. Lúc</span>
                                                                    </div>
                                                                    <input type="time" name="hours" class="form-control col-lg-4">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 add-automsg kt-margin-b-5">
                                                                <i class="far fa-plus-square"
                                                                    style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 delete-automsg kt-margin-b-5"
                                                                style="display:none;">
                                                                <i class="far fa-minus-square"
                                                                    style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                                            </div>
                                                            <div class="col-lg-12 mt-2 row col-md-2 link_url" style="display:none;">
                                                                <div class="col-lg-12 kt-margin-t-20 row">
                                                                    <div class="col-lg-5 col-md-2">
                                                                        <div class="input-group">
                                                                            <textarea rows="1" cols="10" name="link_text"
                                                                                class="form-control"
                                                                                placeholder="Đường dẫn hiển thị"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-2">
                                                                        <div class="input-group">
                                                                            <textarea rows="1" cols="10" name="link"
                                                                                class="form-control" placeholder="Liên kết"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-1 col-md-1 add-link_url kt-margin-b-5">
                                                                        <i class="far fa-plus-square"
                                                                            style=" font-size: 2rem; color: #1dc9b7; cursor: pointer;"></i>
                                                                    </div>
                                                                    <div class="col-lg-1 col-md-1 delete-link_url kt-margin-b-5"
                                                                        style="display:none;">
                                                                        <i class="far fa-minus-square"
                                                                            style=" font-size: 2rem; color: #fd1361; cursor: pointer;"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
												</div>

												<!--end: Form Wizard Step 2-->

												<!--begin: Form Wizard Step 3-->
												<div class="kt-wizard-v3__content" data-ktwizard-type="step-content" style="width: 100%;">
                                                    <div class="col-lg-12 list_btn_inline">
                                                        <strong>List Button Inline( Danh sách button hiển thị dưới bàn phím nhắn tin): </strong>
                                                        <div class="row mt-2">
                                                            <div class="col-lg-5">
                                                                <label>Text hiển thị Button</label>
                                                            </div>
                                                            <div class="col-lg-5">
                                                                <label>Danh sách ID người dùng hiển thị (Mặc định 0 sẽ hiển thị tất cả)</label>
                                                            </div>
                                                        </div>
                                                        <?php 
                                                            if (isset($response['btn_inline']))
                                                                $response['btn_inline']=json_decode($response['btn_inline'], true); 
                                                            if (!empty($response['btn_inline'])) 
                                                            foreach($response['btn_inline'] as $btn) {
                                                                if (isset($btn['btn_inline']))
                                                                echo '
                                                                <div class="row col-lg-12 inlines">
                                                                    <input type="text" class="form-control col-lg-5 mr-4 btn_inline mt-3"
                                                                        value="'.$btn['btn_inline'].'">
                                                                    <input type="text" class="form-control col-lg-5 id_used mt-3"
                                                                        value="'.$btn['id_used'].'">
                                                                    <div class="col-lg-1 col-md-1 add-btn-inline kt-margin-b-5 mt-3" style="display:none;">
                                                                        <i class="far fa-plus-square"
                                                                            style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                                                    </div>
                                                                    <div class="col-lg-1 col-md-1 delete-btn-inline kt-margin-b-5 mt-3">
                                                                        <i class="far fa-minus-square"
                                                                            style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                                                    </div>
                                                                </div>
                                                                ';
                                                            }
                                                        ?>
                                                        <div class="row col-lg-12 inlines">
                                                            <input type="text" class="form-control col-lg-5 mr-4  btn_inline mt-3"
                                                                placeholder="Text hiển thị">
                                                            <input type="text" class="form-control col-lg-5 id_used mt-3"
                                                                placeholder="Danh sách ID người dùng hiển thị" value="0">
                                                            <div class="col-lg-1 col-md-1 add-btn-inline kt-margin-b-5 mt-3">
                                                                <i class="far fa-plus-square"
                                                                    style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 delete-btn-inline kt-margin-b-5 mt-3"
                                                                style="display:none;">
                                                                <i class="far fa-minus-square"
                                                                    style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row col-lg-12">
                                                        <div class="col-lg-5 mt-3">
                                                            <strong>Text button báo cáo: </strong>
                                                            <input type="text" class="form-control textbaocao mt-3"
                                                                value="<?php echo $response['textbaocao'];?>">
                                                        </div>
                                                        <div class="col-lg-5 mt-3">
                                                            <strong>Chỉ định người dùng được nhấn báo cáo: </strong>
                                                            <input type="text" class="form-control idbaocao mt-3"
                                                                value="<?php echo $response['idbaocao'];?>">
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
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="button" class="btn btn-success updatebot">Cập
                                                nhật</button>
                                            <button type="reset" class="btn btn-secondary">Huỷ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- block 2 -->
                        <div class="tab-pane" id="kt_portlet_base_demo_1_2_tab_content" role="tabpanel">
                            <div class="form-group col-lg-12">
                                <div class="col-lg-12 row">
                                    <div class="col-lg-2">
                                        <strong>Kiểu</strong>
                                    </div>
                                    <div class="col-lg-3">
                                        <strong>From</strong>
                                    </div>
                                    <div class="col-lg-3">
                                        <strong>To</strong>
                                    </div>
                                    <div class="col-lg-1">
                                        <strong>Số kí tự xuống dòng:</strong>
                                    </div>
                                    <div class="col-lg-2">
                                        <strong>Type</strong>
                                    </div>
                                    <div class="col-lg-1">
                                    </div>
                                </div>
                                <?php
                    if (isset($response['forwardmsg'])) 
                        $forwards=json_decode($response['forwardmsg'], true);?>
                                <div class="list_forward">
                                    <?php 
                        if (!empty($forwards)) 
                            foreach($forwards as $forward) {
                                echo '
                                <div class="col-lg-12 kt-margin-t-20 row">
                                    <select class="col-lg-2 form-control typeto">
                                        <option value="1">Channel-Group</option>
                                        <option value="0"'.(($forward['typeto']==0)?"selected":"").'>Channel-Channel</option>
                                    </select>
                                    <div class="col-lg-3 from">';
                                        $froms= explode(",", $forward['from']);
                                        foreach($froms as $from)
                                        {
                                            echo '
                                        <div class="row col-lg-12">
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="from"
                                                placeholder="Username Channel" value="'.$from.'">
                                            </div>
                                            <div
                                                class="col-lg-1 col-md-1 add_from kt-margin-b-5"  style="display: none;">
                                                <i class="far fa-plus-square"
                                                    style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                            </div>
                                            <div class="col-lg-1 col-md-1 delete_from kt-margin-b-5">
                                                <i class="far fa-minus-square"
                                                    style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                            </div>
                                        </div>';
                                        }
                                    echo '
                                        <div class="row col-lg-12">
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="from"
                                                placeholder="Username Channel" value="">
                                            </div>
                                            <div
                                                class="col-lg-1 col-md-1 add_from kt-margin-b-5">
                                                <i class="far fa-plus-square"
                                                    style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                            </div>
                                            <div class="col-lg-1 col-md-1 delete_from kt-margin-b-5"  style="display: none;">
                                                <i class="far fa-minus-square"
                                                    style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 to">';
                                        $tos= explode(",", $forward['to']);
                                        foreach($tos as $to)
                                        {
                                            echo '
                                        <div class="row col-lg-12">
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="to"
                                                placeholder="ID hoặc Username" value="'.$to.'">
                                            </div>
                                            <div class="col-lg-1 col-md-1 add_to kt-margin-b-5" style="display: none;">
                                                <i class="far fa-plus-square"
                                                    style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                            </div>
                                            <div class="col-lg-1 col-md-1 delete_to kt-margin-b-5"
                                                >
                                                <i class="far fa-minus-square"
                                                    style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                            </div>
                                        </div>';
                                        }
                                        echo '
                                        <div class="row col-lg-12">
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="to"
                                                placeholder="ID hoặc Username">
                                            </div>
                                            <div class="col-lg-1 col-md-1 add_to kt-margin-b-5">
                                                <i class="far fa-plus-square"
                                                    style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                            </div>
                                            <div class="col-lg-1 col-md-1 delete_to kt-margin-b-5" style="display: none;"
                                                >
                                                <i class="far fa-minus-square"
                                                    style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 ">
                                        <input type="number" class="form-control countdown" value="'.(isset($forward)?$forward['countdown']:"").'">
                                    </div>
                                    <div class="col-lg-2">
                                        <select class="form-control typesend" name="typesend">
                                            <option value="1">Forward</option>
                                            <option value="0" '.(($forward['typesend']==0)?"selected":"").'>Gửi tin nhắn</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-1 col-md-1 add_forward kt-margin-b-5" style="display: none;">
                                        <i class="far fa-plus-square"
                                            style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                    </div>
                                    <div class="col-lg-1 col-md-1 delete_forward kt-margin-b-5">
                                        <i class="far fa-minus-square"
                                            style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                    </div>
                                </div> ';

                            }
                    ?>
                                    <div class="col-lg-12 kt-margin-t-20 row">
                                        <select class="col-lg-2 form-control typeto">
                                            <option value="1">Channel-Group</option>
                                            <option value="0">Channel-Channel</option>
                                        </select>
                                        <div class="col-lg-3 from">
                                            <div class="row col-lg-12">
                                                <div class="col-lg-10">
                                                    <input type="text" class="form-control" name="from"
                                                        placeholder="Username Channel">
                                                </div>
                                                <div class="col-lg-1 col-md-1 add_from kt-margin-b-5">
                                                    <i class="far fa-plus-square"
                                                        style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                                </div>
                                                <div class="col-lg-1 col-md-1 delete_from kt-margin-b-5"
                                                    style="display: none;">
                                                    <i class="far fa-minus-square"
                                                        style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-3 to">
                                            <div class="row col-lg-12">
                                                <div class="col-lg-10">
                                                    <input type="text" class="form-control" name="to"
                                                        placeholder="ID hoặc Username" value="">
                                                </div>
                                                <div class="col-lg-1 col-md-1 delete_to kt-margin-b-5"
                                                    style="display: none;">
                                                    <i class="far fa-minus-square"
                                                        style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                                </div>
                                                <div class="col-lg-1 col-md-1 add_to kt-margin-b-5">
                                                    <i class="far fa-plus-square"
                                                        style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 ">
                                            <input type="number" class="form-control countdown" value="">
                                        </div>
                                        <div class="col-lg-2">
                                            <select class="form-control typesend" name="typesend">
                                                <option value=1>Forward</option>
                                                <option value=0>Gửi tin nhắn</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-1 col-md-1 add_forward kt-margin-b-5">
                                            <i class="far fa-plus-square"
                                                style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                        </div>
                                        <div class="col-lg-1 col-md-1 delete_forward kt-margin-b-5"
                                            style="display: none;">
                                            <i class="far fa-minus-square"
                                                style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-portlet__foot">
                                    <div class="kt-form__actions">
                                        <div class="row">
                                            <div class="col-lg-12 text-center">
                                                <button type="button" class="btn btn-success forward">Forward</button>
                                                <button type="reset" class="btn btn-secondary">Huỷ</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <label>* : Để lấy ID Group chat ta thêm Bot Telegram vào group chat cần lấy sau đó nhắn
                                    vào group: "/idgroup", bot sẽ tự động trả về ID group </label>
                                <br>
                                <label>- Username Channel: Ví dụ link channel: Lấy tên sau dấu / của đường dẫn channel.
                                    Ví dụ Link channel là t.me/mydasgroup -> username là mydasgroup</label>
                                <label>- Để forward thành công ta cần thêm bot vào Channel và Group cần forward</label>
                            </div>
                        </div>
                        <!-- block 3 -->
                        <div class="tab-pane" id="kt_portlet_base_demo_1_3_tab_content" role="tabpanel">
                            <div class="row col-lg-12 list_command">
                                <div class="col-lg-12 kt-margin-t-20 row">
                                    <div class="col-lg-2">
                                        <strong>Câu lệnh</strong>
                                    </div>
                                    <div class="col-lg-5">
                                        <strong>Trả lời</strong>
                                    </div>
                                    <div class="col-lg-4">
                                        <strong>Button Link đính kèm</strong>
                                    </div>
                                </div>
                                <?php 
                    if (isset($response['command'])) 
                        $list_command=json_decode($response['command'], true);
                    if (!empty($list_command)) 
                    foreach($list_command as $command) {
                        if (isset($command['ontext']))
                            echo '
                            <div class="col-lg-12 command kt-margin-t-20 row">
                                <div class="col-lg-2">
                                    <input type="text" name="ontext" class="form-control" value="'.$command['ontext'].'">
                                </div>
                                <div class="col-lg-5">
                                    <textarea rows="2" cols="50" name="reply">'.$command['reply'].'</textarea>
                                </div>
                                <div class="col-lg-4 button_url">';
                                if (!empty($command['arraybtn']))    
                                foreach($command['arraybtn'] as $btn)
                                {
                                    echo '
                                    <div class="row">
                                        <div class="col-lg-5"> 
                                            <input type="text" name="text_link" class="form-control" value="'.$btn['text_link'].'">
                                        </div>
                                        <div class="col-lg-5"> 
                                            <input type="text" name="link" class="form-control" value="'.$btn['link'].'">
                                        </div>
                                        <div class="col-lg-1 col-md-1 add_button_url kt-margin-b-5" style="display: none;">
                                            <i class="far fa-plus-square"
                                                style=" font-size: 2rem; color: #1dc9b7; cursor: pointer;"></i>
                                        </div>
                                        <div class="col-lg-1 col-md-1 delete_button_url kt-margin-b-5">
                                            <i class="far fa-minus-square"
                                                style=" font-size: 2rem; color: #fd1361; cursor: pointer;"></i>
                                        </div>
                                    </div>';
                                }
                                echo '
                                    <div class="row mt-2">
                                        <div class="col-lg-5"> 
                                            <input type="text" name="text_link" class="form-control" placeholder="Text hiển thị">
                                        </div>
                                        <div class="col-lg-5"> 
                                            <input type="text" name="link" class="form-control" placeholder="Đường dẫn">
                                        </div>
                                        <div class="col-lg-1 col-md-1 add_button_url kt-margin-b-5" >
                                            <i class="far fa-plus-square"
                                                style=" font-size: 2rem; color: #1dc9b7; cursor: pointer;"></i>
                                        </div>
                                        <div class="col-lg-1 col-md-1 delete_button_url kt-margin-b-5" style="display: none;">
                                            <i class="far fa-minus-square"
                                                style=" font-size: 2rem; color: #fd1361; cursor: pointer;"></i>
                                        </div>
                                    </div>';
                                echo '
                                </div>
                                <div class="col-lg-1 col-md-1 add_command kt-margin-b-5" style="display: none;">
                                    <i class="far fa-plus-square"
                                        style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                </div>
                                <div class="col-lg-1 col-md-1 delete_command kt-margin-b-5">
                                        <i class="far fa-minus-square"
                                            style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                    </div>
                            </div>
                            ';
                    }   
                    echo '
                    <div class="col-lg-12 command kt-margin-t-20 row">
                        <div class="col-lg-2">
                            <input type="text" name="ontext" class="form-control" placeholder="Câu lệnh" >
                        </div>
                        <div class="col-lg-5">
                            <textarea rows="2" cols="50" name="reply"></textarea>
                        </div>
                        <div class="col-lg-4 button_url">
                            <div class="row">
                                <div class="col-lg-5"> 
                                    <input type="text" name="text_link" class="form-control" placeholder="Text hiển thị">
                                </div>
                                <div class="col-lg-5"> 
                                    <input type="text" name="link" class="form-control" placeholder="Đường dẫn">
                                </div>
                                <div class="col-lg-1 col-md-1 add_button_url kt-margin-b-5" >
                                    <i class="far fa-plus-square"
                                        style=" font-size: 2rem; color: #1dc9b7; cursor: pointer;"></i>
                                </div>
                                <div class="col-lg-1 col-md-1 delete_button_url kt-margin-b-5" style="display: none;">
                                    <i class="far fa-minus-square"
                                        style=" font-size: 2rem; color: #fd1361; cursor: pointer;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-1 add_command kt-margin-b-5" >
                            <i class="far fa-plus-square"
                                style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                        </div>
                        <div class="col-lg-1 col-md-1 delete_command kt-margin-b-5" style="display: none;">
                                <i class="far fa-minus-square"
                                    style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                            </div>
                    </div>
                    ';
                ?>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="button" class="btn btn-success config_command">Cấu
                                                hình</button>
                                            <button type="reset" class="btn btn-secondary">Huỷ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <strong>Lưu ý BOT chỉ có thể lắng nge các câu lệnh được gọi trong group chat với bắt đầu
                                lệnh bằng kí tự "/", các câu lệnh có phân biệt kí tự hoa thường. </strong>
                            <br>
                            <label>- Để lấy dữ liệu từ API sau đó trả về cho người dùng, ta sử dụng dấu nhắc {api:
                                "Đường dẫn API cần get dữ liệu">} </label>
                            <br>
                            <label>- Để trả về tên đầy đủ của người dùng, ta sử dụng dấu nhắc {displayname} </label>
                            <br>
                            <label>- Để trả về ID người dùng, ta sử dụng dấu nhắc {id} </label>
                            <br>
                            <label>- Để trả về first_name của người dùng, ta sử dụng dấu nhắc {firstname} </label>
                        </div>
                        <!-- end block 3 -->
                        <!-- block 4 -->
                        <div class="tab-pane" id="kt_portlet_base_demo_1_4_tab_content" role="tabpanel">
                            <div class="col-12 form-group">
                                <div class="form-row">
                                    <div class="col-10">
                                        <label for="">Nội dung tin nhắn</label>
                                        <textarea class="form-control" name="message_send_sub"></textarea>
                                    </div>
                                    <div class="col-2 d-flex align-items-end">
                                        <button class="btn btn-outline-success btn-send_msg_sub"><i class="fa fa-paper-plane"></i> Gửi</button>
                                    </div>
                                </div>
                                <label class="mt-3">Đính kèm button</label>
                                <div class="button_link">
                                    <div class="row mt-3">
                                        <div class="col-lg-4"> 
                                            <input type="text" name="text_send_sub" class="form-control text_send_sub" placeholder="Text hiển thị">
                                        </div>
                                        <div class="col-lg-4"> 
                                            <input type="text" name="link_send_sub" class="form-control link_send_sub" placeholder="Đường dẫn">
                                        </div>
                                        <div class="col-lg-1 col-md-1 add_button_url_send kt-margin-b-5" >
                                            <i class="far fa-plus-square"
                                                style=" font-size: 2rem; color: #1dc9b7; cursor: pointer;"></i>
                                        </div>
                                        <div class="col-lg-1 col-md-1 delete_button_url_send kt-margin-b-5" style="display: none;">
                                            <i class="far fa-minus-square"
                                                style=" font-size: 2rem; color: #fd1361; cursor: pointer;"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-section col-12 mt-5">
                                    <h5>Danh sách người dùng đăng kí bot</h5>
                                    <div>
                                        <div class="kt-list-timeline">
                                            <div class="kt-section__content">
                                                <table class="table table-striped- table-bordered table-checkable" id="table_get_user_sub">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <label class="align-top kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                                                    <input id="checkAll" type="checkbox">
                                                                    <span></span>
                                                                </label>
                                                            </th>
                                                            <th>User ID</th>
                                                            <th>Tên người dùng</th>
                                                            <th>Loại</th>
                                                            <th>Ngày đăng kí kênh</th>
                                                        </tr>
                                                        <tr id="row-search">
                                                            <th data-is-search="false"></th>
                                                            <th data-is-search="true"></th>
                                                            <th data-is-search="true"></th>
                                                            <th data-is-search="true"></th>
                                                            <th data-is-search="true"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $url='http://localhost:2020/telbot/get_sub?id='.$id;
                                                        $curl=curl_init($url);
                                                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                                        curl_setopt($curl, CURLOPT_HTTPHEADER, [
                                                            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                                                            'Authorization: '.$_SESSION['user_token']
                                                        ]);
                                                        $list_sub=json_decode(curl_exec($curl), true);
                                                        curl_close($curl);
                                                        if (!empty($list_sub)) {
                                                            foreach($list_sub as $index => $sub) {
                                                                echo '<tr>
                                                                <th><label class="align-top mt-0 kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                                                                <input value="'. $sub['user_id'].'" class="cbx" type="checkbox">
                                                                                <span></span>
                                                                            </label></th>
                                                                <td>
                                                                    <label>
                                                                        '.(isset($sub['user_id'])?$sub['user_id']:"").'
                                                                    </label>
                                                                    <div class="d-none">' . (isset($sub['user_id'])?$sub['user_id']:""). '</div>
                                                                </td>
                                                                <td>
                                                                    <label>
                                                                        '.(isset($sub['first_name'])?$sub['first_name']:"").' '.(isset($sub['last_name'])?$sub['last_name']:"").'
                                                                    </label>
                                                                    <div class="d-none">' . (isset($sub['first_name'])?(khong_dau($sub['first_name'])):"").' '.(isset($sub['last_name'])?khong_dau($sub['last_name']):""). '</div>
                                                                </td>';
                                                                if (isset($sub['type']) && $sub['type']=="user")
                                                                    echo '<td class="text-center">
                                                                    <span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill m-1">USER
                                                                        </span>
                                                                        <div class="d-none">user</div>
                                                                    </td>';
                                                                else
                                                                echo '<td class="text-center">
                                                                <span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill m-1">GROUP
                                                                    </span>
                                                                    <div class="d-none">group</div>
                                                                </td>';
                                                                echo '<td>
                                                                    <label>
                                                                        '.date("d/M/Y h:i:s", strtotime($sub["date"])).'
                                                                    </label>                                                                          
                                                                    <div class="d-none">'.date("d/M/Y h:i:s", strtotime($sub["date"])).'</div>
                                                                </td>
                                                                </tr>
                                                                ';
                                                            };
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
                        <!-- end block 4-->
                        <!-- block 5 -->
                        <div class="tab-pane" id="kt_portlet_base_demo_1_5_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="form-group row form-group-marginless kt-margin-t-20">
                                    <div class="col-12 form-group row">
                                        <div class="col-lg-6 mt-4">
                                            <label class="kt-checkbox align-top kt-checkbox--bold kt-checkbox--success">
                                                <input class="del_inviter" <?php if ($response['del_msg_inviter']==1) echo "checked";?> type="checkbox">
                                                <span></span>
                                            </label>
                                            <label>Xóa tin nhắn thông báo khi người dùng vào nhóm</label>
                                        </div>
                                        <div class="col-lg-6 mt-4">
                                            <label class="kt-checkbox align-top kt-checkbox--bold kt-checkbox--success">
                                                <input class="del_out" <?php if ($response['del_msg_out']==1) echo "checked";?> type="checkbox">
                                                <span></span>
                                            </label>
                                            <label>Xóa tin nhắn thông báo khi người dùng rời khỏi nhóm</label>
                                        </div>
                                        <div class="col-lg-8 mt-4">
                                            <label class="kt-checkbox align-top kt-checkbox--bold kt-checkbox--success">
                                                <input class="tb_inviter" <?php if ($response['send_msg_inviter']==1) echo "checked";?> type="checkbox">
                                                <span></span>
                                            </label>
                                            <label>Gửi lời chào khi người dùng vào nhóm</label>
                                        </div>
                                        <div class="col-lg-6 reply_inviter_group mt-4  <?php if ($response['send_msg_inviter']==1) echo "display-block";?>" style="display:none;">
                                                <textarea rows="4" cols="50" name="reply_inviter"><?php echo $response['msg_inviter']; ?></textarea>
                                        </div>
                                        <div class="col-lg-6 reply_inviter_group mt-4  <?php if ($response['send_msg_inviter']==1) echo "display-block";?>" style="display:none;">
                                            <label class="kt-checkbox align-top kt-checkbox--bold kt-checkbox--success">
                                                <input class="disable_notification" <?php if ($response['dis_notify_msg']==1) echo "checked";?> type="checkbox">
                                                <span></span>
                                            </label>
                                            <label>Gửi tin nhắn không có âm thanh</label>
                                        </div>
                                        <div class="col-lg-6 mt-4">
                                            <label class="kt-checkbox align-top kt-checkbox--bold kt-checkbox--success">
                                                <input class="invite_bot" <?php if ($response['invite_bot']==1) echo "checked";?> type="checkbox">
                                                <span></span>
                                            </label>
                                            <label>Cho phép mời BOT vào nhóm</label>
                                        </div>
                                        <?php $response['allow_forward'] = json_decode($response['allow_forward'], true); 
                                         $response['limit_mes'] = json_decode($response['limit_mes'], true); 
                                        ?>
                                        <div class="col-lg-6 mt-4">
                                            <label class="kt-checkbox align-top kt-checkbox--bold kt-checkbox--success">
                                                <input class="allow_forward" name="allow_forward" <?php if (isset($response['allow_forward']['allow']) && $response['allow_forward']['allow']==0) echo "checked";?> type="checkbox">
                                                <span></span>
                                            </label>
                                            <label>Xoá tin nhắn forward trong group</label>
                                        </div>
                                        <div class="col-lg-6">
                                        </div>
                                        <div class="col-lg-6 list_id_allow mt-2  <?php if (isset($response['allow_forward']['allow']) && $response['allow_forward']['allow']==0) echo "display-block";?>" style="display:none;">
                                            <label>Chỉ chấp nhận tin nhắn forward từ người dùng có ID:  </label>
                                            <input name="list_id_allow" type="text" value="<?php if (isset($response['allow_forward']['list_id_allow'])) echo implode(",",$response['allow_forward']['list_id_allow']); ?>">
                                        </div>
                                    
                                        <div class="col-lg-6 mt-4">
                                            <label class="kt-checkbox align-top kt-checkbox--bold kt-checkbox--success">
                                                <input class="limit_mes" name="limit_mes" <?php if (isset($response['limit_mes']['status']) && $response['limit_mes']['status']==1) echo "checked";?> type="checkbox">
                                                <span></span>
                                            </label>
                                            <label>Xoá tin nhắn trong group với điều kiện</label>
                                        </div>
                                        <div class="col-lg-6"></div>
                                        <div class="col-lg-6 count_line mt-2  <?php if (isset($response['limit_mes']['status']) && $response['limit_mes']['status']==1) echo "display-block";?>" style="display:none;">
                                            <label>Số kí tự xuống dòng trong tin nhắn lớn hơn :</label>
                                            <input name="count_line" type="number" value="<?php if (isset($response['limit_mes']['count_line'])) echo $response['limit_mes']['count_line']; ?>">
                                        </div>
                                        <div class="col-lg-6 exception mt-2  <?php if (isset($response['limit_mes']['status']) && $response['limit_mes']['status']==1) echo "display-block";?>" style="display:none;">
                                            <label>Ngoại trừ người dùng có ID:</label>
                                            <input name="exception" type="text" value="<?php if (isset($response['limit_mes']['exception'])) echo implode(",",$response['limit_mes']['exception']); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="button" class="btn btn-success updatebot">Cập
                                                nhật</button>
                                            <button type="reset" class="btn btn-secondary">Huỷ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end block 5 -->
                        <!-- block 6 -->
                        <div class="tab-pane" id="kt_portlet_base_demo_1_6_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="form-group row form-group-marginless kt-margin-t-20">
                                    <div class="kt-section col-12 mt-5">
                                        <div class="kt-list-timeline">
                                            <div class="kt-section__content">
                                                <table class="table table-striped- table-bordered table-checkable" id="table_get_user_sub">
                                                    <thead>
                                                        <tr>
                                                            <th>Tên nhóm</th>
                                                            <th>Username nhóm</th>
                                                            <th>Số lượng thành viên</th>
                                                            <th>Kiểu</th>
                                                            <th>Chi tiết</th>
                                                        </tr>
                                                        <tr id="row-search">
                                                            <th data-is-search="true"></th>
                                                            <th data-is-search="true"></th>
                                                            <th data-is-search="true"></th>
                                                            <th data-is-search="true"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $url5='http://localhost:2020/telbot/get_list_group_bot?id='.$id;
                                                        $curl5=curl_init($url5);
                                                        curl_setopt($curl5, CURLOPT_RETURNTRANSFER, true);
                                                        curl_setopt($curl5, CURLOPT_HTTPHEADER, [
                                                            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                                                            'Authorization: '.$_SESSION['user_token']
                                                        ]);
                                                        $list_group=json_decode(curl_exec($curl5), true);
                                                        curl_close($curl5);
                                                        if (!empty($list_group['data'])) {
                                                            foreach($list_group['data'] as $index => $group) {
                                                                echo '<tr>
                                                                <td>
                                                                        '.(isset($group['name_group'])?$group['name_group']:"").'
                                                                    <div class="d-none">' . (isset($group['user_id'])?$sub['user_id']:""). '</div>
                                                                </td>
                                                                <td>
                                                                    '.(isset($group['username_group'])?$group['username_group']:"").'
                                                                    <div class="d-none">' . (isset($group['username_group'])?(khong_dau($group['username_group'])):"").'</div>
                                                                </td>
                                                                <td class="text-center">
                                                                    '.(isset($group['count_user'])?$group['count_user']:"").'
                                                                </td>
                                                                <td class="text-center">
                                                                <span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill m-1">'.$group['type'].'
                                                                    </span>
                                                                    <div class="d-none">'.$group['type'].'</div>
                                                                </td>
                                                                <td class="text-center">
                                                                    <button type="button" class="btn btn-bold btn-label-brand btn-sm view_user_group" data-toggle="modal" data-target="#kt_modal_2" data-chat_id="'.(substr($group['id_group'],4)).'">Chi tiết</button>
                                                                </td>
                                                                </tr>
                                                                ';
                                                            };
                                                        }
                                                        else echo '<tr class="text-center"><td valign="top" colspan="7" class="dataTables_empty">No data available in table</td></tr>';
                                                    ?>
                                                    </tbody>
                                                </table>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end block 6 -->
                        <!-- block 7 Khảo sát -->
                        <div class="tab-pane" id="kt_portlet_base_demo_1_7_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="form-group row form-group-marginless kt-margin-t-20">
                                    <div class="kt-section col-12 mt-5">
                                        <div class="kt-list-timeline">
                                            <div class="kt-section__content">
                                                <table class="table table-striped- table-bordered table-checkable" id="table_vote">
                                                    <thead>
                                                        <tr>
                                                            <th>BOT</th>
                                                            <th>Tên khảo sát</th>
                                                            <th>Ngày bắt đầu</th>
                                                            <th>Ngày kết thúc</th>
                                                            <th>Số lượng người tham gia</th>
                                                        </tr>
                                                        <tr id="row-search">
                                                            <th data-is-search="true"></th>
                                                            <th data-is-search="true"></th>
                                                            <th data-is-search="true"></th>
                                                            <th data-is-search="true"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $url5='http://localhost:2020/telbot/get_list_vote_bot?id='.$id;
                                                        $curl5=curl_init($url5);
                                                        curl_setopt($curl5, CURLOPT_RETURNTRANSFER, true);
                                                        curl_setopt($curl5, CURLOPT_HTTPHEADER, [
                                                            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                                                            'Authorization: '.$_SESSION['user_token']
                                                        ]);
                                                        $list_group=json_decode(curl_exec($curl5), true);
                                                        curl_close($curl5);
                                                        if (!empty($list_group['data'])) {
                                                            foreach($list_group['data'] as $index => $group) {
                                                                echo '<tr>
                                                                <td>
                                                                        '.(isset($group['name_group'])?$group['name_group']:"").'
                                                                    <div class="d-none">' . (isset($group['user_id'])?$sub['user_id']:""). '</div>
                                                                </td>
                                                                <td>
                                                                    '.(isset($group['username_group'])?$group['username_group']:"").'
                                                                    <div class="d-none">' . (isset($group['username_group'])?(khong_dau($group['username_group'])):"").'</div>
                                                                </td>
                                                                <td class="text-center">
                                                                    '.(isset($group['count_user'])?$group['count_user']:"").'
                                                                </td>
                                                                <td class="text-center">
                                                                <span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill m-1">'.$group['type'].'
                                                                    </span>
                                                                    <div class="d-none">'.$group['type'].'</div>
                                                                </td>
                                                                <td class="text-center">
                                                                    <button type="button" class="btn btn-bold btn-label-brand btn-sm view_user_group" data-toggle="modal" data-target="#kt_modal_2" data-chat_id="'.(substr($group['id_group'],4)).'">Chi tiết</button>
                                                                </td>
                                                                </tr>
                                                                ';
                                                            };
                                                        }
                                                        else echo '<tr class="text-center"><td valign="top" colspan="7" class="dataTables_empty">No data available in table</td></tr>';
                                                    ?>
                                                    </tbody>
                                                </table>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end block 7 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--begin::Modal-->
<div class="modal fade" id="kt_modal_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Danh sách người dùng trong nhóm chat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex">
                        <div class="form-group mb-2">
                            <select class="form-control" name="action" id="exampleSelect1">
                                <option value="0">Hành động</option>
                                <option value="kick">Kick khỏi nhóm</option>
                            </select>
                        </div>
                        <div class="form-group ml-2 mb-2">
                            <button id="doAction" class="btn btn-info">Thực hiện</button>
                        </div>
                        <input type="hidden" name="chat_id">
                    </div>
                </div>
                <table class="table table-striped- table-bordered table-checkable" id="table_get_user_sub_2">
                    <thead>
                        <tr>
                            <th>
                                <label class="align-top kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                        <input id="check_all_user_in_group" type="checkbox">
                                        <span></span>
                                    </label>
                            </th>
                            <th>#</th>
                            <th>Tên người dùng</th>
                            <th>Username</th>
                            <th>Phone</th>
                        </tr>
                        <tr id="row-search">
                            <th data-is-search="false"></th>
                            <th data-is-search="false"></th>
                            <th data-is-search="true"></th>
                            <th data-is-search="true"></th>
                            <th data-is-search="true"></th>
                        </tr>
                    </thead>
                    <tbody id="body_user_in_group">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

							<!--end::Modal-->
<?php include 'footer.php'; ?>
<script type="text/javascript">
jQuery(document).ready(function($) {

    $("#doAction").click(function() {
            var name_action = $("select[name=action]").val();
            if(name_action == "kick") {
                var searchIDs = $(".cbx_user:checked").map(function(){
                    return $(this).val();
                }).get();
                if(searchIDs.length > 0) {
                    if ($('input[name="chat_id"').val()) 
                    {
                        Swal.fire({
                            title: "Vui lòng nhập thời gian ban người dùng (ngày)",
                            input: "number",
                            confirmButtonText: 'Kick',
                            showLoaderOnConfirm: true,
                            preConfirm: function(data) {
                                $.ajax({
                                    url: "./createapp.php",
                                    type: "POST",
                                    data: {
                                        "function": "kick_chat_member",
                                        "ids_user_kick": JSON.stringify(searchIDs),
                                        "id_bot": <?php echo $id; ?>,
                                        "group_chat": $('input[name="chat_id"]').val(),
                                        "time_ban": data
                                    },
                                    success: function (dt) {
                                        if (dt) dt = JSON.parse(dt);
                                        if (dt.status==true) {
                                            Swal.fire(
                                                'Thao tác thành công',
                                                'Kích thành công ' + dt.data[0].count + ' / ' + dt.data[0].total + ' người dùng',
                                                'success',
                                            );
                                            // location.reload();
                                        } else Swal.fire(
                                            'Lỗi...',
                                            'Lỗi khi thực hiện tác vụ',
                                            'error',
                                        );
                                    }
                                });
                            }
                        })
                    }
                    else  Swal.fire(
                        'Lỗi...',
                        'Bạn chọn group chat !',
                        'error',
                    );
                }else{
                    Swal.fire(
                        'Lỗi...',
                        'Bạn chưa đánh đấu record !',
                        'error',
                    );
                }
                    
            }
        })


    $("#check_all_user_in_group").click(function(){
        $('.cbx_user:checkbox').not(this).prop('checked', this.checked);
    });
    $('.view_user_group').click(function() {
        if ($(this).data('chat_id')) {
            $('input[name="chat_id"]').val($(this).data('chat_id'));
            $.ajax({
                type: "POST",
                url: "./createapp.php",
                data: {
                    "function": "get_full_user_in_group",
                    "chat_id": $(this).data('chat_id') ,
                },
                success: function(data) {
                    if (data) {
                        data= JSON.parse(data);
                        let html ='';
                        let row = 0;
                        if (data) 
                        for (let user of data.data) {
                            row ++;
                            html = html + `
                            <tr>
                                <th>
                                    <label class="align-top mt-0 kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                        <input value="${user.user_id}" class="cbx_user" type="checkbox">
                                        <span></span>
                                    </label>
                                </th>
                                <th scope="row">${row}</th>
                                <td>
                                    ${((user.first_name)?user.first_name:"") + " " + ((user.last_name)?user.last_name:"")}
                                </td>
                                <td>
                                    ${(user.username)?user.username:""}
                                </td>
                                <td>
                                    ${(user.phone)?user.phone:""}
                                </td>
                            </tr>
                            `;
                        }
                        $('#body_user_in_group').html(html);
                    }
                }
            })
        }
    })

    $('.tb_inviter').click(function() {
        if ($(this).is(":checked"))
            $('.reply_inviter_group').addClass('display-block');
        else $('.reply_inviter_group').removeClass('display-block');
    })
    $('.allow_forward').click(function() {
        if ($(this).is(":checked"))
            $('.list_id_allow').addClass('display-block');
        else $('.list_id_allow').removeClass('display-block');
    })
    $('.limit_mes').click(function() {
        if ($(this).is(":checked"))
        {
            $('.count_line').addClass('display-block');
            $('.exception').addClass('display-block');
        }
        else 
        {
            $('.count_line').removeClass('display-block');
            $('.exception').removeClass('display-block');
        }
    })
    $('.forward').click(function() {
        let jsonrequest = [];
        $('.list_forward').children().map(function() {
            let from = [];
            $(this).find('input[name="from"]').map(function() {
                if ($(this).val() != '')
                    from.push($(this).val().replace(/\s/g, ''));
            })
            let to = [];
            $(this).find('input[name="to"]').map(function() {
                if ($(this).val() != '')
                    to.push($(this).val().replace(/\s/g, ''));
            })
            if (from.length!=0 && to.length!=0)
            jsonrequest.push({
                "from": from.toString(),
                "to": to.toString(),
                "typeto": $(this).find('select.typeto option:selected').val(),
                "typesend": $(this).find('select.typesend option:selected').val(),
                "countdown": $(this).find('.countdown').val(),
            })
        })
        $.ajax({
            type: "POST",
            url: "./createapp.php",
            data: {
                "function": "forwardbot",
                "id": <?php echo $id; ?> ,
                "list_forward" : JSON.stringify(jsonrequest),
            },
            success: function(data) {
                if (data == "success") {
                    Swal.fire({
                        position: 'inherit',
                        type: 'success',
                        title: 'Cấu hình thành công',
                        showConfirmButton: false,
                        timer: 1500
                    }).then((reslt) => {
                        window.location.href = "list-bot-telegram.php";
                    })
                } else
                    alert("Cấu hình thất bại");
            }
        })
    })

    //danh sach lenh
    $('.config_command').click(function() {
        let request = [];
        $('.command').map(function() {
            let ontext = $(this).find('input[name="ontext"]').val();
            let reply = $(this).find('textarea[name="reply"]').val();
            let arraybtn = [];
            $(this).find('.button_url').children().map(function() {
                if ($(this).find('input[name="text_link"]').val().length != 0 &&
                    $(this).find('input[name="link"]').val().length != 0)
                    arraybtn.push({
                        "text_link": $(this).find('input[name="text_link"]')
                            .val(),
                        "link": $(this).find('input[name="link"]').val(),
                    })
            })
            if (ontext.length != 0 && reply.length != 0)
                request.push({
                    "ontext": ontext,
                    "reply": reply,
                    "arraybtn": arraybtn
                })
        })
        if (request.length != 0) {
            $.ajax({
                type: "POST",
                url: "./createapp.php",
                data: {
                    "function": "commandbot",
                    "id": <?php echo $id; ?> ,
                    "content" : JSON.stringify(request),
                },
                success: function(data) {
                    if (data == "success") {
                        Swal.fire({
                            position: 'inherit',
                            type: 'success',
                            title: 'Cấu hình thành công',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((reslt) => {
                            window.location.href = "list-bot-telegram.php";
                        })
                    } else
                        alert("Cập hình thất bại");
                }
            })
        } else alert("Vui lòng điền đầy đủ các trường");
    })

    // cap nhat bot

    $('input[name="attach"]').click(function() {
        if ($(this).is(":checked"))
            $(this).parent().parent().children().last().addClass('display-block');
        else $(this).parent().parent().children().last().removeClass('display-block');
    })
    $('.updatebot').on('click', function() {
        var connect = [];
        $('input[name="text"]').map(function() {
            if ($(this).val() != '')
                connect.push({
                    "text": $(this).val()
                })
        })
        let index = 0;
        $('input[name="url"]').map(function() {
            if ($(this).val() != '') {
                connect[index].url = $(this).val();
                index++;
            }
        })
        let greeting = [];
        $('textarea[name="loichao"').map(function() {
            if ($(this).val() != '')
                greeting.push({
                    "text": $(this).val()
                })
        })
        index = 0;
        $('input[name="checkid"]').map(function() {
            if (greeting[index]) {
                greeting[index].userid = ($(this).prop('checked') == true) ? 1 : 0;
                index++;
            }
        })
        let greeting2 = [];
        $('textarea[name="loichao2"').map(function() {
            if ($(this).val() != '')
                greeting2.push({
                    "text": $(this).val()
                })
        })
        index = 0;
        $('input[name="checkid2"]').map(function() {
            if (greeting2[index]) {
                greeting2[index].userid = ($(this).prop('checked') == true) ? 1 : 0;
                index++;
            }
        })
        let msgauto = [];
        $('textarea[name="message"').map(function() {
            if ($(this).val() != '')
                msgauto.push({
                    "msg": $(this).val()
                })
        })
        index = 0;
        $('input[name="attach"]').map(function() {
            if (msgauto[index]) {
                if ($(this).is(':checked'))
                    msgauto[index].attach = 1;
                else msgauto[index].attach = 0;
                index++;
            }
        })
        index = 0;
        $('.link_url').map(function() {
            if (msgauto[index]) {
                if ($(this).hasClass("display-block")) {
                    let arraylink = [];
                    $(this).children().map(function() {
                        if ($(this).find('textarea[name="link"]').val() != "") {
                            let link = {
                                "link_text": ($(this).find(
                                        'textarea[name="link_text"]')
                                    .val()),
                                "link": ($(this).find(
                                    'textarea[name="link"]').val())
                            }
                            arraylink.push(link);
                        }
                    })
                    msgauto[index].linkattach = arraylink;
                } else msgauto[index].linkattach = [];
                index++;
            }
        })
        index = 0;
        $('input[name="day"]').map(function() {
            if (msgauto[index]) {
                msgauto[index].day = Number($(this).val());
                index++;
            }
        })
        index = 0;
        $('input[name="hours"]').map(function() {
            if (msgauto[index]) {
                msgauto[index].hours = ($(this).val().slice(0, 2) == "") ? "00" : $(
                    this).val().slice(0, 2);
                msgauto[index].mins = ($(this).val().slice(3, 5) == "") ? "00" : $(this)
                    .val().slice(3, 5);
                index++;
            }
        })
        let btn_inline=[];
        $('.inlines').map(function() {
            if ($(this).find('.btn_inline').val()!="") 
            btn_inline.push({
                "btn_inline": $(this).find('.btn_inline').val(),
                "id_used": (($(this).find('.id_used').val()!="")? $(this).find('.id_used').val():0)
            })
        })
        let allow_forward = {
            allow: $('input[name="allow_forward"]').is(':checked')?0:1,
            list_id_allow: $('input[name="list_id_allow"]').val().split(",")
        }
        let limit_mes = {
            status: $('input[name="limit_mes"]').is(':checked')?1:0,
            count_line: $('input[name="count_line"]').val(),
            exception: $('input[name="exception"]').val().split(',').map(Number)
        }
        $.ajax({
            type: "POST",
            url: "./createapp.php",
            data: {
                "function": "updatebot",
                "id": <?php echo $id; ?> ,
                "idbaocao" : $('.idbaocao').val(),
                "textbaocao" : $('.textbaocao').val(),
                "greeting": JSON.stringify(greeting),
                "greeting2": JSON.stringify(greeting2),
                "textketnoi": $('textarea[name="textketnoi"]').val(),
                "invitation": ($('.invitation').prop('checked') == true) ? 1 : 0,
                "connect": JSON.stringify(connect),
                "autosendmsg": JSON.stringify(msgauto),
                "btn_inline": JSON.stringify(btn_inline),
                "del_inviter": ($('.del_inviter').prop('checked') ==true)?1: 0,
                "tb_inviter": ($('.tb_inviter').prop('checked') ==true)?1: 0,
                "reply_invite_group": ($('.tb_inviter').prop('checked') ==true)? ($('textarea[name="reply_inviter"]').val()): "",
                "dis_notify_msg": ($('.disable_notification').prop('checked') == true) ? 1 : 0,
                "del_msg_out": ($('.del_out').prop('checked') == true) ? 1 : 0, 
                "invite_bot": ($('.invite_bot').prop('checked') == true) ? 1 : 0, 
                "allow_forward": JSON.stringify(allow_forward),
                "limit_mes": JSON.stringify(limit_mes),
            }, 
            success: function(data) {
                if (data == "success") {
                    Swal.fire({
                        position: 'inherit',
                        type: 'success',
                        title: 'Cập nhật thành công',
                        showConfirmButton: false,
                        timer: 1500
                    }).then((reslt) => {
                        window.location.href = "list-bot-telegram.php";
                    })
                } else
                    alert("Cập nhật thất bại");
            }
        })
    });
})
$('#table_get_user_sub thead #row-search th').each( function () {
    if($(this).data('is-search')) {
    var title = $(this).text();
            $(this).html('<input type="text" style="width:100%;" placeholder="" />' );
    }
} );

// DataTable
var table = $('#table_get_user_sub').DataTable({
    // "ordering": false,
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
$('#table_get_user_sub_2 thead #row-search th').each( function () {
    if($(this).data('is-search')) {
    var title = $(this).text();
            $(this).html('<input type="text" style="width:100%;" placeholder="" />' );
    }
} );

// DataTable
var table2 = $('#table_get_user_sub_2').DataTable({
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
$("#checkAll").click(function(){
    $('.cbx:checkbox').not(this).prop('checked', this.checked);
});

$('.button_link').on('click touch', '.add_button_url_send', function (event) {
    let rdom = `<div class="row mt-3">
        <div class="col-lg-4"> 
            <input type="text" name="text" class="form-control" placeholder="Text hiển thị">
        </div>
        <div class="col-lg-4"> 
            <input type="text" name="link" class="form-control" placeholder="Đường dẫn">
        </div>
        <div class="col-lg-1 col-md-1 add_button_url_send kt-margin-b-5" >
            <i class="far fa-plus-square"
                style=" font-size: 2rem; color: #1dc9b7; cursor: pointer;"></i>
        </div>
        <div class="col-lg-1 col-md-1 delete_button_url_send kt-margin-b-5" style="display: none;">
            <i class="far fa-minus-square"
                style=" font-size: 2rem; color: #fd1361; cursor: pointer;"></i>
        </div>
    </div>`;
    $('.button_link .add_button_url_send').remove();
    $('.button_link .delete_button_url_send').last().addClass('display-block');
    $('.button_link').append(rdom);
});
$('.button_link').on('click touch', '.delete_button_url_send', function (event) {
    $(this).parent().remove();
});
$('.btn-send_msg_sub').click(function(){
    let btn_inline=[];
    $('.button_link').map(function() {
        if ($(this).find('.link_send_sub').val()!="") 
        btn_inline.push({
            "url": $(this).find('.link_send_sub').val(),
            "text": $(this).find('.text_send_sub').val(),
        })
    })
    let users=[];
    $('.cbx').map(function() {
        if ($(this).val()!="" && this.checked) 
        users.push($(this).val())
    })
    if ($('textarea[name="message_send_sub"]').val()=="")
        Swal.fire({
            position: 'inherit',
            type: 'error',
            title: 'Tin nhắn không được rỗng',
        })
    else if (users.length==0) {
        Swal.fire({
            position: 'inherit',
            type: 'error',
            title: 'Danh sách người dùng rỗng',
        })
    }
    else {
        $.ajax({
            type: "POST",
            url: "./createapp.php",
            data: {
                "function": "send_msg_bot",
                "id": <?php echo $id;?>,
                "list_user": users.toString(),
                "text": $('textarea[name="message_send_sub"]').val(),
                "keyboard": JSON.stringify(btn_inline),
            },
            success: function(data) {
                if (data) {
                    Swal.fire({
                        position: 'inherit',
                        type: 'success',
                        title: 'Gửi thành công tới ' + data + 'người dùng',
                    })
                } else
                    alert("Gửi tin nhắn thất bại");
            }
        })
    }
})

</script>