<x-app-layout>
<div class="flex justify-center text-center pt-10 gap-20">
        <div class="flex-none">
            <h1 class="text-2xl font-bold">Create Roles</h1>
        </div>
        <div class="flex-initial w-60">
            <h1>
                <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                    <a href="/roles">Back</a>
                </button>
            </h1>
        </div>
    </div>

    <div class="form mt-10 max-w-lg mx-auto bg-white p-8 shadow-lg rounded-lg">
        
        <form action="{{ url('roles') }}" method="POST" class="space-y-6">
        @csrf
            <div>
                <label class="block text-gray-700 font-semibold mb-2" for="name">
                    Role Name 
                </label>
                <input 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    placeholder="Name" 
                    type="text" 
                    name="name" 
                    id="name"
                >
            </div>

            <div class="flex justify-end">
                <button 
                    type="submit" 
                    class="bg-green-500 text-black py-2 px-4 rounded hover:bg-green-600"
                >
                    Save
                </button>
            </div>
        </form>
    </div>
</x-app-layout>