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




class mlSales{
	public $id;
	public $branch_name;
  public $branch_location;
	public $food_type;
	public $amount;
	public $sold_at;
}



class sales{
	public $id;
	public $branch_food_types_id;
	public $amount;
	public $updated_at;
}

class branches{
	public $branch_id;
	public $branch_name;
}

class locations{
  public $location_id;
  public $location_name;
}

class branchFoodTypes{
	public $branch_food_types_id;
	public $branches_id;
	public $food_types_id;
}


class foodTypes{
  public $food_types_id;
  public $food_type;
}




$sql = "SELECT * FROM sales";
$result = $conn->query($sql);
$sales_count = 0;
$sale = array();
if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
      $sale[$sales_count] = new sales();
      $sale[$sales_count]->id = $row["id"];
      $sale[$sales_count]->branch_food_types_id = $row["branch_food_types_id"];
      $sale[$sales_count]->amount = $row["amount"];
      $sale[$sales_count]->updated_at = $row["updated_at"];
      $sales_count++;
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
      $branchFoodType[$branch_food_type_count]->branches_id = $row["branches_id"];
      $branchFoodType[$branch_food_type_count]->food_types_id = $row["food_types_id"];
      $branch_food_type_count++;
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

function getFoodTypeFromBranch($branch_food_types_id){
  global $branchFoodType;
  global $branch_food_type_count;
  for ($i=0; $i < $branch_food_type_count; $i++) { 
    if($branchFoodType[$i]->branch_food_types_id==$branch_food_types_id){
       return $branchFoodType[$i];
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



// 3136
// $sales_count

$global_count_1 = 0;
$global_count_2 = 3137;

for ($i=$global_count_1; $i < $global_count_2; $i++) { 
  $mlSale[$i] = new mlSales();

  //assign id
  $mlSale[$i]->id = $sale[$i]->id;  

  //assign branch_names, food_type
    $tempBranchFoodType = new branchFoodTypes();
    $tempBranchFoodType = getFoodTypeFromBranch($sale[$i]->branch_food_types_id);

    $tempFoodType = new foodTypes();
    $tempFoodType = getFoodType($tempBranchFoodType->food_types_id);
    $mlSale[$i]->food_type = $tempFoodType->food_type;

    $tempBranch = new branches();
    $tempBranch = getBranch($tempBranchFoodType->branches_id);
  $mlSale[$i]->branch_name = $tempBranch->branch_name;    

  // assign branch_location
  $tempLocationName = getLocationName($tempBranchFoodType->branches_id);
  $mlSale[$i]->branch_location = $tempLocationName;

  //assign amount
  $mlSale[$i]->amount = $sale[$i]->amount;

  //assign sold_at
  $mlSale[$i]->sold_at = $sale[$i]->updated_at;

}




for ($i=$global_count_1; $i < $global_count_2; $i++) { 
 
     $branch_name = $mlSale[$i]->branch_name;
     $branch_location = $mlSale[$i]->branch_location;
     $food_type = $mlSale[$i]->food_type;
     $amount = $mlSale[$i]->amount;
     $sold_at = $mlSale[$i]->sold_at;

     $sql = "INSERT INTO analytics_sales (branch_name, branch_location, food_type, amount, sold_at) VALUES ('$branch_name', '$branch_location', '$food_type', '$amount', '$sold_at')";
      $conn->query($sql);

    echo $i."\n";  
}









$conn->close();

?>