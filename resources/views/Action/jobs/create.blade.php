<x-app-layout>
    <div class="w-full min-h-screen bg-gray-100 flex items-center justify-center py-12">
        <div class="w-full max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-extrabold text-gray-800">Job Information Details</h1>
                <a href="/roles" class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 transition duration-200">
                    Back
                </a>
            </div>

            <form action="{{ url('jobs') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="col-span-1">
                        <label for="job_title" class="block text-lg font-medium text-gray-700">Job Title</label>
                        <input id="job_title" name="job_title" type="text" required
                               class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-md"
                               placeholder="Enter job title">
                    </div>
                    <div class="col-span-1">
                        <label for="job_name" class="block text-lg font-medium text-gray-700">Job Name</label>
                        <input id="job_name" name="job_name" type="text" required
                               class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-md"
                               placeholder="Enter job name">
                    </div>
                    <div class="col-span-2">
                        <label for="job_description" class="block text-lg font-medium text-gray-700">Job Description</label>
                        <textarea id="job_description" name="job_description" rows="4" required
                                  class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-md"
                                  placeholder="Enter job description"></textarea>
                    </div>
                    <div class="col-span-2">
                        <label for="job_qualification" class="block text-lg font-medium text-gray-700">Job Qualification</label>
                        <textarea id="job_qualification" name="job_qualification" rows="3" required
                                  class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-md"
                                  placeholder="Enter job qualification"></textarea>
                    </div>
                    <div class="col-span-1">
                        <label for="job_location" class="block text-lg font-medium text-gray-700">Job Location</label>
                        <input id="job_location" name="job_location" type="text" required
                               class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-md"
                               placeholder="Enter job location">
                    </div>
                    <div class="col-span-1">
                        <label for="job_amount" class="block text-lg font-medium text-gray-700">Job Amount</label>
                        <input id="job_amount" name="job_amount" type="number" step="0.01" required
                               class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-md"
                               placeholder="Enter job amount">
                    </div>
                   
                </div>

                <div class="flex justify-end mt-8">
                    <button type="submit"
                            class="inline-flex items-center px-6 py-3 bg-green-600 border border-transparent rounded-lg font-semibold text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Save Job
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
