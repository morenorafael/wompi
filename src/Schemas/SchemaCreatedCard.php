<?php

namespace Morenorafael\Wompi\Schemas;

use Illuminate\Support\Carbon;

class SchemaCreatedCard
{
    protected string $status;

    protected string $id;

    protected string $createdAt;

    protected string $brand;

    protected string $name;

    protected string $lastFour;

    protected string $bin;

    protected string $expYear;

    protected string $expMonth;

    protected string $cardHolder;

    protected bool $createdWithCvc;

    protected string $expiresAt;

    protected string $validityEndsAt;

    public function __construct(array $data)
    {
        $this->status = $data['status'];
        $this->id = $data['data']['id'];
        $this->createdAt = $data['data']['created_at'];
        $this->brand = $data['data']['brand'];
        $this->name = $data['data']['name'];
        $this->lastFour = $data['data']['last_four'];
        $this->bin = $data['data']['bin'];
        $this->expYear = $data['data']['exp_year'];
        $this->expMonth = $data['data']['exp_month'];
        $this->cardHolder = $data['data']['card_holder'];
        $this->createdWithCvc = $data['data']['created_with_cvc'];
        $this->expiresAt = $data['data']['expires_at'];
        $this->validityEndsAt = $data['data']['validity_ends_at'];
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getCreatedAt(): Carbon
    {
        return Carbon::make($this->createdAt);
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLastFour(): string
    {
        return $this->lastFour;
    }

    public function getBin(): string
    {
        return $this->bin;
    }

    public function getExpYear(): string
    {
        return $this->expYear;
    }

    public function getExpMonth(): string
    {
        return $this->expMonth;
    }

    public function getCardHolder(): string
    {
        return $this->cardHolder;
    }

    public function getCreatedWithCvc(): bool
    {
        return $this->createdWithCvc;
    }

    public function getExpiresAt(): Carbon
    {
        return Carbon::make($this->expiresAt);
    }

    public function getValidityEndsAt(): Carbon
    {
        return Carbon::make($this->validityEndsAt);
    }

    public function isCreated(): bool
    {
        return $this->status === 'CREATED';
    }
}
