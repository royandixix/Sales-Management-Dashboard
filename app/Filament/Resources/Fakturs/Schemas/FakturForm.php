<?php

namespace App\Filament\Resources\Fakturs\Schemas;

use App\Models\CustomerModel;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Models\Barang;

class FakturForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('kode_faktur')
                ->columns([
                    'default' => 2,
                    'md' => 2,
                ])
                ->columnSpan([
                    'default' => 2,
                    'md' => 1,
                    'lg' => 1,
                    'xl' => 1,
                ]),

            DatePicker::make('tanggal_faktur')
                ->columnSpan([
                    'default' => 2,
                    'md' => 1,
                    'lg' => 1,
                    'xl' => 1,
                ]),

            // ✅ TAMPIL (readonly, BUKAN disabled)
            TextInput::make('kode_customer')
                ->reactive()
                ->readonly() // 🔥 FIX PENTING
                ->columnSpan([
                    'default' => 2,
                    'md' => 1,
                    'lg' => 1,
                    'xl' => 1,
                ]),

            Select::make('customer_id')
                ->reactive()
                ->relationship('customer', 'nama_customer')
                ->columnSpan([
                    'default' => 2,
                    'md' => 1,
                    'lg' => 1,
                    'xl' => 1,
                ])
                ->afterStateUpdated(function ($state, callable $set) {
                    $customer = CustomerModel::find($state);
                    if ($customer) {
                        // 🔥 HAPUS kode_barang, PAKAI YANG BENAR
                        $set('kode_customer', $customer->kode_customer);
                    }
                })
                ->afterStateHydrated(function ($state, callable $set) {
                    $customer = CustomerModel::find($state);
                    if ($customer) {
                        $set('kode_customer', $customer->kode_customer);
                    }
                }),

            // 🔥 WORKAROUND DISIMPAN (TANPA UBAH STRUKTUR)
            TextInput::make('kode_customer')
                ->hidden()
                ->reactive()
                ->dehydrated(true)
                ->required(),

            Repeater::make('details')
                ->relationship()
                ->schema([
                    Select::make('barang_id')
                        ->columnSpan([
                            'default' => 2,
                            'md' => 1,
                            'lg' => 1,
                            'xl' => 1,
                        ])
                        ->reactive()
                        ->relationship('barang', 'nama_barang')
                        ->afterStateUpdated(function ($state, callable $set) {
                            $barang = Barang::find($state);
                            if ($barang) {
                                $set('harga', $barang->harga_barang);
                                $set('nama_barang', $barang->nama_barang);
                            }
                        }),

                    TextInput::make('nama_barang')
                        ->disabled()
                        ->columnSpan([
                            'default' => 2,
                            'md' => 1,
                            'lg' => 1,
                            'xl' => 1,
         
                        ]),

                    TextInput::make('harga')
                        ->prefix('Rp')
                        ->numeric()
                        ->columnSpan([
                            'default' => 2,
                            'md' => 1,
                            'lg' => 1,
                            'xl' => 1,
                        ]),
                        

                    TextInput::make('qty')
                        ->numeric()
                        ->columnSpan([
                            'default' => 2,
                            'md' => 1,
                            'lg' => 1,
                            'xl' => 1,
                        ])
                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $set, callable $get) {
                            $tampungHarga = $get('harga');
                            $set('hasil_qty', intval($state) * $tampungHarga);
                        }),

                    TextInput::make('hasil_qty')
                        ->numeric()
                        ->columnSpan([
                            'default' => 2,
                            'md' => 1,
                            'lg' => 1,
                            'xl' => 1,
                        ]),

                    TextInput::make('diskon')
                        ->numeric()
                        ->columnSpan([
                            'default' => 2,
                            'md' => 1,
                            'lg' => 1,
                            'xl' => 1,
                        ])
                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $set, callable $get) {
                            $hasilQTY = $get('hasil_qty');
                            $diskon = $hasilQTY * ($state / 100);
                            $hasil = $hasilQTY - $diskon;
                            $set('subtotal', intval($hasil));
                        }),

                    TextInput::make('subtotal')
                        ->numeric()
                        ->columnSpan([
                            'default' => 2,
                            'md' => 1,
                            'lg' => 1,
                            'xl' => 1,
                        ]),
                ])
                ->live()
                ->columnSpanFull(),

            Textarea::make('ket_faktur')
                ->columnSpan([
                    'default' => 2,
                    'md' => 2,
                ]),

            TextInput::make('total')
                ->columnSpan([
                    'default' => 2,
                    'md' => 1,
                ])
                ->placeholder(function ($state, callable $set, callable $get) {
                    $detail = collect($get('details'))->pluck('subtotal')->sum();
                    $set('total', $detail ?? 0);
                }),

            TextInput::make('nominal_charge')
                ->reactive()
                ->columnSpan([
                    'default' => 2,
                    'md' => 1,
                ])
                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                    $total = $get('total');
                    $charge = $total * ($state / 100);
                    $set('charge', $charge);
                    $set('total_final', $total + $charge);
                }),

            TextInput::make('charge')
                ->disabled()
                ->columnSpan([
                    'default' => 2,
                    'md' => 1,
                ]),

            TextInput::make('total_final')
                ->columnSpan([
                    'default' => 2,
                    'md' => 1,
                ]),
        ]);
    }
}
