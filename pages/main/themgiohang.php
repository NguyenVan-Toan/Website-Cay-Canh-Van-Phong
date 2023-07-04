<?php
session_start();
include('../../admincp/config/config.php');
//them số lượng
if(isset($_GET['cong'])){
    $id = $_GET['cong'];
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['id'] != $id){
            $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 
                    'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'],
                    'hinhanh' => $cart_item['hinhanh'], 'masp' =>$cart_item['masp']);
            $_SESSION['cart'] = $product;
        }else{
            $tangsoluong = $cart_item['soluong'] +1;
            if($cart_item['soluong'] < 10){
                
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 
                    'soluong' => $tangsoluong, 'giasp' => $cart_item['giasp'],
                    'hinhanh' => $cart_item['hinhanh'], 'masp' =>$cart_item['masp']);
            }else{
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 
                    'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'],
                    'hinhanh' => $cart_item['hinhanh'], 'masp' =>$cart_item['masp']);
            }
            $_SESSION['cart'] = $product;
        }
    }
    header('Location:../../index.php?quanly=giohang');
}
//trừ số lượng
if(isset($_GET['tru'])){
    $id = $_GET['tru'];
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['id'] != $id){
            $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 
                    'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'],
                    'hinhanh' => $cart_item['hinhanh'], 'masp' =>$cart_item['masp']);
            $_SESSION['cart'] = $product;
        }else{
            $tangsoluong = $cart_item['soluong'] - 1;
            if($cart_item['soluong'] > 1){
                
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 
                    'soluong' => $tangsoluong, 'giasp' => $cart_item['giasp'],
                    'hinhanh' => $cart_item['hinhanh'], 'masp' =>$cart_item['masp']);
            }else{
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 
                    'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'],
                    'hinhanh' => $cart_item['hinhanh'], 'masp' =>$cart_item['masp']);
            }
            $_SESSION['cart'] = $product;
        }
    }
    header('Location:../../index.php?quanly=giohang');
}
//xóa sản phẩm
if(isset($_SESSION['cart'])&&$_GET['xoa']){
    $id = $_GET['xoa'];
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['id'] != $id){
            $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 
                    'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'],
                    'hinhanh' => $cart_item['hinhanh'], 'masp' =>$cart_item['masp']);
        }
        $_SESSION['cart'] = $product;
        header('Location:../../index.php?quanly=giohang');
    }
}
//xóa tất cả
if(isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1){
    unset($_SESSION['cart']);
    header('Location:../../index.php?quanly=giohang');
}
//them sản phẩm vào giỏ hàng
if($_POST['themgiohang']){
    //session_destroy();
    $id = $_GET['idsanpham'];
    $soluong = 1;
    $sql_chonsp = "SELECT * from tbl_sanpham where id_sanpham='".$id."' LIMIT 1";
    $query = mysqli_query($mysqli,$sql_chonsp);
    $row = mysqli_fetch_array($query);
    if($row){
        $new_product = array(array('tensanpham' => $row['tenSP'], 'id' => $id, 'soluong' => $soluong, 
        'giasp' => $row['giaTien'], 'hinhanh' => $row['hinhAnh'], 'masp' =>$row['maSP']));
        //kiem tra session ton tại
        if(isset($_SESSION['cart'])){
            $found = false;
            foreach($_SESSION['cart'] as $cart_item){
                //neu da co san pham chỉ tăng số lượng
                if($cart_item['id'] == $id){
                    $tangsoluong = $cart_item['soluong'];
                    $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 
                    'soluong' => $tangsoluong + 1, 'giasp' => $cart_item['giasp'],
                    'hinhanh' => $cart_item['hinhanh'], 'masp' =>$cart_item['masp']);
                    $found = true;
                }else{//nếu chưa có sp thì thêm mới
                    $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 
                    'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'],
                    'hinhanh' => $cart_item['hinhanh'], 'masp' =>$cart_item['masp']);
                }
            }
            if($found == false){
                //liên kết dữ liệu new_product với product
                $_SESSION['cart'] = array_merge($product,$new_product);
            }
            else{
                $_SESSION['cart'] = $product;
            }
        }else{
            $_SESSION['cart'] = $new_product;
        }
    }
    header('Location:../../index.php?quanly=giohang');
}
?>