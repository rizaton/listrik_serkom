<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;

class TestAdmin extends CIUnitTestCase
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
            ->controller(\App\Controllers\Admin::class)
            ->execute('index');
        $this->assertTrue($result->isOK());
    }

    public function testKelolaTarif()
    {
        $result = $this
            ->controller(\App\Controllers\Admin::class)
            ->execute('kelola_tarif');
        $this->assertTrue($result->isOK());
    }
    public function testKelolaUser()
    {
        $result = $this
            ->controller(\App\Controllers\Admin::class)
            ->execute('kelola_user');
        $this->assertTrue($result->isOK());
    }
    public function testKelolaPelanggan()
    {
        $result = $this
            ->controller(\App\Controllers\Admin::class)
            ->execute('kelola_pelanggan');
        $this->assertTrue($result->isOK());
    }
    public function testKelolaPenggunaan()
    {
        $result = $this
            ->controller(\App\Controllers\Admin::class)
            ->execute('kelola_penggunaan');
        $this->assertTrue($result->isOK());
    }
    public function testKelolaTagihan()
    {
        $result = $this
            ->controller(\App\Controllers\Admin::class)
            ->execute('kelola_tagihan');
        $this->assertTrue($result->isOK());
    }
    public function testKelolaPembayaran()
    {
        $result = $this
            ->controller(\App\Controllers\Admin::class)
            ->execute('kelola_pembayaran');
        $this->assertTrue($result->isOK());
    }
    public function testLaporan()
    {
        $result = $this
            ->controller(\App\Controllers\Admin::class)
            ->execute('laporan');
        $this->assertTrue($result->isOK());
    }
    public function testeditLevel()
    {
        $result = $this
            ->controller(\App\Controllers\Admin::class)
            ->execute('edit_Level');
        $this->assertTrue($result->isOK());
    }
    public function testeditUser()
    {
        $result = $this
            ->controller(\App\Controllers\Admin::class)
            ->execute('edit_User');
        $this->assertTrue($result->isOK());
    }
    public function testeditPelanggan()
    {
        $result = $this
            ->controller(\App\Controllers\Admin::class)
            ->execute('edit_Pelanggan');
        $this->assertTrue($result->isOK());
    }
    public function testeditPenggunaan()
    {
        $result = $this
            ->controller(\App\Controllers\Admin::class)
            ->execute('edit_Penggunaan');
        $this->assertTrue($result->isOK());
    }
    public function testeditTagihan()
    {
        $result = $this
            ->controller(\App\Controllers\Admin::class)
            ->execute('edit_Tagihan');
        $this->assertTrue($result->isOK());
    }
    public function testeditPembayaran()
    {
        $result = $this
            ->controller(\App\Controllers\Admin::class)
            ->execute('edit_Pembayaran');
        $this->assertTrue($result->isOK());
    }
    public function testeditTarif()
    {
        $result = $this
            ->controller(\App\Controllers\Admin::class)
            ->execute('edit_Tarif');
        $this->assertTrue($result->isOK());
    }
    public function testCreateLevel()
    {
        $result = $this
            ->controller(\App\Controllers\Admin::class)
            ->execute('create_level');
        $this->assertTrue($result->isOK());
    }
    public function testCreateUser()
    {
        $result = $this
            ->controller(\App\Controllers\Admin::class)
            ->execute('create_user');
        $this->assertTrue($result->isOK());
    }
    public function testCreatePelanggan()
    {
        $result = $this
            ->controller(\App\Controllers\Admin::class)
            ->execute('create_pelanggan');
        $this->assertTrue($result->isOK());
    }
    public function testCreatePenggunaan()
    {
        $result = $this
            ->controller(\App\Controllers\Admin::class)
            ->execute('create_penggunaan');
        $this->assertTrue($result->isOK());
    }
    public function testCreateTagihan()
    {
        $result = $this
            ->controller(\App\Controllers\Admin::class)
            ->execute('create_tagihan');
        $this->assertTrue($result->isOK());
    }
    public function testCreateTarif()
    {
        $result = $this
            ->controller(\App\Controllers\Admin::class)
            ->execute('create_tarif');
        $this->assertTrue($result->isOK());
    }
}
