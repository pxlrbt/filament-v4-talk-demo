<?php

namespace App\Filament\Pages;

use App\FormPage;
use Filament\Schemas\Schema;
use Filament\Forms;
use Illuminate\Support\HtmlString;

class PartiallyRenderAfterStateUpdated extends FormPage
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->hint('Rendered: '. now()->toTimeString())
                    ->default('mail@example.org')
                    ->autocomplete('off'),

                Forms\Components\TextInput::make('password')
                    ->hint('Rendered: '. now()->toTimeString())
                    ->live()
                    ->password()
                    ->autocomplete('off')
                    ->partiallyRenderAfterStateUpdated()
                    ->belowContent(
                        fn ($state) => match (true) {
                            strlen($state) > 25 => '😡 ARRGHHHH!',
                            strlen($state) > 20 => '😠 OKAY STOP IT!',
                            strlen($state) > 12 => '🎉 Awesome!',
                            strlen($state) > 8 => '🙂 Yeah okay',
                            strlen($state) > 4 => '😒 Try harder.',
                            strlen($state) > 0 => '😢 This sucks!',
                            default => ''
                        }
                    ),
        ]);
    }
}
