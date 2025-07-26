<?php

namespace App;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Page;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;

abstract class FormPage extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    protected ?string $heading = '';

    protected string $view = 'filament.pages.form';

    public array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }
}
