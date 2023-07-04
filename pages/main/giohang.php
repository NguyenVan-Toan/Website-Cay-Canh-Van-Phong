<?php

?>
<h3>Giỏ hàng
  <?php
  if(isset($_SESSION['dangky'])){
    echo ' '.'<span style="color: red;">'.$_SESSION['dangky'].'</span>' ;
  }
  ?>
</h3>
<?php
?>
<div class="container">
  <div class="arrow-steps clearfix">
    <div class="step current"> <span> <a href="index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
    <div class="step"> <span><a href="index.php?quanly=vanchuyen" >Vận chuyển</a></span> </div>
    <div class="step "> <span><a href="index.php?quanly=thanhtoan" >Thanh toán</a><span> </div>
    <div class="step "> <span><a href="index.php?quanly=donhangdadat" >Lịch sử đơn hàng</a><span> </div>
  </div>
</div>
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
    <td><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id']; ?>">Xóa</a></td>
  </tr>
<?php
}
?>
  <tr>
    <td colspan="5">Tổng tiền</td>
    <td colspan="2"><?php echo number_format($tongtien,0,',','.').'vnd'; ?></td>
    <td><a href="pages/main/themgiohang.php?xoatatca=1">Xóa tất cả</a></td>
    <div style="clear: both;"></div>
    
   
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
<?php
  if(isset($_SESSION['dangky'])){
  ?>
    <p><a href="index.php?quanly=vanchuyen"><button>Đặt hàng</button></a></p>
  <?php
  }else{
  ?>
      <p><a href="index.php?quanly=dangky"><button>Đặt hàng</button></a></p>
  <?php
  }
?>