<?php

namespace App\Http\Controllers\Content;


use App\Bls\Content\GetFileContentBls;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class FileContentController extends Controller
{
    /**
     * 获取页面内容
     *
     */
    public function getFile(){
        $http = Input::get('q');


        //获取到页面内容
        $file = new GetFileContentBls(trim($http));

        echo "<hr><h1>当前地址：</h1>";
        echo $http."<hr>";

        echo $this->getHistory();

        echo "开始："."<br /><br /><br />";

        $fileContent = $file->getFileContent();
        print_r($fileContent);

        echo  $file->putFile() ? "<a href= '{$file->putFile()}'  target='_blank'>下载</a>" : '';
        echo "<br /><br /><hr>";
        echo "结束";
        dd();
    }

    /**
     * 获取查询历史中的记录
     *
     * @return string
     */
    public function getHistory()
    {
        $history = '';
        if (! empty($_SESSION['history']) ){

            $history .= "参数查询记录：<br>";

            foreach(array_unique($_SESSION['history']) as $key=>$value){
                $history .= ($key+1) .". ". $value."<br />";
            }

            $history .= "<hr/>";
        }
        return $history;
    }

}