<?php include 'php/connect.php';?>

<?php
$personId=1;
if(!empty($_GET["action"])){
switch($_GET["action"]) {
	case "remove":
		$medicineIdfromGet=(int)$_GET['medicineId'];
		$sql="DELETE FROM cart where medicine_id=$medicineIdfromGet and person_id=$personId";
		$result = mysqli_query($conn,$sql);
	break;
	case "empty":
		$sql="DELETE FROM cart where person_id=$personId";
		$result = mysqli_query($conn,$sql);
	break;
	case "buy":
		header("Location: buy.php");	
}
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
input[type=text], select {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 50%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}
</style>
<!--php include-->
<title>EzDoc</title>
<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<center>


			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
				<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1" style="text-align:left;">Name</th>
									<th class="cell100 column3"style="text-align:left;">Quanitity</th>
									<th class="cell100 column4" style="text-align:left;">Price</th>
									<th class="cell100 column5" style="text-align:left;">Action</th>
								</tr>
							</thead>
						</table>
					</div>
					<div class="table100-body js-pscroll">
						<table>
							<tbody>
<?php
	$personId=1;			
	$sql="SELECT cart.medicine_id,medicine_name,quantity,price from cart INNER JOIN medicine ON cart.medicine_id=medicine.medicine_id where person_id=$personId order by time DESC";
	$result=mysqli_query($conn,$sql);
	$rowcount = mysqli_num_rows($result);
	$a=0;
	while($row=mysqli_fetch_assoc($result)) {
		$a++;
		echo"
				<tr class='row100 body'>
				<td class='cell100 column1' style='text-align:left;border-bottom:#F0F0F0 1px solid;'><strong>".$row['medicine_name']."</strong></td>
				<td class='cell100 column2' style='text-align:right;border-bottom:#F0F0F0 1px solid;'>".$row['quantity']."</td>
				<td class='cell100 column3' style='text-align:right;border-bottom:#F0F0F0 1px solid;'>".$row['price']."</td>
				<td class='cell100 column4' style='text-align:center;border-bottom:#F0F0F0 1px solid;'><a id='formoid$a' href='cart.php?action=remove&medicineId=".$row['medicine_id']."' class='btnRemoveAction'>Remove Item</a></td>
				</tr>";
        		$item_total += ($row["price"]*$row["quantity"]);
	}
	
	
	
	
?>

<tr>
<td colspan="2" align=right><a href='cart.php?action=empty' class='btnRemoveAction'>EMPTY CART</a></td>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>

<div style="border-radius: 5px; background-color: #f2f2f2; padding: 20px;">
<form action="buy.php" method="post">
	<input type="text" placeholder="Address" name="address" required>
	<input type="text" placeholder="City" name="city" required>
	<input type="submit" value="BUY" >
</form>
</div>
<!--a href='cart.php?action=buy' class='btnRemoveAction'>BUY</a-->
</center>
</body>
