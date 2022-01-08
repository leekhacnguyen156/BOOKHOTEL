<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../mvc/assets/css/user1.css">
    <link rel="stylesheet" href="../../mvc/assets/css/home1.css">
    <link rel="stylesheet" href="../../mvc/assets/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div>
        <div class="user_header">
            <div class="control_user">
                <a href="../../chome/home" class="return_home"><i class="icon_home fas fa-home"></i></a>
            </div>
            <div class="navbar_user">
                <div><a href="http://localhost/BOOKHOTEL/chome/home" class="name_web">BOOKHOTEL<span class="com">.com<span></a></div>
                <div class="slogan_hotel">
                    <h2 class="tienganh">Your Passion is our Satisfaction</h2>
                    <marquee class="tiengviet">Đam mê của bạn là sự hài lòng của chúng tôi</marquee>
                </div>
            </div>

        </div>
        <div class="web">
            <form action="">
                <div class="container_user">
                    <div class="grid main">
                        <div class="left">
                            <div class="left_left">
                                <div class="user">
                                    <img src="../../mvc/assets/img/avt.jpg" alt="" class="avt" id="avt2">
                                    <div class="name_edit">
                                        <input id="tentkhe" name="tentkhe" class="name" disabled>
                                        <div class="edit">
                                            <i class="icon_edit fas fa-pencil-alt"></i>
                                            <a href="#" class="edit_link">Sửa hồ sơ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tacvu">
                                    <ul class="list">
                                        <li class="item">
                                            <span href="" class="link feat-btn">
                                                <i class="icon_user far fa-user"></i>Tài khoản của tôi
                                            </span>

                                            <ul class="list_con feat-show">
                                                <li class="item">
                                                    <a href="./../viewUser/<?= $url = "hoso" ?>" class="link_con" style="color: blue;">Hồ sơ</a>
                                                </li>
                                                <li class="item">
                                                    <a href="./../viewUser/<?= $url = "doimatkhau" ?>" class="link_con">Đổi mật khẩu</a>
                                                </li>
                                                <li class="item">
                                                    <a href="./../viewUser/<?= $url = "phongdaluu" ?>" class="link_con">Phòng đã lưu</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="item">
                                            <a href="#" class="link">
                                                <i class="icon_bell1 far fa-bell"></i>Thông báo
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="./history" class="link">
                                                <i class="icon_history fas fa-history"></i>Lịch sử đặt phòng
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="right">
                            <div class="page_right">
                                <div class="profile">
                                    <div class="page_con">
                                        <?php require_once "./mvc/views/User/page/" . $data["page"] . ".php"; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="hehe">
            <?php include("./mvc/views/main/footer.php"); ?>
        </div>
    </div>
</body>

</html>

<script type="text/javascript">
    var avtcu = "";
    var img_cover_cu = "";
    $('.feat-btn').click(function() {
        $('.feat-show').toggleClass("show");
    });
    window.onload = function(){
        loaduser();
    }

    //Đổi avatar
    function choose(event) {
        var output = document.getElementById("img");
        var reader = new FileReader();
        reader.onload = function() {
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
        var file_data = $('#file_avt')[0].files[0];
        var form_data = new FormData();                  
        form_data.append('img', file_data);
        form_data.append('avtcu', avtcu);
		$.ajax({
				type: "POST",
				data: form_data,
                cache: false,
                contentType: false,
                processData: false,
				dataType: 'text',
				url: '../../cUser/updateavatar' ,
				success: function(json){
					let result = JSON.parse(json);
					if(result === 'succes'){
                        alert("Cập nhật ảnh đại diện thành công !");
                        loaduser();
					}else{
						alert("Cập nhật ảnh đại diện không thành công !");
					}
				},
				error: function(error) {
					console.log(error);
				}
		});
    }

    //Đổi ảnh bìa
    function chooseCover(event) {
        var output = document.getElementById("img_cover");
        var reader = new FileReader();
        reader.onload = function() {
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
        var file_data = $('#file_cover')[0].files[0];
        var form_data = new FormData();                  
        form_data.append('img_cover', file_data);
        form_data.append('img_cover_cu', img_cover_cu);
		$.ajax({
				type: "POST",
				data: form_data,
                cache: false,
                contentType: false,
                processData: false,
				dataType: 'text',
				url: '../../cUser/updatecover' ,
				success: function(json){
					let result = JSON.parse(json);
					if(result === 'succes'){
                        alert("Cập nhật ảnh bìa thành công !");
                        loaduser();
					}else{
						alert("Cập nhật ảnh bìa không thành công !");
					}
				},
				error: function(error) {
					console.log(error);
				}
		});
    }

    //Show du lieu nguoi dung
    function loaduser(){
        $.ajax({
        type: "GET",
        dataType: 'text',
        url: '../../cUser/getTaiKhoan',
        success: function(json) {
            let user = JSON.parse(json);
            if (user) {
                $('#tentaikhoan').val(user['tentaikhoan']);
                $('#tentkhe').val(user['ten']);
                $('#ten').val(user['ten']);
                $('#ngaysinh').val(user['dob']);
                $('#sdt').val(user['sdt']);
                $('#email').val(user['email']);
                $('#gioitinh').val(user['gioitinh']);
                $('#cmnd').val(user['cmnd']);

                if (user['avt']) {
                    avtcu = user['avt'];
                    $('#img').attr('src', "../../mvc/assets/img/" + user['avt']);
                    $('#avt2').attr('src', "../../mvc/assets/img/" + user['avt']);
                }
                if (user['anhbia']) {
                    img_cover_cu = user['anhbia'];
                    $('#img_cover').attr('src', "../../mvc/assets/img/" + user['anhbia']);
                }
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
    }
</script>