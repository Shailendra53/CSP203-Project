<?php
session_start();
if(!empty($_GET["action"])){
$personId=1;
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$medicineIdfromGet=(int)$_GET['medicineId'];
			$query="SELECT * FROM medicine WHERE medicine_id=$medicineIdfromGet;";
			$result = mysqli_query($conn,$query);
			$rowcount = mysqli_num_rows($result);
			$quan=(int)$_POST["quantity"];
			$sql="SELECT * FROM cart WHERE medicine_id=$medicineIdfromGet and person_id=$personId;";
			$result = mysqli_query($conn,$sql);
			$rowcount = mysqli_num_rows($result);
			if($rowcount==0){
				$sql="INSERT INTO cart (person_id,medicine_id,quantity) VALUES ($personId,$medicineIdfromGet,$quan);";
				$result = mysqli_query($conn,$sql);
			}
			else{
				$sql="UPDATE cart SET quantity=quantity+$quan WHERE medicine_id=$medicineIdfromGet and person_id=$personId;";
				$result = mysqli_query($conn,$sql);
			}
		}
	break;
	case "remove":
		$medicineIdfromGet=(int)$_GET['medicineId'];
		$sql="DELETE FROM cart where medicine_id=$medicineIdfromGet and person_id=$personId";
		$result = mysqli_query($conn,$sql);
	break;
	case "empty":
		$sql="DELETE FROM cart where person_id=$personId";
		$result = mysqli_query($conn,$sql);
	break;		
}
}
?>
