<?php

class HalfEdge
{
    public $vertex;
    public $prev;
    public $next;
    public $twin;
    public $face;

    public function __construct(&$vertex, &$face)
    {
        $this->vertex = &$vertex;
        $this->face = &$face;

        $vertex->incidentHalfEdge = &$this;
    }

    public function &head()
    {
        return $this->vertex;
    }

    public function &tail()
    {
        return $this->prev->vertex;
    }

    public function setTwin(&$halfEdge)
    {
        $this->twin = &$halfEdge;
        $halfEdge->twin = &$this;
    }
}