<?php

namespace Morenorafael\Wompi;

use Illuminate\Http\Client\PendingRequest;

class WompiManager
{
    protected string $acceptanceToken;

    public function __construct(
        protected PendingRequest $client,
        protected array $config,
    ) {}

    public function generateAcceptanceToken(): self
    {
        $response = $this->client->get("merchants/{$this->config['keys']['public']}");
        $this->acceptanceToken = $response->json('data.presigned_acceptance');

        return $this;
    }

    public function getAcceptanceToken(): string
    {
        return $this->acceptanceToken;
    }
}
