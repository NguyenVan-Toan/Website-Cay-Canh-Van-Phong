<?php
    $sql_pro= "SELECT * from tbl_sanpham where tbl_sanpham.maDanhMuc = '$_GET[id]' order by id_sanpham desc";
    $query_pro = mysqli_query($mysqli,$sql_pro);
    //get danh muc san pham
    $sql_cate = "SELECT * from tbl_danhmuc where tbl_danhmuc.maDanhMuc = '$_GET[id]' limit 1";
    $query_cate = mysqli_query($mysqli,$sql_cate);
    $row_title = mysqli_fetch_array($query_cate);
    
?>
<h3>Danh mục sản phẩm: <?php echo $row_title['tenDanhMuc']; ?></h3>
<div class="row">
    <?php
    while($row = mysqli_fetch_array($query_pro)){
    ?>
        
        <div class="col-md-3">
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                <img class="img img-responsive" width="100%" height="200px" src="admincp/modules/quanlysanpham/uploads/<?php echo $row['hinhAnh'] ?>" alt="">
            </a>
            
            <p class="title_product"><?php echo $row['tenSP'] ?></p>
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                <p class="price_product">Giá: <?php echo number_format($row['giaTien'],0,',','.') ?> vnd</p>
            </a>
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                <p style="text-align: center; color: #0027ff6b"><?php echo $row_title['tenDanhMuc'] ?></p>
            </a>
        </div>

    <?php
    }
    ?>
    </div>