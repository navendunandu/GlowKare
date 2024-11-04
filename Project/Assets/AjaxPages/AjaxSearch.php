<table border="1" cellpadding="10" cellspacing="20" align="center">
<tr>
<?php 
include("../Connection/Connection.php");
$txt = $_GET['txt'];
$cat = $_GET['cat'];
$type = $_GET['type'];
$conc = $_GET['conc'];
$rout = $_GET['rout'];
$selQry="select * from tbl_product p inner join tbl_brand b on p.brand_id=b.brand_id inner join tbl_skintype t on p.skintype_id=t.skintype_id inner join tbl_skinconcern c on p.skinconcern_id=c.skinconcern_id inner join tbl_routine r on p.routine_id=r.routine_id where TRUE ";
if($txt!=="")
{
	$selQry = $selQry. " and product_name like '%$txt%'";
}
if($cat!="")
{
	$selQry = $selQry. " and b.brand_id=".$cat;
}
if($type!="")
{
	$selQry = $selQry. " and t.skintype_id=".$type;
}
if($conc!="")
{
	$selQry = $selQry. " and c.skinconcern_id=".$conc;
}
if($rout!="")
{
	$selQry = $selQry. " and r.routine_id=".$rout;
}
$result=$Con->query($selQry);
$i=0;
while($data=$result->fetch_assoc())
{
	$id=$data['product_id'];
	$cart="select sum(cart_quantity) as cart_total from tbl_cart where product_id='$id'";
	$cresult=$Con->query($cart);
	$cdata=$cresult->fetch_assoc();
	$stock="select sum(stock_quantity) as total_stock from tbl_stock where product_id='$id'";
	$sresult=$Con->query($stock);
	$sdata=$sresult->fetch_assoc();
	$rem=$sdata['total_stock']-$cdata['cart_total'];
	$i++;

?>
<td>
<img src="../Assets/Files/Seller/Productdocs/<?php  echo $data['product_photo'] ?>" width="250">
<p><?php echo $data['product_name'] ?></p>
<p><?php echo $data['product_price'] ?></p>
<p><?php echo $data['product_des'] ?></p>
<?php if($rem<=0){
	echo "Out of stock";
} else{
	?>
<a href='#' onClick="addCart('<?php echo $data['product_id']?>')">Add to Cart</a>
<?php
}
?>
<p><a href="ViewMore.php?pid=<?php echo $data['product_id']?>">View More</a></p>
</td>
<?php

if($i%4==0)
{
	echo "<tr></tr>";
}
}
?>

