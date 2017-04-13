<?php 

ob_start();

$API_KEY = 'توکن';
##------------------------------##
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
 function sendmessage($chat_id, $text, $model){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$text,
 'parse_mode'=>$mode
 ]);
 }
 function sendsticker($chat_id, $photo, $captionl){
 bot('sendsticker',[
 'chat_id'=>$chat_id,
 'sticker'=>$photo,
 'caption'=>$caption,
 ]);
 }
 function sendaction($chat_id, $action){
 bot('sendchataction',[
 'chat_id'=>$chat_id,
 'action'=>$action
 ]);
 }
 //====================ᵗᶦᵏᵃᵖᵖ======================//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
$scan = scan('users');
$members = count($scan);
//====================ᵗᶦᵏᵃᵖᵖ======================//
if(preg_match('/^\/([Ss]tart)/',$text)){
mkdir('users/'.$chat_id.');
sendaction($chat_id, typing);
        bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' =>"
به ربات تبدیل متن به استیکر خوش امدید
متن مورد نظر را ارسال کنید
تعداد اعضا : ".$members."
",
            ]);
        }
else{
 $photo = file_get_contents("http://api.monsterbot.ir/pic/?color=Black&text=".$text."&font=IranNastaliq&burl=http://uupload.ir/files/78i0_1237990516.jpg&x=-50&y=0&fsize=80");
 file_put_contents("logo.webp", $photo);
 bot('sendsticker', [
                'chat_id' => $chat_id,
                'sticker' =>new CURLFILE('logo.webp')
            ]);
        }
  ?>

