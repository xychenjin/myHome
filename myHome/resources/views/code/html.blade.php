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
    <h1 class="text-center">MySql数据库导出并下载</h1>
@endsection

@section("content")
    <p class="text-warning">
        2016年12月18日新加
    </p>
    <pre class="text-success">
        <span>CREATE TABLE `t_cart_exper` (</span>
        <span>`id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增Id',</span>
          <span>`experience` longtext NOT NULL COMMENT '经验总结',</span>
          <span>`created_at` datetime NOT NULL COMMENT '创建时间',</span>
          <span>`updated_at` datetime NOT NULL COMMENT '更新时间',</span>
          <span>`deleted_at` datetime NOT NULL COMMENT '删除时间',</span>
          <span>PRIMARY KEY (`id`)</span>
        <span>) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='驾照学习经验表'</span>
    </pre>

    <pre class="text-success">
        <span>CREATE TABLE `t_cart_record` (</span>
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
@endsection

