<?php

namespace Tests\Unit;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\User;
use App\Repositories\BookingRepository;
use App\Services\BookingService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class BookingServiceTest extends TestCase
{
    use RefreshDatabase;

    private BookingService $bookingService;

    protected function setUp(): void
    {
        parent::setUp();
        $repositoy = Mockery::mock(BookingRepository::class, function (MockInterface $mock) {
            $mock->shouldReceive('findOverlapingBooking')->andReturn([]);
            $mock->shouldReceive('create')->andReturn(new Booking());
        });
        $this->bookingService = new BookingService($repositoy);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_book_return_success()
    {
        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => 'useruser'
        ]);
        $hotel = Hotel::create([
            'name' => 'test',
            'address' => 'test'
        ]);
        $room = Room::create([
            'number' => '493',
            'capacity' => 10,
            'type' => 'suite',
            'hotel_id' => $hotel->id
        ]);
        $booking = $this->bookingService->book($user, $room, new \DateTimeImmutable('2022-12-29'), new \DateTimeImmutable('2022-12-30'));
        $this->assertNotNull($booking);
    }
}
