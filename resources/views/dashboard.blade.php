<x-app-layout>
@role('super-admin')

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-red-500  p-4 rounded-lg">
            Super Admin {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red-50 overflow-hidden shadow-xl sm:rounded-lg p-6">
               
                <div class="flex gap-6">
                    <div class="max-w-sm hover:bg-red-100 rounded overflow-hidden shadow-md">
                        <a href="/permissions">
                            <div class="px-6 py-4 bg-red-500 text-white">
                                <div class="font-extrabold text-xl mb-3">Permissions</div>
                                <p class="text-red-50 text-base">
                                    Manage user permissions and access control settings for the platform.
                                </p>
                            </div>
                            <div class="px-6 py-3 bg-red-700 text-center">
                                <button class="w-full py-2 text-sm font-bold text-white hover:bg-red-800 transition duration-300">View Permissions</button>
                            </div>
                        </a>
                    </div>

                    <div class="max-w-sm hover:bg-red-100 rounded overflow-hidden shadow-md">
                        <a href="/users">
                            <div class="px-6 py-4 bg-red-500 text-white">
                                <div class="font-extrabold text-xl mb-3">Users</div>
                                <p class="text-red-50 text-base">
                                    View and manage user accounts, including roles and privileges.
                                </p>
                            </div>
                            <div class="px-6 py-3 bg-red-700 text-center">
                                <button class="w-full py-2 text-sm font-bold text-white hover:bg-red-800 transition duration-300">View Users</button>
                            </div>
                        </a>
                    </div>

                    <div class="max-w-sm hover:bg-red-100 rounded overflow-hidden shadow-md">
                        <a href="/jobs">
                            <div class="px-6 py-4 bg-red-500 text-white">
                                <div class="font-extrabold text-xl mb-3">Jobs</div>
                                <p class="text-red-50 text-base">
                                    Explore and manage job postings available for users.
                                </p>
                            </div>
                            <div class="px-6 py-3 bg-red-700 text-center">
                                <button class="w-full py-2 text-sm font-bold text-white hover:bg-red-800 transition duration-300">View Jobs</button>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endrole

    @role('alumni')
    <div class="text-center py-8">
    <h2 class="text-4xl font-extrabold text-gray-800">Available Job Opportunities</h2>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach ($jobs as $job)
        <a href="{{ url('jobs/' . $job->id . '/view') }}"
            class="block border border-gray-300 rounded-xl bg-gradient-to-r from-green-50 to-blue-50 p-6 transform transition-transform duration-500 hover:scale-105">
            <div class="flex flex-col h-full">
                <div class="mb-4">
                    <h3 class="text-3xl font-semibold text-gray-900">{{ $job->job_title }}</h3>
                    <p class="text-lg text-gray-700 mt-2">{{ Str::limit($job->job_description, 100) }}</p>
                </div>
                <div class="mt-auto">
                    <div class="flex items-center justify-between text-lg text-blue-600 font-medium">
                        <span><i class="fas fa-map-marker-alt"></i> {{ $job->job_location }}</span>
                        <span><i class="fas fa-dollar-sign"></i> {{ $job->job_amount }}</span>
                    </div>
                    <div class="text-right mt-4">
                        <span class="text-sm text-gray-600">{{ $job->job_duration }}</span>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
</div>

    @endrole
</x-app-layout>