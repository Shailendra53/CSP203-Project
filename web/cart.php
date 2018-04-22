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
			$productById = runQuery("SELECT * FROM medicine WHERE medicine_id='" . $_GET["medicineId"] . "'");
			$itemArray = array($productById[0]["medicine_id"]=>array('name'=>$productById[0]["medicine_name"], 'medicineId'=>$productById[0]["medicine_id"], 'quantity'=>$_POST["quantity"], 'price'=>$productById[0]["price"]));
			
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
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
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
    foreach ($_SESSION["cart_item"] as $item){
			echo"
				<tr>
				<td style='text-align:left;border-bottom:#F0F0F0 1px solid;'><strong>".$item['medicine_name']."</strong></td>
				<td style='text-align:left;border-bottom:#F0F0F0 1px solid;'>".$item['medicine_id']."</td>
				<td style='text-align:right;border-bottom:#F0F0F0 1px solid;'>".$item['quantity']."</td>
				<td style='text-align:right;border-bottom:#F0F0F0 1px solid;'>".$item['price']."</td>
				<td style='text-align:center;border-bottom:#F0F0F0 1px solid;'><a href='cart.php?action=remove&medicineId=".$item['medicineId']."' class='btnRemoveAction'>Remove Item</a></td>
				</tr>";
        		$item_total += ($item["price"]*$item["quantity"]);
		}
?>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; }?></td>
</tr>
</tbody>
</table>

</body>
