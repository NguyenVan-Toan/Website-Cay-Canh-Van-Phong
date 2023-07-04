<p>Vận chuyển đơn hàng</p>
<div class="container">
  <div class="arrow-steps clearfix">
  <div class="step done"> <span> <a href="index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
    <div class="step current"> <span><a href="index.php?quanly=vanchuyen" >Vận chuyển</a></span> </div>
    <div class="step "> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh toán</a><span> </div>
    <div class="step "> <span><a href="index.php?quanly=donhangdadat" >Lịch sử đơn hàng</a><span> </div>
  </div>
  <h4>Thông tin vận chuyển</h4>
  <?php
  if(isset($_POST['themvanchuyen']))
  {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $note = $_POST['note'];
    $id_dangky = $_SESSION['id_khachhang'];
    $sql_them_vanchuyen = mysqli_query($mysqli,"INSERT INTO tbl_shipping(name,phone,address,note,id_dangky) value('$name','$phone','$address','$note','$id_dangky')");
    if($sql_them_vanchuyen){
      echo '<script>alert("Thêm vận chuyển thành công")</script>';

    }
  }elseif(isset($_POST['capnhatvanchuyen'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $note = $_POST['note'];
    $id_dangky = $_SESSION['id_khachhang'];
    $sql_update_vanchuyen = mysqli_query($mysqli,"UPDATE tbl_shipping SET name='$name',phone='$phone',address='$address',note='$note',id_dangky='$id_dangky' WHERE id_dangky= '$id_dangky'");
    if($sql_update_vanchuyen){
      echo '<script>alert("Cập nhật vận chuyển thành công")</script>';

    }
  }
  ?>
  <div class="row">
    <?php
    $sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * from tbl_shipping where id_dangky = '".$_SESSION['id_khachhang']."' limit 1");
    $count = mysqli_num_rows($sql_get_vanchuyen);
    if($count>0){
      $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
      $name = $row_get_vanchuyen['name'];
      $phone = $row_get_vanchuyen['phone'];
      $address = $row_get_vanchuyen['address'];
      $note = $row_get_vanchuyen['note'];
    }else{
      $name = '';
      $phone = '';
      $address = '';
      $note = '';
    }
    ?>
    <div class="col-md-12">
        <form action="" method="post">
        <div class="form-group">
          <label for="email">Họ và tên</label>
          <input type="text" name="name" value="<?php echo $name ?> " class="form-control" >
        </div>
        <div class="form-group">
          <label for="email">Phone</label>
          <input type="text" name="phone" value="<?php echo $phone ?> " class="form-control" >
        </div>
        <div class="form-group">
          <label for="address">Địa chỉ</label>
          <input type="text" name="address" value="<?php echo $address ?> " class="form-control" >
        </div>
        <div class="form-group">
          <label for="email">Ghi chú</label>
          <input type="text" name="note" value="<?php echo $note ?> " class="form-control">
        </div>
        <?php
        if($name =='' && $phone == ''){
        ?>
          <button type="submit" name="themvanchuyen" class="btn btn-primary">Thêm vận chuyển</button>
        <?php
        }elseif($name !='' && $phone != ''){
        ?>
        <button type="submit" name="capnhatvanchuyen" class="btn btn-success">Cập nhật vận chuyển</button>
        <?php
        }
        ?>
      </form>
    </div>
    <!-- Giỏ hàng -->
    <table border="1px" style="border-collapse: collapse; width: 100%; text-align: center;">
      <tr>
        <th>Số thứ tự</th>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
        <th>Quản lý</th>
      </tr>
    <?php
      if(isset($_SESSION['cart'])){
        $i = 0;
        $tongtien = 0;
          foreach($_SESSION['cart'] as $cart_item){
            $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
            $tongtien += $thanhtien;
            $i++;
    ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $cart_item['masp']; ?></td>
      <td><?php echo $cart_item['tensanpham']; ?></td>
      <td><img src="admincp/modules/quanlysanpham/uploads/<?php echo $cart_item['hinhanh']; ?>" width="150px" alt=""></td>
      <td>
        <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'];?>"><i class="fa-solid fa-minus fa_style"></i></a>
        <?php echo $cart_item['soluong']; ?>
        <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'];?>"><i class="fa-solid fa-plus fa_style"></i></a>
      </td>
      <td><?php echo number_format($cart_item['giasp'],0,',','.').'vnd' ; ?></td>
      <td><?php echo number_format($thanhtien,0,',','.').'vnd'; ?></td>
    </tr>
  <?php
  }
  ?>
    <tr>
      <td colspan="5">Tổng tiền</td>
      <td colspan="2"><?php echo number_format($tongtien,0,',','.').'vnd'; ?></td>
      <div style="clear: both;"></div>
    </tr>
    <tr>
      <?php
      if(isset($_SESSION['dangky'])){
      ?>
      
        <td  colspan="7"><a href="index.php?quanly=thongtinthanhtoan">Thanh toán</a></td>
      <?php
      }else{
      ?>
          <td colspan="7"><a href="index.php?quanly=dangky">Đặt hàng</a></td>
      <?php
      }
      ?>
    
    </tr>
  <?php
  }else{
  ?>
      <tr>
          <td colspan="6">Hiện tại giỏ hàng chưa có sản phẩm nào</td>
      </tr>
  <?php
  }
  ?>
  </table>
</div>
</div>