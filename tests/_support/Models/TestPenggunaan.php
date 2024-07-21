<?php

namespace App\Models;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\Penggunaan;

class TestPenggunaan extends CIUnitTestCase
{
    use DatabaseTestTrait;

    private $penggunaanModel;

    protected function setUp(): void
    {
        parent::setUp();
        $this->penggunaanModel = new Penggunaan();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function testInsertPenggunaan()
    {
        $data = [
            'id_pelanggan' => 21,
            'bulan' => 7,
            'tahun' => 2024,
            'meter_awal' => 100,
            'meter_akhir' => 150
        ];

        $result = $this->penggunaanModel->insert($data);
        $this->assertIsNumeric($result, 'Insert should return a numeric ID');
        $this->assertGreaterThan(0, $result, 'Insert should return a positive ID');

        $inserted = $this->penggunaanModel->find($result);
        $this->assertNotNull($inserted, 'Inserted penggunaan should be found');
        $this->assertEquals($data['id_pelanggan'], $inserted['id_pelanggan'], 'ID Pelanggan should match the inserted data');
        $this->assertEquals($data['bulan'], $inserted['bulan'], 'Bulan should match the inserted data');
        $this->assertEquals($data['tahun'], $inserted['tahun'], 'Tahun should match the inserted data');
        $this->assertEquals($data['meter_awal'], $inserted['meter_awal'], 'Meter awal should match the inserted data');
        $this->assertEquals($data['meter_akhir'], $inserted['meter_akhir'], 'Meter akhir should match the inserted data');
    }

    public function testValidationFailsWithInvalidData()
    {
        $data = [
            'id_pelanggan' => 'abc',
            'bulan' => 13,
            'tahun' => 2024,
            'meter_awal' => 'test',
            'meter_akhir' => 'test'
        ];

        $this->penggunaanModel->insert($data);
        $errors = $this->penggunaanModel->errors();

        $this->assertArrayHasKey('id_pelanggan', $errors, 'Validation should fail for invalid id_pelanggan');
        $this->assertArrayHasKey('bulan', $errors, 'Validation should fail for invalid bulan');
        $this->assertArrayHasKey('meter_awal', $errors, 'Validation should fail for invalid meter_awal');
        $this->assertArrayHasKey('meter_akhir', $errors, 'Validation should fail for invalid meter_akhir');
    }

    public function testValidationFailsWithEmptyFields()
    {
        $data = [
            'id_pelanggan' => '',
            'bulan' => '',
            'tahun' => '',
            'meter_awal' => '',
            'meter_akhir' => ''
        ];

        $this->penggunaanModel->insert($data);
        $errors = $this->penggunaanModel->errors();

        $this->assertArrayHasKey('id_pelanggan', $errors, 'Validation should fail for empty id_pelanggan');
        $this->assertArrayHasKey('bulan', $errors, 'Validation should fail for empty bulan');
        $this->assertArrayHasKey('tahun', $errors, 'Validation should fail for empty tahun');
        $this->assertArrayHasKey('meter_awal', $errors, 'Validation should fail for empty meter_awal');
        $this->assertArrayHasKey('meter_akhir', $errors, 'Validation should fail for empty meter_akhir');
    }

    public function testUpdatePenggunaan()
    {
        $data = [
            'id_pelanggan' => 21,
            'bulan' => 7,
            'tahun' => 2024,
            'meter_awal' => 100,
            'meter_akhir' => 150
        ];

        $id = $this->penggunaanModel->insert($data);
        $this->assertGreaterThan(0, $id, 'Insert should return a positive ID');

        $updatedData = [
            'meter_awal' => 110,
            'meter_akhir' => 160
        ];

        $result = $this->penggunaanModel->update($id, $updatedData);
        $this->assertTrue($result, 'Update should return true');

        $updated = $this->penggunaanModel->find($id);
        $this->assertEquals($updatedData['meter_awal'], $updated['meter_awal'], 'Updated meter awal should match');
        $this->assertEquals($updatedData['meter_akhir'], $updated['meter_akhir'], 'Updated meter akhir should match');
    }

    public function testDeletePenggunaan()
    {
        $data = [
            'id_pelanggan' => 21,
            'bulan' => 7,
            'tahun' => 2024,
            'meter_awal' => 100,
            'meter_akhir' => 150
        ];

        $id = $this->penggunaanModel->insert($data);
        $this->assertGreaterThan(0, $id, 'Insert should return a positive ID');

        $result = $this->penggunaanModel->delete($id);
        $this->assertTrue($result, 'Delete should return true');

        $deleted = $this->penggunaanModel->find($id);
        $this->assertNull($deleted, 'Deleted penggunaan should not be found');
    }

    public function testTambahTagihan()
    {
        $data = [
            'id_pelanggan' => 21,
            'bulan' => 7,
            'tahun' => 2024,
            'meter_awal' => 100,
            'meter_akhir' => 150
        ];

        $this->penggunaanModel->insert($data);
        $tagihan = $this->db->table('tagihan')->where('id_pelanggan', 1)->get()->getRow();

        $this->assertNotNull($tagihan, 'Tagihan should be created after penggunaan insert');
        $this->assertEquals(50, $tagihan->jumlah_meter, 'Jumlah meter should match the calculated value');
        $this->assertEquals(7, $tagihan->bulan, 'Bulan should match the inserted data');
        $this->assertEquals(2024, $tagihan->tahun, 'Tahun should match the inserted data');

        $pembayaran = $this->db->table('pembayaran')->where('id_pelanggan', 1)->get()->getRow();
        $this->assertNotNull($pembayaran, 'Pembayaran should be created after penggunaan insert');
        $this->assertEquals(7, $pembayaran->bulan_bayar, 'Bulan bayar should match the inserted data');
        $this->assertEquals(1, $pembayaran->id_pelanggan, 'ID Pelanggan should match the inserted data');
    }
}
