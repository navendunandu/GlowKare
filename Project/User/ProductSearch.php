
<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body onload="getProduct()">

<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Search</td>
      <td><label for="txt_product"></label>
      <input type="text" name="txt_product" id="txt_product" onchange="getProduct()" /></td>
      <td>Brand </td>
      <td><label for="txt_brand"></label>
        <label for="sel_brand"></label>
        <select name="sel_brand" id="sel_brand" onchange="getProduct()">
         <option value="">--Select---</option>
        <?php
		$selQry="select * from tbl_brand";
		$result=$Con->query($selQry);
		while($row=$result->fetch_assoc())
		{
		?>
        <option value="<?php echo $row['brand_id'] ?>"><?php echo $row['brand_name'] ?></option>
        <?php 
		}
		?>
      </select></td>
      <td>SkinType</td>
      <td><label for="txt_skintype"></label>
      <label for="sel_concern"></label>
      <label for="sel_skintype"></label>
      <select name="sel_skintype" id="sel_skintype" onchange="getProduct()">
      <option value="">--Select---</option>
        <?php
		$selQry="select * from tbl_skintype";
		$result=$Con->query($selQry);
		while($row=$result->fetch_assoc())
		{
		?>
        <option value="<?php echo $row['skintype_id'] ?>"><?php echo $row['skintype_name'] ?></option>
        <?php 
		}
		?>s
      </select></td>
      <td>Skin Concern</td>
      <td><label for="txt_concern"></label>
        <label for="sel_concern"></label>
        <select name="sel_concern" id="sel_concern" onchange="getProduct()">
         <option value="">--Select---</option>
        <?php
		$selQry="select * from tbl_skinconcern";
		$result=$Con->query($selQry);
		while($row=$result->fetch_assoc())
		{
		?>
        <option value="<?php echo $row['skinconcern_id'] ?>"><?php echo $row['skinconcern_name'] ?></option>
        <?php 
		}
		?>
      </select></td>
      <td>Routine</td>
      <td><label for="txt_routine"></label>
        <label for="sel_routine"></label>
        <select name="sel_routine" id="sel_routine" onchange="getProduct()">
         <option value="">--Select---</option>
        <?php
		$selQry="select * from tbl_routine";
		$result=$Con->query($selQry);
		while($row=$result->fetch_assoc())
		{
		?>
        <option value="<?php echo $row['routine_id'] ?>"><?php echo $row['routine_name'] ?></option>
        <?php 
		}
		?>
      </select></td>
    </tr>
  </table>
  
</form>
<div id="result">
</div>

            
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getProduct() {
	  var txt=document.getElementById('txt_product').value.trim();
	  var cat=document.getElementById('sel_brand').value.trim();
	  var type=document.getElementById('sel_skintype').value.trim();
	  var conc=document.getElementById('sel_concern').value.trim();
	  var rout=document.getElementById('sel_routine').value.trim();
    $.ajax({
      url: "../Assets/AjaxPages/AjaxSearch.php?txt="+txt+"&cat="+cat+"&type="+type+"&conc="+conc+"&rout="+rout,
      success: function (result) {

        $("#result").html(result);
      }
    });
  }
  function addCart(pid){
    $.ajax({
        url: '../Assets/AjaxPages/AjaxAddCart.php?pid=' + pid,
        success: function(response) {
            alert(response);
        }
    });
}


</script>
</html>
<?php
include("Foot.php");
ob_flush();
?>