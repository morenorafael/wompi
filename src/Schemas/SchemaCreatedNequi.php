<?php

namespace Morenorafael\Wompi\Schemas;

class SchemaCreatedNequi
{
    protected string $id;

    protected string $status;

    protected string $phone;

    protected string $phoneNumber;

    public function __construct(array $data)
    {
        $this->id = $data['data']['id'];
        $this->status = $data['data']['status'];
        $this->phone = $data['data']['phone'];
        $this->phoneNumber = $data['data']['phone_number'];
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function isPending(): bool
    {
        return $this->status === 'PENDING';
    }

    public function isApproved(): bool
    {
        return $this->status === 'APPROVED';
    }
}
