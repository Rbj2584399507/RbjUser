<?php



$result = quickSort([3,1,10,5,2,7,6,4,9,8]);

var_dump($result);
function quickSort($arr){
    if(count($arr)<=1){
        return $arr;
    }
    $base = $arr[0];
    $min  = [];
    $max  = [];
    for ($i=1;$i<count($arr);$i++){
        if($arr[$i]<=$base){
            $min[] = $arr[$i];
        }else{
            $max[] = $arr[$i];
        }
    }

    $left = quickSort($min);
    $right = quickSort($max);
    return array_merge($left,[$base],$right);
}

?>