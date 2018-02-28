<?php

function modul_array_round($arr)
{
    $rand = array_rand($arr, mt_rand(1,3));
    $newarr = [];
    if(!is_array($rand)) {
        $newarr[] = $arr[$rand];
    }else{
        foreach($rand as $k => $v) {
            $newarr[] = $arr[$v];
        }
    }
    return $newarr;
}
