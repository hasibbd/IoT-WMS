<?php

class AjaxCrud
{
    private $host = "localhost";
    private $user = "root";
    private $db = "wms";
    private $pass = "";
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
    }

    public function showData($table)
    {
        $sql = "SELECT * FROM $table";
        $q = $this->conn->query($sql) or die("failed!");
        while ($row = mysqli_fetch_assoc($q)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getById($id, $table)
    {
        $sql = "SELECT * FROM $table WHERE id = $id";
        $q = $this->conn->query($sql);
        $row = mysqli_fetch_assoc($q);
        return $row;
    }

    public function UpdateData($id, $aswitch, $pswitch, $tapswitch, $table)
    {
        $sql = "UPDATE `$table` SET `aswitch`='$aswitch',`pswitch`= '$pswitch', `tapswitch` ='$tapswitch' WHERE `id`='$id '";
        $this->conn->query($sql);

    }
    public function UpdateDataAuto($id, $aswitch, $table)
    {
        $sql = "UPDATE `$table` SET `aswitch`='$aswitch' WHERE `id`='$id '";
        $this->conn->query($sql);

    }
    public function UpdateDataPump($id, $pswitch, $table)
    {
        $sql = "UPDATE `$table` SET `pswitch`= '$pswitch' WHERE `id`='$id '";
        $this->conn->query($sql);

    }
    public function UpdateDataTap($id, $tapswitch, $table)
    {
        $sql = "UPDATE `$table` SET `tapswitch` ='$tapswitch' WHERE `id`='$id '";
        $this->conn->query($sql);

    }
     public function UpdateDataAutoStatus($id, $aswitchstatus, $table)
    {
        $sql = "UPDATE `$table` SET `aswitchstatus`='$aswitchstatus' WHERE `id`='$id '";
        $this->conn->query($sql);

    }
    public function UpdateDataPumpStatus($id, $pswitchstatus, $table)
    {
        $sql = "UPDATE `$table` SET `pswitchstatus`= '$pswitchstatus' WHERE `id`='$id '";
        $this->conn->query($sql);

    }
    public function UpdateDataTapStatus($id, $tapswitchstatus, $table)
    {
        $sql = "UPDATE `$table` SET `tapswitchstatus` ='$tapswitchstatus' WHERE `id`='$id '";
        $this->conn->query($sql);

    }
    public function UpdateDataDevice($id, $device, $table)
    {
        $sql = "UPDATE `$table` SET `device`='$device' WHERE `id`='$id '";
        $this->conn->query($sql);

    }
    public function UpdateDataDeviceStatus($id, $devicestatus, $table)
    {
        $sql = "UPDATE `$table` SET `devicestatus`='$devicestatus' WHERE `id`='$id '";
        $this->conn->query($sql);

    }
    
    public function UpdateWater($id, $r, $t, $table)
    {
        $sql = "UPDATE `$table` SET `rtank`='$r', `mtank`='$t' WHERE `id`='$id '";
        $this->conn->query($sql);

    }
    public function UpdateAllStatus($id, $a, $p, $t, $mt, $rt, $table)
    {
        date_default_timezone_set('Asia/Dhaka');
        $date=date_create();
        $time = date_format($date,"Y/m/d H:i:s");


        $sql = "UPDATE `$table` SET `aswitchstatus`='$a', `pswitchstatus`='$p', `tapswitchstatus`='$t',`rtank`='$rt', `mtank`='$mt', `device_timedate`='$time' WHERE `id`='$id '";
        $this->conn->query($sql);

    }
     public function UpdateTankStatus($id,$mt, $rt, $table)
    {
        $sql = "UPDATE `$table` SET `rtank`='$rt', `mtank`='$mt' WHERE `id`='$id '";
        $this->conn->query($sql);

    }
   
    public function InsertData($mtank, $rtank, $aswitch, $pswitch, $aswitchstatus, $pswitchstatus, $table)
    {
        $sql = "INSERT INTO $table (`mtank`, `rtank`, `aswitch`, `pswitch`, `aswitchstatus`, `pswitchstatus`)";
        $sql .= "VALUES ('$mtank', '$rtank','$aswitch', '$pswitch','$aswitchstatus', '$pswitchstatus')";
        $this->conn->query($sql);
    }

    public function deleteData($id, $table)
    {
        $sql = "DELETE FROM $table WHERE `id` = '$id'";
        $this->conn->query($sql);
    }
}

?>

