<?php

namespace App\Filament\Resources\RegistroMarcaResource\Pages;

use App\Filament\Resources\RegistroMarcaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRegistroMarca extends EditRecord
{
    protected static string $resource = RegistroMarcaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
