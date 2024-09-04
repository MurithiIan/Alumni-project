<x-app-layout>
    @if(session('status'))
    <script>
        Swal.fire({
            title: "Success!",
            text: "{{ session('status') }}",
            icon: "success",
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    </script>
    @endif

    <!-- Link to Google Fonts and Custom CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .job-card {
            background: linear-gradient(145deg, #f0f0f0, #ffffff);
            box-shadow: 6px 6px 12px #b8b8b8, -6px -6px 12px #ffffff;
            transition: transform 0.3s ease-in-out;
        }
        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 10px 10px 20px #b8b8b8, -10px -10px 20px #ffffff;
        }
        .job-header {
            background-color: #004d7a;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .job-button {
            background-color: #00a8cc;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 50px;
            font-size: 0.875rem;
            transition: background-color 0.3s ease;
        }
        .job-button:hover {
            background-color: #007b9a;
        }
    </style>

    <div class="container mx-auto my-10 px-4 lg:px-0">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8">
            <div class="mb-4 md:mb-0">
                <h4 class="text-lg text-gray-700">Dashboard &gt; Job Listings</h4>
                <div class="w-24 h-1 bg-blue-500 mt-2 rounded-full"></div>
            </div>
            <div>
                <a href="/jobs/create" class="job-button">Post a New Job</a>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($jobs as $job)
            <div class="job-card p-6 rounded-lg">
                <div class="job-header text-center mb-4">
                    <h3 class="text-xl font-bold">{{ $job->job_title }}</h3>
                </div>
                <p class="text-gray-800 mb-4">{{ $job->job_name }}</p>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li class="flex items-center">
                        <i class="fas fa-map-marker-alt mr-2 text-blue-500"></i> {{ $job->job_location }}
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-clock mr-2 text-blue-500"></i> {{ $job->job_duration }}
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-money-bill-alt mr-2 text-blue-500"></i> ${{ $job->job_amount }}
                    </li>
                </ul>
                <div class="mt-6 flex justify-center">
                    <a href="{{ url('jobs/' . $job->id . '/delete') }}" class="job-button bg-red-500 hover:bg-red-600">Delete</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
