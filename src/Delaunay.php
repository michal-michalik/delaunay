<?php

class Delaunay
{
    public $vertices  = [];
    public $halfEdges = [];
    public $triangles = [];

    public function loadPoints($points)
    {
        // ...
    }

    public function triangulate()
    {
        // ...
    }

    private function legalizeEdge(Vertex $vertex, HalfEdge $halfEdge)
    {
        // ...
    }

    private function inCircumcircle(Vertex &$vertex, Face &$triangle)
    {
        $a = $triangle->getEdge(0)->vertex;
        $b = $triangle->getEdge(1)->vertex;
        $c = $triangle->getEdge(2)->vertex;
        $d = $vertex;

        return ($a->x * $a->x + $a->y * $a->y - $d->x * $d->x - $d->y * $d->y) * (($b->x - $d->x) * ($c->y - $d->y) -
               ($b->y - $d->y) * ($c->x - $d->x)) + ($a->x - $d->x) * (($b->y - $d->y) * ($c->x * $c->x +
               $c->y * $c->y - $d->x * $d->x - $d->y * $d->y) - ($c->y - $d->y) * ($b->x * $b->x + $b->y * $b->y -
               $d->x * $d->x - $d->y * $d->y)) - ($a->y - $d->y) * (($b->x - $d->x) * ($c->x * $c->x + $c->y * $c->y -
               $d->x * $d->x - $d->y * $d->y) - ($c->x - $d->x) * ($b->x * $b->x + $b->y * $b->y - $d->x * $d->x - $d->y * $d->y));
    }
}