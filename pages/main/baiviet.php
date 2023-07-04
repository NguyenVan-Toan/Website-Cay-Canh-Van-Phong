<?php
    $sql_bv= "SELECT * from tbl_baiviet where tbl_baiviet.id = '$_GET[id]' limit 1";
    $query_bv = mysqli_query($mysqli,$sql_bv);
    //get danh muc san pham
    $query_bv_all = mysqli_query($mysqli,$sql_bv); 

    $row_bv_title = mysqli_fetch_array($query_bv);
    
?>
<h3>Bài viết: <span style="text-align: center; text-transform: uppercase;"><?php echo $row_bv_title['tenbaiviet']; ?></span> </h3>
<ul class="baiviet">
    <?php
    while($row_bv = mysqli_fetch_array($query_bv_all)){
    ?>
    <li>
        <h2><?php echo $row_bv['tenbaiviet'] ?></h2>
        <p class="title_product"><?php echo $row_bv['noidung'] ?></p>
    </li>
    <?php
    }
    ?>
</ul>