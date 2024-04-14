<?php
include("dbconnection.php");
session_start();
if(empty($_SESSION['ses_user'])){
  header("Location:../login/index.php");
}
else{
  $ID=$_SESSION['ses_id'];
  if($con)
  {
    $query="select * from registration where id='$ID'";
    $result=mysqli_query($con,$query);
    if($result && mysqli_num_rows($result)>0)
    {
      $row=mysqli_fetch_assoc($result);
      
   
?>
<! DOCTYPE html>  
<html>  
<meta name="viewport" content="width=device-width, initial-scale=1">    
<meta charset="UTF-8">    
<title> Your Order</title>     
 </head>  
<style>  
@import url('https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700');  
body {  
  font-family: 'Roboto Condensed', sans-serif;  
  color: #262626;  
  margin: 5% 0;  
}  
.container {  
  width: 100%;  
  padding-right: 15px;  
  padding-left: 15px;  
  margin-right: auto;  
  margin-left: auto;  
}  
@media (min-width: 1200px)  
{  
  .container {  
    max-width: 1140px;  
  }  
}  
.d-flex {  
  display: flex;  
  flex-direction: row;  
  background: #f6f6f6;  
  border-radius: 0 0 5px 5px;  
  padding: 25px;  
}  
form {  
  flex: 4;  
}  
.Yorder {  
  flex: 2;  
}  
.title {  
  background: -webkit-gradient(linear, left top, right bottom, color-stop(0, #5195A8), color-stop(100, #70EAFF));  
  background: -moz-linear-gradient(top left, #5195A8 0%, #70EAFF 100%);  
  background: -ms-linear-gradient(top left, #5195A8 0%, #70EAFF 100%);  
  background: -o-linear-gradient(top left, #5195A8 0%, #70EAFF 100%);  
  background: linear-gradient(to bottom right, #5195A8 0%, #70EAFF 100%);  
  border-radius: 5px 5px 0 0 ;  
  padding: 20px;  
  color: #f6f6f6;  
}  
h2 {  
  margin: 0;  
  padding-left: 15px;   
}  
.required {  
  color: red;  
}  
label {  
  display: block;  
  margin: 15px;  
}  
table {  
  display: block;  
  margin: 15px;  
}  
label>span {  
  float: left;  
  width: 25%;  
  margin-top: 12px;  
  padding-right: 10px;  
}  
input[type="email"]  
{  
  width: 70%;  
  height: 30px;  
  padding: 5px 10px;  
  margin-bottom: 10px;  
  border: 1px solid #dadada;  
  color: #888;  
}  
select  
{  
  width: 70%;  
  height: 30px;  
  padding: 5px 10px;  
  margin-bottom: 10px;  
  border: 1px solid #dadada;  
  color: #888;  
}  
input[type="text"] {  
  width: 70%;  
  height: 30px;  
  padding: 5px 10px;  
  margin-bottom: 10px;  
  border: 1px solid #dadada;  
  color: #888;  
}  
input[type="tel"]   
{  
  width: 70%;  
  height: 30px;  
  padding: 5px 10px;  
  margin-bottom: 10px;  
  border: 1px solid #dadada;  
  color: #888;  
}  
select {  
  width: 72%;  
  height: 45px;  
  padding: 5px 10px;  
  margin-bottom: 10px;  
}  
.Yorder {  
  margin-top: 15px;  
  height: 600px;  
  padding: 20px;  
  border: 1px solid #dadada;  
}  
table {  
  margin: 0;  
  padding: 0;  
}  
th {  
  border-bottom: 1px solid #dadada;  
  padding: 10px 0;  
}  
tr>td:nth-child(1) {  
  text-align: left;  
  color: #2d2d2a;  
}  
tr>td:nth-child(2) {  
  text-align: right;  
  color: #52ad9c;  
}  
td {  
  border-bottom: 1px solid #dadada;  
  padding: 25px 25px 25px 0;  
}  
p {  
  display: block;  
  color: #888;  
  margin: 0;  
  padding-left: 25px;  
}  
.Yorder>div {  
  padding: 15px 0;   
}  
.button {  
  width: 100%;  
  margin-top: 10px;  
  padding: 10px;  
  border: none;  
  border-radius: 30px;  
  background: #52ad9c;  
  color: #fff;  
  font-size: 15px;  
  font-weight: bold;  
}  
.button:hover {  
  cursor: pointer;  
  background: #428a7d;  
}
.user-info label,
    .order-details label {
      display: block;
      margin: 10px;
    }

    .user-info input[type="email"],
    .user-info select,
    .user-info input[type="text"],
    .user-info input[type="tel"],
    .user-info input[type="email"] {
      width: 100%; /* Adjust width for user info fields */
    }  
</style>  
<body>  
<div class="container">  
  <div class="title">  
      <h2> Your Order  </h2>  
  </div> 
  <form method="POST" action="process.php">
<div class="d-flex"> 
  <div class="user-info">   
    <label>  
      <span class="fname">Name <span class="required"> * </span></span> 

      <input type="text" name="lname" value="<?php echo $row['NAME'];  ?>">
    </label>  
    <!--<label>  
      <span class="lname"> Last Name <span class="required"> * </span> </span>  
      <input type="text" name="lname">  
    </label>  
    
    <label>  
      <span> Company Name </span>  
      <input type="text" name="cn">  
    </label>

    <label>  
      <span>Country <span class="required">*</span></span>  
      <select name="selection">  
        <option value="select"> Select a country... </option>  
        <option value="AFG">Afghanistan</option>  
        <option value="ALA">?land Islands</option>  
        <option value="ALB">Albania</option>  
        <option value="DZA">Algeria</option>  
        <option value="ASM">American Samoa</option>  
        <option value="AND">Andorra</option>  
        <option value="BOL">Bolivia</option>  
        <option value="BES">Bonaire</option>  
        <option value="BIH">Bosnia</option>  
        <option value="BWA">Botswana</option>  
        <option value="BVT">Bouvet Island</option>  
        <option value="BRA">Brazil</option>  
        <option value="CUB">Cuba</option>  
        <option value="CUW">Cura?ao</option>  
        <option value="CYP">Cyprus</option>  
        <option value="CZE">Czech Republic</option>  
        <option value="EST">Estonia</option>  
        <option value="ETH">Ethiopia</option>  
        <option value="FLK">Falkland Islands (Malvinas)</option>
        <option value="IND">India</option>  
        <option value="LTU">Lithuania</option>  
        <option value="LUX">Luxembourg</option>  
        <option value="MAC">Macao</option>  
        <option value="MKD">Macedonia, the former Yugoslav Republic of</option>  
        <option value="MDG">Madagascar</option>  
        <option value="MCO">Monaco</option>  
        <option value="MNG">Mongolia</option>  
        <option value="MNE">Montenegro</option>  
        <option value="MSR">Montserrat</option>  
        <option value="MAR">Morocco</option>  
        <option value="NPL">Nepal</option>  
        <option value="BLM">Saint Barth?lemy</option>  
        <option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>  
        <option value="KNA">Saint Kitts and Nevis</option>  
        <option value="LCA">Saint Lucia</option>  
        <option value="MAF">Saint Martin (French part)</option>  
        <option value="SPM">Saint Pierre and Miquelon</option>  
        <option value="VCT">Saint Vincent and the Grenadines</option>  
        <option value="VNM">Viet Nam</option>  
        <option value="VGB">Virgin Islands, British</option>  
        <option value="VIR">Virgin Islands, U.S.</option>  
        <option value="WLF">Wallis and Futuna</option>  
        <option value="ESH">Western Sahara</option>  
        <option value="YEM">Yemen</option>  
        <option value="ZMB">Zambia</option>  
        <option value="ZWE">Zimbabwe</option>  
      </select>  
    </label> 
--> 
    <label>  
      <span> Address <span class="required"> * </span></span>  
      <input type="text" name="houseadd" placeholder="House number and street name" required value="<?php echo $row['Address'];  ?>">  
    </label>  
     
    <label>  
      <span> Town / City <span class="required">*</span></span>  
      <input type="text" name="city">   
    </label>  
    <label>  
      <span> State / County <span class="required">*</span></span>  
      <input type="text" name="state">   
    </label>  
    <label>  
      <span> Postcode / ZIP <span class="required">*</span></span>  
      <input type="text" name="zip">   
    </label>  
    <label>  
      <span> Phone Number <span class="required">*</span></span>  
      <input type="tel" name="phone" value="<?php echo $row['phone'];  ?>">   
    </label>  
    <label>  
      <span> Email Address <span class="required">*</span></span>  
      <input type="email" name="email" value="<?php echo $row['Email'];  ?>">   
    </label>
 
    <?php
     }
    }
    ?>
  </div>  
  <div class="Yorder">  
    <table>  
      <tr>  
        <th colspan="2"> Your order </th>  
      </tr>  
<?php

if(!empty($_SESSION["cart_item"])){
$item_total = 0;
?>
<tbody>
<tr>
<th><strong>FOOD Name</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Price</strong></th>
<th><strong>Action</strong></th>
</tr>
<?php
foreach ($_SESSION["cart_item"] as $item){
?>
<tr>
<td><strong><?php echo $item["Foodname"]; ?></strong></td>
<td><?php echo $item["quantity"]; ?></td>
<td><?php echo "$".$item["Amount"]; ?></td>
<td><a href="../website-8/product-action.php?action=remove&ID=<?php echo $item["ID"]; ?>" class="btnRemoveAction">Remove</a></td>
</tr>
<?php
$item_total += ($item["Amount"]*$item["quantity"]);
}
?>

<tr>
<td colspan="3" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
</tr>
<tr>  
        <td> Shipping charge </td>  
        <td>   Free </td>  
      </tr>
</tbody>
<?php
}
?>
        
        
    </table><br>  
    <div>  
      <input type="radio" name="dbt" value="dbt" checked> Pay Online 
    </div>  
    <p>  
        Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.  
    </p>  
    <div>  
      <input type="radio" name="dbt" value="cd"> Cash on Delivery  
    </div>  
      
    <input type="submit" name="submit" class="button" value="Place Order "> </input>
    </form>  
  </div>  
 </div>  
</div>  
</body>  
</html>
<?php
}
?>  