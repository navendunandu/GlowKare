 
 <option value="">Select Place</option>
 <?php
 		include('../Connection/Connection.php');
		$selQry="select * from tbl_Place where district_id=".$_GET['did'];
		$result=$Con->query($selQry);
		while($row=$result->fetch_assoc())
		{
		?>
        <option value="<?php echo $row['place_id'] ?>"><?php echo $row['place_name'] ?></option>
        <?php 
		}
		?>
        