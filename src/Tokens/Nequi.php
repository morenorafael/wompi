<?php

namespace Morenorafael\Wompi\Tokens;

use Illuminate\Http\Client\PendingRequest;
use Morenorafael\Wompi\Schemas\SchemaCreatedNequi;
use Morenorafael\Wompi\Schemas\SchemaCreateNequi;

class Nequi
{
    public function __construct(
        protected PendingRequest $client,
        protected array $config,
    ) {}

    public function create(SchemaCreateNequi $schema): SchemaCreatedNequi
    {
        $response = $this->client->withHeaders([
            'Authorization' => "Bearer {$this->config['keys']['public']}",
            'Content-Type' => 'application/json',
        ])->post('tokens/nequi', [
            'phone_number' => $schema->getPhoneNumber(),
        ]);

        return new SchemaCreatedNequi($response->json());
    }

    public function find(string $id): SchemaCreatedNequi
    {
        $response = $this->client->withHeaders([
            'Authorization' => "Bearer {$this->config['keys']['public']}",
            'Content-Type' => 'application/json',
        ])->get("tokens/nequi/{$id}");

        return new SchemaCreatedNequi($response->json());
    }
}
