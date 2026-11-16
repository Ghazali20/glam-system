<?php

namespace App\Filament\Pages;

use App\Models\PaymentSetting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ManagePayments extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationLabel = 'Pengaturan Pembayaran';
    protected static ?string $title = 'Pengaturan Pembayaran';
    protected static ?int $navigationSort = 2;
    protected static string $view = 'filament.pages.manage-payments';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(PaymentSetting::current()->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Rekening Transfer')
                    ->description('Tambahkan satu atau beberapa rekening yang akan ditampilkan kepada pelanggan.')
                    ->schema([
                        Repeater::make('bank_accounts')
                            ->label('Daftar Rekening')
                            ->schema([
                                TextInput::make('bank_name')->label('Nama Bank')->required(),
                                TextInput::make('account_number')->label('Nomor Rekening')->required(),
                                TextInput::make('account_holder')->label('Atas Nama')->required(),
                                Toggle::make('is_active')->label('Aktif')->default(true),
                            ])
                            ->columns(2)
                            ->defaultItems(0)
                            ->addActionLabel('Tambah Rekening')
                            ->columnSpanFull(),
                    ]),
                Section::make('QRIS dan Instruksi')
                    ->schema([
                        FileUpload::make('qris_image_path')
                            ->label('Gambar QRIS')
                            ->image()
                            ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/webp'])
                            ->maxSize(4096)
                            ->disk('public')
                            ->directory('payment')
                            ->visibility('public')
                            ->helperText('Gunakan gambar QRIS resmi. File disimpan di storage publik agar mudah dipindai.'),
                        Textarea::make('payment_instructions')
                            ->label('Instruksi Pembayaran')
                            ->rows(5)
                            ->required(),
                        Toggle::make('is_active')
                            ->label('Aktifkan Pembayaran')
                            ->default(true),
                    ])
                    ->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        PaymentSetting::current()->update($this->form->getState());

        Notification::make()
            ->success()
            ->title('Pengaturan pembayaran disimpan')
            ->body('Rekening dan QRIS aktif akan langsung tampil pada alur booking.')
            ->send();
    }
}
