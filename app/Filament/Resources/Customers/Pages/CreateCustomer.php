<?php

namespace App\Filament\Resources\Customers\Pages;

use App\Filament\Resources\Customers\CustomerResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;
    protected static ?string $title = 'Tambah Data Customer';
    protected function getCreatedNotification(): ?Notification
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
}
