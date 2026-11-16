<?php

namespace App\Filament\Pages;

use App\Models\HomepageSetting;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ManageHomepage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $navigationLabel = 'Pengaturan Landing Page';

    protected static ?string $title = 'Pengaturan Landing Page';

    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.manage-homepage';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(HomepageSetting::current()->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Koleksi Harian')
                    ->description('Atur teks dan gerakan carousel koleksi yang tampil di landing page.')
                    ->schema([
                        TextInput::make('collection_badge')
                            ->label('Label Section')
                            ->required()
                            ->maxLength(100),

                        TextInput::make('collection_title')
                            ->label('Judul Section')
                            ->required()
                            ->maxLength(150),

                        Textarea::make('collection_description')
                            ->label('Deskripsi Section')
                            ->rows(3)
                            ->columnSpanFull(),

                        Textarea::make('marquee_text')
                            ->label('Teks Animasi Marquee')
                            ->helperText('Teks ini berjalan di atas koleksi. Gunakan • untuk memisahkan kalimat.')
                            ->rows(2)
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('marquee_speed')
                            ->label('Durasi Animasi (detik)')
                            ->numeric()
                            ->minValue(12)
                            ->maxValue(120)
                            ->required()
                            ->helperText('Semakin kecil nilainya, semakin cepat gerakannya.'),

                        Toggle::make('collection_active')
                            ->label('Tampilkan Koleksi Harian')
                            ->default(true),
                    ])
                    ->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        HomepageSetting::current()->update($this->form->getState());

        Notification::make()
            ->success()
            ->title('Pengaturan landing page disimpan')
            ->body('Perubahan akan langsung tampil di halaman publik.')
            ->send();
    }
}
