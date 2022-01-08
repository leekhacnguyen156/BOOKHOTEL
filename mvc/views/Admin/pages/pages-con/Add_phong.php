<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../mvc/assets/css/qly_ks.css">
    <title>Document</title>
</head>
<body>
    <form action="../../../cAdmin/admin/phong/all_p" method="POST" id="form-update-ks">
    <div id="main-inf">
        <span>Thêm Phòng</span>
        <div id="update">
            <div id="inf-update">
                <div id="inf-item">
                    <div class="form-error" id="form-error">
                        <i class="fas fa-exclamation-circle"></i>
                        <span id="message-error"></span>
                    </div>
                    <div class="item-up mota">
                        <label for="dm">Danh mục</label>
                        <select name="dmm" id="dmm">
                            <option disable>Chọn danh mục</option>
                        </select>
                    </div>
                    <div class="item-up">
                        <label for="tenphong">Tên phòng</label>
                        <input type="text" id="tenphong">
                    </div>
                    <div class="item-up">
                        <label for="gia">Giá phòng</label>
                        <input type="text" id="gia">
                    </div>
                    <div class="item-up mota">
                        <label for="">Mô tả</label>
                        <textarea name="mota" id="mota" cols="30" rows="10"></textarea>
                    </div>
                    <div class="item-up">
                        <label for="soluong">Số lượng</label>
                        <input type="text" id="soluongnha">
                    </div>
                    <div class="item-up">
                        <label for="sokhach">Số khách</label>
                        <input type="text" id="sokhach">
                    </div>
                    <div class="item-up">
                        <label for="dtich">Diện tích</label>
                        <input type="text" id="dtich">
                    </div>
                    <div class="item-up" id="dichvu-ks">
                        <label for="dichvu">Dịch vụ</label>
                        <div id="dvu">
                            <!-- <div>
                                <input type="checkbox" id="dichvu">
                            </div> -->
                        </div>
                    </div>
                </div>
                <div id="img">
                    <div id="img-avt">
                        <label for="">Ảnh đại diện</label><br>
                        <img id="imgtieude" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJ2jS4CGRO9chtUITmGa02G53qdkOSLItI4g&usqp=CAU" alt=""><br>
                        <input id="filetieude" type="file" onchange="choose(event)">
                    </div>
                    <div id="img-anhmota">
                        <label for="">Ảnh mô tả</label><br>
                        <div id="anhmota">
                        </div>
                        <input type="file" name="fileminhhoa[]" id="fileminhhoa[]" multiple="multiple" onchange="chooseimgs()">
                    </div>
                </div>
            </div>
            <div id="btn-update">
                <button type="button" onclick="addphong()">Thêm</button>
            </div>
        </div>
    </div>
    </form>
</body>
</html>

<script type="text/javascript">
    var images = [];

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

	$.ajax({
			type: "GET",
			dataType: 'text',
			url: '../../../cdanhmuc/getdanhmuc' ,
			success: function(json){
				let result = JSON.parse(json);
                console.log(result);
                for(let i = 0; i < result.length; i++){
                    $('#dmm').append(`
                        <option id="${result[i]['madm']}" value="${result[i]['madm']}">${result[i]['tendm']}</option>
                    `);
                }
			},
			error: function(error) {
				console.log(error);
			}
	});

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

    function image_show() {
        $('#anhmota').empty();
        for(let i = 0; i < images.length; i++){
            $('#anhmota').append(`
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

    function choose(event){
        var output = document.getElementById("imgtieude");
        var reader = new FileReader();
        reader.onload = function(){
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    function addphong(){
        var iddm = $('#dmm').val();
        var tenphong = $('#tenphong').val();
        var gia = $('#gia').val();
        var soluong = $('#soluongnha').val();
        var mota = $('#mota').val();
        var sokhach = $('#sokhach').val();
        var dtich = $('#dtich').val();
        var filetieude = $('#filetieude')[0].files[0];
        var form = new FormData()
        for (let index = 0; index < images.length; index++) {
            form.append("file" + index, images[index]['file']);
        }
        var dv = "";
        $.each($("input[name='dichvu']:checked"), function(i){
            dv += $(this).val() + ",";
        });
        console.log(dv);
        dv = ( dv.slice( 0, (dv.length - 1) ) );
        form.append("iddm", iddm);
        form.append("tenphong", tenphong);
        form.append("mota", mota);
        form.append("soluong", soluong);
        form.append("sokhach", sokhach);
        form.append("dtich", dtich);
        form.append("gia", gia);
        form.append("dichvu", dv);
        form.append("filetieude", filetieude);
        var c = images.length;
        form.append("slfile", c);
        $.ajax({
				type: "POST",
				data: form,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'text',
				url: '../../../cphong/addPhong' ,
				success: function(json){
					let result = JSON.parse(json);
                    console.log(result);
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
                        alert("Thành công!")
						$('#form-update-ks').submit();
					}
				},
				error: function(error) {
					console.log(error);
				}
		});
    }
</script>