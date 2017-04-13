<?php
########متغییر##########
$token = file_get_contents('token.php');

define("API_KEY",$token);
$admin = file_get_contents('admin.php');

$content = file_get_contents("php://input");
$u = json_decode($content, true);
$update = json_decode(file_get_contents('php://input'));
//آپدیت ها
$message = $update->message;
//پیام
$es = $message->sticker->emoji;
//نمایش استیکر ایموجی
$FIRSTNAME = $message->chat->first_name;
//نام فرد
$LASTNAME = $message->chat->last_name;
//نام خانوادگی
$USERNAME = $message->chat->username;
//یوزر
$sticker = $update->message->sticker;
//استیکر
$rid = $message->reply_to_message->from->id;
//نمایش ایدی (ریپلای)
$rfname = $message->reply_to_message->from->first_name;
//نمایش اسم (ریپلای)
$runame = $message->reply_to_message->from->username;
//نمایش یوزرنیم (ریپلای)
$rlname = $message->reply_to_message->from->last_name;
//نمایش نام خانوادگی (ریپلای)
$fadmin = $message->from->id;
//ادمین ها
$chat_id = $message->chat->id;
//ایدی عددی
$text1 = $message->text;
//متن
$url_bot='https://telegram.me/Freebot3_Robot';
//لینک ربات
$user_bot='Freebot3_Robot';
//ایدی ربات
$message_id = $message->message_id;
//آیدی پیام
$inname = $update->inline_query->from->first_name;
//نمایش اسم(اینلاین()
$intext = $update->inline_query->query;
//نمایش پیام اینلاین
########curl and function#########
function httpt($method,$datas=[]){
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
function download($file,$urll){
  $url  = $urll;
  $path = $file;
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $data = curl_exec($ch);
  curl_close($ch);
  file_put_contents($path, $data);
}
function ph($method,$datas=[]){
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
function api($method,$datas=[]){
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
function ufile($f){
$content = (int)  file_get_contents($f);
if($content > 1) file_put_contents($f,($content+1));
}
if(isset($update->message->text)){
#########commend############
$matches = explode(" ", $update->message->text);
  if($text1 == '/start'){
    var_dump(httpt('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"
خوش آمدید
",
   ]));
 }elseif($fadmin == $admin){

$jokes = scandir('jokes');

unset($jokes[0]);
unset($jokes[1]);

$endjoke2 = count($jokes);
$endjoke = $endjoke2 + 1;
file_put_contents('jokes/'.$endjoke.'.txt',$text1);
var_dump(httpt('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"
جوک مورد نظر اضافه شد
متن جوک : ".$text1."
",
   ]));
}
}
?>
