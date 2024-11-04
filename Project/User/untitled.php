<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ProductSearch</title>
</head>

<body onload="search()">
<form id="form1" name="form1" method="post" action="">
  <table width="100" border="1">
    <tr>
      <td>Product</td>
      <td><label for="txt_product"></label>
      <input type="text" name="txt_product" id="txt_product" onchange="search()" /></td>
    
      <td>Occassion</td>
      <td><label for="txt_occa"></label>
        <select name="txt_occa" id="txt_occa" onchange="search()">
         <option value="">---Select---</option> 
         <?php
		$selOc=" select * from tbl_occassion";
		$resultOc=$Con->query($selOc);
		while($dataOc=$resultOc->fetch_assoc())
		{
		?>
        <option  value="<?php echo $dataOc['occassion_id'] ?>"><?php echo $dataOc['occassion_name'] ?></option>
       <?php 
		}
		?>
      </select></td>
   
      <td>Type</td>
      <td><label for="txt_type"></label>
        <select name="txt_type" id="txt_type" onchange="search()">
        <option value="">---Select---</option>
         <?php
		$selTyp=" select * from tbl_type ";
		$resultTyp=$Con->query($selTyp);
		while($dataTyp=$resultTyp->fetch_assoc())
		{
		?>
        <option  value="<?php echo $dataTyp['type_id'] ?>"><?php echo $dataTyp['type_name'] ?></option>
        <?php 
		}
		?>
      </select></td>
    
      <td>Colour</td>
      <td><label for="txt_colour"></label>
        <select name="txt_colour" id="txt_colour" onchange="search()">
         <option value="">---Select---</option>
         <?php
		$selClr=" select * from tbl_colour ";
		$resultClr=$Con->query($selClr);
		while($dataClr=$resultClr->fetch_assoc())
		{
		?>
        <option  value="<?php echo $dataClr['colour_id'] ?>"><?php echo $dataClr['colour_name'] ?></option>
        <?php 
		}
		?>
      </select></td>
       <td>Flower</td>
      <td><label for="txt_flower"></label>
        <select name="txt_flower" id="txt_flower" onchange="search()">
        <option value="">---Select---</option>
         <?php
		$selFlw=" select * from tbl_flower ";
		$resultFlw=$Con->query($selFlw);
		while($dataFlw=$resultFlw->fetch_assoc())
		{
		?>
        <option  value="<?php echo $dataFlw['flower_id'] ?>"><?php echo $dataFlw['flower_name'] ?></option>
        <?php 
		}
		?>
      </select></td>
    </tr>
  </table>
</form>
<div id='result'>
</div>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function search() {
	  var product=document.getElementById('txt_product').value;
	  var occassion=document.getElementById('txt_occa').value;
	  var type = document.getElementById('txt_type').value;
	  var colour=document.getElementById('txt_colour').value;
	  var flower=document.getElementById('txt_flower').value;
	  
	  $.ajax({
      url: "../Assets/AjaxPages/AjaxSearch.php?pname=" + product + "&occa=" + occassion +"&type=" + type + "&colour=" + colour + "&flower=" + flower,
      success: function (result) {

        $("#result").html(result);
      }
    });
  }
  function addCart(pid){
    $.ajax({
        url: '../Assets/AjaxPages/AjaxAddCart.php?id=' + pid,
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