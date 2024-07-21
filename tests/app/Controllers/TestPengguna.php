<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;

class TestPengguna extends CIUnitTestCase
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
    public function testPenggunaan()
    {
        $result = $this
            ->controller(\App\Controllers\Pengguna::class)
            ->execute('penggunaan');
        $this->assertTrue($result->isOK());
    }
    public function testTagihan()
    {
        $result = $this
            ->controller(\App\Controllers\Pengguna::class)
            ->execute('tagihan');
        $this->assertTrue($result->isOK());
    }
    public function testRiwayat()
    {
        $result = $this
            ->controller(\App\Controllers\Pengguna::class)
            ->execute('riwayat');
        $this->assertTrue($result->isOK());
    }
    public function testBayarTagihan()
    {
        $result = $this
            ->controller(\App\Controllers\Pengguna::class)
            ->execute('bayar_tagihan');
        $this->assertTrue($result->isOK());
    }
}
