<?php                   
$grade = "";
if ($avg >=85)
{
$grade="A1";
}
elseif ($avg >=75)
{
$grade="B2";
}
elseif ($avg >=70)
{
$grade="B3";
}
elseif ($avg >=65)
{
$grade="C4";
}
elseif ($avg >=60)
{
$grade="C5";
}
elseif ($avg >=55)
{
$grade="C6";
}
elseif ($avg >=50)
{
$grade="D7";
} elseif ($avg >=40){
$grade="E8";
} elseif ($avg >=0)
{
$grade="F9";
}
$remark = "";
if ($avg >=85)
{
$remark="EXCELLENT";
}
elseif ($avg >=75)
{
$remark="VERY GOOD";
}
elseif ($avg >=70)
{
$remark="GOOD";
}
elseif ($avg >=65)
{
$remark="CREDIT";
}
elseif ($avg >=60)
{
$remark="CREDIT";
}
elseif ($avg >=55)
{
$remark="CREDIT";
}
elseif ($avg >=50)
{
$remark="PASS";
}
elseif ($avg >=40)
{
$remark="PASS";
}
elseif ($avg >=0)
{
$remark="FAIL";
}
?>