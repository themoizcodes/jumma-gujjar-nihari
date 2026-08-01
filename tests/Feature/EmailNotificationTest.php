<?php

namespace Tests\Feature;

use App\Mail\TestMail;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class EmailNotificationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(DatabaseSeeder::class);
    }

    public function test_admin_can_send_a_test_email(): void
    {
        Mail::fake();

        $admin = User::where('email', 'admin@jummagujjarnihari.test')->firstOrFail();

        $this->actingAs($admin)
            ->post(route('admin.test-email'))
            ->assertRedirect();

        Mail::assertSent(TestMail::class);
    }

    public function test_new_booking_notifies_admin_and_customer(): void
    {
        Mail::fake();

        $table = \App\Models\RestaurantTable::firstOrFail();

        $this->post(route('reservation.store'), [
            'table_id' => $table->id,
            'name' => 'Test Guest',
            'phone' => '03001234567',
            'email' => 'guest@example.com',
            'reservation_date' => now()->addDay()->format('Y-m-d'),
            'reservation_time' => '20:00',
            'guests' => 2,
        ])->assertRedirect();

        Mail::assertSent(\App\Mail\ReservationStatusMail::class, 2);
    }
}
