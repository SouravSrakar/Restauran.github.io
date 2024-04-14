<?php
session_start();
include_once 'connection.php';
if(empty($_SESSION['ses_user'])){
    header("Location:../login/index.php");
}
?>
<html>
<head>
<title>RESTAURANT WEBSITE</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
</head>
<body>

<div class="main">

<!----- Start Header ------>
<div class="header">

	
    
    <!--<div class="header-bottom">
    	<div class="header-font">Eat healthy food &amp; Enjoy your life.</div>
        
        <div class="p50_0" align="center">
        <a href="#!" class="header-btns">BOOK A TABLE</a>&nbsp; &nbsp; &nbsp; &nbsp;
        <a href="#!" class="header-btns">SEE THE MENU </a>
        </div>
    </div>
-->
</div>
<!----- End Header ------>

<!----- Start Content ------>
<div class="content-part-1">
	<div class="content-part-1-left">
    	<div class="content-part-1-left-h3">RESTAURANT</div>
        <div class="content-part-1-left-p">
        Indulge in a culinary journey of flavors at Restaurant , where passion meets plate, and every bite tells a story of exquisite taste and unparalleled dining experience
        </div>
       <!-- <div class="p20_0"><a href="#!" class="content-part-1-left-btn">Read More.</a></div>-->
    </div>
    <div class="content-part-1-right" align="center">
    	<img src="images/content-part-1.jpg" width="673" height="434" alt="Restaurant">
    </div>
</div>

<div class="content-part-2">
	<!--<div class="content-part-2-inner">
    	<div class="interior-font">Restaurant Interior</div>
    	<div class="content-interior">
   	    	<img src="images/interior.jpg" width="350" height="200">
            <div class="content-interior-h3">Non AC Hall</div>
            <div class="content-interior-p">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
        </div>
        <div class="content-interior">
   	    	<img src="images/interior-2.jpg" width="350" height="200"> 
            <div class="content-interior-h3">Central AC Hall</div>
            <div class="content-interior-p">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
        </div>

    </div>
-->
</div>
<?php
$stmt = $con->prepare("select * from food");
$stmt->execute();
$products = $stmt->get_result();
if (!empty($products)){
    foreach($products as $product) {

?>
<div class="content-part-3">

	<div class="content-part-3-left"><img src="../ADMIN/pages/tables/image/<?php echo $product['Picture']; ?>" width="230" height="155"></div>
    <div class="content-part-3-right">
    <?php //$id= $product['ID']; 
    
        ?>
    <form method="post" action="product-action.php?action=add&ID=<?php echo htmlentities($product['ID']);?>">
        <div class="content-part-3-right-h4"><?php echo $product['Foodname']; ?></div>
        <div class="price">Price : <i class="green"><span class="fa fa-inr"></span><?php echo $product['Amount']; ?></i></div>
        <div class=""><?php echo $product['des']; ?></div>       
        <div>
        <input type="text" name="quantity" value="1" size="2" />
        <input type="submit" value="Add to cart" />
            
        </div>

    </form>
    </div>

    <?php } } ?>
    <!--
    <div class="content-part-3-left"><img src="images/menu/2.jpg" width="230" height="155"></div>
    <div class="content-part-3-right">
        <div class="content-part-3-right-h4">Lorem Ipsum</div>
        <div class="price">Price : <i class="green"><span class="fa fa-inr"></span>150.00/-</i></div>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        <div class="margin_p3"><a href="#!" class="order-now">Order Now</a></div>
    </div>
            
    <div class="content-part-3-left"><img src="images/menu/3.jpg" width="230" height="155"></div>
    <div class="content-part-3-right">
        <div class="content-part-3-right-h4">Lorem Ipsum</div>
        <div class="price">Price : <i class="green"><span class="fa fa-inr"></span>220.00/-</i></div>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        <div class="margin_p3"><a href="#!" class="order-now">Order Now</a></div>
    </div>
    <div class="content-part-3-left"><img src="images/menu/4.jpg" width="230" height="155"></div>
    <div class="content-part-3-right">
        <div class="content-part-3-right-h4">Lorem Ipsum</div>
        <div class="price">Price : <i class="green"><span class="fa fa-inr"></span>90.00/-</i></div>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        <div class="margin_p3"><a href="#!" class="order-now">Order Now</a></div>
    </div>
            
    <div class="content-part-3-left"><img src="images/menu/5.jpg" width="230" height="155"></div>
    <div class="content-part-3-right">
        <div class="content-part-3-right-h4">Lorem Ipsum</div>
        <div class="price">Price : <i class="green"><span class="fa fa-inr"></span>250.00/-</i></div>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        <div class="margin_p3"><a href="#!" class="order-now">Order Now</a></div>
    </div>
    <div class="content-part-3-left"><img src="images/menu/6.jpg" width="230" height="155"></div>
    <div class="content-part-3-right">
        <div class="content-part-3-right-h4">Lorem Ipsum</div>
        <div class="price">Price : <i class="green"><span class="fa fa-inr"></span>300.00/-</i></div>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        <div class="margin_p3"><a href="#!" class="order-now">Order Now</a></div>
    </div>
            
    <div class="content-part-3-left"><img src="images/menu/7.jpg" width="230" height="155"></div>
    <div class="content-part-3-right">
        <div class="content-part-3-right-h4">Lorem Ipsum</div>
        <div class="price">Price : <i class="green"><span class="fa fa-inr"></span>270.00/-</i></div>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        <div class="margin_p3"><a href="#!" class="order-now">Order Now</a></div>
    </div>
    <div class="content-part-3-left"><img src="images/menu/8.jpg" width="230" height="155"></div>
    <div class="content-part-3-right">
        <div class="content-part-3-right-h4">Lorem Ipsum</div>
        <div class="price">Price : <i class="green"><span class="fa fa-inr"></span>325.00/-</i></div>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        <div class="margin_p3"><a href="#!" class="order-now">Order Now</a></div>
    </div>
            
    <div class="content-part-3-left"><img src="images/menu/9.jpg" width="230" height="155"></div>
    <div class="content-part-3-right">
        <div class="content-part-3-right-h4">Lorem Ipsum</div>
        <div class="price">Price : <i class="green"><span class="fa fa-inr"></span>455.00/-</i></div>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        <div class="margin_p3"><a href="#!" class="order-now">Order Now</a></div>
    </div>
    <div class="content-part-3-left"><img src="images/menu/10.jpg" width="230" height="155"></div>
    <div class="content-part-3-right">
        <div class="content-part-3-right-h4">Lorem Ipsum</div>
        <div class="price">Price : <i class="green"><span class="fa fa-inr"></span>180.00/-</i></div>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        <div class="margin_p3"><a href="#!" class="order-now">Order Now</a></div>
    </div>
            
    <div class="content-part-3-left"><img src="images/menu/11.jpg" width="230" height="155"></div>
    <div class="content-part-3-right">
        <div class="content-part-3-right-h4">Lorem Ipsum</div>
        <div class="price">Price : <i class="green"><span class="fa fa-inr"></span>200.00/-</i></div>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        <div class="margin_p3"><a href="#!" class="order-now">Order Now</a></div>
    </div>
    <div class="content-part-3-left"><img src="images/menu/12.jpg" width="230" height="155"></div>
    <div class="content-part-3-right">
        <div class="content-part-3-right-h4">Lorem Ipsum</div>
        <div class="price">Price : <i class="green"><span class="fa fa-inr"></span>155.00/-</i></div>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        <div class="margin_p3"><a href="#!" class="order-now">Order Now</a></div>
    </div>
            
    <div class="content-part-3-left"><img src="images/menu/13.jpg" width="230" height="155"></div>
    <div class="content-part-3-right">
        <div class="content-part-3-right-h4">Lorem Ipsum</div>
        <div class="price">Price : <i class="green"><span class="fa fa-inr"></span>499.00/-</i></div>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        <div class="margin_p3"><a href="#!" class="order-now">Order Now</a></div>
    </div>
    <div class="content-part-3-left"><img src="images/menu/14.jpg" width="230" height="155"></div>
    <div class="content-part-3-right">
        <div class="content-part-3-right-h4">Lorem Ipsum</div>
        <div class="price">Price : <i class="green"><span class="fa fa-inr"></span>99.00/-</i></div>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        <div class="margin_p3"><a href="#!" class="order-now">Order Now</a></div>
    </div>
-->
</div>
<!----- End Content ------>

<!------ Start Footer ------>
<div class="footer">
	<div class="footer-parts">
    	<div class="footer-parts-h3">About Restaurant</div>
        <div class="footer-parts-p">
        Indulge in a culinary journey of flavors at  Restaurant , where passion meets plate, and every bite tells a story of exquisite taste and unparalleled dining experience
       </div>
    </div>
    <div class="footer-parts">
    	<div class="footer-parts-h3">Opening Hours</div>
        <div class="footer-parts-p">
        	Mon - Thu : 7:00 AM - 10:00 PM <br />
            Friday : 7:00 AM - 11:00 PM <br />
            Sat - Sun : 7:00 AM - 11:45 PM 
        </div>
    </div>
    <div class="footer-parts">
    	<div class="footer-parts-h3">Our Location</div>
        <div class="footer-parts-p">
        	3rd phace MG Layout,<br />
            Opp - Smaple School,<br />
            Pl Name - Free Time Learn,<br />
            Andhra Pradesh, Nellore(Dt),<br /> 
            India - 524002
        </div>
        <div class="footer-icons">
        	<ul>
            	<li><a href="#!"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#!"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#!"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#!"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
    </div>
</div>

<div class="footer-bottom">
	<div class="white">&copy; <script language="javascript" type="text/javascript">document.write(new Date().getFullYear());</script>. All rights reserved by <a href="http://www.freetimelearning.com/" target="_blank">Free Time Learn</a>.</div>
</div>
<!------ End Footer ------->

<div class="clearfix"></div>
</div>

</body>
</html>
