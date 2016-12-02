<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/12
 * Time: 16:44
 */

namespace App\Http\Controllers\Test;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\JsonResponse;
use View;

class TestController extends Controller
{

    public function index(Request $request)
    {
        $test = $this->makeSignMsg($request);

        dd($test);
    }

    public function sign(Request $request)
    {
        $test = $this->makeSignMsg($request);

        dd($test);
    }

    //生成签名
    public function makeSignMsg(Request $request)
    {

        $input = $request->all();
        $input = array_except($input, ['price']);

        foreach($input as $item=>$value){
            if ($value == '') {
                $input[$item] = "{}";
            }
        }

        ksort($input);
        print_r($input);
        echo "<br/>";
        $newUrl = http_build_query($input);

        $newUrl2 = $newUrl . "&key=506b9f9c5e17c09f9c3c0fca6fb73e68";

       return  $newUrl .'&signMsg='.md5($newUrl2);/*md5(hex2bin($newUrl2))*/
    }

    //经纬度转成百度的经纬度
    public function getLocation(Request $request)
    {
        $data = @file_get_contents("http://api.map.baidu.com/ag/coord/convert?from=2&to=4&x=" . $request->x . "&y=" . $request->y);
        $array = json_decode($data, true);
        $arr["x"] = base64_decode($array["x"]);
        $arr["y"] = base64_decode($array["y"]);

        return (new JsonResponse());
    }

    public function puc()
    {
//        $json = file_get_contents(app_path(). '/../tests/201612011724.json');

        $json = @file_get_contents("file:///D:/webdocument/json/2016-10-141717.json");
        $arr = json_decode($json);

        //count($arr);//2780
        $cinemaId = 0;
        $cinemaIdLast = 0;
        $hallIdLast = 0;

        $sectionIdLast = 0;
        $rowNoLast = 0;
        $columnNoLast = 0;

        $increaseRow = 0; //增加的行号
        $increaseCol = 0; //增加的列号

        $collection = $arr;

        foreach($collection as $seatKey => $seat) {

            $cinemaIdLast = $cinemaIdLast == 0 ? $seat->cinema_id: $cinemaIdLast;//如果没有定义上一次影院，则定义

            $hallIdLast = $hallIdLast == 0 ? $seat->hall_id: $hallIdLast;//如果没有定义上一次影影厅，则定义

            $sectionIdLast = $sectionIdLast == 0 ? $seat->section_id: $sectionIdLast;//如果没有定义上一次影厅区域，则定义

            //同一家影院同一影厅
            if ($seat->cinema_id == $cinemaIdLast && $seat->hall_id == $hallIdLast) {

                if ( $seat->section_id != $sectionIdLast ) {
                    $increaseRow ++;
                }else
                    $increaseRow ++;
                if ( $seat->row_no == $rowNoLast ) {
                    $increaseRow --;
                }
                $increaseCol = $seat->column_no;

                $x = $increaseRow ;
                $y = $increaseCol ;
                echo "section_id:$seat->section_id, row_no:$seat->row_no, column_no:$seat->column_no, 计算出 x:$x, y:$y<br/>";

                $sectionId = $seat->section_id;

                //运算结束，赋值给上一次
                $cinemaIdLast = $seat->cinema_id;
                $hallIdLast = $seat->hall_id;
                $sectionIdLast = $seat->section_id;

                $rowNoLast = $seat->row_no;   //如果没有定义上一次座位号行编号，则定义
                $columnNoLast = $seat->column_no;   //如果没有定义上一次座位号列编号，则定义
            }else{
                break;
            }
        }
           dd();
    }

    public function jsn()
    {
        $json = @file_get_contents("file:///D:/webdocument/json/2016-10-171327.json");
        $arr = json_decode($json);

        foreach($arr->sections as $item =>$section) {

            foreach ($section->seats as $key=> $seat) {
                if (! isset($seat->columnId) || $seat->columnId == '') {
                    echo($seat->seatNo);
                    echo ",";
//                    echo "<br/>";
                }
            }
        }

//        dd($arr);
    }

    public function getData()
    {
        //2016-10-171515_10685

        $json = @file_get_contents("file:///D:/webdocument/json/2016-10-171515_10685.json");
        $arr = json_decode($json);

        dd($arr);

    }

    public function getShow()
    {
        //2016-10-171743_show

        $json = @file_get_contents("file:///D:/webdocument/json/2016-10-171743_show.json");
        $arr = json_decode($json);

        dd($arr);
    }

    public function doWhere()
    {
        $i = 0;
        $array = [];
        do{
            $i++;
            $rand = rand(1,99999999);

            echo "The number is $i, ". $rand. "<br/>";
            $array[$i] = $rand;
        }
        while( $i < 25);
        print_r($array);
    }

    public function doSwitch()
    {
        try {
            $inputs = Input::all();

            $currentFloor = $inputs['currentFloor'] ? intval($inputs['currentFloor']) : 1;  //当前层
            $stopOn = $inputs['stopOn'] ? intval($inputs['stopOn']) : 10;    //要去第几层
            $floors = $inputs['floors'] ? intval($inputs['floors']) : 20;//总楼层
            $directUp = $inputs['directUp'] && $inputs['directUp'] > 0 ? true : false;//方向：上、下

            do {
                $haiyou =  abs($currentFloor - $stopOn);

                //假设要去的楼层不停站
                if ( isset($floors[$stopOn]['nonStop']) && $floors[$stopOn]['nonStop']) {
                    echo "第{$stopOn}层, 不停站！<br/>";
                    break;
                }

                if ( $directUp && $currentFloor == $floors) {
                    echo "我们已经在最高层, 上不去了！<br/>";
                    break;
                }

                if (! $directUp && $currentFloor == 1) {
                    echo "我们已经在最底层, 下不去了！<br/>";
                    break;
                }

                if ($currentFloor > $floors || $currentFloor < 1 ) {
                    throw new \Exception('参数错误！currentFloor = '. $currentFloor);
                    break;
                }

                $daole = $this->callStop($currentFloor, $stopOn);

                if ($daole) {
                    echo "我们现在在第{$currentFloor}层, 到了！";
                } else
                    echo "我们现在在第{$currentFloor}层, 还有:". $haiyou ."站<br/>";

                if ($directUp) {
                    $currentFloor ++;
                }else
                    $currentFloor --;
            }
                while(! $daole );

        } catch (\Exception $e) {
            echo "出错了！".$e->getMessage()." at line ". $e->getLine();
        }

    }

    /**
     * @param $currentFloor int 当前楼层
     * @param $stopOn  int 要去的楼层
     * @return bool
     */
    public function callStop($currentFloor , $stopOn)
    {
        //假设要去的楼层是当前楼层
        if ($currentFloor == $stopOn ) {
            return true;
        }

        return false;
    }

    public function test()
    {

        $file = file_get_contents('file:///D:/webdocument/testJson/seats201611281124.json');

        dd(json_decode($file, true));

    }

    public function collect()
    {
        $json = file_get_contents(app_path(). '/../tests/201612011724.json');

        $file = json_decode($json, true);

//        echo "开始循环：". date('Y-m-d H:i:s');
//        echo "<br/>";
//        foreach($file as $seat) {
//            echo '座位：'. $seat['id'],'，场区：'.$seat['section_name']
//            , '，号码：'.$seat['seat_no'], '，x:'.$seat['x'], '，y:'.$seat['y'];
//            echo "<br/>";
//        }
//        echo "结束循环：". date('Y-m-d H:i:s');
//        echo "<br/>";


        dd(collect($file)->count());
    }



}