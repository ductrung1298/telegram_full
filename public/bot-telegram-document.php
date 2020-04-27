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
                            Bot Telegram </a>
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
                                    <i class="flaticon-interface-11"></i>Tài liệu hướng dẫn bot telegram
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
                                                VỀ BOT TELEGRAM </strong>
                                            <div class="fieldset-wrapper">
                                                <p class="rtejustify">- Tool Bot Telegram là một công cụ giúp người dùng tạo mới và cấu hình một con BOT 
                                                trong Telegram nhằm mục đích tự động trả lời tin nhắn khi có người dùng trò chuyện.
                                            </div>
                                        </fieldset>
                                        <fieldset class="collapsible collapsed collapse-processed"><strong>II. THÊM MỚI BOT</strong>
                                            <div class="fieldset-wrapper">
                                                <p class="rtejustify">- Để thêm mới Bot Telegram và cấu hình cho nó, truy cập vào đường dẫn <a href="https://mydas.life/add-bot-telegram.php" target="_blank">https://mydas.life/add-bot-telegram.php</a>
                                                .Nếu chưa có Bot ta nhấn button Tạo mới BOT để tạo mới 1 bot, yêu cầu 2 trường là 
                                                tên hiển thị cho Bot và mã định danh username duy nhất cho bot, username bot phải kết thúc bằng kí tự "bot"
                                                . Nếu bạn đã tạo sẵn Bot và muốn cấu hình cho nó, vui lòng nhắn tin cho Bot Father yêu cầu lấy Token cho Bot bạn cầu cấu hình,
                                                sau đó nhấn button Nhập mã Token và nhấn nút thêm mới. 
                                                </p>
                                            </div>
                                        </fieldset>
                                        <fieldset class="collapsible collapsed collapse-processed"><strong>III. CẤU HÌNH BOT
                                            </strong>
                                            <div class="fieldset-wrapper">
                                                <p class="rtejustify">- Chọn Bot cần cấu hình sau đó nhấn Cấu hình. Tab Cấu hình Bot lưu thông tin giao tiếp giữa người dùng và bot. Tab Forward 
                                                tin nhắn dùng để tự động forward tin nhắn/ bài viết từ Channel này đến Group hoặc Channel khác. Tab Danh sách lệnh dùng để cấu hình các lệnh cho bot.
                                                </p>
                                            </div>
                                            <ol type="1">
                                                    <li>Cấu hình BOT
                                                        <ol type="a">
                                                            <li>Lời chào khi đăng kí kênh: Tin nhắn trả về khi có người dùng bắt đầu cuộc trò chuyện với Bot. Nhấn dấu + để thêm tin nhắn mới</li>
                                                            <li>Tin nhắn danh sách kênh kết nối: Mặc định khi người dùng bắt đầu cuộc trò chuyện với bot, bot sẽ trả về 2 button gợi ý
                                                            tin nhắn đó là Danh sách kênh kết nối và báo cáo. Thay đổi trường này để đặt lại text cho button danh sách kênh kết nối</li>
                                                            <li>Đính kèm danh sách kết nối cộng đồng: Chọn tích để khi người dùng đăng kí kênh sẽ gửi luôn thông tin các kênh liên hệ
                                                                <ul>
                                                                    <li>Text hiển thị: Text của button </li>
                                                                    <li>Đường dẫn: Link đính kèm của button</li>
                                                                    <img src="../assets/media/howtouse/danhsachketnoi.jpg"
                                                                        alt="Danh sách kết nối cộng đồng" width="200"
                                                                        style="display: block; margin-left: auto; margin-right: auto;">
                                                                </ul>
                                                            </li>
                                                            <li>Hẹn giờ tự động gửi tin nhắn: Tự động gửi tin nhắn sau thời gian bao nhiêu ngày kể từ ngày người dùng đăng kí kênh
                                                                <ul>
                                                                    <li>Nội dung tin nhắn
                                                                    </li>
                                                                    <li>Đính kèm danh sách button liên kết. Nhấn tích để cấu hình list các button liên kết</li>
                                                                    <li>Thời gian gửi tin: Sau bao nhiều ngày tính từ thời điểm người dùng đăng kí kênh. Thời gian gửi tin</li>
                                                                </ul>
                                                            </li>
                                                            <li>List Button Inline: Mặc định khi người dùng bắt đầu cuộc trò chuyện với bot, bot sẽ trả về 2 button gợi ý
                                                            tin nhắn đó là Danh sách kênh kết nối và báo cáo. Để thêm các button mới, ta chọn text hiển thị của button và chỉ định ID người dùng hiển thị, mặc định 0 sẽ hiển thị tất cả, có thể chọn nhiều id người dùng hiển thị, ngăn cách bởi dấu phẩy
                                                                <img src="../assets/media/howtouse/button_inline.jpg"
                                                                        alt="Danh sách kết nối cộng đồng" width="400"
                                                                        style="display: block; margin-left: auto; margin-right: auto;">
                                                            </li>
                                                            <li>Text button Báo cáo: Text hiển thị cho button báo cáo khi người dùng đăng kí kênh thành công. 
                                                            </li>
                                                            <li>Chỉ định người dùng được nhấn báo cáo: Chỉ cho phép 1 số người được phép nhấn báo cáo. Mặc định 0 sẽ là tất cả người dùng đều được sử dụng, để chọn nhiều người ngăn cách nhau bởi dấu phẩy
                                                            </li>
                                                        </ol>
                                                    </li>
                                                    <li>Forward Tin nhắn: Để forward được tin nhắn Bot phải tham gia vào trong group hoặc channel đó
                                                        <ol type="a">
                                                            <li>Kiểu: Tin nhắn từ Channel đến Group hoặc từ Channel đến Channel
                                                            </li>
                                                            <li>From: Username của Channel. Xem chi tiết thông tin Channel, ở mục link Channel sẽ có cấu trúc t.me/username_của_channel. 
                                                            <img src="../assets/media/howtouse/usernamechannel.jpg"
                                                                        alt="Username của Channel" width="400"
                                                                        style="display: block; margin-left: auto; margin-right: auto;">
                                                            </li>
                                                            <li>To: Nếu đích đến là Channel thì giá trị trường này là Username của Channel cần forward tin nhắn đến (Username channel lấy như trên).
                                                            Nếu đích đến là Group thì giá trị trường này là ID của group cần forward. Thêm bot vào Group đích đến sau đó nhắn /idgroup để lấy ID group chat. ID group chat sẽ là số nguyên âm 
                                                            </li>
                                                            <li>Số kí tự xuống dòng - Điều kiện để forward/send tin nhắn: Nếu tin nhắn từ Channel From 
                                                            có số kí tự xuống dòng lớn hơn hoặc bằng số kí tự xuống dòng cấu hình thì Bot sẽ thực hiện forward/send tin nhắn
                                                            </li>
                                                            <li>Kiểu: Forward hoặc Copy và Gửi tin nhắn
                                                            </li>
                                                        </ol>
                                                    </li>
                                                    <li>Danh sách lệnh
                                                        <ol type="a">
                                                            <li>Câu lệnh</li>
                                                            <img src="../assets/media/howtouse/caulenh.jpg"
                                                                        alt="Câu lệnh" width="600"
                                                                        style="display: block; margin-left: auto; margin-right: auto;">
                                                            <li>Trả lời: Nội dung tin nhắn Bot trả lời. Để get dữ liệu từ API sau đó trả về cho người dùng ta sử dụng dấu nhắc {api: "đường dẫn api"}, Bot sẽ get API sau đó thay thế dấu nhắc {api} bằng dữ liệu trả về từ API</li>
                                                            <img src="../assets/media/howtouse/hello.jpg"
                                                                        alt="/Hello" width="400"
                                                                        style="display: block; margin-left: auto; margin-right: auto;">
                                                            <li>Button Link đính kèm: Danh sách các button đính kèm khi trả lời người dùng. Cần nhập tên hiển thị và đường dẫn cần đính kèm</li> 
                                                        </ol>
                                                    </li>
                                            </ol>
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