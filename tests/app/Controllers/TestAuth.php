<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;

class TestAuth extends CIUnitTestCase
{
    use ControllerTestTrait;

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function testAuthAdmin()
    {
        $result = $this
            ->controller(\App\Controllers\Auth::class)
            ->execute('auth_admin');
        $this->assertTrue($result->isOK());
    }

    public function testAuthUser()
    {
        $result = $this
            ->controller(\App\Controllers\Auth::class)
            ->execute('auth_user');
        $this->assertTrue($result->isOK());
    }
    public function testLogout()
    {
        $result = $this
            ->controller(\App\Controllers\Auth::class)
            ->execute('logout');
        $this->assertTrue($result->isOK());
    }
}
