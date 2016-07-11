<?php


namespace App\Bls\Content;

/**
 * 抓取网页并提取 想要的内容
 *
 * Class GetFileContentBls
 * @package App\Bls\Content
 */
class GetFileContentBls
{
    public $history = [];

    protected $url = '';

    /**
     * GetFileContentBls constructor.
     */
    public function __construct($fileUrl , $charSet = 'utf-8')
    {
        $this->file = $this->setFile($fileUrl);
        $this->url = $fileUrl;
        $this->setHistory($fileUrl);
    }

    /**
     * 设置当前被访问的页面为字符串
     *
     * @param string $fileUrl
     * @param string $charSet
     */
    public function setFile($fileUrl)
    {
        $fileContent = '';
        if ( !empty($fileUrl) ){
            return $fileContent = file_get_contents($fileUrl);
        }
        return $fileContent;
    }

    /**
     * 按照键值对应顺序封装成数组并返回
     *
     * @param $key
     * @param $value
     */
    public static function toArray($key , $value )
    {
        return [$key=>$value];
    }

    /**
     * 按照表格结构 table，thead，tbody，tr, td来获取
     *
     * @return array
     */
    public function getFileContent()
    {
        $file = $this->file;

        if ($file == '' || empty($file) ){
            return '未找到相对应的内容！';
        }

        $table = [];
        $pregMatchAll = preg_match_all("/<table*?>([\w\W]*?)<\/table>/", $file , $matches );
        if(! empty($matches)){
            return $matches;
        }

/*        foreach($matches as $keys => $values){
            foreach ($values as $kk => $vv){
                $pregMatchSpan = preg_match_all("/<span*?>([\w\W]*?)<\/span>/", $vv , $spans);
                dd($vv);
                foreach($spans as $key => $value){
                    $table['content'][$kk][$key] = $spans[$key];
                }
            }
        }*/

        return $file;
    }

    /**
     * 保存查询记录到SESSION 数组中
     *
     * @param $history
     */
    public function setHistory($history)
    {
        array_push($this->history, $history);
    }

    /**
     * 把访问匹配到的结果写入文件，返回保存地址
     *
     * @return string
     */
    public function putFile()
    {
       if ($this->url !== '' ){
           $fileContent = $this->file;

           $content = "\r\n".'请求时间：'.date("y-m-d h:i:s");
           $content .= "\r\n参数q: ". $this->url;
           $content .= "\r\n"."内容：<br/>\r\n".$fileContent;
           $content .= "\r\n";
           $content .= "\r\n结束";
           $fileSavePath = 'file:///C:/Users/jin/Desktop/'.date('y-m-d').'.txt';
           file_put_contents($fileSavePath, $content , FILE_APPEND);
           return $fileSavePath;
       }
       return $this->url;
    }
}