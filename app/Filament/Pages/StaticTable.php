<?php

namespace App\Filament\Pages;

use App\FormPage;
use App\Livewire\DemoComponent;
use Filament\Actions\Action;
use Filament\Infolists\Components\ImageEntry;
use Filament\Pages\Page;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\EmbeddedTable;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Livewire;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Schema;
use Filament\Forms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\HtmlString;
use Livewire\Attributes\Url;

class StaticTable extends Page implements HasTable
{
    use InteractsWithTable;

    protected string $view = 'filament-panels::pages.page';

    protected ?string $heading = '';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('location')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('start')
                    ->label('Date')
                    ->date('d.m.Y')
                    ->sortable(),
            ])

            ->records(function ($search, $sortColumn, $sortDirection) {
                return collect(File::json(resource_path('meetups.json')))
                    ->filter(function ($record) use ($search) {
                        if (blank($search)) {
                            return true;
                        }

                        foreach (Arr::only($record, ['name', 'location']) as $item) {
                            if (stripos($item, $search) !== false) {
                                return true;
                            }
                        }

                        return false;
                    })
                    ->sortBy(
                        $sortColumn,
                        descending: $sortDirection === 'desc'
                    );
            });
    }

    public function content(Schema $schema): Schema
    {
        return $schema->components([
            EmbeddedTable::make()
        ]);
    }
}
