<?php

namespace App\Domain\Users\Repositories;

use App\Domain\Users\Contracts\UserRepositoryInterface;
use App\Domain\Users\DTO\UserData;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function paginate(int $perPage = 15, ?string $search = null): LengthAwarePaginator
    {
        $q = User::query();

        if ($search) {
            $q->where(function ($qq) use ($search) {
                $qq->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }
        return $q->orderByDesc('id')->paginate($perPage);
    }

    public function all(): Collection
    {
        return User::query()->orderBy('name')->get();
    }

    public function create(UserData $data): User
    {
        $payload = $data->toArray();

        if (!empty($payload['password'])) {
            $payload['password'] = Hash::make($payload['password']);
        } else {
            unset($payload['password']);
        }

        return User::create($payload);
    }

    public function update(User $user, UserData $data): User
    {
        $payload = $data->toArray();

        if (!empty($payload['password'])) {
            $payload['password'] = Hash::make($payload['password']);
        } else {
            unset($payload['password']);
        }

        $user->fill($payload);
        $user->save();

        return $user;
    }

    public function delete(User $user): void
    {
        $user->delete();
    }
}
