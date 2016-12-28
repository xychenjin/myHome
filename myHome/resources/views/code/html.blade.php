<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/18 0018
 * Time: 下午 9:42
 */
?>
@extends($layouts)

@section('title')
    表结构查看
@endsection

@section('style')
    <link rel="shortcut ico" type="images/x-icon" href="/favicon.ico" />
    <style>

    </style>
@endsection

@section('content-header')
    <h1 >查看表结构</h1>
@endsection

@section("content")
    <p class="text-warning">
        2016年12月18日新加
    </p>
    <pre class="text-success">
        <span>CREATE TABLE `db_first`.`t_cart_exper` (</span>
        <span>`id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增Id',</span>
          <span>`experience` longtext NOT NULL COMMENT '经验总结',</span>
          <span>`created_at` datetime NOT NULL COMMENT '创建时间',</span>
          <span>`updated_at` datetime NOT NULL COMMENT '更新时间',</span>
          <span>`deleted_at` datetime NOT NULL COMMENT '删除时间',</span>
          <span>PRIMARY KEY (`id`)</span>
        <span>) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='驾照学习经验表'</span>
    </pre>

    <pre class="text-success">
        <span>CREATE TABLE `db_first`.`t_cart_record` (</span>
        <span>  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增Id',</span>
        <span>  `day` date NOT NULL COMMENT '学习日期',</span>
        <span>  `start` time NOT NULL COMMENT '开始',</span>
        <span>  `end` time NOT NULL COMMENT '结束',</span>
        <span>  `title` char(50) NOT NULL COMMENT '标题',</span>
        <span>  `content` longtext NOT NULL COMMENT '内容',</span>
        <span>  `coach` char(20) NOT NULL DEFAULT '' COMMENT '教练员',</span>
        <span>  `period` char(50) NOT NULL DEFAULT '' COMMENT '学时介绍',</span>
        <span>  `exper_id` longtext NOT NULL COMMENT '经验心得',</span>
        <span>  `created_at` datetime NOT NULL COMMENT '创建时间',</span>
        <span>  `updated_at` datetime NOT NULL COMMENT '更新时间',</span>
        <span>  `deleted_at` datetime NOT NULL COMMENT '删除时间',</span>
        <span>  PRIMARY KEY (`id`)</span>
        <span>) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='驾照学习表'</span>
    </pre>

    <p class="text-warning">
        2016年12月22日新加
    </p>

    <pre class="text-success">
        <span>CREATE TABLE `db_m2016`.`t_wage` (</span>
        <span>`id` int(10) unsigned NOT NULL AUTO_INCREMENT,</span>
        <span>`sent_account` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '对方打钱账户名',</span>
        <span>`saved_account` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '己方收钱账户名',</span>
        <span>`balance` int(11) NOT NULL DEFAULT '0' COMMENT '余额',</span>
        <span>`received_amount` int(11) NOT NULL DEFAULT '0' COMMENT '收入金额',</span>
        <span>`tax` decimal(5,2) NOT NULL DEFAULT '0.00' COMMENT '支付手续费',</span>
        <span>`received_date` date NOT NULL COMMENT '入账日期',</span>
        <span>`received_at` datetime NOT NULL COMMENT '入账时间',</span>
        <span>`sent_at` datetime NOT NULL COMMENT '转账时间',</span>
        <span>`sent_date` date NOT NULL COMMENT '转账日期',</span>
        <span>`notice` text COLLATE utf8_unicode_ci NOT NULL COMMENT '备注',</span>
        <span>`trans_way` tinyint(4) NOT NULL DEFAULT '0' COMMENT '打钱渠道，方式：0.未知,1.网银转账，2.ATM转账，3.支付宝，4.微信，5.其他',</span>
        <span>`created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',</span>
        <span>`updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',</span>
        <span>`deleted_at` timestamp NULL DEFAULT NULL,</span>
        <span>PRIMARY KEY (`id`)</span>
        <span>) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci</span>
    </pre>

    <p class="text-warning">
        2016年12月28日新加
    </p>

    <pre class="text-success">
        <span>CREATE TABLE `db_m2016`.`t_exercise` (</span>
        <span>`id` int(10) unsigned NOT NULL AUTO_INCREMENT,</span>
        <span>`day` date NOT NULL DEFAULT '0000-00-00' COMMENT '运动日期',</span>
        <span>`period` time NOT NULL DEFAULT '00:00:00' COMMENT '运动时长',</span>
        <span>`weekTh` tinyint(4) NOT NULL DEFAULT '0' COMMENT '星期',</span>
        <span>`desc` text COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',</span>
        <span>`ext` text COLLATE utf8_unicode_ci NOT NULL COMMENT '其他',</span>
        <span>`star` tinyint(4) NOT NULL COMMENT '自我评价：0-10分',</span>
        <span>`created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',</span>
        <span>`updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',</span>
        <span>`deleted_at` timestamp NULL DEFAULT NULL,</span>
        <span>PRIMARY KEY (`id`)</span>
        <span>) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;</span>
    </pre>

    <pre class="text-success">
        <span>CREATE TABLE `db_m2016`.`t_bonus` (</span>
        <span>`id` int(10) unsigned NOT NULL AUTO_INCREMENT,</span>
        <span>`amount` decimal(5,2) NOT NULL DEFAULT '0.00' COMMENT '金额：0.00元',</span>
        <span>`balance` decimal(5,2) NOT NULL DEFAULT '0.00' COMMENT '余额：0.00元',</span>
        <span>`number` tinyint(4) NOT NULL DEFAULT '0' COMMENT '数量/份',</span>
        <span>`name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '红包名称',</span>
        <span>`owner` int(11) NOT NULL DEFAULT '0' COMMENT '发红包者',</span>
        <span>`status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '红包状态：1.有效，2.已抢完，3.已过期，4.已撤回',</span>
        <span>`type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '红包类型：1.普通红包，2.手气红包，3.定向红包。特别说明：1、2类限制上限为200 3类限制20000以内',</span>
        <span>`created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',</span>
        <span>`updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',</span>
        <span>`deleted_at` timestamp NULL DEFAULT NULL,</span>
        <span>PRIMARY KEY (`id`)</span>
        <span>) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci</span>
    </pre>

    <pre class="text-success">
        <span>CREATE TABLE `t_bonus_log` (</span>
        <span>  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,</span>
        <span>  `amount` decimal(5,2) NOT NULL DEFAULT '0.00' COMMENT '金额：0.00元',</span>
        <span>  `balance` decimal(5,2) NOT NULL DEFAULT '0.00' COMMENT '余额：0.00元',</span>
        <span>  `number` tinyint(4) NOT NULL DEFAULT '0' COMMENT '数量/份',</span>
        <span>  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '红包名称',</span>
        <span>  `owner` int(11) NOT NULL DEFAULT '0' COMMENT '发红包者',</span>
        <span>  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '抢到红包者',</span>
        <span>  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '红包类型：1.普通红包，2.手气红包，3.定向红包。特别说明：1、2类限制上限为200 3类限制20000以内',</span>
        <span>  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '备注',</span>
        <span>  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',</span>
        <span>  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',</span>
        <span>  `deleted_at` timestamp NULL DEFAULT NULL,</span>
        <span>  PRIMARY KEY (`id`)</span>
        <span>) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;</span>
    </pre>

@endsection

