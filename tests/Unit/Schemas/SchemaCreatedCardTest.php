<?php

namespace Morenorafael\Wompi\Tests\Unit\Schemas;

use Illuminate\Support\Carbon;
use Morenorafael\Wompi\Schemas\SchemaCreatedCard;
use PHPUnit\Framework\TestCase;

class SchemaCreatedCardTest extends TestCase
{
    /** @test */
    public function can_create_schema_to_created_card()
    {
        // Given
        $data = [
            'status' => 'CREATED',
            'data' => [
                'id' => 'tok_test_123_1234abcABC',
                'created_at' => '2023-05-10T22:49:46.580+00:00',
                'brand' => 'VISA',
                'name' => 'VISA-4242',
                'last_four' => '4242',
                'bin' => '424242',
                'exp_year' => '29',
                'exp_month' => '12',
                'card_holder' => 'Pedro Pérez',
                'created_with_cvc' => true,
                'expires_at' => '2023-11-06T22:49:46.000Z',
                'validity_ends_at' => '2023-05-12T22:49:46.580+00:00'
            ],
        ];

        // When
        $schema = new SchemaCreatedCard($data);

        // Then
        $this->assertEquals($data['status'], $schema->getStatus());
        $this->assertEquals($data['data']['id'], $schema->getId());
        $this->assertInstanceOf(Carbon::class, $schema->getCreatedAt());
        $this->assertEquals($data['data']['brand'], $schema->getBrand());
        $this->assertEquals($data['data']['name'], $schema->getName());
        $this->assertEquals($data['data']['last_four'], $schema->getLastFour());
        $this->assertEquals($data['data']['bin'], $schema->getBin());
        $this->assertEquals($data['data']['exp_year'], $schema->getExpYear());
        $this->assertEquals($data['data']['exp_month'], $schema->getExpMonth());
        $this->assertEquals($data['data']['card_holder'], $schema->getCardHolder());
        $this->assertEquals($data['data']['created_with_cvc'], $schema->getCreatedWithCvc());
        $this->assertInstanceOf(Carbon::class, $schema->getExpiresAt());
        $this->assertInstanceOf(Carbon::class, $schema->getValidityEndsAt());
        $this->assertTrue($schema->isCreated());
    }
}
