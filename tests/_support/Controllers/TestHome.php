<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
// use CodeIgniter\Test\ControllerTestTrait;
// use CodeIgniter\Test\FilterTestTrait;
// use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;


class TestHome extends CIUnitTestCase
{
    // use ControllerTestTrait;
    // use FilterTestTrait;
    // use DatabaseTestTrait;
    use FeatureTestTrait;

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }
    public function testIndex()
    {
        $result = $this->call('get', '/');
        $result->assertOK();
        $result->assertSee("Login Pengguna");
    }
}
