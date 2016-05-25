<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-04-16
//采用知识共享“署名 3.0 中国大陆”许可协议授权

// 使用接口（interface），可以指定某个类必须实现哪些方法，但不需要定义这些方法的具体内容。

// 声明一个'iTemplate'接口
interface iTemplate
{
    public function setVariable($name, $var);
    public function getHtml($template);
}

// 实现接口
// 使用 implements 操作符。类中必须实现接口中定义的所有方法，否则会报一个致命错误。
class Template implements iTemplate
{
    private $vars = array();
  
    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }
  
    public function getHtml($template)
    {
        foreach($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }
 
        return $template;
    }
}

// We can then switch between implementations of the interface without impact to our code because the interface defines how we will use it regardless of how it actually works.
// 我们能为接口定义不同的实现类，但不用改变已有的类，这是因为接口只是定义了我们该如何使用方法，不管这些方法内部的实现细节。
?>