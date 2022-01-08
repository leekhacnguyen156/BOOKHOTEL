<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKINGHOTEL.COM</title>
    <link rel="stylesheet" href="./../mvc/assets/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="./../mvc/assets/css/home1.css">
    <link rel="stylesheet" href="./../mvc/assets/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<style>
    .container-slider{
        position: relative;
        width: 100%;
    }

    .pre{
        position: absolute;
        top: 33%;
        left: 0;
        transform: translateX(-50%);
        z-index: 9999;
        background-color: transparent;
        border: none;
    }

    .nx{
        position: absolute;
        top: 33%;
        right: 0;
        transform: translateX(50%);
        z-index: 9999;
        background-color: transparent;
        border: none;
    }

    .slider{
        display: flex !important;
        flex-wrap: nowrap !important;
        justify-content: left !important;
        overflow-x: auto !important;
    }

    .slider::-webkit-scrollbar{
        visibility: hidden !important;
    }

    .item-slider{
        position: relative;
        left: 0;
        right: 0;
        transition: 0.5s;
        min-width: 16.666%;
    }

    .item-slider-ks{
        position: relative;
        left: 0;
        right: 0;
        transition: 0.5s;
        min-width: 16.666%;
    }
</style>

<body>
    <?php include("mvc/views/main/header.php") ?>
    <form action="./../ckhachsan/viewsearch/null" method="POST" id="form-search">
        <div class="web">
            <div class="slide">
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <img class="banner_img" src="./../mvc/assets/img/banner1.jpg">
                    </div>

                    <div class="mySlides fade">
                        <img class="banner_img" src="./../mvc/assets/img/banner2.jpg">
                    </div>

                    <div class="mySlides fade">
                        <img class="banner_img" src="./../mvc/assets/img/banner3.jpg">
                    </div>

                    <div class="mySlides fade">
                        <img class="banner_img" src="./../mvc/assets/img/banner4.jpg.opdownload">
                    </div>

                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>

                    <div class="controls_dot">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                        <span class="dot" onclick="currentSlide(4)"></span>
                    </div>
                </div>

                <div class="slideshow_right">
                    <div class="slideshow_right-top">
                        <img class="img_right" src="./../mvc/assets/img/banner5.jpg" alt="">
                    </div>
                    <div class="slideshow_right-bottom">
                        <img class="img_right" src="./../mvc/assets/img/banner6.jpg" alt="">
                    </div>
                </div>
            </div>

            <div class="search_head">
                <div>
                    <div class="banmuondidau">
                        <span id="ten" class="question">Xin chào</span>
                        <span class="question">, kế tiếp bạn sẽ du lịch đến đâu?</span>
                    </div>
                    <div class="search">
                        <div class="header_search">
                            <i class="fas fa-map-marked fa-2x" style="color: #074baa; margin-left: 10px;"></i>
                            <input type="text" class="input_search" placeholder="Bạn muốn đi đến đâu?" name="key_search" id="key_search">
                        </div>
                        <div class="checkin">
                            <i class="fas fa-calendar-week icon_calendar"></i>
                            <h3 class="checkin_text">Nhận phòng - Trả phòng</h3>
                        </div>
                        <div class="people">
                            <h3 class="people_text">2 người lớn - 0 trẻ em - 1 phòng</h3>
                            <i class="fas fa-caret-down icon_down"></i>
                        </div>
                        <div class="search_item">
                            <button class="btn_search" type="button" onclick="search()"><i class="fas fa-search icon_search"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="grid">
                    <div class="khampha">
                        <div class="location">
                            <div class="location_tieude">KHÁM PHÁ VIỆT NAM</div>
                            <div class="location_gt">Các điểm đến phổ biến này có nhiều điều chờ đón bạn</div>
                        </div>

                        <div class="grid__row location_diadiem" id="home-diadiem">

                        </div>
                    </div>

                    <div class="khampha">
                        <div class="location chonghi">
                            <div class="location_tieude">CHỖ NGHỈ LÍ TƯỞNG</div>
                            <div class="location_gt">Đắm chìm vào thế giới căn hộ, biệt thự và các chỗ nghỉ độc đáo khác của chúng tôi</div>
                        </div>

                        <div class="container-slider">
                            <button type="button" class="pre" onclick="preKKKs()"><i class="fas fa-chevron-circle-left fa-4x" style="color: rgb(126, 117, 117);"></i></button>
                            <div class="grid__row location_diadiem slider" id="home-khachsan">

                            </div>
                            <button type="button" class="nx" onclick="nextKKKs()"><i class="fas fa-chevron-circle-right fa-4x" style="color: rgb(126, 117, 117);"></i></button>
                        </div>
                    </div>

                    <div class="quangcao" style="background-image: url('./../mvc/assets/img/qc.jpg');"></div>
                    <div class="diadiemyeuthich">
                        <div class="location chonghi">
                            <div class="location_tieude">TÌM THEO LOẠI CHỖ NGHỈ</div>
                        </div>

                        <div class="container-slider">
                            <button type="button" class="pre" onclick="preKKK()"><i class="fas fa-chevron-circle-left fa-4x" style="color: rgb(126, 117, 117);"></i></button>
                            <div class="grid__row location_diadiem slider" id="home-danhmuc">
                                <!-- <div class="grid__column-3" >
                                    <div class="grid__row location_diadiem">
                                        <div class="grid__column-3">

                                            <a href="#" class="diadiem">
                                                <div class="img" style="background-image: url('https://cf.bstatic.com/xdata/images/xphoto/square300/57584488.webp?k=bf724e4e9b9b75480bbe7fc675460a089ba6414fe4693b83ea3fdd8e938832a6&o=');"></div>
                                                <h2 class="tendiadiem">Đà Lạt</h2>
                                                <h3 class="soluong">314,000 chỗ nghỉ</h3>
                                            </a>
                                        </div>
                                    </div>
                                </div>   -->
                            </div>
                            <button type="button" class="nx" onclick="nextKKK()"><i class="fas fa-chevron-circle-right fa-4x" style="color: rgb(126, 117, 117);"></i></button>
                        </div>

                    </div>
                    <!-- <div class="grid__row location_diadiem" id = "home-danhmuc"></div> -->

                </div>

                <div class="goiy grid">
                    <div class="location chonghi">
                        <div class="location_tieude">GỢI Ý ĐỊA ĐIỂM</div>
                    </div>
                    <div class="grid-container" id="goiy-1">
                        <!-- <a href="#" class="grid-item" style="background-image: url('./../mvc/assets/img/VT1.jpg') ;">
                                <h3 class="item_tendd">Vũng Tàu</h3>
                                <span class="item_soluong">300.000 chỗ nghỉ</span>
                            </a> -->
                    </div>
                    <div class="grid-container1" id="goiy-2">
                        <!-- <a href="#" class="grid-item" style="background-image: url('./../mvc/assets/img/VT1.jpg') ;">
                                <h3 class="item_tendd">Vũng Tàu</h3>
                                <span class="item_soluong">300.000 chỗ nghỉ</span>
                            </a> -->
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php include("mvc/views/main/footer.php"); ?>
</body>

</html>

<script>
    function search(){
        let key = $(`#key_search`).val();
        if(key){
            $('#form-search').submit();
        }
    }

    var count_m = 0;
    var count_ks = 0;
    var l = 0;
    var l_ks = 0;

    function nextKKKs(){
        if(l_ks < (count_ks - 6) ){
            l_ks++;
        }
        var div = document.getElementsByClassName('item-slider-ks');
        for(var i of div){
            let style = -16.666 * l_ks;
            i.style.left = style + "%";
            console.log(style);
        }
    }

    function preKKKs(){
        l_ks--;
        if(l_ks < 0){
            l_ks = 0;
        }
        var div = document.getElementsByClassName('item-slider-ks');
        for(var i of div){
            let style = -16.666 * l_ks;
            i.style.left = style + "%";
            console.log(style);
        }
    }

    function nextKKK(){
        if(l < (count_m - 6) ){
            l++;
        }
        var div = document.getElementsByClassName('item-slider');
        for(var i of div){
            let style = -16.666 * l;
            i.style.left = style + "%";
            console.log(style);
        }
    }

    function preKKK(){
        l--;
        if(l < 0){
            l = 0;
        }
        var div = document.getElementsByClassName('item-slider');
        for(var i of div){
            let style = -16.666 * l  ;
            i.style.left = style + "%";
            console.log(style);
        }
    }
    
    $.post("./../ctinh/getTinhCoKhachSan", {}, function(data) {
        $('#home-diadiem').children().remove()
        let tinh = JSON.parse(data)
        tinh.forEach(item => {
            let matinh = item.matinh;
            let tentinh = item.tentinh;
            let soluong = item.soluong;
            let imageTinh = item.imageTinh;
            $('#home-diadiem').append(`
                <div class="grid__column-3">
                    <a href="./../ckhachsan/viewsearch/${matinh}" class="diadiem">
                        <div class="img" style="background-image: url('${imageTinh}');"></div>
                        <h2 class="tendiadiem">${tentinh}</h2>
                        <h3 class="soluong">${soluong}</h3>
                    </a>
                </div>
            `)
        })
    })
    $.post("./../ckhachsan/getAllKhachsan", {}, function(data) {
        $('#home-khachsan').children().remove()
        let khachsan = JSON.parse(data)
        count_ks = khachsan.length;
        khachsan.forEach(item => {
            let makhachsan = item.makhachsan;
            let mataikhoan = item.mataikhoan;
            let tenkhachsan = item.tenkhachsan;
            let img = item.img
            $('#home-khachsan').append(`
            <div class="grid__column-3 item-slider-ks">
                <a href="./../ckhachsan/viewkhachsan/${mataikhoan}" class="diadiem">
                    <div class="img" style="background-image: url('./../mvc/assets/img/${img}');"></div>
                    <h2 class="tendiadiem">${tenkhachsan}</h2>
                </a>
            </div>
            `)
        })
    })
    $.post("./../cdanhmuc/getAllDanhmuc", {}, function(data) {
        let danhmuc = JSON.parse(data)
        count_m = danhmuc.length;
        danhmuc.forEach(item => {
            let madm = item.madm
            let tendm = item.tendm
            let img = item.img
            let mataikhoan = item.mataikhoan
            $('#home-danhmuc').append(`
            <div class="grid__column-3 item-slider">
                <a href="./../ckhachsan/viewkhachsan/${mataikhoan}" class="diadiem">
                    <div class="img" style="background-image: url('./../mvc/assets/img/${img}');"></div>
                    <h2 class="tendiadiem">${tendm}</h2>
                </a>
            </div>
            `)
        })
    })
    $.post("./../ctinh/getTopTinh", {}, function(data) {
        let tinh = JSON.parse(data);
        let length = tinh.length
        for (let i = 0; i < length; i++) {
            let matinh = tinh[i].matinh
            let tentinh = tinh[i].tentinh
            let soluong = tinh[i].soluong
            let imageTinh = tinh [i].imageTinh
            if (i < 2) {
                renderItem($('#goiy-1'), matinh, tentinh, soluong, imageTinh)
            } else {
                renderItem($('#goiy-2'), matinh, tentinh, soluong, imageTinh)
            }
        }
    })

    function renderItem(el, matinh, tentinh, soluong, imageTinh) {
        el.append(`
            <a href="./../ckhachsan/viewsearch/${matinh}" class="grid-item" style="background-image: url('${imageTinh}') ;">
                <h3 class="item_tendd">${tentinh}</h3>
                <span class="item_soluong">${soluong} chỗ nghỉ</span>
            </a>
        `)
    }
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }

    //Chuyen slide tu dong
    var slideIndex = 0;
    showSlide();

    function showSlide() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlide, 3000); // Change image every 3 seconds
    }
</script>