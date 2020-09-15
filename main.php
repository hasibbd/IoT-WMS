<?php
include("phpclass.php");
$obj = new AjaxCrud();
$table = "wms";
$id = 1;
if (isset($_POST['readrecords'])) {

    $res = $obj->showData($table);

    date_default_timezone_set('Asia/Dhaka');
    $date=date_create();
    $t = date_format($date,"Y/m/d H:i:s");
    $date1 = new DateTime($res[0]['device_timedate']);
    $date2 = $date1->diff(new DateTime($t));
    if ($date2->d == 0 && $date2->h == 0 && $date2->i == 0){
        $t = $date2->s;
    }
    else{
        $t = 100;
    }


    $arr = array(
        'mtank' => $res[0]['mtank'],
        'rtank' => $res[0]['rtank'],
        'aswitch' => $res[0]['aswitch'],
        'pswitch' => $res[0]['pswitch'],
        'tapswitch' => $res[0]['tapswitch'],
        'aswitchstatus' => $res[0]['aswitchstatus'],
        'pswitchstatus' => $res[0]['pswitchstatus'],
        'tapswitchstatus' => $res[0]['tapswitchstatus'],
        'devicestatus' => $res[0]['devicestatus'],
        'time' => $t,
    );
    echo json_encode($arr);

    
}

if (isset($_POST['s1'])) {
    if ($_POST['s1'] == "off") {
        $autoswith = "on";
    } else {
        $autoswith = "off";
    }
    $obj->UpdateDataAuto($id, $autoswith, $table);
}
if (isset($_POST['s2'])) {
    if ($_POST['s2'] == "off") {
        $pumpswitch = "on";
    } else {
        $pumpswitch = "off";
    }
    $obj->UpdateDataPump($id, $pumpswitch, $table);
}
if (isset($_POST['s3'])) {
    if ($_POST['s3'] == "off") {
        $tapswitch = "on";
    } else {
        $tapswitch = "off";
    }
    $obj->UpdateDataTap($id, $tapswitch, $table);
}

?>