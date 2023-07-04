<?php
    $sql_bv= "SELECT * from tbl_baiviet where tinhtrang = 1 order by id desc";
    $query_bv = mysqli_query($mysqli,$sql_bv);
    
    
?>
<h3 style="text-align: center; text-transform: uppercase;">Bài viết mới nhất</h3>
<div class="row">
    <?php
    while($row_bv = mysqli_fetch_array($query_bv)){
    ?>
    <div class="col-md-3 col-sm-12 col-xm-12">
        <a href="index.php?quanly=baiviet&id=<?php echo $row_bv['id'] ?>">
            <img class="img img-responsive" width="100%" height="200px" src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh'] ?>" alt="">
            <p class="title_product">Tên bài viết: <?php echo $row_bv['tenbaiviet'] ?></p>
            
        </a>
        <p class="title_product"><?php echo $row_bv['tomtat'] ?></p>
    </div>
    <?php
    }
    ?>
</div>