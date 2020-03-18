<?php
http_response_code(200);

$API_URL = 'https://api.line.me/v2/bot/message';
$ACCESS_TOKEN = 'WOfdLO0zrknLHtaUEsiMtIYyWqkwgH/fduaiPoZ/xEhgrc+7cb8pTE8VvWjHaKI245/dfCTPfnUF0wPB1pjZickBFBZP9V4t7Z5Ip8boou2yFuBgjChqJv6Lq4eD0eG3ptBUbBWOmuov4lKmd54VfAdB04t89/1O/w1cDnyilFU='; 
$channelSecret = 'cd1fca4e7a488c02d9b704f76a845fd0';


$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array

$jsonFlex = {
    "type": "bubble",
    "body": {
      "type": "box",
      "layout": "vertical",
      "contents": [
        {
          "type": "text",
          "text": "รายงานสถานการณ์ COVID-19",
          "weight": "bold",
          "color": "#1DB446",
          "size": "sm"
        },
        {
          "type": "text",
          "text": "ประเทศไทย",
          "size": "xs",
          "color": "#aaaaaa",
          "wrap": true
        },
        {
          "type": "separator",
          "margin": "xxl"
        },
        {
          "type": "box",
          "layout": "vertical",
          "margin": "xxl",
          "spacing": "sm",
          "contents": [
            {
              "type": "box",
              "layout": "horizontal",
              "contents": [
                {
                  "type": "text",
                  "text": "ผู้ติดเชื้อ",
                  "size": "sm",
                  "color": "#555555",
                  "flex": 0
                },
                {
                  "type": "text",
                  "text": "$2.99",
                  "size": "sm",
                  "color": "#111111",
                  "align": "end"
                }
              ]
            },
            {
              "type": "box",
              "layout": "horizontal",
              "contents": [
                {
                  "type": "text",
                  "text": "เสียชีวิต",
                  "size": "sm",
                  "color": "#555555",
                  "flex": 0
                },
                {
                  "type": "text",
                  "text": "5",
                  "size": "sm",
                  "color": "#111111",
                  "align": "end"
                }
              ]
            },
            {
              "type": "box",
              "layout": "horizontal",
              "contents": [
                {
                  "type": "text",
                  "text": "รักษาหาย",
                  "size": "sm",
                  "color": "#555555",
                  "flex": 0
                },
                {
                  "type": "text",
                  "text": "$3.33",
                  "size": "sm",
                  "color": "#111111",
                  "align": "end"
                }
              ]
            }
          ]
        },
        {
          "type": "separator",
          "margin": "xxl"
        },
        {
          "type": "box",
          "layout": "horizontal",
          "margin": "md",
          "contents": [
            {
              "type": "text",
              "text": "ข้อมูล Real Time จาก rapidapi.com",
              "size": "xs",
              "color": "#aaaaaa",
              "flex": 0
            }
          ]
        }
      ]
    },
    "styles": {
      "footer": {
        "separator": true
      }
    }
  }



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