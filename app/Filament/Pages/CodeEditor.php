<?php

namespace App\Filament\Pages;

use App\FormPage;
use Filament\Schemas\Schema;
use Filament\Forms;
use Filament\Support\RawJs;

class CodeEditor extends FormPage
{
    public function mount(): void
    {
        $this->form->fill([
            'code' => <<<'PHP'
                <?php

                public function form(Schema $schema): Schema
                {
                    return $schema
                        ->statePath('data')
                        ->schema([
                            Forms\Components\CodeEditor::make('code')
                                ->language(Forms\Components\CodeEditor\Enums\Language::Php),
                    ]);
                }
                PHP
        ]);
    }
    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->schema([
                Forms\Components\CodeEditor::make('code')
                    ->hiddenLabel()
                    ->language(Forms\Components\CodeEditor\Enums\Language::Php),
        ]);
    }
}
