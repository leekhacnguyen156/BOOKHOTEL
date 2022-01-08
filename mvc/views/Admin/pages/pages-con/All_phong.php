<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../mvc/assets/css/phong.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Document</title>
</head>
<body>
    <!-- <form action="" method="POST"> -->
        <div class="main-phong">
            <span>Tất cả phòng</span>
            <div id="list-room">
                <!-- <div class="room">
                    <div id="header-room">
                        <div class="sua" onclick="openModal()"><img class="icon" src="../../../mvc/assets/img/edit.svg" alt=""></div>
                        <h4>Phòng view biển | HomeStay</h4>
                        <div id="xoa" onclick="openModaldel()"><img class="icon" src="../../../mvc/assets/img/del.svg" alt=""></div>
                    </div>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXOeIcOm5DeKm-4LzOQabol0HCdmLOOpf-Wg&usqp=CAU" alt="">
                    <p id="mota">Phòng lớn view biển 2 giường đôi có máy lạnh, wifi</p>
                    <div class="inf">
                        <div class="inf-item">
                            <p><b>Giá:</b> 200.000vnd</p>
                            <p><b>Số lượng:</b> 5 phòng</p>
                        </div>
                        <div class="inf-item">
                            <p><b>Diện tích:</b> 30m2</p>
                            <p><b>Số khách:</b> 4 người</p>
                        </div>
                    </div>
                </div> -->
            </div>
            <p id="null">NUll</p>
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
        <div id="modal">
            <div id="modal_overlay">
            <div id="modal_body">
                <h3>SỬA PHÒNG</h3>
                <div class="form-error" id="form-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <span id="message-error"></span>
                </div>
                <div id="modal_item">
                    <div id="inf-edit">
                        <div class="item-edit">
                            <label for="">Tên phòng:</label>
                            <input type="text" id="tenphong-sua">
                        </div>
                        <div class="item-edit">
                            <label for="">Mô tả:</label>
                            <input type="text" id="mota-sua">
                        </div>
                        <div class="item-edit">
                            <label for="">Số lượng:</label>
                            <input type="text" id="sl-sua">
                        </div>
                        <div class="item-edit">
                            <label for="">Số khách:</label>
                            <input type="text" id="sokhach-sua">
                        </div>
                        <div class="item-edit">
                            <label for="">Giá:</label>
                            <input type="text" id="gia-sua">
                        </div>
                        <div class="item-edit">
                            <label for="">Diện tích:</label>
                            <input type="text" id="dtich-sua">
                        </div>
                    </div>
                    <div id="anh-phong">
                        <div class="img-phong">
                            <label for=""><b>Ảnh tiêu đề</b></label>
                            <img id="img-sua" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXOeIcOm5DeKm-4LzOQabol0HCdmLOOpf-Wg&usqp=CAU" alt="">
                            <input type="file" name="" id="filetieude" onchange="choose(event)">
                        </div>
                        <div class="img-phong">
                            <label for=""><b>Ảnh mô tả mới</b></label>
                            <div id=img-mota>
                                <!-- <div>
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXOeIcOm5DeKm-4LzOQabol0HCdmLOOpf-Wg&usqp=CAU" alt="">
                                </div>
                                <div>
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXOeIcOm5DeKm-4LzOQabol0HCdmLOOpf-Wg&usqp=CAU" alt="">
                                </div>
                                <div>
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXOeIcOm5DeKm-4LzOQabol0HCdmLOOpf-Wg&usqp=CAU" alt="">
                                </div>
                                <div>
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXOeIcOm5DeKm-4LzOQabol0HCdmLOOpf-Wg&usqp=CAU" alt="">
                                </div> -->
                            </div>
                            <input type="file" name="fileminhhoa[]" id="fileminhhoa[]" multiple="multiple" onchange="chooseimgs()">
                        </div>
                    </div>
                    <div>
                        <div class="img-phong">
                            <label for=""><b>Ảnh mô tả cũ</b></label>
                            <div id=img-mota-cu>
                                <!-- <div>
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXOeIcOm5DeKm-4LzOQabol0HCdmLOOpf-Wg&usqp=CAU" alt="">
                                </div>
                                <div>
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXOeIcOm5DeKm-4LzOQabol0HCdmLOOpf-Wg&usqp=CAU" alt="">
                                </div>
                                <div>
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXOeIcOm5DeKm-4LzOQabol0HCdmLOOpf-Wg&usqp=CAU" alt="">
                                </div>
                                <div>
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXOeIcOm5DeKm-4LzOQabol0HCdmLOOpf-Wg&usqp=CAU" alt="">
                                </div> -->
                                <p id="img-null">Không có ảnh!</p>
                            </div>
                        </div>
                        <div class="item-up" id="dichvu-ks" style="margin-top: 10px;">
                            <label for="dichvu"><b>Dịch vụ</b></label>
                            <div id="dvu">
                                <!-- <div>
                                    <input type="checkbox" id="dichvu">
                                </div> -->
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div id="btn">
                    <button type="button" id="luu" onclick="updatePhong()">Lưu</button>
                    <button type="button" id="huy" onclick="closeModal()">Hủy</button>
                </div>
            </div>
            </div>
        </div>
        <div id="modal_delete">
            <div id="modal_overlay">
            <div id="modaldel_body">
                <h3>Xóa phòng</h3>
                <p>Bạn chắc chắn muốn xóa phòng này?</p>
                <input type="hidden" id="maloai-xoa">
                <div id="btn">
                    <button type="button" id="xoamodal" onclick="xoaphong()">Xóa</button>
                    <button id="huydel" onclick="closeModaldel()">Hủy</button>
                </div>
            </div>
            </div>
        </div>
    <!-- </form> -->
</body>
</html>

<script type="text/javascript">
    var images = [];
    var img_phong_cu = "";
    var idphong = -1;
    var iddm = -1;
    var giacu = 0;
    const formatter = new Intl.NumberFormat('vi', {
        style: 'currency',
        currency: 'VND',
        minimumFractionDigits: 0
    });

    window.onload = function() {
        loadnbpagedm();
    }

    function choose(event){
        var output = document.getElementById("img-sua");
        var reader = new FileReader();
        reader.onload = function(){
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    function loadnbpagedm(){
        $.ajax({
			type: "GET",
			dataType: 'text',
			url: './../../../cphong/countPhong' ,
			success: function(json){
                var page = JSON.parse(json) / 6;
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
                        showphong();
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
                        showphong();
                    });
                }
			},
			error: function(error) {
				console.log(error);
			}
        });
    }

    $.ajax({
			type: "GET",
			dataType: 'text',
			url: '../../../cphong/getdichvu' ,
			success: function(json){
				let dichvu = JSON.parse(json);
                for(let i = 0; i < dichvu.length; i++){
                    $('#dvu').append(`
                    <div>
                        <input type="checkbox" id="${'dichvu' + dichvu[i]['madv']}" name="dichvu" value="${dichvu[i]['madv']}">${dichvu[i]['tendv']}
                    </div>
                    `);
                }
			},
			error: function(error) {
				console.log(error);
			}
	});


    function openModal(id){
        idphong = id;
        var modal = document.getElementById("modal");
        modal.style.display='block';
        $.ajax({
			type: "POST",
            data: { 'maloai': id },
			dataType: 'text',
			url: '../../../cphong/getphongupdate' ,
			success: function(json){
                let phong = JSON.parse(json);
                console.log(phong);
                $('#tenphong-sua').val(phong['tenloai']);
                $('#sl-sua').val(phong['soluong']);
                $('#mota-sua').val(phong['mota']);
                $('#sokhach-sua').val(phong['sokhach']);
                $('#dtich-sua').val(phong['dientich']);
                $('#img-sua').attr('src',  "../../../mvc/assets/img/" + phong['anhtieude']);
                img_phong_cu = phong['anhtieude'];
                iddm = phong['madm'];
            },
			error: function(error) {
				console.log(error);
			}
        });

        $.ajax({
			type: "POST",
            data: { 'idphong': id },
			dataType: 'text',
			url: '../../../cphong/getGiaNew' ,
			success: function(json){
                let gia = JSON.parse(json);
                console.log(gia);
                $('#gia-sua').val(gia);
                giacu = gia;
			},
			error: function(error) {
				console.log(error);
			}
        });

        getanhmota(id);

        $.ajax({
			type: "POST",
            data: { 'maloai': id },
			dataType: 'text',
			url: '../../../cphong/getdichvucu' ,
			success: function(json){
                let dichvu = JSON.parse(json);
                console.log(dichvu);
                for(let i = 0; i < dichvu.length; i++){
                    $(`#dichvu${dichvu[i]['madv']}`).prop('checked', true);
                }
			},
			error: function(error) {
				console.log(error);
			}
        });
    }

    function getanhmota(id){
        $.ajax({
			type: "POST",
            data: { 'maloai': id },
			dataType: 'text',
			url: '../../../cphong/getanhmotaupdate' ,
			success: function(json){
                let img = JSON.parse(json);
                console.log(img);
                $('#img-mota-cu').empty();
                for(let i = 0; i < img.length; i++){
                    $('#img-mota-cu').append(`
                    <div>
                        <div id="xoa-img-cu" onclick="deleteimgcu(${img[i]['id_img']})"><img class="icon" src="../../../mvc/assets/img/del.svg" alt=""></div>
                        <img src="../../../mvc/assets/imgmota/${img[i]['img']}" alt="">
                    </div>
                    `);
                }
			},
			error: function(error) {
				console.log(error);
			}
        });
    }

    function openModaldel(id){
        $('#maloai-xoa').val(id);
        var modal = document.getElementById("modal_delete");
        modal.style.display='block';
    }

    function closeModal(){
        var modal = document.getElementById("modal");
        modal.style.display='none';
    }

    function closeModaldel(){
        var modal = document.getElementById("modal_delete");
        modal.style.display='none';
    }

    function xoaphong(){
        let idphong = $('#maloai-xoa').val();

        var form_data = new FormData();                  
        form_data.append('idphong', idphong);
		$.ajax({
				type: "POST",
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
				dataType: 'text',
				url: '../../../cphong/deletephong' ,
				success: function(json){
					let result = JSON.parse(json);
					if(result == 'thanhcong'){
						document.getElementById("modal_delete").style.display='none';
                        loadnbpagedm();
					}
				},
				error: function(error) {
					console.log(error);
				}
		});
    }

    function showphong(){
        $('#list-room').empty();
        var active = document.getElementsByClassName("active");
        var count = 6;
        var start = ( active[0].innerText * count) - count;
        $.ajax({
			type: "POST",
            data: {'start': start, 'count': count},
			dataType: 'text',
			url: '../../../cphong/getphong' ,
			success: function(json){
				var phong = JSON.parse(json);
                console.log(phong);
                if(phong.length != 0){
                    document.getElementById("null").style.display = "none";
                    for(i = 0; i < phong.length; i++){
                        var g = 0;
                        $('#list-room').append(`
                            <div class="room">
                                <div id="header-room">
                                    <div class="sua" onclick="openModal(${phong[i]['maloai']})"><img class="icon" src="../../../mvc/assets/img/edit.svg" alt=""></div>
                                    <h4>${phong[i]['tenloai']} | ${phong[i]['tendm']}</h4>
                                    <div id="xoa" onclick="openModaldel(${phong[i]['maloai']})"><img class="icon" src="../../../mvc/assets/img/del.svg" alt=""></div>
                                </div>
                                <img id="img-phong" src="../../../mvc/assets/img/${phong[i]['anhtieude']}" alt="">
                                <p id="mota">${phong[i]['mota']}</p>
                                <div class="inf">
                                    <div class="inf-item">
                                        <p><b>Giá:</b><span id="${'gia' + phong[i]['maloai']}"></span></p>
                                        <p><b>Số lượng:</b> ${phong[i]['soluong']} phòng</p>
                                    </div>
                                    <div class="inf-item">
                                        <p><b>Diện tích:</b> ${phong[i]['dientich']}</p>
                                        <p><b>Số khách:</b> ${phong[i]['sokhach']} người</p>
                                    </div>
                                </div>
                            </div>`);
                            getGia(phong[i]['maloai']);
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
    }

    function getGia(idphong){
        $.ajax({
			type: "POST",
            data: { 'idphong': idphong },
			dataType: 'text',
			url: '../../../cphong/getGiaNew' ,
			success: function(json){
                $(`#gia${idphong}`).text(' ' + formatter.format(JSON.parse(json)));
			},
			error: function(error) {
				console.log(error);
			}
        });
    }

    function chooseimgs(){
        var image = document.getElementById('fileminhhoa[]').files;
        for (i = 0; i < image.length; i++) {
            images.push({
                "name": image[i].name,
                "url": URL.createObjectURL(image[i]),
                "file": image[i],
            });
        }
        image_show();
    }

    function updatePhong(){
        let tenphong = $("#tenphong-sua").val();
        let mota = $("#mota-sua").val();
        let sl = $("#sl-sua").val();
        let sokhach = $("#sokhach-sua").val();
        let gia = $("#gia-sua").val();
        let dtich = $("#dtich-sua").val();
        let filetieude = $('#filetieude')[0].files[0];
        var form = new FormData();
        var dv = "";
        $.each($("input[name='dichvu']:checked"), function(i){
            dv += $(this).val() + ",";
        });
        dv = ( dv.slice( 0, (dv.length - 1) ) );
        console.log(dv);
        for (let index = 0; index < images.length; index++) {
            form.append("file" + index, images[index]['file']);
        }
        var c = images.length;
        form.append("iddm", iddm);
        form.append("maloai", idphong);
        form.append("dichvu", dv);
        form.append("tenphong", tenphong);
        form.append("mota", mota);
        form.append("soluong", sl);
        form.append("sokhach", sokhach);
        form.append("dtich", dtich);
        form.append("gia", gia);
        form.append("giacu", giacu);
        form.append("imgphongcu", img_phong_cu);
        form.append("dichvu", dv);
        form.append("filetieude", filetieude);
        form.append("slfile", c);
        $.ajax({
				type: "POST",
				data: form,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'text',
				url: '../../../cphong/updatePhong' ,
				success: function(json){
					let result = JSON.parse(json);
					if(result === 'tenphong'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Tên phòng đã bị trùng!");
					}else if(result === 'null'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Vui lòng kiểm tra lại các trường bỏ trống !");
					}else if(result === 'fail'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Vui lòng thử lại sau !");
					}else{
						document.getElementById('form-error').style.display = 'none';
                        document.getElementById('modal').style.display = 'none';
                        showphong();
					}
				},
				error: function(error) {
					console.log(error);
				}
		});
    }

    function image_show() {
        $('#img-mota').empty();
        for(let i = 0; i < images.length; i++){
            $('#img-mota').append(`
                <div id="${i}">
                    <div id="xoa-img" onclick="deleteimg(${i})"><img class="icon" src="../../../mvc/assets/img/del.svg" alt=""></div>
                    <img src="${images[i].url}" alt="">
                </div>
            `);
        }
    }

    function deleteimg(index){
        images.splice(index, 1);
        if(images.length == 0){
            document.getElementById('fileminhhoa[]').value = "";
        }
        image_show();
    }

    function deleteimgcu(id){
        let idimg = id;
        var form_data = new FormData();                  
        form_data.append('idimg', idimg);
        var check = confirm("Bạn chắc chắn muốn xóa ảnh này?");
        if(check){
            $.ajax({
				type: "POST",
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
				dataType: 'text',
				url: '../../../cphong/deleteimgmota' ,
				success: function(json){
                    getanhmota(idphong);
				},
				error: function(error) {
					console.log(error);
				}
		});
        }
    }
</script>