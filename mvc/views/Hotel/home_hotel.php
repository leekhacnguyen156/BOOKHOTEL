<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../mvc/assets/css/base.css">
  <link rel="stylesheet" href="../../mvc/assets/css/danhsachphong.css">
  <link rel="stylesheet" href="../../mvc/assets/css/danhsachphong1.css">
  <link rel="stylesheet" href="../../mvc/assets/css/home1.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href="../../mvc/assets/css/home.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.0/mapbox-gl.js'></script>
  <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.0/mapbox-gl.css' rel='stylesheet' />
  <title>Tìm kiếm</title>
</head>

<style>
  .mota-item span{
    text-align: justify;
    display: -webkit-box;
    -webkit-line-clamp: 9;
    -webkit-box-orient: vertical;  
    overflow: hidden;
  }
</style>

<body style="margin: 0;">
  <?php include("./mvc/views/main/header.php") ?>
  <div class="grid" style="padding-bottom:20px;">
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
        <div class="container-ks w-85">
          <img src="../../mvc/assets/img/<?=$data['khachsan']['img']?>" alt="" class="anhkhachsan">
        </div>
        <div class="container-search w-85">
          <h2 class="name_hotel"><?= $data['khachsan']['tenkhachsan'] ?></h2>
          <div class="auth_form-hotel">
            <b class="info_form">Địa chỉ:</b>
            <h4 class="info_span"><?= $data['khachsan']['diachi'] ?></h4>
          </div>
          <div class="auth_form-hotel">
            <b class="info_form">SĐT:</b>
            <h4 class="info_span"><?= $data['khachsan']['phone'] ?></h4>
          </div>
          <div class="auth_form-hotel">
            <b class="info_form">Email:</b>
            <h4 class="info_span"><?= $data['khachsan']['email'] ?></h4>
          </div>
          <div class="auth_form-hotel">
            <b class="info_form">Website:</b>
            <h4 class="info_span"><?= $data['khachsan']['website'] ?></h4>
          </div>
          <div class="auth_form-hotel">
            <b class="info_form">Facebook:</b>
            <h4 class="info_span"><?= $data['khachsan']['facebook'] ?></h4>
          </div>
        </div>
        <div class="container-search w-85">
          <div id="map" style="width: 100%; height: 200px;"></div>
        </div>
      </div>
      <div class="w-75 content-left">
        <h1 style="margin-bottom: 19px;">Danh mục phòng:</h1>
        <div class="d-flex justify-content-between header-tab" style="overflow-x: croll;">
          <?php
          for ($i = 0; $i < count($data['danhmuc']); $i++) {
            if ($i == 0) {
              echo '<span class="item-tab active" onclick="loadphongdm(' . $data['danhmuc'][$i]['madm'] . ')">' . $data['danhmuc'][$i]['tendm'] . '</span>';
            } else {
              echo '<span class="item-tab" onclick="loadphongdm(' . $data['danhmuc'][$i]['madm'] . ')">' . $data['danhmuc'][$i]['tendm'] . '</span>';
            }
          }
          ?>
        </div>
        <div style="margin-top: 10px;" id="dsphong">
          <!-- <div class="item-ds-phong">
            <div class="d-flex align-items-center postion-relative" style="justify-content: center; width: 40%;">
              <img src="../../assets/imgtest/297922966.jpg" alt="" class="w-100 h-100 rounded">
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
          <!-- <div class="item-ds-phong">
            <div class="d-flex align-items-center postion-relative" style="justify-content: center; width: 40%;">
              <img src="../../assets/imgtest/297922966.jpg" alt="" class="w-100 h-100 rounded">
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
        </div>
      </div>
    </div>
  </div>
  <?php include("./mvc/views/main/footer.php"); ?>
</body>

</html>

<script type="text/javascript">
  $('.item-tab').click(function() {
    $('.header-tab').children().removeClass("active");
    $(this).addClass("active");
  });

  $.ajax({
			type: "GET",
			dataType: 'text',
			url: 'http://localhost/BOOKHOTEL/cAuth/getIDU',
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

  window.onload = function() {
    loadphongdm(<?=$data['danhmuc'] ? $data['danhmuc'][0]['madm'] : null?>);
  }

  function loadphongdm(madm) {
    $('#dsphong').empty();
    $.ajax({
      type: "POST",
      data: {
        'madm': madm
      },
      dataType: 'text',
      url: '../../cphong/getphongTheodanhmuc',
      success: function(json) {
        let phong = JSON.parse(json);
        for (let i = 0; i < phong.length; i++) {
          $('#dsphong').append(`
            <div class="item-ds-phong">
              <div class="d-flex align-items-center postion-relative" style="justify-content: center; width: 25%;">
                <img src="${'../../mvc/assets/img/' + phong[i]['anhtieude']}" alt="" class="w-100 h-100 rounded" style="height: 200px; object-fit: cover;">
                <i id="btnthichphong${phong[i]['maloai']}" onclick="thichphong(${phong[i]['maloai']})" class="fas fa-heart fa-3x postion-absolute" style="color: white; top: 5%; right: 5%;"></i>
              </div>
              <div style="margin-left: 5px; padding-right: 20px; width: 55%;">
                <div class="d-flex align-items-center">
                  <h1 class="title-room">${phong[i]['tenloai']}</h1>
                  <div class="container-start" id="saodanhgia${phong[i]['maloai']}">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                  </div>
                </div>
                <div class="local">
                  <a href="#"><?= $data['khachsan']['diachi'] ?></a>
                  <i class="fas fa-genderless fa-sm" style="color: #0071c2;"></i>
                  <a href="#">Xem trên bản đồ</a>
                </div>
                <div class="mota-item">
                  <span>${phong[i]['mota']}</span>
                </div>
              </div>
              <div class="d-flex flex-column" style="width: 20%; justify-content: center;">
                <div class="d-flex align-items-center">
                  <div class="number">
                    <span id="diemdanhgia${phong[i]['maloai']}">0</span>
                  </div>
                  <div>
                    <span id="chatluongdanhgia${i}" class="title-evaluate">Xuất sắc</span> <br>
                    <span id="sodanhgia${phong[i]['maloai']}" class="num-evaluate">0 đánh giá</span>
                  </div>
                </div>
                <a class="btn-detail" href="../../cphong/viewchitietphong/${phong[i]['maloai']}" style="text-align: center;">Xem</a>
              </div>
            </div>
          `);
          loaddanhgia(phong[i]['maloai'], i);
          checkthichphong(phong[i]['maloai']);
          
        }
      },
      error: function(error) {
        console.log(error);
      }
    });
  }
  var long = <?=$data['khachsan']['longitude']?>;
  var lat = <?=$data['khachsan']['latitude']?>;

  console.log(long, lat);

  mapboxgl.accessToken = 'pk.eyJ1Ijoibmd1eWVuZ2lha2hhbmciLCJhIjoiY2twYmQ1MWxuMHBldjJ2cGV6MW16aDg5cCJ9.tp51IE5pmf1sQ_MOxq8M9A';
  var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [long, lat],
    zoom: 8
  });

  var marker = new mapboxgl.Marker() // initialize a new marker
    .setLngLat([long, lat]) // Marker [lng, lat] coordinates
    .addTo(map);
  // Add zoom and rotation controls to the map.
  map.addControl(new mapboxgl.NavigationControl());
  map.on("load", function() {
    /* Image: An image is loaded and added to the map. */
    map.loadImage("https://i.imgur.com/MK4NUzI.png", function(error, image) {
      if (error) throw error;
      map.addImage("custom-marker", image);
      /* Style layer: A style layer ties together the source and image   and specifies how they are displayed on the map. */
      map.addLayer({
        id: "markers",
        type: "symbol",
        /* Source: A data source specifies the geographic coordinate where  the image marker gets placed. */
        source: {
          type: "geojson",
          data: {
            type: 'FeatureCollection',
            features: [{
              type: 'Feature',
              properties: {},
              geometry: {
                type: "Point",
                coordinates: [-74.5, 40]
              }
            }]
          }
        },
        layout: {
          "icon-image": "custom-marker",
        }
      });
    });
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

  function loaddanhgia(maloai, i){
    var form_data = new FormData();    
    form_data.append('maloai', maloai);
    $.ajax({
        type: 'POST',
        dataType: 'text',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        url: '../../cphong/getdanhgia',
        success: function(result) {
          let data = JSON.parse(result);
          if (data){
            $(`#diemdanhgia${maloai}`).text(data['diem']);
            $(`#sodanhgia${maloai}`).text(data['sodanhgia'] + ' đánh giá');
            $(`#saodanhgia${maloai}`).empty();
            var diem_r = data['diem'].toFixed();
            if(diem_r == 0){
              $('#chatluongdanhgia'+i).text('Bình thường');
              $(`#saodanhgia${maloai}`).append(`
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              `);
            }else if(diem_r == 1){
              $('#chatluongdanhgia'+i).text('Thấp');
              $(`#saodanhgia${maloai}`).append(`
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              `);
            }else if(diem_r == 2){
              $('#chatluongdanhgia'+i).text('Trung bình');
              $(`#saodanhgia${maloai}`).append(`
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              `);
            }else if(diem_r == 3){
              $('#chatluongdanhgia'+i).text('Khá');
              $(`#saodanhgia${maloai}`).append(`
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              `);
            }else if(diem_r == 4){
              $('#chatluongdanhgia'+i).text('Tốt');
              $(`#saodanhgia${maloai}`).append(`
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
              `);
            }else if(diem_r == 5){
              $('#chatluongdanhgia'+i).text('Xuất sắc');
              $(`#saodanhgia${maloai}`).append(`
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              `);
            }
          }else{
            $(`#diemdanhgia${maloai}`).text('0');
            $('#chatluongdanhgia'+i).text('Bình thường');
            $(`#sodanhgia${maloai}`).text('0 đánh giá');
          }
        }
      });
  }

  function thichphong(maloai){
    $.ajax({
      url: '../../cUser/checksession',
      type: 'POST',
      success: function(result) {
        let data = JSON.parse(result);
        if (data === "succes"){
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
                checkthichphong(maloai);
              }else if(result === 'succes_bt'){
                checkthichphong(maloai);
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

  function checkthichphong(maloai){
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
          document.getElementById("btnthichphong"+maloai).style.color = "red";
          //$("#btnthichphong").append(`<i class="fas fa-heart" style="font-size:32px;color:red"></i>`);
        }else{
          document.getElementById("btnthichphong"+maloai).style.color = "white";
          //$("#btnthichphong").append(`<i class="fas fa-heart" style="font-size:32px;color:#ccc"></i>`);
        }

      }
    });
  }
</script>