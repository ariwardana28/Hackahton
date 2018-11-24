<?php

use App\Models\Ikan;
use App\Repositories\IkanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IkanRepositoryTest extends TestCase
{
    use MakeIkanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var IkanRepository
     */
    protected $ikanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->ikanRepo = App::make(IkanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateIkan()
    {
        $ikan = $this->fakeIkanData();
        $createdIkan = $this->ikanRepo->create($ikan);
        $createdIkan = $createdIkan->toArray();
        $this->assertArrayHasKey('id', $createdIkan);
        $this->assertNotNull($createdIkan['id'], 'Created Ikan must have id specified');
        $this->assertNotNull(Ikan::find($createdIkan['id']), 'Ikan with given id must be in DB');
        $this->assertModelData($ikan, $createdIkan);
    }

    /**
     * @test read
     */
    public function testReadIkan()
    {
        $ikan = $this->makeIkan();
        $dbIkan = $this->ikanRepo->find($ikan->id);
        $dbIkan = $dbIkan->toArray();
        $this->assertModelData($ikan->toArray(), $dbIkan);
    }

    /**
     * @test update
     */
    public function testUpdateIkan()
    {
        $ikan = $this->makeIkan();
        $fakeIkan = $this->fakeIkanData();
        $updatedIkan = $this->ikanRepo->update($fakeIkan, $ikan->id);
        $this->assertModelData($fakeIkan, $updatedIkan->toArray());
        $dbIkan = $this->ikanRepo->find($ikan->id);
        $this->assertModelData($fakeIkan, $dbIkan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteIkan()
    {
        $ikan = $this->makeIkan();
        $resp = $this->ikanRepo->delete($ikan->id);
        $this->assertTrue($resp);
        $this->assertNull(Ikan::find($ikan->id), 'Ikan should not exist in DB');
    }
}
