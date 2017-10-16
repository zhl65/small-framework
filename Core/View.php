<?php

class View
{
    public function show($view_file, $data=array())
    {
        $view_file_name = ROOT_PATH.'/view/'.$view_file.'.php';
        if(!file_exists($view_file_name)) return FALSE;

        //把数组展开，键名做变量名，键值做变量值
        extract($data);

        //引入view文件
        include($view_file_name);
        return TRUE;
    }

}