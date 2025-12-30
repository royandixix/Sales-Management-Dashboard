<?php

namespace App\Filament\Resources\Customers\Pages;

use App\Filament\Resources\Customers\CustomerResource;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Testing\Fakes\NotificationFake;

class EditCustomer extends EditRecord
{
    protected static string $resource = CustomerResource::class;
    protected static ?string $title = 'Edit Data Customer';
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Berhasil Di buat')
            ->icon('heroicon-o-user')
            ->iconColor('warning')
            ->color('warning')

            ->duration(900)
            ->body('Data Customer Berhasil Di tambahkan ')
        ;
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
