<?php 
    include 'header.php';
?>
<div class="jumbotron">
  <h1 class="display-4 text-center">Chào mừng đến với Mydas.Life</h1>
  <p class="lead text-center">Mydas.Life là một website dành riêng cho người dùng <a href="https://mydas.group" target="_blank">MyDas.Group</a> với mục đích xây dựng những công cụ hỗ trợ người dùng marketing tiếp thị và 
  thu thập dữ liệu người dùng một cách tự động trên ứng dụng nhắn tin Telegram</p>
  <hr class="my-4">
  <p> 
    - Các chức năng chính của Mydas.Life
  </p>
  <ul>
    <li>Crawler Website - Thu thập dữ liệu website: Người dùng cấu hình nguồn địa chỉ website cần lấy bài viết, đích dữ liệu cần đăng tải 
    và nội dung bài viết cần lấy. Khi website nguồn có bài viết mới, website sẽ tự động đăng bài viết mới đến địa chỉ đích mà người 
    dùng đã cấu hình trước đó. Đây là một hình thức thu thập bài viết mới tự động từ nhiều trang khác nhau nhằm giảm tránh công việc thủ công phải đi copy bài 
    viết mới từ các website khác.
    </li>
    <li>Tool Telegram: Là một tool được xây dựng trên nền tảng ứng dụng nhắn tin TELEGRAM nhiều tài khoản với mục đích thu thập thông tin người dùng, nhóm chat hỗ trợ cho marketing. 
    Các chức năng chính sau khi đăng nhập tài khoản Telegram:
        <ol type="i">
          <li>Tệp khách hàng: Người dùng thu thập thông tin số điện thoại khách hàng từ file CSV, sau đó lưu thông tin thành nhóm người dùng và thêm nhóm người dùng đó 
          làm bạn bè Telegram.</li>
          <li>Group chat: Hiển thị danh sách group chat Telegram mà người dùng đã tham gia và danh sách thành viên trong group chat mà 
            không cần bất cứ quyền hạn gì trong group. 
            Người dùng có thể nhắn tin đến tất cả thành viên trong group chat đó hoặc mời người dùng trong group chat sang group khác.
          </li>
          <li>Gửi tin nhắn: Nhắn tin Telegram cho một nhóm người dùng một cách tự động theo lịch hẹn giờ sẵn. Đích đến nhóm người dùng có thể danh sách tệp khách hàng, danh sách bạn bè hoặc danh sách
          group chat telegram.</li>
        </ol>
    </li>
    <li>Bot Telegram: Tạo Bot tự động trả lời tin nhắn trên Telegram. Người dùng có thể tự cấu hình nội dung trả lời 
    cho bot khi có người đăng kí bot hoặc tham gia nhóm chat Bot quản lí. Ngoài ra người dùng có thể hẹn giờ để bot tự động gửi tin nhắn đến cho 
    người dùng sau khi đăng kí bot. Bên cạnh đó Bot cũng có chức năng tự động forward tin nhắn từ Channel đến Group chat hoặc Channel Telegram khác. 
    </li>
  </ul>
</div>
<?php
    include 'footer.php';
?>