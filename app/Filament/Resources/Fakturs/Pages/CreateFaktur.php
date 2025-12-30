<?php

namespace App\Filament\Resources\Fakturs\Pages;

use App\Filament\Resources\Fakturs\FakturResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\CustomerModel;
use App\Models\Penjualan;

class CreateFaktur extends CreateRecord
{
    protected static string $resource = FakturResource::class;
    protected function afterCreate(): void
    {
        Penjualan::create([
            'kode' => $this->record->kode_faktur,
            'tanggal' => $this->record->tanggal_faktur,
            'jumlah' => $this->record->total,
            'customer_id' => $this->record->customer_id,
            'faktur_id' => $this->record->id,
            'keterangan' => $this->record->kode_faktur,
            'status' => 0,
        ]);
    }



    protected function mutateFormDataBeforeCreate(array $data): array
    {
        
        if (empty($data['kode_faktur'])) {
            $data['kode_faktur'] = 'FKT-' . now()->format('YmdHis');
        }

      
        $details = collect($data['details'] ?? []);
        $total = $details->sum(fn($item) => intval($item['subtotal'] ?? 0));

        $data['total'] = $total;

        $nominalCharge = floatval($data['nominal_charge'] ?? 0);
        $chargeAmount = $total * ($nominalCharge / 100);

        $data['charge'] = $chargeAmount;
        $data['total_final'] = $total + $chargeAmount;

        return $data;
    }
}
