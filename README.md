#                                                      WEBSITE XEM PHIM TRỰC TUYẾN

# I.Giới Thiệu. 

-Website xem phim trực tuyến sử dụng framework php.

* Công dụng:
  * Tìm kiếm theo tên phim.
  * Tìm kiếm theo thể loại phim.
  * Tìm kiếm theo năm sản xuất của phim.
  * Xem phim theo tập.
  * Lưu lại phim đã xem.
  * Đăng nhập.
  * Lưu lại những bộ phim yêu thích.

* Mục đích của bài toán:
  * Giúp người dùng có xem được những bộ phim yêu thích miến phí.
  * Có thể tìm kiếm phim 1 cách dễ dàng.
 
 # II. Chi Tiết.
 
 ## 1.Công cụ phát triển:
 
 -Giao diện : sử dụng ngôn ngữ html và các thuộc tính css.
 
 -Giao tiếp đến cơ sở dữ liệu : sử dụng ngôn ngữ php.
 
 ## 2.Thiết kế cơ sở dữ liệu:
 
 * Bảng phim:
   * MaPhim : mã của phim.
   * TenPhim : tên của phim.
   * Nam : năm sản xuất của bộ phim.
   * HangSX : hãng sản xuất bộ phim.
   * NoiDung : nội dung chính của bộ phim.
   * Image : hình ảnh của bộ phim.
   * Back-image : hình nền của bộ phim.
   
 * Bảng thể loại : 
   * MaTL : mã của thể loại phim.
   * TenTL : tên của thể loại phim.
  
 * Bảng thể loại - phim :
   * MaTL : mã của thể loại phim.
   * MaPhim : mã của phim.
   
 * Bảng Năm sản xuất :
   * Nam : năm sản xuất của phim.
   
 * Bảng tập phim :
   * MaTapPhim : mã của tập phim.
   * TenTapPhim : tên của tập phim.
   * MaPhim : mã của phim.
   * Link : link dẫn đến video của tập phim.
   
 * Bảng tài khoản :
   * id : tên đăng nhập
   * password : mật khẩu
   
 ![Atom](https://atom.io/assets/packages-d16d6cc46fd0cf01842409577e782b74.gif)
