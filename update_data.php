<?php
include_once 'connectdb.php';

$update=curl_init();
curl_setopt_array($update, array(
    CURLOPT_URL => "https://opend.data.go.th/opend-search/vir_3277_1584880342/agg?dsname=vir_3277_1584880342&path=vir_3277_1584880342&aggf=count&agg_prop=col_6&groupby=col_6&orderby=desc&loadAll=1&type=json&limit=100&offset=0",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "api-key: A8kBZBndsmmIg6UM3vDOHpcBR1NVOV0e"
    ),
  ));
  

$result_update=curl_exec($update);
$err=curl_error($update);

curl_close($update);

if($err){
    echo 'cURL Error #:' . $err;
}else{
    $result_updateA=json_decode($result_update, true);

    // เอาตัวแปลที่ไม่ใช้ออก
    // unset($result_updateA['data']);
    // unset($result_updateA['message']);
    // unset($result_updateA['status']);

    $numupdate=$result_updateA['data'];
    // print_r($numupdate);
}
// end สงขลา

if(isset($_POST['submit'])){

    foreach($numupdate as $datas=>$data){

        $province = $numupdate[$datas]['Province'];
        $count = $numupdate[$datas]['Province:count'];
     
        $sql = "INSERT INTO datas(province,count) VALUES('".$province."','".$count."')";
        
        mysqli_query($conn,$sql);
     
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>อัพเดท</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--=============== css  ===============-->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<form method="post">
    <div class="row">
        <div class="mx-auto col-md-offset-4 mt-4">
            <input class="btn btn-primary" style="width:90%;" type="submit" name="submit" value="ตกลง">
        </div>
    </div>
</form>
</body>
</html>