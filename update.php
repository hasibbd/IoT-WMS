<?php

//Creating Array for JSON response
$response = array();
include("phpclass.php");
$obj = new AjaxCrud();
$table = "wms";
$id = 1;
// Check if we got the field from the user
if (isset($_GET['s1'])) {
    $status= $_GET['s1'];
    $obj->UpdateDataAuto($id, $status, $table);
    $response["success"] = 1;
    $response["message"] = "Auto successfully updated...";
    // Show JSON response
    echo json_encode($response);
}
if (isset($_GET['s2'])) {
    $status= $_GET['s2'];
    $obj->UpdateDataPump($id, $status, $table);
    $response["success"] = 1;
    $response["message"] = "Pump successfully updated...";
    // Show JSON response
    echo json_encode($response);
}
if (isset($_GET['s3'])) {
    $status= $_GET['s3'];
    $obj->UpdateDataTap($id, $status, $table);
    $response["success"] = 1;
    $response["message"] = "Tap successfully updated...";
    // Show JSON response
    echo json_encode($response);
}
if (isset($_GET['s1s'])) {
    $status= $_GET['s1s'];
    $obj->UpdateDataAutoStatus($id, $status, $table);
    $response["success"] = 1;
    $response["message"] = "Auto Status successfully updated...";
    // Show JSON response
    echo json_encode($response);
}
if (isset($_GET['s2s'])) {
    $status= $_GET['s2s'];
    $obj->UpdateDataPumpStatus($id, $status, $table);
    $response["success"] = 1;
    $response["message"] = "Pump Status successfully updated...";
    // Show JSON response
    echo json_encode($response);
}
if (isset($_GET['s3s'])) {
    $status= $_GET['s3s'];
    $obj->UpdateDataTapStatus($id, $status, $table);
    $response["success"] = 1;
    $response["message"] = "Tap Staus successfully updated...";
    // Show JSON response
    echo json_encode($response);
}
if (isset($_GET['ds'])) {
    $status= $_GET['ds'];
    $obj->UpdateDataDeviceStatus($id, $status, $table);
    $response["success"] = 1;
    $response["message"] = "Data successfully updated...";
    // Show JSON response
    echo json_encode($response);
}
if (isset($_GET['wl'])) {
    $t = $_GET['mt'];
    $r = $_GET['rt'];
    $obj->UpdateWater($id, $r, $t, $table);
    $response["success"] = 1;
    $response["message"] = "Water Level successfully updated...";
    // Show JSON response
    echo json_encode($response);
}
if (isset($_GET['all'])) {
    $a = $_GET['x'];
    $p = $_GET['y'];
    $t = $_GET['z'];
    $mt = $_GET['mt'];
    $rt = $_GET['rt'];
    $obj->UpdateAllStatus($id, $a, $p, $t, $mt, $rt, $table);
    $response["success"] = 1;
    $response["message"] = "All Status successfully updated...";
    // Show JSON response
    echo json_encode($response);
}
?>