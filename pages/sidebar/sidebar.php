    <h4>DANH MỤC SẢN PHẨM</h4>
    <ul class="list_sidebar">
        <?php
        $sql_danhmuc = "SELECT * from tbl_danhmuc order by maDanhMuc asc";
        $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
        while($row = mysqli_fetch_array($query_danhmuc)){
        ?>
        <li  style="text-transform: uppercase;"><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['maDanhMuc'] ?>"><?php echo $row['tenDanhMuc'] ?></a></li>
        <?php
        }
        ?>
    </ul>
    <h4>DANH MỤC BÀI VIẾT</h4>
    <ul class="list_sidebar">
        <?php
        $sql_danhmucbv = "SELECT * from tbl_danhmucbaiviet order by id_baiviet asc";
        $query_danhmucbv = mysqli_query($mysqli,$sql_danhmucbv);
        while($row = mysqli_fetch_array($query_danhmucbv)){
        ?>
        <li style="text-transform: uppercase;"><a href="index.php?quanly=danhmucbaiviet&id=<?php echo $row['id_baiviet'] ?>"><?php echo $row['tendanhmuc_baiviet'] ?></a></li>
        <?php
        }
        ?>
    </ul>
