<?php
 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Creating Array for JSON response
$response = array();
 
include("phpclass.php");
$obj = new AjaxCrud();
$table = "wms";
//$id = 1;
if (isset($_GET["id"])) {
    $id = $_GET['id'];
 
$result = $obj->getById($id, $table);


    if (!empty($result)) {
            $data = array();
            $data["id"] = $result["id"];
            $data["aswitch"] = $result["aswitch"];
            $data["pswitch"] = $result["pswitch"];
            $data["tapswitch"] = $result["tapswitch"];
            $data["aswitchstatus"] = $result["aswitchstatus"];
            $data["pswitchstatus"] = $result["pswitchstatus"];
            $data["tapswitchstatus"] = $result["tapswitchstatus"];
            $data["device"] = $result["device"];
          //  $obj->UpdateDataDeviceStatus($id, $data["device"], $table);
            echo json_encode($data);
        } else {
            // If no data is found
            $response["success"] = 0;
            $response["message"] = "No data on led found";
 
            // Show JSON response
            echo json_encode($response);
        }
        
}  
?>