<?php

namespace Tests\Unit\App\DataRepositories;

use Tests\TestCase;
use PHPUnit\Framework\DOMTestCase;
use App\DataRepositories\CitiesRepository;
use Illuminate\Http\Request;

class CitiesRepositoryTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     *
     * test get function
     *
     * @return void
     */
    public function testGet()
    {
        $cities = new CitiesRepository();

        $res = $cities->get();

        $this->assertIsArray($res);
    }
}
