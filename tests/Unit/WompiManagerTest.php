<?php

namespace Morenorafael\Wompi\Tests\Unit;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Response;
use Mockery;
use Morenorafael\Wompi\WompiManager;
use PHPUnit\Framework\TestCase;

class WompiManagerTest extends TestCase
{
    /** @test */
    public function can_generate_acceptance_token()
    {
        // Given
        $client = Mockery::mock(PendingRequest::class);
        $response = Mockery::mock(Response::class);

        $client->shouldReceive('get')->with('merchants/public_key')->once()->andReturn($response);
        $response->shouldReceive('json')
            ->with('data.presigned_acceptance.acceptance_token')->once()->andReturn('abc123');

        $wompiManager = new WompiManager($client, ['keys' => ['public' => 'public_key']]);

        // When
        $result = $wompiManager->generateAcceptanceToken();

        // Then
        $this->assertInstanceOf(WompiManager::class, $result);
        $this->assertEquals('abc123', $result->getAcceptanceToken());
    }

    public function tearDown(): void
    {
        Mockery::close();
    }
}
