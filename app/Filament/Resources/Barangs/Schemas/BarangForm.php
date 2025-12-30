<?php

namespace App\Filament\Resources\Barangs\Schemas;

use Dom\Text;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BarangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_barang')
                ->required()
                ->placeholder('Masukan Nama Barang'),
                TextInput::make('kode_barang')
                ->required()
                ->placeholder('Masukan Kode Barang'),
                TextInput::make('harga_barang')
                ->required()
                ->placeholder('Masukan Harga Barang'),
            ]);
            
    }
}
