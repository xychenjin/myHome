<?php

namespace App\Bls;


class MainBls
{

    /**
     * 创建随机密码数字器：返回随机数字组合
     *
     * @param $string
     * @return string
     */
    public function createPWD($string)
    {
        $elements = [];
        for ($i = 0 ; $i < strlen($string) ; $i++){
            $elements[] = substr($string, $i, 1);
        }

        $uniques = array_unique($elements);
        $temp = $uniques;
        $randArray = [];
        $randString = ' ';
        $randNumber = '';

        for($j = 0; $j < count($temp) ; $j++){

            $randArray[] = static::getDiff($temp[$i], $randArray, $temp);
/*            if ($j == count($uniques)-1 ){
                $randNumber .= ' '. static::getDiff($uniques[$j], $temp);
            }else{
                $fetchTemp = array_rand($temp);
                dd($fetchTemp);
                $randNumber .= ' '. $fetchTemp[0];
                unset($temp[$fetchTemp]);
                shuffle($temp);
            }*/
        }

        return $randArray;
    }

    public static function getDiff($string, $randArray, $inArray )
    {
        if (in_array($string , $randArray)){
            static::getDiff(array_rand($inArray), $randArray , $inArray);
        }else{
            return $string;
        }
    }
}