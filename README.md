# messaging

## config
## update the ff. config items in application/config/config.php

$config['api_user'] = '<wiserv user>';
	
$config['api_password'] = '<wiserv password>';

--------------------------------------------------------------

# REST API for WiServ SOAP API ☺

url: http://server-url/messaging/sms

1. sending msg
```
method: post

body 
 type: json
 sample:
 
 {
    "MobileNo": "09xxxxxxxxx",
    "Message": "test msg from apps 2."
 }
 
 sample json response:
 {
    "success": true,
    "message": "Message Queued"
}
```
--------------------------------------------------

2. retrieving msg

 method : get
 
 body: none
 
 sample response:
 ```
 {
    "CRGQueries": [
        {
            "WSID": "1151222",
            "Sender": "+xxxxx",
            "Message": "test message using caraga keyword segregation",
            "DateReceived": "2020-03-27 18:47:08"
        },
        {
            "WSID": "1159120",
            "Sender": "+xxxxx",
            "Message": "test message using caraga keyword segregation 03302020 0416p",
            "DateReceived": "2020-03-30 16:18:05"
        }
    ],
    "Status": "3 Recent CRG Messages Found"
}
```
