<?php

namespace App\Consts\DesignPatterns;


use App\Consts\BaseConsts;

class DesignPatternsConsts extends BaseConsts
{
    const DESIGN_SINGLETON_PATTERN = 1;
    const DESIGN_FACTORY_PATTERN = 2;
    const DESIGN_OBSERVER_PATTERN = 3;
    const DESIGN_LINK_PATTERN = 4;
    const DESIGN_STRATEGY_PATTERN = 5;

    const DESIGN_SINGLETON_PATTERN_DESC = '单例模式';
    const DESIGN_FACTORY_PATTERN_DESC = '工厂模式';
    const DESIGN_OBSERVER_PATTERN_DESC = '观察者模式';
    const DESIGN_LINK_PATTERN_DESC = '链式模式';
    const DESIGN_STRATEGY_PATTERN_DESC = '策略模式';

    public static function consts()
    {
        return [
            static::DESIGN_SINGLETON_PATTERN => static::DESIGN_SINGLETON_PATTERN_DESC,
            static::DESIGN_FACTORY_PATTERN => static::DESIGN_FACTORY_PATTERN_DESC,
            static::DESIGN_OBSERVER_PATTERN => static::DESIGN_OBSERVER_PATTERN_DESC,
            static::DESIGN_LINK_PATTERN => static::DESIGN_LINK_PATTERN_DESC,
            static::DESIGN_STRATEGY_PATTERN => static::DESIGN_STRATEGY_PATTERN_DESC,
        ];
    }

    public function getDesc($item)
    {
        return array_get(static::consts(), $item);
    }
}