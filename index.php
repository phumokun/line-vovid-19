<?php

include_once 'connectdb.php';

$API_URL='https://api.line.me/v2/bot/message';
$ACCESS_TOKEN='WOfdLO0zrknLHtaUEsiMtIYyWqkwgH/fduaiPoZ/xEhgrc+7cb8pTE8VvWjHaKI245/dfCTPfnUF0wPB1pjZickBFBZP9V4t7Z5Ip8boou2yFuBgjChqJv6Lq4eD0eG3ptBUbBWOmuov4lKmd54VfAdB04t89/1O/w1cDnyilFU='; 
$channelSecret='cd1fca4e7a488c02d9b704f76a845fd0';

$POST_HEADER=array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request=file_get_contents('php://input');   // Get request content
$request_array=json_decode($request, true);   // Decode JSON to Array

// report all
$query="SELECT * FROM reports_all ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$cases=$row['cases'];
$deaths=$row['deaths'];
$new_cases=$row['new_cases'];
$serious_critical=$row['serious_critical'];
$total_recovered=$row['total_recovered'];
$active_cases=$row['active_cases'];
$report=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'ประเทศไทย','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#EFDC05','flex'=>0],['type'=>'text','text'=>$cases,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#EFDC05']]],['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ป่วยใหม่','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$new_cases,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]   ],['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'กำลังรักษา','size'=>'sm','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$active_cases,'color'=>'#566270','align'=>'end']]],['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'รักษาหาย','size'=>'sm','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$total_recovered,'color'=>'#566270','align'=>'end']]],['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'อาการรุนแรง','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$serious_critical,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#566270']]],['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'เสียชีวิต','size'=>'sm','align'=>'start','color'=>'#E53A40','flex'=>0],['type'=>'text','text'=>$deaths,'size'=>'sm','align'=>'end','color'=>'#EC7357']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก rapidapi.com','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// report all

// สงขลา
$query="SELECT * FROM datas WHERE province LIKE '%สงขลา%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numSKA=$row['count'];
// print_r($row['province']);
$reportSKA=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดสงขลา','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numSKA,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end สงขลา

// กทม
$query="SELECT * FROM datas WHERE province LIKE '%กทม%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numBKK=$row['count'];
// print_r($numBKK);
$reportBKK=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'กรุงเทพมหานคร','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numBKK,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end กทม

// กระบี่
$query="SELECT * FROM datas WHERE province LIKE '%กระบี่%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numKBI=$row['count'];
// print_r($row['province']);
$reportKBI=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดกระบี่','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numKBI,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end กระบี่

// กาญจนบุรี
$query="SELECT * FROM datas WHERE province LIKE '%กาญจนบุรี%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numKRI=$row['count'];
// print_r($row['province']);
$reportKRI=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดกาญจนบุรี','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numKRI,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end กาญจนบุรี

// กาฬสินธุ์
$query="SELECT * FROM datas WHERE province LIKE '%กาฬสินธุ์%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numKSN=$row['count'];
// print_r($row['province']);
$reportKSN=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดกาฬสินธุ์','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numKSN,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end กาฬสินธุ์

// ขอนแก่น
$query="SELECT * FROM datas WHERE province LIKE '%ขอนแก่น%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numKKN=$row['count'];
// print_r($row['province']);
$reportKKN=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดขอนแก่น','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numKKN,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end ขอนแก่น

// จันทบุรี
$query="SELECT * FROM datas WHERE province LIKE '%จันทบุรี%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numCTI=$row['count'];
// print_r($row['province']);
$reportCTI=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดจันทบุรี','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numCTI,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end จันทบุรี

// ฉะเชิงเทรา
$query="SELECT * FROM datas WHERE province LIKE '%ฉะเชิงเทรา%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numCCO=$row['count'];
// print_r($row['province']);
$reportCCO=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดฉะเชิงเทรา','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numCCO,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end ฉะเชิงเทรา

// ชลบุรี
$query="SELECT * FROM datas WHERE province LIKE '%ชลบุรี%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numCBI=$row['count'];
// print_r($row['province']);
$reportCBI=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดชลบุรี','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numCBI,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end ชลบุรี

// ชัยภูมิ
$query="SELECT * FROM datas WHERE province LIKE '%ชัยภูมิ%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numCPM=$row['count'];
// print_r($row['province']);
$reportCPM=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดชัยภูมิ','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numCPM,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end ชัยภูมิ

// ตรัง
$query="SELECT * FROM datas WHERE province LIKE '%ตรัง%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numTRG=$row['count'];
// print_r($row['province']);
$reportTRG=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดตรัง','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numTRG,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end ตรัง

// ตาก
$query="SELECT * FROM datas WHERE province LIKE '%ตาก%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numTAK=$row['count'];
// print_r($row['province']);
$reportTAK=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดตาก','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numTAK,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end ตาก

// นครนายก
$query="SELECT * FROM datas WHERE province LIKE '%นครนายก%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numNYK=$row['count'];
// print_r($row['province']);
$reportNYK=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดนครนายก','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numNYK,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end นครนายก

// นครปฐม
$query="SELECT * FROM datas WHERE province LIKE '%นครปฐม%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numNPT=$row['count'];
// print_r($row['province']);
$reportNPT=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดนครปฐม','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numNPT,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end นครปฐม

// นครราชสีมา
$query="SELECT * FROM datas WHERE province LIKE '%นครราชสีมา%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numNMA=$row['count'];
// print_r($row['province']);
$reportNMA=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดนครราชสีมา','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numNMA,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end นครราชสีมา


// นครศรีธรรมราช
$query="SELECT * FROM datas WHERE province LIKE '%นครศรีธรรมราช%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numNST=$row['count'];
// print_r($row['province']);
$reportNST=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดนครศรีธรรมราช','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numNST,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end นครศรีธรรมราช

// นครสวรรค์
$query="SELECT * FROM datas WHERE province LIKE '%นครสวรรค์%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numNSN=$row['count'];
// print_r($row['province']);
$reportNSN=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดนครสวรรค์','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numNSN,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end นครสวรรค์

// นนทบุรี
$query="SELECT * FROM datas WHERE province LIKE '%นนทบุรี%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numNBI=$row['count'];
// print_r($row['province']);
$reportNBI=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดนนทบุรี','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numNBI,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end นนทบุรี

// นราธิวาส
$query="SELECT * FROM datas WHERE province LIKE '%นราธิวาส%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numNWT=$row['count'];
// print_r($row['province']);
$reportNWT=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดนราธิวาส','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numNWT,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end นราธิวาส

// บุรีรัมย์
$query="SELECT * FROM datas WHERE province LIKE '%บุรีรัมย์%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numBRM=$row['count'];
// print_r($row['province']);
$reportBRM=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดบุรีรัมย์','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numBRM,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end บุรีรัมย์

// ปทุมธานี
$query="SELECT * FROM datas WHERE province LIKE '%ปทุมธานี%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numPTE=$row['count'];
// print_r($row['province']);
$reportPTE=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดปทุมธานี','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numPTE,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end ปทุมธานี

// ประจวบคีรีขันธ์
$query="SELECT * FROM datas WHERE province LIKE '%ประจวบคีรีขันธ์%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numPKN=$row['count'];
// print_r($row['province']);
$reportPKN=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดประจวบคีรีขันธ์','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numPKN,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end ประจวบคีรีขันธ์

// ปราจีนบุรี
$query="SELECT * FROM datas WHERE province LIKE '%ปราจีนบุรี%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numPRI=$row['count'];
// print_r($row['province']);
$reportPRI=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดปราจีนบุรี','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numPRI,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end ปราจีนบุรี

// ปัตตานี
$query="SELECT * FROM datas WHERE province LIKE '%ปัตตานี%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numPTN=$row['count'];
// print_r($row['province']);
$reportPTN=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดปัตตานี','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numPTN,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end ปัตตานี

// พะเยา
$query="SELECT * FROM datas WHERE province LIKE '%พะเยา%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numPYO=$row['count'];
// print_r($row['province']);
$reportPYO=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดพะเยา','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numPYO,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end พะเยา

// พัทลุง
$query="SELECT * FROM datas WHERE province LIKE '%พัทลุง%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numPLG=$row['count'];
// print_r($row['province']);
$reportPLG=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดพัทลุง','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numPLG,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end พัทลุง

// พิษณุโลก
$query="SELECT * FROM datas WHERE province LIKE '%พิษณุโลก%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numPLK=$row['count'];
// print_r($row['province']);
$reportPLK=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดพิษณุโลก','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numPLK,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end พิษณุโลก

// ภูเก็ต
$query="SELECT * FROM datas WHERE province LIKE '%ภูเก็ต%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numPKT=$row['count'];
// print_r($row['province']);
$reportPKT=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดภูเก็ต','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numPKT,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end ภูเก็ต

// มุกดาหาร
$query="SELECT * FROM datas WHERE province LIKE '%มุกดาหาร%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numMDH=$row['count'];
// print_r($row['province']);
$reportMDH=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดมุกดาหาร','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numMDH,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end มุกดาหาร

// ยะลา
$query="SELECT * FROM datas WHERE province LIKE '%ยะลา%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numYLA=$row['count'];
// print_r($row['province']);
$reportYLA=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดยะลา','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numYLA,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end ยะลา

// ยโสธร
$query="SELECT * FROM datas WHERE province LIKE '%ยโสธร%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numYST=$row['count'];
// print_r($row['province']);
$reportYST=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดยโสธร','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numYST,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end ยโสธร

// ระยอง
$query="SELECT * FROM datas WHERE province LIKE '%ระยอง%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numRYG=$row['count'];
// print_r($row['province']);
$reportRYG=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดระยอง','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numRYG,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end ระยอง

// ราชบุรี
$query="SELECT * FROM datas WHERE province LIKE '%ราชบุรี%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numRBR=$row['count'];
// print_r($row['province']);
$reportRBR=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดราชบุรี','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numRBR,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end ราชบุรี

// ร้อยเอ็ด
$query="SELECT * FROM datas WHERE province LIKE '%ร้อยเอ็ด%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numRET=$row['count'];
// print_r($row['province']);
$reportRET=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดร้อยเอ็ด','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numRET,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end ร้อยเอ็ด

// ลพบุรี
$query="SELECT * FROM datas WHERE province LIKE '%ลพบุรี%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numLRI=$row['count'];
// print_r($row['province']);
$reportLRI=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดลพบุรี','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numLRI,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end ลพบุรี

// ศรีสะเกษ
$query="SELECT * FROM datas WHERE province LIKE '%ศรีสะเกษ%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numSSK=$row['count'];
// print_r($row['province']);
$reportSSK=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดศรีสะเกษ','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numSSK,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end ศรีสะเกษ

// สมุทรปราการ
$query="SELECT * FROM datas WHERE province LIKE '%สมุทรปราการ%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numSPK=$row['count'];
// print_r($row['province']);
$reportSPK=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดสมุทรปราการ','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numSPK,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end สมุทรปราการ

// สมุทรสาคร
$query="SELECT * FROM datas WHERE province LIKE '%สมุทรสาคร%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numSKN=$row['count'];
// print_r($row['province']);
$reportSKN=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดสมุทรสาคร','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numSKN,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end สมุทรสาคร

// สระบุรี
$query="SELECT * FROM datas WHERE province LIKE '%สระบุรี%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numSRI=$row['count'];
// print_r($row['province']);
$reportSRI=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดสระบุรี','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numSRI,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end สระบุรี

// สระแก้ว
$query="SELECT * FROM datas WHERE province LIKE '%สระแก้ว%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numSKW=$row['count'];
// print_r($row['province']);
$reportSKW=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดสระแก้ว','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numSKW,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end สระแก้ว

// สุพรรณบุรี
$query="SELECT * FROM datas WHERE province LIKE '%สุพรรณบุรี%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numSPB=$row['count'];
// print_r($row['province']);
$reportSPB=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดสุพรรณบุรี','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numSPB,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end สุพรรณบุรี

// สุราษฎร์ธานี
$query="SELECT * FROM datas WHERE province LIKE '%สุราษฎร์ธานี%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numSNI=$row['count'];
// print_r($row['province']);
$reportSNI=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดสุราษฎร์ธานี','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numSNI,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end สุราษฎร์ธานี

// สุรินทร์
$query="SELECT * FROM datas WHERE province LIKE '%สุรินทร์%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numSRN=$row['count'];
// print_r($row['province']);
$reportSRN=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดสุรินทร์','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numSRN,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end สุรินทร์

// สุโขทัย
$query="SELECT * FROM datas WHERE province LIKE '%สุโขทัย%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numSTI=$row['count'];
// print_r($row['province']);
$reportSTI=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดสุโขทัย','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numSTI,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end สุโขทัย

// หนองคาย
$query="SELECT * FROM datas WHERE province LIKE '%หนองคาย%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numNKI=$row['count'];
// print_r($row['province']);
$reportNKI=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดหนองคาย','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numNKI,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end หนองคาย

// หนองบัวลำภู
$query="SELECT * FROM datas WHERE province LIKE '%หนองบัวลำภู%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numNBP=$row['count'];
// print_r($row['province']);
$reportNBP=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดหนองบัวลำภู','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numNBP,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end หนองบัวลำภู

// อำนาจเจริญ
$query="SELECT * FROM datas WHERE province LIKE '%อำนาจเจริญ%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numACR=$row['count'];
// print_r($row['province']);
$reportACR=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดอำนาจเจริญ','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numACR,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end อำนาจเจริญ

// อุดรธานี
$query="SELECT * FROM datas WHERE province LIKE '%อุดรธานี%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numUDN=$row['count'];
// print_r($row['province']);
$reportUDN=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดอุดรธานี','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numUDN,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end อุดรธานี

// อุทัยธานี
$query="SELECT * FROM datas WHERE province LIKE '%อุทัยธานี%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numUTI=$row['count'];
// print_r($row['province']);
$reportUTI=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดอุทัยธานี','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numUTI,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end อุทัยธานี

// อุบลราชธานี
$query="SELECT * FROM datas WHERE province LIKE '%อุบลราชธานี%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numUBN=$row['count'];
// print_r($row['province']);
$reportUBN=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดอุบลราชธานี','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numUBN,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end อุบลราชธานี

// เชียงราย
$query="SELECT * FROM datas WHERE province LIKE '%เชียงราย%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numCRI=$row['count'];
// print_r($row['province']);
$reportCRI=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดเชียงราย','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numCRI,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end เชียงราย

// เชียงใหม่
$query="SELECT * FROM datas WHERE province LIKE '%เชียงใหม่%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numCMI=$row['count'];
// print_r($row['province']);
$reportCMI=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดเชียงใหม่','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numCMI,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end เชียงใหม่

// เพชรบุรี
$query="SELECT * FROM datas WHERE province LIKE '%เพชรบุรี%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numPBI=$row['count'];
// print_r($row['province']);
$reportPBI=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดเพชรบุรี','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numPBI,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end เพชรบุรี

// เพชรบูรณ์
$query="SELECT * FROM datas WHERE province LIKE '%เพชรบูรณ์%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numPNB=$row['count'];
// print_r($row['province']);
$reportPNB=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดเพชรบูรณ์','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numPNB,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end เพชรบูรณ์

// เลย
$query="SELECT * FROM datas WHERE province LIKE '%เลย%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numLEI=$row['count'];
// print_r($row['province']);
$reportLEI=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดเลย','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numLEI,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end เลย

// แพร่
$query="SELECT * FROM datas WHERE province LIKE '%แพร่%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numPRE=$row['count'];
// print_r($row['province']);
$reportPRE=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดแพร่','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numPRE,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end แพร่

// แม่ฮ่องสอน
$query="SELECT * FROM datas WHERE province LIKE '%แม่ฮ่องสอน%' ORDER BY id DESC LIMIT 0,1";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$numMSN=$row['count'];
// print_r($row['province']);
$reportMSN=['type'=>'flex','altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้','contents'=>['type'=>'bubble','header'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'text','text'=>'รายงานสถานการณ์ COVID-19','size'=>'md','weight'=>'bold','color'=>'#ffffff'],['type'=>'text','text'=>'จังหวัดแม่ฮ่องสอน','size'=>'xs','color'=>'#dddddd','wrap'=>true]],'backgroundColor'=>'#0367D3',],'body'=>['type'=>'box','layout'=>'vertical','contents'=>[['type'=>'box','layout'=>'baseline','margin'=>'lg','contents'=>[['type'=>'text','text'=>'ผู้ติดเชื้อ','weight'=>'bold','size'=>'sm','align'=>'start','color'=>'#555555','flex'=>0],['type'=>'text','text'=>$numMSN,'weight'=>'bold','size'=>'sm','align'=>'end','color'=>'#555555']]],['type'=>'separator','margin'=>'xxl'],['type'=>'box','layout'=>'horizontal','margin'=>'md','contents'=>[['type'=>'text','text'=>'ข้อมูล Real Time จาก opend.data.go.th','size'=>'xs','color'=>'#aaaaaa','flex'=>0]]]]]]];
// end แม่ฮ่องสอน


if($request_array['events']>0){
    foreach($request_array['events'] as $event){
        error_log(json_encode($event));
        $reply_message='';
        $reply_token=$event['replyToken'];
        $text=$event['message']['text'];

        if($text=='รายงานสถานการณ์'){
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$report]
            ];
        }elseif($text=='สงขลา'){
            $data = [
                'replyToken'=>$reply_token,
                'messages'=>[$reportSKA]
            ];
        }elseif($text=='กทม'){
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportBKK]
            ];
        }elseif($text=='กระบี่'){
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportKBI]
            ];
        }elseif($text=='กาญจนบุรี') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportKRI]
            ];
        }elseif($text=='กาฬสินธุ์') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportKSN]
            ];
        }elseif($text=='กำแพงเพชร') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportKPT]
            ];
        }elseif($text=='ขอนแก่น') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportKKN]
            ];
        }elseif($text=='จันทบุรี') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportCTI]
            ];
        }elseif($text=='ฉะเชิงเทรา') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportCCO]
            ];
        }elseif($text=='ชลบุรี') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportCBI]
            ];
        }elseif($text=='ชัยภูมิ') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportCPM]
            ];
        }elseif($text=='ตรัง') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportTRG]
            ];
        }elseif($text=='ตาก') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportTAK]
            ];
        }elseif($text=='นครนายก') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportNYK]
            ];
        }elseif($text=='นครปฐม') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportNPT]
            ];
        }elseif($text=='นครราชสีมา') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportNMA]
            ];
        }elseif($text=='นครศรีธรรมราช') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportNST]
            ];
        }elseif($text=='นครสวรรค์') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportNSN]
            ];
        }elseif($text=='นนทบุรี') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportNBI]
            ];
        }elseif($text=='นราธิวาส') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportNWT]
            ];
        }elseif($text=='บุรีรัมย์') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportBRM]
            ];
        }elseif($text=='ปทุมธานี') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportPTE]
            ];
        }elseif($text=='ประจวบคีรีขันธ์') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportPKN]
            ];
        }elseif($text=='ปราจีนบุรี') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportPRI]
            ];
        }elseif($text=='ปัตตานี') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportPTN]
            ];
        }elseif($text=='พะเยา') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportPYO]
            ];
        }elseif($text=='พัทลุง') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportPLG]
            ];
        }elseif($text=='พิษณุโลก') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportPLK]
            ];
        }elseif($text=='ภูเก็ต') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportPKT]
            ];
        }elseif($text=='มุกดาหาร') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportMDH]
            ];
        }elseif($text=='ยะลา') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportYLA]
            ];
        }elseif($text=='ยโสธร') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportYST]
            ];
        }elseif($text=='ระยอง') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportRYG]
            ];
        }elseif($text=='ราชบุรี') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportRBR]
            ];
        }elseif($text=='ร้อยเอ็ด') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportRET]
            ];
        }elseif($text=='ลพบุรี') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportLRI]
            ];
        }elseif($text=='ศรีสะเกษ') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportSSK]
            ];
        }elseif($text=='สมุทรปราการ') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportSPK]
            ];
        }elseif($text=='สมุทรสาคร') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportSKN]
            ];
        }elseif($text=='สระบุรี') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportSRI]
            ];
        }elseif($text=='สระแก้ว') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportSKW]
            ];
        }elseif($text=='สุพรรณบุรี') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportSPB]
            ];
        }elseif($text=='สุราษฎร์ธานี') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportSNI]
            ];
        }elseif($text=='สุรินทร์') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportSRN]
            ];
        }elseif($text=='สุโขทัย') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportSTI]
            ];
        }elseif($text=='หนองคาย') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportNKI]
            ];
        }elseif($text=='หนองบัวลำภู') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportNBP]
            ];
        }elseif($text=='อำนาจเจริญ') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportACR]
            ];
        }elseif($text=='อุดรธานี') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportUDN]
            ];
        }elseif($text=='อุทัยธานี') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportUTI]
            ];
        }elseif($text=='อุบลราชธานี') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportUBN]
            ];
        }elseif($text=='เชียงราย') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportCRI]
            ];
        }elseif($text=='เชียงใหม่') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportCMI]
            ];
        }elseif($text=='เพชรบุรี') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportPBI]
            ];
        }elseif($text=='เพชรบูรณ์') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportPNB]
            ];
        }elseif($text=='เลย') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportLEI]
            ];
        }elseif($text=='แพร่') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportPRE]
            ];
        }elseif($text=='แม่ฮ่องสอน') {
            $data=[
                'replyToken'=>$reply_token,
                'messages'=>[$reportMSN]
            ];
        }

        print_r($data);

        $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);

        $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);

        echo "Result: ".$send_result."\r\n";
        
    }
}

// echo "OK";


function send_reply_message($url, $post_header, $post_body)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>เลือกจังหวัดที่ท่านอาศัย</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--=============== css  ===============-->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
    <script src="https://static.line-scdn.net/liff/edge/2.1/sdk.js"></script>
    <script>
        //你的liff app ID, 例如 --> 0000000000-spPeRmAn
        var YourLiffAppId = '1653991667-W8e0Ekyd';
 
        function initializeLiff(myLiffId) {
            liff
                .init({
                    liffId: myLiffId
                })
                .then(() => {
                    //取得QueryString
                    let urlParams = new URLSearchParams(window.location.search);
                    //顯示QueryString
                    $('#QueryString').val(urlParams.toString());
                    //顯示UserId
                    liff.getProfile().then(function (e) {
                        $('#field_info').val(e.userId);
                    });
                })
                .catch((err) => {
                    alert(JSON.stringify(err));
                });
        }

        $(document).ready(function () {
            //init LIFF
            initializeLiff(YourLiffAppId);

            //ButtonSendMsg
            $('#ButtonSendMsg').click(function () {
                liff.sendMessages([
                    {
                        type: 'text',
                        text: $('#msg').val()
                    }
                ]).then(() => {
                    liff.closeWindow();
                }) 
            });
        });
    </script>
</head>
<body>
    <div class="row">
        <div class="mx-auto col-md-offset-4 mt-4">
            <select class="form-control" name="province" id="msg">
                <option>กรุณาเลือกจังหวัด</option>
                <?php 
                    $query="SELECT * FROM datas GROUP BY province ORDER BY province ASC";
                    $result=mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) { ?>
                    <option><?php echo $row['province'];?></option>
                    <?php } ?>
            </select>
            <input class="btn btn-primary" style="width:90%;" id="ButtonSendMsg" type="submit" name="submit" value="ตกลง">
        </div>
    </div>
</body>
</html>

<?php

// Original
// $report = [
//             'type'=>'flex',
//             'altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้',
//             'contents'=>[
//                 'type'=>'bubble',
//                 'header'=>[
//                     'type'=>'box',
//                     'layout'=>'vertical',
//                     'contents'=>[
//                     [
//                         'type'=>'text',
//                         'text'=>'รายงานสถานการณ์ COVID-19',
//                         'size'=>'md',
//                         'weight'=>'bold',
//                         'color'=>'#ffffff'
//                     ],
//                     [
//                         'type'=>'text',
//                         'text'=>'ประเทศไทย',
//                         'size'=>'xs',
//                         'color'=>'#dddddd',
//                         'wrap'=>true
//                     ]
//                     ],'backgroundColor'=>'#0367D3',
//                 ],
//                 'body'=>[
//                         'type'=>'box',
//                         'layout'=>'vertical',
//                         'contents'=>[
//                             [
//                                 'type'=>'box',
//                                 'layout'=>'baseline',
//                                 'margin'=>'lg',
//                                 'contents'=>[
//                             [
//                                 'type'=>'text',
//                                 'text'=>'ผู้ติดเชื้อ',
//                                 'weight'=>'bold',
//                                 'size'=>'sm',
//                                 'align'=>'start',
//                                 'color'=>'#EFDC05',
//                                 'flex'=>0
//                             ],
//                             [
//                                 'type'=>'text',
//                                 'text'=>$cases,
//                                 'weight'=>'bold',
//                                 'size'=>'sm',
//                                 'align'=>'end',
//                                 'color'=>'#EFDC05'
//                             ]
//                             ]
//                         ],
//                         [
//                         'type'=>'box',
//                         'layout'=>'baseline',
//                         'margin'=>'lg',
//                         'contents'=>[
//                             [
//                                 'type'=>'text',
//                                 'text'=>'ผู้ป่วยใหม่',
//                                 'weight'=>'bold',
//                                 'size'=>'sm',
//                                 'align'=>'start',
//                                 'color'=>'#555555',
//                                 'flex'=>0
//                             ],
//                             [
//                                 'type'=>'text',
//                                 'text'=>$new_cases,
//                                 'weight'=>'bold',
//                                 'size'=>'sm',
//                                 'align'=>'end',
//                                 'color'=>'#555555'
//                             ]
//                             ]   
//                         ],
//                         [
//                         'type'=>'box',
//                         'layout'=>'baseline',
//                         'margin'=>'lg',
//                         'contents'=>[
//                             [
//                                 'type'=>'text',
//                                 'text'=>'กำลังรักษา',
//                                 'size'=>'sm',
//                                 'color'=>'#555555',
//                                 'flex'=>0
//                             ],
//                             [
//                                 'type'=>'text',
//                                 'text'=>$active_cases,
//                                 'color'=>'#566270',
//                                 'align'=>'end'
//                             ]
//                             ]
//                         ],
//                         [
//                         'type'=>'box',
//                         'layout'=>'baseline',
//                         'margin'=>'lg',
//                         'contents'=>[
//                             [
//                                 'type'=>'text',
//                                 'text'=>'รักษาหาย',
//                                 'size'=>'sm',
//                                 'color'=>'#555555',
//                                 'flex'=>0
//                             ],
//                             [
//                                 'type'=>'text',
//                                 'text'=>$total_recovered,
//                                 'color'=>'#566270',
//                                 'align'=>'end'
//                             ]
//                             ]
//                         ],
//                         [
//                         'type'=>'box',
//                         'layout'=>'baseline',
//                         'margin'=>'lg',
//                         'contents'=>[
//                             [
//                                 'type'=>'text',
//                                 'text'=>'อาการรุนแรง',
//                                 'weight'=>'bold',
//                                 'size'=>'sm',
//                                 'align'=>'start',
//                                 'color'=>'#555555',
//                                 'flex'=>0
//                             ],
//                             [
//                                 'type'=>'text',
//                                 'text'=>$serious_critical,
//                                 'weight'=>'bold',
//                                 'size'=>'sm',
//                                 'align'=>'end',
//                                 'color'=>'#566270'
//                             ]
//                             ]
//                         ],
//                         [
//                         'type'=>'box',
//                         'layout'=>'baseline',
//                         'margin'=>'lg',
//                         'contents'=>[
//                             [
//                                 'type'=>'text',
//                                 'text'=>'เสียชีวิต',
//                                 'size'=>'sm',
//                                 'align'=>'start',
//                                 'color'=>'#E53A40',
//                                 'flex'=>0
//                             ],
//                             [
//                                 'type'=>'text',
//                                 'text'=>$deaths,
//                                 'size'=>'sm',
//                                 'align'=>'end',
//                                 'color'=>'#EC7357'
//                             ]
//                             ]
//                         ],
//                         [
//                             'type'=>'separator',
//                             'margin'=>'xxl'
//                         ],
//                         [
//                         'type'=>'box',
//                         'layout'=>'horizontal',
//                         'margin'=>'md',
//                         'contents'=>[
//                             [
//                                 'type'=>'text',
//                                 'text'=>'ข้อมูล Real Time จาก rapidapi.com',
//                                 'size'=>'xs',
//                                 'color'=>'#aaaaaa',
//                                 'flex'=>0
//                             ]
//                             ]
//                         ]
//                     ]
//                 ]
//             ]
//         ];
// End Original

// Original
// $reportSKA = [
//             'type'=>'flex',
//             'altText'=>'รายงานสถานการณ์ COVID-19 ตอนนี้',
//             'contents'=>[
//                 'type'=>'bubble',
//                 'header'=>[
//                     'type'=>'box',
//                     'layout'=>'vertical',
//                     'contents'=>[
//                     [
//                         'type'=>'text',
//                         'text'=>'รายงานสถานการณ์ COVID-19',
//                         'size'=>'md',
//                         'weight'=>'bold',
//                         'color'=>'#ffffff'
//                     ],
//                     [    
//                         'type'=>'text',
//                         'text'=>'จังหวัดสงขลา',
//                         'size'=>'xs',
//                         'color'=>'#dddddd',
//                         'wrap'=>true
//                     ]
//                     ],
//                     'backgroundColor'=>'#0367D3',
//                 ],
//                 'body'=>[
//                     'type'=>'box',
//                     'layout'=>'vertical',
//                     'contents'=>[
//                         [
//                             'type'=>'box',
//                             'layout'=>'baseline',
//                             'margin'=>'lg',
//                             'contents'=>[
//                                 [
//                                     'type'=>'text',
//                                     'text'=>'ผู้ติดเชื้อ',
//                                     'weight'=>'bold',
//                                     'size'=>'sm',
//                                     'align'=>'start',
//                                     'color'=>'#555555',
//                                     'flex'=>0
//                                 ],
//                                 [
//                                     'type'=>'text',
//                                     'text'=>$numSKA,
//                                     'weight'=>'bold',
//                                     'size'=>'sm',
//                                     'align'=>'end',
//                                     'color'=>'#555555'
//                                 ]
//                             ]
//                         ],
//                         [
//                             'type'=>'separator',
//                             'margin'=>'xxl'
//                         ],
//                         [
//                         'type'=>'box',
//                         'layout'=>'horizontal',
//                         'margin'=>'md',
//                         'contents'=>[
//                             [
//                                 'type'=>'text',
//                                 'text'=>'ข้อมูล Real Time จาก opend.data.go.th',
//                                 'size'=>'xs',
//                                 'color'=>'#aaaaaa',
//                                 'flex'=>0
//                             ]
//                             ]
//                         ]
//                     ]
//                 ]
//             ]
//         ];
// End orginal

?>