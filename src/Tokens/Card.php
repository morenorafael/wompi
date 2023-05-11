<?php

namespace Morenorafael\Wompi\Tokens;

use Illuminate\Http\Client\PendingRequest;
use Morenorafael\Wompi\Schemas\SchemaCreateCard;
use Morenorafael\Wompi\Schemas\SchemaCreatedCard;

class Card
{
    public function __construct(
        protected PendingRequest $client,
        protected array $config,
    ) {
    }

    public function create(SchemaCreateCard $schema): SchemaCreatedCard
    {
        $response = $this->client->withHeaders([
            'Authorization' => "Bearer {$this->config['keys']['public']}",
            'Content-Type' => 'application/json',
        ])->post('tokens/cards', [
            'number' => $schema->getNumber(),
            'cvc' => $schema->getCvc(),
            'exp_month' => $schema->getExpMonth(),
            'exp_year' => $schema->getExpYear(),
            'card_holder' => $schema->getCardHolder(),
        ]);

        return new SchemaCreatedCard($response->json());
    }
}
