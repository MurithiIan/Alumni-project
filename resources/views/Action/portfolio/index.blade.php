
    <x-app-layout>
        @role('alumni')
        <div class="container mx-auto p-6">
    @forelse ($portfolios as $portfolio)
        <!-- Portfolio Card -->
        <div class="bg-white shadow-md rounded-lg mb-6 overflow-hidden">
            <div class="p-6">
            <div class="image ">
                    @if ($portfolio->profile_picture)
                    <img width="150" src="{{ asset('storage/' . $portfolio->profile_picture) }}" alt="Profile Picture"
                        class="w-32 h-32 float-left rounded-full mx-auto">
                    @else
                    <p>No profile picture uploaded.</p>
                    @endif
                </div>
                <h2 class="text-3xl font-bold text-gray-800">{{ $portfolio->first_name }} {{ $portfolio->last_name }}</h2>
                <p class="text-gray-600 mt-1">{{ $portfolio->education }}</p>
                <div class="mt-4 text-gray-600">
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                        <span>{{ $portfolio->location }}</span>
                    </div>
                    
                </div>
            </div>
            <div class="grid grid-cols-2 gap-6 bg-gray-50 p-6">
                <!-- Documents -->
                
                <!-- Skills & Description -->
                <div>
                    <h3 class="text-xl font-semibold text-gray-800">Skills & Description</h3>
                    <p class="mt-4 text-gray-600">{{ $portfolio->skills }}</p>
                    <p class="mt-2 text-gray-600">{{ $portfolio->description }}</p>
                </div>
            </div>
            <div class="bg-gray-100 p-4 text-right">
                <a href="{{ route('portfolio.edit', $portfolio->id) }}" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">Update</a>
            </div>
            <div class="p-4">
                <button style="background-color:blue; color: white; padding: 10px"><a href="{{ route('portfolio.edit', $portfolio->id) }}">Update Portfolio</a></button>
            </div>
        </div>
        
    @empty
        <div class="text-center p-6">
            <p class="text-gray-600">No portfolios found.</p>
            <a href="{{ route('portfolio.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Create Portfolio</a>
        </div>
    @endforelse
    
</div>

        @endrole
    </x-app-layout>
