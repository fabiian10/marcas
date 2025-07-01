<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegistroMarcaResource\Pages;
use App\Filament\Resources\RegistroMarcaResource\RelationManagers;
use App\Models\RegistroMarca;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegistroMarcaResource extends Resource
{
    protected static ?string $model = RegistroMarca::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';
    protected static ?string $recordTitleAttribute = 'marca';
    protected static ?string $navigationLabel = 'Registro de Marcas';
    protected static ?string $navigationGroup = 'Registro';
    protected static ?int $navigationSort = 1;
    protected static ?string $pluralModelLabel = 'Marcas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Registro de tu marca')
                    ->schema([
                        Forms\Components\TextInput::make('marca')
                            ->label('Marca')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\DatePicker::make('fecha_registro')
                            ->label('Fecha de Registro')
                            ->required(),


                        Forms\Components\Select::make('estado')
                            ->label('Estado')
                            ->options([
                                'activo' => 'Activo',
                                'inactivo' => 'Inactivo',
                            ])
                            ->default('activo'),

                        Forms\Components\Textarea::make('observaciones')
                            ->label('Observaciones')
                            ->maxLength(500),
                    ])->columns(2),
            ]);            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('marca')
                    ->label('Marca')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('fecha_registro')
                    ->label('Fecha de Registro')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('usuario_registro')
                    ->label('Usuario de Registro')
                    ->sortable(),

                Tables\Columns\SelectColumn::make('estado')
                    ->label('Estado')
                    ->options([
                        'activo' => 'Activo',
                        'inactivo' => 'Inactivo',
                    ])
                    ->sortable(),

                Tables\Columns\TextColumn::make('observaciones')
                    ->label('Observaciones')
                    ->limit(50),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListRegistroMarcas::route('/'),
            'create' => Pages\CreateRegistroMarca::route('/create'),
            'edit' => Pages\EditRegistroMarca::route('/{record}/edit'),
        ];
    }
}
