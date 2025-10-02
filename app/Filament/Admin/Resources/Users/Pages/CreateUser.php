<?php

namespace App\Filament\Admin\Resources\Users\Pages;

use App\Domain\Users\DTO\UserData;
use App\Domain\Users\Services\UserService;
use App\Filament\Admin\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function handleRecordCreation(array $data): \App\Models\User
    {
        /** @var UserService $svc */
        $svc = app(UserService::class);

        return $svc->create(UserData::extract($data));
    }
}
