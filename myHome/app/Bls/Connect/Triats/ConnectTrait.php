<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/2
 * Time: 18:06
 */
namespace App\Bls\Connect\Triats;
use Form;
use Illuminate\Database\Connection;
use Illuminate\Log\Writer;
use Monolog\Logger;

trait ConnectTrait {

    /**
     * 过滤掉配置中的关键字
     *
     * @param $data
     * @param $cnf
     * @deprecated
     * @return mixed
     */
    public function filter($data, $cnf)
    {
        $configs = config($cnf);

        if (empty($configs)) {
            return $data;
        }

        foreach ($data as $key => $item) {

        }

        return $data;
    }

    public function createCheckbox($dbLists)
    {
        $checkbox = '';
        $config = config('filter.sysDb') ? config('filter.sysDb') : [];

        foreach ($dbLists as $db) {
            if (! in_array($db->Database, $config) ) {
                $checkbox .= '<div class="col-md-2">';
                $checkbox .= Form::checkbox('dbName[]', $db->Database, false, ['class' => 'db_'.$db->Database , 'id'=> $db->Database]);
                $checkbox .= Form::label($db->Database, $db->Database, array('class' => ''));
                $checkbox .= '</div>';
            }
        }
        return $checkbox;
    }

    public function createTableList($db, $tbLists)
    {
        $tableList = '<div class="row form-group" id="tb_'.$db.'">';
        $tableList .= '<label class="col-sm-2 control-label">'. $db .'</label>';
        $tableList .= '<div class="col-sm-10" '. (! $tbLists->isEmpty() ? 'style="padding: 5px;border: 1px gray solid;"' : '').'>';

        if (! $tbLists->isEmpty()) {
            $tableList .= '<div class="col-md-3 " style="width: 100%">';
            $tableList .= Form::button('全选', ['class' => 'checkAll btn' , 'id'=> 'checkAll_'.$db, 'data-check'=> 'false']);
            $tableList .= '</div>';

            foreach ($tbLists as $tb) {
                $tableList .= '<div class="form-inline col-md-4"'. (strlen(($tb->table_name.'('.($tb->tableRowCount ? $tb->tableRowCount : 0 ). ')')) > 30 ? ' style="width:100%"' : '').' >';
                $tableList .= Form::checkbox('tbName[]', $tb->table_name, false, ['class' => 'col-md-1' , 'id'=> $tb->table_name]);
                $tableList .= '<span class="form-inline">' . Form::label($tb->table_name, $tb->table_name  , [ 'title'=>$db. '.'. $tb->table_rows]);
                $tableList .=  ($tb->tableRowCount ?  "(<b style='color: green'>" .$tb->tableRowCount . "</b>)" : "(<b style='color: red'>0</b>)") ;
                $tableList .=  '</span>';
                $tableList .= '</div>';
            }
        } else {
            $tableList .= '<span>&nbsp;</span>';
        }

        $tableList .= '</div>';
        $tableList .= '</div>';
        return $tableList;
    }

    /**
     * 格式化排序语句
     *
     * @param $str
     * @return array
     */
    private function formatOrderBy($str)
    {
        $res = [];
        $explods = explode('_', $str);
        foreach($explods as $key => $item) {
            $res[$key] = explode('-', $item);
        }
        return $res;
    }

    /**
     * 组装查询语句
     * @param Connection $con
     * @param $tb
     * @param $request  请求参数
     * @param int $start 开始于
     * @return string
     */
    private function getQueries(Connection $con, $tb, array $request = [], $start = 0)
    {
        $query = 'SELECT * FROM '. $tb;

        if (isset($request['orderBy']) && ! empty($request['orderBy']) ) {
            $formatOrderBy = $this->formatOrderBy($request['orderBy']);
            $orderBy = '';

            foreach ($formatOrderBy as $item) {
                $exists = count($con->select('describe '. $tb. ' '. $item[0]));
                $temp = $exists ? $item[0] . ' '. $item[1] : '';
                $orderBy .= $orderBy && $temp ? ',' .$temp : $temp;
            }

            $query .= $orderBy ? " order by ". $orderBy : '';
        }

        if (isset($request['limit']) && ! empty($request['limit']) ) {
            $query .= " limit {$start},{$request['limit']}";
        }

        return $query;
    }

    /**
     * 格式化查询表语句
     * @param $db
     * @return string
     */
    private function queryTbByDb($db)
    {
        return sprintf(' SELECT CONCAT("%s",".", TABLE_NAME) as table_name,'
            .' IFNULL(CONCAT(TABLE_NAME,"(",TABLE_ROWS, ")"),CONCAT(TABLE_NAME,"(0)")) as table_rows,'
            .'table_rows AS tableRowCount '
            .' FROM information_schema.tables WHERE table_schema="%s" ORDER BY tableRowCount DESC', $db, $db);
    }

    public function log($msg = '')
    {
        $log = new Writer(new Logger(''));
        $log->useFiles(storage_path(). '/logs/temp/'. date('Y-m-d').'.log');
        $log->error($msg);
    }
}

