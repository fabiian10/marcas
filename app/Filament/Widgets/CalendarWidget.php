<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\Evento;
use App\Filament\Resources\EventoResource;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Filament\Forms;
use Illuminate\Database\Eloquent\Model;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;

class CalendarWidget extends FullCalendarWidget
{
    public Model | string | null $model = Evento::class;

    public static function canView(): bool
    {
        return false; // Evita que se muestre en el dashboard
    }
    
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    protected function viewAction(): ViewAction
    {
        return ViewAction::make();
    }

    public function fetchEvents(array $fetchInfo): array
    {
        return Evento::query()
            ->where('start_at', '>=', $fetchInfo['start'])
            ->where('end_at', '<=', $fetchInfo['end'])
            ->get()
            ->map(
                fn (Evento $event) => [
                    'id' => $event->id,
                    'title' => $event->titulo,
                    'start' => $event->start_at,
                    'end' => $event->end_at,
                ]
            )
            ->all();
    }

    public function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('titulo'),

            Forms\Components\Grid::make()
                ->schema([
                    Forms\Components\DateTimePicker::make('start_at')
                        ->label('Fecha inicio'),

                    Forms\Components\DateTimePicker::make('end_at')
                        ->label('Fecha fin'),
                ]),
        ];
    }
}
