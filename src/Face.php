<?php

class Face
{
    public $halfEdge;

    public function create(&$v1, &$v2, &$v3)
    {
        $he1 = new HalfEdge($v1, $this);
        $he2 = new HalfEdge($v2, $this);
        $he3 = new HalfEdge($v3, $this);

        $he3->prev = &$he2;
        $he1->next = &$he3->prev;

        $he1->prev = &$he3;
        $he2->next = &$he1->prev;

        $he2->prev = &$he1;
        $he3->next = &$he2->prev;

        $this->halfEdge = &$he1;
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
