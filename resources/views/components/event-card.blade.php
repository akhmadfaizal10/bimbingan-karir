@props([
    'eventId',
    'title',
    'date',
    'location',
    'price',
    'image',
])

@php
    $formattedPrice = $price
        ? 'mulai dari Rp ' . number_format($price, 0, ',', '.')
        : 'Harga tidak tersedia';

    $formattedDate = $date
        ? \Carbon\Carbon::parse($date)->locale('id')->translatedFormat('d F Y, H:i')
        : 'Tanggal tidak tersedia';

    $imageUrl = $image
        ? asset('storage/' . ltrim($image, '/'))
        : asset('storage/events/konser.jpg');
@endphp

<div class="card bg-base-100 h-96 shadow-sm hover:shadow-md transition-shadow duration-300">
    <figure>
        <img src="{{ $imageUrl }}" alt="{{ $title }}" class="w-full h-48 object-cover" />
    </figure>

    <div class="card-body">
        <h2 class="card-title">{{ $title }}</h2>

        <p class="text-sm text-gray-500">{{ $formattedDate }}</p>
        <p class="text-sm">📍 {{ $location }}</p>

        <p class="font-bold text-lg mt-2">{{ $formattedPrice }}</p>

        <a href="{{ route('events.show', $eventId) }}"
           class="btn btn-primary mt-3 w-full">
            Beli Tiket
        </a>
    </div>
</div>
