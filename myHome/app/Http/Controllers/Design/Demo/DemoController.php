<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/11
 * Time: 10:37
 */

namespace App\Http\Controllers\Design\Demo;

use App\Bls\Design\Demo\Factory\Operate\Operate;
use App\Bls\Design\Demo\Singleton\PublicKey\PublicKey;
use App\Http\Controllers\Controller;

use App\Bls\Design\Demo\Strategy\Duck\FlyWithNo;
use App\Bls\Design\Demo\Strategy\Duck\FlyWithWings;
use App\Bls\Design\Strategy\RubberDuck;

use App\Bls\Design\Demo\Observer\Notify\Boss;
use App\Bls\Design\Demo\Observer\Notify\StockObserver;

class DemoController extends Controller
{
    //策略模式：鸭子游戏
    public function duck()
    {
        $duck = new RubberDuck();

        //注册不用翅膀飞的鸭子
        $duck->setFlyBehavior(new FlyWithNo());
        $duck->performFly();

        echo "<br />";

        //注册用翅膀飞的鸭子
        $duck->setFlyBehavior(new FlyWithWings());
        $duck->performFly();
    }

    //观察者模式：报警通知
    public function notify()
    {
        $huhansan = new Boss(); //被观察者

        $gongshil = new StockObserver("三毛", $huhansan); //初始化观察者：三毛
        $gongshiM = new StockObserver("二弟", $huhansan); //初始化观察者：二弟

        $huhansan->Attach($gongshil); //添加一个观察者
        $huhansan->Attach($gongshiM); //添加一个相同的观察者
//        $huhansan->Detach($gongshil); //踢出基中一个观察者

        $huhansan->SubjectState("快点啊，赶紧的"); //达到满足的条件

        $huhansan->Notify(); //通过所有有效的观察者
    }

    //工厂模式：加减乘除
    public function operate()
    {
        $operate = new Operate('+');

        $res = $operate->getValue(100, 99);

        dd($res);
    }

    /**
     * 单例模式
     *
     * 说明：一次访问中生成一次数据库查询，防止过多的资源浪费
     */

    public function singleton()
    {
        $test = PublicKey::get();

        print_r($test);

        echo "<br />";

        print_r($test->out());

        echo "<br />";

        print_r($test->rand());

        echo "<br />";

        print_r($test->rand());

        dd();
    }

    //
}