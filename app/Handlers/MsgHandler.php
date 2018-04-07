<?php

namespace App\Handlers;

class MsgHandler
{
    protected $status = 1;
    var $arr;

    function __construct()
    {
        $this->arr = [
            'code' => 1,
            'msg' => 'error',
            'time' => time()
        ];
    }

    function success($salt, $data = '')
    {
        $arr['code'] = 0;
        $arr['msg'] = 'success';
        $arr['time'] = time();
        $arr['salt'] = $salt;
        if (!empty($data)) {
            return array_merge($arr, $data);
        }

        return $arr;
    }

    function error($msg = 'error')
    {
        $arr['code'] = 1;
        $arr['msg'] = $msg;
        $arr['time'] = time();

        return $arr;
    }
}