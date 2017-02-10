<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/11/25
 * Time: 9:49
 */

namespace App\Http\Controllers\Json;


use App\Http\Controllers\Controller;

class JsonController extends Controller
{
    public function index()
    {
        //Json字符串
//        $json_str = '{"api":"gateway.sync.seats","code":"0","data":{"bizMsg":"SUCCESS","data":{"sections":[{"id":"0000000000000001","name":"普通区","seats":[{"status":"L","seatNo":"0000000000000001-1-1","columnNo":"1","rowId":"1","columnId":"1","rowNo":"1"},{"status":"R","seatNo":"0000000000000001-1-2","columnNo":"2","rowId":"1","columnId":"2","rowNo":"1"},{"status":"E","seatNo":"0000000000000001_1_3","columnNo":"3","rowId":"1","columnId":"","rowNo":"1"},{"status":"L","seatNo":"0000000000000001-1-3","columnNo":"4","rowId":"1","columnId":"3","rowNo":"1"},{"status":"R","seatNo":"0000000000000001-1-4","columnNo":"5","rowId":"1","columnId":"4","rowNo":"1"},{"status":"E","seatNo":"0000000000000001_1_6","columnNo":"6","rowId":"1","columnId":"","rowNo":"1"},{"status":"L","seatNo":"0000000000000001-1-5","columnNo":"7","rowId":"1","columnId":"5","rowNo":"1"},{"status":"R","seatNo":"0000000000000001-1-6","columnNo":"8","rowId":"1","columnId":"6","rowNo":"1"},{"status":"L","seatNo":"0000000000000001-2-1","columnNo":"1","rowId":"2","columnId":"1","rowNo":"2"},{"status":"R","seatNo":"0000000000000001-2-2","columnNo":"2","rowId":"2","columnId":"2","rowNo":"2"},{"status":"E","seatNo":"0000000000000001_2_3","columnNo":"3","rowId":"2","columnId":"","rowNo":"2"},{"status":"L","seatNo":"0000000000000001-2-3","columnNo":"4","rowId":"2","columnId":"3","rowNo":"2"},{"status":"R","seatNo":"0000000000000001-2-4","columnNo":"5","rowId":"2","columnId":"4","rowNo":"2"},{"status":"E","seatNo":"0000000000000001_2_6","columnNo":"6","rowId":"2","columnId":"","rowNo":"2"},{"status":"L","seatNo":"0000000000000001-2-5","columnNo":"7","rowId":"2","columnId":"5","rowNo":"2"},{"status":"R","seatNo":"0000000000000001-2-6","columnNo":"8","rowId":"2","columnId":"6","rowNo":"2"},{"status":"L","seatNo":"0000000000000001-3-1","columnNo":"1","rowId":"3","columnId":"1","rowNo":"3"},{"status":"R","seatNo":"0000000000000001-3-2","columnNo":"2","rowId":"3","columnId":"2","rowNo":"3"},{"status":"E","seatNo":"0000000000000001_3_3","columnNo":"3","rowId":"3","columnId":"","rowNo":"3"},{"status":"L","seatNo":"0000000000000001-3-3","columnNo":"4","rowId":"3","columnId":"3","rowNo":"3"},{"status":"R","seatNo":"0000000000000001-3-4","columnNo":"5","rowId":"3","columnId":"4","rowNo":"3"},{"status":"E","seatNo":"0000000000000001_3_6","columnNo":"6","rowId":"3","columnId":"","rowNo":"3"},{"status":"L","seatNo":"0000000000000001-3-5","columnNo":"7","rowId":"3","columnId":"5","rowNo":"3"},{"status":"R","seatNo":"0000000000000001-3-6","columnNo":"8","rowId":"3","columnId":"6","rowNo":"3"},{"status":"L","seatNo":"0000000000000001-4-1","columnNo":"1","rowId":"4","columnId":"1","rowNo":"4"},{"status":"R","seatNo":"0000000000000001-4-2","columnNo":"2","rowId":"4","columnId":"2","rowNo":"4"},{"status":"E","seatNo":"0000000000000001_4_3","columnNo":"3","rowId":"4","columnId":"","rowNo":"4"},{"status":"L","seatNo":"0000000000000001-4-3","columnNo":"4","rowId":"4","columnId":"3","rowNo":"4"},{"status":"R","seatNo":"0000000000000001-4-4","columnNo":"5","rowId":"4","columnId":"4","rowNo":"4"},{"status":"E","seatNo":"0000000000000001_4_6","columnNo":"6","rowId":"4","columnId":"","rowNo":"4"},{"status":"L","seatNo":"0000000000000001-4-5","columnNo":"7","rowId":"4","columnId":"5","rowNo":"4"},{"status":"R","seatNo":"0000000000000001-4-6","columnNo":"8","rowId":"4","columnId":"6","rowNo":"4"},{"status":"L","seatNo":"0000000000000001-5-1","columnNo":"1","rowId":"5","columnId":"1","rowNo":"5"},{"status":"R","seatNo":"0000000000000001-5-2","columnNo":"2","rowId":"5","columnId":"2","rowNo":"5"},{"status":"E","seatNo":"0000000000000001_5_3","columnNo":"3","rowId":"5","columnId":"","rowNo":"5"},{"status":"L","seatNo":"0000000000000001-5-3","columnNo":"4","rowId":"5","columnId":"3","rowNo":"5"},{"status":"R","seatNo":"0000000000000001-5-4","columnNo":"5","rowId":"5","columnId":"4","rowNo":"5"},{"status":"E","seatNo":"0000000000000001_5_6","columnNo":"6","rowId":"5","columnId":"","rowNo":"5"},{"status":"L","seatNo":"0000000000000001-5-5","columnNo":"7","rowId":"5","columnId":"5","rowNo":"5"},{"status":"R","seatNo":"0000000000000001-5-6","columnNo":"8","rowId":"5","columnId":"6","rowNo":"5"}]},{"id":"0000000000000002","name":"贵宾区","seats":[{"status":"N","seatNo":"0000000000000002-1-01","columnNo":"1","rowId":"1","columnId":"01","rowNo":"1"},{"status":"N","seatNo":"0000000000000002-1-02","columnNo":"2","rowId":"1","columnId":"02","rowNo":"1"},{"status":"N","seatNo":"0000000000000002-1-03","columnNo":"3","rowId":"1","columnId":"03","rowNo":"1"},{"status":"N","seatNo":"0000000000000002-1-04","columnNo":"4","rowId":"1","columnId":"04","rowNo":"1"},{"status":"N","seatNo":"0000000000000002-1-05","columnNo":"5","rowId":"1","columnId":"05","rowNo":"1"},{"status":"N","seatNo":"0000000000000002-1-06","columnNo":"6","rowId":"1","columnId":"06","rowNo":"1"},{"status":"N","seatNo":"0000000000000002-2-01","columnNo":"1","rowId":"2","columnId":"01","rowNo":"2"},{"status":"N","seatNo":"0000000000000002-2-02","columnNo":"2","rowId":"2","columnId":"02","rowNo":"2"},{"status":"N","seatNo":"0000000000000002-2-03","columnNo":"3","rowId":"2","columnId":"03","rowNo":"2"},{"status":"N","seatNo":"0000000000000002-2-04","columnNo":"4","rowId":"2","columnId":"04","rowNo":"2"},{"status":"N","seatNo":"0000000000000002-2-05","columnNo":"5","rowId":"2","columnId":"05","rowNo":"2"},{"status":"N","seatNo":"0000000000000002-2-06","columnNo":"6","rowId":"2","columnId":"06","rowNo":"2"},{"status":"N","seatNo":"0000000000000002-3-01","columnNo":"1","rowId":"3","columnId":"01","rowNo":"3"},{"status":"N","seatNo":"0000000000000002-3-02","columnNo":"2","rowId":"3","columnId":"02","rowNo":"3"},{"status":"N","seatNo":"0000000000000002-3-03","columnNo":"3","rowId":"3","columnId":"03","rowNo":"3"},{"status":"N","seatNo":"0000000000000002-3-04","columnNo":"4","rowId":"3","columnId":"04","rowNo":"3"},{"status":"N","seatNo":"0000000000000002-3-05","columnNo":"5","rowId":"3","columnId":"05","rowNo":"3"},{"status":"N","seatNo":"0000000000000002-3-06","columnNo":"6","rowId":"3","columnId":"06","rowNo":"3"},{"status":"N","seatNo":"0000000000000002-4-01","columnNo":"1","rowId":"4","columnId":"01","rowNo":"4"},{"status":"N","seatNo":"0000000000000002-4-02","columnNo":"2","rowId":"4","columnId":"02","rowNo":"4"},{"status":"N","seatNo":"0000000000000002-4-03","columnNo":"3","rowId":"4","columnId":"03","rowNo":"4"},{"status":"N","seatNo":"0000000000000002-4-04","columnNo":"4","rowId":"4","columnId":"04","rowNo":"4"},{"status":"N","seatNo":"0000000000000002-4-05","columnNo":"5","rowId":"4","columnId":"05","rowNo":"4"},{"status":"N","seatNo":"0000000000000002-4-06","columnNo":"6","rowId":"4","columnId":"06","rowNo":"4"}]}]},"bizCode":"0"},"msg":"SUCCESS","version":"1.0"}';
        //Json文件
        $json_str =  file_get_contents('file:///D:/webdocument/testJson/seats201611281124.json');

        dd(gzcompress($json_str));

        dd(json_decode($json_str, true));
    }

    public function getFile()
    {
        echo "<title>一生中应该读的36本书</title>";
        $url = 'http://www.360doc.com/content/15/0425/19/21865070_465959820.shtml';

        echo "<a href='$url'>$url</a><br/>";

        $t = file_get_contents($url);

        preg_match_all('|<p+>(.*)</p>|i', $t, $matches);
        $txt = '';
        foreach($matches as $k => $match) {
            foreach($match as $item) {
                $str = strip_tags($item);
                $txt .= strlen($str) <1 ? '': $str  . "\r\n";
                echo strlen($str) <1 ? '': $str  . "<br/>";
            }

        }

        file_put_contents('temp/txt/36books.txt',$txt);
    }

    public function getFiles()
    {
        echo "<title>一生中应该读的60本书</title>";
        $url = 'http://www.eywedu.net/60.html';
        echo "<a href='$url' >$url</a><br/>";
        header("Content-Type:text/html;charset=utf-8");
        $t = iconv('GB2312', 'UTF-8//IGNORE', file_get_contents($url));

        preg_match_all('/<div\s*.*>\s*.*<\/div>/i', $t, $matches);
        $txt = '';
        foreach($matches as $match) {
            foreach($match as $item) {
                $str = strip_tags($item);
                $txt .= strlen($str) <1 ? '': $str  . "\r\n";
                echo strlen($str) <1 ? '': $str  . "<br/>";
            }
        }
        file_put_contents('temp/txt/60books.txt',$txt);
    }
}