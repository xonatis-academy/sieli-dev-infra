<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use App\Services\BookingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    private BookingService $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, Room $room)
    {
        $data = $request->all();
        /** @var User $user */
        $user = Auth::user();
        $booking = $this->bookingService->book($user, $room, new \DateTimeImmutable($data['start_at']), new \DateTimeImmutable($data['end_at']));
        return response()->json($booking, 201);
    }

}
