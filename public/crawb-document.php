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
                        <a href="crawb-status.php" class="kt-subheader__breadcrumbs-home"><i
                                class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="crawb-document.php" class="kt-subheader__breadcrumbs-link">
                            Crawl website </a>
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
                                    <i class="flaticon-interface-11"></i>Tài liệu hướng dẫn Crawl website
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
                                        <fieldset class="collapsible collapsed collapse-processed"><strong>I. HƯỚNG DẪN
                                                CẤU HÌNH
                                                WEBSITE DASHBOARD</strong>
                                            <div class="fieldset-wrapper">
                                                <p class="rtejustify">- Truy cập vào đường dẫn
                                                    <a href="https://mydas.life/crawb-status.php"
                                                        target="_blank">https://mydas.life/crawb-status.php</a></p>
                                                <p class="rtejustify">- Giao diện website</p>
                                                <img src="../assets/media/howtouse/giao-dien-trang-quan-ly.png"
                                                    alt="Giao diện website trang quản lí dashboard" width="800"
                                                    style="display: block; margin-left: auto; margin-right: auto;">
                                                <p class="rtejustify">- Để thêm mới một website để crawl dữ liệu truy
                                                    cập vào đường dẫn <a href="https://mydas.life/crawb-datasource.php"
                                                        target="_blank">https://mydas.life/crawb-datasource.php</a>.
                                                    Xuất hiện form đăng kí thông tin</p>
                                                <ol>
                                                    <li>Tên nguồn website: Tên của website cần lấy dữ liệu. </li>
                                                    <li>Ghi chú</li>
                                                    <li>Cấu hình lưu tin: Chọn cấu hình lưu tin. Click vào
                                                        dấu mũi tên để xem danh sách cấu hình website đã thêm. Truy cập
                                                        đường
                                                        dần <a href="https://mydas.life/crawb-config.php"
                                                            target="_blank">https://mydas.life/crawb-config.php</a> để
                                                        thêm mới cấu hình lưu tin</li>
                                                    <li>ID Chuyên mục: Số ID của chuyên mục muốn đăng tin.
                                                        Để xem danh sách chuyên mục của website và mã định danh ID, ta
                                                        vào đường dẫn: URL website lưu tin +
                                                        "/wp-json/wp/v2/categories", chọn duy
                                                        nhất một mã id cần thêm. (Nếu xuất hiện thông báo lỗi, đăng nhập
                                                        vào đường
                                                        dẫn: URL website lưu tin + "/wp-admin" sau đó tải lại trang.
                                                        Ngoài ra có
                                                        thể truy cập vào database website dùng để đăng tin xem tại table
                                                        'wp_terms'</li>
                                                    <li>ID Tác giả đăng bài: Số ID của user dùng để đăng
                                                        tin. Để xem danh sách user của website và mã định danh ID, ta
                                                        vào đường dẫn: URL website lưu tin + "/wp-json/wp/v2/users",
                                                        chọn duy nhất một
                                                        mã id cần thêm. (Nếu xuất hiện thông báo lỗi, đăng nhập vào
                                                        đường dẫn: URL
                                                        website lưu tin + "/wp-admin" sau đó tải lại trang. Ngoài ra có
                                                        thể truy cập
                                                        vào database website dùng để đăng tin xem tại table 'wp_users'
                                                    </li>
                                                    <li>Xóa liên kết: Xóa tất cả các liên kết có trong bài viết lấy tin.
                                                        Click tích để đồng ý xóa liên kết có trong bài viết.
                                                    </li>
                                                    <li>Lưu ảnh: Lưu và thay đổi đường dẫn tất
                                                        cả các ảnh có trong bài viết.
                                                        Nếu sử dụng cấu hình lưu tin là lưu trực tiếp vào database thì
                                                        hình ảnh trong bài viết sẽ được lưu ở
                                                        thư mục uploads của trang quản lý, nếu sử dụng cấu hình lưu tin
                                                        là sử dụng rest api thì hình ảnh sẽ được lưu ở thư mục
                                                        wp-content/uploads của wordpress.
                                                        Click tích để đồng ý lưu ảnh.
                                                    </li>
                                                    <li>Đường dẫn nguồn tin : URL website cần
                                                        lấy dữ liệu
                                                    </li>
                                                    <li>Loại phân trang: Loại phân trang của website cần lấy dữ liệu.
                                                        Gồm 2 loại
                                                        <ol type="a">
                                                            <li> Scroll - Cuộn trang. Số trang là một số nguyên đại diện
                                                                cho số lượng trang cần lấy dữ liệu. Đối với
                                                                một số website tải trang khi nhấn nút "LoadMore" hoặc
                                                                "Xem thêm" ta
                                                                cần lấy vị trí selector của nút LoadMore. Trường
                                                                "SelectorLoadMore"
                                                                không bắt buộc
                                                            </li>
                                                            <li> Đánh số: Bài viết được phân thành từng trang riêng
                                                                biệt, ví dụ: page/1, ?page=1,… Danh sách các trang được
                                                                phân
                                                                biệt bằng dấu phẩy ‘,’.</li>
                                                        </ol>
                                                    </li>
                                                    <li>Đường dẫn( Vị trí) lấy danh sách: Đường dẫn dùng để
                                                        lấy danh sách bài viết có trong website. Có 2 loại đường dẫn là
                                                        Selector và Xpath. Cách để lấy đường dẫn xem tại mục II.
                                                        <ol type="a">
                                                            <li>Đường dẫn(Vị trí) lấy chi tiết: Đường
                                                                dẫn để lấy các mục nội dung. Mặc định sẽ có 2 mục sẵn là
                                                                Title là tiêu đề
                                                                bài viết đó và Summary là nội dung bài viết sẽ lấy và
                                                                hiển thị. Có 2 kiểu
                                                                lấy vị trí là Selector và Xpath</li>
                                                            <li>Thay thế bằng Text: Dùng để thay thế
                                                                nội dung bài
                                                                viết lấy được. Nội dung bài viết có chuỗi cần thay sẽ
                                                                được thay
                                                                bằng chuỗi
                                                                nhập vào. Click vào dấu + để thêm nhiều mục</li>
                                                            <li>Thay thế bằng đường dẫn: Được sử dụng
                                                                để thay đổi nội dung của một đoạn nội dung thông qua
                                                                đường dẫn. Ví dụ thay
                                                                đổi cụm văn bản đầu tiên của tất cả bài viết bằng nội
                                                                dung nhập vào. Ngoài
                                                                ra mục này còn được sử dụng để xóa một số nội dung không
                                                                mong muốn như
                                                                quảng cáo, nguồn bài viết, tác giả,… Click vào dấu + để
                                                                thêm nhiều mục.</li>
                                                            <li>Nhấn Thêm mới để lưu thông tin vừa
                                                                nhập</li>
                                                        </ol>
                                                    </li>
                                                </ol>
                                                <p class="rtejustify"> - Để thêm mới cấu hình website để đăng bài viết
                                                    ta truy cập vào đường dẫn <a
                                                        href="https://mydas.life/crawb-config.php"
                                                        target="_blank">https://mydas.life/crawb-config.php</a>, xuất
                                                    hiện form tạo mới. </p>
                                                <img src="../assets/media/howtouse/Form-them-moi-cau-hinh-luu-tru.png"
                                                    alt="Thêm mới cấu hình" width="800"
                                                    style="display: block; margin-left: auto; margin-right: auto;">
                                                <p> + Tùy chọn cấu hình lưu tin. Có 2 phương
                                                    thức dùng để lưu tin</p>
                                                <ul>
                                                    <li> Sử dụng Wordpress REST API</li>
                                                    <li> Lưu trực tiếp vào DATABASE</li>
                                                </ul>
                                                <ol type="a">
                                                    <li>Đối với phương thức sử dụng Wordpress
                                                        REST API ta cần các trường sau:</li>
                                                    <ol type="1">
                                                        <li>Tên cấu hình</li>
                                                        <li>Đường dẫn website dùng để lưu
                                                            tin</li>
                                                        <li>Tên đăng nhập: Tài khoản dùng
                                                            để kết nối vào trang
                                                            quản lí website đăng bài viết</li>
                                                        <li>Mật khẩu</li>
                                                        <li>Nhấn Thêm mới để lưu thông tin
                                                            vừa nhập</li>
                                                    </ol>
                                                    <li>Đối với phương thức sử dụng lưu trực
                                                        tiếp vào DATABASE ta cần các trường sau:</li>
                                                    <p>
                                                        <img src="../assets/media/howtouse/insert-db.png"
                                                            alt="Ví dụ sử dụng Selector" width="800"
                                                            style="display: block; margin-left: auto; margin-right: auto;">
                                                    </p>
                                                    <ol type="1">
                                                        <li>Tên cấu hình</li>
                                                        <li>Đường dẫn website chạy tool:
                                                            là địa chỉ chạy trang quản lí, địa chỉ này được sử dụng để
                                                            lưu ảnh
                                                        </li>
                                                        <li>Địa chỉ database: Địa chỉ kết
                                                            nối database</li>
                                                        <li>Tên database: Tên database sử
                                                            dụng để lưu bài biết. Sử dụng database của website wordpress
                                                        </li>
                                                        <li>Tên đăng nhập: Tài khoản dùng
                                                            để kết nối database</li>
                                                        <li>Mật khẩu</li>
                                                        <li>Nhấn Thêm mới để lưu thông tin
                                                            vừa nhập</li>
                                                    </ol>
                                                </ol>
                                                <p class="rtejustify">&emsp;- Để xem trạng thái các website đang lấy
                                                    tin, truy cập vào đường dẫn <a
                                                        href="https://mydas.life/crawb-status.php"
                                                        target="_blank">https://mydas.life/crawb-status.php</a>, một
                                                    danh sách các website đang lấy tin sẽ xuất hiện
                                                </p>
                                                <ol type="1">
                                                    <li>Tên Website: Tên website lấy tin, click
                                                        vào website để
                                                        xem chi tiết thông tin cấu hình nguồn lấy dữ liệu và danh sách
                                                        bài
                                                        viết của
                                                        website đó</li>
                                                    <li>Trạng thái: Stop hoặc Running</li>
                                                    <li>Hành động</li>
                                                    <ul>
                                                        <li>Edit: Chỉnh sửa thông tin cấu hình
                                                            nguồn lấy dữ
                                                            liệu</li>
                                                        <li>Delete: Xóa cấu hình website nguồn
                                                            lấy dữ liệu
                                                        </li>
                                                        <li>Stop: Dừng quét dữ liệu</li>
                                                        <li>Running: Tiến hành chạy quét dữ
                                                            liệu. Chọn kiểu
                                                            thời gian lấy tin</li>
                                                            <ol type="a">
                                                                <li>Daily: Tự động quét dữ liệu
                                                                    sau mỗi N
                                                                    giờ, với N là số giờ tự đọng chạy do người dùng nhập vào.</li>
                                                                <li>Date to Date: Sẽ tự động quét
                                                                    dữ liệu vào
                                                                    lúc 23h30p hằng ngày từ ngày Bắt đầu đến ngày Kết thúc.</li>
                                                            </ol>
                                                    </ul>
                                                    <p>
                                                        <img src="../assets/media/howtouse/giao-dien-trang-quan-ly.png"
                                                            alt="Thêm mới cấu hình" width="800"
                                                            style="display: block; margin-left: auto; margin-right: auto;">
                                                    </p>
                                                </ol>
                                            </div>
                                        </fieldset>
                                        <fieldset class="collapsible collapsed collapse-processed"><strong>II. CÁCH XÁC
                                                ĐỊNH VỊ TRÍ
                                                BẰNG SELECTOR HOẶC XPATH</strong>
                                            <div class="fieldset-wrapper">
                                                <p class="rtejustify"> - Truy cập vào website cần lấy dữ liệu. Ở đây ta
                                                    ví dụ
                                                    website: http://cafef.vn/thi-truong.chn
                                                    - Cấu hình lấy danh sách – Đường dẫn: Tại website ta nhấn chuột phải
                                                    chọn
                                                    Inspect -> Mục Elements -> chọn danh sách bài viết rồi click chuột
                                                    phải -> Copy
                                                    -> copy Selector hoặc Copy Xpath
                                                </p>
                                                <p class="rtejustify">&emsp;&emsp;Ví dụ: Đối với trang website ví dụ
                                                    trên ta cần lấy
                                                    danh sách bài viết có id=”LoadListNewsCat”, mỗi bài viết được gắn
                                                    trong thẻ li
                                                    nên ta có Selector như sau: “#LoadListNewsCat > li”, tương tự với
                                                    Xpath ta được
                                                    “//*[@id="LoadListNewsCat"]/li”</p>
                                                <p class="rtejustify"> - Cấu hình – Lấy chi tiết: Chọn một bài đăng cụ
                                                    thể, ta làm
                                                    tương tự như trên: Inspect -> Chọn dấu mũi tên như hình</p>
                                                <p>
                                                    <img src="../assets/media/howtouse/elements.png"
                                                        alt="Ví dụ sử dụng Selector" width="800"
                                                        style="display: block; margin-left: auto; margin-right: auto;">
                                                </p>
                                                <p class="rtejustify">&emsp;&emsp;Sau đó ta rê chuột vào vị trí cần lấy
                                                    dữ liệu,
                                                    bảng Elements sẽ tự động di chuyển đến vị trí cần lấy đường dẫn. Sau
                                                    đó trong
                                                    bảng Elements click chuột phải -> copy -> Copy Selector hoặc copy
                                                    Xpath</p>
                                                <p class="rtejustify">&emsp;&emsp;Ví dụ:</p>
                                                <p class="rtejustify"> &emsp;+ Tiêu đề bài viết:</p>
                                                <p class="rtejustify"> &emsp;&emsp;Selector: “#form1 > div:nth-child(2)
                                                    >
                                                    div.adm-mainsection.clearfix > div:nth-child(5) > div >
                                                    div.left_cate.totalcontentdetail > h1” </p>
                                                <p class="rtejustify"> &emsp;&emsp;Xpath:
                                                    //*[@id="form1"]/div[2]/div[4]/div[5]/div/div[1]/h1 </p>
                                                <p>
                                                    <img src="../assets/media/howtouse/vidu.png"
                                                        alt="Ví dụ sử dụng Selector" width="800"
                                                        style="display: block; margin-left: auto; margin-right: auto;">
                                                </p>
                                                <p class="rtejustify"> &emsp;+ Nội dung bài viết:</p>
                                                <p class="rtejustify"> &emsp;&emsp;Selector: #form1 > div:nth-child(2) >
                                                    div.adm-mainsection.clearfix > div:nth-child(5) > div >
                                                    div.left_cate.totalcontentdetail > div.w640.fr.clear</p>
                                                <p class="rtejustify">&emsp;&emsp;Xpath:
                                                    //*[@id="form1"]/div[2]/div[4]/div[5]/div/div[1]/div[4]</p>
                                                <p class="rtejustify"> &emsp;+ Đối với đường dẫn nội dung bài viết này,
                                                    một số
                                                    trường không mong muốn như mục tin mới, các từ khóa, button like
                                                    share,…. Để
                                                    khắc phục điểm này ta cần xóa các đường dẫn này đi. Cụ thể như sau:
                                                    Rê chuột
                                                    chọn đường dẫn các mục cần xóa, ví dụ ta cần xóa cụm từ khóa sau mỗi
                                                    bài viết,
                                                    ta click chuột vào ô từ khóa, chọn copy -> copy selector hoặc copy
                                                    xpath sau đó
                                                    điền vào trường thay thế bằng đường dẫn -> đường dẫn cần thay.</p>
                                                <p>
                                                    <img src="../assets/media/howtouse/vidu2.png"
                                                        alt="Ví dụ sử dụng Selector" width="800"
                                                        style="display: block; margin-left: auto; margin-right: auto;">
                                                </p>
                                            </div>
                                        </fieldset>
                                        <fieldset class="collapsible collapsed collapse-processed"><strong>III. CÁCH CẤU
                                                HÌNH
                                                WEBSITE LƯU TIN</strong>
                                            <div class="fieldset-wrapper">
                                                <p class="rtejustify"> - Đối với phương thức lưu tin sử dụng REST API ta
                                                    sử dụng phương thức xác thực Basic
                                                    Authentication (Xác thực bằng username và password) cho trang
                                                    website lưu tin. Nếu website lưu tin chưa
                                                    cài phương thức xác thực,ta có thể cài đặt Plugin tại đây:
                                                    https://wordpress.org/plugins/wp-rest-api-authentication/ , sau đó
                                                    tại trang quản lí wp-admin chọn
                                                    miniOrange API Authentication, ở Tab Configure API Authentication
                                                    chọn Basic
                                                    Authentication, Basic Authentication Key Type = username:password ->
                                                    Save
                                                    Configuration</p>
                                                <p>
                                                    <img src="../assets/media/howtouse/auth.png" alt="Thêm mới cấu hình"
                                                        width="800"
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