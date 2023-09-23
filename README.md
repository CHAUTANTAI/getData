# LẤY DỮ LIỆU TỪ WEBSITE

Chương trình để tự động lấy dữ liệu về tỷ giá ngoại tệ.

Mỗi 10 phút tự động chạy và lấy dữ liệu từ một nguồn (website) trên mạng.

Dữ liệu lấy về lưu vào database trên máy.

## Authors

- [CHÂU TẤN TÀI](https://github.com/CHAUTANTAI)

## Deployment

Cài đặt webserver XAMPP và mySQL cũng sẽ đượcc cài đặt cùng lúc.
![App Screenshot](https://scontent.fsgn8-4.fna.fbcdn.net/v/t1.15752-9/379539981_691568926230102_3050413847574783830_n.png?_nc_cat=111&ccb=1-7&_nc_sid=ae9488&_nc_ohc=_YUtIIhRm6EAX8V7Pdk&_nc_ht=scontent.fsgn8-4.fna&oh=03_AdRp5Fs8oV7GGH3PU7FXf4JnIbf5DouAwn07hiR8sKIGZQ&oe=6533B635)

Truy cập github, kéo Project về với Git hoặc Download trực tiếp file getData.zip về giản nén và lưu vào folder htdocs của XAMPP.

Config lại file httpd.conf nếu xảy ra xung đột PORT.

Truy cập localhost/phpmyadmin để tạo sẵn một Database rỗng để cấu hình kết nối trong file env.php.

## Config

Vào file env.php sửa đổi giá trị của các biến tương ứng với máy local
$SERVERNAME : Tên server Xampp là localhost
$DATABASE : Tên DATABASE đã được tạo.
$USERNAME   : Tên người dùng của DATABASE trên máy.
$PASSWORD : Mật khẩu nếu có, không có để mặc định là null.
$CHARSET : Bảng mã không cần thay đổi.

## How it works

Dự án được viết bằng ngôn ngữ PHP chạy local trên PORT của webserver XAMPP.

File index.php trong thư mục getData sẽ tự động được chạy đầu tiên.

index.php sẽ được Refresh và render view.php sau 600s hay 10'.

Dữ liệu khi lấy được sau mỗi lần refresh sẽ được lưu vào Database mySQL đã được cấu hình sẵn trong file env.php.

Việc kết nối Database được thực hiện trong file connectDB.php, dùng lớp trừu tượng PDO để giao tiếp với CSDL bên dưới.

apiController.php file là nơi xử lý nguồn dữ liệu lấy được từ website để tổ chức lại, hiển thị lên view và lưu trữ xuống Database.

Nguồn dữ liệu lấy từ API của vietcombank: https://portal.vietcombank.com.vn/Usercontrols/TVPortal.TyGia/pXML.aspx

Trang tỷ giá của vietcombank:https://www.vietcombank.com.vn/KHCN/Cong-cu-tien-ich/Ty-gia?devicechannel=default
## Demo

![App Screenshot](https://scontent.fsgn8-3.fna.fbcdn.net/v/t1.15752-9/379523084_664251722353670_5501653592672683550_n.png?_nc_cat=106&ccb=1-7&_nc_sid=ae9488&_nc_ohc=YXXtEmECH0gAX90dAa4&_nc_ht=scontent.fsgn8-3.fna&oh=03_AdR7QZorCvJqR83vX-AAjXRaV25RoNZ9WofUR7yIipqRcg&oe=6533DD89)

