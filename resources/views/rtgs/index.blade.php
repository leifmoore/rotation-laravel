@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">RTG Rotation</h1>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($rtgs as $rtg)
                <x-rtg-card :rtg="$rtg" />
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const rtgCards = document.querySelectorAll('.rtg-card');
        
        rtgCards.forEach(card => {
            card.addEventListener('click', function() {
                // Implement RTG card click functionality
            });
        });
    });
</script>
@endpush
