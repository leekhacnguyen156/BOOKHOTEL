<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css" type="text/css">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.3.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.3.0/mapbox-gl.js"></script>
    <link rel="stylesheet" href="../../../mvc/assets/css/qly_ks.css">
    <title>Document</title>
    <style>
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

        @keyframes slideInLeft {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(0);
            }
        }

        body {
            margin: 0;
            animation: 1.5s linear 0s 1 slideInLeft;
        }
    </style>
</head>
<body>
    <form action="../../../cAdmin/admin/khachsan/inf" method="POST" id="form-update-ks">
    <div id="main-inf">
        <span>Cập nhật thông tin</span>
        <div id="update">
            <div id="inf-update">
                <div id="inf-item">
                    <div style="display: flex;">
                        <div class="form-error" id="form-error" style="margin-left: auto; margin-right: auto;">
                        <i class="fas fa-exclamation-circle"></i>
                        <span id="message-error">dd</span>
                    </div>
                    </div>
                    
                    <div class="item-up">
                        <label for="tenkhachsannhe">Tên khách sạn</label>
                        <input type="text" name="tenkhachsannhe" id="tenkhachsannhe">
                    </div>
                    <div class="item-up mota">
                        <label for="mota">Mô tả</label>
                        <textarea name="mota" id="mota" cols="30" rows="10"></textarea>
                    </div>
                    <div class="item-up">
                        <label for="diachi">Tỉnh</label>
                        <select name="tinh" id="tinh">
                            <option name="tinh" disable>Chọn tỉnh</option>
                        </select>
                    </div>
                    <div class="item-up">
                        <label for="diachi">Địa chỉ</label>
                        <input type="text" id="diachi" name="diachi">
                    </div>
                    <div class="item-up">
                        <label for="sdt">Điện thoại</label>
                        <input type="text" id="sdt" name="sdt">
                    </div>
                    <div class="item-up">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email">
                    </div>
                    <div class="item-up">
                        <label for="webnha">Website</label>
                        <input type="text" name="webnha" id="webnha">
                    </div>
                    <div class="item-up">
                        <label for="fb">Facebook</label>
                        <input type="text" id="fb" name="fb">
                    </div>
                    <div class="item-up">
                        <label for="fb">Latitude</label>
                        <input type="text" id="Latitude" name="Latitude" disable>
                    </div>
                    <div class="item-up">
                        <label for="fb">Longitude</label>
                        <input id="Longitude" name="Longitude" type="text" disable>
                    </div>
                </div>
                <div id="img">
                    <div id="img-avt">
                        <label for="fileavt">Ảnh đại diện</label><br>
                        <img id="avtkhachsan" src="https://thudaumot.binhduong.gov.vn/Portals/0/images/default.jpg" alt=""><br>
                        <input type="file" accept="img/*" id="fileavt" name="fileavt" onchange="choose(event)">
                    </div>
                    <div id="img-giayphep">
                        <label for="filemota">Giấy phép kinh doanh</label><br>
                        <img id="giayphepnha" alt=""><br>
                        <input type="file" accept="img/*" name="giayphepkinhdoanh" id="giayphepkinhdoanh" onchange="choosegiayphep(event)">
                    </div>
                    <div id="img-giayphep">
                        <label for="filemota">Vị trí</label><br>
                        <div class="div">
                            <div id="map">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="btn-update">
                <button type="button" onclick="update()">Cập nhật</button>
            </div>
        </div>
    </div>
    </form>
</body>
</html>

<script type="text/javascript">
    var avt_old = "";
    var giayphep_old = "";
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

    $.ajax({
			type: "GET",
			dataType: 'text',
			url: './../../../cAuth/updateGetTinh' ,
			success: function(json){
				var tinh = JSON.parse(json);
                for(i = 0; tinh.length; i++){
                    $('#tinh').append(`<option name="tinh" id="${tinh[i]['matinh']}" value="${tinh[i]['matinh']}">${tinh[i]['tentinh']}</option>`);
                }
			},
			error: function(error) {
				console.log(error);
			}
	});

    $.ajax({
		type: "GET",
		dataType: 'text',
		url: './../../../ckhachsan/getKhachSan' ,
		success: function(json){
			let khachsan = JSON.parse(json);
            if(khachsan){
                $('#tenkhachsannhe').val(khachsan['tenkhachsan']);
                $('#mota').val(khachsan['mota']);
                $('#diachi').val(khachsan['diachi']);
                $('#sdt').val(khachsan['phone']);
                $('#email').val(khachsan['email']);
                $('#webnha').val(khachsan['website']);
                $('#fb').val(khachsan['facebook']);
                $('#Latitude').val(khachsan['latitude']);
                $('#Longitude').val(khachsan['longitude']);
                avt_old = khachsan['img'];
                giayphep_old = khachsan['giayphepkinhdoanh'];
                if(khachsan['img']){
                    $('#avtkhachsan').attr('src', "../../../mvc/assets/img/" + khachsan['img']);
                }
                $('#giayphepnha').attr('src',  "../../../mvc/assets/img/" + khachsan['giayphepkinhdoanh']);
                var id = khachsan['matinh'];
                $('#tinh option').filter(function() {
                    return this.id == id
                }).prop('selected', true);
            }         
		},
		error: function(error) {
			console.log(error);
		}
	});

    function choose(event){
        var output = document.getElementById("avtkhachsan");
        var reader = new FileReader();
        reader.onload = function(){
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    function choosegiayphep(event){
        var output = document.getElementById("giayphepnha");
        var reader = new FileReader();
        reader.onload = function(){
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    function update(){
		let name = $('#tenkhachsannhe').val();
		let sdt = $('#sdt').val();
        let email = $('#email').val();
        let mota = $('#mota').val();
		let dchi = $('#diachi').val();
        let tinh = $('#tinh').val();
        let webnha = $('#webnha').val();
        let fb = $('#fb').val();
        let Latitude = $('#Latitude').val();
        let Longitude = $('#Longitude').val();
        var fileavt = $('#fileavt')[0].files[0];
        var giayphepkinhdoanh = $('#giayphepkinhdoanh')[0].files[0];
        var form_data = new FormData();
        form_data.append('giayphep_old', giayphep_old);
        form_data.append('avt_old', avt_old);
        form_data.append('name', name);
        form_data.append('webnha', webnha);
        form_data.append('sdt', sdt);
        form_data.append('email', email);
        form_data.append('mota', mota);
        form_data.append('dchi', dchi);
        form_data.append('tinh', tinh);
        form_data.append('fb', fb);
        form_data.append('fileavt', fileavt);
        form_data.append('giayphepkinhdoanh', giayphepkinhdoanh);
        form_data.append('Latitude', Latitude);
        form_data.append('Longitude', Longitude);
		$.ajax({
				type: "POST",
				data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'text',
				url: './../../../ckhachsan/updateKhachsan' ,
				success: function(json){
					let result = JSON.parse(json);
					if(result === 'web'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Địa chỉ website đã bị trùng!");
					}else if(result === 'fb'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Facebook đã bị trùng!");
					}else if(result === 'email'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Email đã bị trùng!");
					}else if(result === 'sdt'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Số điện thoại đã bị trùng !");
					}else if(result === 'tenkhachsan'){
						document.getElementById('form-error').style.display = 'block';
						$('#message-error').text("Tên khách sạn đã bị trùng !");
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