<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioResource\Pages;
use App\Models\Portfolio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PortfolioResource extends Resource
{
    protected static ?string $model = Portfolio::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Galeri & Portofolio';

    protected static ?string $modelLabel = 'Portofolio';

    protected static ?string $pluralModelLabel = 'Galeri Portofolio';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Foto Portofolio')
                    ->description('Kelola foto hasil makeup yang akan ditampilkan pada halaman katalog publik.')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul / Look Name')
                            ->placeholder('Contoh: Flawless Wedding Look Padang')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Select::make('category_id')
                            ->label('Kategori Acara')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Forms\Components\FileUpload::make('image_path')
                            ->label('Unggah Foto Hasil Riasan')
                            ->image()
                            ->directory('portfolio')
                            ->visibility('public')
                            ->required()
                            ->helperText('Format yang disarankan: JPG, PNG, atau WebP (Rasio 3:4 atau tegak)')
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi Singkat (Opsional)')
                            ->placeholder('Detail tema riasan, warna gaun, atau aksesoris...')
                            ->rows(3)
                            ->columnSpanFull(),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Tampilkan di Katalog Publik')
                            ->default(true),

                        Forms\Components\TextInput::make('order')
                            ->label('Urutan Prioritas')
                            ->numeric()
                            ->default(0)
                            ->helperText('Nilai lebih kecil akan tampil lebih awal'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Foto')
                    ->square()
                    ->getStateUsing(fn ($record) => $record->image_url),

                Tables\Columns\TextColumn::make('title')
                    ->label('Nama Look')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge()
                    ->color('rose')
                    ->sortable(),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Tampil di Web'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Unggah')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name'),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Hanya Tampil di Web'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPortfolios::route('/'),
            'create' => Pages\CreatePortfolio::route('/create'),
            'edit' => Pages\EditPortfolio::route('/{record}/edit'),
        ];
    }
}
