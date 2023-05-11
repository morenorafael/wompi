<?php

namespace Morenorafael\Wompi\Schemas;

class SchemaCreateNequi
{
    protected string $phoneNumber;

    public function __construct(array $data)
    {
        $this->phoneNumber = $data['phone_number'];
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }
}
