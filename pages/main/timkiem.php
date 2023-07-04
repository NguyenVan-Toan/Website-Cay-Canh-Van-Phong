<?php
if(isset($_POST['timkiem'])){
    $tukhoa = $_POST['tukhoa'];
}
    $sql_pro= "SELECT * from tbl_sanpham,tbl_danhmuc where tbl_sanpham.maDanhMuc = tbl_danhmuc.maDanhMuc and  tbl_sanpham.tenSP LIKE '%".$tukhoa."%' ";
    $query_pro = mysqli_query($mysqli,$sql_pro);
    
    
?>
<h3>Kết quả tìm kiếm: <?php echo $_POST['tukhoa'] ?></h3>
<ul class="product_list">
    <?php
    while($row = mysqli_fetch_array($query_pro)){
    ?>
    <li>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
            <img src="admincp/modules/quanlysanpham/uploads/<?php echo $row['hinhAnh'] ?>" alt="">
        </a>
        
        <p class="title_product"><?php echo $row['tenSP'] ?></p>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
            <p class="price_product">Giá: <?php echo number_format($row['giaTien'],0,',','.') ?> vnd</p>
        </a>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
            <p style="text-align: center; color: #0027ff6b"><?php echo $row['tenDanhMuc'] ?></p>
        </a>
    </li>
    <?php
    }
    ?>
</ul>