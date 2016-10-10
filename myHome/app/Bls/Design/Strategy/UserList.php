<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/9
 * Time: 10:30
 */

namespace App\Bls\Design\Strategy;


class UserList
{
    private $_list = array();

    public function __construct( $names )
    {
        if ( $names != null )
        {
            foreach( $names as $name )
            {
                $this->_list []= $name;
            }
        }
    }

    public function add( $name )
    {
        $this->_list []= $name;
    }

    public function find( $filter )
    {
        $recs = array();
        foreach( $this->_list as $user )
        {
            if ( $filter->filter( $user ) )
                $recs []= $user;
        }
        return $recs;
    }
}