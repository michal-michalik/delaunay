<?php

class Vertex extends Vector3
{
    public $name;
    public $incidentHalfEdge;

    public function __construct($x = 0, $y = 0, $z = 0)
    {
        parent::__construct($x, $y, $z);
    }
}