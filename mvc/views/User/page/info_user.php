<style>
    /*báo lỗi*/
.form-error{
    padding: 5px 15px;
    width: fit-content;
    margin: auto;
    border-radius: 20px;
    background-color: orangered;
    text-align: center;
    display: none;
    cursor: pointer;
}

.form-error span, i{
    font-size: 12px;
    text-align: center;
    color: white;
    font-weight: 500;
}

.form-succes{
    padding: 5px 15px;
    width: fit-content;
    margin: auto;
    border-radius: 20px;
    background-color: #28a745;
    text-align: center;
    display: none;
    cursor: pointer;
}

.form-succes span, i{
    font-size: 12px;
    text-align: center;
    color: white;
    font-weight: 500;
}
</style>

<div class="cover_img">
    <img id="img_cover" src="../../mvc/assets/img/cover.jpg" alt="" class="img_cover">
    <div class="btn_cover">
        <label for="file_cover" class="label_cover">Choose A File</label>
        <input onchange="chooseCover(event)" id="file_cover" type="file" name="anhbia" class="my_cover" hidden>
    </div>
</div>
<div class="avatar">
    <div class="anhdaidien">
        <img id="img" src="../../mvc/assets/img/avt.jpg" alt="" class="img_avt">
        <div class="custom_btn">
            <label class="label_update" for="file_avt"><i class="icon_camera fas fa-camera-retro"></i>Update</label>
            <input onchange="choose(event)" id="file_avt" type="file" name="avt" class="my_avt"> 
        </div>
    </div>
</div>
<div class="header_user">
    <h2 class="tieude">Hồ Sơ Của Tôi</h2>
    <span class="slogan">Quản lý thông tin hồ sơ để bảo mật tài khoản</span>
</div>
<div class="container_con">
    <div class="form">
        <div class="auth_form">
            <div class="form-error" id="form-error" style="margin: auto;">
                <i class="fas fa-exclamation-circle"></i>
                <span id="message-error">dd</span>
            </div>
            <div class="form-succes" id="form-succes" style="margin: auto;">
                <i class="fas fa-check-circle"></i>
                <span id="message-succes">dd</span>
            </div>
        </div> 
        <div class="auth_form">
            <div class="auth_form-form">
                <div class="div_label">
                    <label class="label" for="">Tên đăng nhập</label>
                </div>
                <div class="div_input">
                    <input class="input" type="text" name="tentaikhoan" id="tentaikhoan" value="">
                </div>
            </div>
        </div> 
        <div class="auth_form">
            <div class="auth_form-form">
                <div class="div_label">
                    <label class="label" for="">Tên</label>
                </div>
                <div class="div_input">
                    <input class="input" type="text" name="ten" id="ten" value="">
                </div>
            </div>
        </div> 
        <div class="auth_form">
            <div class="auth_form-form">
                <div class="div_label">
                    <label class="label" for="">Ngày sinh</label>
                </div>
                <div class="div_input">
                    <input class="input" type="date" name="ngaysinh" id="ngaysinh" value="">
                </div>
            </div>
        </div> 
        <div class="auth_form">
            <div class="auth_form-form">
                <div class="div_label">
                    <label class="label" for="">Email</label>
                </div>
                <div class="div_input">
                    <input class="input" type="text" name="email" id="email" value="">
                </div>
            </div>
        </div> 
        <div class="auth_form">
            <div class="auth_form-form">
                <div class="div_label">
                    <label class="label" for="">Số điện thoại</label>
                </div>
                <div class="div_input">
                    <input class="input" type="text" name="sdt" id="sdt" value="">
                </div>
            </div>
        </div> 
        <div class="auth_form">
            <div class="auth_form-form">
                <div class="div_label">
                    <label class="label" for="">Giới tính</label>
                </div>
                <div class="div_input">
                    <input class="input" type="text" name="gioitinh" id="gioitinh" value="">
                </div>
            </div>
        </div> 
        <div class="auth_form">
            <div class="auth_form-form">
                <div class="div_label">
                    <label class="label" for="">CMND/CCCD</label>
                </div>
                <div class="div_input">
                    <input class="input" type="text" name="cmnd" id="cmnd" value="">
                </div>
            </div>
        </div> 
        <div class="div_btn">
            <button type="button" class="btn_save" onclick="updateaccount()">Lưu</button>
        </div>
    </div>
</div>

<script>
    function updateaccount(){
		let name = $('#ten').val();
		let sdt = $('#sdt').val();
        let ngaysinh = $('#ngaysinh').val();
        let email = $('#email').val();
        let cmnd = $('#cmnd').val();
        let user = $('#tentaikhoan').val();
        let gtinh = $("#gioitinh").val();

        var form_data = new FormData();                  
        form_data.append('cmnd', cmnd);
        form_data.append('name', name);
        form_data.append('sdt', sdt);
        form_data.append('ngaysinh', ngaysinh);
        form_data.append('email', email);
        form_data.append('user', user);
        form_data.append('gtinh', gtinh);
		$.ajax({
				type: "POST",
				data: form_data,
                cache: false,
                contentType: false,
                processData: false,
				dataType: 'text',
				url: '../../cAuth/updateaccount' ,
				success: function(json){
					let result = JSON.parse(json);
                    console.log(result);
					if(result === 'email'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Email đã được đăng ký, vui lòng chọn email khác!");
					}else if(result === 'sdt'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Số điện thoại đã được đăng ký, vui lòng chọn số điện thoại khác!");
					}else if(result === 'cmnd'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Số CCCD/CMND đã được đăng ký, vui lòng nhập số CCCD/CMND khác !");
					}else if(result === 'user'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Tên đăng nhập bị trùng, vui lòng nhập tên khác !");
					}
                    else if(result === 'succes'){
                        document.getElementById('form-error').style.display = 'none';
                        document.getElementById('form-succes').style.display = 'block';
						$('#message-succes').text("Cập nhật thông tin tài khoản thành công !");
                        setTimeout(function(){ 
                            document.getElementById('form-succes').style.display = 'none';
                        }, 3000);
                        loaduser();
                    }
				},
				error: function(error) {
					console.log(error);
				}
		});
	}
</script>