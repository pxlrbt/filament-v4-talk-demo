<?php

namespace App\Filament\Tables;

use App\Models\User;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class UserTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('name')
            ->query(fn (): Builder => User::query())
            ->filters([
                Filter::make('association')->query(fn ($query) => $query->where('association', true))
            ])
            ->columns([
                TextColumn::make('name')
                    ->searchable(),

                TextColumn::make('email')
                    ->searchable(),

                IconColumn::make('association')
                ->boolean()
                //
                // TextColumn::make('email')
                //     ->searchable(),
            ]);
    }
}
