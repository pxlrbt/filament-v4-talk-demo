<?php

namespace App\Filament\Pages;

use App\Filament\Tables\UserTable;
use App\FormPage;
use App\Models\Post;
use Filament\Actions\Concerns\InteractsWithRecord;
use Filament\Schemas\Schema;
use Filament\Forms;
use Filament\Support\RawJs;

class ModalTableSelect extends FormPage
{
    // use InteractsWithRecord;

    public Post $post;

    public function mount(): void
    {
        $this->post = Post::first();

        $this->form->fill(['user_ids' => []]);
    }
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\ModalTableSelect::make('user_ids')
                    ->label('Meetup Attendees')
                    ->multiple()
                    ->relationship('user', 'name')
                    ->tableConfiguration(UserTable::class)

            ])
            ->statePath('data')
            ->model($this->post)
            ;
    }
}
