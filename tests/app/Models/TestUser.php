<?php

namespace App\Models;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\User;

class TestUser extends CIUnitTestCase
{
    use DatabaseTestTrait;

    private $userModel;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userModel = new User();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function testInsertUser()
    {
        $data = [
            'username' => 'testuser',
            'password' => 'testpassword',
            'nama_admin' => 'Test Admin',
            'id_level' => '1'
        ];

        $result = $this->userModel->insert($data);
        $this->assertIsNumeric($result, 'Insert should return a numeric ID');
        $this->assertGreaterThan(0, $result, 'Insert should return a positive ID');

        $inserted = $this->userModel->find($result);
        $this->assertNotNull($inserted, 'Inserted user should be found');
        $this->assertEquals($data['username'], $inserted['username'], 'Username should match the inserted data');
        $this->assertEquals($data['nama_admin'], $inserted['nama_admin'], 'Nama admin should match the inserted data');
        $this->assertEquals($data['id_level'], $inserted['id_level'], 'ID level should match the inserted data');
    }

    public function testValidationFailsWithEmptyUsername()
    {
        $data = [
            'username' => '',
            'password' => 'testpassword',
            'nama_admin' => 'Test Admin',
            'id_level' => '1'
        ];

        $this->userModel->insert($data);
        $errors = $this->userModel->errors();

        $this->assertArrayHasKey('username', $errors, 'Validation should fail for empty username');
        $this->assertEquals('Username harus diisi', $errors['username'], 'Validation message should match');
    }

    public function testValidationFailsWithTooLongUsername()
    {
        $data = [
            'username' => str_repeat('a', 26),
            'password' => 'testpassword',
            'nama_admin' => 'Test Admin',
            'id_level' => '1'
        ];

        $this->userModel->insert($data);
        $errors = $this->userModel->errors();

        $this->assertArrayHasKey('username', $errors, 'Validation should fail for too long username');
        $this->assertEquals('Username maksimal 25 karakter', $errors['username'], 'Validation message should match');
    }

    public function testUpdateUser()
    {
        $data = [
            'username' => 'testuser',
            'password' => 'testpassword',
            'nama_admin' => 'Test Admin',
            'id_level' => '1'
        ];

        $id = $this->userModel->insert($data);
        $this->assertGreaterThan(0, $id, 'Insert should return a positive ID');

        $updatedData = [
            'username' => 'updateduser',
            'nama_admin' => 'Updated Admin'
        ];

        $result = $this->userModel->update($id, $updatedData);
        $this->assertTrue($result, 'Update should return true');

        $updated = $this->userModel->find($id);
        $this->assertEquals($updatedData['username'], $updated['username'], 'Updated username should match');
        $this->assertEquals($updatedData['nama_admin'], $updated['nama_admin'], 'Updated nama admin should match');
    }

    public function testDeleteUser()
    {
        $data = [
            'username' => 'testuser',
            'password' => 'testpassword',
            'nama_admin' => 'Test Admin',
            'id_level' => '1'
        ];

        $id = $this->userModel->insert($data);
        $this->assertGreaterThan(0, $id, 'Insert should return a positive ID');

        $result = $this->userModel->delete($id);
        $this->assertTrue($result, 'Delete should return true');

        $deleted = $this->userModel->find($id);
        $this->assertNull($deleted, 'Deleted user should not be found');
    }
}
