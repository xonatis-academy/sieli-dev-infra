<?php

namespace App\Services;

use App\Exceptions\BookingConflictException;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use App\Repositories\BookingRepository;
use DateTimeImmutable;

class BookingService {

    private BookingRepository $bookingRepository;

    public function __construct(BookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function isBookable(DateTimeImmutable $startAt, DateTimeImmutable $endAt): bool {
        return count($this->bookingRepository->findOverlapingBooking($startAt, $endAt)) <= 0;
    }

    public function book(User $user, Room $room, DateTimeImmutable $startAt, DateTimeImmutable $endAt): Booking {
        if (!$this->isBookable($startAt, $endAt)) {
            throw new BookingConflictException("La chambre n'est pas disponible");
        }

        return $this->bookingRepository->create([
            'user_id' => $user->id,
            'room_id' => $room->id,
            'start_at' => $startAt->format('Y-m-d H:i:s'),
            'end_at' => $startAt->format('Y-m-d H:i:s')
        ]);
    }

}
