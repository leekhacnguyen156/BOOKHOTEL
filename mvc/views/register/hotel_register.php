<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../mvc/assets/css/hotel_register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css" type="text/css">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.3.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.3.0/mapbox-gl.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>ĐĂNG KÝ KHÁCH SẠN</title>
</head>

<body>
    <form action="./../cadmin/admin/khachsan/inf" method="POST" id="form_registerhotel">
        <div id="backgr">
            <div id="body">
                <div id="hotel">
                    <div id="header">
                        <h2>Đăng ký khách sạn</h2>
                        <div class="form-error" id="form-error">
                            <i class="fas fa-exclamation-circle"></i>
                            <span id="message-error">dd</span>
                        </div>
                    </div>
                    <div id="main">
                        <div class="ip_data">
                            <input id="name" name="name" type="text" placeholder="Tên khách sạn">
                        </div>
                        <div class="ip_data">
                            <input id="mota" name="mota" type="text" placeholder="Mô tả">
                        </div>
                        <div class="ip_data">
                            <select name="tinh" id="tinh">
                                <?php
                                foreach ($data['tinh'] as $tinh) {
                                ?>
                                    <option name="tinh" value="<?= $tinh['matinh'] ?>"><?= $tinh['tentinh'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="ip_data">
                            <input id="dchi" name="dchi" type="text" placeholder="Địa chỉ">
                        </div>
                        <div class="ip_data">
                            <input id="sdt" name="sdt" type="text" placeholder="Số điện thoại">
                        </div>
                        <div class="ip_data">
                            <input id="email" name="email" type="text" placeholder="Email">
                        </div>
                        <div class="ip_data">
                            <input id="Latitude" name="Latitude" type="text" placeholder="Latitude:" disabled>
                        </div>
                        <div class="ip_data">
                            <input id="Longitude" name="Longitude" type="text" placeholder="Longitude:" disabled>
                        </div>
                        <div id="btn_dk">
                            <button id="btn-huy" type="button"><a href="./../cHome/home">Hủy</a></button>
                            <button type="button" onclick="register()">Đăng ký</button>
                        </div>
                    </div>
                </div>
                <div id="img">
                    <div id="img-giayphep">
                        <label for="">Giấy phép kinh doanh</label>
                        <img id="hinhanh" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSjFpK-D0C5FJQTbQY0erss0y37v2PvTKDWmw&usqp=CAU" alt="">
                        <input type="file" name="filehinhanh" id="filehinhanh" onchange="choose(event)">
                    </div>
                    <div class="div">
                        <div id="map">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
<script>
    mapboxgl.accessToken = 'pk.eyJ1Ijoibmd1eWVuZ2lha2hhbmciLCJhIjoiY2twYmQ1MWxuMHBldjJ2cGV6MW16aDg5cCJ9.tp51IE5pmf1sQ_MOxq8M9A';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [105.63, 10.47],
        zoom: 13
    });

    map.addControl(new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        mapboxgl: mapboxgl,
        getItemValue: e => {
            document.getElementById("Longitude").value = e['center'][0]; //long
            document.getElementById("Latitude").value = e['center'][1]; //lat
            console.log(e['place_name'])
            document.getElementsByClassName('mapboxgl-ctrl-geocoder--input').value = e['place_name']; //lat
        }
    }));
    map.addControl(new mapboxgl.NavigationControl());
    map.on("load", function() {
        /* Image: An image is loaded and added to the map. */
        map.loadImage("https://i.imgur.com/MK4NUzI.png", function(error, image) {
            if (error) throw error;
            map.addImage("custom-marker", image);
            /* Style layer: A style layer ties together the source and image   and specifies how they are displayed on the map. */
            map.addLayer({
                id: "markers",
                type: "symbol",
                /* Source: A data source specifies the geographic coordinate where  the image marker gets placed. */
                source: {
                    type: "geojson",
                    data: {
                        type: 'FeatureCollection',
                        features: [{
                            type: 'Feature',
                            properties: {},
                            geometry: {
                                type: "Point",
                                coordinates: [-74.5, 40]
                            }
                        }]
                    }
                },
                layout: {
                    "icon-image": "custom-marker",
                }
            });
        });
    });

    function checkNumber(number) {
        return /^[0-9]+$/.exec(number)
    }

    function checkEmail(email) {
        return /^[a-zA-Z0-9]+@+[a-z]+\.[a-z.]+$/.exec(email)
    }

    function checkVal(sdt, email) {
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
        if (checkEmail(email) == null) {
            document.getElementById('form-error').style.display = 'block';
            $('#message-error').text("Email nhập sai định dạng, vui lòng nhập lại!");
            $('#email').focus()
            return false;
        }
        return true;

    }
    //onchange="choose(event)"
    function choose(event) {
        var output = document.getElementById("hinhanh");
        var reader = new FileReader();
        reader.onload = function() {
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    function register() {
        let name = $('#name').val();
        let sdt = $('#sdt').val();
        let email = $('#email').val();
        let mota = $('#mota').val();
        let dchi = $('#dchi').val();
        let tinh = $('#tinh').val();
        let Latitude = $('#Latitude').val();
        let Longitude = $('#Longitude').val();
        let hinhanh = $('#filehinhanh').val();
        var file_data = $('#filehinhanh')[0].files[0];
        if (checkVal(sdt, email)) {
            var form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('name', name);
            form_data.append('sdt', sdt);
            form_data.append('email', email);
            form_data.append('mota', mota);
            form_data.append('dchi', dchi);
            form_data.append('tinh', tinh);
            form_data.append('Latitude', Latitude);
            form_data.append('Longitude', Longitude);
            $.ajax({
                type: "POST",
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'text',
                url: './../cAuth/register_hotel',
                success: function(json) {
                    let result = JSON.parse(json);
                    if (result === 'email') {
                        document.getElementById('form-error').style.display = 'block';
                        $('#message-error').text("Địa chỉ email đã được kích hoạt!");
                    } else if (result === 'phone') {
                        document.getElementById('form-error').style.display = 'block';
                        $('#message-error').text("Số điện thoại đã được kích hoạt!");
                    } else if (result === 'name') {
                        document.getElementById('form-error').style.display = 'block';
                        $('#message-error').text("Tên khách sạn đã bị trùng, vui lòng nhập tên khác !");
                    } else if (result === 'taikhoan') {
                        document.getElementById('form-error').style.display = 'block';
                        $('#message-error').text("Bạn đã có khách sạn!");
                    } else if (!hinhanh.trim()) {
                        document.getElementById('form-error').style.display = 'block';
                        $('#message-error').text("Vui lòng cập nhật giấy phép kinh doanh !");
                    } else if (result === 'fail') {
                        document.getElementById('form-error').style.display = 'block';
                        $('#message-error').text("Xảy ra lỗi, vui lòng thử lại !");
                    } else if (result === 'nulll') {
                        document.getElementById('form-error').style.display = 'block';
                        $('#message-error').text("Vui lòng nhập đầy đủ thông tin đăng ký!");
                    } else {
                        document.getElementById('form-error').style.display = 'none';
                        $('#form_registerhotel').submit();
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    }
</script>