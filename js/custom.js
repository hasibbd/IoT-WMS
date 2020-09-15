$(document).ready(function () {
    var s1,s2,s3;
    $(document).on('click', '#s1', function () {
        if (s1 == "off") {
            $.ajax({
                url: "main.php",
                type: "POST",
                data: {s1: s1},
                success: function (data) {
                    s1 = "on";
                }
            });

        } else if (s1 == "on") {
            $.ajax({
                url: "main.php",
                type: "POST",
                data: {s1: s1},
                success: function (data) {
                    s1 = "off";
                }
            });
        }

    });
    $(document).on('click', '#s2', function () {
        if (s2 == "off") {
            $.ajax({
                url: "main.php",
                type: "POST",
                data: {s2: s2},
                success: function (data) {
                    s2 = "on";
                }
            });

        } else if (s2 == "on") {
            $.ajax({
                url: "main.php",
                type: "POST",
                data: {s2: s2},
                success: function (data) {
                    s2 = "off";
                }
            });
        }

    });

    $(document).on('click', '#s3', function () {
        if (s3 == "off") {
            $.ajax({
                url: "main.php",
                type: "POST",
                data: {s3: s3},
                success: function (data) {
                    s3 = "on";
                }
            });

        } else if (s3 == "on") {
            $.ajax({
                url: "main.php",
                type: "POST",
                data: {s3: s3},
                success: function (data) {
                    s3 = "off";
                }
            });
        }

    });

    readRecords();


    //Read Function
    function readRecords() {
        var readrecords = "readrecords";
        $.ajax({
            url: "main.php",
            type: "POST",
            data: {
                readrecords: readrecords,

            },
            success: function (data) {
                status1chaek(data["mtank"]);
                status2chaek(data["rtank"]);
                if (data["aswitch"] == "off") {
                    $("#s1").prop("checked", false).prop("disabled", false);
                    $("#s2").prop("disabled", false);
                    $("#s3").prop("disabled", false);
                    s1 = "off";
                    $("#functext1").html('Automatic Switch OFF, ');
                    if (data["pswitch"] == "off") {
                        $("#s2").prop("checked", false);
                        s2 = "off";
                        $("#functext2").html('Pump Switch OFF, ');
                    } else {
                        $("#s2").prop("checked", true);
                        s2 = "on";
                        $("#functext2").html('Pump Switch ON, ');
                    }
                    if (data["tapswitch"] == "off") {
                        $("#s3").prop("checked", false);
                        s3 = "off";
                        $("#functext3").html('Tap OFF ');
                    } else {
                        $("#s3").prop("checked", true);
                        s3 = "on";
                        $("#functext3").html('Tap ON ');
                    }
                } else {
                    $("#s1").prop("checked", true).prop("disabled", false);
                    $("#s2").prop("checked", false).prop("disabled", true);
                    $("#s3").prop("checked", false).prop("disabled", true);
                    s1 = "on";
                    $("#functext1").html('Automatic Switch ON, ');
                    $("#functext2").html('Pump Switch Disabled, ');
                    $("#functext3").html('Tap Switch Disabled ');
                }

                if (data["aswitchstatus"] == "off") {
                    $("#ss1").html('<img src="img/off.png" alt="" width="30px">');
                    $("#fstatus1").html('Automatic Function OFF, ');
                } else if(data["aswitchstatus"] == "on") {
                    $("#ss1").html('<img src="img/on.png" alt="" width="30px">');
                    $("#fstatus1").html('Automatic Function ON, ');
                }
                else{
                   $("#ss1").html('<img src="img/warn.png" alt="" width="30px">'); 
                }
                if (data["pswitchstatus"] == "off") {
                    $("#ss2").html('<img src="img/off.png" alt="" width="30px">');
                    $("#fstatus2").html('Pump OFF, ');
                } else if(data["pswitchstatus"] == "on") {
                    $("#ss2").html('<img src="img/on.png" alt="" width="30px">');
                    $("#fstatus2").html('Pump ON, ');
                }
                else{
                   $("#ss2").html('<img src="img/warn.png" alt="" width="30px">'); 
                }
                if (data["tapswitchstatus"] == "off") {
                    $("#ss3").html('<img src="img/off.png" alt="" width="30px">');
                    $("#fstatus3").html('Tap OFF');
                } else if(data["tapswitchstatus"] == "on") {
                    $("#ss3").html('<img src="img/on.png" alt="" width="30px">');
                    $("#fstatus3").html('Tap ON');
                }
                else{
                    $("#ss3").html('<img src="img/warn.png" alt="" width="30px">');  
                }
                if (data["time"] < 30) {
                    console.log('on');
                    $('#ds').html('<img src="img/on.png" alt="" width="30px">')
                } else {
                    console.log('off');
                    $('#ds').html('<img src="img/off.png" alt="" width="30px">')
                }


            },
            complete: function () {
                setTimeout(readRecords, 2000); //After completion of request, time to redo it after a second
            },
            dataType: "json"
        });
    }

     function status1chaek(x) {
        $( "#stat1" ).removeClass().addClass( "c100 p" + x + " small center");
        $("#stat12").text(x + "%");
    }

    function status2chaek(x) {
        $( "#stat2" ).removeClass().addClass( "c100 p" + x + " small green center");
        $("#stat22").text(x + "%");
    }

});