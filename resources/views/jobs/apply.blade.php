<x-app-layout>
        <div class="mt-4 relative mx-auto max-w-7xl px-4">
        <x-common.page-header backurl="{{ route('job.show',$job->id) }}" currenturl="{{ request()->url() }}"
                title="{{ 'Application for '.$job->title }}" backtitle="{{ 'Job '.$job->title }}" />
        @if (session('success'))
            <div class="rounded-md bg-green-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-green-800"> {{ session('success') }} </h3>
                        <div class="mt-2 text-sm text-green-700">
                            <p>Job applied successfully.</p>
                        </div>
                        <div class="mt-4">
                            <div class="-mx-2 -my-1.5 flex">
                                <a href="{{ route('job.applications') }}" type="button"
                                    class="rounded-md bg-green-50 px-2 py-1.5 text-sm font-medium text-green-800 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50">View
                                    Applications</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <form action="{{ route('job.apply.store',$job->id) }}" method="POST">
            @csrf
            <div class="shadow sm:overflow-hidden sm:rounded-md">
                <div class="space-y-6 bg-white py-6 px-4 sm:p-6">
                    <div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Application for {{ $job->title }} job
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">Please apply using the correct details. Please not that your profile will be sent to the recruiter</p>
                        <p>
                            Job Location: {{$job->location}}
                        </p>
                        <p>
                            {{$job->description}}
                        </p>
                        <hr class="mt-2">
                    </div>

                    
                </div>
                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                    <button type="submit"
                        class="inline-flex justify-center rounded-md border border-transparent bg-pink-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2">Apply</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
