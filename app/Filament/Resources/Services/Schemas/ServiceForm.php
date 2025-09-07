<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // --- Service fields ---
                TextInput::make('title')
                    ->required(),

                TextInput::make('slug')
                    ->required(),

                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),

                TextInput::make('order')
                    ->required()
                    ->numeric(),

                // --- Generic Modules (polymorphic) ---
                Repeater::make('modules')
                    ->relationship('modules') // morphMany relation on Service
                    ->schema([
                        TextInput::make('name')
                            ->required(),

                        TextInput::make('order')
                            ->numeric()
                            ->default(0),

                        Select::make('type')
                            ->options([
                                'text' => 'Text',
                                'image' => 'Image',
                            ])
                            ->required()
                            ->reactive(), // make reactive so other fields depend on it

                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),

                        // --- Conditional fields ---
                        Textarea::make('text_content')
                            ->label('Text Content')
                            ->visible(fn(callable $get) => $get('type') === 'text'),

                        FileUpload::make('image_path')
                            ->label('Upload Image')
                            ->image()
                            ->disk('public')          // must match where it was uploaded
                            ->directory('modules/images')
                            ->visibility('public')
                            ->downloadable()          // allows download
                            ->openable()              // allows open in new tab
                            ->previewable(true)       // shows thumbnail in edit view
                            ->visible(fn(callable $get) => $get('type') === 'image'),
                    ])
                    ->columns(2)
                    ->createItemButtonLabel('Add Module'),
            ]);
    }
}
