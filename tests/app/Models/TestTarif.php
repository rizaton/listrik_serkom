<?php

namespace App\Models;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\Tarif;

class TestTarif extends CIUnitTestCase
{
    use DatabaseTestTrait;

    private $tarifModel;

    protected function setUp(): void
    {
        parent::setUp();
        $this->tarifModel = new Tarif();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function testInsertTarif()
    {
        $data = [
            'daya' => 450,
            'tarifperkwh' => 1000
        ];

        $result = $this->tarifModel->insert($data);
        $this->assertIsNumeric($result, 'Insert should return a numeric ID');
        $this->assertGreaterThan(0, $result, 'Insert should return a positive ID');

        $inserted = $this->tarifModel->find($result);
        $this->assertNotNull($inserted, 'Inserted tarif should be found');
        $this->assertEquals($data['daya'], $inserted['daya'], 'Daya should match the inserted data');
        $this->assertEquals($data['tarifperkwh'], $inserted['tarifperkwh'], 'Tarif per kWh should match the inserted data');
    }

    public function testValidationFailsWithEmptyDaya()
    {
        $data = [
            'daya' => '',
            'tarifperkwh' => 1000
        ];

        $this->tarifModel->insert($data);
        $errors = $this->tarifModel->errors();

        $this->assertArrayHasKey('daya', $errors, 'Validation should fail for empty daya');
        $this->assertEquals('Daya harus diisi', $errors['daya'], 'Validation message should match');
    }

    public function testValidationFailsWithNonNumericDaya()
    {
        $data = [
            'daya' => 'notanumber',
            'tarifperkwh' => 1000
        ];

        $this->tarifModel->insert($data);
        $errors = $this->tarifModel->errors();

        $this->assertArrayHasKey('daya', $errors, 'Validation should fail for non-numeric daya');
        $this->assertEquals('Daya harus berupa angka', $errors['daya'], 'Validation message should match');
    }

    public function testValidationFailsWithTooLongDaya()
    {
        $data = [
            'daya' => str_repeat('1', 16), // 16 characters, 1 more than the max length
            'tarifperkwh' => 1000
        ];

        $this->tarifModel->insert($data);
        $errors = $this->tarifModel->errors();

        $this->assertArrayHasKey('daya', $errors, 'Validation should fail for too long daya');
        $this->assertEquals('Daya maksimal 15 karakter', $errors['daya'], 'Validation message should match');
    }

    public function testUpdateTarif()
    {
        $data = [
            'daya' => 900,
            'tarifperkwh' => 1500
        ];

        $id = $this->tarifModel->insert($data);
        $this->assertGreaterThan(0, $id, 'Insert should return a positive ID');

        $updatedData = [
            'daya' => 1300,
            'tarifperkwh' => 2000
        ];

        $result = $this->tarifModel->update($id, $updatedData);
        $this->assertTrue($result, 'Update should return true');

        $updated = $this->tarifModel->find($id);
        $this->assertEquals($updatedData['daya'], $updated['daya'], 'Updated daya should match');
        $this->assertEquals($updatedData['tarifperkwh'], $updated['tarifperkwh'], 'Updated tarif per kWh should match');
    }

    public function testDeleteTarif()
    {
        $data = [
            'daya' => 450,
            'tarifperkwh' => 1000
        ];

        $id = $this->tarifModel->insert($data);
        $this->assertGreaterThan(0, $id, 'Insert should return a positive ID');

        $result = $this->tarifModel->delete($id);
        $this->assertTrue($result, 'Delete should return true');

        $deleted = $this->tarifModel->find($id);
        $this->assertNull($deleted, 'Deleted tarif should not be found');
    }
}
