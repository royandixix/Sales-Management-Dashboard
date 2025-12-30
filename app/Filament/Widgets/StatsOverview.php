<?php

namespace App\Filament\Widgets;

use App\Models\Faktur;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {   
        $countFaktur = Faktur::count();
        return [
            Stat::make('jumlah Faktur', $countFaktur . ' Faktur'),
            Stat::make('Bounce rate', '21%'),
            Stat::make('Average time on page', '3:12'),
        ];
    }
}
