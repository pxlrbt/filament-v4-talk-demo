<?php

namespace App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks;

use Filament\Actions\Action;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor\RichContentCustomBlock;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class IntroBlock extends RichContentCustomBlock
{
    public static function getId(): string
    {
        return 'test';
    }

    public static function getLabel(): string
    {
        return 'Intro';
    }

    public static function configureEditorAction(Action $action): Action
    {
        return $action
            ->schema([
                TextInput::make('headline'),
                Textarea::make('intro'),
            ]);
    }

    public static function toPreviewHtml(array $config): string
    {
        return <<<HTML
            <h1 style="font-weight: bold; font-size: 1.25rem;">{$config['headline']}</h1>
            <p class="max-width: 60rem">
                {$config['intro']}
            </p>
        HTML;
    }

    public static function toHtml(array $config, array $data): string
    {
        return view('filament.forms.components.rich-editor.rich-content-custom-blocks.test.index', [
            //
        ])->render();
    }
}
