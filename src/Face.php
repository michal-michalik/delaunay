<?php

class Face
{
    public $halfEdge;

    public function create(&$v0, &$v1, &$v2)
    {
        $he0 = new HalfEdge($v0, $this);
        $he1 = new HalfEdge($v1, $this);
        $he2 = new HalfEdge($v2, $this);

        $he2->prev = &$he1;
        $he0->next = &$he2->prev;

        $he0->prev = &$he2;
        $he1->next = &$he0->prev;

        $he1->prev = &$he0;
        $he2->next = &$he1->prev;

        $this->halfEdge = &$he0;
    }

    public function &getEdge($i = 0)
    {
        $i = $i % 3;

        switch ($i) {
            case 0:
                return $this->halfEdge;
            case 1:
                return $this->halfEdge->next;
            case 2:
                return $this->halfEdge->prev;
        }
    }
}
