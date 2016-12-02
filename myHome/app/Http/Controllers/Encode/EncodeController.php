<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/11/30
 * Time: 16:40
 */

namespace App\Http\Controllers\Encode;


use App\Http\Controllers\Controller;

class EncodeController extends Controller
{
    public function index()
    {
        $url = "http://jim.www.com/scenery/activity/list?departure=21_208_206_179_129_70_68_67_214_7_3_340_180_185_222_145&category[81]=137_118_88_83_82&subject=193_194_123_163_122_121_126_129_107_116_117_132_98_93_87_85_84&destination=7_3_340_180_185_222_145&city=145&page=1";

        $aaa = parse_url($url);

//        foreach($aaa as $key => $val) {
//           switch($key) {
//               case 'scheme':
//
//                   break;
//               case 'host':
//
//                   break;
//               case 'path':
//                   break;
//               case 'query':
//                   $arrs = explode('&', $val);
//
//                   foreach ($arrs as $arr) {
//
//                   }
//
//                   break;
//           }
//        }

        phpinfo();

//        dd($aaa);
//        base64_encode();
    }
}