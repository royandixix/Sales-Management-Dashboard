<?php

namespace App\Filament\Resources\Customers;

use App\Filament\Resources\Customers\Pages\CreateCustomer;
use App\Filament\Resources\Customers\Pages\EditCustomer;
use App\Filament\Resources\Customers\Pages\ListCustomers;
use App\Filament\Resources\Customers\Schemas\CustomerForm;
use App\Filament\Resources\Customers\Tables\CustomersTable;
use App\Models\Customer;
use App\Models\CustomerModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;


class CustomerResource extends Resource
{
    protected static ?string $model = CustomerModel::class;
    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationLabel = 'Customer ';
    protected static string | UnitEnum | null $navigationGroup = 'Kelola';
    protected static ?string $recordTitleAttribute = 'Customer';
    protected static ?string $slug = 'kelola-cumstomer';
    // public static ?string $slug = 'Kelola Customer';

    public static function getModelLabel(): string
    {
        return 'Kelola Customer';
    }

    public static function form(Schema $schema): Schema
    {
        return CustomerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CustomersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCustomers::route('/'),
            'create' => CreateCustomer::route('/create'),
            'edit' => EditCustomer::route('/{record}/edit'),
        ];
    }
}
