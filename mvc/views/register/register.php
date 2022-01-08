<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./../mvc/assets/css/register.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <form action="../../BOOKHOTEL/cAuth/viewlogin" method="POST" id="form-register">
        <div class="app form_register">
            <div class="container">
                <div class="grid">
                    <div class="register">
                        <div class="auth_form auth_form-margin">
                            <div class="auth_form-header">
                                <h3 class="auth_form-heading">Đăng ký tài khoản</h3>
                                <div class="form-error" id="form-error">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <span id="message-error">dd</span>
                                </div>

                                <div class="auth_form-form">
                                    <div class="d-flex">
                                        <div class="auth_form-group">
                                            <input type="text" class="auth_form-input" placeholder="Họ và tên" id="name" name="name">
                                        </div>
                                        <div class="auth_form-group">
                                            <input type="text" class="auth_form-input" placeholder="Số CMNN/CCCD" id="cmnd" name="cmnd">
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="auth_form-group">
                                            <input type="date" class="auth_form-input" placeholder="Ngày sinh" id="dob" name="dob">
                                        </div>
                                        <div class="auth_form-group">
                                            <div class="auth_form-text">
                                                <span>Giới tính: </span>
                                                <label for="">Nam</label>
                                                <input name="gt" id="nam" type="radio" value="Nam">
                                                <label for="" class="">Nữ</label>
                                                <input name="gt" id="nu" type="radio" value="Nữ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="auth_form-group">
                                            <input type="text" class="auth_form-input" placeholder="Địa chỉ email" id="email" name="email">
                                        </div>
                                        <div class="auth_form-group">
                                            <input type="text" class="auth_form-input" placeholder="Số điện thoại" id="sdt" name="sdt">
                                        </div>
                                    </div>
                                    <div class="auth_form-group">
                                        <input type="text" class="auth_form-input username" placeholder="Tên đăng nhập" id="user" name="user">
                                    </div>
                                    <div class="d-flex">
                                        <div class="auth_form-group">
                                            <input type="password" class="auth_form-input auth_form-position" placeholder="Mật khẩu" id="pass" name="pass">
                                            <div class="auth_form-eyes-register">
                                                <i id="eye_open" onclick="showPassword()" class="far fa-eye auth_form-group-eye"></i>
                                                <i id="eye_close" onclick="hidePassword()" class="far fa-eye-slash auth_form-group-eye"></i>
                                            </div>
                                        </div>
                                        <div class="auth_form-group">
                                            <input type="password" class="auth_form-input margin" placeholder="Nhập lại mật khẩu" id="repass" name="repass">
                                            <span class="auth_form-eyes-register">
                                                <i id="eye_open_com" onclick="showPasswordCom()" class="far fa-eye auth_form-group-eye"></i>
                                                <i id="eye_close_com" onclick="hidePasswordCom()" class="far fa-eye-slash auth_form-group-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <p class="fieldset">
                                    <div class="auth_form-text">
                                        <input type="checkbox" id="accept-terms">
                                        <label for="accept-terms">Tôi đồng ý với
                                            <a href="/mvc/views/note.html">Điều khoản & Chính sách
                                            </a>
                                        </label>
                                    </div>
                                    </p>
                                    <div class="auth_form-controls auth_form-control-register">
                                        <button class="btn auth_form-control-back"><a href="./../cHome/home" class="btn_back">TRỞ LẠI</a></button>
                                        <button type="button" onclick="register()" class="btn btn_primary">ĐĂNG KÝ</button>
                                    </div>
                                    <div class="auth_form-socials">
                                        <h3 class="auth_form-text auth_form-ask">Bạn đã có tài khoản?</h3>
                                        <a href="../../BOOKHOTEL/cAuth/viewlogin" class="auth_form-text auth_form-register">Đăng nhập</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </form>
</body>

</html>

<script>
    function showPassword() {
        document.getElementById('pass').type = 'text';
        document.getElementById("eye_open").style.display = "none";
        document.getElementById("eye_close").style.display = "block";
    }

    function hidePassword() {
        document.getElementById('pass').type = 'password';
        document.getElementById("eye_open").style.display = "block";
        document.getElementById("eye_close").style.display = "none";
    }

    function showPasswordCom() {
        document.getElementById("eye_open_com").style.display = "none";
        document.getElementById("eye_close_com").style.display = "block";
    }

    function hidePasswordCom() {
        document.getElementById("eye_open_com").style.display = "block";
        document.getElementById("eye_close_com").style.display = "none";
    }

    function checkDob(date) {
        //date = 2021 - 12 - 06
        let tamp = date.split('-')
        let year = parseInt(tamp[0])
        let yearCurrent = new Date().getFullYear()
        if (year >= yearCurrent) {
            return false
        }
        return true
    }

    function checkTypeChar(string) {
        return /^[a-zA-Z0-9@.&!]+$/.exec(string)
    }

    function checkNumber(number) {
        return /^[0-9]+$/.exec(number)
    }

    function checkEmail(email) {
        return /^[a-zA-Z0-9]+@+[a-z]+\.[a-z.]+$/.exec(email)
    }

    function checkVal(cmnd, email, sdt, pass, dob) {
        if (!checkDob($('#dob').val())) {
            document.getElementById('form-error').style.display = 'block';
            $('#message-error').text("Năm sinh không hợp lệ, vui lòng nhập lại!");
            return false;
        }
        if (checkNumber(cmnd) == null) {
            document.getElementById('form-error').style.display = 'block';
            $('#message-error').text("Số CMND/CCCD nhập sai định dạng, vui lòng nhập lại!");
            $('#cmnd').focus()
            return false;
        }
        if (cmnd.length != 9 && cmnd.length != 12) {
            document.getElementById('form-error').style.display = 'block';
            $('#message-error').text("Số CMND/CCCD không hợp lệ, vui lòng nhập lại!");
            $('#cmnd').focus()
            return false;
        }
        if (checkEmail(email) == null) {
            document.getElementById('form-error').style.display = 'block';
            $('#message-error').text("Email nhập sai định dạng, vui lòng nhập lại!");
            $('#email').focus()
            return false;
        }
        if (checkNumber(sdt) == null) {
            document.getElementById('form-error').style.display = 'block';
            $('#message-error').text("Số điện thoại nhập sai định dạng, vui lòng nhập lại!");
            $('#sdt').focus()
            return false;
        }
        if (sdt.length != 10) {
            document.getElementById('form-error').style.display = 'block';
            $('#message-error').text("Số điện thoại không hợp lệ, vui lòng nhập lại!");
            $('#sdt').focus()
            return false;
        }
        if (checkTypeChar(pass) == null) {
            document.getElementById('form-error').style.display = 'block';
            $('#message-error').text("Mật khẩu không hợp lệ, vui lòng nhập lại!");
            $('#pass').focus()
            return false;
        }
        if (pass.length < 8 || pass.length > 12) {
            document.getElementById('form-error').style.display = 'block';
            $('#message-error').text("Độ dài mật khẩu không khả dụng, vui lòng nhập lại!");
            $('#pass').focus()
            return false;
        }


        return true;
    }

    function register() {
        let name = $('#name').val();
        let sdt = $('#sdt').val();
        let email = $('#email').val();
        let cmnd = $('#cmnd').val();
        let dob = $('#dob').val();
        let user = $('#user').val();
        let pass = $('#pass').val();
        let repass = $('#repass').val();
        var gtinh = $("input[name='gt']:checked").val();
        if (checkVal(cmnd, email, sdt, pass, dob)) {
            var form_data = new FormData();
            form_data.append('cmnd', cmnd);
            form_data.append('name', name);
            form_data.append('sdt', sdt);
            form_data.append('email', email);
            form_data.append('dob', dob);
            form_data.append('user', user);
            form_data.append('pass', pass);
            form_data.append('repass', repass);
            form_data.append('gtinh', gtinh);
            $.ajax({
                type: "POST",
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'text',
                url: '../../BOOKHOTEL/cAuth/register',
                success: function(json) {
                    let result = JSON.parse(json);
                    if (result === 'email') {
                        document.getElementById('form-error').style.display = 'block';
                        $('#message-error').text("Email đã được đăng ký, vui lòng chọn email khác!");
                    } else if (result === 'sdt') {
                        document.getElementById('form-error').style.display = 'block';
                        $('#message-error').text("Số điện thoại đã được đăng ký, vui lòng chọn số điện thoại khác!");
                    } else if (result === 'cmnd') {
                        document.getElementById('form-error').style.display = 'block';
                        $('#message-error').text("Số CCCD/CMND đã được đăng ký, vui lòng nhập số CCCD/CMND khác !");
                    } else if (result === 'name') {
                        document.getElementById('form-error').style.display = 'block';
                        $('#message-error').text("Tên đăng nhập bị trùng, vui lòng nhập tên khác !");
                    } else if (result === 'pass') {
                        document.getElementById('form-error').style.display = 'block';
                        $('#message-error').text("Xác nhận mật khẩu không chính xác! vui lòng nhập lại !");
                    } else if (result === 'fail') {
                        document.getElementById('form-error').style.display = 'block';
                        $('#message-error').text("Xảy ra lỗi, vui lòng thử lại !");
                    } else if (result === 'nulll') {
                        document.getElementById('form-error').style.display = 'block';
                        $('#message-error').text("Vui lòng nhập đầy đủ thông tin đăng ký!");
                    } else {
                        document.getElementById('form-error').style.display = 'none';
                        $('#form-register').submit();
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    }
</script>