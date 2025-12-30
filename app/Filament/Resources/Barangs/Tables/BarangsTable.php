<?php

namespace App\Filament\Resources\Barangs\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BarangsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_barang')
                ->searchable(),
                TextColumn::make('kode_barang'),
                TextColumn::make('harga_barang'),
            ])
            ->emptyStateHeading('Tidak ada Data Barang')
            ->emptyStateDescription('Silahkan Tambahkan Data Barang Terlebih Dahulu')
            ->emptyStateIcon('heroicon-o-packpage')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
