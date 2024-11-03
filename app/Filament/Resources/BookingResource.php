<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Models\Booking;
use App\Models\Court;
use App\Models\Operational;
use App\Rules\Tanggal;
use Filament\Forms;
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
                TextInput::make('name_booking')
                    ->required()
                    ->maxLength(255),

                DatePicker::make('date_booking')
                    ->native(false)
                    ->weekStartsOnMonday()
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn(callable $set) => $set('time_booking', null)), // Reset time_booking saat tanggal berubah

                Radio::make('court_booking')
                    ->options($newCourts)
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn(callable $set) => $set('time_booking', null)), // Reset time_booking saat lapangan berubah

                Select::make('time_booking')
                    ->label('Waktu Booking')
                    ->multiple()
                    ->options(function (callable $get) use ($time_booking) {
                        $date = $get('date_booking');
                        $court = $get('court_booking');

                        if (!$date || !$court) {
                            return [];
                        }

                        return Booking::getAvailableSlotsForCourtAndDate($date, $court, $time_booking);
                    })
                    ->required(),

                Radio::make('method_payment')
                    ->options([
                        'Cash' => 'Cash',
                        'Transfer' => 'Transfer',
                        'DP' => 'DP'
                    ])
                    ->required(),

                Textarea::make('message_booking')
                    ->required()
                    ->columnSpanFull(),
            ])
            ->columns(1);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_booking')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_booking')
                    ->searchable(),
                Tables\Columns\TextColumn::make('time_booking')
                    ->searchable(),
                Tables\Columns\TextColumn::make('court_booking')
                    ->searchable(),
                Tables\Columns\TextColumn::make('method_payment')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
