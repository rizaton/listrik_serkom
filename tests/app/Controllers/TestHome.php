<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;


class TestHome extends CIUnitTestCase
{
    use ControllerTestTrait;
    use DatabaseTestTrait;

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
        $result = $this
            ->controller(\App\Controllers\Home::class)
            ->execute('index');
        $this->assertTrue($result->isOK());
    }
    public function testLoginAdmin()
    {
        $result = $this
            ->controller(\App\Controllers\Home::class)
            ->execute('login_admin');
        $this->assertTrue($result->isOK());
    }
}
