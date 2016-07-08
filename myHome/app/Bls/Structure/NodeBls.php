<?php

namespace app\Bls\Structure;



class NodeBls
{
    private $node;
    private $next;

    public function __construct($node, $next )
    {

    }

    public function setNode( $node ){
        $this->node = $node;
    }

    public function setNext( $next ){
        $this->next = $next;
    }

    public function getNode(){
        return $this->node;
    }

    public function getNext(){
        return $this->next;
    }
}