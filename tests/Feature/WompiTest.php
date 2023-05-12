<?php

namespace Morenorafael\Wompi\Tests\Feature;

use Morenorafael\Wompi\Facades\Wompi;
use Morenorafael\Wompi\Tests\TestCase;
use Morenorafael\Wompi\WompiManager;

class WompiTest extends TestCase
{
    /** @test */
    public function can_generate_acceptance_token()
    {
        // Given

        // When
        $result = Wompi::generateAcceptanceToken();

        // Then
        $this->assertInstanceOf(WompiManager::class, $result);
    }
}
