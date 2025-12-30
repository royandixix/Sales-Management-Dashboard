<?php

namespace App\Filament\Resources\Penjualans\Tables;

use App\Models\Penjualan;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\Action;



class PenjualansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tanggal')
                    ->label('tanggal')
                    ->sortable()
                    ->searchable()
                    ->date('d F Y'),

                TextColumn::make('kode')
                    ->sortable()
                    ->searchable()
                    ->label('kode Faktur'),

                TextColumn::make('jumlah')
                    ->sortable()
                    ->searchable()
                    ->label('jumlah'),

                TextColumn::make('customer.nama_customer')
                    ->sortable()
                    ->searchable()
                    ->label('nama customer'),

                TextColumn::make('status')
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '0' => 'danger',
                        '1' => 'info',
                        
                    })
                    ->formatStateUsing(fn (Penjualan $record): string => $record->status == 0 ? 'Belum Lunas' : 'Lunas')
                    ->label('Status'),

                // TextColumn::make('jenis')
                //     ->sortable()
                //     ->searchable()
                //     ->badge()
                //     ->label('jenis'),
            ])
            ->emptyStateHeading('Tidak ada Data Laporan')
            ->emptyStateDescription('Silahkan Tambahkan Faktur Terlebih Dahulu Agar Data Laporan Tampil')
            ->emptyStateIcon('heroicon-o-presentation-chart-bar')
            ->emptyStateActions([
                Action::make('create')
                        ->label('Buat Faktur')
                        ->url(route('filament.admin.resources.fakturs.create'))
                        ->icon('heroicon-m-plus')
                        ->button(),
            ])
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
