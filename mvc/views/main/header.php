<header class="header">
    <div class="grid">
        <nav class="header_navbar">
            <ul class="header_navbar-list">
                <li class="header_navbar-item header_navbar-web">
                    <span id="none-hotel" class="check-hotel"><a href="http://localhost/BOOKHOTEL/cAuth/viewregister_hotel">Bạn chưa có khách sạn? Đăng ký ngay nào!</a></span>
                    <span id="yes-hotel" class="check-hotel"><a href="http://localhost/BOOKHOTEL/cAdmin/admin/khachsan/inf">Khách sạn của bạn</a></span>
                </li>
            </ul>
            <ul class="header_navbar-list">
                <li class="header_navbar-item tb">
                    <div class="header_navbar-item-link">
                        <i class="far fa-bell icon_bell"></i>Thông báo
                    </div>
                    <?php
                        if(isset($_SESSION['mataikhoan'])){
                    ?>
                    <div class="thongbao">
                        <h4 class="thongbao-heading">Thông báo của bạn</h4>
                        <h5 class="tb_null" id="tb_null">"Chưa có thông báo"</h5>
                        <ul class="thongbao-list" id="showtb_us">
                            <!-- <a href="./../cUser/viewUser/history" class="tb_us">
                            <li class="thongbao-item">
                                <div class="thongbao-img">
                                    <i class="fas fa-concierge-bell icon-concierge"></i>
                                </div>
                                <h5 class="thongbao-item-name"><b>Đơn đặt phòng mã 01 của bạn:</b><br>Đã được <b>Ráy cá home stay</b> xác nhận!<br> <br><b>Click để xem chi tiết</b><i id="date">12/02/2021</i></h5>
                            </li>
                            </a> -->
                        </ul>
                    </div>
                    <!--Số thông báo-->
                    <div class="number_notify" id="sotbus">
                        <span id="sotb_us">3</span>
                    </div>
                    <?php
                        }
                    ?>
                </li>
                
                <li class="header_navbar-item">
                    <a href="" class="header_navbar-item-link">
                        <i class="far fa-question-circle icon_help"></i> Trợ giúp
                    </a>
                </li>
                <li id="dk" class="header_navbar-item">
                    <a href="http://localhost/BOOKHOTEL/cAuth/signup" class="header_navbar-item-link">
                        Đăng ký
                    </a>
                </li>
                <li id="dn" class="header_navbar-item">
                    <a href="http://localhost/BOOKHOTEL/cAuth/viewlogin" class="header_navbar-item-link">
                        Đăng nhập
                    </a>
                </li>
                <li id="user"class="header_navbar-item user-item">
                    <img id="avt-us" src="https://i.pinimg.com/originals/57/fb/31/57fb3190d0cc1726d782c4e25e8561e9.png" alt="avt" class="avt">
                    <div>
                        <span id="us-name" class="name-user"></span>
                        <div id="us-item">
                            <div class="us-itemcon"><a href="http://localhost/BOOKHOTEL/cUser/viewUser/hoso"> Trang cá nhân</a></div>
                            <div class="us-itemcon"><a href="http://localhost/BOOKHOTEL/cUser/viewUser/doimatkhau"> Đổi mật khẩu</a></div>
                            <div class="us-itemcon"><a onclick="return confirm('Bạn chắc chắn muốn đăng xuất?')" href="http://localhost:8080/BOOKHOTEL/cAuth/logout"> Đăng xuất</a></div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        <div><a href="http://localhost/BOOKHOTEL/chome/home" class="name_web">BOOKHOTEL<span class="com">.com<span></a></div>
    </div>
</header>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
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
                        $('#avt-us').attr('src', "http://localhost/BOOKHOTEL/mvc/assets/img/" + user['avt']);
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

    $.ajax({
			type: "GET",
			dataType: 'text',
			url: 'http://localhost/BOOKHOTEL/cUser/getsotb_user' ,
			success: function(json){
				let thongbao = JSON.parse(json);
                console.log(thongbao)
                if(thongbao >= 1){
                    document.getElementById("tb_null").style.display = "none";
                    $('#sotb_us').text(thongbao);
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
			url: 'http://localhost/BOOKHOTEL/cUser/gettb_user' ,
			success: function(json){
				let thongbaous = JSON.parse(json);
                for( let i = 0; i < thongbaous.length; i++){
                    document.getElementById("tb_null").style.display = "none";
                        $('#showtb_us').append(`<a href="http://localhost/BOOKHOTEL/cUser/viewUser/history" onclick="update(${thongbaous[i]['maphieudat']})" class="tb_us">
                            <li class="thongbao-item" id="tbchuaxem${thongbaous[i]['maphieudat']}">
                                <div class="thongbao-img">
                                    <i class="fas fa-concierge-bell icon-concierge"></i>
                                </div>
                                <h5 class="thongbao-item-name"><b>Đơn đặt phòng mã "${thongbaous[i]['maphieudat']}" của bạn:</b><br><span id="tbus_tt${thongbaous[i]['maphieudat']}">Đã được </span><b>${thongbaous[i]['tenkhachsan']}</b> <span id="tbus${thongbaous[i]['maphieudat']}">XÁC NHẬN!</span><br><span id="tbus_text${thongbaous[i]['maphieudat']}">Vui lòng nhận phòng đúng hạn nhé!</span><br><b>Click để xem chi tiết</b><i id="date">${thongbaous[i]['ngaynhan']}</i></h5>
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
			url: 'http://localhost/BOOKHOTEL/cUser/gettbhuy_user' ,
			success: function(json){
				let thongbaohuy = JSON.parse(json);
                for( let i = 0; i < thongbaohuy.length; i++){
                    document.getElementById("tb_null").style.display = "none";
                    $('#tbus_tt'+thongbaohuy[i]['maphieudat']).text("Đã bị ");
                    $('#tbus'+thongbaohuy[i]['maphieudat']).text("HỦY");
                    document.getElementById("tbus"+thongbaohuy[i]['maphieudat']).style.color = "red";
                    $('#tbus_text'+thongbaohuy[i]['maphieudat']).text("Mong quý khách thông cảm! Xin chân thành cảm ơn");
                }
			},
			error: function(error) {
				console.log(error);
			}
	});

    $.ajax({
			type: "GET",
			dataType: 'text',
			url: 'http://localhost/BOOKHOTEL/cUser/gettchuaxem_user' ,
			success: function(json){
				let chuaxem = JSON.parse(json);
                console.log(chuaxem)
                    for( let i = 0; i < chuaxem.length; i++){
                        document.getElementById("tb_null").style.display = "none";
                        document.getElementById("tbchuaxem"+chuaxem[i]['maphieudat']).style.backgroundColor = "#eee";
                    }
			},
			error: function(error) {
				console.log(error);
			}
	});

    function open(){
        document.getElementById("sotbus").style.opacity = 1;
    }

    function update(id){
		$.ajax({
				type: "POST",
				data: {'idpd': id},
				dataType: 'text',
				url: './../cUser/update_tbus' ,
				success: function(json){
					let result = JSON.parse(json);
				},
				error: function(error) {
					console.log(error);
				}
		});
    }
</script>