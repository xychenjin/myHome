<?php

namespace App\Http\Controllers\MyHome;

use App\Bls\MainBls;
use App\Bls\MyHome\MyHomeBls;
use App\Bls\User\Model\UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Router;
use View;
use Carbon\Carbon;
use DB;
use Auth;
use Cookie;
use Cache;
use Hash;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Bls\SenseBls;


class IndexController extends Controller
{
    public function __construct(Router $router)
    {
        $this->middleware('check.login.out', ['except' => ['index', 'visit']]);
    }

    public function index(Request $request)
    {
//         $dd = (new MyHomeBls())->getIndex();

//         $dd = (new MyHomeBls())->getHanoi();
/*        $array = [1, 5, 3, 7, 4, 2, 1, 10];
         $dd = (new MyHomeBls())->quickSort($array);
         //dd($dd);
        $name = str_replace('市', '', '上海市');
        echo $name. "\n";
        echo 'this is my git checkout test'."\n";
        echo 'git help'."\n";
        echo 'git show '."\n";
        echo 'git chekcout -- '."\n";
        echo 'git chekcout .'."\n";
        echo 'git add '."\n";//将修改提交到本地暂存区
        echo 'git add .'."\n";//将修改提交到本地暂存区
        echo 'git rm'."\n";//从版本库中删除文件
        $compare = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $odd = [1, 3, 5, 7, 9,10];
        $even = [0, 2, 4, 6, 8];

        $compared = $this->compare($odd, $compare);

        $myhome = $this->mh_env();
        dd($myhome);
        phpinfo();
        dd();*/

//        echo '开始时间：'.date('Y-m-d H:i:s',time())."<br/>";
//        $myHomeBls = (new MyHomeBls());
//        $myHomeBls->getAllFile('d:/webdocument/dir');
//        echo "共计：{$myHomeBls->total}，目录：{$myHomeBls->dir}，文件：{$myHomeBls->file}\n";
//        echo '结束时间：'.date('Y-m-d H:i:s',time())."<br/>";

//        $str1 = 'abcdefghijklmnopqrstuvwxyz';
//        $str2 = 'abcf';
//         if ( strpos($str1, $str2) !== false ){
//             echo "\n {$str1} contain {$str2} \n";
//         }else{
//             echo "\n {$str1} does not contain {$str2} \n";
//         }

//        echo "<br/>";
//        $x = 5;
//        echo $x;    //5
//        echo "<br/>";
//        echo $x+++$x++;//11
//        echo "<br/>";
//        echo $x;        //7
//        echo "<br/>";
//        echo $x---$x--; //1
//        echo "<br/>";
//        echo $x;        //5

//        $a = '1';
//        $b = &$a;
//        echo "2$b";                       //21

//          var_dump(0123 == 123 );         //false
//          var_dump('0123' == 123 );       //true
//          var_dump('0123' === 123 );      //false

//        $x = true and false;
//        var_dump($x);         //  $x = true;
//                                        true and false;

//          $x = 3 + "15%" + "$25";
//          echo $x;            //18：会根据上下文来判断取值

//          $text = 'John ';
//          $text[10] = 'Doe';  //John后会有5个连续的空格
//          echo strlen($text);

//        $v = 1;
//        $m = 2;
//        $l = 3;
//        if ( $l > $m ){
//            echo "yes";
//        }else{
//            echo "no";
//        }

//        echo storage_path('app/file.txt');
//        echo $camel = camel_case('foo_bar');

//        echo $value = ends_with('This is my namedddd', 'name');
//        echo $value = str_limit('张三丰是一个人啊 framework for web artisans.', 2);
//        echo $value = str_contains('This is My name', 'my');
//        echo $value = str_is('foo*', 'foo');
//        echo $string = str_random(8);
//        echo $title = str_slug("one 5 Framework w w w bai du com", "-");
//        echo $value = studly_case('foo_bar_ddd_ccc');
//        echo trans('validation.unique');
//        echo $url = action('MyHome\\IndexController@index',['id' => 1]);
//          echo url('user/profile');

//        $id = "522321199203203717";
//        dd(substr($id,-6));//截取末尾位数
//        $ip = '210.110.11.49';

//        dd(ip2long($ip));

//        $strstr = "111' OR '1'='1"; //SQL注入
//        dd(md5($strstr));
//
//
//        $str = str_split($id);
//        $unique_str = array_unique($str);
//
//        $in_str = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9' ];
//        $array = $in_str;
//        foreach($str as $key => $val){
//            if (in_array($val, $in_str )){
//                unset($array[array_search($val, $in_str)]);
//            }
//        }
//        var_dump(implode(',', $array));
//        dd();


//        $howOldAmI = Carbon::createFromDate(1992, 4, 22)->age;
//        $now = Carbon::now()->toDateTimeString();
//        $nextSummerOlympics = Carbon::createFromDate(2016)->addYears(4);
//        $officialDate = Carbon::now()->toRfc2822String();
//        $formatDate = Carbon::now()->format('Y-m-d');
//        printf("Now: %s", Carbon::now());
//        $true = false;
//        $x = $y = $z = 'default';
//        if (! $true )
//            $x = 'x';
//            $y = 'y';
//            $z = 'z';
//        else
//            $x = '1';
//            $y = '2';
//            $z = '3';
//
//        dd($x . ':'. $y. ':'. $z);


//        dd($this->futureTime(344*10));
//        $imageUrl = 'http://img08.yiguoimg.com/e/others/150924/9288683201535800.jpg';
//
//        $str = '<p><img src="http://img08.yiguoimg.com/e/others/150924/9288683201535800.jpg"/><img src="http://img06.yiguoimg.com/e/others/150919/9288683201601331.jpg"/><img src="http://img05.yiguoimg.com/e/others/150923/9288683201666871.jpg"/><img src="http://img05.yiguoimg.com/e/others/150925/9288683201732409.jpg"/><img src="http://img07.yiguoimg.com/e/others/150925/9288683201797945.jpg"/><img src="http://img06.yiguoimg.com/e/others/150921/9288683201863477.jpg"/><img src="http://img05.yiguoimg.com/e/others/150922/9288683201929014.jpg"/><img src="http://img07.yiguoimg.com/e/others/150924/9288683201994552.jpg"/><img src="http://img06.yiguoimg.com/e/others/150920/9288683202060084.jpg"/><img src="http://img06.yiguoimg.com/e/others/150922/9288683202125622.jpg"/><img src="http://img05.yiguoimg.com/e/others/150923/9288683202191159.jpg"/><img src="http://img05.yiguoimg.com/e/others/150924/9288683202256696.jpg"/></p>';
//        echo $str;
//        dd();

//        $collection = new Collection([1, 2, 3, 4, 5, 6, 7, 8, 9, 0 ]);
//        $collection = new Collection([0, 7, 3, 4, 5, 6, 1, 8, 9, 2]);

//        $status = "Json\u6570\u636e\u6709\u8bef\uff01\u8bf7\u6838\u5b9e\u662f\u5426\u6b63\u786e";
//        $status = "\u7cbe\u9009\u5ef6\u5e86\u751f\u6001\u7ea2\u85af500g(\u5317\u4eac) \u554";
//        echo "<script>alert(\"$status\")</script>";
//        dd($status);
//        $collection = new Collection(['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 11=>'ten']);
//        $string = 'http://dffl-dev.b0.upaiyun.com/2016/08/12/3f21b2118d073e96f7d4e48bf2530aef426bf3b676f85a19cda8715629206e20.jpg';
//        $aaa = $this->formatImageUrl($string);
//        dd($aaa);
//        if ( $collection->count() ){
////            dd($collection->chunk(4));
//            $shuffled = $collection->shuffle();
//            $filter = $shuffled->map(function($value, $item){
//                return strtoupper($value);
//            });
//
//            dd($filter->pop());
//            echo $collection->count();
//        }else{
//            echo "empty";
//        }
//
//        dd();
//
//
//        $string = '<p><img src="http://img14.yiguoimg.com/e/images/2016/160310/513691851080081514_880x481.jpg" style=""/></p><p><img src="http://img11.yiguoimg.com/e/images/2016/160310/513691851080048746_880x357.jpg" style=""/></p><p><img src="http://img14.yiguoimg.com/e/images/2016/160310/513691851080015978_880x465.jpg" style=""/></p><p><img src="http://img14.yiguoimg.com/e/images/2016/160310/513691851080114282_880x355.jpg" style=""/></p><p><img src="http://img10.yiguoimg.com/e/images/2016/160310/513691851080179818_880x455.jpg" style=""/></p><p><img src="http://img13.yiguoimg.com/e/images/2016/160310/513691851080147050_880x211.jpg" style=""/></p><p><img src="http://img12.yiguoimg.com/e/images/2016/160310/513691851080245354_880x476.jpg" style=""/></p><p><img src="http://img13.yiguoimg.com/e/images/2016/160310/513691851080212586_880x51.jpg" style=""/></p><p><br/></p>';
//        preg_match_all('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i', $string, $matches);
//        preg_match_all('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i', $string, $matcheseee);
//        dd($matcheseee);
//        preg_match_all('<img\w+src=(\'|\")(.*?)(\'|\")\/>',$str, $matches);
//        preg_match_all('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i', $str, $matches);

//        $ddd = gmstrftime("%H:%M:%S", 3800);
//        $h = intval(gmstrftime("%H", 3800));
//        $m = intval(gmstrftime("%M", 3800));
//        $s = intval(gmstrftime("%S", 3800));
//        echo $h."=>".$m."=>".$s."\r\n";
//        $time = date('Y-m-d H:i:s', strtotime("+$h hour +$m minute +$s second"));
//        echo "$ddd\r\n";
//        echo date("Y-m-d H:i:s", time())."\r\n";
//
//        $time = $this->futureTime(31536000);
//        dd($time);

//        dd($matches);

//         $tmpFileName = time().rand(1000,9999).'.jpg';
//         $tmpFilePath = storage_path('/temp/'.$tmpFileName);
//         downloadRemoteFileWithCurl($imageUrl, $tmpFilePath);

//         preg_match_all("/<img.*src\=[\"|\'](.*)[\"|\'].*>/i", $str, $match);

//        $aa = '<p><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/8f8918310d48c71fec9df1592734b8d8e7e48230d4ffb902c5195fee5ba5de1b.jpg"/>
//                <img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/2d6042cb0b064a6c5710d62fe010af8aada02c799c441105d16d234de212e063.jpg"/>
//                <img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/d9c842ac6d92e7c97b94c9917215e6a46f91d95fa4766529d566951573cb8742.jpg"/>
//                <img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/5fd8b17e5a36633f2bdf630d99fd1c3871ce881008a99231ae8cd853703985a1.jpg"/>
//                <img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/7b7607fbcd3a72445c3b7db78b27d9bcec797e31a47a0325f2d3c11f2ce59fa5.jpg"/>
//                <img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/552a18ad86a652b911a5167e478c55eab646986c3326785c69340d2c1e9713ce.jpg"/>
//                <img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/ec449b50ead592c91bec44082fe2397b3d23373c5324acb33ad146adc577e060.jpg"/>
//                <img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/762c43898aac11f875d8584d3ee88022b76fe0cf359badc3f16b459d8f5ae7e8.jpg"/>
//                <img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/51f6b27645bc6bbeaccbca611ece36783dc74d41aa530396b57d37920f83338e.jpg"/>
//                <img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/6881489d88e2c6f87fb6357765a0144c1ea1a59aa4f849ef7e010aa4a409e0b9.jpg"/>
//                <img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/d99c74459ab155aec8a949fe3dbf540fc7f33bb65dfbab0bb50d2645ae40af7c.jpg"/>
//                <img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/5df40fded6291176b64dfcc2ba73afc3b46bea4764a857fe2e656673de9f7ee9.jpg"/>
//                </p>';
//        preg_match_all('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i', $str, $match);
//        print_r($match);
//        dd(Input::instance());
//        dd($officialDate);
//        echo '<p><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/870460c54fb5f76097bf736cc50adc2e4c8242bb8f43dbc63b449609cd28e884.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/d7695e5e71b4f4bbd46d43b7c9077dec6d4093c8f1329394ab066516808d0ae9.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/6d05234118ebe4742f499ae2d31d5ef0521174e8315ba7111bbf4165695eafa3.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/c7f41a1305746649a6853f538df447f801ae16a006621d97d58f6f28cf848c4a.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/e667350b0f352303155f0ec3911bf9437731950a8d441f1d39d8fde2b23a9e55.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/fdaf9058f925710c0e4ee863e6f8dd029e4fb9f1bc29cb97fed78e55f8b1280a.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/5eba22bbda0fbd26a3e6b6295d8a91daaf9e0de4b70ecb0c375c9c12ac091cbd.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/5784aa335f6424c5ed6b9ab76ff2448a4ad08d568f6d0e62710d1001890cd500.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/d6bf5da655f015fd90412354e2170354f41fbb09063d70d334b926614ca7d30d.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/a25e18d7328b2e1b90a12cd91c3fa4d9039f35841e1d82421f1c9845a638c3a8.jpg"/></p>';
//        echo '<p><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/e8682de6e04d4c9b0d1fa5c9c300466b2c71eb65357f5ce167cf9ec0a6be6d6e.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/141a41d82076a2551d4c0d2bfc9cad8419a5b1ec0a55236e4019269dcb2272e7.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/a833bf0ffe8e6100aaafd7a521591e9374e41ebcf0222e8a6fe5ab8076c60453.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/514ba56796c25874984a65fba1bc0047af561d7a7407f7699dcd3eced29514c5.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/169ece54d5c915b65b18eb3385b18a3b0592406cb27c7fb8875c9726b357153a.jpg"/></p>';
//        echo '<p><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/8f8918310d48c71fec9df1592734b8d8e7e48230d4ffb902c5195fee5ba5de1b.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/2d6042cb0b064a6c5710d62fe010af8aada02c799c441105d16d234de212e063.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/d9c842ac6d92e7c97b94c9917215e6a46f91d95fa4766529d566951573cb8742.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/5fd8b17e5a36633f2bdf630d99fd1c3871ce881008a99231ae8cd853703985a1.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/7b7607fbcd3a72445c3b7db78b27d9bcec797e31a47a0325f2d3c11f2ce59fa5.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/552a18ad86a652b911a5167e478c55eab646986c3326785c69340d2c1e9713ce.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/ec449b50ead592c91bec44082fe2397b3d23373c5324acb33ad146adc577e060.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/762c43898aac11f875d8584d3ee88022b76fe0cf359badc3f16b459d8f5ae7e8.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/51f6b27645bc6bbeaccbca611ece36783dc74d41aa530396b57d37920f83338e.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/6881489d88e2c6f87fb6357765a0144c1ea1a59aa4f849ef7e010aa4a409e0b9.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/d99c74459ab155aec8a949fe3dbf540fc7f33bb65dfbab0bb50d2645ae40af7c.jpg"/><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/5df40fded6291176b64dfcc2ba73afc3b46bea4764a857fe2e656673de9f7ee9.jpg"/></p>';
//        echo '<p><img src="http://dffl-dev.b0.upaiyun.com/2016/08/10/8f8918310d48c71fec9df1592734b8d8e7e48230d4ffb902c5195fee5ba5de1b.jpg" /></p>';
//        dd();
//        $foo = 'hihho5';
//        if (isset($foo{5})){
//            dd(11111);
//        }

//        $request = [
//            'name' => 'xychenjin'
//        ];
//
//        $rules = [
//            'name' => 'required|unique:users,name,NULL,id,email,1',
//        ];
//        $messages = [
//            'name.required' => 'the :attributes is required',
//            'name.unique' => 'the :attributes is unique',
//        ];
//
//        $validator = Validator::make($request, $rules, $messages);
//
//        dd($validator);

//        $aaa = new Carbon();
//        $user = Auth::user();



//        $userModel = UserModel::findOrFail(1);
//
//        $userModel->update([
//            'name'=>'pingpong',
//            'updated_at'=>new Carbon
//        ]);

//        $userModel->updated_at = Carbon::now()->toDateTimeString();
//        $userModel->save();
//        $user = DB::connection('db_myhome')->table('users')->find(1);
//        dd($user);
//        $value = $request->cookie('name');

//        Cookie::queue('cookie_for_js', 'can you read me?', 99999999);
//        Cookie::make('aaaa', 'value_aaa', '1 minutes');

//        $key  = Cookie::get('cookie_for_js');

//        Cache::put('bar', 'baz', 1);

//        $key = Cache::get('ticket');
//        dd($key);

//        $aaa = "http://localhost:9998/piaoshifu/mid?p=MTIzNDU2&r=980577&skip=login&u=%E7%94%A8%E6%88%B7%E5%90%8D1&uid=174&city=145";
//        dd(base64_decode('MTIzNDU2'));
//        dd($request->fullUrl());

//        $hashedPassword = Hash::make('secretpassword');
//        dd($hashedPassword);

//        dd(crypt('122'));
//        $check = Hash::check('secretpassword', '$2y$10$ogl4ORT0Zg7fsrxndh2lOezh4c0mO7SlZZ5kgra1i4a4v9U.PSxa.');
//        dd($check);
//        $input = $request->all();
//        if (! empty($input)) {
//            dd($input);
//        }
//        $router->pattern('id', '[0-9]+');
//
//        dd($router);
//
        Validator::extend('sensitive_char', function($attribute, $value, $parameters, $validator) use($request) {
            return $this->validateRegex($value);
        });


        $rules = ['name' => 'required|sensitive_char'];
        $messages = [
            'required' => '字符为必填',
            'sensitive_char' => '含有敏感字符'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
//        $this->validate($request, $rules);
        if ($validator->fails()){
            dd($validator->errors()->all());
        }
        dd('validator passed!');
        $ddd = $request->get('name');

        //还可以使用str_count来进行查找
        if ( preg_match('/^((用户名1)|(aaa))/i', $ddd)) {
            dd('含有非法字符');
        }
        dd('不含有非法字符');

        $aa = preg_match('/^(user)*/i', $ddd );
        dd($aa);

        return View::make('myhome.index',[]);
    }

    public function visit( Request $request)
    {
        $q = $request->get('q');
        $qT = $request->get('q-t');
        $senseBls = new SenseBls();

        if ( ! empty($q) || ! empty($qT)) {
            $senseBls->sense($q, 4 );
            $info = $senseBls->getInfo();
        }
//        $is = is_numeric(' 12333 ');
//        Cache::put('cache_name', '111111111', 10);
//

        return View::make('myhome.visit', [
            'q'=> isset($q) ? $q : '' ,
            'error'=> isset($info['contains']) ? $info['contains'] : '',
            'error_msg'=> isset($info['resultCodeDesc']) ? $info['resultCodeDesc'] : ''
        ]);
    }


    public function createPwd()
    {
        $createString = '123456';

        $createPwd = (new MainBls())->createPWD($createString);

        dd($createPwd);
    }

    /**
     * 两个数组中比较出相同的，删除的，新加的
     *
     * @param $prev
     * @param $next
     * @return null|string
     */
    public function compare( $prev, $next )
    {
        if(! is_array($prev) || ! is_array($next) ){
            return null;
        }
        $compare = $prev;       //比较
        $compared = $next;      //被比较参数
        $unchangedCount = 0; //未改变
        $increasedCount = 0; //新增
        $increasedContent = ''; //新增内容
        $decreasedCount = 0; //减少
        $decreasedContent = ''; //减少内容

        //查找比较前者在后者中的数据情况
        foreach ( $compare as $val){
            $temp = $val;
            $tempUnchanged = true;
            foreach ($compared as $item => $vvv) {
                if ( $temp == $vvv ){
                    $unchangedCount++;
                    $tempUnchanged = true;
                    unset($compared[$item]);
                    break;
                }else{
                    $tempUnchanged = false;
                }
            }
            if ( ! $tempUnchanged ){
                $increasedCount++;
                $increasedContent .= $increasedContent !== '' ? ', '. $temp : $temp;
            }
        }

        if ( count($compared) ){
            $decreasedCount += count($compared);
            foreach($compared as $value){
                $decreasedContent .= $decreasedContent !== '' ? ', '. $value : $value ;
            }
        }

        return 'Unchanged: ' . $unchangedCount .', Increased: '
            . $increasedCount . ', '.($increasedContent ? '('. $increasedContent. ') ,':'').' Decreased: '
            . $decreasedCount .( $decreasedContent ? '('. $decreasedContent. ') .':' .');
    }

    public function mh_env()
    {
        return null;

//         $dd = (new MyHomeBls())->getHanoi();

    }

    public function test()
    {
        DB::connection()->enableQueryLog();
        try{
            DB::transaction(function(){
                DB::connection('db_myhome')->table('users')->update(['updated_at'=>Carbon::now()]);
                $data = ['ddd', '333gggg@qq.com',Carbon::now(),Carbon::now()];
                $Id = DB::insert('insert into users (name, email, created_at, updated_at) values (?, ?, ?, ?)', $data);
                $record = DB::table('users')->where('email','333gggg@qq.com');
                print_r($record);
            });
        } catch (QueryException $e) {
            echo $e->getMessage();
        }

//        $drop = DB::delete('delete from users where name=? AND email=?',['xychenjin', '123456@qq.com']);

        $users = DB::table('users')->get();
        print_r($users);
        $log = DB::getQueryLog();
        dd($log);
    }

    /**
     * 当前之间之后未来的某个时刻点：时/分/秒
     * @param $seconds
     * @return mixed
     */
    public function futureTime($seconds)
    {
        if (is_numeric($seconds) ){
            $formatSeconds = intval($seconds);
            $ddd = gmstrftime("%H:%M:%S", $formatSeconds);
            $y = intval(gmstrftime("%Y", $formatSeconds)); //年
            $b = intval(gmstrftime("%B", $formatSeconds)); //月
            $d = intval(gmstrftime("%D", $formatSeconds)); //日

            $y = $b == '0' && $d == '0' ? 0 :  $y;

            $h = intval(gmstrftime("%H", $formatSeconds)); //小时
            $m = intval(gmstrftime("%M", $formatSeconds)); //分钟
            $s = intval(gmstrftime("%S", $formatSeconds)); //毫秒
            dd("$y=>$b=>$d $h=>$m=>$s");
            $time = date('Y-m-d H:i:s', strtotime("+$h hour +$m minute +$s second"));
            echo "$ddd\r\n";
            echo date("Y-m-d H:i:s", time())."\r\n";
            dd($time);
        }
        return $seconds;
    }

    /**
     * 因数据库url限制长度，特把图片的url存为优盘云返回的地址
     *
     * @param $picUrl
     * @return mixed
     */
    public function formatImageUrl($picUrl)
    {
        if (str_contains($picUrl, config('upyun.domain')))
        {
            $picUrl = str_replace(config('upyun.domain'),'',$picUrl);
        }
        return $picUrl;
    }

    public function ajaxTest(Request $request)
    {
        $input = $request->all();

//        dd($input);

        return (new JsonResponse())->success();
    }



}