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
                                <a class="nav-link active"  href="#kt_portlet_base_demo_1_1_tab_content" 
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
                                                <p class="rtejustify">- Truy cập vào đường dẫn trang quản lí dashboard.
                                                    Ví dụ:
                                                    http://sales68.com/ </p>
                                                <p class="rtejustify">- Giao diện website</p>
                                                <p>
                                                    <img src="../assets/media/howtouse/giao-dien-trang-quan-ly.png"
                                                        alt="Giao diện website trang quản lí dashboard" width="800"
                                                        style="display: block; margin-left: auto; margin-right: auto;">
                                                </p>
                                                <p class="rtejustify">- Để thêm mới một website để crawl dữ liệu ta
                                                    click tab “Nguồn
                                                    dữ liệu”, xuất hiện form tạo mới.
                                                    <p class="rtejustify">&emsp;+ Tên nguồn website: Tên của website cần
                                                        lấy dữ
                                                        liệu. </p>
                                                    <p class="rtejustify">&emsp;+ Ghi chú</p>
                                                    <p class="rtejustify">&emsp;+ Cấu hình lưu tin: Chọn cấu hình lưu
                                                        tin. Click vào
                                                        dấu mũi tên để xem danh sách cấu hình website đã thêm. Click vào
                                                        tab "Cấu
                                                        hình" để thêm mới cấu hình lưu tin</p>
                                                    <p class="rtejustify">&emsp;+ ID Chuyên mục: Số ID của chuyên mục
                                                        muốn đăng tin.
                                                        Để xem danh sách chuyên mục của website và mã định danh ID, ta
                                                        vào đường
                                                        dẫn: URL website lưu tin + "/wp-json/wp/v2/categories", chọn duy
                                                        nhất một mã
                                                        id cần thêm. (Nếu xuất hiện thông báo lỗi, đăng nhập vào đường
                                                        dẫn: URL
                                                        website lưu tin + "/wp-admin" sau đó tải lại trang. Ngoài ra có
                                                        thể truy cập vào database website dùng để đăng tin xem tại table
                                                        'wp_terms'</p>
                                                    <p class="rtejustify">&emsp;+ ID Tác giả đăng bài: Số ID của user
                                                        dùng để đăng
                                                        tin. Để xem danh sách user của website và mã định danh ID, ta
                                                        vào đường dẫn:
                                                        URL website lưu tin + "/wp-json/wp/v2/users", chọn duy nhất một
                                                        mã id cần
                                                        thêm. (Nếu xuất hiện thông báo lỗi, đăng nhập vào đường dẫn: URL
                                                        website lưu
                                                        tin + "/wp-admin" sau đó tải lại trang. Ngoài ra có thể truy cập
                                                        vào database website dùng để đăng tin xem tại table 'wp_users'
                                                    </p>
                                                    <p class="rtejustify">&emsp;+ Xóa liên kết: Xóa tất cả các liên kết
                                                        có trong bài viết lấy tin.
                                                        Click tích để đồng ý xóa liên kết có trong bài viết.
                                                    </p>
                                                    <p class="rtejustify">&emsp;+ Lưu ảnh: Lưu và thay đổi đường dẫn tất
                                                        cả các ảnh có trong bài viết.
                                                        Nếu sử dụng cấu hình lưu tin là lưu trực tiếp vào database thì
                                                        hình ảnh trong bài viết sẽ được lưu ở
                                                        thư mục uploads của trang quản lý, nếu sử dụng cấu hình lưu tin
                                                        là sử dụng rest api thì hình ảnh sẽ được lưu ở thư mục
                                                        wp-content/uploads của wordpress.
                                                        Click tích để đồng ý lưu ảnh.
                                                    </p>
                                                    <p class="rtejustify">&emsp;+ Đường dẫn nguồn tin : URL website cần
                                                        lấy dữ liệu
                                                    </p>
                                                    <p class="rtejustify">&emsp;+ Loại phân trang: Loại phân trang của
                                                        website cần
                                                        lấy dữ liệu. Gồm 2 loại
                                                        <p class="rtejustify">&emsp;&emsp;* Scroll: Cuộn trang. Số trang
                                                            là một số
                                                            nguyên đại diện cho số lượng trang cần lấy dữ liệu. Đối với
                                                            một số
                                                            website tải trang khi nhấn nút "LoadMore" hoặc "Xem thêm" ta
                                                            cần lấy vị
                                                            trí selector của nút LoadMore. Trường "SelectorLoadMore"
                                                            không bắt buộc
                                                        </p>
                                                        <p class="rtejustify">&emsp;&emsp;* Đánh số: Bài viết được phân
                                                            thành từng
                                                            trang riêng biệt, ví dụ: page/1, ?page=1,… Danh sách các
                                                            trang được phân
                                                            biệt bằng dấu phẩy ‘,’.</p>
                                                    </p>
                                                    <p class="rtejustify">&emsp;+ Đường dẫn(Vị trí) lấy danh sách: Đường
                                                        dẫn dùng để
                                                        lấy danh sách bài viết có trong website. Có 2 loại đường dẫn là
                                                        Selector và
                                                        Xpath. Cách để lấy đường dẫn xem tại mục II.</p>
                                                    <p class="rtejustify">&emsp;+ Đường dẫn(Vị trí) lấy chi tiết: Đường
                                                        dẫn để lấy
                                                        các mục nội dung. Mặc định sẽ có 2 mục sẵn là Title là tiêu đề
                                                        bài viết đó
                                                        và Summary là nội dung bài viết sẽ lấy và hiển thị. Có 2 kiểu
                                                        lấy vị trí là
                                                        Selector và Xpath</p>
                                                    <p class="rtejustify">&emsp;+ Thay thế bằng Text: Dùng để thay thế
                                                        nội dung bài
                                                        viết lấy được. Nội dung bài viết có chuỗi cần thay sẽ được thay
                                                        bằng chuỗi
                                                        nhập vào. Click vào dấu + để thêm nhiều mục</p>
                                                    <p class="rtejustify">&emsp;+ Thay thế bằng đường dẫn: Được sử dụng
                                                        để thay đổi
                                                        nội dung của một đoạn nội dung thông qua đường dẫn. Ví dụ thay
                                                        đổi cụm văn
                                                        bản đầu tiên của tất cả bài viết bằng nội dung nhập vào. Ngoài
                                                        ra mục này
                                                        còn được sử dụng để xóa một số nội dung không mong muốn như
                                                        quảng cáo, nguồn
                                                        bài viết, tác giả,… Click vào dấu + để thêm nhiều mục.</p>
                                                    <p class="rtejustify">&emsp;+ Nhấn Thêm mới để lưu thông tin vừa
                                                        nhập</p>
                                                </p>
                                                <p class="rtejustify"> - Để thêm mới cấu hình website để đăng bài viết
                                                    ta click tab
                                                    “Cấu hình”, xuất hiện form tạo mới. </p>
                                                <p>
                                                    <img src="../assets/media/howtouse/Form-them-moi-cau-hinh-luu-tru.png"
                                                        alt="Thêm mới cấu hình" width="800"
                                                        style="display: block; margin-left: auto; margin-right: auto;">
                                                </p>
                                                <p class="rtejustify">&emsp;+ Tùy chọn cấu hình lưu tin. Có 2 phương
                                                    thức dùng để lưu tin</p>
                                                <p class="rtejustify">&emsp;&emsp;1. Sử dụng Wordpress REST API</p>
                                                <p class="rtejustify">&emsp;&emsp;2. Lưu trực tiếp vào DATABASE</p>
                                                <p class="rtejustify">&emsp;&emsp;Đối với phương thức sử dụng Wordpress
                                                    REST API ta cần các trường sau:</p>
                                                <p class="rtejustify">&emsp;&emsp;&emsp;+ Tên cấu hình</p>
                                                <p class="rtejustify">&emsp;&emsp;&emsp;+ Đường dẫn website dùng để lưu
                                                    tin</p>
                                                <p class="rtejustify">&emsp;&emsp;&emsp;+ Tên đăng nhập: Tài khoản dùng
                                                    để kết nối vào trang
                                                    quản lí website đăng bài viết</p>
                                                <p class="rtejustify">&emsp;&emsp;&emsp;+ Mật khẩu</p>
                                                <p class="rtejustify">&emsp;&emsp;&emsp;+ Nhấn Thêm mới để lưu thông tin
                                                    vừa nhập</p>
                                                <p class="rtejustify">&emsp;&emsp;Đối với phương thức sử dụng lưu trực
                                                    tiếp vào DATABASE ta cần các trường sau:</p>
                                                <p>
                                                    <img src="../assets/media/howtouse/insert-db.png"
                                                        alt="Ví dụ sử dụng Selector" width="800"
                                                        style="display: block; margin-left: auto; margin-right: auto;">
                                                </p>
                                                <p class="rtejustify">&emsp;&emsp;&emsp;+ Tên cấu hình</p>
                                                <p class="rtejustify">&emsp;&emsp;&emsp;+ Đường dẫn website chạy tool:
                                                    là địa chỉ chạy trang quản lí, địa chỉ này được sử dụng để lưu ảnh
                                                </p>
                                                <p class="rtejustify">&emsp;&emsp;&emsp;+ Địa chỉ database: Địa chỉ kết
                                                    nối database</p>
                                                <p class="rtejustify">&emsp;&emsp;&emsp;+ Tên database: Tên database sử
                                                    dụng để lưu bài biết. Sử dụng database của website wordpress</p>
                                                <p class="rtejustify">&emsp;&emsp;&emsp;+ Tên đăng nhập: Tài khoản dùng
                                                    để kết nối database</p>
                                                <p class="rtejustify">&emsp;&emsp;&emsp;+ Mật khẩu</p>
                                                <p class="rtejustify">&emsp;&emsp;&emsp;+ Nhấn Thêm mới để lưu thông tin
                                                    vừa nhập</p>
                                                <p class="rtejustify">&emsp;- Để xem trạng thái các website đang lấy
                                                    tin, click tab
                                                    "Trạng thái", một danh sách các website đang lấy tin sẽ xuất hiện
                                                </p>
                                                <p class="rtejustify">&emsp;+ Tên Website: Tên website lấy tin, click
                                                    vào website để
                                                    xem chi tiết thông tin cấu hình nguồn lấy dữ liệu và danh sách bài
                                                    viết của
                                                    website đó</p>
                                                <p class="rtejustify">&emsp;+ Trạng thái: Stop hoặc Running</p>
                                                <p class="rtejustify">&emsp;+ Hành động</p>
                                                <p class="rtejustify">&emsp;&emsp;* Edit: Chỉnh sửa thông tin cấu hình
                                                    nguồn lấy dữ
                                                    liệu</p>
                                                <p class="rtejustify">&emsp;&emsp;* Delete: Xóa cấu hình website nguồn
                                                    lấy dữ liệu
                                                </p>
                                                <p class="rtejustify">&emsp;&emsp;* Stop: Dừng quét dữ liệu</p>
                                                <p class="rtejustify">&emsp;&emsp;* Running: Tiến hành chạy quét dữ
                                                    liệu. Chọn kiểu
                                                    thời gian lấy tin</p>
                                                <p class="rtejustify">&emsp;&emsp;&emsp;-- Daily: Tự động quét dữ liệu
                                                    sau mỗi N
                                                    giờ, với N là số giờ tự đọng chạy do người dùng nhập vào.</p>
                                                <p class="rtejustify">&emsp;&emsp;&emsp;-- Date to Date: Sẽ tự động quét
                                                    dữ liệu vào
                                                    lúc 23h30p hằng ngày từ ngày Bắt đầu đến ngày Kết thúc.</p>
                                                <p>
                                                    <img src="../assets/media/howtouse/giao-dien-trang-quan-ly.png"
                                                        alt="Thêm mới cấu hình" width="800"
                                                        style="display: block; margin-left: auto; margin-right: auto;">
                                                </p>
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