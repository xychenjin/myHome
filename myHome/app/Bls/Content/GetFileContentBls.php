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
    /**
     * GetFileContentBls constructor.
     */
    public function __construct($fileUrl , $charSet = 'utf-8')
    {
        $this->file = $this->setFile($fileUrl);
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
        if ( is_file($fileUrl )){
            $fileContent = file_get_contents($fileUrl);
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
    public function getTable()
    {
        $file = $this->file;

        if ($file == '' || empty($file) ){
            return [];
        }

        $table = [];
        $pregMatchAll = preg_match_all('<table>*</table>', $file , $matches);

        return $table;
    }
}