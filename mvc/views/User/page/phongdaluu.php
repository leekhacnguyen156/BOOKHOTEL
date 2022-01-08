<div class="cover_img">
    <img id="img_cover" src="../../mvc/assets/img/cover.jpg" alt="" class="img_cover">
</div>
<div class="avatar">
    <div class="anhdaidien">
        <img id="img" src="../../mvc/assets/img/avt.jpg" alt="" class="img_avt">
    </div>
</div>
<div class="header_user">
    <h2 class="tieude">Phòng đã lưu</h2>
    <span class="slogan">Lưu lại những căn phòng bạn đã thích <3 </span>
</div>

<div class="container_con history">
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên phòng</th>
                <th>Hình ảnh</th>
                <th>Giá phòng</th>
                <th>Số lượng</th>
                <th>Số khách</th>
                <th>Xem phòng</th>
            </tr>
        </thead>
        <tbody id = "saveroom">
        </tbody>
    </table>
</div>

<script>
    const formatter = new Intl.NumberFormat('vi', {
        style: 'currency',
        currency: 'VND',
        minimumFractionDigits: 0
    });
    
    $.post("../../cSaveRoom/getSaveRoom", {}, function(data) {
        let phongluu = JSON.parse(data);
        console.log(phongluu);
        for (let i = 0; i < phongluu.length; i++) {
            let maloai = phongluu[i].maloai
            let tenloai = phongluu[i].tenloai
            let hinhanh = phongluu[i].anhtieude
            let gia = phongluu[i].gia
            let soluong = phongluu[i].soluong
            let sokhach = phongluu[i].sokhach
            $('#saveroom').append(`
            <tr>
                <td>${i+1}</td>
                <td>${tenloai}</td>
                <td><img id="img-phongluu" src="../../mvc/assets/img/${hinhanh}" alt=""></td>
                <td>${formatter.format(JSON.parse(gia))}</td>
                <td>${soluong}</td>
                <td>${sokhach}</td>
                <td><div id="link_xemchitiet"><a id="link" href="../../cphong/viewchitietphong/${maloai}" alt="">Xem</a></div></td>
            </tr>
            `)
        }
    })
</script>