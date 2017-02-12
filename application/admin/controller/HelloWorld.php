<?php
namespace app\admin\controller;
use think\Controller;
use think\Requst;
use think\Db;

class HelloWorld extends Controller
{
    public function index()
    {
        echo "这是HelloWorld控制器";
    }
}

