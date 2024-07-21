<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;

class TestAuthAdmin extends CIUnitTestCase
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
    public function testDeleteLevel()
    {
        $result = $this
            ->controller(\App\Controllers\AuthAdmin::class)
            ->execute('delete_level');
        $this->assertTrue($result->isOK());
    }
    public function testDeleteTarif()
    {
        $result = $this
            ->controller(\App\Controllers\AuthAdmin::class)
            ->execute('delete_tarif');
        $this->assertTrue($result->isOK());
    }
    public function testDeleteTagihan()
    {
        $result = $this
            ->controller(\App\Controllers\AuthAdmin::class)
            ->execute('delete_tagihan');
        $this->assertTrue($result->isOK());
    }
    public function testDeletePenggunaan()
    {
        $result = $this
            ->controller(\App\Controllers\AuthAdmin::class)
            ->execute('delete_penggunaan');
        $this->assertTrue($result->isOK());
    }
    public function testDeletePembayaran()
    {
        $result = $this
            ->controller(\App\Controllers\AuthAdmin::class)
            ->execute('delete_pembayaran');
        $this->assertTrue($result->isOK());
    }
    public function testDeletePelanggan()
    {
        $result = $this
            ->controller(\App\Controllers\AuthAdmin::class)
            ->execute('delete_pelanggan');
        $this->assertTrue($result->isOK());
    }
    public function testDeleteUser()
    {
        $result = $this
            ->controller(\App\Controllers\AuthAdmin::class)
            ->execute('delete_user');
        $this->assertTrue($result->isOK());
    }
    public function testUpdateLevel()
    {
        $result = $this
            ->controller(\App\Controllers\AuthAdmin::class)
            ->execute('update_level');
        $this->assertTrue($result->isOK());
    }
    public function testUpdatePelanggan()
    {
        $result = $this
            ->controller(\App\Controllers\AuthAdmin::class)
            ->execute('update_pelanggan');
        $this->assertTrue($result->isOK());
    }
    public function testUpdateTarif()
    {
        $result = $this
            ->controller(\App\Controllers\AuthAdmin::class)
            ->execute('update_tarif');
        $this->assertTrue($result->isOK());
    }
    public function testUpdateUser()
    {
        $result = $this
            ->controller(\App\Controllers\AuthAdmin::class)
            ->execute('update_user');
        $this->assertTrue($result->isOK());
    }
    public function testUpdateTagihan()
    {
        $result = $this
            ->controller(\App\Controllers\AuthAdmin::class)
            ->execute('update_tagihan');
        $this->assertTrue($result->isOK());
    }
    public function testUpdatePenggunaan()
    {
        $result = $this
            ->controller(\App\Controllers\AuthAdmin::class)
            ->execute('update_penggunaan');
        $this->assertTrue($result->isOK());
    }
    public function testUpdatePembayaran()
    {
        $result = $this
            ->controller(\App\Controllers\AuthAdmin::class)
            ->execute('update_pembayaran');
        $this->assertTrue($result->isOK());
    }
    public function testCreateLevel()
    {
        $result = $this
            ->controller(\App\Controllers\AuthAdmin::class)
            ->execute('create_level');
        $this->assertTrue($result->isOK());
    }
    public function testCreateTarif()
    {
        $result = $this
            ->controller(\App\Controllers\AuthAdmin::class)
            ->execute('create_tarif');
        $this->assertTrue($result->isOK());
    }
    public function testCreateTagihan()
    {
        $result = $this
            ->controller(\App\Controllers\AuthAdmin::class)
            ->execute('create_tagihan');
        $this->assertTrue($result->isOK());
    }
    public function testCreatePenggunaan()
    {
        $result = $this
            ->controller(\App\Controllers\AuthAdmin::class)
            ->execute('create_penggunaan');
        $this->assertTrue($result->isOK());
    }
    public function testCreatePelanggan()
    {
        $result = $this
            ->controller(\App\Controllers\AuthAdmin::class)
            ->execute('create_pelanggan');
        $this->assertTrue($result->isOK());
    }
    public function testCreateUser()
    {
        $result = $this
            ->controller(\App\Controllers\AuthAdmin::class)
            ->execute('create_user');
        $this->assertTrue($result->isOK());
    }
}
