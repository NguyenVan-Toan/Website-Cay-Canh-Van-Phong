<?php
if(isset($_GET['trang'])){
    $page = $_GET['trang'];
}else{
    $page = '';
}
if($page == 1 || $page == ''){
    $begin = 0;
}else{
    $begin = $page*12 - 12;
}
    $sql_pro= "SELECT * from tbl_sanpham,tbl_danhmuc 
    where tbl_sanpham.maDanhMuc = tbl_danhmuc.maDanhMuc 
    order by tbl_sanpham.id_sanpham desc limit $begin,12";
    $query_pro = mysqli_query($mysqli,$sql_pro);
    
    
?>
<h3>Các cây bán chạy</h3>
<div class="row">
    <?php
    while($row = mysqli_fetch_array($query_pro)){
    ?>
    
        <div class="col-md-3">
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                <img style="border: 1px solid #ccc;" class="img img-responsive" width="100%" height="65%" src="admincp/modules/quanlysanpham/uploads/<?php echo $row['hinhAnh'] ?>" alt="">
            </a>
            
            <p class="title_product"><?php echo $row['tenSP'] ?></p>
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                <p class="price_product">Giá: <?php echo number_format($row['giaTien'],0,',','.') ?> vnd</p>
            </a>
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                <p style="text-align: center; color: #0027ff6b"><?php echo $row['tenDanhMuc'] ?></p>
            </a>
        </div>

    <?php
    }
    ?>
    </div>
<div style="clear: both;"></div>
<style>
    ul.list_trang{
        padding: 0;
        margin: 10px 35%;
        list-style: none;
    }
    ul.list_trang li{
        float: left;
        padding: 5px 13px;
        margin: 5px;
        background: #c6c6c6;
    }
    ul.list_trang li a{
        color:  white;
        text-decoration: none;

    }
</style>

<?php
$sql_trang = mysqli_query($mysqli,"SELECT * from tbl_sanpham");
$row_count = mysqli_num_rows($sql_trang);
$trang = ceil($row_count/12);
?>
<p>Trang hiện tại: <?php echo $page.'/'.$trang ?></p>
<ul class="list_trang">
    <?php
    for($i = 1;$i<=$trang;$i++){
    ?>
    <li <?php if($i==$page){echo 'style= "background: red"';} else { echo '';} ?> >
        <a href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a>
    </li>
    <?php
    }
    ?>
</ul>