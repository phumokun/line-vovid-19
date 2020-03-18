<?php

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://coronavirus-monitor.p.rapidapi.com/coronavirus/cases_by_country.php",
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

$result = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
    $response = json_decode($result, true);
    $cases = $response['countries_stat'][39]['cases'];
    $deaths = $response['countries_stat'][39]['deaths'];
    $new_cases = $response['countries_stat'][39]['new_cases'];
    $serious_critical = $response['countries_stat'][39]['serious_critical'];
    $total_recovered = $response['countries_stat'][39]['total_recovered'];
    echo $cases;
    print_r($response['countries_stat'][39]);
    
}


$API_URL = 'https://api.line.me/v2/bot/message';
$ACCESS_TOKEN = 'WOfdLO0zrknLHtaUEsiMtIYyWqkwgH/fduaiPoZ/xEhgrc+7cb8pTE8VvWjHaKI245/dfCTPfnUF0wPB1pjZickBFBZP9V4t7Z5Ip8boou2yFuBgjChqJv6Lq4eD0eG3ptBUbBWOmuov4lKmd54VfAdB04t89/1O/w1cDnyilFU='; 
$channelSecret = 'cd1fca4e7a488c02d9b704f76a845fd0';


$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array

$jsonFlex = [
            "type" => "flex",
            "altText" => "รายงานสถานการณ์ COVID-19 ตอนนี้",
            "contents" => [
                "type" => "bubble",
                "header" => [
                    "type" => "box",
                    "layout" => "vertical",
                    "contents" => [
                    [
                        "type" => "text",
                        "text" => "รายงานสถานการณ์ COVID-19",
                        "size" => "md",
                        "weight" => "bold",
                        "color" => "#ffffff"
                    ],
                    [
                        "type" => "text",
                        "text" => "ประเทศไทย",
                        "size" => "xs",
                        "color" => "#dddddd",
                        "wrap" => true
                    ]
                    ],
                    "backgroundColor" => "#0367D3",
                ],
                "body" => [
                    "type" => "box",
                    "layout" => "vertical",
                    "contents" => [
                        [
                            "type" => "box",
                            "layout" => "baseline",
                            "margin" => "lg",
                            "contents" => [
                        [
                            "type" => "text",
                            "text" => "ผู้ติดเชื้อ",
                            "weight" => "bold",
                            "size" => "sm",
                            "align" => "start",
                            "color" => "#EFDC05",
                            "flex" => 0
                        ],
                        [
                            "type" => "text",
                            "text" => $cases,
                            "weight" => "bold",
                            "size" => "sm",
                            "align" => "end",
                            "color" => "#EFDC05"
                        ]
                        ]
                    ],
                    [
                        "type" => "box",
                        "layout" => "baseline",
                        "margin" => "lg",
                        "contents" => [
                            [
                                "type" => "text",
                                "text" => "ผู้ป่วยใหม่",
                                "weight" => "bold",
                                "size" => "sm",
                                "align" => "start",
                                "color" => "#555555",
                                "flex" => 0
                            ],
                            [
                                "type" => "text",
                                "text" => $new_cases,
                                "weight" => "bold",
                                "size" => "sm",
                                "align" => "end",
                                "color" => "#555555"
                            ]
                        ]
                    ],
                    [
                        "type" => "box",
                        "layout" => "baseline",
                        "margin" => "lg",
                        "contents" => [
                            [
                                "type" => "text",
                                "text" => "อาการรุนแรง",
                                "weight" => "bold",
                                "size" => "sm",
                                "align" => "start",
                                "color" => "#555555",
                                "flex" => 0
                            ],
                            [
                                "type" => "text",
                                "text" => $serious_critical,
                                "weight" => "bold",
                                "size" => "sm",
                                "align" => "end",
                                "color" => "#566270"
                            ]
                        ]
                    ],
                    [
                        "type" => "box",
                        "layout" => "baseline",
                        "margin" => "lg",
                        "contents" => [
                            [
                                "type" => "text",
                                "text" => "เสียชีวิต",
                                "size" => "sm",
                                "align" => "start",
                                "color" => "#E53A40",
                                "flex" => 0
                            ],
                            [
                                "type" => "text",
                                "text" => $deaths,
                                "size" => "sm",
                                "align" => "end",
                                "color" => "#EC7357"
                            ]
                        ]
                    ],
                    [
                    "type" => "box",
                    "layout" => "baseline",
                    "margin" => "lg",
                    "contents" => [
                        [
                            "type" => "text",
                            "text" => "รักษาหาย",
                            "size" => "sm",
                            "color" => "#555555",
                            "flex" => 0
                        ],
                        [
                            "type" => "text",
                            "text" => $total_recovered,
                            "color" => "#566270",
                            "align" => "end"
                        ]
                    ]
                ],
                [
                    "type" => "separator",
                    "margin" => "xxl"
                ],
                [
                    "type" => "box",
                    "layout" => "horizontal",
                    "margin" => "md",
                    "contents" => [
                        [
                            "type" => "text",
                            "text" => "ข้อมูล Real Time จาก rapidapi.com",
                            "size" => "xs",
                            "color" => "#aaaaaa",
                            "flex" => 0
                        ]
                    ]
                ]
            ]
        ]
    ]
];



if ( sizeof($request_array['events']) > 0 ) {
    foreach ($request_array['events'] as $event) {
        error_log(json_encode($event));
        $reply_message = '';
        $reply_token = $event['replyToken'];
        

        $data = [
            'replyToken' => $reply_token,
            'messages' => [$jsonFlex]
        ];

        print_r($data);

        $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);

        $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);

        echo "Result: ".$send_result."\r\n";
        
    }
}

echo "OK";




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