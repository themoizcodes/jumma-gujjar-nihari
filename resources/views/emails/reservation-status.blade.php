<x-mail::message>
@php
$titles = [
    'received' => 'We\'ve Received Your Reservation',
    'confirmed' => 'Your Table is Confirmed!',
    'rejected' => 'Reservation Update',
    'cancelled' => 'Reservation Cancelled',
    'new_booking_admin' => 'New Reservation Received',
];
@endphp

# {{ $titles[$type] ?? 'Reservation Update' }}

@if($type === 'new_booking_admin')
A new table reservation has just been made on the website.
@elseif($type === 'received')
Thank you, **{{ $reservation->name }}**! Your reservation request has been received and is pending confirmation from our team.
@elseif($type === 'confirmed')
Good news, **{{ $reservation->name }}**! Your table has been confirmed. We can't wait to serve you.
@elseif($type === 'rejected')
We're sorry, **{{ $reservation->name }}**, we're unable to accommodate this reservation. Please contact us or try a different time slot.
@elseif($type === 'cancelled')
Hi **{{ $reservation->name }}**, your reservation has been cancelled.
@endif

<x-mail::table>
| | |
|---|---|
| **Booking ID** | #{{ $reservation->booking_ref }} |
| **Name** | {{ $reservation->name }} |
| **Date** | {{ $reservation->reservation_date->format('d F Y') }} |
| **Time** | {{ \Carbon\Carbon::parse($reservation->reservation_time)->format('g:i A') }} |
| **Guests** | {{ $reservation->guests }} |
| **Table** | {{ $reservation->table->table_number ?? '-' }} |
| **Status** | {{ ucfirst($reservation->status) }} |
</x-mail::table>

@if($reservation->special_request)
**Special Request:** {{ $reservation->special_request }}
@endif

**Liaquatabad (B Area), Karachi** · **+92 304 1300535**

Thanks,<br>
**Jumma Gujjar Nihari**
</x-mail::message>
