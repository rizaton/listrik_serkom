<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;

class TestAuthPengguna extends CIUnitTestCase
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

    public function testIndex()
    {
        $result = $this
            ->controller(\App\Controllers\AuthPengguna::class)
            ->execute('index');
        $this->assertTrue($result->isOK());
    }
    public function testBayarTagihan()
    {
        $result = $this
            ->controller(\App\Controllers\AuthPengguna::class)
            ->execute('bayar_tagihan');
        $this->assertTrue($result->isOK());
    }
}
