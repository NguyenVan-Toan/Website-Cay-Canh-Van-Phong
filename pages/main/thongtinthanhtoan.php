<p>Thông tin đặt hàng</p>
<div class="container">
  <div class="arrow-steps clearfix">
    <div class="step done"> <span> <a href="index.php?quanly=giohang">Giỏ hàng</a></span> </div>
    <div class="step done"> <span><a href="index.php?quanly=vanchuyen">Vận chuyển</a></span> </div>
    <div class="step current"> <span><a href="index.php?quanly=thongtinthanhtoan">Thanh toán</a><span> </div>
    <div class="step "> <span><a href="index.php?quanly=donhangdadat">Lịch sử đơn hàng</a><span> </div>
  </div>
  <form action="pages/main/xulythanhtoan.php" method="post">
  <div class="row">
    
      <?php
      $sql_get_vanchuyen = mysqli_query($mysqli, "SELECT * from tbl_shipping where id_dangky = '" . $_SESSION['id_khachhang'] . "' limit 1");
      $count = mysqli_num_rows($sql_get_vanchuyen);
      if ($count > 0) {
        $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
        $name = $row_get_vanchuyen['name'];
        $phone = $row_get_vanchuyen['phone'];
        $address = $row_get_vanchuyen['address'];
        $note = $row_get_vanchuyen['note'];
      } else {
        $name = '';
        $phone = '';
        $address = '';
        $note = '';
      }
      ?>
      <div class="col-md-8">
        <h4>Thông tin vận chuyển và giỏ hàng</h4>
        <ul>
          <li>Họ và tên: <b><?php echo $name ?> </b></li>
          <li>Số điện thoại: <b><?php echo $phone ?> </b></li>
          <li>Địa chỉ: <b><?php echo $address ?> </b></li>
          <li>Ghi chú: <b><?php echo $note ?> </b></li>
        </ul>
        <h4>Giỏ hàng của bạn</h4>
        <table border="1px" style="border-collapse: collapse; width: 100%; text-align: center;">
          <tr>
            <th>Số thứ tự</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
          </tr>
          <?php
          if (isset($_SESSION['cart'])) {
            $i = 0;
            $tongtien = 0;
            foreach ($_SESSION['cart'] as $cart_item) {
              $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
              $tongtien += $thanhtien;
              $i++;
          ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $cart_item['tensanpham']; ?></td>
                <td><img src="admincp/modules/quanlysanpham/uploads/<?php echo $cart_item['hinhanh']; ?>" width="150px" alt=""></td>
                <td>
                  <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id']; ?>"><i class="fa-solid fa-minus fa_style"></i></a>
                  <?php echo $cart_item['soluong']; ?>
                  <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id']; ?>"><i class="fa-solid fa-plus fa_style"></i></a>
                </td>
                <td><?php echo number_format($cart_item['giasp'], 0, ',', '.') . 'vnd'; ?></td>
                <td><?php echo number_format($thanhtien, 0, ',', '.') . 'vnd'; ?></td>

              </tr>
            <?php
            }
            ?>
            <tr>
              <td colspan="5">Tổng tiền</td>
              <td colspan="2"><?php echo number_format($tongtien, 0, ',', '.') . 'vnd'; ?></td>

              <div style="clear: both;"></div>


            </tr>
          <?php
          } else {
          ?>
            <tr>
              <td colspan="6">Hiện tại giỏ hàng chưa có sản phẩm nào</td>
            </tr>
          <?php
          }
          ?>
        </table>
      </div>
      <style>
        .col-md-4.hinhthucthanhtoan .form-check {
          margin: 10px;
        }
      </style>
      <div class="col-md-4 hinhthucthanhtoan">
        <h4>Phương thức thanh toán</h4>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="tienmat" checked>
          <label class="form-check-label" for="exampleRadios1">
            Thanh toán khi nhận hàng
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="payment" id="exampleRadios2" value="chuyenkhoan">
          <label class="form-check-label" for="exampleRadios2">
            Thanh toán online
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="payment" id="exampleRadios3" value="VnPay">
          <label class="form-check-label" for="exampleRadios3">
            VnPay
          </label>
        </div>
        <input type="submit" value="Thanh toán ngay" class="btn btn-danger" name="thanhtoanngay" id="">
      </div>
      
  </div>

    </form>
</div>