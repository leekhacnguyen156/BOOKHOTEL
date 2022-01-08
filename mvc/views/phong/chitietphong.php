<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chi tiết phòng</title>
  <link rel="stylesheet" href="./../../mvc/assets/css/home1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <link rel="stylesheet" href="./../../mvc/assets/css/base.css">
  <link rel="stylesheet" href="./../../mvc/assets/css/chitietphong.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
<?php include("mvc/views/main/header.php") ?>
  <div class="grid">
    <div class="d-flex">
      <div class="w-25 content-right d-flex flex-column">
        <div class="postion-relative w-85">
          <div class="font-xs card-banner mx-auto">
            <i class="fas fa-clipboard-check fa-lg" style="color:orangered"></i>
            Chúng Tôi Luôn Khớp Giá!
          </div>
          <div class="font-xs banner-hide postion-absolute">
            <span style="color:orangered"><strong>Chúng Tôi Luôn Khớp Giá!</strong></span>
            <div>
              <i class="fas fa-clipboard-check fa-lg" style="color:orangered"></i>
              <span>Giá phòng thấp • Không tính phí đặt phòng • Tìm được giá thấp hơn? Chúng tôi sẽ hoàn lại số tiền chênh lệch!</span>
            </div>
          </div>
        </div>
        <div class="container-search w-85">
          <div>
            <span>Tìm</span>
          </div>
          <div class="d-flex flex-column">
            <label for="place">Tên chỗ nghỉ / điểm đến:</label>
            <input type="text" name="place" id="place" placeholder="Đà Lạt">
          </div>
          <div class="d-flex flex-column">
            <label for="date-input">Ngày nhận phòng:</label>
            <input type="date" name="date-input" id="date-input">
          </div>
          <div class="d-flex flex-column">
            <label for="date-output">Ngày trả phòng:</label>
            <input type="date" name="date-output" id="date-output">
          </div>
          <div>
            <button class="w-100">Tìm</button>
          </div>
        </div>
      </div>
      <div class="w-75 content-left">
        <div class="d-flex justify-content-between header-tab">
          <span class="item-tab" onclick="goViewMota()">
            Mô tả
          </span>
          <span class="item-tab" onclick="goViewTienNghi()">
            Tiện nghi
          </span>
          <span class="item-tab" onclick="goViewQuyTac()">
            Quy tắt chung
          </span>
          <span class="item-tab" onclick="goViewDanhGia()">
            Đánh giá của khách hàng
          </span>
        </div>
        <div class="container-info">
          <div class="d-flex info-title align-items-center justify-content-between">
            <div class="d-flex align-items-center">
              <span class="mask-type">Phòng</span>
              <h1 class="title-room"></i><?php echo $data['data']['tenloai']?></h1>
              <div class="container-start" id="saodanhgia">
                <!-- <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i> -->
              </div>
              <div class="d-flex align-items-center container-place">
                <i class="fas fa-map-marker-alt fa-2x" style="color:red"></i>
                <span class="font-xs place"><?php echo $data['diachi']['diachi']?></span>
              </div>
            </div>
            <div class="d-flex align-items-center container-action">
              <button onclick="thichphong()" class="btn-like" type="button" id="btnthichphong">
              <i class="fas fa-heart" style="font-size:32px;color:#ccc"></i>
              </button>
              <button class="btn-book" type="button" onclick="openmodaldatphong()">
                Đặt ngay
              </button>
            </div>
          </div>
          <div class="d-flex">
            <div class="d-flex flex-column justify-content-between" style="width: 33%">
              <img src="../../mvc/assets/imgtest/297922972.jpg" alt="" class="w-100" id="img1" style="height: 250px; object-fit: cover;">
              <img src="../../mvc/assets/imgtest/297923205.jpg" alt="" class="w-100" id="img2" style="height: 250px; object-fit: cover; margin-top: 7px;">
            </div>
            <div class="content-img-tieu-de" style="width: 67%; height: 507px;">
              <img src="../../mvc/assets/imgtest/297922966.jpg" alt="" class="w-100 h-100" id="img3" style="object-fit: cover;">
            </div>
          </div>
          <div class="list-review-img d-flex" id="list-anh-rv">
            <!-- <div class="w-20 item-review-img">
              <img src="../../mvc/assets/imgtest/297922966.jpg" alt="" class="w-100 h-100">
            </div>
            <div class="w-20 item-review-img">
              <img src="../../../mvc/assets/imgtest/297922966.jpg" alt="" class="w-100 h-100">
            </div>
            <div class="w-20 item-review-img">
              <img src="../../../mvc/assets/imgtest/297922966.jpg" alt="" class="w-100 h-100">
            </div>
            <div class="w-20 item-review-img">
              <img src="../../../mvc/assets/imgtest/297922966.jpg" alt="" class="w-100 h-100">
            </div>
            <div class="w-20 item-review-img postion-relative d-flex align-items-center justify-content-center">
              <img src="../../../mvc/assets/imgtest/297922966.jpg" alt="" class="w-100 h-100">
              <div class="info-number-img w-100 h-100 postion-absolute"></div>
              <h1 class="postion-absolute number-img">45+ ảnh</h1>
            </div> -->
          </div>
          <div class="container-description d-flex" id="mota">
            <div class="w-100">
              <span class="font-xs text-blue" >Mô tả </span> <br>
              <div class="d-flex" style="margin-top: 10px;">
                <span class="font-xs description-hotel w-70" style="padding-right: 20px;"><?php echo $data['data']['mota']?></span>
                <div class="w-30 container-tienich">
                  <div class="d-flex align-items-center">
                    <i class="fas fa-map-marker-alt fa-2x" style="color:blue"></i>
                    <span class="font-xs place">Địa điểm hàng đầu: Được khách gần đây đánh giá cao (9,8 điểm)</span>
                  </div>
                  <div class="d-flex align-items-center" style="margin-top: 10px;">
                    <i class="fas fa-parking fa-2x" style="color:blue"></i>
                    <span class="font-xs place">Có bãi đậu xe riêng miễn phí ở khách sạn này</span>
                  </div>
                  <div>
                    <button class="w-100" onclick="openmodaldatphong()">Đặt ngay</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container-utilities" id="tiennghi">
            <span class="category">Các tiện nghi có sẵn</span>
            <div id="cactienich" class="d-flex justify-content-evenly flex-wrap" style="margin-top: 10px;">
              <!-- <div class="item-utilities d-flex justify-content-between align-items-center w-30 success">
                <div>
                  <i class="fas fa-wifi fa-2x"></i>
                  <span class="name-utilities">Wifi</span>
                </div>
                <i class="fas fa-check-circle fa-2x"></i>
              </div>
              <div class="item-utilities d-flex justify-content-between align-items-center w-30 success">
                <div>
                  <i class="fas fa-parking fa-2x"></i>
                  <span class="name-utilities">Bãi đậu xe</span>
                </div>
                <i class="fas fa-check-circle fa-2x"></i>
              </div>
              <div class="item-utilities d-flex justify-content-between align-items-center w-30 success">
                <div>
                  <i class="fas fa-utensils fa-2x"></i>
                  <span class="name-utilities">Thức ăn</span>
                </div>
                <i class="fas fa-times-circle fa-2x"></i>
              </div> -->
            </div>
          </div>
          <div id="quytac" class="container-utilities">
            <span class="category">Quy tắc chung</span> <br>
            <span class="font-xs text-green">(CT Morning Hostel gửi yêu cầu đến quí vị!)</span>
            <div class="d-flex i-utilities">
              <div class="w-25">
                <i class="far fa-calendar-alt fa-2x" style="color: #dc3545;"></i>
                <span class="font-xs text-red">Nhận phòng</span>
              </div>
              <div class="w-75">
                <i class="fas fa-check-double fa-2x"  style="color: #28a745;"></i>
                <span class="font-xs">
                  Thời gian: 06:00 sáng đến 00:00 tối <br>
                </span>
                <i class="fas fa-check-double fa-2x"  style="color: #28a745;"></i>
                <span class="font-xs">
                  Khách được yêu cầu xuất trình giấy tờ tùy thân có ảnh và thẻ tín dụng lúc nhận phòng
                </span>
              </div>
            </div>
            <div class="d-flex i-utilities">
              <div class="w-25">
                <i class="far fa-calendar-alt fa-2x" style="color: #dc3545;"></i>
                <span class="font-xs text-red">Trả phòng</span>
              </div>
              <div class="w-75">
                <i class="fas fa-check-double fa-2x" style="color: #28a745;"></i>
                <span class="font-xs">
                  Thời gian: 06:00 sáng đến 12:00 trưa
                </span>
              </div>
            </div>
            <div class="d-flex i-utilities">
              <div class="w-25">
                <i class="fab fa-get-pocket fa-2x" style="color: #dc3545;"></i>
                <span class="font-xs text-red">Nhận phòng online</span>
              </div>
              <div class="w-75">
                <i class="fas fa-check-double fa-2x" style="color: #28a745;"></i>
                <span class="font-xs">
                  Chỗ nghỉ này cho khách nhận phòng dễ dàng trước kỳ lưu trú và bạn sẽ không phải chờ đợi khi đến nơi.
                </span>
              </div>
            </div>
            <div class="d-flex i-utilities">
              <div class="w-25">
                <i class="fas fa-exclamation-circle fa-2x" style="color: #dc3545;"></i>
                <span class="font-xs text-red">Hủy đặt phòng/Thanh toán</span>
              </div>
              <div class="w-75">
                <i class="fas fa-check-double fa-2x" style="color: #28a745;"></i>
                <span class="font-xs">
                  Chính sách hủy và thanh toán sẽ khác nhau tùy vào loại chỗ nghỉ. Vui lòng kiểm tra các điều kiện có thể được áp dụng cho mỗi lựa chọn của bạn.
                </span>
              </div>
            </div>
            <div class="d-flex i-utilities">
              <div class="w-25">
                <i class="fas fa-child fa-2x" style="color: #dc3545;"></i>
                <span class="font-xs text-red">Trẻ em và giường</span>
              </div>
              <div class="w-75">
                <i class="fas fa-check-double fa-2x" style="color: #28a745;"></i>
                <span class="font-xs">
                  Chính sách trẻ em
                  Phù hợp cho tất cả trẻ em.
                  Trẻ em từ 13 tuổi trở lên được tính như người lớn tại chỗ nghỉ này.
                  Để xem thông tin giá và tình trạng phòng trống chính xác, vui lòng thêm số lượng và độ tuổi của trẻ em trong nhóm của bạn khi tìm kiếm.
                  Chính sách nôi (cũi) và giường phụ
                  Chỗ nghỉ không có chỗ cho nôi (cũi).
                  Chỗ nghỉ không có chỗ cho giường phụ.
                </span>
              </div>
            </div>
            <div class="d-flex i-utilities">
              <div class="w-25">
                <i class="fas fa-user fa-2x" style="color: #dc3545;"></i>
                <span class="font-xs text-red">Không giới hạn độ tuổi</span>
              </div>
              <div class="w-75">
                <i class="fas fa-check-double fa-2x" style="color: #28a745;"></i>
                <span class="font-xs">
                  Không có yêu cầu về độ tuổi khi nhận phòng
                </span>
              </div>
            </div>
            <div class="d-flex i-utilities">
              <div class="w-25">
                <i class="fas fa-paw fa-2x" style="color: #dc3545;"   ></i>
                <span class="font-xs text-red">Vật nuôi</span>
              </div>
              <div class="w-75">
                <i class="fas fa-check-double fa-2x" style="color: #28a745;"></i>
                <span class="font-xs">
                  Vật nuôi được phép.
                </span>
              </div>
            </div>
          </div>
          <div class="container-evaluate" id="danhgia">
            <span class="category">Đánh giá của khách hàng:</span>
            <div style="margin-top: 10px; border-bottom: 1.5px solid #ccc; padding-bottom: 10px;">
              <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                  <div class="number">
                    <span id="diemdanhgia"></span>
                  </div>
                  <div>
                    <span class="title-evaluate" id="chatluongdanhgia">Xuất sắc</span> <br>
                    <span class="num-evaluate" id="sodanhgia"></span>
                  </div>
                  <span class="commit">
                    Trải nghiệm từ khách thật 100%
                    <i class="fas fa-exclamation-circle"></i>
                  </span>
                </div>
                <button type="button" class="btn-evaluate" onclick="viAddEvaluate()">Viết bài đánh giá</button>
              </div>
              <div class="d-none" id="add-evaluate">
                <div class="add-evaluate d-flex" style="margin-top: 10px;">
                  <textarea name="cmt" id="cmt" class="w-70" rows="8"></textarea>
                  <div class="d-flex flex-column align-items-center w-30">
                    <div class="d-flex flex-column align-items-center">
                      <i class="fas fa-times-circle fa-2x" style="color:orangered; margin-bottom: 10px; cursor: pointer;" onclick="goneAddEvaluate()"></i>
                      <span class="title-start">Vui lòng chọn sao:</span>
                      <div class="start-evaluate" style="margin-top: 5px;">
                        <a onclick="chooseStar(1)" id="1" type="button"><i class="far fa-star fa-3x"></i></a>
                        <a onclick="chooseStar(2)" id="2" type="button"><i class="far fa-star fa-3x"></i></a>
                        <a onclick="chooseStar(3)" id="3" type="button"><i class="far fa-star fa-3x"></i></a>
                        <a onclick="chooseStar(4)" id="4" type="button"><i class="far fa-star fa-3x"></i></a>
                        <a onclick="chooseStar(5)" id="5" type="button"><i class="far fa-star fa-3x"></i></a>
                      </div>
                    </div>
                    <button type="button" style="margin-top: auto;" onclick="checkaddDanhGia()">Đăng</button>
                  </div>
                </div>
              </div>
            </div>
            <div id="danhgiacon">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="modalanhmota">
    <div class="modalanhmota-overlay">
      <div class="modalanhmota-body">
      <div class="modalanhmota-close">
          <button id="closemodalanhmota" onclick="closemodalanhmota()">X</button>
        </div>
        <div id="list-anh-mota">
        </div>
      </div>
    </div>
  </div>
  <div id="modaldatphong">
    <div class="modaldatphong-overlay">
      <div class="modaldatphong-body">
        <div class="closemodal-dp">
          <button id="closedatphong" onclick="closemodal()">X</button>
        </div>
        <form action="#" method="POST" enctype="multipart/form-data">
          <div class="room">
            <div class="room-details">
              <div class="details" style="width: 100%;">
                <div class="item-ds-phong">
                  <div class="d-flex align-items-center postion-relative" style="width: 25%;">
                    <img src="../../mvc/assets/imgtest/297922966.jpg" alt="" class="w-100 h-100 rounded">
                  </div>
                  <div style="margin-left: 5px; padding-right: 20px; width: 60%;">
                    <div class="d-flex align-items-center">
                      <h1 class="title-room"><?php echo $data['data']['tenloai']?></h1>
                      <h2 style="color:red; margin-left: 2rem;" class="title-room">Giá: <?php echo number_format($data['gia']['gia'], 0, ',', '.') . "₫"?></h2>
                      <!-- <span style="font-size:16px; color:red;">Giá: <?php echo number_format($data['gia']['gia'], 0, ',', '.') . "₫"?></span> -->
                    </div>
                    <div class="local">
                      <a href="#">Đà Lạt</a>
                      <i class="fas fa-genderless fa-sm" style="color: #0071c2;"></i>
                      <a href="#">Xem trên bản đồ</a>
                    </div>
                    <div class="mota-item">
                      <span><?php echo $data['data']['mota']?></span>
                    </div>
                  </div>  
                  <div class="d-flex flex-column" style="width: 15%; justify-content: center; align-items: end;">
                    <div class="d-flex align-items-center">
                      <div class="number">
                        <!-- <span><?php echo $data['danhgia']['diem']?></span> -->
                        <span id="diemdanhgiaformdp"></span>
                      </div>
                      <div style="white-space: nowrap">
                        <span class="title-evaluate" id="chatluongdanhgiaformdp">Xuất sắc</span> <br>
                        <!-- <span class="num-evaluate"><?php echo $data['danhgia']['sodanhgia']?> đánh giá</span>-->
                      <span class="num-evaluate" id="sodanhgiaformdp"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="input-boxroom">
                <div class="input-box">
                  <span class="details">Ngày Nhận Phòng</span>
                  <input type="date" id="ngaynhanphong" required>
                </div>
                <div class="input-box">
                  <span class="details">Ngày Trả Phòng</span>
                  <input type="date" id="ngaytraphong" required>
                </div>
                <div class="input-box">
                  <span class="details">Thời Gian Đến</span>
                  <input type="date" id="thoigianden" required>
                </div>
              </div>
            </div>
          </div>
          <div class="user-details">
            <div class="input-box">
              <span class="details">Họ Tên</span>
              <input type="text" placeholder="Nhập họ tên người đặt" id="hoten" required>
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="text" placeholder="Nhập email người đặt" id="email" required>
            </div>
            <div class="input-box">
              <span class="details">Số Điện Thoại</span>
              <input type="text" placeholder="Nhập số điện thoại" id="sdt" required>
            </div>
            <div class="input-box">
              <span class="details">CMND/CCCD</span>
              <input type="text" placeholder="CMND/CCCD" id="cmnd" disabled>
            </div>
          </div>
          <div class="auth_form">
            <div class="form-error" id="form-error" style="margin: auto;">
                <i class="fas fa-exclamation-circle"></i>
                <span id="message-error">dd</span>
            </div>
            <div class="form-succes" id="form-succes" style="margin: auto;">
                <i class="fas fa-check-circle"></i>
                <span id="message-succes">dd</span>
          </div>
        </div> 
          <div class="button" onclick="datphong()">
            <input type="submit" value="Đặt phòng">
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php include("mvc/views/main/footer.php"); ?>
</body>
</html>

<script language="javascript">
  window.onload = function(){
    loadimg();
    checkthichphong();
    loaddichvu();
    loadsao();
    loadcmt();
    setdanhgia();
  };

  function setdanhgia(){
    let maloai = <?php echo $data['data']['maloai']?>;
    $.ajax({
          type: "POST",
          data: {
            'maloai': maloai
          },
          dataType: 'text',
          url: '../../cphong/getdanhgia',
          success: function(json){
            let result = JSON.parse(json);
              //Load trên trang
              $('#diemdanhgia').text(`${result['diem']}`);
              $('#sodanhgia').text(`${result['sodanhgia']} đánh giá`);

              //Form đặt phòng
              $('#diemdanhgiaformdp').text(`${result['diem']}`);
              $('#sodanhgiaformdp').text(`${result['sodanhgia']} đánh giá`);

              //set đánh giá chất lượng
              var diem = result['diem'].toFixed();
              if(diem == 0){
                $('#chatluongdanhgia').text('Bình thường');
                $('#chatluongdanhgiaformdp').text('Bình thường');
              }else if(diem == 1){
                $('#chatluongdanhgia').text('Thấp');
                $('#chatluongdanhgiaformdp').text('Thấp');
              }else if(diem == 2){
                $('#chatluongdanhgia').text('Trung bình');
                $('#chatluongdanhgiaformdp').text('Trung bình');
              }else if(diem == 3){
                $('#chatluongdanhgia').text('Khá');
                $('#chatluongdanhgiaformdp').text('Khá');
              }else if(diem == 4){
                $('#chatluongdanhgia').text('Tốt');
                $('#chatluongdanhgiaformdp').text('Tốt');
              }else if(diem == 5){
                $('#chatluongdanhgia').text('Xuất sắc');
                $('#chatluongdanhgiaformdp').text('Xuất sắc');
              }
          }
    });
  }

  function loadsao(){
    var diem = <?php echo $data['danhgia']['diem']?>;
    var diem_r = diem.toFixed();
    $('#saodanhgia').empty();
    if(diem_r == 0){
      $('#saodanhgia').append(`
      <i class="far fa-star"></i>
      <i class="far fa-star"></i>
      <i class="far fa-star"></i>
      <i class="far fa-star"></i>
      <i class="far fa-star"></i>
      `);
    }else if(diem_r == 1){
      $('#saodanhgia').append(`
      <i class="fas fa-star"></i>
      <i class="far fa-star"></i>
      <i class="far fa-star"></i>
      <i class="far fa-star"></i>
      <i class="far fa-star"></i>
      `);
    }else if(diem_r == 2){
      $('#saodanhgia').append(`
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="far fa-star"></i>
      <i class="far fa-star"></i>
      <i class="far fa-star"></i>
      `);
    }else if(diem_r == 3){
      $('#saodanhgia').append(`
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="far fa-star"></i>
      <i class="far fa-star"></i>
      `);
    }else if(diem_r == 4){
      $('#saodanhgia').append(`
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="far fa-star"></i>
      `);
    }else if(diem_r == 5){
      $('#saodanhgia').append(`
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      `);
    }
  }

  function gettaikhoancmt(mataikhoan, i){
    $.ajax({
          type: "POST",
          data: {
            'mataikhoan': mataikhoan
          },
          dataType: 'text',
          url: '../../cUser/getTaiKhoancmt',
          success: function(json){
            let result = JSON.parse(json);
              $('#tennguoidungcmt'+i).empty();
              $('#tennguoidungcmt'+i).append(`${result['ten']}`);
              if(result['avt']){
                $('#avtcmt'+i).attr('src', "../../mvc/assets/img/" + result['avt']);
              }else{
                $('#avtcmt'+i).attr('src', "../../mvc/assets/img/avt.jpg");
              }
              
          }
    });
  }

  function loadcmt(){
    let maloai = <?php echo $data['data']['maloai']?>;
    $.ajax({
          type: "POST",
          data: {
            'maloai': maloai
          },
          dataType: 'text',
          url: '../../cphong/getalldanhgia',
          success: function(json){
            let result = JSON.parse(json);
            $('#danhgiacon').empty();
            for(let i =0; i< result.length; i++){
              $('#danhgiacon').append(`
                    <div style="margin-top: 10px;">
                      <div class="d-flex" style="align-items: start;">
                        <div class="w-20 d-flex align-items-center">
                          <img id="avtcmt${i}" src="" alt="" class="w-25 avt" style="height:50px">
                          <div>
                            <span class="name" id="tennguoidungcmt${i}">Gia Khang</span> <br>
                            <span class="local">
                              <i class="fas fa-globe-americas" style="color:blue"></i>
                              Việt Nam
                            </span>
                          </div>
                        </div>
                        <div class="w-80">
                          <span class="time" id="thoigiancmt${i}">
                            <i class="fas fa-clock" style="color: gray;"></i>
                            Đã đánh giá ngày: ngày 7 tháng 5 năm 2021
                          </span>
                          <div id="sosaocmt${i}" class="container-start" style="width: fit-content; margin-left: 0; margin-top: 5px;">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                          </div>
                          <div class="content-evaluate" style="margin-bottom: 15px;">
                            <span id="noidungcmt${i}">
                              Chào chị Hoài Thương. Chân thành cảm ơn chị đã chọn Raon Dalat Villa để lưu trú. Và thật sự rất vui khi nhận được những đánh giá & đóng góp ý kiến thiện chí của chị. Đó là động lực để đội ngũ nhân viên RAON cố gắng hơn nữa để nâng cao chất lượng dịch vụ. Rất mong sẽ lại được tiếp tục phục vụ chị trong thời gian tới. Trân trọng! Mr. Lâm - Bộ phận trải nghiệm khách hàng, Raon Dalat Villa.
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
              `);
              gettaikhoancmt(result[i]['mataikhoan'], i);            
              $('#thoigiancmt'+i).empty();
              $('#thoigiancmt'+i).append(`
                <i class="fas fa-clock" style="color: gray;"></i>
                Đã đánh giá ngày: ${result[i]['thoigian']}
              `);
              $('#sosaocmt'+i).empty();
              var sodiem = result[i]['sosao'];
              if(sodiem == 0){
                $('#sosaocmt'+i).append(`
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                `);
              }else if(sodiem == 1){
                $('#sosaocmt'+i).append(`
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                `);
              }else if(sodiem == 2){
                $('#sosaocmt'+i).append(`
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                `);
              }else if(sodiem == 3){
                $('#sosaocmt'+i).append(`
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                `);
              }else if(sodiem == 4){
                $('#sosaocmt'+i).append(`
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
                `);
              }else if(sodiem == 5){
                $('#sosaocmt'+i).append(`
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                `);
              }

              $('#noidungcmt'+i).empty();
              $('#noidungcmt'+i).append(`${result[i]['noidung']}`);
            }
          }
        });
  }

  var sosao = 0;

  function chooseStar(nstar){
    for(let i = 1; i <= nstar; i++){
      $(`#${i} > i`).removeClass('far');
      $(`#${i} > i`).addClass('fas');
    }

    for(let i = nstar + 1; i <= 5; i++){
      $(`#${i} > i`).removeClass('fas');
      $(`#${i} > i`).addClass('far');
    }

    sosao = nstar;
  }

  function checkaddDanhGia(){
    let maloai = <?php echo $data['data']['maloai']?>;
    $.ajax({
          type: "POST",
          data: {
            'maloai': maloai
          },
          dataType: 'text',
          url: '../../cphong/checkTrungPhongDG',
          success: function(json){
            let result = JSON.parse(json);
            console.log(result);
            if(result === 'true'){
              addDanhGia();
            }else{
              alert("Vui lòng không đánh giá phòng trong khách sạn của mình!");
            }
        },
        error: function(error) {
          console.log(error);
        }
    });
  }

  function addDanhGia(){
    let maloai = <?php echo $data['data']['maloai']?>;
    let noidung = $('#cmt').val();
    if(sosao < 1){
      alert("Vui lòng chọn số sao!");
    }else if(!noidung.trim()){
      alert("Vui lòng nhập nội dung đánh giá!");
    }else{
      $.ajax({
            type: "POST",
            data: {
              'maloai': maloai,
              'noidung': noidung,
              'sosao': sosao
            },
            dataType: 'text',
            url: '../../cphong/addDanhGia',
            success: function(json){
              let result = JSON.parse(json);
              if(result === 'succes'){
                loadcmt();
                loadsao();
                goneAddEvaluate();
                setdanhgia();
              }
          },
          error: function(error) {
            console.log(error);
          }
      });
    }
  }

   $.ajax({
			type: "GET",
			dataType: 'text',
			url: 'http://localhost/BookHotel/cAuth/getIDU',
			success: function(json){
				let user = JSON.parse(json);
                console.log(user);
                if(user['trangthai'] != 'none'){
                    document.getElementById("dk").style.display = "none";
                    document.getElementById("dn").style.display = "none";
                    document.getElementById("user").style.display = "block";
                    if(user['avt']){
                        $('#avt-us').attr('src', "../../mvc/assets/img/" + user['avt']);
                    }
                    $('#us-name').text(user['ten']);
                    $('#ten').text(user['ten']);
                    if(user['trangthai'] == 'chua'){
                        document.getElementById("yes-hotel").style.display = "none";
                    }else{
                        document.getElementById("none-hotel").style.display = "none";
                    }
                }else if(user['trangthai'] == 'none'){
                    document.getElementById("yes-hotel").style.display = "none";
                    document.getElementById("none-hotel").style.display = "none";
                    document.getElementById("avt-us").style.display = "none";
                    document.getElementById("us-name").style.display = "none";
                    document.getElementById("us-item").style.display = "none";
                }
			},
			error: function(error) {
				console.log(error);
			}
	});

  //Chức năng đặt phòng
  function datphong(){
        let ngaynhanphong = $('#ngaynhanphong').val();
        let ngaytraphong = $('#ngaytraphong').val();
        let thoigianden = $('#thoigianden').val();
        let hoten = $('#hoten').val();
        let email = $('#email').val();
        let sdt = $('#sdt').val();
        let idphong = <?php echo $data['data']['maloai']?>;
        let magia = <?php echo $data['gia']['magia']?>;

        var form_data = new FormData();    
        form_data.append('idphong', idphong);
        form_data.append('magia', magia);              
        form_data.append('ngaynhanphong', ngaynhanphong);
        form_data.append('ngaytraphong', ngaytraphong);
        form_data.append('thoigianden', thoigianden);
        form_data.append('hoten', hoten);
        form_data.append('email', email);
        form_data.append('sdt', sdt);

        $.ajax({
            type: "POST",
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'text',
            url: '../../cphong/datphong',
            success: function(json){
              let result = JSON.parse(json);
              if(result === 'succes'){
                alert("Đặt phòng thành công!");
                closemodal();
              }else{
                alert("Đã có lỗi xảy ra ! Đặt phòng không thành công !");
                closemodal();
              }
          },
          error: function(error) {
            console.log(error);
          }
      });
  }
    
  function openmodaldatphong(){
      $.ajax({
        url: '../../cUser/checksession',
        type: 'POST',
        success: function(result) {
          let data = JSON.parse(result);
          if (data === "succes"){
            
            let maloai = <?php echo $data['data']['maloai']?>;
            var form_data = new FormData();    
            form_data.append('maloai', maloai);
            $.ajax({
              type: "POST",
              dataType: 'text',
              data: form_data,
              cache: false,
              contentType: false,
              processData: false,
              url: '../../cphong/checkdatphongcuaminh',
              success: function(json){ 
                let data = JSON.parse(json);
                if(data === 'false'){
                  document.getElementById("modaldatphong").style.display='block';
                  //Show du lieu nguoi dung
                  loaduser();
                }else{
                  alert('Đây là phòng của bạn. Bạn không thể tự đặt phòng của mình !');
                }
              }
            });
          }else{
            window.location.href = "../../cAuth/viewlogin";
          }
        }
      });   
  }

  function closemodal(){
      var modal = document.getElementById("modaldatphong");
      modal.style.display='none';
  }


  //Chức năng hiển thị ảnh mô tả

  function openmodalanh(){
    document.getElementById("modalanhmota").style.display = 'block';
    // $('#list-anh-mota').append(`
    //   <div class="w-20 item-review-img postion-relative d-flex align-items-center justify-content-center">
    //   <img src="../../mvc/assets/imgmota/phong vip3 - Copy.png" alt="" class="w-100 h-100" /*style="width:500px; height:500px"*/>
    //   </div>
    // `);   
    let maloai = <?php echo $data['data']['maloai']?>;
    var form_data = new FormData();    
    form_data.append('maloai', maloai);
    $.ajax({
              type: "POST",
              dataType: 'text',
              data: form_data,
              cache: false,
              contentType: false,
              processData: false,
              url: '../../cphong/gethinhanh',
              success: function(json){               
                let data = JSON.parse(json);
                        $('#list-anh-mota').empty();
                        for(let i = 7; i < data.length; i++){
                              $('#list-anh-mota').append(`
                              <div class="anhmotamd w-20 postion-relative d-flex align-items-center justify-content-center">
                                <img src="../../mvc/assets/imgmota/${data[i]['img']}" alt="" class="w-100 h-100">
                              </div>
                              `);
                        }
              },
              error: function(error) {
                console.log(error);
              }
    });                
  }

  function closemodalanhmota(){
    document.getElementById("modalanhmota").style.display = 'none';
  }


  //Thanh cuộn nhanh
  function viAddEvaluate(){
    document.getElementById("add-evaluate").classList.remove('d-none');
    document.getElementById("add-evaluate").classList.add('d-block');
  }
  function goneAddEvaluate(){
    document.getElementById("add-evaluate").classList.remove('d-block');
    document.getElementById("add-evaluate").classList.add('d-none');
  }

  function goViewMota(){
    document.getElementById("mota").scrollIntoView({behavior: "smooth", block: "start", inline: "nearest"});
  }

  function goViewTienNghi(){
    document.getElementById("tiennghi").scrollIntoView({behavior: "smooth", block: "start", inline: "nearest"});
  }

  function goViewQuyTac(){
    document.getElementById("quytac").scrollIntoView({behavior: "smooth", block: "start", inline: "nearest"});
  }

  function goViewDanhGia(){
    document.getElementById("danhgia").scrollIntoView({behavior: "smooth", block: "start", inline: "nearest"});
  }


//Load dữ liệu
  function loadimg(){
    let maloai = <?php echo $data['data']['maloai']?>;
    var form_data = new FormData();    
    form_data.append('maloai', maloai);
    $.ajax({
              type: "POST",
              dataType: 'text',
              data: form_data,
              cache: false,
              contentType: false,
              processData: false,
              url: '../../cphong/gethinhanh',
              success: function(json){
                
                let data = JSON.parse(json);
                      if(data[0]){
                        document.getElementById("img1").setAttribute('src', '../../mvc/assets/imgmota/'+data[0]['img']);
                      }  
                      if(data[1]){
                        document.getElementById("img2").setAttribute('src', '../../mvc/assets/imgmota/'+data[1]['img']);
                      }
                      if(data[2]){
                        document.getElementById("img3").setAttribute('src', '../../mvc/assets/imgmota/'+data[2]['img']);
                      }      
                      if(data.length >= 3){
                        $('list-anh-rv').empty();
                        for(let i = 3; i < data.length; i++){
                            if(i==7){
                              $('#list-anh-rv').append(`
                                <div class="w-20 item-review-img postion-relative d-flex align-items-center justify-content-center">
                                <img src="../../mvc/assets/imgmota/${data[i]['img']}" alt="" class="w-100 h-100">
                                <div class="info-number-img w-100 h-100 postion-absolute"></div>
                                <h1 onclick="openmodalanh()" class="postion-absolute number-img">${data.length-7}+ ảnh</h1>
                                </div>
                              `);
                              break;
                            }
                            else if(i != 7){
                              $('#list-anh-rv').append(`
                              <div class="w-20 item-review-img">
                                <img src="../../mvc/assets/imgmota/${data[i]['img']}" alt="" class="w-100 h-100">
                              </div>
                              `);
                            }
                        }

                      } 
              },
              error: function(error) {
                console.log(error);
              }
    });
  }


  function loaduser(){
    $.ajax({
              type: "GET",
              dataType: 'text',
              url: '../../cUser/getTaiKhoan',
              success: function(json){
                let user = JSON.parse(json);
                      if(user){
                        var now = new Date();
                        var day = ("0" + (now.getDate())).slice(-2);
                        var month = ("0" + (now.getMonth() + 1)).slice(-2);
                        var today = now.getFullYear()+"-"+(month)+"-"+(day);
                        document.getElementById("ngaynhanphong").setAttribute("min", today);
                        document.getElementById("ngaytraphong").setAttribute("min", today);
                        document.getElementById("thoigianden").setAttribute("min", today);
                          $('#ngaynhanphong').val(today);
                          $('#ngaytraphong').val(today);
                          $('#thoigianden').val(today);
                          $('#hoten').val(user['ten']);
                          $('#sdt').val(user['sdt']);
                          $('#email').val(user['email']);
                          $('#cmnd').val(user['cmnd']);
                      }         
              },
              error: function(error) {
                console.log(error);
              }
            });
  }


  //Load dịch vụ
  function loaddichvu(){
    let maloai = <?php echo $data['data']['maloai']?>;
    var form_data = new FormData();    
    form_data.append('maloai', maloai);
    $.ajax({
      type: "POST",
      dataType: 'text',
      data: form_data,
      cache: false,
      contentType: false,
      processData: false,
      url: '../../cphong/getdichvutheoidphong',
      success: function(result){
        let data = JSON.parse(result);
        if(data != 'null'){
          for(let i = 0; i < data.length; i++){
            if(data[i]['madv'] == 1){
              $('#cactienich').append(`
              <div class="item-utilities d-flex justify-content-between align-items-center w-30 success">
                <div>
                  <i class="fas fa-wifi fa-2x"></i>
                  <span class="name-utilities">Wifi</span>
                </div>
                <i class="fas fa-check-circle fa-2x"></i>
              </div>
              `);
            }else if(data[i]['madv'] == 2){
              $('#cactienich').append(`
              <div class="item-utilities d-flex justify-content-between align-items-center w-30 success">
                <div>
                  <i class="far fa-dryer-alt fa-2x"></i>
                  <span class="name-utilities">Giặc ủi</span>
                </div>
                <i class="fas fa-check-circle fa-2x"></i>
              </div>
              `);
            }else if(data[i]['madv'] == 3){
              $('#cactienich').append(`
              <div class="item-utilities d-flex justify-content-between align-items-center w-30 success">
                <div>
                  <i class="fas fa-glass-cheers fa-2x"></i>
                  <span class="name-utilities">Quầy bar</span>
                </div>
                <i class="fas fa-check-circle fa-2x"></i>
              </div>
              `);
            }else if(data[i]['madv'] == 4){
              $('#cactienich').append(`
              <div class="item-utilities d-flex justify-content-between align-items-center w-30 success">
                <div>
                  <i class="fas fa-swimming-pool fa-2x"></i>
                  <span class="name-utilities">Hồ bơi</span>
                </div>
                <i class="fas fa-check-circle fa-2x"></i>
              </div>
              `);
            }else if(data[i]['madv'] == 5){
              $('#cactienich').append(`
              <div class="item-utilities d-flex justify-content-between align-items-center w-30 success">
                <div>
                  <i class="fas fa-spa fa-2x"></i>
                  <span class="name-utilities">Spa</span>
                </div>
                <i class="fas fa-check-circle fa-2x"></i>
              </div>
              `);
            }else if(data[i]['madv'] == 6){
              $('#cactienich').append(`
              <div class="item-utilities d-flex justify-content-between align-items-center w-30 success">
                <div>
                  <i class="fas fa-motorcycle fa-2x"></i>
                  <span class="name-utilities">Thuê phương tiện di chuyển</span>
                </div>
                <i class="fas fa-check-circle fa-2x"></i>
              </div>
              `);
            }else if(data[i]['madv'] == 7){
              $('#cactienich').append(`
              <div class="item-utilities d-flex justify-content-between align-items-center w-30 success">
                <div>
                  <i class="fas fa-baby-carriage fa-2x"></i>
                  <span class="name-utilities">Trông trẻ</span>
                </div>
                <i class="fas fa-check-circle fa-2x"></i>
              </div>
              `);
            }
          }
        }
      }
    });
  }


  
  //             <div class="item-utilities d-flex justify-content-between align-items-center w-30 success">
  //               <div>
  //                 <i class="fas fa-utensils fa-2x"></i>
  //                 <span class="name-utilities">Thức ăn</span>
  //               </div>
  //               <i class="fas fa-times-circle fa-2x"></i>
  //             </div>


  //Thích phòng

  function checkthichphong(){
    let maloai = <?php echo $data['data']['maloai']?>;
    var form_data = new FormData();    
    form_data.append('maloai', maloai);
    $.ajax({
      type: "POST",
      dataType: 'text',
      data: form_data,
      cache: false,
      contentType: false,
      processData: false,
      url: '../../cphong/checkthichphong',
      success: function(result){
        let data = JSON.parse(result);
        if(data === 'fail'){
          $("#btnthichphong").empty();
          $("#btnthichphong").append(`<i class="fas fa-heart" style="font-size:32px;color:red"></i>`);
        }else{
          $("#btnthichphong").empty();
          $("#btnthichphong").append(`<i class="far fa-heart" style="font-size:32px;color:#ccc"></i>`);
        }

      }
    });
  }

  function thichphong(){
    $.ajax({
      url: '../../cUser/checksession',
      type: 'POST',
      success: function(result) {
        let data = JSON.parse(result);
        if (data === "succes"){
          let maloai = <?php echo $data['data']['maloai']?>;
          var form_data = new FormData();    
          form_data.append('maloai', maloai);

          $.ajax({
            type: "POST",
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'text',
            url: '../../cphong/thichphong',
            success: function(json){
              let result = JSON.parse(json);
              if(result === 'succes_t'){
                checkthichphong();
              }else if(result === 'succes_bt'){
                checkthichphong();
              }else{
                alert("Đã có lỗi xảy ra ! Thích phòng không thành công !");
              }
          },
          error: function(error) {
            console.log(error);
          }
      });
        }else{
          window.location.href = "../../cAuth/viewlogin";
        }
      }
    });
  }
</script>