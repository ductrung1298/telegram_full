<?php include 'header.php';?>
<!-- end:: Header -->
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
    <div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
        id="kt_content">
        <!-- begin:: Subheader -->
        <div class="kt-subheader mb-5 kt-grid__item" id="kt_subheader">
            <div class="kt-container ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                    Tài liệu hướng dẫn </h3>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="tele-document.php" class="kt-subheader__breadcrumbs-link">
                            Tool Telegram </a>
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
                                <a class="nav-link active"  href="#kt_portlet_base_demo_1_1_tab_content" 
                                data-toggle="tab" role="tab" aria-selected="true">
                                    <i class="flaticon-interface-11"></i>Tài liệu hướng dẫn tool telegram
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <!-- begin:: Notification 1 -->
                        <div class="tab-pane active" id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel">
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
                        <!-- end: Notification 1 -->
                    </div>
                </div>
            </div>
            <!-- end:: Notification -->
            <?php include 'footer.php';?>