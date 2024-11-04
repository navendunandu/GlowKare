<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");

?>
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Sale</p>
                                <h6 class="mb-0">
                                    <?php
                                    $selSale="select count(*) as count from tbl_cart where cart_status>0";
                                    $resSale=$Con->query($selSale);
                                    $dataSale=$resSale->fetch_assoc();
                                    echo $dataSale['count'];
                                    ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total No of Products</p>
                                <h6 class="mb-0">
                                <?php
                                    $selSale="select count(*) as count from tbl_product";
                                    $resSale=$Con->query($selSale);
                                    $dataSale=$resSale->fetch_assoc();
                                    echo $dataSale['count'];
                                    ?>

                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today No of Users</p>
                                <h6 class="mb-0">
                                <?php
                                    $selSale="select count(*) as count from tbl_user";
                                    $resSale=$Con->query($selSale);
                                    $dataSale=$resSale->fetch_assoc();
                                    echo $dataSale['count'];
                                    ?>
                                    
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total No of Sellers</p>
                                <h6 class="mb-0">
                                <?php
                                    $selSale="select count(*) as count from tbl_seller";
                                    $resSale=$Con->query($selSale);
                                    $dataSale=$resSale->fetch_assoc();
                                    echo $dataSale['count'];
                                    ?>
                                    
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->





            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Sales</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Sl No</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Product</th>
                                    
                                    <th scope="col">Customer</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Cart Quantity</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Status</th>
                                </tr>
                                <?php
	$i=0;
	
	$selQry="select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_product p on p.product_id=c.product_id inner join tbl_seller s on s.seller_id=p.seller_id inner join tbl_user u on u.user_id=b.user_id  order by b.booking_id desc limit 5";
	 $result=$Con->query($selQry);
	 while($row=$result->fetch_assoc())
	 {
		 $i++;
	?>
    <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $row['booking_date'];?></td>
      <td><?php echo $row['product_name'];?></td>
      <td><?php echo $row['user_name'];?></td>
      <td><?php echo $row['product_price'];?></td>
      <td><?php echo $row['cart_quantity'];?></td>
     
      <td><?php echo $row['product_price']*$row['cart_quantity'];?></td>
      <td><?php 
	  if($row['cart_status']==1)
	  {
		 echo "PAYMENT RECEIVED";  
	  }
	  else if($row['cart_status']==2)
	  {
		 echo "ORDER PACKED";  
	  }
	    else if($row['cart_status']==3)
	  {
		 echo "ORDER SHIPPED";  
	  }
	  else if($row['cart_status']==4)
	  {
		 echo "ORDER DELIVERED";  
	  }
	
    }
	  
	  ?></td>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->




            <?php
            include("Foot.php");
            ob_flush();
            ?>