<?php

namespace App\Bls;


class SenseBls
{
    const TYPE_REGEX_USE_SIMPLE = 1;    //简单
    const TYPE_REGEX_USE_ORDINARY = 2;    //普通
    const TYPE_REGEX_USE_COMPLEX = 3;    //复杂

    const TYPE_STR_START = 1;   //仅匹配以关键词开头
    const TYPE_STR_END = 2;     //仅匹配以关键词结尾
    const TYPE_STR_ALL = 3;     //匹配整个关键词
    const TYPE_STR_NO = 4;      //匹配含有关键词

    const TYPE_REGEX_SUCCESS = 0;   //成功
    const TYPE_REGEX_FAIL = 1;      //失败
    const TYPE_REGEX_SUCCESS_DESC = '验证通过';
    const TYPE_REGEX_FAIL_DESC = '验证未能通过';

    protected static $ignoreStrCase;    //是否忽略大小写
    protected static $regexType;        //匹配类型
    protected static $regexUseType;     //匹配类型模式

    public $pattern;          //匹配规则
    public $value;           //匹配值
    public $matches;           //匹配结果
    public $result;           //验证结果

    //构造函数
    public function __construct( $regexUseType = self::TYPE_REGEX_USE_SIMPLE)
    {
        //忽略大小写
        self::$ignoreStrCase = true;

        //匹配模式：默认为关键字开头
        self::$regexType = self::TYPE_STR_START;

        self::$regexUseType = $regexUseType;

        $this->result = self::TYPE_REGEX_SUCCESS;

    }

    //初始化函数
    public function sense($value , $type = self::TYPE_STR_START, $ignoreStrCase = true)
    {
        $this->setValue( empty($value) ? '': $value);

        self::$ignoreStrCase = $ignoreStrCase == true ? true : false;
        self::$regexType = static::getType($type);

        $this->setMatch($type, $value);

        $matches = $this->getMatches();

        if ( is_array($matches) && ! empty($matches)) {
            $this->result = static::TYPE_REGEX_FAIL;
        }

    }

    public function setMatch($type, $value)
    {
        $patterns = $this->regex();
        if ( empty($patterns)) {
            return ;
        }
        $matched = [];
        foreach($patterns as $key => $pattern) {
            $temp = $this->formatRegex( array($pattern));
            $regexPattern = static::getRegexPattern($temp, $type) . $this->ignore();
            preg_match($regexPattern, $value, $matches);
            if (! empty($matches)) array_push($matched, $pattern);
        }

        $preg = $this->getRegex();
        $this->setPattern( $preg);
        $this->setMatches($matched);
    }

    //配置敏感词
    public function regex()
    {
        switch(self::$regexUseType) {
            case static::TYPE_REGEX_USE_SIMPLE:
                return [
                    'user',
                    '用户名',
                    'aaa',
                    '共产党',
                    'cad'
                ];
            case static::TYPE_REGEX_USE_COMPLEX:
                return [
                    'user',
                    '用户名',
                    'aaa',
                    '共产党'
                ];
            case static::TYPE_REGEX_USE_ORDINARY:
                return [
                    'user',
                    '用户名',
                    'aaa',
                    '共产党'
                ];
        }

        return [];
    }
    //格式化敏感词
    public function formatRegex($regex = [])
    {
        if ( ! is_array($regex) || empty($regex) ) {
            return '';
        }

        if ( count($regex) == 1) {
            return '('. $regex[0] . ')';
        }

        $arr = [];
        while(list($key, $value) = each($regex))
        {
            array_push($arr, '('. $value. ')');
        }

        return '('. implode('|', $arr) . ')';
    }

    //获取格式化后匹配规则
    public function getRegex()
    {
        return $this->formatRegex( $this->regex()) ? $this->formatRegex( $this->regex()) : '';
    }

    /**
     * 验证敏感词
     *
     * @param $value
     * @param int $type
     * @param bool|true $ignoreStrCase
     * @return bool
     * @throws \Exception
     */
    public function validateRegex($value , $type = self::TYPE_STR_START, $ignoreStrCase = true)
    {
        $this->setValue( $value);

        self::$ignoreStrCase = $ignoreStrCase == true ? true : false;
        self::$regexType = static::getType($type);

        $this->setMatch($type, $value);

        $matches = $this->getMatches();

        if ( is_array($matches) && ! empty($matches)) {
            $this->result = static::TYPE_REGEX_FAIL;
        }

        return empty($matches);
    }


    public static function getRegexPattern($pattern, $regexType = null)
    {
        $type = $regexType ? $regexType : self::$regexType;
        switch($type){
            case self::TYPE_STR_START:
                return '/^'. $pattern. '/';
            case self::TYPE_STR_END:
                return '/'. $pattern. '$/';
            case self::TYPE_STR_ALL:
                return '/^'. $pattern. '$/';
            case self::TYPE_STR_NO:
                return '/'. $pattern. '/';
        }

        return '/'. $pattern. '/';
    }

    public static function getType($type)
    {
        switch($type){
            case self::TYPE_STR_START:
                return self::TYPE_STR_START;
            case self::TYPE_STR_END:
                return self::TYPE_STR_END;
            case self::TYPE_STR_ALL:
                return self::TYPE_STR_ALL;
            case self::TYPE_STR_NO:
                return self::TYPE_STR_NO;
        }

        throw new \Exception('unknown regex type !');
    }

    public function ignore()
    {
        switch ( self::$ignoreStrCase) {
            case true:
                return '';   //忽略大小写
            case false:
                return 'i';
        }
        return '';
    }

    public function setPattern($value)
    {
        $this->pattern = $value;
    }

    public function getPattern()
    {
        return $this->pattern;
    }


    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        if ($this->value === null) {
            throw new \Exception('Invalid params for lack of :regex $value');
        }

        return $this->value;
    }

    public function setMatches($value)
    {
        $this->matches = $value;
    }

    public function getMatches()
    {
        $matches = $this->matches;
        if ( ! is_array($matches) || empty($matches)) {
            return '';
        }
        array_filter( $matches);
        $unique = array_unique( $matches);

        return $unique;
    }

    public function getResultDesc()
    {
        switch( $this->result) {
            case self::TYPE_REGEX_SUCCESS:
                return self::TYPE_REGEX_SUCCESS_DESC;
            case self::TYPE_REGEX_FAIL:
                return self::TYPE_REGEX_FAIL_DESC;
        }
        return '验证通过';
    }
    //获取匹配后的结果
    public function getResult()
    {
        $value = $this->getValue();
        $matches = $this->getMatches();
        $replaceRes = $value;
        if ( is_array($matches) && ! empty($matches)) {
            $this->result = static::TYPE_REGEX_FAIL;
            foreach($matches as $key => $pattern) {
                $replaceRes = str_replace( $pattern, ' <b style="color:red">' . $pattern . '</b> ', $replaceRes);
            }
        }
        return $this->result ==  static::TYPE_REGEX_FAIL ? $replaceRes : '';
    }

    //获取信息
    public function getInfo()
    {
        return [
            'value' => $this->getValue(),
            'pattern' => $this->getPattern(),
            'replace' => $this->getReplace(),
            'resultCode' => $this->result,
            'resultCodeDesc' => $this->getResultDesc(),
            'contains' => $this->getWarning()
        ];
    }

    //获取含有信息
    public function getReplace()
    {
        return $this->result ?  $this->getResultDesc(). ': '. $this->getResult() : self::TYPE_REGEX_SUCCESS_DESC ;
    }

    public function formatMatched($matched = [])
    {
        if ( is_string($matched)){
            return '<b style="color:red">'.$matched.'</b>';
        }

        if ( is_array($matched) && ! empty($matched)) {
            $str = '';
            while(list($item, $value) = each($matched)){
                $str .= $str ? '，'. "<b style='color: red'>{$value}</b>" :  "<b style='color: red'>{$value}</b>";
            }
            return $str;
        }
        return '';
    }

    public function getWarning()
    {
        $matched = $this->getMatches();
        return empty($matched) ? '' : '含有非法字符：'. $this->formatMatched($matched);
    }

    //获取打印后的信息
    public function getPrint()
    {
        echo '验证输入:'.'<p style="text-decoration: underline">'. $this->getValue() . "</p><br/>";
        echo '验证规则:"'. $this->getPattern() . "\"<br/>";
        echo '验证结果:'. $this->getResult() . "<br/>";
        echo '最终：'.'<strong>'. $this->getResultDesc() .'</strong>'. "<br/>";
    }
}
