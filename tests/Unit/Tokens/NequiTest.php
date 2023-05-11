<?php

namespace Morenorafael\Wompi\Tests\Unit\Tokens;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Response;
use Mockery;
use Morenorafael\Wompi\Schemas\SchemaCreatedNequi;
use Morenorafael\Wompi\Schemas\SchemaCreateNequi;
use Morenorafael\Wompi\Tokens\Nequi;
use PHPUnit\Framework\TestCase;

class NequiTest extends TestCase
{
    /** @test */
    public function can_create_a_nequi_token()
    {
        // Given
        $client = Mockery::mock(PendingRequest::class);
        $response = Mockery::mock(Response::class);

        $data = ['phone_number' => '3107654321'];

        $client->shouldReceive('withHeaders')->with([
            'Authorization' => 'Bearer public_key',
            'Content-Type' => 'application/json',
            ])->once()->andReturn($client);

        $client->shouldReceive('post')->with('tokens/nequi', $data)->once()->andReturn($response);

        $response->shouldReceive('json')->once()->andReturn([
            'data' => [
                'id' => 'nequi_test_123_1234abcABC',
                'status' => 'PENDING',
                'phone' => '3107654321',
                'phone_number' => '3107654321',
            ],
        ]);

        // When
        $nequi = new Nequi($client, ['keys' => ['public' => 'public_key']]);

        $result = $nequi->create(new SchemaCreateNequi($data));

        // Then
        $this->assertInstanceOf(SchemaCreatedNequi::class, $result);
        $this->assertEquals('PENDING', $result->getStatus());
        $this->assertEquals('nequi_test_123_1234abcABC', $result->getId());
        $this->assertEquals('3107654321', $result->getPhone());
        $this->assertEquals('3107654321', $result->getPhoneNumber());
        $this->assertTrue($result->isPending());
    }

    /** @test */
    public function can_find_a_nequi_token()
    {
        // Given
        $client = Mockery::mock(PendingRequest::class);
        $response = Mockery::mock(Response::class);

        $client->shouldReceive('withHeaders')->with([
            'Authorization' => 'Bearer public_key',
            'Content-Type' => 'application/json',
            ])->once()->andReturn($client);

        $client->shouldReceive('get')->with('tokens/nequi/nequi_test_123_1234abcABC')
            ->once()->andReturn($response);

        $response->shouldReceive('json')->once()->andReturn([
            'data' => [
                'id' => 'nequi_test_123_1234abcABC',
                'status' => 'APPROVED',
                'phone' => '3107654321',
                'phone_number' => '3107654321',
            ],
        ]);

        // When
        $nequi = new Nequi($client, ['keys' => ['public' => 'public_key']]);

        $result = $nequi->find('nequi_test_123_1234abcABC');

        // Then
        $this->assertInstanceOf(SchemaCreatedNequi::class, $result);
        $this->assertEquals('APPROVED', $result->getStatus());
        $this->assertEquals('nequi_test_123_1234abcABC', $result->getId());
        $this->assertEquals('3107654321', $result->getPhone());
        $this->assertEquals('3107654321', $result->getPhoneNumber());
        $this->assertTrue($result->isApproved());
    }

    public function tearDown(): void
    {
        Mockery::close();
    }
}
