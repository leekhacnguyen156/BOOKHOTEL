<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../mvc/assets/css/danhmuc.css">
    <title>Document</title>
</head>
<body>
    <div>
    <form action="../../../cAdmin/admin/dm/all" method="POST" enctype="multipart/form-data" id="form-danhmuc">
        <div class="main-dm">
            <span>Thêm danh mục</span>
                <div class="form-error" id="form-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <span id="message-error"></span>
                </div>
            <div id="them-dm">
                <div id="inf-add">
                    <div class="item-add">
                        <label for="">Tên danh mục: </label>
                        <input id="tendmm" name="tendmm" type="text">
                    </div>
                    <div class="item-add">
                        <label for="">Mô tả: </label>
                        <textarea name="mota" id="mota" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <div id="anhdanhmuc">
                    <label for="">Ảnh mô tả</label>
                    <img id="img-dm" src="data:image/jpeg;base64,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" alt="">
                    <input type="file" name="img" id="img" onchange="choose(event)">
                </div>
            </div>
            <div id="btn-add">
                <button type="button" onclick="insertdanhmuc()">Thêm</button>
            </div>
        </div>
    </form>
    </div>
</body>
</html>

<script>
    //onchange="choose(event)"
    function choose(event){
        var output = document.getElementById("img-dm");
        var reader = new FileReader();
        reader.onload = function(){
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    function insertdanhmuc(){
		let tendm = $('#tendmm').val();
		let mota = $('#mota').val();
        let hinhanh = $('#img').val();
        var file_data = $('#img')[0].files[0];

        var form_data = new FormData();                  
        form_data.append('tendm', tendm);
        form_data.append('mota', mota);
        form_data.append('img', file_data);
		$.ajax({
				type: "POST",
				data: form_data,
                cache: false,
                contentType: false,
                processData: false,
				dataType: 'text',
				url: './../../../cdanhmuc/insertdanhmuc' ,
				success: function(json){
					let result = JSON.parse(json);
					if(result === 'tendm'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Tên danh mục bị trùng, vui lòng nhập tên khác!");
					}else if(!hinhanh.trim()){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Vui lòng chọn ảnh mô tả !");
					}else if(result === 'fail'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Xảy ra lỗi, Vui lòng thử lại!");
					}else if(result === 'null'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Vui lòng nhập đầy đủ thông tin !");
					}else{
						document.getElementById('form-error').style.display = 'none';
						$('#form-danhmuc').submit();
					}
				},
				error: function(error) {
					console.log(error);
				}
		});
	}
</script>