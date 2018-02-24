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




class mlBranchStocks{
  public $id;
  public $branch_name;
  public $branch_location;
  public $food_type;
  public $item_type;
  public $item_unit;
  public $item_base;
  public $item_packet;
  public $restaurant_initial_stock_quantity;
  public $price_per_quantity;
  public $restaurant_stock_remaining_now;
  public $restaurant_stock_created_at;
  public $vendor;
  public $vendor_contact_number;
  public $quantity;
  public $restaurant_stock_allocated_at;

}

class branchStocks{
	public $branch_stocks_id;
	public $branches_id;
	public $item_types_id;
	public $branch_food_types_id;
	public $restaurant_stock_id;
	public $quantity;
	public $stock_entry_date_time;
}

class locations{
  public $location_id;
  public $location_name;
  public $locations_id;
}


class branches{
	public $branch_id;
	public $branch_name;
}


class itemTypes{
	public $item_id;
	public $item_type;
	public $unit_id;
	public $base;
	public $packet;
}

class foodTypes{
  public $food_types_id;
  public $food_type;
}

class branchFoodTypes{
  public $branch_food_types_id;
  public $food_types_id;
}


class units{
	public $unit_id;
	public $unit;
}


class restaurentStocks{
	public $restaurent_stocks_id;
	public $vendor_id;
	public $restaurant_stock_quantity;
	public $price_per_quantity;
	public $remaining_restaurant_stock;
  public $updated_at;
}


class vendors{
	public $vendor_id;
	public $vendor;
  public $contact_number;
}




$sql = "SELECT * FROM branch_stocks";
$result = $conn->query($sql);
$branch_stocks_count = 0;
$branchStock = array();
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    	$branchStock[$branch_stocks_count] = new branchStocks();
    	$branchStock[$branch_stocks_count]->branch_stocks_id = $row["id"];
    	$branchStock[$branch_stocks_count]->branches_id = $row["branches_id"];
      $branchStock[$branch_stocks_count]->item_types_id = $row["item_types_id"];
    	$branchStock[$branch_stocks_count]->branch_food_types_id = $row["branch_food_types_id"];
    	$branchStock[$branch_stocks_count]->restaurant_stock_id = $row["restaurent_stock_id"];
    	$branchStock[$branch_stocks_count]->quantity = $row["quantity"];
    	$branchStock[$branch_stocks_count]->stock_entry_date_time = $row["updated_at"];
    	$branch_stocks_count++;
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



$sql = "SELECT * FROM restaurant_stocks";
$result = $conn->query($sql);
$restaurent_stocks_count = 0;
$restaurentStock = array();
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    	$restaurentStock[$restaurent_stocks_count] = new restaurentStocks();
    	$restaurentStock[$restaurent_stocks_count]->restaurent_stocks_id = $row["id"];
    	$restaurentStock[$restaurent_stocks_count]->vendor_id = $row["vendors_id"];
    	$restaurentStock[$restaurent_stocks_count]->restaurant_stock_quantity = $row["quantity"];
    	$restaurentStock[$restaurent_stocks_count]->price_per_quantity = $row["price"];
    	$restaurentStock[$restaurent_stocks_count]->remaining_restaurant_stock = $row["remaining"];
      $restaurentStock[$restaurent_stocks_count]->updated_at = $row["updated_at"];
    	$restaurent_stocks_count++;
    }


} else {
    echo "0 results";
}



$sql = "SELECT * FROM vendors";
$result = $conn->query($sql);
$vendor_count = 0;
$vendor = array();
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    	$vendor[$vendor_count] = new vendors();
    	$vendor[$vendor_count]->vendor_id = $row["id"];
    	$vendor[$vendor_count]->vendor = $row["name"];
      $vendor[$vendor_count]->contact_number = $row["contact_number"];
    	$vendor_count++;
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

function getRestaurentStocks($restaurent_stocks_id){
 global $restaurentStock;
 global $restaurent_stocks_count;
	for ($i=0; $i <= $restaurent_stocks_count; $i++) {
		if ($restaurentStock[$i]->restaurent_stocks_id==$restaurent_stocks_id) {
			return $restaurentStock[$i];
		}
	}
  return 0;
}


function getVendor($vendor_id){
 global $vendor;
 global $vendor_count;
	for ($i=0; $i <= $vendor_count; $i++) {
		if ($vendor[$i]->vendor_id==$vendor_id) {
			return $vendor[$i];
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


// 34418
// $branch_stocks_count

$global_count_1 = 0;
$global_count_2 = 10000;

for ($i=$global_count_1; $i < $global_count_2; $i++) {

  	$mlBranchStock[$i] = new mlBranchStocks();

  	//assign ids
  	$mlBranchStock[$i]->id = $branchStock[$i]->branch_stocks_id;

  	//assign branch_names
  	$tempBranch = new branches();
  	$tempBranch = getBranch($branchStock[$i]->branches_id);
  	$mlBranchStock[$i]->branch_name = $tempBranch->branch_name;

    //assign branch_location
    $tempLocationId = $branchStock[$i]->branches_id;
    $tempLocationName = getLocationName($tempLocationId);
    $mlBranchStock[$i]->branch_location = $tempLocationName;

    //assign branch_food_types
    $tempFoodType = new foodTypes();
    $tempFoodType = getFoodTypeFromBranch($branchStock[$i]->branch_food_types_id);
    $mlBranchStock[$i]->food_type = $tempFoodType->food_type;

  	//assign item_type, unit, base, packet
  	$tempItemType = new itemTypes();
  	$tempItemType = getItemType($branchStock[$i]->item_types_id);
  	$mlBranchStock[$i]->item_type = $tempItemType->item_type;

  	$tempUnit = new units();
  	$tempUnit = getUnit($tempItemType->unit_id);
  	$mlBranchStock[$i]->item_unit = $tempUnit->unit;

  	$mlBranchStock[$i]->item_base = $tempItemType->base;
  	$mlBranchStock[$i]->item_packet = $tempItemType->packet;

	  
    //assign restaurent stocks quantity, price_per_quantity, remaining_restaurant_stock
    $tempRestaurentStock = new restaurentStocks();
    $tempRestaurentStock = getRestaurentStocks($branchStock[$i]->restaurant_stock_id);
    $mlBranchStock[$i]->restaurant_initial_stock_quantity = $tempRestaurentStock->restaurant_stock_quantity;
    $mlBranchStock[$i]->price_per_quantity = $tempRestaurentStock->price_per_quantity;
    $mlBranchStock[$i]->restaurant_stock_remaining_now = $tempRestaurentStock->remaining_restaurant_stock;
    $mlBranchStock[$i]->restaurant_stock_created_at = $tempRestaurentStock->updated_at;

    //assign vendor
    $tempVendor = new vendors();
    $tempVendor = getVendor($tempRestaurentStock->vendor_id);
    $mlBranchStock[$i]->vendor = $tempVendor->vendor;
    $mlBranchStock[$i]->vendor_contact_number = $tempVendor->contact_number;

    //assign quantity
    $mlBranchStock[$i]->quantity = $branchStock[$i]->quantity;

    //assign restaurant_stock_entered_at
    $mlBranchStock[$i]->restaurant_stock_allocated_at = $branchStock[$i]->stock_entry_date_time;
}





for($i=$global_count_1;$i< $global_count_2; $i++){
  

        $branch_name = $mlBranchStock[$i]->branch_name;
        $branch_location = $mlBranchStock[$i]->branch_location;
        $food_type = $mlBranchStock[$i]->food_type;
        $item_type = $mlBranchStock[$i]->item_type;
        $item_unit = $mlBranchStock[$i]->item_unit;
        $item_base = $mlBranchStock[$i]->item_base;
        $item_packet = $mlBranchStock[$i]->item_packet;
        $restaurant_initial_stock_quantity = $mlBranchStock[$i]->restaurant_initial_stock_quantity;
        $price_per_quantity = $mlBranchStock[$i]->price_per_quantity;
        $restaurant_stock_remaining_now = $mlBranchStock[$i]->restaurant_stock_remaining_now;
        $restaurant_stock_created_at = $mlBranchStock[$i]->restaurant_stock_created_at;
        $vendor = $mlBranchStock[$i]->vendor;
        $vendor_contact_number = $mlBranchStock[$i]->vendor_contact_number;
        $quantity = $mlBranchStock[$i]->quantity;
        $restaurant_stock_allocated_at = $mlBranchStock[$i]->restaurant_stock_allocated_at;
        

        $sql = "INSERT INTO analytics_branch_stocks (branch_name, branch_location, food_type, item_type, item_unit, item_base, item_packet, restaurant_initial_stock_quantity, price_per_quantity, restaurant_stock_remaining_now, restaurant_stock_created_at, vendor, vendor_contact_number, quantity, restaurant_stock_allocated_at) VALUES ('$branch_name', '$branch_location', '$food_type', '$item_type', '$item_unit', '$item_base', '$item_packet', '$restaurant_initial_stock_quantity', '$price_per_quantity', '$restaurant_stock_remaining_now', '$restaurant_stock_created_at', '$vendor', '$vendor_contact_number', '$quantity', '$restaurant_stock_allocated_at')";
        $conn->query($sql);

        
        echo $i."\n";


}


$conn->close();







?>
