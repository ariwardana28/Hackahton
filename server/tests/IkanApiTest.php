<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IkanApiTest extends TestCase
{
    use MakeIkanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateIkan()
    {
        $ikan = $this->fakeIkanData();
        $this->json('POST', '/api/v1/ikans', $ikan);

        $this->assertApiResponse($ikan);
    }

    /**
     * @test
     */
    public function testReadIkan()
    {
        $ikan = $this->makeIkan();
        $this->json('GET', '/api/v1/ikans/'.$ikan->id);

        $this->assertApiResponse($ikan->toArray());
    }

    /**
     * @test
     */
    public function testUpdateIkan()
    {
        $ikan = $this->makeIkan();
        $editedIkan = $this->fakeIkanData();

        $this->json('PUT', '/api/v1/ikans/'.$ikan->id, $editedIkan);

        $this->assertApiResponse($editedIkan);
    }

    /**
     * @test
     */
    public function testDeleteIkan()
    {
        $ikan = $this->makeIkan();
        $this->json('DELETE', '/api/v1/ikans/'.$ikan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/ikans/'.$ikan->id);

        $this->assertResponseStatus(404);
    }
}
