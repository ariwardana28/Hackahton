<?php

use Faker\Factory as Faker;
use App\Models\Ikan;
use App\Repositories\IkanRepository;

trait MakeIkanTrait
{
    /**
     * Create fake instance of Ikan and save it in database
     *
     * @param array $ikanFields
     * @return Ikan
     */
    public function makeIkan($ikanFields = [])
    {
        /** @var IkanRepository $ikanRepo */
        $ikanRepo = App::make(IkanRepository::class);
        $theme = $this->fakeIkanData($ikanFields);
        return $ikanRepo->create($theme);
    }

    /**
     * Get fake instance of Ikan
     *
     * @param array $ikanFields
     * @return Ikan
     */
    public function fakeIkan($ikanFields = [])
    {
        return new Ikan($this->fakeIkanData($ikanFields));
    }

    /**
     * Get fake data of Ikan
     *
     * @param array $postFields
     * @return array
     */
    public function fakeIkanData($ikanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'gambar' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $ikanFields);
    }
}
