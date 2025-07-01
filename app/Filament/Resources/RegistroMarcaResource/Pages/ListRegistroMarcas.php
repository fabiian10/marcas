<?php

namespace App\Filament\Resources\RegistroMarcaResource\Pages;

use App\Filament\Resources\RegistroMarcaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRegistroMarcas extends ListRecords
{
    protected static string $resource = RegistroMarcaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
