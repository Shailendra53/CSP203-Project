<?php include 'php/connect.php';?>
<?php
function runQuery($query) {
	$result = mysqli_query(conn,$query);
	while($row=mysqli_fetch_assoc($result)) {
		$resultset[] = $row;
	}		
	if(!empty($resultset))
		return $resultset;
}

function numRows($query) {
	$result  = mysqli_query(conn,$query);
	$rowcount = mysqli_num_rows($result);
	return $rowcount;	
}
?>
<?php
session_start();
if(!empty($_GET["action"])){
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$medicineIdfromGet=(int)$_GET['medicineId'];
			$query="SELECT * FROM medicine WHERE medicine_id=$medicineIdfromGet;";
			$result = mysqli_query($conn,$query);
			$rowcount = mysqli_num_rows($result);
			while($row=mysqli_fetch_assoc($result)) {
				$productById[] = $row;
			}			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productById[0]["medicine_id"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productById[0]["medicine_id"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		$medicineIdfromGet=(int)$_GET['medicineId'];
		$sql="DELETE FROM cart where medicine_id=$medicineIdfromGet and person_id=1";
		$result = mysqli_query($conn,$sql);
	break;
	case "empty":
		$sql="DELETE FROM cart where person_id=1";
		$result = mysqli_query($conn,$sql);
	break;	
}
}
?>

<!DOCTYPE html>
<html>
<head>
<!--php include-->
<title>EzDoc</title>
</head>
<body>

<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;"><strong>Name</strong></th>
<th style="text-align:left;"><strong>Code</strong></th>
<th style="text-align:right;"><strong>Quantity</strong></th>
<th style="text-align:right;"><strong>Price</strong></th>
<th style="text-align:center;"><strong>Action</strong></th>
</tr>	

		

<?php				
	$sql="SELECT cart.medicine_id,medicine_name,sum(quantity),price from cart INNER JOIN medicine ON cart.medicine_id=medicine.medicine_id where person_id=1 GROUP BY cart.medicine_id;";
	$result=mysqli_query($conn,$sql);
	$rowcount = mysqli_num_rows($result);
	while($row=mysqli_fetch_assoc($result)) {
		echo"
				<tr>
				<td style='text-align:right;border-bottom:#F0F0F0 1px solid;'><strong>".$row['medicine_name']."</strong></td>
				<td style='text-align:right;border-bottom:#F0F0F0 1px solid;'>".$row['medicine_id']."</td>
				<td style='text-align:right;border-bottom:#F0F0F0 1px solid;'>".$row['sum(quantity)']."</td>
				<td style='text-align:right;border-bottom:#F0F0F0 1px solid;'>".$row['price']."</td>
				<td style='text-align:center;border-bottom:#F0F0F0 1px solid;'><a href='cart.php?action=remove&medicineId=".$row['medicine_id']."' class='btnRemoveAction'>Remove Item</a></td>
				</tr>";
        		$item_total += ($row["price"]*$row["quantity"]);
	}
	
	
	
	
?>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; }?></td>
</tr>
</tbody>
</table>
<a href='cart.php?action=empty' class='btnRemoveAction'>EMPTY</a>

</body>
