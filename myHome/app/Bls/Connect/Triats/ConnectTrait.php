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
            $checkbox .= Form::checkbox('dbName', $db->Database, false, ['class' => '', 'id'=> $db->Database]);
            $checkbox .= Form::label($db->Database, $db->Database, array('class' => ''));
            $checkbox .= '</div>';
        }
        return $checkbox;
    }
}

