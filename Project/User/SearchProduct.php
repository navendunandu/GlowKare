<?php
ob_start();

include("../Assets/Connection/Connection.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LuckysMart::Search Product</title>
<link rel="stylesheet" href="../Assets/Templates/Search/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
            .custom-alert-box{
				z-index:1;
                width: 20%;
                height: 10%;
                position: fixed;
                bottom: 0;
                right: 0;
                left: auto;
            }

            .success {
                color: #3c763d;
                background-color: #dff0d8;
                border-color: #d6e9c6;
                display: none;
            }

            .failure {
                color: #a94442;
                background-color: #f2dede;
                border-color: #ebccd1;
                display: none;
            }

            .warning {
                color: #8a6d3b;
                background-color: #fcf8e3;
                border-color: #faebcc;
                display: none;
            }

            .chk-box{
                opacity: 1 !important;
            }

            .bg-gk-gold{
                background-color:gold;
            }

            .txt-gk-gold{
                color: gold;
            }
        </style>
</head>
<?php
include("Head.php");
?>

<body onload="productCheck()">
        <div class="custom-alert-box">
            <div class="alert-box success">Successful Added to Cart !!!</div>
            <div class="alert-box failure">Failed to Add Cart !!!</div>
            <div class="alert-box warning">Already Added to Cart !!!</div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <br>
                    <h5>Filter Product</h5>
                    <hr>
                    <h6 class="text-info"> Name</h6>
                    <ul class="list-group">
                       
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="text" onkeyup="productCheck()" placeholder="Search" class="product_check" id="txt_name" style="
    opacity: 1;
    border: none;
">
                                </label>
                            </div>
                        </li>
                    </ul>
                    <br />
                    <h6 class="text-info">Brand</h6>
                    <ul class="list-group">
                        <?php                           
						 $selCat = "SELECT * from tbl_brand";
                            $result = $Con->query($selCat);
                            while ($row=$result->fetch_assoc()) {
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" onclick="productCheck()" class="form-check-input chk-box product_check" value="<?php echo $row["brand_id"]; ?>" id="brand"><?php echo $row["brand_name"]; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <br />
                    <h6 class="text-info">Skin Routine</h6>
                    <ul class="list-group">
                        <?php                           
						 $selCat = "SELECT * from tbl_routine";
                            $result = $Con->query($selCat);
                            while ($row=$result->fetch_assoc()) {
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" onclick="productCheck()" class="form-check-input chk-box product_check" value="<?php echo $row["routine_id"]; ?>" id="routine"><?php echo $row["routine_name"]; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <br />
                    <h6 class="text-info"> Skin Concern</h6>
                    <ul class="list-group">
                        <?php                           
						 $selCat = "SELECT * from tbl_skinconcern";
                            $result = $Con->query($selCat);
                            while ($row=$result->fetch_assoc()) {
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" onclick="productCheck()" class="form-check-input chk-box product_check" value="<?php echo $row["skinconcern_id"]; ?>" id="skinconcern"><?php echo $row["skinconcern_name"]; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <br />
                    <h6 class="text-info">Skin Type</h6>
                    <ul class="list-group">
                        <?php                           
						 $selCat = "SELECT * from tbl_skintype";
                            $result = $Con->query($selCat);
                            while ($row=$result->fetch_assoc()) {
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" onclick="productCheck()" class="form-check-input chk-box product_check" value="<?php echo $row["skintype_id"]; ?>" id="skintype"><?php echo $row["skintype_name"]; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <br />
                </div>
                <div class="col-lg-9">
                <br>
                    <h5 class="text-center" id="textChange">All Products</h5>
                    <hr>
                    <div class="text-center">
                        <img src="../Assets/Templates/Search/loader.gif" id='loder' width="200" style="display: none"/>
                    </div>
                    <div class="row" id="result">
                    </div>

                </div>

            </div>
                        </div>
<!-- <script src="../Assets/Templates/Search/jquery.min.js"></script>
        <script src="../Assets/Templates/Search/bootstrap.min.js"></script>
<script src="../Assets/Templates/Search/popper.min.js"></script> -->
        <script>



            function addCart(id)
            {
                $.ajax({
                    url: "../Assets/AjaxPages/AjaxAddCart.php?id=" + id,
                    success: function(response) {
                        if (response.trim() === "Added to Cart")
                        {
                            $("div.success").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else if (response.trim() === "Already Added to Cart")
                        {
                            $("div.warning").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else
                        {
                            $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
                        }
                    }
                });
            }


            function productCheck(){
                    $("#loder").show();

                    var action = 'data';
                    var brand = get_filter_text('brand');
                    var routine = get_filter_text('routine');
                    var skinconcern = get_filter_text('skinconcern');
                    var skintype = get_filter_text('skintype');
					var name = document.getElementById('txt_name').value;
					


                    $.ajax({
                        url: "../Assets/AjaxPages/AjaxSearchProduct.php?action=" + action +"&brand=" + brand+"&routine=" + routine+"&skinconcern=" + skinconcern+"&skintype=" + skintype+"&name=" + name ,
                        success: function(response) {
                            $("#result").html(response);
                            $("#loder").hide();
                            $("#textChange").text("Filtered Products");
                        }
                    });


                }



                function get_filter_text(text_id)
                {
                    var filterData = [];

                    $('#' + text_id + ':checked').each(function() {
                        filterData.push($(this).val());
                    });
                    return filterData;
                }
            
        </script>
    </body>
<?php
include("Foot.php");
ob_flush();
?>
</html>