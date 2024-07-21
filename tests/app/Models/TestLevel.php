<?php

namespace App\Models;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\Level;

class TestLevel extends CIUnitTestCase
{
    use DatabaseTestTrait;
    private $levelModel;

    protected function setUp(): void
    {
        parent::setUp();
        $this->levelModel = new Level();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function testInsertLevel()
    {
        $data = [
            'nama_level' => 'Admin'
        ];

        $result = $this->levelModel->insert($data);
        $this->assertIsNumeric($result, 'Insert should return a numeric ID');
        $this->assertGreaterThan(0, $result, 'Insert should return a positive ID');

        $inserted = $this->levelModel->find($result);
        $this->assertNotNull($inserted, 'Inserted level should be found');
        $this->assertEquals($data['nama_level'], $inserted['nama_level'], 'Nama level should match the inserted data');
    }

    public function testValidationFailsWithEmptyNamaLevel()
    {
        $data = [
            'nama_level' => ''
        ];

        $this->levelModel->insert($data);
        $errors = $this->levelModel->errors();

        $this->assertArrayHasKey('nama_level', $errors, 'Validation should fail for empty nama_level');
        $this->assertEquals('Nama level harus diisi', $errors['nama_level'], 'Validation message should match');
    }

    public function testValidationFailsWithTooLongNamaLevel()
    {
        $data = [
            'nama_level' => str_repeat('a', 36)
        ];

        $this->levelModel->insert($data);
        $errors = $this->levelModel->errors();

        $this->assertArrayHasKey('nama_level', $errors, 'Validation should fail for too long nama_level');
        $this->assertEquals('Nama level maksimal 35 karakter', $errors['nama_level'], 'Validation message should match');
    }

    public function testUpdateLevel()
    {
        $data = [
            'nama_level' => 'User'
        ];

        $id = $this->levelModel->insert($data);
        $this->assertGreaterThan(0, $id, 'Insert should return a positive ID');

        $updatedData = [
            'nama_level' => 'Super User'
        ];

        $result = $this->levelModel->update($id, $updatedData);
        $this->assertTrue($result, 'Update should return true');

        $updated = $this->levelModel->find($id);
        $this->assertEquals($updatedData['nama_level'], $updated['nama_level'], 'Updated nama level should match');
    }

    public function testDeleteLevel()
    {
        $data = [
            'nama_level' => 'Guest'
        ];

        $id = $this->levelModel->insert($data);
        $this->assertGreaterThan(0, $id, 'Insert should return a positive ID');

        $result = $this->levelModel->delete($id);
        $this->assertTrue($result, 'Delete should return true');

        $deleted = $this->levelModel->find($id);
        $this->assertNull($deleted, 'Deleted level should not be found');
    }
}
