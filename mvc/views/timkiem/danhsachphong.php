<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../../mvc/assets/css/base.css">
  <link rel="stylesheet" href="./../../mvc/assets/css/danhsachphong1.css">
  <link rel="stylesheet" href="./../../mvc/assets/css/home1.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <title>Tìm kiếm</title>
  <style>
    .page{
      margin-left: auto;
      margin-right: auto;
      width: fit-content;
      margin-top: 10px;
      cursor: pointer;
    }

    .mota-item span{
    text-align: justify;
    display: -webkit-box;
    -webkit-line-clamp: 9;
    -webkit-box-orient: vertical;  
    overflow: hidden;
  }

    .page a {
      color: black;
      float: left;
      padding:  12px 18px;
      text-decoration: none;
    }

    .page a.activet {
      background-color: rgb(107, 178, 248);
      color: white;
    }

    .page a:hover:not(.active) {
      background-color: #ddd;
    }
  </style>
</head>
<body style="margin: 0;">
  <?php include("mvc/views/main/header.php") ?>
  <div class="grid">
    <div class="d-flex">
      <div class="w-25 content-right d-flex flex-column">
        <div class="postion-relative w-85">
          <div class="font-xs card-banner mx-auto" style="color:orangered">
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
            <input type="text" name="place" id="place" placeholder="<?php if($data['khachsan']){echo $data['khachsan'][0]['ks']['tentinh'];}else{ echo "..."; }?>">
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
        <h1 style="margin-bottom: 19px;">
          <?php
          if($data['khachsan']){
            echo $data['khachsan'][0]['ks']['tentinh'] . " - Tìm thấy " . count($data['khachsan']) . " chỗ nghĩ";
          }else{
            echo 'Không tìm thấy khách sạn.';
          }
            
          ?>
        </h1>
        <div class="d-flex justify-content-between header-tab">
          <span class="item-tab active" onclick="loadmoinhat()">Mới nhất</span>
          <span class="item-tab" onclick="loadyeuthich()">Được yêu thích</span>
          <span class="item-tab" onclick="loaddanhgia()">Đánh giá cao</span>
        </div>
        <div style="margin: 10px 0 10px 0; display: flex; flex-direction: column;" id="danhsachks">
          <!-- <div class="item-ds-phong">
            <div class="d-flex align-items-center postion-relative" style="justify-content: center; width: 40%;">
              <img src="../../mvc/assets/imgtest/297922966.jpg" alt="" class="w-100 h-100 rounded">
              <i class="far fa-heart fa-3x postion-absolute" style="color: white; top: 5%; right: 5%;"></i>
            </div>
            <div style="margin-left: 5px; padding-right: 20px;">
              <div class="d-flex align-items-center">
                <h1 class="title-room">Raon Dalat Villa</h1>
                <div class="container-start">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                </div>
              </div>
              <div class="local">
                <a href="#">Đà Lạt</a>
                <i class="fas fa-genderless fa-sm" style="color: #0071c2;"></i>
                <a href="#">Xem trên bản đồ</a>
              </div>
              <div class="mota-item">
                <span>Tọa lạc tại thành phố Đà Lạt, cách Vườn hoa Đà Lạt 2,8 km và Hồ Xuân Hương 4,2 km, Dalat Villa cung cấp chỗ nghỉ với sảnh khách chung và WiFi miễn phí trong toàn bộ khuôn viên cũng như chỗ đỗ xe riêng...</span>
              </div>
            </div>
            <div class="d-flex flex-column" style="width: 35%; justify-content: center;">
              <div class="d-flex align-items-center">
                <div class="number">
                  <span>9.8</span>
                </div>
                <div>
                  <span class="title-evaluate">Xuất sắc</span> <br>
                  <span class="num-evaluate">34 đánh giá</span>
</div>
              </div>
              <button class="btn-detail">Xem</button>
            </div>
          </div> -->
          
          <!--  -->
        </div>
        <div class="page" id="nb-page">
                <!-- <a href="#">«</a>
                <a href="#">1</a>
                <a class="active" href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">»</a> -->
            </div>
      </div>
    </div>
  </div>
  <?php include("mvc/views/main/footer.php"); ?>
</body>
</html>

<script type="text/javascript">
  var dskhachsan = <?= json_encode($data["khachsan"]) ?>;

  window.onload = function() {
    phantrang();
  }

  $('.item-tab').click(function(){
    $('.header-tab').children().removeClass("active");
    $(this).addClass("active");
  });

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

  function loadyeuthich(){
    var dskhachsanyt = dskhachsan;
    for(let i = 0; i < dskhachsanyt.length - 1; i++){
      for(let j = i + 1; j < dskhachsanyt.length; j++){
        ii = parseInt(dskhachsanyt[i]['yt']);
        jj = parseInt(dskhachsanyt[j]['yt']);
        if( ii < jj ){
          let tamp = dskhachsanyt[i];
          dskhachsanyt[i] = dskhachsanyt[j];
          dskhachsanyt[j] = tamp;
        }
      }
    }
    dskhachsan = dskhachsanyt;
    phantrang();
  }

  function loaddanhgia(){
    var dskhachsandg = dskhachsan;
for(let i = 0; i < dskhachsandg.length - 1; i++){
      for(let j = i + 1; j < dskhachsandg.length; j++){
        ii = ( dskhachsandg[i]['ss'] != null ) ? parseFloat(dskhachsandg[i]['ss']) : 0;
        jj = ( dskhachsandg[j]['ss'] != null ) ? parseFloat(dskhachsandg[j]['ss']) : 0;
        console.log(ii, jj);
        if( ii < jj ){
          let tamp = dskhachsandg[i];
          dskhachsandg[i] = dskhachsandg[j];
          dskhachsandg[j] = tamp;
        }
      }
    }
    dskhachsan = dskhachsandg;
    phantrang();
  }

  function loadmoinhat(){
    dskhachsan = <?= json_encode($data["khachsan"]) ?>;
    phantrang();
  }

  function loaddanhsachks(){
    $('#danhsachks').empty();
    var active = document.getElementsByClassName("activet");
    var count = 6;
    var start = ( active[0].innerText * count) - count;
    while(start < (start + count) && dskhachsan[start] != null){
      $('#danhsachks').append(`
        <div class="item-ds-phong">
          <div class="d-flex align-items-center postion-relative" style="justify-content: center; width: 25%;">
            <img src="${'../../mvc/assets/img/' + dskhachsan[start]['ks']['img']}" alt="" class="w-100 h-100 rounded" style="height: 200px; object-fit: cover;">
          </div>
          <div style="margin-left: 5px; padding-right: 20px; width: 55%;">
            <div class="d-flex align-items-center">
              <h1 class="title-room">${dskhachsan[start]['ks']['tenkhachsan']}</h1>
              <div class="container-start" id="saodanhgia${start}">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
              </div>
            </div>
            <div class="local">
              <a href="#">${dskhachsan[start]['ks']['tentinh']}</a>
              <i class="fas fa-genderless fa-sm" style="color: #0071c2;"></i>
              <a href="#">Xem trên bản đồ</a>
            </div>
            <div class="mota-item">
              <span>${dskhachsan[start]['ks']['mota']}</span>
            </div>
          </div>
          <div class="d-flex flex-column" style="width: 20%; justify-content: center;">
            <div class="d-flex align-items-center">
              <div class="number">
                <span>${parseInt(dskhachsan[start]['ss'])}</span>
              </div>
              <div>
                <span class="title-evaluate" id="chatluongdanhgia${start}">Xuất sắc</span> <br>
                <span class="num-evaluate">${parseInt(dskhachsan[start]['yt'])} lượt yêu thích</span>
              </div>
            </div>
            <a href="../../ckhachsan/viewkhachsan/${dskhachsan[start]['ks']['mataikhoan']}" class="btn-detail">Xem</a>
          </div>
        </div>
      `);
        $(`#saodanhgia${start}`).empty();
        if(!parseInt(dskhachsan[start]['ss'])){
          $(`#chatluongdanhgia${start}`).text('Bình thường');
          $(`#saodanhgia${start}`).append(`
          <i class="far fa-star"></i>
          <i class="far fa-star"></i>
          <i class="far fa-star"></i>
          <i class="far fa-star"></i>
          <i class="far fa-star"></i>
          `);
        }else if(parseInt(dskhachsan[start]['ss'])  == 0){
          $(`#chatluongdanhgia${start}`).text('Bình thường');
          $(`#saodanhgia${start}`).append(`
          <i class="far fa-star"></i>
          <i class="far fa-star"></i>
          <i class="far fa-star"></i>
          <i class="far fa-star"></i>
          <i class="far fa-star"></i>
          `);
        }else if(parseInt(dskhachsan[start]['ss']) == 1){
          $(`#chatluongdanhgia${start}`).text('Thấp');
          $(`#saodanhgia${start}`).append(`
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i>
          <i class="far fa-star"></i>
          <i class="far fa-star"></i>
          <i class="far fa-star"></i>
          `);
        }else if(parseInt(dskhachsan[start]['ss']) == 2){
          $(`#chatluongdanhgia${start}`).text('Trung bình');
          $(`#saodanhgia${start}`).append(`
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i>
          <i class="far fa-star"></i>
          <i class="far fa-star"></i>
          `);
        }else if(parseInt(dskhachsan[start]['ss']) == 3){
          $(`#chatluongdanhgia${start}`).text('Khá');
          $(`#saodanhgia${start}`).append(`
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i>
          <i class="far fa-star"></i>
          `);
        }else if(parseInt(dskhachsan[start]['ss']) == 4){
          $(`#chatluongdanhgia${start}`).text('Tốt');
          $(`#saodanhgia${start}`).append(`
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i>
          `);
        }else if(parseInt(dskhachsan[start]['ss']) == 5){
          $(`#chatluongdanhgia${start}`).text('Xuất sắc');
          $(`#saodanhgia${start}`).append(`
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          `);
        }
      start++;
      }
    }

  function phantrang(){
    var dskhachsan = <?= json_encode($data["khachsan"]) ?>;
    var page = dskhachsan.length / 6;
    var n = Math.round(page);
    if(n < page){
        n = n + 1;
    }
    $('#nb-page').empty();
    $('#nb-page').append(`
        <a type="button">«</a>
    `);
    for(let j = 1; j <= n; j++){
        if(j == 1){
            $('#nb-page').append(`
                <a type="button" class="btnn activet">${j}</a>
            `);
        }else{
            $('#nb-page').append(`
                <a type="button" class="btnn">${j}</a>
            `);
        }
    }
    loaddanhsachks();
    $('#nb-page').append(`
        <a type="button">»</a>
    `);
    var header = document.getElementById("nb-page");
    var btns = header.getElementsByClassName("btnn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("activet");
            current[0].className = current[0].className.replace(" activet", "");
            this.className += " activet";
            loaddanhsachks();
        });
    }
  }
</script>