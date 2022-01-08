<div class="cover_img">
    <img id="img_cover" src="../../mvc/assets/img/cover.jpg" alt="" class="img_cover">
</div>
<div class="avatar">
    <div class="anhdaidien">
        <img id="img" src="../../mvc/assets/img/avt.jpg" alt="" class="img_avt">
    </div>
</div>
<div class="header_user">
    <h2 class="tieude">Lịch sử đặt phòng</h2>
    <span class="slogan">Đã đặt phòng thì đừng hủy nhé :( </span>
</div>

<div class="container_con history">
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên phòng</th>
                <th>Tên khách sạn</th>
                <th>Giá</th>
                <th>Ngày nhận</th>
                <th>Ngày trả</th>
                <th>Thời gian đến</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody id ="history">
        </tbody>
    </table>
</div>

<script>
    // window.onload = function(){
    //     loaduser();
    // }
    const formatter = new Intl.NumberFormat('vi', {
        style: 'currency',
        currency: 'VND',
        minimumFractionDigits: 0
    });
    
    $.post("./../../cphieudat/getPhieudatbyUser", {}, function(data) {
        let phieudat = JSON.parse(data);
        for (let i = 0; i < phieudat.length; i++) {
            let tenloai = phieudat[i].tenloai
            let tenkhachsan = phieudat[i].tenkhachsan
            let gia = phieudat[i].gia
            let ngaynhan = phieudat[i].ngaynhan
            let ngaytra = phieudat[i].ngaytra
            let thoigianden = phieudat[i].thoigianden
            let trangthai = phieudat[i].trangthai
            let tinhtrang = "";
            if(trangthai == 0){
                tinhtrang = "Chờ duyệt";
            }else if(trangthai == 1){
                tinhtrang = "Đã duyệt";
            }else if(trangthai == 2){
                tinhtrang = "Đã hủy";
            }
            $('#history').append(`
            <tr>
                <td>${i+1}</td>
                <td>${tenloai}</td>
                <td>${tenkhachsan}</td>
                <td>${formatter.format(JSON.parse(gia))}</td>
                <td>${ngaynhan}</td>
                <td>${ngaytra}</td>
                <td>${thoigianden}</td>
                <td>${tinhtrang}</td>
            </tr>
            `)
        }

    })
</script>