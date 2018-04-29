<?php include 'php/connect.php';?>
<!DOCTYPE html>
<html>
<head>
<!--php include-->
<title>EzDoc</title>
</head>
<body>

<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;"><strong>Name</strong></th>
<th style="text-align:right;"><strong>Quantity</strong></th>
<th style="text-align:right;"><strong>Price</strong></th>

</tr>	

		

<?php
	$personId=1;			
	$sql="SELECT cart.medicine_id,medicine_name,quantity,price from cart INNER JOIN medicine ON cart.medicine_id=medicine.medicine_id where person_id=$personId order by time DESC";
	$buystatus=1;
	$result=mysqli_query($conn,$sql);
	$rowcount = mysqli_num_rows($result);
	$city=$_POST["city"];
	while($row=mysqli_fetch_assoc($result)) {
		echo"
				<tr>
				<td style='text-align:left;border-bottom:#F0F0F0 1px solid;'><strong>".$row['medicine_name']."</strong></td>
				<!--td style='text-align:left;border-bottom:#F0F0F0 1px solid;'>".$row['medicine_id']."</td-->
				<td style='text-align:right;border-bottom:#F0F0F0 1px solid;'>".$row['quantity']."</td>
				<td style='text-align:right;border-bottom:#F0F0F0 1px solid;'>".$row['price']."</td>";
				$sql="SELECT * from shop INNER JOIN shop_medicine ON shop.shop_id=shop_medicine.shop_id INNER JOIN city ON shop.city_id=city.city_id WHERE city_name='".$city."' and quantity>0 and quantity>".$row['quantity']." and shop_medicine.medicine_id=".$row['medicine_id'];
				$result1=mysqli_query($conn,$sql);
				$rowcount = mysqli_num_rows($result1);
				if($rowcount==0){
					$status="not available in your city";
					$buystatus=0;
				}
				else{
					$status="";
				}
				echo"<td style='text-align:right;border-bottom:#F0F0F0 1px solid;'>".$status."</td>
				</tr>";
        		$item_total += ($row["price"]*$row["quantity"]);
	}
	
?>
<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
</tr>
</tbody>
</table>
<?php 
	if($buystatus==1){
?>
<form action="confirm.php?city=<?php echo $_POST["city"]?>" method="post">
	<input type="text" placeholder="Prescription Link" name="prescription">
	<br/>Prescription may be compulsory for some medicines<br/>
	<input type="submit" value="CONFIRM BUY ORDER" >
</form>
<?php } ?>

</body>
