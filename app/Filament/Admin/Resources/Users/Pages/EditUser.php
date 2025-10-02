<?php

namespace App\Filament\Admin\Resources\Users\Pages;

use App\Domain\Users\DTO\UserData;
use App\Domain\Users\Services\UserService;
use App\Filament\Admin\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function handleRecordUpdate($record, array $data): \App\Models\User
    {
        /** @var UserService $svc */
        $svc = app(UserService::class);

        return $svc->update($record, UserData::extract($data));
    }
    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
