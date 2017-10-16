<?php

class Dispatcher {
    private $path;

    public function __construct()
    {
        //实例化分发器时得到用户请求的URI
        $this->path = $_SERVER['REQUEST_URI'];
    }

    public function run()
    {
        //分析URI，得到相应的控制器和方法
        $this->path = trim($this->path, '/');
        $paths = explode('/', $this->path);

        //得到控制器类名和方法名
        $control = array_shift($paths);
        $method = array_shift($paths);

        //如果控制器类名和方法名为空，则默认为“index”
        if($control == '') $control = 'index';
        if($method == '') $method= 'index';

        //根据框架的文件结构，得到控制器类的文件路径
        $control_file_name = ROOT_PATH.'/Controller/'.$control.'.php';

        if(file_exists($control_file_name))
        {
            include_once($control_file_name);

            $controller_name = $control.'_Controller';
            if(class_exists($controller_name))
            {
                //实例化控制器
                $control = new $controller_name();
                if(method_exists($controller_name, $method))
                {
                    //如果用户请求的方法存在，则调用之
                    $control->$method();
                    return 'OK_200';
                }
                else return 'ERROR_404';
            }
            else return 'ERROR_404';
        }
        else return 'ERROR_404';
    }
}