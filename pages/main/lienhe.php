<p>Thông tin liên hệ</p>
<?php
    $sql_lh = "SELECT * from tbl_lienhe where id=1";
    $row_lh = mysqli_query($mysqli,$sql_lh);
?>

<?php
    while($dong = mysqli_fetch_array($row_lh)){
?>
    <p><?php echo $dong['thongtinlienhe'] ?></p>
<?php
    }
?>
