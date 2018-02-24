<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



class mlBranchStockRequests{
	public $id;
	public $branch_name;
	public $branch_location;
	public $transaction_id;
	public $food_type;
	public $item_type;
	public $item_unit;
	public $item_base;
	public $item_packet;
	public $quantity;
  public $created_by;
  public $status;
  public $requested_at;
  public $allocated_at;
}


class branchStockRequests{
	public $id;
	public $transaction_id;
	public $item_types_id;
	public $branches_id;
	public $branch_food_types_id;
  public $created_by;
	public $quantity;
	public $requested_at;
  public $updated_at;
}


class locations{
	public $location_id;
	public $location_name;
}

class branches{
	public $branch_id;
	public $branch_name;
  public $locations_id;
}


class itemTypes{
	public $item_id;
	public $item_type;
	public $unit_id;
	public $base;
	public $packet;
}


class branchFoodTypes{
	public $branch_food_types_id;
	public $food_types_id;
}


class foodTypes{
  public $food_types_id;
  public $food_type;
}


class units{
	public $unit_id;
	public $unit;
}



$sql = "SELECT * FROM branch_stock_requests";
$result = $conn->query($sql);
$branch_stock_requests_count = 0;
$branchStockRequest = array();
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    	$branchStockRequest[$branch_stock_requests_count] = new branchStockRequests();
    	$branchStockRequest[$branch_stock_requests_count]->id = $row["id"];
    	$branchStockRequest[$branch_stock_requests_count]->transaction_id = $row["transaction_id"];
    	$branchStockRequest[$branch_stock_requests_count]->item_types_id = $row["item_types_id"];
    	$branchStockRequest[$branch_stock_requests_count]->branches_id = $row["branches_id"];
    	$branchStockRequest[$branch_stock_requests_count]->branch_food_types_id = $row["branch_food_types_id"];
    	$branchStockRequest[$branch_stock_requests_count]->quantity = $row["quantity"];
      $branchStockRequest[$branch_stock_requests_count]->created_by = $row["created_by"];
      $branchStockRequest[$branch_stock_requests_count]->status = $row["status"];
    	$branchStockRequest[$branch_stock_requests_count]->requested_at = $row["requested_at"];
      $branchStockRequest[$branch_stock_requests_count]->updated_at = $row["updated_at"];
    	$branch_stock_requests_count++;
    }


} else {
    echo "0 results";
}



$sql = "SELECT * FROM locations";
$result = $conn->query($sql);
$locations_count = 0;
$locations = array();
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    	$locations[$locations_count] = new locations();
    	$locations[$locations_count]->location_id = $row["id"];
      $locations[$locations_count]->location_name = $row["name"];
    	$locations_count++;
    }


} else {
    echo "0 results";
}




$sql = "SELECT * FROM branches";
$result = $conn->query($sql);
$branches_count = 0;
$branch = array();
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    	$branch[$branches_count] = new branches();
    	$branch[$branches_count]->branch_id = $row["id"];
    	$branch[$branches_count]->branch_name = $row["name"];
      $branch[$branches_count]->locations_id = $row["locations_id"];
    	$branches_count++;
    }


} else {
    echo "0 results";
}



$sql = "SELECT * FROM item_types";
$result = $conn->query($sql);
$item_type_count = 0;
$itemType = array();
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    	$itemType[$item_type_count] = new itemTypes();
    	$itemType[$item_type_count]->item_id = $row["id"];
    	$itemType[$item_type_count]->item_type = $row["name"];
    	$itemType[$item_type_count]->unit_id = $row["unit_types_id"];
    	$itemType[$item_type_count]->base = $row["base"];
    	$itemType[$item_type_count]->packet = $row["packet"];
    	$item_type_count++;
    }


} else {
    echo "0 results";
}



$sql = "SELECT * FROM food_types";
$result = $conn->query($sql);
$food_type_count = 0;
$foodType = array();
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $foodType[$food_type_count] = new foodTypes();
      $foodType[$food_type_count]->food_types_id = $row["id"];
      $foodType[$food_type_count]->food_type = $row["name"];
      $food_type_count++;
    }


} else {
    echo "0 results";
}



$sql = "SELECT * FROM branch_food_types";
$result = $conn->query($sql);
$branch_food_type_count = 0;
$branchFoodType = array();
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $branchFoodType[$branch_food_type_count] = new branchFoodTypes();
      $branchFoodType[$branch_food_type_count]->branch_food_types_id = $row["id"];
      $branchFoodType[$branch_food_type_count]->food_types_id = $row["food_types_id"];
      $branch_food_type_count++;
    }


} else {
    echo "0 results";
}






$sql = "SELECT * FROM unit_types";
$result = $conn->query($sql);
$unit_count = 0;
$unit = array();
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    	$unit[$unit_count] = new units();
    	$unit[$unit_count]->unit_id = $row["id"];
    	$unit[$unit_count]->unit = $row["name"];
    	$unit_count++;
    }


} else {
    echo "0 results";
}





function getBranch($branch_id){
 global $branch;
 global $branches_count;
  for ($i=0; $i <= $branches_count; $i++) {
    if($branch[$i]->branch_id==$branch_id){
      return $branch[$i];
    }
  }
  return 0;
}


function getItemType($item_id){
 global $itemType;
 global $item_type_count;
	for ($i=0; $i <= $item_type_count; $i++) {
		if($itemType[$i]->item_id==$item_id){
			return $itemType[$i];
		}
	}
  return 0;
}


function getFoodTypeFromBranch($branch_food_types_id){
	global $branchFoodType;
	global $branch_food_type_count;
	for ($i=0; $i < $branch_food_type_count; $i++) {
    if($branchFoodType[$i]->branch_food_types_id==$branch_food_types_id){
       $result = new foodTypes();
       $result = getFoodType($branchFoodType[$i]->food_types_id);
       return $result;
    }
  }
  return 0;
}


function getFoodType($food_types_id){
  global $foodType;
  global $food_type_count;
  for ($i=0; $i < $food_type_count; $i++) {
    if($foodType[$i]->food_types_id==$food_types_id){
      return $foodType[$i];
    }
  }
  return 0;
}


function getUnit($unit_id){
 global $unit;
 global $unit_count;
	for ($i=0; $i <= $unit_count; $i++) {
		if($unit[$i]->unit_id==$unit_id){
			return $unit[$i];
		}
	}
  return 0;
}


function getLocationName($locationId){
  global $locations;
  global $locations_count;
 	for ($i=0; $i <= $locations_count; $i++) {
 		if($locations[$i]->location_id==$locationId){
 			return $locations[$i]->location_name;
 		}
 	}
   return 0;
}




// 34667
// $branch_stock_requests_count

$global_count_1 = 0;
$global_count_2 = 10000;

for ($i=$global_count_1; $i < $global_count_2; $i++) {
	$mlBranchStockRequest[$i] = new mlBranchStockRequests();

	//assign id
	$mlBranchStockRequest[$i]->id = $branchStockRequest[$i]->id;

  //assign branch_names
   $tempBranch = new branches();
   $tempBranch = getBranch($branchStockRequest[$i]->branches_id);
   $mlBranchStockRequest[$i]->branch_name = $tempBranch->branch_name;
  
	//assign branch_location
	$tempLocationId = $branchStockRequest[$i]->branches_id;
  $tempLocationName = getLocationName($tempLocationId);
  $mlBranchStockRequest[$i]->branch_location = $tempLocationName;

	//assign transaction_id
	$mlBranchStockRequest[$i]->transaction_id = $branchStockRequest[$i]->transaction_id;

  //assign branch_food_types
  $tempFoodType = new foodTypes();
  $tempFoodType = getFoodTypeFromBranch($branchStockRequest[$i]->branch_food_types_id);
  $mlBranchStockRequest[$i]->food_type = $tempFoodType->food_type;

	//assign item_type, unit, base, packet
	$tempItemType = new itemTypes();
	$tempItemType = getItemType($branchStockRequest[$i]->item_types_id);
	$mlBranchStockRequest[$i]->item_type = $tempItemType->item_type;

	$tempUnit = new units();
	$tempUnit = getUnit($tempItemType->unit_id);
	$mlBranchStockRequest[$i]->item_unit = $tempUnit->unit;

	$mlBranchStockRequest[$i]->item_base = $tempItemType->base;
	$mlBranchStockRequest[$i]->item_packet = $tempItemType->packet;

  //assign quantity
  $mlBranchStockRequest[$i]->quantity = $branchStockRequest[$i]->quantity;

  //assign created_by
  $mlBranchStockRequest[$i]->created_by = $branchStockRequest[$i]->created_by;

  //assign status
  $mlBranchStockRequest[$i]->status = $branchStockRequest[$i]->status;

  //assign requested_at
  $mlBranchStockRequest[$i]->requested_at = $branchStockRequest[$i]->requested_at;

  //assign allocated_at
  $mlBranchStockRequest[$i]->allocated_at = $branchStockRequest[$i]->updated_at;
}



for ($i=$global_count_1; $i < $global_count_2; $i++) {

      $branch_name = $mlBranchStockRequest[$i]->branch_name;
      $branch_location = $mlBranchStockRequest[$i]->branch_location;
      $transaction_id = $mlBranchStockRequest[$i]->transaction_id;
      $food_type = $mlBranchStockRequest[$i]->food_type;
      $item_type = $mlBranchStockRequest[$i]->item_type;
      $item_unit = $mlBranchStockRequest[$i]->item_unit;
      $item_base = $mlBranchStockRequest[$i]->item_base;
      $item_packet = $mlBranchStockRequest[$i]->item_packet;
      $quantity = $mlBranchStockRequest[$i]->quantity;
      $created_by = $mlBranchStockRequest[$i]->created_by;
      $status = $mlBranchStockRequest[$i]->status;
      $requested_at = $mlBranchStockRequest[$i]->requested_at;
      $allocated_at = $mlBranchStockRequest[$i]->allocated_at;
    	


  $sql = "INSERT INTO analytics_branch_stock_requests (branch_name, branch_location, transaction_id, food_type, item_type, item_unit, item_base, item_packet, quantity, created_by, status, requested_at, allocated_at) VALUES ('$branch_name', '$branch_location', '$transaction_id', '$food_type', '$item_type', '$item_unit', '$item_base', '$item_packet', '$quantity', '$created_by', '$status', '$requested_at', '$allocated_at')";
  $conn->query($sql);

 echo $i."\n";

}







$conn->close();



?>
