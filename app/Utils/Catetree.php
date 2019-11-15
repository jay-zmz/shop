<?php
/**
 * Created by PhpStorm.
 * User: Jimmy
 * Date: 2019/2/28
 * Time: 14:34
 */

namespace App\Utils;


class Catetree
{
	public function tree($result)
	{
		return $this->sort($result);
	}

	public function sort($result,$pid=0,$level=0)
	{
	
		static $arr=[];
		foreach($result as $k=>$v){

			if($v['pid'] == $pid){
				$v['level'] = $level;
				$arr[] = $v;
				$this->sort($result,$v['id'],$level+1);
			}
		}

		return $arr;
	}

}