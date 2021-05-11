<?php 
//First Term Total
$result1 ="SELECT note1,project1,test1,note2,project2,test2,exam FROM term1 WHERE student_id=$userid";
$query_result1 = mysqli_query($con,$result1);
while ($query1 = mysqli_fetch_assoc($query_result1)){
$term1_total= +$query1['note1'] + $query1['project1'] + $query1['test1'] + $query1['note2'] + $query1['project2'] + $query1['test2'] + $query1['exam'];}
//Second Term Total
$result1 ="SELECT note1,project1,test1,note2,project2,test2,exam FROM term2 WHERE student_id=$userid";
$query_result1 = mysqli_query($con,$result1);
while ($query1 = mysqli_fetch_assoc($query_result1)){
$term2_total= +$query1['note1'] + $query1['project1'] + $query1['test1'] + $query1['note2'] + $query1['project2'] + $query1['test2'] + $query1['exam'];}
// Second Cal
$note= $query['note1'];
$project = $query['project1'];
$test =$query['test1'];
$sum_total = $note + $project + $test;                  
$note1= $query['note2'];
$project1 = $query['project2'];
$test1 =$query['test2'];
$exam1 =$query['exam'];
$sum_total1 = $note1 + $project1 + $test1 + $exam1;
$total =$sum_total + $sum_total1;
$cumulative =$term1_total + $term2_total + $total;
$avg = $cumulative / 300 * 100 / 1; 
$grade = "";
if ($avg >=75)
{
$grade="A1";
}
elseif ($avg >=70)
{
$grade="B2";
}
elseif ($avg >=65)
{
$grade="B3";
}
elseif ($avg >=60)
{
$grade="C4";
}
elseif ($avg >=55)
{
$grade="C5";
}
elseif ($avg >=50)
{
$grade="C6";
}
elseif ($avg >=45)
{
$grade="D7";
} elseif ($avg >=40){
$grade="E8";
} elseif ($avg >=0)
{
$grade="F9";
}
$remark = "";
if ($avg >=75)
{
$remark="EXCELLENT";
}
elseif ($avg >=70)
{
$remark="VERY GOOD";
}
elseif ($avg >=65)
{
$remark="GOOD";
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
$remark="CREDIT";
}
elseif ($avg >=45)
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