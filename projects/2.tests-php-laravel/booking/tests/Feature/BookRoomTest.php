<?php

namespace Tests\Feature;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\User;
use Tests\TestCase;

class BookRoomTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_book_room_return_200()
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

        $response = $this->actingAs($user)->post('/api/rooms/' . $room->id . '/bookings', [
            'start_at' => '2022-12-29',
            'end_at' => '2022-12-30'
        ]);


        $response->assertStatus(201);
    }
}
