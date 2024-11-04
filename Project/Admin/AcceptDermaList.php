<?php 
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
$selQry="select * from tbl_derma";
 $result=$Con->query($selQry);
 $row=$result->fetch_assoc();

 
 if(isset($_GET['rid']))
	{
	$UpsQry="update tbl_derma set derma_vstatus=2 where derma_id=".$_GET['rid'];
	if($Con->query($UpsQry))
	{echo "Updated";
	}
	
	
	else
	{echo "Error";
	}

	}
	



?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
    .table-container {
        max-width: 1000px;
        margin: 40px auto;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #f9f9f9;
    }
    .table th, .table td {
        vertical-align: middle;
        text-align: center;
    }
    .table img {
        border-radius: 5px;
        object-fit: cover;
    }
    .reject-link {
        color: #dc3545;
        text-decoration: none;
        font-weight: bold;
    }
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="table-container">
    <form id="form1" name="form1" method="post" action="">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
            <div class="card-header text-center">
                        <h3>ACCEPT DERMATOLOGIST</h3>
                    </div>
                <tr>
                    <th>Sl No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Place</th>
                    <th>District</th>
                    <th>Photo</th>
                    <th>Logo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $selQry="select * from tbl_derma s inner join tbl_place p on s.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where derma_vstatus=1";
                    $result=$Con->query($selQry);
                    $i=0;
                    while($row=$result->fetch_assoc())
                    {
                        $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['derma_name'];?></td>
                    <td><?php echo $row['derma_email'];?></td>
                    <td><?php echo $row['derma_contact'];?></td>
                    <td><?php echo $row['derma_address'];?></td>
                    <td><?php echo $row['derma_name'];?></td>
                    <td><?php echo $row['derma_name']?></td>
                    <td><img src="../Assets/Files/Derma/Photo/<?php echo $row['derma_photo'];?>" height="60" width="60"/></td>
                    <td><img src="../Assets/Files/Derma/Proof/<?php echo $row['derma_proof'];?>" height="60" width="60"/></td>
                    <td><a href="AcceptDermaList.php.?rid=<?php echo $row['derma_id']; ?>" class="reject-link">Reject</a></td>
                </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>
    </form>
</div>
</body>
</html>
<?php
            include("Foot.php");
            ob_flush();
            ?>
    