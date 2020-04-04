<?php
include_once 'connectdb.php';

// reprot all
$curl=curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => "https://coronavirus-monitor.p.rapidapi.com/coronavirus/cases_by_particular_country.php?country=Thailand",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"x-rapidapi-host: coronavirus-monitor.p.rapidapi.com",
		"x-rapidapi-key: 4d4da669b5msh479bb2caa137131p12c0b9jsn8abf5821c5af"
	),
));

$result=curl_exec($curl);
$err=curl_error($curl);

// print_r($result);

curl_close($curl);

if($err){
	echo 'cURL Error #:' . $err;
}else{
    $response=json_decode($result, true);

    // เอาตัวแปลที่ไม่ใช้ออก
    unset($response['country']);

    // print_r($response);

    $responsee=end($response['stat_by_country']);

    // print_r($responsee);

    // เอาตัวแปลที่ไม่ใช้ออก
    unset($responsee['country_name']);
    unset($responsee['new_deaths']);
    unset($responsee['region']);
    unset($responsee['total_cases_per1m']);
    unset($responsee['record_date']);

    $cases=$responsee['total_cases'];
    if($cases!=''){
        $cases=$responsee['total_cases'];
    }else{
        $cases='0';
    }

    $deaths=$responsee['total_deaths'];
    if($deaths!=''){
        $deaths = $responsee['total_deaths'];
    }else{
        $deaths='0';
    }

    $new_cases=$responsee['new_cases'];
    if($new_cases!=''){
        $new_cases = $responsee['new_cases'];
    }else{
        $new_cases='0';
    }

    $serious_critical=$responsee['serious_critical'];
    if($serious_critical!=''){
        $serious_critical=$responsee['serious_critical'];
    }else{
        $serious_critical='0';
    }

    $total_recovered=$responsee['total_recovered'];
    if($total_recovered!=''){
        $total_recovered=$responsee['total_recovered'];
    } else {
        $total_recovered='0';
    }

    $active_cases=$responsee['active_cases'];
    if($active_cases!=''){
        $active_cases=$responsee['active_cases'];
    }else{
        $active_cases='0';
    }
    // $record_date = $responsee['record_date'];
    // echo $cases;
    // print_r($responsee);
    // print_r(end($responsee));
}
// end report all

if(isset($_POST['submit_report'])){

    $sql = "INSERT INTO reports_all(cases,deaths,new_cases,serious_critical,total_recovered,active_cases) 
                VALUES('" . $cases . "','" . $deaths . "','" . $new_cases ."','" . $serious_critical ."','" . $total_recovered ."','" . $active_cases ."')";
    mysqli_query($conn,$sql);
}



// update data province
$update=curl_init();
curl_setopt_array($update, array(
    CURLOPT_URL => "https://opend.data.go.th/opend-search/vir_3277_1584880342/agg?dsname=vir_3277_1584880342&path=vir_3277_1584880342&aggf=count&agg_prop=col_5&groupby=col_5&orderby=desc&loadAll=1&type=json&limit=100&offset=0",
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

    $dataprovince=$result_updateA['data'];
    // print_r($dataprovince);
}
// end สงขลา

if(isset($_POST['submit'])){
    foreach($dataprovince as $datas=>$data){

        $province = $dataprovince[$datas]['Province'];
        $count = $dataprovince[$datas]['Province:count'];
     
        $sql = "INSERT INTO datas(province,count) VALUES('".$province."','".$count."')";
        mysqli_query($conn,$sql);
    }
}
// end update data province
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
            <label>อัพเดทสถานการณ์</label>
            <input class="btn btn-primary" style="width:90%;" type="submit" name="submit" value="Province">
            <input class="btn btn-primary" style="width:90%;" type="submit" name="submit_report" value="Report">
        </div>
    </div>
</form>
</body>
</html>