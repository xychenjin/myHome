<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/2
 * Time: 18:06
 */
namespace App\Bls\Connect\Triats;
use Form;

trait ConnectTrait {

    public function createCheckbox($dbLists)
    {
        $checkbox = '';
        foreach ($dbLists as $db) {
            $checkbox .= '<div class="col-md-2">';
            $checkbox .= Form::checkbox('dbName[]', $db->Database, false, ['class' => 'db_'.$db->Database , 'id'=> $db->Database]);
            $checkbox .= Form::label($db->Database, $db->Database, array('class' => ''));
            $checkbox .= '</div>';
        }
        return $checkbox;
    }

    public function createTableList($db, $tbLists)
    {
        $tableList = '<div class="form-group" id="tb_'.$db.'">';
        $tableList .= '<label class="col-sm-1 control-label">'. $db .'</label>';
        $tableList .= '<div class="col-sm-10" '. (! $tbLists->isEmpty() ? 'style="padding: 5px;border: 1px gray solid;"' : '').'>';

        if (! $tbLists->isEmpty()) {
            $tableList .= '<div class="col-md-3 " style="width: 100%">';
            $tableList .= Form::button('全选', ['class' => 'checkAll btn' , 'id'=> 'checkAll_'.$db, 'data-check'=> 'false']);
            $tableList .= '</div>';
        }

        foreach ($tbLists as $tb) {
            $tableList .= '<div class="col-md-3" >';
            $tableList .= Form::checkbox('tbName[]', $db.'.'.$tb->table_name, false, ['class' => 'db_'.$tb->table_name , 'id'=> $db.'.'.$tb->table_name]);
            $tableList .= Form::label($db.'.'.$tb->table_name, $tb->table_name, array('class' => ''));
            $tableList .= '</div>';
        }
        $tableList .= '</div>';
        $tableList .= '</div>';
        return $tableList;
    }
}

