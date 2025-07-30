<?php

namespace App\Filament\Pages;

use App\FormPage;
use App\Livewire\DemoComponent;
use Filament\Actions\Action;
use Filament\Infolists\Components\ImageEntry;
use Filament\Pages\Page;
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
use Illuminate\Support\HtmlString;
use Livewire\Attributes\Url;

class PageSchema extends Page implements HasTable
{
    use InteractsWithTable;

    protected string $view = 'filament-panels::pages.page';

    #[Url]
    public string $activeTab = '0';

    protected ?string $heading = '';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()
            ])
            ->records(function ($search) {
                return collect([
                    ['name' => 'Adam'],
                    ['name' => 'Alex'],
                    ['name' => 'Dan'],
                    ['name' => 'Dennis'],
                    ['name' => 'Hassan'],
                    ['name' => 'Kenneth'],
                    ['name' => 'Leandro'],
                    ['name' => 'Ryan'],
                    ['name' => 'Saade'],
                    ['name' => 'Zep'],
                ])
                    ->filter(fn ($record) => stripos($record['name'], $search) !== false)
                    ->take(5);
            });
    }

    public function content(Schema $schema): Schema
    {
        return $schema->components([
            Tabs::make('Tabs')
                ->livewireProperty('activeTab')
                ->vertical()
                ->tabs([
                    Tabs\Tab::make('String')->components([
                        'Some simple content'
                    ]),

                    Tabs\Tab::make('HTML')->components([
                        new HtmlString('<h1 style="font-size: 2rem">An HTML String</h1>'),
                        svg('heroicon-c-rocket-launch', attributes: ['style' => 'width: 100px'])
                    ]),

                    Tabs\Tab::make('View')->components([
                        view('laravel')
                    ]),

                    Tabs\Tab::make('LW')->components([
                        Livewire::make(DemoComponent::class),
                    ]),

                    Tabs\Tab::make('Table')->components([
                        EmbeddedTable::make()
                    ]),

                    Tabs\Tab::make('Form')->components([
                        Form::make()->schema([
                            Forms\Components\TextInput::make('name')
                        ])
                    ]),
            ]),
        ]);
    }
}
