<?php

namespace Morenorafael\Wompi\Tests\Unit\Schemas;

use Morenorafael\Wompi\Schemas\SchemaCreateCard;
use PHPUnit\Framework\TestCase;

class SchemaCreateCardTest extends TestCase
{
    /** @test */
    public function can_create_schema_to_create_card()
    {
        // Given
        $data = [
            'number' => '4242424242424242',
            'cvc' => '789',
            'exp_month' => '12',
            'exp_year' => '29',
            'card_holder' => 'Pedro Pérez'
        ];

        // When
        $schema = new SchemaCreateCard($data);

        // Then
        $this->assertEquals('4242424242424242', $schema->getNumber());
        $this->assertEquals('789', $schema->getCvc());
        $this->assertEquals('12', $schema->getExpMonth());
        $this->assertEquals('29', $schema->getExpYear());
        $this->assertEquals('Pedro Pérez', $schema->getCardHolder());
    }
}
