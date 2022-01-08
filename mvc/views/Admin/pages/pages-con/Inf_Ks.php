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
    <div id="main-inf">
        <div id="ten">
            <h2 id="tenkhachsannhe"></h2>
            <h2>&middot;&#8226;&#10046;&#8226;&#183;</h2>
            <span id="mota"></span>
        </div>
        <div id="img-hotel">
            <img id="avtkhachsan" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRNDD6bRegk4LZgK3FwpcbsBOct1QJPzRoa4A&usqp=CAU" alt="">
        </div>
        <div id="thongtin">
            <div>
                <h3>Thông tin liên hệ</h3>
                <div id="tt-lienhe">
                    <div><b>Địa chỉ:</b><a id="diachi" href="#"></a></div>
                    <div><b>Điện thoại:</b> <a id="sdt" href="#"></a></div>
                    <div><b>Email:</b> <a id="email" href="#"></a></div>
                    <div><b>Website:</b> <a id="web" href="#"></a></div>
                    <div><b>Facebook:</b> <a id="fb" href="#"></a></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
	$.ajax({
			type: "GET",
			dataType: 'text',
			url: './../../../ckhachsan/getKhachSan' ,
			success: function(json){
				let khachsan = JSON.parse(json);
                console.log(khachsan);
                if(khachsan){
                    $('#tenkhachsannhe').text(khachsan['tenkhachsan']);
                    $('#mota').text(khachsan['mota']);
                    $('#diachi').text(khachsan['diachi']);
                    $('#sdt').text(khachsan['phone']);
                    $('#email').text(khachsan['email']);
                    if(khachsan['website']){
                        $('#web').text(khachsan['website']);
                    }else{
                        $('#web').text('Chưa cập nhật');
                    }
                    if(khachsan['facebook']){
                        $('#fb').text(khachsan['facebook']);
                    }else{
                        $('#fb').text('Chưa cập nhật');
                    }
                    if(khachsan['img']){
                        $('#avtkhachsan').attr('src',"../../../mvc/assets/img/" +  khachsan['img']);
                    }
                }         
			},
			error: function(error) {
				console.log(error);
			}
	});
</script>