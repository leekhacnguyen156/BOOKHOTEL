<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../mvc/assets/css/danhmuc.css">
    <link rel="stylesheet" href="../../../mvc/assets/css/phieudat.css">
    <title>Quản lý phiếu đặt</title>
</head>
<body>
    <form action="" method="POST">
    <div class="main-dm">
        <span>Tất cả phiếu đặt</span>
        <div id="qly-danhmuc">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã phiếu</th>
                        <th>Họ và tên</th>
                        <th>Tên phòng</th>
                        <th>Ngày nhận</th>
                        <th>Tình trạng</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody id="danhmuc-item">
                </tbody>
            </table>
        </div>
        <span id="null">(Phiếu đặt trống)</span>
        <div class="page" id="nb-page">

        </div>
    </div>
    </form>
    <div id="modal_sua">
        <form action="../../../cAdmin/admin/phieudat/tatca" method="POST" id="form-suadm">
            <div id="modal_overlay">
            <div id="modalsua_body">
                <div id="btn-close" onclick="closeModaldel()">
                    <img class="icon" src="../../../mvc/assets/img/del.svg" alt="">
                </div>
                <h3>Chi tiết phiếu đặt</h3>
                    <div class="form-error" id="form-error">
                        <i class="fas fa-exclamation-circle"></i>
                        <span id="message-error">dd</span>
                    </div>
                    <div class="chitiet-pd">
                        <div class="item-pd">
                            <span><b>Họ và tên:</b></span>
                            <input id="ten" class="input-pd" type="text">
                        </div>
                        <div class="item-pd">
                            <span><b>CMND/CCCD:</b></span>
                            <input id="cmnd" class="input-pd" type="text">
                        </div>
                        <div class="item-pd">
                            <span><b>Email:</b></span>
                            <input id="email" class="input-pd" type="text">
                        </div>
                        <div class="item-pd">
                            <span><b>Số điện thoại:</b></span>
                            <input id="sdt" class="input-pd" type="text">
                        </div>
                        <div class="item-pd">
                            <span><b>Phòng đặt:</b></span>
                            <input id="tenphong" class="input-pd" type="text">
                        </div>
                        <div class="item-pd">
                            <span><b>Giá:</b></span>
                            <input id="gia" class="input-pd" type="text">
                        </div>
                        <div class="item-pd">
                            <span><b>Ngày nhận phòng:</b></span>
                            <input id="ngaynhan" class="input-pd" type="text">
                        </div>
                        <div class="item-pd">
                            <span><b>Ngày trả phòng:</b></span>
                            <input id="ngaytra" class="input-pd" type="text">
                        </div>
                        <input type="hidden" id="mapd">
                    </div>
                <div id="btn" >
                    <button type="button" id="xoamodal" onclick="duyet()">Duyệt</button>
                    <button type="button" id="huydel" onclick="huyphieu()" style=" width: 90px;">Hủy Đơn</button>
                </div>
                <div id="daduyet">
                    <button type="button" id="">Đã duyệt</button>
                </div>
                <div id="dahuy">
                    <button type="button" id="">Đã Hủy</button>
                </div>
            </div>
            </div>
        </form>
    </div>
</body>
</html>
<script type="text/javascript">
    window.onload = function() {
        loadnbpagepd();
    }

    function loadnbpagepd(){
        $.ajax({
			type: "GET",
			dataType: 'text',
			url: './../../../cphieudat  /countphieudatAdmin' ,
			success: function(json){
                var page = JSON.parse(json) / 8;
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
                            <a type="button" class="btn active">${j}</a>
                        `);
                        loaddm();
                    }else{
                        $('#nb-page').append(`
                            <a type="button" class="btn">${j}</a>
                        `);
                    }
                }
                $('#nb-page').append(`
                    <a type="button">»</a>
                `);
                var header = document.getElementById("nb-page");
                var btns = header.getElementsByClassName("btn");
                for (var i = 0; i < btns.length; i++) {
                    btns[i].addEventListener("click", function() {
                        var current = document.getElementsByClassName("active");
                        current[0].className = current[0].className.replace(" active", "");
                        this.className += " active";
                        loaddm();
                    });
                }
			},
			error: function(error) {
				console.log(error);
			}
        });
    }

    function loaddm(){
        $('#danhmuc-item').empty();
        var active = document.getElementsByClassName("active");
        var count = 8;
        var start = ( active[0].innerText * count) - count;
        $.ajax({
			type: "POST",
            data: {'start': start, 'count': count},
			dataType: 'text',
			url: './../../../cphieudat/getPhieudatbyAdmin' ,
			success: function(json){
				var phieudat = JSON.parse(json);
                console.log(phieudat)
                if(phieudat.length != 0){
                    document.getElementById("null").style.display = "none";
                    var stt = start + 1;
                    for( let i = 0; i < phieudat.length; i++ ){
                        let trangthai = "";
                        if(phieudat[i]['trangthai'] == 0){
                            trangthai = "Chưa duyệt";
                        }else if(phieudat[i]['trangthai'] == 1){
                            trangthai = "Đã duyệt";
                        }else if(phieudat[i]['trangthai'] == 2){
                            trangthai = "Đã hủy";
                        }
                        $('#danhmuc-item').append(`<tr>
                            <td id="stt">${stt}</td>
                            <td id="stt">${phieudat[i]['maphieudat']}</td>
                            <td id="tendm">${phieudat[i]['hoten']}</td>
                            <td id="tendm">${phieudat[i]['tenloai']}</td>
                            <td id="mota">${phieudat[i]['ngaynhan']}</td>
                            <td><p id="tthai${phieudat[i]['maphieudat']}">${trangthai}</p></td>
                            <td><div id="chitiet" class="edit" id="" onclick="chitietpd(${phieudat[i]['maphieudat']})">Chi tiết</div></td>
                        </tr>`);
                        stt++;
                    }
                }else{
                    document.getElementById("null").style.display = "block";
                    document.getElementById("qly-danhmuc").style.display = "none";
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
                    for( let i = 0; i < chuaxn.length; i++){
                        document.getElementById("tthai"+chuaxn[i]['maphieudat']).style.color = "red";
                    }
			},
			error: function(error) {
				console.log(error);
			}
	    });
    }

    function chitietpd(id){
        $.ajax({
			type: "POST",
            data: {'idpd': id},
			dataType: 'text',
			url: './../../../cphieudat/getpdbyid' ,
			success: function(json){
				var phieudat = JSON.parse(json);
                for( let i = 0; i < phieudat.length; i++ ){
                    $('#ten').val(phieudat[i]['hoten']);
                    $('#cmnd').val(phieudat[i]['cmnd']);
                    $('#email').val(phieudat[i]['email']);
                    $('#sdt').val(phieudat[i]['sdt']);
                    $('#tenphong').val(phieudat[i]['tenloai']);
                    $('#gia').val(phieudat[i]['gia']);
                    $('#ngaynhan').val(phieudat[i]['ngaynhan']);
                    $('#ngaytra').val(phieudat[i]['ngaytra']);
                    $('#mapd').val(phieudat[i]['maphieudat']);
                    if(phieudat[i]['trangthai'] == 1){
                        document.getElementById("daduyet").style.display = "block";
                        document.getElementById("btn").style.display = "none";
                        document.getElementById("dahuy").style.display = "none";
                    }else if(phieudat[i]['trangthai'] == 0){
                        document.getElementById("daduyet").style.display = "none";
                        document.getElementById("btn").style.display = "block";
                        document.getElementById("dahuy").style.display = "none";
                    }else if(phieudat[i]['trangthai'] == 2){
                        document.getElementById("daduyet").style.display = "none";
                        document.getElementById("btn").style.display = "none";
                        document.getElementById("dahuy").style.display = "block";
                    }
                    var modal = document.getElementById("modal_sua");
                    modal.style.display='block';
                }
			},
			error: function(error) {
				console.log(error);
			}
        });
    }

    function duyet(){
        let idpd = $('#mapd').val();
		$.ajax({
				type: "POST",
                data: {'idpd': idpd},
				dataType: 'text',
				url: './../../../cphieudat/duyetphieudat' ,
				success: function(json){
					let result = JSON.parse(json);
					if(result === 'Null'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Có lỗi xảy ra, Vui lòng thử lại !");
					}else if(result === 'ok'){
						alert("Duyệt phiếu đặt phòng thành công!");
                        var modal = document.getElementById("modal_sua");
                        modal.style.display='none';
                        loaddm();
                        location.reload()
					}
				},
				error: function(error) {
					console.log(error);
				}
		});
    }

    function huyphieu(){
        let idpd = $('#mapd').val();
        var check = confirm("Bạn chắc chắn muốn hủy phiếu đặt phòng này?");
        if(check){
            $.ajax({
				type: "POST",
                data: {'idpd': idpd},
				dataType: 'text',
				url: './../../../cphieudat/huyphieudat' ,
				success: function(json){
					let result = JSON.parse(json);
					if(result === 'Null'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Có lỗi xảy ra, Vui lòng thử lại !");
					}else if(result === 'ok'){
						alert("Duyệt phiếu đặt phòng thành công!");
                        var modal = document.getElementById("modal_sua");
                        modal.style.display='none';
                        loaddm();
                        location.reload();
					}
				},
				error: function(error) {
					console.log(error);
				}
		    });
        }
    }

    function closeModaldel(){
        var modal = document.getElementById("modal_sua");
        modal.style.display='none';
    }
</script>