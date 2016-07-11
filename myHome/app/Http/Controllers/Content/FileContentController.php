<?php

namespace App\Http\Controllers\Content;


use App\Bls\Content\GetFileContentBls;
use App\Http\Controllers\Controller;

class FileContentController extends Controller
{
    public function getFile(){
        //分类信息网站大全
        $url = 'http://www.360doc.com/content/13/0131/15/11136319_263409787.shtml';
        $file = new GetFileContentBls($url);

        $fileContent = $file->getTable();
        dd($fileContent);
    }
}