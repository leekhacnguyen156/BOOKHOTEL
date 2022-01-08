<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../mvc/assets/css/admin1.css">
    <link rel="stylesheet" href="./../mvc/assets/css/hover.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Admin</title>
</head>
<body>
    <!-- <form action=""> -->
        <div id="background_admin">
            <div id="header">
                <div>
                    <div id="name">
                        <div id="web-name">
                            <div>
                                <img class="icon" src="../../../mvc/assets/img/booking.svg" alt=""><a id="link-web" href="">Bookinghotel.com</a>
                            </div>
                        </div>
                        <div id="name-hotel">
                            <h2 id="hotelname">HOTEL FIVE STAR</h2>
                        </div>
                        <div id="exit">
                            <div>
                                <div id="back-home">
                                    <i class="fas fa-home" style="color: white;"></i><a href="../../../cHome/home">Home |</a>
                                </div>
                                <div class="tb" id="thong-bao">
                                    <i class="fas fa-bell" style="color: white;"></i><a href="">Thông báo</a>

                                    <div class="thongbao">
                                        <h4 class="thongbao-heading">Thông báo</h4>
                                        <ul class="thongbao-list" id="showtb">
                                            <!-- <a href="">
                                            <li class="thongbao-item">
                                                <div class="thongbao-img">
                                                    <i id="iconthongbao" class="fas fa-concierge-bell icon-concierge"></i>
                                                </div>
                                                <h5 class="thongbao-item-name"><b>Bạn có đơn đặt phòng mới:</b><br>Mã phiếu đặt: 01 - Người đặt: Hoàng Anh <br> <u id="date">Ngày đặt: 12/02/2021</u> <br><b>Click để xem chi tiết</b></h5>
                                            </li>
                                            </a> -->
                                        </ul>
                                    </div>
                                    <!--Số thông báo-->
                                    <div class="number_notify" id="sotb">
                                        <span class="number" id="soluong">3</span>
                                    </div>
                                </div>
                               

                                <div class="vvvv" id="user">
                                    <div id="user-img">
                                        <img id="avt-us" src="../../../mvc/assets/img/user.svg" alt="">
                                    </div>
                                    <div id="list-us">
                                        <span id="us-name">
                                            <div id="us-itemnhe">
                                                hi
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div id="under-name">
                        <h2>&middot;&#8226;&#10046;&#8226;&#183;</h2>
                    </div> -->
                    <div id="name-page">
                        <span>ADMIN'S PAGE</span>
                    </div>
                </div>
                <div>
                    <ul id="danhmuc">
                        <li><a href="../../admin/<?=$dm="khachsan"?>/<?=$page ="inf"?>">QUẢN LÝ KHÁCH SẠN</a></li>
                        <li><a href="../../admin/<?=$dm="dm"?>/<?=$page ="all"?>">QUẢN LÝ DANH MỤC</a></li>
                        <li><a href="../../admin/<?=$dm="phieudat"?>/<?=$page ="tatca"?>">QUẢN LÝ PHIẾU ĐẶT</a></li>
                        <li><a href="../../admin/<?=$dm="phong"?>/<?=$page ="all_p"?>">QUẢN LÝ PHÒNG</a></li>
                    </ul>
                </div>
            </div>
            <div id="main">
                <div id="main-right">
                    <div id="hotel">
                        <div>
                            <div id="hotel-img">
                                <div><img id="avt-ks" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRNDD6bRegk4LZgK3FwpcbsBOct1QJPzRoa4A&usqp=CAUg" alt=""></div>
                            </div>
                            <div id="star">
                                <img src="../../../mvc/assets/img/star.svg" alt="">
                                <img src="../../../mvc/assets/img/star.svg" alt="">
                                <img src="../../../mvc/assets/img/star.svg" alt="">
                                <img src="../../../mvc/assets/img/star.svg" alt="">
                                <img src="../../../mvc/assets/img/star.svg" alt="">
                            </div>
                            <div id="hotel-inf">
                                <b><span id="tenkhachsan"></span></b><br>
                                <span>Hân hạnh phục vụ!</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <?php require_once "./mvc/views/Admin/pages/".$data["page"].".php";?>
                    </div>
                </div>
                <div id = "main-left">
                    <?php require_once "./mvc/views/Admin/pages/pages-con/".$data["pages-con"].".php";?>
                </div>
            </div>
            <div id="footer">
                <div id="footer-ul">
                    <ul class="">
                        <li class="">
                            <a href="">CHÍNH SÁCH BẢO MẬT</a>   
                        </li>
                        <li class="">
                            <a href="">QUY CHẾ HOẠT ĐỘNG</a>
                        </li>
                        <li class="">
                            <a href="">CHÍNH SÁCH DỊCH VỤ</a>
                        </li>
                        <li class="">
                            <a href="">CHÍNH SÁCH HỖ TRỢ KHÁCH HÀNG</a>
                        </li>
                    </ul>

                    <p >© 2022 - Bản quyền thuộc về Booking.com</p>
                </div>
            </div>
        </div>
    <!-- </form> -->
</body>
</html>

<script type="text/javascript">
	$.ajax({
			type: "GET",
			dataType: 'text',
			url: './../../../ckhachsan/getKhachSan' ,
			success: function(json){
				let khachsan = JSON.parse(json);
                if(khachsan){
                    $('#tenkhachsan').text(khachsan['tenkhachsan']);
                    $('#hotelname').text(khachsan['tenkhachsan']);
                }
                if(khachsan['img']){
                        $('#avt-ks').attr('src',"../../../mvc/assets/img/" +  khachsan['img']);
                    }         
			},
			error: function(error) {
				console.log(error);
			}
	});

    $.ajax({
			type: "GET",
			dataType: 'text',
			url: './../../../cAuth/getIDU' ,
			success: function(json){
				let user = JSON.parse(json);
                console.log(user);
                if(user){
                    $('#us-name').text(user['ten']);
                    if(user['avt']){
                        $('#avt-us').attr('src', "./../../../mvc/assets/img/" + user['avt']);
                    }
                }
			},
			error: function(error) {
				console.log(error);
			}
	});

    $.ajax({
			type: "GET",
			dataType: 'text',
			url: './../../../cadmin/getsotb' ,
			success: function(json){
				let thongbao = JSON.parse(json);
                if(thongbao >= 1){
                    $('#soluong').text(thongbao);
                    open()
                }
			},
			error: function(error) {
				console.log(error);
			}
	});

    $.ajax({
			type: "GET",
			dataType: 'text',
			url: './../../../cadmin/thongbao' ,
			success: function(json){
				let showtb = JSON.parse(json);
                    for( let i = 0; i < showtb.length; i++){
                        $('#showtb').append(`<a  href="./../../../cAdmin/admin/phieudat/tatca">
                        <li class="thongbao-item" id="backgr-tb${showtb[i]['maphieudat']}">
                            <div class="thongbao-img">
                                <i id="iconthongbao" class="fas fa-concierge-bell icon-concierge"></i>
                            </div>
                            <h5 class="thongbao-item-name"><b>Bạn có đơn đặt phòng mới:</b><br>Mã phiếu đặt: ${showtb[i]['maphieudat']} - Người đặt: ${showtb[i]['hoten']} <br><b>Click để xem chi tiết</b><i id="date">${showtb[i]['ngaynhan']}</i></h5>
                        </li>
                        </a>`);
                    }
			},
			error: function(error) {
				console.log(error);
			}
	});

    $.ajax({
			type: "GET",
			dataType: 'text',
			url: './../../../cadmin/thongbaochuaxn' ,
			success: function(json){
				let chuaxn = JSON.parse(json);
                console.log(chuaxn)
                    for( let i = 0; i < chuaxn.length; i++){
                        document.getElementById("backgr-tb"+chuaxn[i]['maphieudat']).style.backgroundColor = "#eee";
                    }
			},
			error: function(error) {
				console.log(error);
			}
	});

    function open(){
        document.getElementById("sotb").style.opacity = 1;
    }
</script>