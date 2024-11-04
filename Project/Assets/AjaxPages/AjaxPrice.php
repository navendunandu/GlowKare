<?php
include("../Connection/Connection.php");
$id=$_GET['cid'];
$qty=$_GET['qty'];
$upsQry="update tbl_cart set cart_quantity ='$qty' where cart_id='$id'";
$Con->query($upsQry);

?>