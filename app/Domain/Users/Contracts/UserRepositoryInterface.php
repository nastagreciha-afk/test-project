<?php

namespace App\Domain\Users\Contracts;

use App\Domain\Users\DTO\UserData;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function paginate(int $perPage = 15, ?string $search = null): LengthAwarePaginator;

    public function all(): Collection;

    public function create(UserData $data): User;

    public function update(User $user, UserData $data): User;

    public function delete(User $user): void;
}
