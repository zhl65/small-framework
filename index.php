<?php

define('ROOT_PATH', str_replace('\\', '/', dirname(__FILE__)));//定义根目录

/* 加载Controller需要继承的父类 */
require ROOT_PATH.'/Core/Controller.php';

/* 加载Model需要继承的父类 */
require ROOT_PATH.'/Core/Model.php';

/* 加载View需要继承的父类 */
require ROOT_PATH.'/Core/View.php';

/* 加载核心模块 */
require ROOT_PATH.'/config.php';//主要设置
require ROOT_PATH.'/Core/Dispatcher.php';//分发器模块
$dpt = new Dispatcher();//实例化请求分发器
$return_status = $dpt->run();

echo $return_status;

exit(0);
