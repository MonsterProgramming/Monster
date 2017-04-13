<html>
<pre>
<?php
//Create By Monster
$jokes = scandir('jokes');
//برسیی فایل های توی پوشه jokes
unset($jokes[0]);
unset($jokes[1]);
//حذف فایل های اضافه
$endjoke = count($jokes);
//گرفتن تعداد فایل ها
$rand = rand(1,$endjoke);
//گرفتن تصادفی یکی از جوک ها
$echo = file_get_contents('jokes/'.$rand.'.txt');
//گرفتن متن توی فایل تصادفی
echo "
".$echo."
Create By Monster
";
//نمایش جوک
?>
</pre>
</html>
