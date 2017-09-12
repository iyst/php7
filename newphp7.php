<?php
/**
 * php7新特新
 * 标量类型
 */
function returnInt(  ...$number){
    //var_dump($number);exit;
    return array_sum($number);
}

var_dump(returnInt(1,2,3,4));

/**
 * 方法返回值
 * @param array[] ...$arrays
 * @return array
 */
function arraysSum(array ...$arrays): array
{
    return array_map(function(array $array): int {
        return array_sum($array);
    }, $arrays);
}

print_r(arraysSum([1,2,3], [4,5,6], [7,8,9]));

/**
 * 判断null的语法糖
 */
$test = '' ;
$str = $test ?? 'kong';
var_dump( $str);

/**
 * 组合比较符
 */

//echo 0<=>0;
//echo 1<=>2;
//echo 2<=>1;
/**
 * 通过 define() 定义常量数组
 */
const users = ['a','b','c'];
define('user',['d','e','f']);
var_dump(users[0]);
var_dump(user[1]);


/**
 * 匿名类
 */

interface Loger {
    function log();
}

class Application
{
    private $loggers;

    public function addLogger(Loger $loger)
    {
        $this->loggers = $loger;
    }

    public function getLogger(): Loger
    {
        return $this->loggers;
    }

    public function outPut()
    {
        $this->loggers->log();
    }

}
$app = new Application();
$app->addLogger(new class implements Loger{
    public function log()
    {
        // TODO: Implement log() method.
        echo 'class logs';
    }

});
$app->outPut();
//var_dump($app->getLogger());