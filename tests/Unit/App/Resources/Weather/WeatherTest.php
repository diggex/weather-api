<?php

namespace Tests\Unit\App\Resources\Weather;

use Tests\TestCase;
use PHPUnit\Framework\DOMTestCase;
use App\Resources\Weather\Weather;
use Illuminate\Http\Request;

class WeatherTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     *
     * handler function test
     *
     * @return void
     */
    public function testHandler()
    {
        $owners = new Weather();

        $res = $owners->handler("Dalian");

        $this->assertJson($res);
    }

   /**
     *
     * handler function test
     *
     * @return void
     */
    public function testHandlerNotMatching()
    {
        $owners = new Weather();

        $res = $owners->handler("foobar");

        $this->assertFalse($res);
    }
}
