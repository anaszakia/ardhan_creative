<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LamaranResource\Pages;
use App\Filament\Resources\LamaranResource\RelationManagers;
use App\Models\Lamaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LamaranResource extends Resource
{
    protected static ?string $model = Lamaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_telepon')
                    ->tel()
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('domisili')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('link_porto')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('surat_lamaran')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('posisi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pengalaman')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('cv')
                    ->label('Curriculum Vitae (PDF)')
                    ->required()
                    ->acceptedFileTypes(['application/pdf'])
                    ->directory('lamaran')
                    ->visibility('public')
                    ->downloadable()
                    ->openable(),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_telepon')
                    ->sortable(),
                Tables\Columns\TextColumn::make('domisili')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link_porto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('surat_lamaran')
                    ->searchable(),
                Tables\Columns\TextColumn::make('posisi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pengalaman')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cv')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListLamarans::route('/'),
            'create' => Pages\CreateLamaran::route('/create'),
            'edit' => Pages\EditLamaran::route('/{record}/edit'),
        ];
    }
}
