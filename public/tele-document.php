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
                                <a class="nav-link active" href="#kt_portlet_base_demo_1_1_tab_content"
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
                                        <fieldset class="collapsible collapsed collapse-processed"><strong>I. GIỚI THIỆU
                                                VỀ
                                                TOOL TELEGRAM </strong>
                                            <div class="fieldset-wrapper">
                                                <p class="rtejustify">- Tool Telegram là một công cụ nhằm giúp hỗ trợ
                                                    việc
                                                    gửi tin nhắn tự động tới một danh sách người dùng số lượng lớn. Bạn
                                                    có
                                                    thể
                                                    thêm danh bạ từ một file csv với số lượng lớn. Ngoài ra bạn có thể
                                                    xuất
                                                    danh sách bạn bè sang file csv. Bên cạnh đó
                                                    người dùng có thể thêm danh sách người dùng vào
                                                    group, gửi tin nhắn cho người dùng, group (có đặt lịch hẹn tự động
                                                    gửi
                                                    nhiều lần).
                                            </div>
                                        </fieldset>
                                        <fieldset class="collapsible collapsed collapse-processed"><strong>II. ĐĂNG KÍ
                                                VÀ ỦY
                                                QUYỀN ỨNG DỤNG </strong>
                                            <div class="fieldset-wrapper">
                                                <p class="rtejustify">- Để sử dụng được tool này ta cần lấy mã API_ID và
                                                    API_HASH của tài khoản mình.
                                                    Ta vào địa chỉ: <a
                                                        href="https://my.telegram.org/auth"><b>https://my.telegram.org/auth</b></a>
                                                    sau đó nhập số điện thoại đăng nhập. Một
                                                    mã xác thực sẽ được gửi đến ứng dụng của bạn. Sau khi đăng nhập
                                                    thành
                                                    công ta chọn "<b>API development tools</b>", điền vào biểu mẫu, ta
                                                    sẽ
                                                    nhận được trường
                                                    <b>api_id</b> và <b>api_hash</b>.
                                                </p>
                                                <p>
                                                    <img src="../assets/media/howtouse/telegram_apidevelopment.jpg"
                                                        alt="Giao diện trang https://my.telegram.org/auth" width="500"
                                                        style="display: block; margin-left: auto; margin-right: auto;">
                                                </p>
                                                <p class="rtejustify">- Sau khi có được mã api_id và api_hash ta vào địa
                                                    chỉ
                                                    tool <a
                                                        href="https://mydas.life/add-account-tool-telegram.php"><b>https://mydas.life/add-account-tool-telegram.php</b></a>
                                                    vào tab Đăng kí tài khoản, ta nhập <b>Số điện thoại, API_ID,
                                                        API_HASH</b> vừa lấy được ở bước trên, sau đó nhấn nút Thêm mới.
                                                    Mã
                                                    code <b>OTP</b> sẽ được gửi đến ứng dụng của bạn(khoảng 5s),
                                                    Điền mã OTP vào trường OPT Code, sau đó nhấn nút Thêm mới.
                                                </p>
                                            </div>
                                        </fieldset>
                                        <fieldset class="collapsible collapsed collapse-processed"><strong>III. DANH BẠ
                                            </strong>
                                            <div class="fieldset-wrapper">
                                                <p class="rtejustify">- Tại tab Danh sách ta chọn tài khoản cần truy cập
                                                    danh bạ sau đó chọn cột Action là Danh bạ
                                                    để truy cập vào Tab Danh bạ
                                                </p>
                                                <p>
                                                    <img src="../assets/media/howtouse/telegram-action.jpg"
                                                        alt="Danh bạ" width="800"
                                                        style="display: block; margin-left: auto; margin-right: auto;">
                                                </p>
                                                <p class="rtejustify">- Chức năng chính của mục này là hiển thị danh
                                                    sách
                                                    danh bạ, trích xuất danh bạ sang file csv, thêm số điện thoại vào
                                                    danh
                                                    bạ từ file.
                                                </p>
                                                <p class="rtejustify">- Nhấn thêm danh bạ để thêm mới một danh bạ.
                                                </p>
                                                <p class="rtejustify">- Danh sách danh bạ:
                                                    <ul>
                                                        <li>Chi tiết: Xem thông tin danh sách người dùng trong danh bạ.
                                                        </li>
                                                        <li>Thêm vào group chat: Thêm danh sách người dùng trong danh bạ
                                                            vào group chat Telegram
                                                        </li>
                                                        <li>Thêm vào bạn bè Telegram: Add danh sách người dùng trong
                                                            danh bạ làm bạn bè trên Telegram
                                                        </li>
                                                        <li>Export: Xuất danh sách thành viên trong danh bạ sang file
                                                            CSV
                                                        </li>
                                                    </ul>
                                                </p>
                                            </div>
                                        </fieldset>
                                        <fieldset class="collapsible collapsed collapse-processed"><strong>IV. BẠN BÈ
                                            </strong>
                                            <div class="fieldset-wrapper">
                                                <p class="rtejustify">- Tại tab Danh sách ta chọn tài khoản cần truy cập
                                                    danh bạ sau đó chọn cột Action là Bạn bè
                                                    để truy cập vào Tab Bạn bè
                                                </p>
                                                <p class="rtejustify">- Chức năng chính của mục này là hiển thị danh
                                                    sách
                                                    bạn bè của người dùng trong telegram.
                                                </p>
                                            </div>
                                        </fieldset>
                                        <fieldset class="collapsible collapsed collapse-processed"><strong>V. TIN NHẮN
                                            </strong>
                                            <div class="fieldset-wrapper">
                                                <p class="rtejustify">- Tại tab Danh sách ta chọn tài khoản cần truy cập
                                                    danh bạ sau đó chọn cột Action là Gửi tin nhắn
                                                    để nhắn tin cho người dùng
                                                </p>
                                                <p class="rtejustify">- Chức năng chính của mục này là gửi tin nhắn có
                                                    hẹn giờ cho bạn bè telegram, group chat hoặc danh bạ người dùng đã
                                                    lưu
                                                </p>
                                                <p class="rtejustify">- Tab Gửi cho bạn bè: Chọn danh sách bạn bè cần
                                                    gửi tin nhắn, sau đó chọn hẹn giờ gửi 1 lần hoặc gửi theo chu kì
                                                    sau đó nhập nội dung tin nhắn cần gửi và nhấn Gửi
                                                </p>
                                                <p class="rtejustify">- Tab Gửi cho group chat: Chọn danh sách group cần
                                                    gửi tin nhắn, sau đó chọn hẹn giờ gửi 1 lần hoặc gửi theo chu kì
                                                    sau đó nhập nội dung tin nhắn cần gửi và nhấn Gửi. Nhấn vào group
                                                    chat cụ thể để xem danh sách thành viên trong group chat
                                                </p>
                                                <p class="rtejustify">- Tab Gửi theo danh bạ: Chọn danh sách danh bạ cần
                                                    gửi tin nhắn, sau đó chọn hẹn giờ gửi 1 lần hoặc gửi theo chu kì
                                                    sau đó nhập nội dung tin nhắn cần gửi và nhấn Gửi.
                                                </p>
                                            </div>
                                        </fieldset>
                                        <fieldset class="collapsible collapsed collapse-processed"><strong>VI. MỘT SỐ
                                                LỖI
                                                THƯỜNG GẶP </strong>
                                            <div class="fieldset-wrapper">
                                                <p>
                                                    <img src="../assets/media/howtouse/errorlogin.jpg"
                                                        alt="Lỗi hết phiên đăng nhập" width="800"
                                                        style="display: block; margin-left: auto; margin-right: auto;">
                                                </p>
                                                <p class="rtejustify">- Lỗi không thể đăng nhập vào tài khoản: Lỗi này
                                                    xảy
                                                    ra khi bạn chưa xác thực tài khoản
                                                    hoặc thời gian phiên đăng nhập hết hạn. Vui lòng truy cập <a
                                                        href="https://mydas.life/add-account-tool-telegram.php"
                                                        target="_blank">https://mydas.life/add-account-tool-telegram.php</a>
                                                    sang Tab Xác thực tài khoản, nhập Số điện thoại cần xác thực/ đăng
                                                    nhập lại sau đó nhấn Xác thực
                                                </p>
                                                <p>
                                                    <img src="../assets/media/howtouse/authaccount.jpg"
                                                        alt="Lỗi hết phiên đăng nhập" width="800"
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
        </div>
    </div>
</div>
<!-- end:: Notification -->
<?php include 'footer.php';?>