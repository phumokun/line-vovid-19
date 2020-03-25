<?php

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
    // print_r(end($response));
}
// end report all

// สงขลา
$SKA=curl_init();

curl_setopt_array($SKA, array(
    CURLOPT_URL => "https://opend.data.go.th/opend-search/vir_3277_1584880342/query?dsname=vir_3277_1584880342&path=vir_3277_1584880342&property=col_6&operator=CONTAINS&valueLiteral=%E0%B8%AA%E0%B8%87%E0%B8%82%E0%B8%A5%E0%B8%B2&loadAll=1&type=json&limit=100&offset=0",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "api-key: hInVZ9D2oFwD1oOAqDXIEHRl69DlDyW5"
    ),
  ));
  

$result_SKA=curl_exec($SKA);
$err=curl_error($SKA);

curl_close($SKA);

if($err) {
    echo 'cURL Error #:' . $err;
}else{
    $result_SKAA=json_decode($result_SKA, true);

    // เอาตัวแปลที่ไม่ใช้ออก
    unset($result_SKAA['data']);
    unset($result_SKAA['message']);
    unset($result_SKAA['status']);

    $numSKA=$result_SKAA['numData'];
    // print_r($result_SKAA);
}
// end สงขลา

// กทม
$BKK=curl_init();

curl_setopt_array($BKK, array(
    CURLOPT_URL => "https://opend.data.go.th/opend-search/vir_3277_1584880342/query?dsname=vir_3277_1584880342&path=vir_3277_1584880342&property=col_6&operator=CONTAINS&valueLiteral=%E0%B8%81%E0%B8%97%E0%B8%A1&loadAll=1&type=json&limit=100&offset=0",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "api-key: hInVZ9D2oFwD1oOAqDXIEHRl69DlDyW5"
    ),
  ));
  

$result_BKK=curl_exec($BKK);
$err=curl_error($BKK);

curl_close($BKK);

if($err){
    echo 'cURL Error #:' . $err;
}else{
    $result_BKKA=json_decode($result_BKK, true);

    // เอาตัวแปลที่ไม่ใช้ออก
    unset($result_BKKA['data']);
    unset($result_BKKA['message']);
    unset($result_BKKA['status']);
    
    $numBKK=$result_BKKA['numData'];
    // print_r($num);
}
// end กทม

// กระบี่
$KBI=curl_init();

curl_setopt_array($KBI, array(
    CURLOPT_URL => "https://opend.data.go.th/opend-search/vir_3277_1584880342/query?dsname=vir_3277_1584880342&path=vir_3277_1584880342&property=col_6&operator=CONTAINS&valueLiteral=%E0%B8%81%E0%B8%A3%E0%B8%B0%E0%B8%9A%E0%B8%B5%E0%B9%88&loadAll=1&type=json&limit=100&offset=0",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "api-key: hInVZ9D2oFwD1oOAqDXIEHRl69DlDyW5"
    ),
  ));
  

$result_KBI=curl_exec($KBI);
$err=curl_error($KBI);

curl_close($KBI);

if($err){
    echo 'cURL Error #:' . $err;
}else{
    $result_KBIA=json_decode($result_KBI, true);

    // เอาตัวแปลที่ไม่ใช้ออก
    unset($result_KBIA['data']);
    unset($result_KBIA['message']);
    unset($result_KBIA['status']);

    $numKBI=$result_KBIA['numData'];
    // print_r($num);
}
// end กระบี่

// กาญจนบุรี
$KRI=curl_init();

curl_setopt_array($KRI, array(
    CURLOPT_URL => "https://opend.data.go.th/opend-search/vir_3277_1584880342/query?dsname=vir_3277_1584880342&path=vir_3277_1584880342&property=col_6&operator=CONTAINS&valueLiteral=%E0%B8%81%E0%B8%B2%E0%B8%8D%E0%B8%88%E0%B8%99%E0%B8%9A%E0%B8%B8%E0%B8%A3%E0%B8%B5&loadAll=1&type=json&limit=100&offset=0",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "api-key: hInVZ9D2oFwD1oOAqDXIEHRl69DlDyW5"
    ),
  ));
  

$result_KRI=curl_exec($KRI);
$err=curl_error($KRI);

curl_close($KRI);

if($err){
    echo 'cURL Error #:' . $err;
}else{
    $result_KRIA=json_decode($result_KRI, true);

    // เอาตัวแปลที่ไม่ใช้ออก
    unset($result_KRIA['data']);
    unset($result_KRIA['message']);
    unset($result_KRIA['status']);

    $numKRI=$result_KRIA['numData'];
    // print_r($numKRI);
}
// end กาญจนบุรี


$API_URL='https://api.line.me/v2/bot/message';
$ACCESS_TOKEN='WOfdLO0zrknLHtaUEsiMtIYyWqkwgH/fduaiPoZ/xEhgrc+7cb8pTE8VvWjHaKI245/dfCTPfnUF0wPB1pjZickBFBZP9V4t7Z5Ip8boou2yFuBgjChqJv6Lq4eD0eG3ptBUbBWOmuov4lKmd54VfAdB04t89/1O/w1cDnyilFU='; 
$channelSecret='cd1fca4e7a488c02d9b704f76a845fd0';


$POST_HEADER=array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request=file_get_contents('php://input');   // Get request content
$request_array=json_decode($request, true);   // Decode JSON to Array

// report all
$report = [
            'type' => 'flex',
            'altText' => 'รายงานสถานการณ์ COVID-19 ตอนนี้',
            'contents' => [
                'type' => 'bubble',
                'header' => [
                    'type' => 'box',
                    'layout' => 'vertical',
                    'contents' => [
                    [
                        'type' => 'text',
                        'text' => 'รายงานสถานการณ์ COVID-19',
                        'size' => 'md',
                        'weight' => 'bold',
                        'color' => '#ffffff'
                    ],
                    [
                        'type' => 'text',
                        'text' => 'ประเทศไทย',
                        'size' => 'xs',
                        'color' => '#dddddd',
                        'wrap' => true
                    ]
                    ],
                    'backgroundColor' => '#0367D3',
                ],
                'body' => [
                        'type' => 'box',
                        'layout' => 'vertical',
                        'contents' => [
                            [
                                'type' => 'box',
                                'layout' => 'baseline',
                                'margin' => 'lg',
                                'contents' => [
                            [
                                'type' => 'text',
                                'text' => 'ผู้ติดเชื้อ',
                                'weight' => 'bold',
                                'size' => 'sm',
                                'align' => 'start',
                                'color' => '#EFDC05',
                                'flex' => 0
                            ],
                            [
                                'type' => 'text',
                                'text' => $cases,
                                'weight' => 'bold',
                                'size' => 'sm',
                                'align' => 'end',
                                'color' => '#EFDC05'
                            ]
                            ]
                        ],
                        [
                        'type' => 'box',
                        'layout' => 'baseline',
                        'margin' => 'lg',
                        'contents' => [
                            [
                                'type' => 'text',
                                'text' => 'ผู้ป่วยใหม่',
                                'weight' => 'bold',
                                'size' => 'sm',
                                'align' => 'start',
                                'color' => '#555555',
                                'flex' => 0
                            ],
                            [
                                'type' => 'text',
                                'text' => $new_cases,
                                'weight' => 'bold',
                                'size' => 'sm',
                                'align' => 'end',
                                'color' => '#555555'
                            ]
                            ]   
                        ],
                        [
                        'type' => 'box',
                        'layout' => 'baseline',
                        'margin' => 'lg',
                        'contents' => [
                            [
                                'type' => 'text',
                                'text' => 'กำลังรักษา',
                                'size' => 'sm',
                                'color' => '#555555',
                                'flex' => 0
                            ],
                            [
                                'type' => 'text',
                                'text' => $active_cases,
                                'color' => '#566270',
                                'align' => 'end'
                            ]
                            ]
                        ],
                        [
                        'type' => 'box',
                        'layout' => 'baseline',
                        'margin' => 'lg',
                        'contents' => [
                            [
                                'type' => 'text',
                                'text' => 'รักษาหาย',
                                'size' => 'sm',
                                'color' => '#555555',
                                'flex' => 0
                            ],
                            [
                                'type' => 'text',
                                'text' => $total_recovered,
                                'color' => '#566270',
                                'align' => 'end'
                            ]
                            ]
                        ],
                        [
                        'type' => 'box',
                        'layout' => 'baseline',
                        'margin' => 'lg',
                        'contents' => [
                            [
                                'type' => 'text',
                                'text' => 'อาการรุนแรง',
                                'weight' => 'bold',
                                'size' => 'sm',
                                'align' => 'start',
                                'color' => '#555555',
                                'flex' => 0
                            ],
                            [
                                'type' => 'text',
                                'text' => $serious_critical,
                                'weight' => 'bold',
                                'size' => 'sm',
                                'align' => 'end',
                                'color' => '#566270'
                            ]
                            ]
                        ],
                        [
                        'type' => 'box',
                        'layout' => 'baseline',
                        'margin' => 'lg',
                        'contents' => [
                            [
                                'type' => 'text',
                                'text' => 'เสียชีวิต',
                                'size' => 'sm',
                                'align' => 'start',
                                'color' => '#E53A40',
                                'flex' => 0
                            ],
                            [
                                'type' => 'text',
                                'text' => $deaths,
                                'size' => 'sm',
                                'align' => 'end',
                                'color' => '#EC7357'
                            ]
                            ]
                        ],
                        [
                            'type' => 'separator',
                            'margin' => 'xxl'
                        ],
                        [
                        'type' => 'box',
                        'layout' => 'horizontal',
                        'margin' => 'md',
                        'contents' => [
                            [
                                'type' => 'text',
                                'text' => 'ข้อมูล Real Time จาก rapidapi.com',
                                'size' => 'xs',
                                'color' => '#aaaaaa',
                                'flex' => 0
                            ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
// report all


// สงขลา
$reportSKA = [
            'type' => 'flex',
            'altText' => 'รายงานสถานการณ์ COVID-19 ตอนนี้',
            'contents' => [
                'type' => 'bubble',
                'header' => [
                    'type' => 'box',
                    'layout' => 'vertical',
                    'contents' => [
                    [
                        'type' => 'text',
                        'text' => 'รายงานสถานการณ์ COVID-19',
                        'size' => 'md',
                        'weight' => 'bold',
                        'color' => '#ffffff'
                    ],
                    [    
                        'type' => 'text',
                        'text' => 'จังหวัดสงขลา',
                        'size' => 'xs',
                        'color' => '#dddddd',
                        'wrap' => true
                    ]
                    ],
                    'backgroundColor' => '#0367D3',
                ],
                'body' => [
                    'type' => 'box',
                    'layout' => 'vertical',
                    'contents' => [
                        [
                            'type' => 'box',
                            'layout' => 'baseline',
                            'margin' => 'lg',
                            'contents' => [
                                [
                                    'type' => 'text',
                                    'text' => 'ผู้ติดเชื้อ',
                                    'weight' => 'bold',
                                    'size' => 'sm',
                                    'align' => 'start',
                                    'color' => '#555555',
                                    'flex' => 0
                                ],
                                [
                                    'type' => 'text',
                                    'text' => $numSKA,
                                    'weight' => 'bold',
                                    'size' => 'sm',
                                    'align' => 'end',
                                    'color' => '#555555'
                                ]
                            ]
                        ],
                        [
                            'type' => 'separator',
                            'margin' => 'xxl'
                        ],
                        [
                        'type' => 'box',
                        'layout' => 'horizontal',
                        'margin' => 'md',
                        'contents' => [
                            [
                                'type' => 'text',
                                'text' => 'ข้อมูล Real Time จาก opend.data.go.th',
                                'size' => 'xs',
                                'color' => '#aaaaaa',
                                'flex' => 0
                            ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
// end สงขลา

// กทม
$reportBKK = [
            'type' => 'flex',
            'altText' => 'รายงานสถานการณ์ COVID-19 ตอนนี้',
            'contents' => [
                'type' => 'bubble',
                'header' => [
                    'type' => 'box',
                    'layout' => 'vertical',
                    'contents' => [
                    [
                        'type' => 'text',
                        'text' => 'รายงานสถานการณ์ COVID-19',
                        'size' => 'md',
                        'weight' => 'bold',
                        'color' => '#ffffff'
                    ],
                    [   
                        'type' => 'text',
                        'text' => 'กรุงเทพมหานคร',
                        'size' => 'xs',
                        'color' => '#dddddd',
                        'wrap' => true
                    ]
                    ],
                    'backgroundColor' => '#0367D3',
                ],
                'body' => [
                    'type' => 'box',
                    'layout' => 'vertical',
                    'contents' => [
                        [
                            'type' => 'box',
                            'layout' => 'baseline',
                            'margin' => 'lg',
                            'contents' => [
                                [
                                    'type' => 'text',
                                    'text' => 'ผู้ติดเชื้อ',
                                    'weight' => 'bold',
                                    'size' => 'sm',
                                    'align' => 'start',
                                    'color' => '#555555',
                                    'flex' => 0
                                ],
                                [
                                    'type' => 'text',
                                    'text' => $numBKK,
                                    'weight' => 'bold',
                                    'size' => 'sm',
                                    'align' => 'end',
                                    'color' => '#555555'
                                ]
                            ]
                        ],
                        [
                            'type' => 'separator',
                            'margin' => 'xxl'
                        ],
                        [
                        'type' => 'box',
                        'layout' => 'horizontal',
                        'margin' => 'md',
                        'contents' => [
                            [
                                'type' => 'text',
                                'text' => 'ข้อมูล Real Time จาก opend.data.go.th',
                                'size' => 'xs',
                                'color' => '#aaaaaa',
                                'flex' => 0
                            ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
// end กทม

// กระบี่
$reportKBI = [
            'type' => 'flex',
            'altText' => 'รายงานสถานการณ์ COVID-19 ตอนนี้',
            'contents' => [
                'type' => 'bubble',
                'header' => [
                    'type' => 'box',
                    'layout' => 'vertical',
                    'contents' => [
                    [
                        'type' => 'text',
                        'text' => 'รายงานสถานการณ์ COVID-19',
                        'size' => 'md',
                        'weight' => 'bold',
                        'color' => '#ffffff'
                    ],
                    [  
                        'type' => 'text',
                        'text' => 'จังหวัดกระบี่',
                        'size' => 'xs',
                        'color' => '#dddddd',
                        'wrap' => true
                    ]
                    ],
                    'backgroundColor' => '#0367D3',
                ],
                'body' => [
                    'type' => 'box',
                    'layout' => 'vertical',
                    'contents' => [
                        [
                            'type' => 'box',
                            'layout' => 'baseline',
                            'margin' => 'lg',
                            'contents' => [
                                [
                                    'type' => 'text',
                                    'text' => 'ผู้ติดเชื้อ',
                                    'weight' => 'bold',
                                    'size' => 'sm',
                                    'align' => 'start',
                                    'color' => '#555555',
                                    'flex' => 0
                                ],
                                [
                                    'type' => 'text',
                                    'text' => $numKBI,
                                    'weight' => 'bold',
                                    'size' => 'sm',
                                    'align' => 'end',
                                    'color' => '#555555'
                                ]
                            ]
                        ],
                        [
                            'type' => 'separator',
                            'margin' => 'xxl'
                        ],
                        [
                        'type' => 'box',
                        'layout' => 'horizontal',
                        'margin' => 'md',
                        'contents' => [
                            [
                                'type' => 'text',
                                'text' => 'ข้อมูล Real Time จาก opend.data.go.th',
                                'size' => 'xs',
                                'color' => '#aaaaaa',
                                'flex' => 0
                            ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
// end กระบี่

// กาญจนบุรี
$reportKRI = [
    'type' => 'flex',
    'altText' => 'รายงานสถานการณ์ COVID-19 ตอนนี้',
    'contents' => [
        'type' => 'bubble',
        'header' => [
            'type' => 'box',
            'layout' => 'vertical',
            'contents' => [
            [
                'type' => 'text',
                'text' => 'รายงานสถานการณ์ COVID-19',
                'size' => 'md',
                'weight' => 'bold',
                'color' => '#ffffff'
            ],
            [  
                'type' => 'text',
                'text' => 'จังหวัดกาญจนบุรี',
                'size' => 'xs',
                'color' => '#dddddd',
                'wrap' => true
            ]
            ],
            'backgroundColor' => '#0367D3',
        ],
        'body' => [
            'type' => 'box',
            'layout' => 'vertical',
            'contents' => [
                [
                    'type' => 'box',
                    'layout' => 'baseline',
                    'margin' => 'lg',
                    'contents' => [
                        [
                            'type' => 'text',
                            'text' => 'ผู้ติดเชื้อ',
                            'weight' => 'bold',
                            'size' => 'sm',
                            'align' => 'start',
                            'color' => '#555555',
                            'flex' => 0
                        ],
                        [
                            'type' => 'text',
                            'text' => $numKRI,
                            'weight' => 'bold',
                            'size' => 'sm',
                            'align' => 'end',
                            'color' => '#555555'
                        ]
                    ]
                ],
                [
                    'type' => 'separator',
                    'margin' => 'xxl'
                ],
                [
                'type' => 'box',
                'layout' => 'horizontal',
                'margin' => 'md',
                'contents' => [
                    [
                        'type' => 'text',
                        'text' => 'ข้อมูล Real Time จาก opend.data.go.th',
                        'size' => 'xs',
                        'color' => '#aaaaaa',
                        'flex' => 0
                    ]
                    ]
                ]
            ]
        ]
    ]
];
// end กาญจนบุรี



if($request_array['events'] > 0){
    foreach($request_array['events'] as $event){
        error_log(json_encode($event));
        $reply_message='';
        $reply_token=$event['replyToken'];
        $text=$event['message']['text'];

        if($text=='รายงานสถานการณ์') {
            $data=[
                'replyToken' => $reply_token,
                'messages' => [$report]
            ];
        }elseif($text=='จังหวัดสงขลา') {
            $data = [
                'replyToken' => $reply_token,
                'messages' => [$reportSKA]
            ];
        }elseif($text=='กรุงเทพมหานคร') {
            $data=[
                'replyToken' => $reply_token,
                'messages' => [$reportBKK]
            ];
        }elseif($text=='จังหวัดกระบี่') {
            $data=[
                'replyToken' => $reply_token,
                'messages' => [$reportKBI]
            ];
        }elseif ($text=='จังหวัดกาญจนบุรี') {
            $data=[
                'replyToken' => $reply_token,
                'messages' => [$reportKRI]
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
                <?php include('option-city.php'); ?>
            </select>
            <input class="btn btn-primary" style="width:90%;" id="ButtonSendMsg" type="submit" name="submit" value="ตกลง">
        </div>
    </div>
</body>
</html>