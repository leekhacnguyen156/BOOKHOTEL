
<div class="cover_img">
    <img id="img_cover" src="../../mvc/assets/img/cover.jpg" alt="" class="img_cover">
</div>
<div class="avatar">
<div class="anhdaidien">
    <img id="img" src="../../mvc/assets/img/avt.jpg" alt="" class="img_avt">
</div>
</div>
<div class="header_user">
    <h2 class="tieude">Đổi mật khẩu</h2>
    <span class="slogan">Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</span>
</div>

<div class="container_con">
    <div class="form">
        <div class="form-error" id="form-error">
            <i class="fas fa-exclamation-circle"></i>
            <span id="message-error"></span>
        </div>
        <div class="auth_form">
            <div class="auth_form-form">
                <div class="repass">
                    <label class="label" for="">Mật khẩu hiện tại</label>
                </div>
                <div class="div_input">
                    <input class="input" type="password" name="password" id="password" value="">
                </div>
                <div class="auth_form-eyes">
                    <i id="eye_close" onclick="hidePassword()" class="eye_hidden fas fa-eye-slash" style="display: none;"></i>
                    <i id="eye_open" onclick="showPassword()" class="eye_show fas fa-eye" ></i>
                </div>
            </div>
        </div> 
        <div class="auth_form">
            <div class="auth_form-form">
                <div class="repass">
                    <label class="label" for="">Mật khẩu mới</label>
                </div>
                <div class="div_input">
                    <input class="input" type="password" name="newpass" id="newpass" value="">
                </div>
                <div class="auth_form-eyes">
                    <i id="eye_close-new" onclick="hideNewPass()" class="eye_hidden fas fa-eye-slash" style="display: none;"></i>
                    <i id="eye_open-new" onclick="showNewPass()" class="eye_show fas fa-eye" ></i>
                </div>
            </div>
        </div> 
        <div class="auth_form">
            <div class="auth_form-form">
                <div class="repass">
                    <label class="label " for="">Nhập lại mật khẩu mới</label>
                </div>
                <div class="div_input">
                    <input class="input" type="password" name="repass" id="repass" value="">
                </div>
                <div class="auth_form-eyes">
                    <i id="eye_close-re" onclick="hideRePass()" class="eye_hidden fas fa-eye-slash" style="display: none;"></i>
                    <i id="eye_open-re" onclick="showRePass()" class="eye_show fas fa-eye" ></i>
                </div>
            </div>
        </div> 
        <div class="div_btn">
            <button type="button" onclick="updatePass()" class="btn_save">Lưu</button>
        </div> 
    </div>
</div>

<script>

    // window.onload = function(){
    //     loaduser();
    // }
    //Ẩn hiện mật khẩu hiện tại
    function showPassword(){
        document.getElementById('password').type = 'text';
        document.getElementById("eye_open").style.display = "none";
        document.getElementById("eye_close").style.display = "block";
    }
    function hidePassword(){
        document.getElementById('password').type = 'password';
        document.getElementById("eye_open").style.display = "block";
        document.getElementById("eye_close").style.display = "none";
    }

    //Ẩn hiện mật khẩu mới
    function showNewPass(){
        document.getElementById('newpass').type = 'text';
        document.getElementById("eye_open-new").style.display = "none";
        document.getElementById("eye_close-new").style.display = "block";
    }
    function hideNewPass(){
        document.getElementById('newpass').type = 'password';
        document.getElementById("eye_open-new").style.display = "block";
        document.getElementById("eye_close-new").style.display = "none";
    }

    //Ẩn hiện nhập lại mật khẩu mới
    function showRePass(){
        document.getElementById('repass').type = 'text';
        document.getElementById("eye_open-re").style.display = "none";
        document.getElementById("eye_close-re").style.display = "block";
    }
    function hideRePass(){
        document.getElementById('repass').type = 'password';
        document.getElementById("eye_open-re").style.display = "block";
        document.getElementById("eye_close-re").style.display = "none";
    }
       
    //Upadte mật khẩu
    function updatePass(){
		let pass = $('#password').val();
		let newpass = $('#newpass').val();
        let repass = $('#repass').val();
        var form_data = new FormData();
        form_data.append('passnhe', pass);
        form_data.append('newpass', newpass);
        form_data.append('repass', repass);
		$.ajax({
				type: "POST",
				data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'text',
				url: './../../cUser/doimatkhau',
				success: function(json){
					let result = JSON.parse(json);
                    if(result === 'xacnhan'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Xác nhận mật khẩu sai!");
					}else if(result === 'fail'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Xảy ra lỗi, Vui lòng thử lại!");
					}else if(result === 'null'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Vui lòng nhập đầy đủ thông tin!");
					}else if(result === 'sai'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Mật khẩu không đúng!");
					}
                    else{
                        alert("Đổi mật khẩu thành công!");
                        document.getElementById('form-error').style.display = 'none';
                    }
				},
				error: function(error) {
					console.log(error);
				}	
		});
	}
</script>