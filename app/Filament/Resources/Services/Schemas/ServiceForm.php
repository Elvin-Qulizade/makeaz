<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // --- Service fields ---
                TextInput::make('title')
                    ->required()
                    ->reactive()
                    ->live(onBlur:true)
                    ->afterStateUpdated(fn (callable $set, $state) => 
                        $set('slug', Str::slug($state))
                    ),

                TextInput::make('slug')
                    ->required(),

                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),

                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(1),

                // --- Generic Modules (polymorphic) ---
                Repeater::make('modules')
                    ->relationship('modules') // morphMany relation on Service
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                        Section::make()
                            ->columns(2)
                            ->schema([
                                TextInput::make('order')
                                    ->numeric()
                                    ->default(1),
                            
                                Select::make('type')
                                    ->options([
                                        'text' => 'Text',
                                        'image' => 'Image',
                                    ])
                                    ->required()
                                    ->reactive(),
                        ]),

                        Toggle::make('is_active')
                                ->label('Active')
                                ->default(true),
                        
                        // --- Conditional fields ---
                        
                        Textarea::make('text_content')
                            ->label('Text Content')
                            ->visible(fn (callable $get) => $get('type') === 'text'),

                        FileUpload::make('image_path')
                            ->label('Upload Image')
                            ->image()
                            ->disk('public')          
                            ->directory('modules/images')
                            ->visibility('public')
                            ->downloadable()          
                            ->openable()              
                            ->previewable(true)       
                            ->visible(fn (callable $get) => $get('type') === 'image'),
                    ])
                    ->columns(1)
                    ->columnSpanFull()
                    ->defaultItems(0)
                    // ->createItemButtonLabel('Add Module'),
            ]);
    }
}
