<x-app-layout>
<div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Portfolio</h1>
        <form action="{{ route('portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                
               
                @if ($portfolio->profile_picture)
                    <p>Current Profile Picture:</p>
                    <img width="100" src="{{ asset('storage/' . $portfolio->profile_picture) }}" alt="Profile Picture" class="w-24 h-24 rounded-full">
                @endif
                <input type="file" name="profile_picture" class="w-full p-2 border rounded">
                <br><br>
            </div>

            <div>
                <label for="first_name" class="block text-gray-700 font-bold">First Name:</label>
                <input type="text" name="first_name" value="{{ $portfolio->first_name }}" class="w-full p-2 border rounded">
            </div>

            <div>
                <label for="last_name" class="block text-gray-700 font-bold">Last Name:</label>
                <input type="text" name="last_name" value="{{ $portfolio->last_name }}" class="w-full p-2 border rounded">
            </div>

            <div>
                <label for="dob" class="block text-gray-700 font-bold">Date of Birth:</label>
                <input type="date" name="dob" value="{{ $portfolio->dob }}" class="w-full p-2 border rounded">
            </div>

            <div>
                <label for="education" class="block text-gray-700 font-bold">Education:</label>
                <input type="text" name="education" value="{{ $portfolio->education }}" class="w-full p-2 border rounded">
            </div>

           

            <div>
                <label for="skills" class="block text-gray-700 font-bold">Skills:</label>
                <input type="text" name="skills" value="{{ $portfolio->skills }}" class="w-full p-2 border rounded">
            </div>

           

            <div>
                <label for="description" class="block text-gray-700 font-bold">Description:</label>
                <textarea name="description" class="w-full p-2 border rounded">{{ $portfolio->description }}</textarea>
            </div>

           

            <div>
                <button style="background-color: blue; color: white; padding 10px 20px" type="submit" class="px-4 py-2 bg-blue-500 text-white font-bold rounded">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>