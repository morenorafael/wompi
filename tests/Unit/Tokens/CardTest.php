<?php

namespace Morenorafael\Wompi\Tests\Unit\Tokens;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Mockery;
use Morenorafael\Wompi\Schemas\SchemaCreateCard;
use Morenorafael\Wompi\Schemas\SchemaCreatedCard;
use Morenorafael\Wompi\Tokens\Card;
use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{
    /** @test */
    public function can_create_a_card_token()
    {
        // Given
        $client = Mockery::mock(PendingRequest::class);
        $response = Mockery::mock(Response::class);

        $data = [
            'number' => '4242424242424242',
            'cvc' => '789',
            'exp_month' => '12',
            'exp_year' => '29',
            'card_holder' => 'Pedro Pérez'
        ];

        $client->shouldReceive('withHeaders')->with([
            'Authorization' => 'Bearer public_key',
            'Content-Type' => 'application/json',
            ])->once()->andReturn($client);

        $client->shouldReceive('post')->with('tokens/cards', $data)->once()->andReturn($response);

        $response->shouldReceive('json')->once()->andReturn([
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
        ]);

        // When
        $card = new Card($client, ['keys' => ['public' => 'public_key']]);

        $result = $card->create(new SchemaCreateCard($data));

        // Then
        $this->assertInstanceOf(SchemaCreatedCard::class, $result);
        $this->assertEquals('CREATED', $result->getStatus());
        $this->assertEquals('tok_test_123_1234abcABC', $result->getId());
        $this->assertInstanceOf(Carbon::class, $result->getCreatedAt());
        $this->assertEquals('VISA', $result->getBrand());
        $this->assertEquals('VISA-4242', $result->getName());
        $this->assertEquals('4242', $result->getLastFour());
        $this->assertEquals('424242', $result->getBin());
        $this->assertEquals('29', $result->getExpYear());
        $this->assertEquals('12', $result->getExpMonth());
        $this->assertEquals('Pedro Pérez', $result->getCardHolder());
        $this->assertTrue($result->getCreatedWithCvc());
        $this->assertInstanceOf(Carbon::class, $result->getExpiresAt());
        $this->assertInstanceOf(Carbon::class, $result->getValidityEndsAt());
        $this->assertTrue($result->isCreated());
    }

    public function tearDown(): void
    {
        Mockery::close();
    }
}
