<?php

namespace App\Domain\Users\Services;

use App\Domain\Users\Contracts\UserRepositoryInterface;
use App\Domain\Users\DTO\UserData;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

readonly class UserService
{
    public function __construct(
        private UserRepositoryInterface $users
    ) {
    }

    public function list(?string $search = null, int $perPage = 15): LengthAwarePaginator
    {
        return $this->users->paginate($perPage, $search);
    }

    public function create(UserData $data): User
    {
        return $this->users->create($data);
    }

    public function update(User $user, UserData $data): User
    {
        return $this->users->update($user, $data);
    }

    public function delete(User $user): void
    {
        $this->users->delete($user);
    }
}
