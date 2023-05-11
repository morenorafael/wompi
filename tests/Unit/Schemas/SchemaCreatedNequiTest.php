<?php

namespace Morenorafael\Wompi\Tests\Unit\Schemas;

use Morenorafael\Wompi\Schemas\SchemaCreatedNequi;
use PHPUnit\Framework\TestCase;

class SchemaCreatedNequiTest extends TestCase
{
    /** @test */
    public function can_create_schema_to_created_nequi()
    {
        // Given
        $data = [
            'data' => [
                'id' => 'nequi_test_123_1234abcABC',
                'status' => 'PENDING',
                'phone' => '3107654321',
                'phone_number' => '3107654321',
            ],
        ];

        // When
        $schema = new SchemaCreatedNequi($data);

        // Then
        $this->assertEquals($data['data']['id'], $schema->getId());
        $this->assertEquals($data['data']['status'], $schema->getStatus());
        $this->assertEquals($data['data']['phone'], $schema->getPhone());
        $this->assertEquals($data['data']['phone_number'], $schema->getPhoneNumber());
        $this->assertTrue($schema->isPending());
    }
}
