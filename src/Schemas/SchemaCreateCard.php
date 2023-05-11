<?php

namespace Morenorafael\Wompi\Schemas;

class SchemaCreateCard
{
    protected string $number;

    protected string $cvc;

    protected string $expMonth;

    protected string $expYear;

    protected string $cardHolder;

    public function __construct(array $data)
    {
        $this->number = $data['number'];
        $this->cvc = $data['cvc'];
        $this->expMonth = $data['exp_month'];
        $this->expYear = $data['exp_year'];
        $this->cardHolder = $data['card_holder'];
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getCvc(): string
    {
        return $this->cvc;
    }

    public function getExpMonth(): string
    {
        return $this->expMonth;
    }

    public function getExpYear(): string
    {
        return $this->expYear;
    }

    public function getCardHolder(): string
    {
        return $this->cardHolder;
    }
}
