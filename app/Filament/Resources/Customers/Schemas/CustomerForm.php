<?php

namespace App\Filament\Resources\Customers\Schemas;

use Dom\Text;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_customer')
                    ->required()
                    ->label('Nama')
                    ->placeholder('Masukan Nama Customer'),
                TextInput::make('kode_customer')
                    ->required()
                    ->label('Kode')
                    ->placeholder('masukan Kode Barnag'),
                TextInput::make('alamat_customer')
                    ->required()
                    ->label('Alamat')
                    ->placeholder('Masukan Aalamat'),
                TextInput::make('telepon_customer')
                    ->required()
                    ->label('Telepon')
                    ->placeholder('Masukan Kode Telepon'),

            ]);
    }
}
