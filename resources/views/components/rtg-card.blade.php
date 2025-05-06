<div class="bg-white rounded-lg shadow-md p-4 mb-4">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-900">{{ $rtg->name_code }}</h3>
            <p class="text-sm text-gray-600">{{ $rtg->user->name }}</p>
        </div>
        <div class="flex items-center space-x-2">
            @foreach($rtg->status as $status)
                <span class="px-2 py-1 text-xs rounded-full 
                    @if($status === 'On Tour') bg-green-100 text-green-800
                    @elseif($status === 'Touting') bg-yellow-100 text-yellow-800
                    @elseif($status === 'Break') bg-blue-100 text-blue-800
                    @elseif($status === 'Off Duty') bg-gray-100 text-gray-800
                    @else bg-purple-100 text-purple-800
                    @endif">
                    {{ $status }}
                </span>
            @endforeach
        </div>
    </div>
    <div class="mt-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600">Location</p>
                <p class="font-medium text-gray-900">{{ $rtg->location ?? 'Not Assigned' }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Tour Count</p>
                <p class="font-medium text-gray-900">{{ $rtg->tour_count }}</p>
            </div>
        </div>
    </div>
</div>
