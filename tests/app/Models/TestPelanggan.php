<?php

namespace App\Models;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\Pelanggan;

class TestPelanggan extends CIUnitTestCase
{
    use DatabaseTestTrait;

    private $pelangganModel;

    protected function setUp(): void
    {
        parent::setUp();
        $this->pelangganModel = new Pelanggan();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function testInsertPelanggan()
    {
        $data = [
            'nama_pelanggan' => 'John Doe',
            'alamat' => '123 Main St',
            'id_tarif' => 1,
            'username' => 'johndoe',
            'password' => 'password123',
            'nomor_kwh' => 'KWH123456'
        ];

        $result = $this->pelangganModel->insert($data);
        $this->assertIsNumeric($result, 'Insert should return a numeric ID');
        $this->assertGreaterThan(0, $result, 'Insert should return a positive ID');

        $inserted = $this->pelangganModel->find($result);
        $this->assertNotNull($inserted, 'Inserted pelanggan should be found');
        $this->assertEquals($data['nama_pelanggan'], $inserted['nama_pelanggan'], 'Nama pelanggan should match the inserted data');
    }

    public function testValidationFailsWithEmptyNamaPelanggan()
    {
        $data = [
            'nama_pelanggan' => '',
            'alamat' => '123 Main St',
            'id_tarif' => 1,
            'username' => 'johndoe',
            'password' => 'password123',
            'nomor_kwh' => 'KWH123456'
        ];

        $this->pelangganModel->insert($data);
        $errors = $this->pelangganModel->errors();

        $this->assertArrayHasKey('nama_pelanggan', $errors, 'Validation should fail for empty nama_pelanggan');
        $this->assertEquals('Nama Pelanggan harus diisi', $errors['nama_pelanggan'], 'Validation message should match');
    }

    public function testValidationFailsWithTooLongNamaPelanggan()
    {
        $data = [
            'nama_pelanggan' => str_repeat('a', 101),
            'alamat' => '123 Main St',
            'id_tarif' => 1,
            'username' => 'johndoe',
            'password' => 'password123',
            'nomor_kwh' => 'KWH123456'
        ];

        $this->pelangganModel->insert($data);
        $errors = $this->pelangganModel->errors();

        $this->assertArrayHasKey('nama_pelanggan', $errors, 'Validation should fail for too long nama_pelanggan');
        $this->assertEquals('Nama Pelanggan maksimal 100 karakter', $errors['nama_pelanggan'], 'Validation message should match');
    }

    public function testUpdatePelanggan()
    {
        $data = [
            'nama_pelanggan' => 'Jane Doe',
            'alamat' => '456 Main St',
            'id_tarif' => 2,
            'username' => 'janedoe',
            'password' => 'password456',
            'nomor_kwh' => 'KWH654321'
        ];

        $id = $this->pelangganModel->insert($data);
        $this->assertGreaterThan(0, $id, 'Insert should return a positive ID');

        $updatedData = [
            'nama_pelanggan' => 'Jane Smith'
        ];

        $result = $this->pelangganModel->update($id, $updatedData);
        $this->assertTrue($result, 'Update should return true');

        $updated = $this->pelangganModel->find($id);
        $this->assertEquals($updatedData['nama_pelanggan'], $updated['nama_pelanggan'], 'Updated nama pelanggan should match');
    }

    public function testDeletePelanggan()
    {
        $data = [
            'nama_pelanggan' => 'Alice Doe',
            'alamat' => '789 Main St',
            'id_tarif' => 2,
            'username' => 'alicedoe',
            'password' => 'password789',
            'nomor_kwh' => 'KWH789123'
        ];

        $id = $this->pelangganModel->insert($data);
        $this->assertGreaterThan(0, $id, 'Insert should return a positive ID');

        $result = $this->pelangganModel->delete($id);
        $this->assertTrue($result, 'Delete should return true');

        $deleted = $this->pelangganModel->find($id);
        $this->assertNull($deleted, 'Deleted pelanggan should not be found');
    }
}
