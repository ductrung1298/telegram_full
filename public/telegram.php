<?php include 'header.php';?>
<!-- end:: Header -->
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
    <div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
        id="kt_content">

        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Tool Telegram </h3>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="index.php" class="kt-subheader__breadcrumbs-link">
                            Crawler </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="telegram.php" class="kt-subheader__breadcrumbs-link">
                            Telegram </a>
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
                                    <i class="flaticon-bell"></i> Tài khoản
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_3_tab_content"
                                    role="tab" aria-selected="false">
                                    <i class="flaticon-bell"></i> Bot Telegram
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_2_tab_content"
                                    role="tab" aria-selected="false">
                                    <i class="flaticon-bell"></i> Tài liệu hướng dẫn
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <!-- begin:: Notification 1 -->
                        <div class="tab-pane active " id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">
                                        <form class="kt-form kt-form--label-right">
                                            <div class="kt-portlet__body">
                                                <div class="form-group row form-group-marginless kt-margin-t-20">
                                                    <label class="col-10 text-left"><strong>THÊM TÀI KHOẢN
                                                        </strong></label><br>
                                                    <div class="col-lg-5">
                                                        <label>Số điện thoại:</label>
                                                        <input type="text" class="form-control phone" name="phone"
                                                            placeholder="+84xxxxxxxxx"
                                                            oninvalid="this.setCustomValidity('Trường số điện thoại không thể để rỗng')"
                                                            oninput="setCustomValidity('')" required="">
                                                    </div>
                                                    <div class="col-lg-5"> </div>
                                                    <div class="col-lg-5 mt-2">
                                                        <label>API_ID:</label>
                                                        <input type="text" class="form-control api_id" name="api_id"
                                                            placeholder="xxxxxxx">
                                                    </div>
                                                    <div class="col-lg-5 mt-2">
                                                        <label>API_HASH:</label>
                                                        <input type="text" class="form-control api_hash" name="api_hash"
                                                            placeholder="xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx">
                                                    </div>
                                                    <div class="col-lg-5 mt-2 otpcodeclass" style="display:none;">
                                                        <label>OTP CODE:</label>
                                                        <input type="text" class="form-control otpcode">
                                                    </div>
                                                    <div class="col-lg-12 mt-5 text-center btnsendcode"
                                                        style="display:none;">
                                                        <div class="row justify-content-center">
                                                            <button type="button"
                                                                class="btn btn-success sendcodeotp">Gửi</button>
                                                        </div>
                                                    </div>
                                                    <div class="id_account" style="display:none;">
                                                    </div>
                                                </div>
                                                <div class="kt-portlet__foot">
                                                    <div class="kt-form__actions">
                                                        <div class="row">
                                                            <div class="col-lg-12 text-center bt-end">
                                                                <button type="button"
                                                                    class="btn btn-success btn-addaccount">Thêm
                                                                    mới</button>
                                                                <button type="reset"
                                                                    class="btn btn-secondary">Huỷ</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="overlay">
                                                    <div class="cv-spinner">
                                                        <span class="spinner"></span>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                    <div
                                        class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit">
                                    </div>
                                    <label class="col-10 text-left"><strong>DANH SÁCH ACCOUNT</strong></label>
                                    <div class="kt-section__content">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>First_Name</th>
                                                    <th>Last_Name</th>
                                                    <th>Phone_Number</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                                    $url='localhost:3000/telegram/getlistuser';
                                                                    $curl=curl_init($url);
                                                                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                                                    curl_setopt($curl, CURLOPT_HTTPHEADER, [
                                                                        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                                        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx'
                                                                    ]);
                                                                    $response2 = json_decode(curl_exec($curl), true);
                                                                    curl_close($curl);
                                                                    if (!empty($response2)) {
                                                                        foreach ($response2 as $index => $post) {   
                                                                            echo '<tr>'.'<th scope="row">'.((int)$index+1).'</th>';
                                                                            echo '<td> <label>'.str_replace("<","&lt;",$post['first_name']).'</label> </td>';
                                                                            echo '<td> <label>'.str_replace("<","&lt;",$post['last_name']).'</label> </td>';
                                                                            echo '<td> <label>'.str_replace("<","&lt;",$post['phone']).'</label> </td>';
                                                                            echo '<td> <span>';
                                                                            echo '<a title="Manager" href="getcontact.php?id='.$post['Id'].'" class="btn btn-sm btn-clean btn-icon btn-icon-sm"><i class="fas fa-tools"></i></a>';
                                                                            echo '<a title="Message" href="getdialogs.php?id='.$post['Id'].'" class="btn btn-sm btn-clean btn-icon btn-icon-sm"><i class="fas fa-sms"></i></a>';
                                                                            echo '<a title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-sm btn-del-acc" data-id='.$post['Id'].'><i class="fas fa-trash"></i></a>';
                                                                            echo '</span></td>';
                                                                            echo '</tr>';
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
                    <!-- end:: Notification 1-->
                    <!-- begin:: Notification 1 -->
                    <div class="tab-pane " id="kt_portlet_base_demo_1_2_tab_content" role="tabpanel">
                        <div class="kt-portlet__body">
                            <div class="row ">
                                <div class="kt-section col-12">
                                    <fieldset class="collapsible collapsed collapse-processed"><strong>I. GIỚI THIỆU VỀ
                                            TOOL TELEGRAM </strong>
                                        <div class="fieldset-wrapper">
                                            <p class="rtejustify">- Tool Telegram là một công cụ nhằm giúp hỗ trợ việc
                                                gửi tin nhắn tự động tới một danh sách người dùng số lượng lớn. Bạn có
                                                thể
                                                thêm danh bạ từ một file csv với số lượng lớn. Ngoài ra bạn có thể xuất
                                                danh bạ sang file csv. Bên cạnh đó
                                                người dùng có thể xem danh sách tin nhắn, thêm danh sách người dùng vào
                                                group, gửi tin nhắn cho người dùng, group (có đặt lịch hẹn tự động gửi
                                                nhiều lần).
                                        </div>
                                    </fieldset>
                                    <fieldset class="collapsible collapsed collapse-processed"><strong>II. ĐĂNG KÍ VÀ ỦY
                                            QUYỀN ỨNG DỤNG </strong>
                                        <div class="fieldset-wrapper">
                                            <p class="rtejustify">- Để sử dụng được tool này ta cần lấy mã API_ID và
                                                API_HASH của tài khoản mình.
                                                Ta vào địa chỉ: <a
                                                    href="https://my.telegram.org/auth"><b>https://my.telegram.org/auth</b></a>
                                                sau đó nhập số điện thoại đăng nhập. Một
                                                mã xác thực sẽ được gửi đến ứng dụng của bạn. Sau khi đăng nhập thành
                                                công ta chọn "<b>API development tools</b>", điền vào biểu mẫu, ta sẽ
                                                nhận được trường
                                                <b>api_id</b> và <b>api_hash</b>.
                                            </p>
                                            <p>
                                                <img src="../assets/media/howtouse/telegram_apidevelopment.jpg"
                                                    alt="Giao diện trang https://my.telegram.org/auth" width="500"
                                                    style="display: block; margin-left: auto; margin-right: auto;">
                                            </p>
                                            <p class="rtejustify">- Sau khi có được mã api_id và api_hash ta vào địa chỉ
                                                tool <a
                                                    href="http://cophieuvn.com/crawladmin/public/telegram.php"><b>http://cophieuvn.com/crawladmin/public/telegram.php</b></a>
                                                vào tab Telegram, ở mục thêm tài khoản ta nhập <b>Số điện thoại, API_ID,
                                                    API_HASH</b> vừa lấy được ở bước trên, sau đó nhấn nút Thêm mới. Mã
                                                code <b>OTP</b> sẽ được gửi đến ứng dụng của bạn(khoảng 5s),
                                                Điền mã OTP vào trường OPT Code, sau đó nhấn nút Gửi.
                                            </p>
                                        </div>
                                    </fieldset>
                                    <fieldset class="collapsible collapsed collapse-processed"><strong>III. DANH BẠ
                                        </strong>
                                        <div class="fieldset-wrapper">
                                            <p class="rtejustify">- Tại tab Telegram ở mục Danh sách Account cột Hành
                                                động, ta nhấn vào biểu tượng điện thoại
                                                để truy cập vào Tab Danh bạ
                                            </p>
                                            <p>
                                                <img src="../assets/media/howtouse/telegram-action.jpg" alt="Danh bạ"
                                                    width="300"
                                                    style="display: block; margin-left: auto; margin-right: auto;">
                                            </p>
                                            <p class="rtejustify">- Chức năng chính của mục này là hiển thị danh sách
                                                danh bạ, trích xuất danh bạ sang file csv, thêm số điện thoại vào danh
                                                bạ từ file.
                                            </p>
                                            <p class="rtejustify">- Tab Danh bạ: Click <b>Export CSV</b> để tải xuống
                                                file danh bạ người dùng. Click vào tên nhóm người dùng ở mục <b>Nhóm
                                                    người dùng</b> để xem danh sách nhóm người dùng đã lưu.
                                            </p>
                                            <p class="rtejustify">- Tab Thêm danh bạ: Ta có thể thêm danh bạ từ text,
                                                nhập các trường số điện thoại, first_name, last_name. Nhấn dấu + để thêm
                                                trường mới.
                                                Bên cạnh đó ta có thể thêm danh bạ trực tiếp từ file tải lên ở định dạng
                                                <b>.csv</b>, chỉ định vị trí các cột trong file danh bạ như vị trí cột
                                                số điện thoại, vị trí cột
                                                tên người dùng,.. Ngoài ra ta có thể thêm list danh bạ tải lên vào danh
                                                sách nhóm liên hệ để thuận tiện cho việc lưu trữ và gửi tin
                                                sau này. Để chọn nhóm liên hệ click vào trường Thêm vào nhóm liên hệ
                                                chọn nhóm liên hệ cần thêm hoặc nhấn tạo mới để thêm nhóm liên hệ mới.
                                            </p>

                                        </div>
                                    </fieldset>
                                    <fieldset class="collapsible collapsed collapse-processed"><strong>IV. TIN NHẮN
                                        </strong>
                                        <div class="fieldset-wrapper">
                                            <p class="rtejustify">- Tại tab Telegram ở mục Danh sách Account cột Hành
                                                động, ta nhấn vào biểu tượng tin nhắn
                                                để truy cập vào Tab Tin nhắn
                                            </p>
                                            <p class="rtejustify">- Chức năng chính của mục này là gửi tin nhắn, thêm
                                                người dùng vào nhóm.
                                            </p>
                                            <p class="rtejustify">- Tab Tin nhắn: + Để gửi tin nhắn cho một user hoặc
                                                group ta click vào message hoặc biểu tượng
                                                tin nhắn ở bên phải màn hình. Điền nội dung tin nhắn cần gửi rồi nhấn
                                                nút Gửi
                                            </p>
                                            <p class="rtejustify">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;+ Để thêm
                                                người dùng vào group chat ta click vào biểu tượng thêm vào nhóm, chọn
                                                liên hệ cần thêm sau đó nhấn nút Thêm.
                                            </p>
                                            <p class="rtejustify">- Tab Gửi cho tất cả: Nhập nội dung cần gửi tin. Lựa
                                                chọn thời gian gửi tin: Gồm 2 kiểu gửi 1 lần duy nhất và gửi theo chu
                                                kì.
                                                Nếu chọn gửi một lần, nhập thời gian hẹn giờ gửi tin. Nếu chọn gửi tin
                                                theo chu kì, gồm 2 kiểu gửi tin là Daily (tự động gửi sau bao nhiêu
                                                giờ), hoặc Date to Date
                                                (Tự động chạy vào thời gian người dùng nhập từ ngày bao nhiêu đến ngày
                                                bao nhiêu).
                                                Chọn người dùng hoặc group cần gửi tin đến. Nhấn nút gửi để gửi tin
                                            </p>
                                        </div>
                                    </fieldset>
                                    <fieldset class="collapsible collapsed collapse-processed"><strong>V. MỘT SỐ LỖI
                                            THƯỜNG GẶP </strong>
                                        <div class="fieldset-wrapper">
                                            <p>
                                                <img src="../assets/media/howtouse/errorlogin.jpg"
                                                    alt="Lỗi hết phiên đăng nhập" width="800"
                                                    style="display: block; margin-left: auto; margin-right: auto;">
                                            </p>
                                            <p class="rtejustify">- Lỗi không thể đăng nhập vào tài khoản: Lỗi này xảy
                                                ra khi bạn chưa xác thực tài khoản
                                                hoặc thời gian phiên đăng nhập hết hạn. Vui lòng quay lại trang chủ
                                                telegram nhập số điện thoại người dùng vào trường số điện thoại,
                                                sau đó nhấn nút Thêm mới, mã xác thực sẽ được gửi đến bạn.
                                            </p>
                                            <p>
                                                <img src="../assets/media/howtouse/authaccount.jpg"
                                                    alt="Lỗi hết phiên đăng nhập" width="900"
                                                    style="display: block; margin-left: auto; margin-right: auto;">
                                            </p>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end:: Notification 2 -->
                    <div class="tab-pane" id="kt_portlet_base_demo_1_3_tab_content" role="tabpanel">
                        <div class="kt-portlet__body">
                            <div class="row ">
                                <div class="kt-section col-12">
                                    <form class="kt-form kt-form--label-right">
                                        <div class="kt-portlet__body">
                                            <div class="form-group row form-group-marginless kt-margin-t-20">
                                                <label class="col-10 text-left"><strong>THÊM BOT TELEGRAM
                                                    </strong></label><br>
                                                <div class="col-lg-5 mt-2">
                                                    <label>Mã Token BOT: </label>
                                                    <input type="text" class="form-control token" name="token">
                                                </div>
                                                <div class="col-lg-5 mt-2"> </div>
                                                <div class="form-group col-lg-12 row mt-4 loichao">
                                                    <label class="col-12 text-left">Lời chào khi đăng kí kênh:</label>
                                                    <div class="col-lg-12 kt-margin-t-20 row">
                                                        <div class="col-lg-9 col-md-7 kt-margin-b-5">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    name="loichao" placeholder="Chào mừng bạn đã đến với ...">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-md-1">
                                                            <div class="input-group">
                                                                <label for="checkid" class="form-control"><input type="checkbox" id="checkid" name="checkid"> Đính kèm mã ID</label> 
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
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Đính kèm danh sách kết nối cộng đồng: </label>
                                                    <input type="checkbox" class="col-lg-3 form-control invitation">
                                                </div>
                                                <div class="form-group col-lg-12 row mt-4 ketnoi">
                                                    <div class="kt-margin-t-5 col-lg-12 row">
                                                        <div class="col-lg-6 col-md-6">
                                                            <label>Text hiển thị:</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3">
                                                            <label>Đường dẫn:</label>
                                                        </div>
                                                    </div>
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
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <label>Báo cáo: Chỉ định ID người dùng được nhấn báo cáo (0 để cho phép tất cả): </label>
                                                    <input type="number" class="form-control idbaocao" value="0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__foot">
                                            <div class="kt-form__actions">
                                                <div class="row">
                                                    <div class="col-lg-12 text-center">
                                                        <button type="button" class="btn btn-success addbot">Thêm
                                                            mới</button>
                                                        <button type="reset" class="btn btn-secondary">Huỷ</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__body">
                                                <label><strong>DANH SÁCH CÁC LỆNH: </strong>
                                                </label><br>
                                                <label><b>/start:</b> Đăng kí kênh.</label>
                                                <label><b>#mes:</b> Gửi tin nhắn cho tất cả người dùng đã đăng kí kênh. Cú pháp gửi tin: #mes (nội dung tin nhắn).</label>
                                                <label><b>Báo cáo:</b> Báo cáo số lượng bạn bè đã giới thiệu và toàn bộ người dùng đăng kí kênh. Nhập giá trị trường Chỉ định người dùng được nhấn báo cáo bằng 0 để cho phép tất cả mọi người đều có thể sử dụng tính năng.</label>
                                                <label><b>Kết nối cộng đồng:</b> Hiển thị danh sách các kênh kết nối.</label>
                                        </div>
                                    </form>
                                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit">
                                </div>
                                <label class="col-10 text-left"><strong>DANH SÁCH BOT</strong></label>
                                <div class="kt-section__content">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First_Name</th>
                                                <th>UserName</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $bot='localhost:3000/telbot/get';
                                                $cbot=curl_init($bot);
                                                curl_setopt($cbot, CURLOPT_RETURNTRANSFER, true);
                                                curl_setopt($cbot, CURLOPT_HTTPHEADER, [
                                                    'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                                    'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx'
                                                ]);
                                                $resbot = json_decode(curl_exec($cbot), true);
                                                curl_close($cbot);
                                                foreach ($resbot as $index => $post) {   
                                                    echo '<tr>'.'<th scope="row">'.((int)$index+1).'</th>';
                                                    echo '<td> <label>'.str_replace("<","&lt;",$post['first_name']).'</label> </td>';
                                                    echo '<td> <label>'.str_replace("<","&lt;",$post['username']).'</label> </td>';
                                                    echo '<td> <span> <a title="Edit" data-id='.$post['id'].' class="btn btn-sm btn-clean btn-icon btn-icon-sm editbot"><i class="fas fa-edit"></i></a>';
                                                                echo '<a title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-sm del-bot" data-id='.$post['id'].'><i class="fas fa-trash"></i></a>'; 
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

    <!-- end:: Content -->
</div>
</div>
<!-- begin:: Footer -->
<?php include 'footer.php';?>
<script type="text/javascript">
jQuery(document).ready(function($) {

    $('.addbot').on('click', function() {
        if ($('.token').val() != '') {
            var connect=[];
            $('input[name="text"]').map(function() {
                if ($(this).val()!='')
                connect.push({"text": $(this).val()})
            })
            let index=0;
            $('input[name="url"]').map(function() {
                if (connect[index])
                connect[index].url=$(this).val();
                index++;
            })
            let greeting=[];
            $('input[name="loichao"').map(function() {
                if ($(this).val()!='')
                greeting.push({"text": $(this).val()})
            })
            index=0;
            $('input[name="checkid"]').map(function() {
                if (greeting[index])
                greeting[index].userid=($(this).prop('checked')==true)?1:0;
                index++;
            })
            $.ajax({
                type: "POST",
                url: "./createapp.php",
                data: {
                    "function": "addbot",
                    "token": $('.token').val(),
                    "idbaocao": $('.idbaocao').val(),
                    "greeting": JSON.stringify(greeting),
                    "invitation": ($('.invitation').prop('checked') ==true)?1:0,
                    "connect": JSON.stringify(connect)
                },
                success: function(data) {
                    if (data == "success") {
                        alert("Đăng kí thành công");
                        location.reload();
                    } else
                    if (data=="exist") alert("Tài khoản Bot đã tồn tại");
                    else 
                    alert("Đăng kí thất bại");
                }
            })
        } else alert("Trường mã token không được để rỗng");
    });
    $('.btn-del-acc').on('click', function() {
        var ok = prompt('Vui lòng nhập mã CODE quản trị viên để xóa tài khoản', '');
        if (ok != '' && ok != null)
            window.location.href = 'deleteaccount.php?id=' + $(this).data('id') + '&code=' + ok;
        else if (ok == '')
            alert("Vui lòng nhập mã CODE để xóa. Liên hệ quản trị viên để có được mã CODE");
    });
    $('.btn-addaccount').on('click', function() {
        $('.bt-end').hide();
        $.ajax({
            type: "POST",
            url: "./createapp.php",
            data: {
                "phone": $(".phone").val(),
                "function": "addaccount",
                "api_id": Number($(".api_id").val()),
                "api_hash": $(".api_hash").val(),
            },
            success: function(data) {
                if (data) {
                    $('.otpcodeclass').addClass('display-block');
                    $('.btnsendcode').addClass('display-block');
                    $('.id_account').val(data);
                } else alert("Đã xảy ra lỗi, xin thử lại sau");
            }
        })
    })
    $('.sendcodeotp').on('click', function() {
        $.ajax({
            type: "POST",
            url: "./createapp.php",
            data: {
                "id": $('.id_account').val(),
                "function": "authcode",
                "code": $(".otpcode").val()
            },
            success: function(data) {
                if (data == "success") {
                    alert("Xác thực thành công");
                    location.reload();
                } else alert("Đã xảy ra lỗi, xin thử lại sau");
            }
        })
    })
    $('.del-bot').on('click', function() {
        var ok = prompt('Vui lòng nhập mã CODE quản trị viên để xóa cấu hình', '');
        if (ok!='' && ok!=null) 
            window.location.href = "deletebot.php?id="+$(this).data('id')+"&code="+ok;
        else if (ok=='') 
        alert("Vui lòng nhập mã CODE để xóa. Liên hệ quản trị viên để có được mã CODE");
    });
    $('.editbot').on('click', function() {
        var ok = prompt('Vui lòng nhập mã CODE quản trị viên để chỉnh sửa cấu hình', '');
        if (ok!='' && ok!=null) 
            window.location.href = "editbot.php?id="+$(this).data('id')+"&code="+ok;
        else if (ok=='') 
        alert("Vui lòng nhập mã CODE để chỉnh sửa. Liên hệ quản trị viên để có được mã CODE");
    });
})
</script>