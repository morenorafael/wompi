<?php

namespace Morenorafael\Wompi\Tests\Unit\Schemas;

use Morenorafael\Wompi\Schemas\SchemaCreateNequi;
use PHPUnit\Framework\TestCase;

class SchemaCreateNequiTest extends TestCase
{
    /** @test */
    public function can_create_schema_to_create_nequi()
    {
        // Given
        $data = [
            'phone_number' => '3107654321',
        ];

        // When
        $schema = new SchemaCreateNequi($data);

        // Then
        $this->assertEquals('3107654321', $schema->getPhoneNumber());
    }
}
