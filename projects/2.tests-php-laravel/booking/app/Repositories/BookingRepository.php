<?php

namespace App\Repositories;

use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class BookingRepository implements RepositoryInterface {

    public function all()
    {
        return Booking::all();
    }

    public function find($id)
    {
        return Booking::find($id);
    }

    public function create(array $data)
    {
        return Booking::create($data);
    }

    public function update(array $data, $id)
    {
        /** @var Booking $booking */
        $booking = $this->find($id);
        $booking->update($data);
    }

    public function delete($id)
    {
        /** @var Booking $booking */
        $booking = $this->find($id);
        $booking->delete();
    }

    public function findOverlapingBooking(\DateTimeImmutable $startAt, \DateTimeImmutable $endAt)
    {
        $start_at = $startAt->format('Y-m-d H:i:s');
        $end_at = $endAt->format('Y-m-d H:i:s');
        return DB::table('bookings')
            ->whereRaw('(start_at <= ? AND end_at >= ?) OR (end_at >= ? AND start_at <= ?)', [
                $start_at, $start_at, $end_at, $end_at
            ])
            ->get();
    }
}
