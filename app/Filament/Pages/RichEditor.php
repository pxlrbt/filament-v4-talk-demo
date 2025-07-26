<?php

namespace App\Filament\Pages;

use App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\IntroBlock;
use App\FormPage;
use Filament\Schemas\Schema;
use Filament\Forms;
use Filament\Support\RawJs;
use Illuminate\Support\HtmlString;

class RichEditor extends FormPage
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->columns(1)
            ->schema([
                Forms\Components\RichEditor::make('content')
                    ->hiddenLabel()
                    ->toolbarButtons([
                        ['bold', 'italic', 'underline'],
                        ['h2', 'h3'],
                        ['bulletList', 'orderedList'],
                        ['link'],
                        ['mergeTags', 'customBlocks'],
                    ])
                    ->customBlocks([
                        IntroBlock::class
                    ])
                    ->mergeTags([
                        'name',
                        'today'
                    ])
                ,

                new HtmlString(<<<HTML
                    <style>
                    .fi-main {
                        max-width: 60rem !important;
                    }
                    </style>
                HTML)
            ]);
    }
}
