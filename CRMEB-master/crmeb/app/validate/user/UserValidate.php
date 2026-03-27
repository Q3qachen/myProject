<?php

namespace app\validate\user;

use think\Validate;

class UserValidate extends Validate
{
    protected $rule = [
        'card_id'   => 'require|checkIdCard',
        'real_name' => 'require|checkRealName',
    ];

    protected $message = [
        'card_id.require'   => '身份证号不能为空',
        'real_name.require' => '姓名不能为空',
    ];

    protected function checkIdCard($value)
    {
        if (!preg_match('/^\d{17}(\d|X)$/i', $value)) {
            return '身份证格式错误';
        }

        $wi = [7,9,10,5,8,4,2,1,6,3,7,9,10,5,8,4,2];
        $ai = ['1','0','X','9','8','7','6','5','4','3','2'];

        $sum = 0;
        for ($i = 0; $i < 17; $i++) {
            $sum += $value[$i] * $wi[$i];
        }

        if (strtoupper($value[17]) != $ai[$sum % 11]) {
            return app('json')->fail(100015);
        }

        return true;
    }

    protected function checkRealName($value)
    {
        if (!preg_match('/^[\x{4e00}-\x{9fa5}·]{2,20}$/u', $value)) {
            return app('json')->fail(100015);
        }
        return true;
    }
}