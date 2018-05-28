<?php
	/**
	  * 产生随机数串
	* @param integer $len 随机数字长度
	* @return string
	  */
	function randString($len = 6)
	{
	    $chars = str_repeat('0123456789', 3);
	    // 位数过长重复字符串一定次数
	    $chars = str_repeat($chars, $len);
	    $chars = str_shuffle($chars);
	    $str = substr($chars, 0, $len);
	    return $str;
	}

	function getOrderAddressById($id){
		return App\Address::findOrFail($id)['province'].App\Address::findOrFail($id)['city'].App\Address::findOrFail($id)['county'].App\Address::findOrFail($id)['street'];
	}

	function ChangeCalendarFormat($str,$a,$b){
		$arr = array_reverse(explode('-',$str));

		$str_a = $arr[$a];
		$str_b = $arr[$b];

		$arr[$a] = $str_b;
		$arr[$b] = $str_a;

		return implode('/',$arr);
	}

	function ChangeCalendarDays($string){
		$first_arr = explode(' - ',$string);

        $str = [];

        foreach($first_arr  as $k=>$v){
            $arr = array_reverse(explode('/',$v));

            $str_a = $arr[1];
            $str_b = $arr[2];

            $arr[1] = $str_b;
            $arr[2] = $str_a;

            $str[$k] = implode('-',$arr);
        }
		return $str;
	}
?>
