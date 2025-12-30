<?php

namespace App\Filament\Resources\Barangs\Pages;

use App\Filament\Resources\Barangs\BarangResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditBarang extends EditRecord
{   
    protected static string $resource = BarangResource::class;
    protected static ?string $title = 'Edit Data Barang';
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Berhasil Di buat ')
            ->icon('heroicon-o-document-text')
            ->iconColor('warning')
            ->color('warning')
            ->duration(900)
            ->body('Data Barang Berhasil Dibuat');
    }
    

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
