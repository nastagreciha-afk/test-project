<?php

namespace App\Domain\Users\DTO;

readonly class UserData
{
    public function __construct(
        public string  $name,
        public string  $email,
        public ?string $password = null,
        public ?bool   $is_active = true,
    ) {
    }

    public static function extract(array $data): self
    {
        return new self(
            name: $data['name'],
            email: $data['email'],
            password: $data['password'] ?? null,
            is_active: !isset($data['is_active']) || (bool) $data['is_active'],
        );
    }

    public function toArray(): array
    {
        return [
            'name'      => $this->name,
            'email'     => $this->email,
            'password'  => $this->password,
            'is_active' => $this->is_active,
        ];
    }
}
