@props(['type' => 'info', 'message' => null])

@if ($message)
    <div
        class="px-4 py-3 rounded relative mb-4
		@if ($type === 'success') bg-green-100 text-green-800 border border-green-300 @elseif($type === 'error') bg-red-100 text-red-800 border border-red-300 @elseif($type === 'warning') bg-yellow-100 text-yellow-800 border border-yellow-300 @else bg-blue-100 text-blue-800 border border-blue-300 @endif">
        <span class="block sm:inline">{{ $message }}</span>
    </div>
@endif
