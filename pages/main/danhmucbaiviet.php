<?php
    $sql_bv= "SELECT * from tbl_baiviet where tbl_baiviet.id_danhmuc = '$_GET[id]' order by id desc";
    $query_bv = mysqli_query($mysqli,$sql_bv);
    //get danh muc san pham
    $sql_cate = "SELECT * from tbl_danhmucbaiviet where tbl_danhmucbaiviet.id_baiviet = '$_GET[id]' limit 1";
    $query_cate = mysqli_query($mysqli,$sql_cate);
    $row_title = mysqli_fetch_array($query_cate);
    
?>
<h3>Danh mục bài viết: <span style="text-align: center; text-transform: uppercase;"><?php echo $row_title['tendanhmuc_baiviet']; ?></span> </h3>
<div class="row">
    <?php
    while($row_bv = mysqli_fetch_array($query_bv)){
    ?>
    <div class="col-md-3 col-sm-6">
        <a href="index.php?quanly=baiviet&id=<?php echo $row_bv['id'] ?>">
            <img class="img img-responsive" width="100%" src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh'] ?>" alt="">
            <p class="title_product"><?php echo $row_bv['tenbaiviet'] ?></p>
            
        </a>
        <p class="title_product"><?php echo $row_bv['tomtat'] ?></p>
    </div>
    <?php
    }
    ?>
</div>