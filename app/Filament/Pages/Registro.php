<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;

class Registro extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationGroup = 'Registro';
    protected static ?int $navigationSort = 2;
    protected static ?string $title = 'Agenda de Eventos';

    protected static string $view = 'filament.pages.registro';

    public $defaultAction = 'onboarding';
    // public function mount(): void
    // {
    //     $this->authorize('viewAny', 'App\\Models\\Marca');
    // }
    public function getTitle(): string | Htmlable
    {
        return __('Agenda de Eventos');
    }

    // public function onboardingAction(): Action
    // {
    //     return Action::make('onboarding')
    //         ->modalHeading('Bienvenido al Registro de Marcas');
    //         //->visible(fn (): bool => ! auth()->user()->isOnBoarded());
    // }       
}
