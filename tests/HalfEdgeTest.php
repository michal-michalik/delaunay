<?php

require_once __DIR__ . '/../src/Vector3.php';
require_once __DIR__ . '/../src/Vertex.php';
require_once __DIR__ . '/../src/HalfEdge.php';
require_once __DIR__ . '/../src/Face.php';

use PHPUnit\Framework\TestCase;

class HalfEdgeTest extends TestCase
{
    public function testSettingTwinHalfEdge()
    {
        //    v3   v4
        //     *---*
        //     |\  |
        //     | \ |
        //     |  \|
        //     *---*
        //    v1   v2

        $vertex1 = new Vertex(0, 0, 0);
        $vertex2 = new Vertex(5, 0, 0);
        $vertex3 = new Vertex(0, 5, 0);
        $vertex4 = new Vertex(5, 5, 0);

        $face1 = new Face();
        $face1->create($vertex1, $vertex2, $vertex3);

        $face2 = new Face();
        $face2->create($vertex3, $vertex2, $vertex4);

        $he1 = &$face1->getEdge(0);
        $he2 = &$face2->getEdge(0);

        $he1->setTwin($he2);

        $this->assertSame($he1->twin, $he2);
    }
}
