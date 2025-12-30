<?php

namespace App\Filament\Resources\Barangs\Pages;

use App\Filament\Resources\Barangs\BarangResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;


class CreateBarang extends CreateRecord
{
    protected static string $resource = BarangResource::class;
    protected static ?string $title =  'Tambah Data Barang';

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Berhasil Di buat ')
            ->icon('heroicon-o-document-text')
            ->body('Data Barang Berhasil Dibuat');
    }
}
