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

	function explode_kvalue($str){
		return explode(',',$str);
	}

	function cate_all_son($s,$cate_id){

		if($s <=10 ){
			$array_num1 = [2,3];
		}else if($s>10 && $s<=15){
			$array_num1 = [3,4];
		}else if($s>15 && $s<=20){
			$array_num1 = [4,5];
		}
		$cate_son = App\Cate::where('pid','=',$cate_id)->get()->toArray();
		$count_group = $array_num1[array_rand($array_num1)];
		$group_num =  floor(count($cate_son)/$count_group);
		$arr = array_group($cate_son,$count_group,$group_num);
		return $arr;
	}

	function array_group($arrF,$user_count,$group_num){

		for($i=0;$i<$user_count;$i++){
			if($i == $user_count-1){
				$arrT[] = array_slice($arrF, $i * $group_num );
			}else{
				$arrT[] = array_slice($arrF, $i * $group_num ,$group_num);
			}
		}

		return $arrT;
	}
?>
