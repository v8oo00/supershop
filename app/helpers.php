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
?>