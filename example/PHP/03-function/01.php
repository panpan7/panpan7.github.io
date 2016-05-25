<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-03-25
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//自定义函数
function outBmi($bmi) {
        if($bmi >= 28.0) {
            return "\t肥胖";
        } elseif ($bmi>=24.0) {
            return "\t超重";
        } elseif ($bmi >=18.5) {
            return "\t正常";
        } else {
            return "\t偏轻";
        }
}
echo outBmi(24);

//按值传递参数
function bmi($weight, $height){
    $BMI = round($weight / ($height * $height / 10000), 2);    //BMI=体重/身高的平方
    return $BMI;
}
echo bmi(72,162);
echo outBmi(bmi(72,163));

//通过引用传递参数
function add_some_extra(&$string)
{
    $string .= 'and something extra.';
}
$str = 'This is a string, ';
add_some_extra($str);
echo $str;    // outputs 'This is a string, and something extra.'

//函数参数的默认值
function makeCoffee($type = "cappuccino")
{
    return "Making a cup of $type.\n";
}
echo makeCoffee();
echo makeCoffee(null);
echo makeCoffee("espresso");

function p($var) {
    echo $var , "<br />";
}
p(makeCoffee());
p(makeCoffee(null));
?>