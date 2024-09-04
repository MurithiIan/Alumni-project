<x-app-layout>
    <div class="container bg-white flex mx-auto p-5 px-20 pt-10">
        <div class="flex">
            <div>

            </div>
            <div >
                <h1 class="text-4xl pb-4"><b>{{ $title }}</b></h1>
                <div class="text-lg">{{ $name }}</div>
                <br><br>
                <hr>
                <div>
                    <h3><b>About Us</b></h3>
                    <p>{{ $description }}</p>
                    <br>
                    <h3><b>Job Qualification</b></h3>
                    <p>{{ $qualification }}</p>
                    <br>
                    <hr>
                    <br>
                    <div class="flex justify-around">
                        <div class="amount">
                            <p class="center"><b> KSH: {{ $amount }}</b><br>Fixed Amount</p>
                        </div>

                        <div>
                            <button id="applyButton" style="background-color: blue; padding: 10px; color:white">
                                Apply Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <div id="applicationForm" class="hidden">
                <form action="{{ url('apply/'.$id) }}" method="POST" style="width: 200vh" class="space-y-6 max-w-lg mx-auto p-10 bg-white shadow-md rounded-lg">
                @csrf
                    <div class="text-center">
                        <img width="80" src="https://www.isteducation.com/wp-content/uploads/2022/02/cropped-IST-logo-01-2048x2048-1-2.png" alt="IST Logo" class="mr-3">
                    </div>

                    <h1 class="text-3xl"><b>Applicants Detail</b></h1>
                    <p>Please Complete the Form</p>
                    <div>
                        <label for="applicant_first_name" class="block text-lg font-medium text-gray-700">Applicant
                            First Name</label>
                        <input type="text" id="applicant_first_name" name="fname" required
                            class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-md"
                            placeholder="Enter your name" readonly value="{{$portfolio->first_name}}">
                    </div>

                    <div>
                        <label for="applicant_last_name" class="block text-lg font-medium text-gray-700">Applicant
                            Last Name</label>
                        <input type="text" id="applicant_last_name" name="lname" required
                            class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-md"
                            placeholder="Enter your name" readonly value="{{$portfolio->last_name}}">
                    </div>

                    <div>
                        <label for="reason" class="block text-lg font-medium text-gray-700">Reason Why You Want the
                            Job</label>
                        <textarea id="reason" name="user_info" rows="4" required
                            class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-md"
                            placeholder="Explain your motivation for applying"></textarea>
                    </div>

                    <div class="text-right">
                        <button type="submit" style="color: white; padding: 10px 50px; background-color: green;">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('applyButton').addEventListener('click', function() {
            document.getElementById('applicationForm').classList.toggle('hidden');
        });
    </script>
</x-app-layout>
