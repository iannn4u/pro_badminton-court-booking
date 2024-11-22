<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Models\Booking;
use App\Models\Court;
use App\Models\Operational;
use App\Rules\Tanggal;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $timeOperational = Operational::first();

        $openHour = (int) $timeOperational->open;
        $closeHour = (int) $timeOperational->close;

        $time_booking = [];
        for ($hour = $openHour; $hour < $closeHour; $hour++) {
            $timeSlot = ($hour < 10 ? '0' . $hour . '.00' : $hour . '.00') . ' - ' . (($hour + 1) < 10 ? '0' . ($hour + 1) . '.00' : ($hour + 1) . '.00');
            $time_booking[$timeSlot] = $timeSlot;
        }

        $courts = Court::all();
        $newCourts = [];
        foreach ($courts as $court) {
            $newCourts[$court->name_court] = $court->name_court;
        }

        return $form
            ->schema([
                TextInput::make('name_booking')->label(__('Nama Booking'))
                    ->required()
                    ->maxLength(255)->columnSpan(2),

                DatePicker::make('date_booking')->label(__('Tanggal Booking'))
                    ->native(false)
                    ->weekStartsOnMonday()
                    ->required()
                    ->rules(['after_or_equal:today'])
                    ->reactive()
                    ->afterStateUpdated(fn(callable $set) => $set('time_booking', null)),

                Radio::make('court_booking')->label(__('Lapangan Booking'))
                    ->options($newCourts)
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn(callable $set) => $set('time_booking', null)),

                Select::make('time_booking')
                    ->label('Waktu Booking')
                    ->multiple()
                    ->options(function (callable $get) use ($time_booking) {
                        $date = $get('date_booking');
                        $court = $get('court_booking');

                        if (!$date || !$court) {
                            return [];
                        }

                        $today = Carbon::today()->toDateString();
                        $date = Carbon::parse($date)->toDateString();
                        $currentHour = Carbon::now('Asia/Jakarta')->hour;
                        $filteredSlots = $time_booking;

                        if ($date === $today) {
                            $filteredSlots = array_filter($time_booking, function ($slot) use ($currentHour) {
                                [$startTime] = explode(' - ', $slot);
                                $startHour = (int) str_replace('.00', '', $startTime);

                                return $startHour >= $currentHour;
                            });

                        }

                        return Booking::getAvailableSlotsForCourtAndDate($date, $court, $filteredSlots);
                    })
                    ->required()->columnSpan(2),

                Checkbox::make('member')->label(__('Member. Main 1x seminggu selama satu bulan.'))->columnSpan(2),

                // Radio::make('method_payment')->label(__('Metode Pembayaran'))
                //     ->options([
                //         'Cash' => 'Cash',
                //         'Transfer' => 'Transfer',
                //         'DP' => 'DP'
                //     ])
                //     ->required(),

                // Textarea::make('message_booking')->label(__('Pesan'))
                //     ->columnSpanFull(),
            ])
            ->columns(2);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_booking')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_booking')
                    ->searchable()->sortable(),
                Tables\Columns\TextColumn::make('time_booking')
                    ->searchable()->sortable(),
                Tables\Columns\TextColumn::make('court_booking')
                    ->searchable(),
                Tables\Columns\TextColumn::make('method_payment')
                    ->searchable(),
            ])
            ->filters([
                
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
