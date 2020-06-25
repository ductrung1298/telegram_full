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
                                                <p>- Tool Telegram là một công cụ nhằm giúp hỗ trợ
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
                                        </fieldset>
                                        <fieldset class="collapsible collapsed collapse-processed"><strong>II. ĐĂNG KÍ
                                                VÀ ỦY
                                                QUYỀN ỨNG DỤNG </strong>
                                                <p class="rtejustify">- Để sử dụng được tool này ta cần lấy mã API_ID và
                                                    API_HASH của tài khoản mình.
                                                    Ta vào địa chỉ: <a
                                                        href="https://my.telegram.org/auth" target="_blank"><b>https://my.telegram.org/auth</b></a>
                                                    sau đó nhập số điện thoại đăng nhập. Một
                                                    mã xác thực sẽ được gửi đến ứng dụng của bạn. Sau khi đăng nhập
                                                    thành
                                                    công ta chọn "<b>API development tools</b>", điền vào biểu mẫu
                                                    các thông tin như tiêu đề ứng dụng, nền tảng chạy là Web, địa chỉ website chạy ứng dụng là https://mydas.life, nếu 
                                                    hệ thống báo lỗi thì hãy load lại trang và thay đổi tên các giá trị, ta
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
                                                        href="https://mydas.life/add-account-tool-telegram.php" target="_blank"><b>https://mydas.life/add-account-tool-telegram.php</b></a>
                                                    vào tab Đăng kí tài khoản, ta nhập <b>Số điện thoại, API_ID,
                                                        API_HASH</b> vừa lấy được ở bước trên, sau đó nhấn nút Thêm mới.
                                                    Mã
                                                    code <b>OTP</b> sẽ được gửi đến ứng dụng của bạn(khoảng 5s),
                                                    Điền mã OTP vào trường OPT Code, sau đó nhấn nút Thêm mới.
                                                </p>
                                        </fieldset>
                                        <fieldset class="collapsible collapsed collapse-processed"><strong>III. QUẢN LÍ TỆP KHÁCH HÀNG
                                            </strong>
                                                <ul>
                                                    <li> Để quản lí nhiều khách hàng khác nhau ta thêm danh sách người dùng đó vào các tệp khách hàng để quản lí</li>
                                                    <li>Để tạo mới tệp khách hàng ta nhấn button Thêm tệp khách hàng
                                                    </li>
                                                    <li>Để thêm mới người dùng vào tệp khách hàng ta có thể thêm người dùng bằng tay hoặc định dạng file có đuôi CSV, chọn
                                                    tệp khách hàng cần thêm vào. Để thêm danh sách người dùng đó đồng thời làm bạn bè Telegram ta click vào thêm bạn bè Telegram sau đó chọn tài 
                                                    khoản cần thêm</li>
                                                    <li>Để chỉnh sửa thông tin người dùng trong tệp khách hàng ta chọn xem thêm để chỉnh sửa thông tin chi tiết của người dùng đó.</li>
                                                    <li>Để thêm danh sách người dùng trong danh bạ vào bạn bè Telegram ta chọn Hành động Thêm làm bạn bè Telegram sau đó nhấn thực hiện</li>
                                                    <li>Để mời danh sách người dùng trong danh bạ vào nhóm chat trên Telegram ta chọn Hành động Mời vào nhóm Telegram, sau đó chọn tài khoản 
                                                    Telegram sử dụng để thêm vào group chat và group đích cần thêm. Chỉ có thể thêm những người dùng đã là bạn bè trên Telegram trước đó.</li>
                                                </ul>
                                        </fieldset>
                                        <fieldset class="collapsible collapsed collapse-processed"><strong>IV. GỬI TIN NHẮN
                                            </strong>
                                                <ul>
                                                    <li>Để gửi tin nhắn ta chọn tài khỏa cần thao tác sau đó nhấn Chi tiết, tại Tab Gửi tin nhắn: Ta có thể gửi tin nhắn đến bạn bè Telegram, đến người dùng có liên hệ Telegram trong tệp khách hàng 
                                                    hoặc gửi tin nhắn đến group chat</li>
                                                    <li>Có 2 kiểu gửi tin nhắn là gửi 1 lần hoặc gửi theo chu kì
                                                            <ol type="1">
                                                                <li>Gửi 1 lần: Hẹn giờ gửi tin</li>
                                                                <li>Gửi theo chu kì: Tự động gửi tuần hoàn sau bao nhiều giờ hoặc 
                                                                tự động gửi tuần hoàn vào lúc mấy giờ và thời gian bắt đầu và kết thúc việc gửi tin 
                                                                </li>
                                                            </ol>
                                                    </li>
                                                    <li>Nhấn Now để gửi ngay không hẹn giờ</li>
                                                    <li>Chọn tài khoản cần gửi tin nhắn đến, sau đó soạn nội dung cần gửi và nhấn Gửi đển gửi tin</li>
                                                </ul>
                                        </fieldset>
                                        <fieldset class="collapsible collapsed collapse-processed"><strong>V. NHÓM CHAT TELEGRAM
                                            </strong>
                                            <ul>
                                                <li>Chức năng này chứa thông tin liên quan đến các nhóm chat mà user đó đã tham gia trên Telegram</li>
                                                <li>Để xem danh sách nhóm chat đã tham gia ta chọn tài khoản cần thao tác sau đó nhấn Chi tiết, chuyển Tab Danh sách 
                                                group chat để xem danh sách group chat mà tài khoản đó đã tham gia hoặc tại thành Menu chọn Tool Telegram -> Danh sách group chat </li>
                                                <li>Chuyển user từ group này sang group khác: Chọn user nguồn cần lấy user để chuyển, sau đó nhấn button Chuyển user 
                                                sang nhóm khác, chọn tài khoản để thêm vào nhóm và group đích, sau đó nhấn Submit. </li>
                                                <li>Nhằm tránh tình trạng spam người dùng, mỗi tài khoản chỉ được phép mời 45 người dùng vào nhóm và chỉ mời 
                                                những người dùng có username, sau đó sẽ sleep trong vòng 24h. Để quá trình chuyển user nhanh chóng, ta nên add nhiều tài khoản để
                                                chạy luân phiên</li>
                                                <li>Để nhắn tin đến tất cả người dùng trong nhóm chat, ta chọn Nhắn tin user trong group, sau đó chọn tài khoản để nhắn tin. Những tài khoản này sẽ luân phiên 
                                                nhắn tin khi có lỗi xảy ra, sau đó chọn người dùng cần nhắn tin</li>
                                            </ul>
                                        </fieldset>
                                        <fieldset class="collapsible collapsed collapse-processed"><strong>VI. MỘT SỐ
                                                LỖI
                                                THƯỜNG GẶP </strong>
                                                <p>
                                                    <img src="../assets/media/howtouse/errorlogin.jpg"
                                                        alt="Lỗi hết phiên đăng nhập" width="800"
                                                        style="display: block; margin-left: auto; margin-right: auto;">
                                                </p>
                                                <p>- Lỗi không thể đăng nhập vào tài khoản: Lỗi này
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
                                        </fieldset>
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
<?php include 'footer.php';?>