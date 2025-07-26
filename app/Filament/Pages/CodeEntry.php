<?php

namespace App\Filament\Pages;

use App\FormPage;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Filament\Infolists;
use Phiki\Grammar\Grammar;
use Phiki\Theme\Theme;

class CodeEntry extends FormPage
{
    public function mount(): void
    {

        $this->form
            ->statePath('data')
            ->fill([]);
    }
    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->schema([
                Select::make('theme')
                    ->live()
                    ->options(collect(Theme::cases())
                        ->mapWithKeys(fn ($item) => [$item->value => $item->name])
                    ),

                Infolists\Components\CodeEntry::make('code')
                    ->hiddenLabel()
                    ->grammar(Grammar::Php)
                    ->copyable()
                    ->darkTheme(fn ($get) => $get('theme'))
                    ->state(<<<'PHP'
                        <?php

                        public function form(Schema $schema): Schema
                        {
                            return $schema
                                ->statePath('data')
                                ->schema([
                                    Infolists\Components\CodeEntry::make('code')
                                        ->hiddenLabel()
                                        ->grammar(Grammar::Php)
                            ]);
                        }
                        PHP)
        ]);
    }
}
