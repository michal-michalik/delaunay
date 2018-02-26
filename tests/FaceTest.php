<?php

require_once __DIR__ . '/../src/Vector3.php';
require_once __DIR__ . '/../src/Vertex.php';
require_once __DIR__ . '/../src/HalfEdge.php';
require_once __DIR__ . '/../src/Face.php';

use PHPUnit\Framework\TestCase;

class FaceTest extends TestCase
{
    public function testHalfEdgeConnection()
    {
        $vertex1 = new Vertex(0, 0, 0);
        $vertex2 = new Vertex(5, 0, 0);
        $vertex3 = new Vertex(0, 5, 0);

        $face = new Face();
        $face->create($vertex1, $vertex2, $vertex3);

        $halfEdge1 = &$face->getEdge(0);
        $halfEdge2 = &$halfEdge1->next->next->next;

        $this->assertSame($halfEdge1, $halfEdge2);

        $halfEdge2 = &$halfEdge1->prev->prev->prev;

        $this->assertSame($halfEdge1, $halfEdge2);
    }

}
