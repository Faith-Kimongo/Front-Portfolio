<x-app-layout>
    <div class="mt-4 relative mx-auto max-w-7xl px-4">
    <x-common.page-header backurl="{{ route('dashboard') }}" currenturl="{{ request()->url() }}"
            title="{{ 'Find jobs for you' }}" backtitle="{{ 'Dashboard' }}" />
        <form action=" {{ route('job.index') }} " method="GET">
            <div class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm">
                <div class="flex items-center flex-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="w-6 h-6 text-gray-400">
                        <path fill-rule="evenodd"
                            d="M8.5 15a6.5 6.5 0 100-13 6.5 6.5 0 000 13zm6.19-1.31l3.61 3.61a.75.75 0 11-1.06 1.06l-3.61-3.61a8 8 0 111.06-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                    <input type="text" name="search" id="search" value="{{ request()->search }}"
                        class="block w-full py-2 pl-3 pr-10 leading-5 text-gray-900 placeholder-gray-500 bg-white border-gray-300 rounded-md focus:outline-none focus:placeholder-pink-900  sm:text-sm"
                        placeholder="Search for jobs...">
                </div>
                <button type="submit"
                    class="inline-flex items-center justify-center px-4 py-2 ml-2 font-medium text-white bg-pink-700 border border-transparent rounded-md hover:bg-pink-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-800 sm:text-sm">
                    Search
                </button>
            </div>
        </form>


        <p class="mt-4 font-semibold">Found <a class="text-green-400">{{ $jobs->count() }}</a> jobs</p>
        <div class="grid grid-row-1 gap-4 sm:grid-cols-2">

        </div>
    </div>


    <div class="grid grid-row-1 gap-4 sm:grid-cols-2">
        <div class="shadow-2xl m-2 rounded-2xl p-6">
            <ul>
                @forelse ($jobs as $job)
                    <a  href="{{ route('job.show', $job->id) }}" class="hover:border">
                        <li
                            class="shadow-md rounded-2xl p-3 bg-gray-200 mt-4 {{ $job->id == $pinned_job->id ? 'border border-2 border-red-500' : '' }} ">
                            <div>
                                <div class="-ml-4 -mt-2 flex flex-wrap items-center justify-between sm:flex-nowrap">
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="hover:underline flex items-center justify-between">
                                            <p class="truncate text-sm font-medium text-gray-700"> {{ $job->title }}
                                            </p>

                                        </div>
                                        <div class="mt-2 sm:flex sm:justify-between">
                                            <div class="sm:flex">
                                                <p class="flex items-center text-sm text-gray-500">
                                                    <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400"
                                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path
                                                            d="M7 8a3 3 0 100-6 3 3 0 000 6zM14.5 9a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM1.615 16.428a1.224 1.224 0 01-.569-1.175 6.002 6.002 0 0111.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 017 18a9.953 9.953 0 01-5.385-1.572zM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 00-1.588-3.755 4.502 4.502 0 015.874 2.636.818.818 0 01-.36.98A7.465 7.465 0 0114.5 16z" />
                                                    </svg>
                                                    {{ $job->category->name }}
                                                </p>
                                                <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                                    <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400"
                                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 103 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 002.273 1.765 11.842 11.842 0 00.976.544l.062.029.018.008.006.003zM10 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    {{ $job->location }} &nbsp;
                                                </p>
                                            </div>
                                            <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                                <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <p class="text-right">

                                                    @php
                                                        $now = Carbon\Carbon::now();
                                                        $daysRemaining = $now->diffInDays($job->deadline, false);
                                                    @endphp

                                                    <span
                                                        class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-gray-800">{{ $daysRemaining . ' days to the deadline' }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="relative">
                                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                        <div class="w-full border-t border-gray-300"></div>
                                    </div>
                                    <div class="relative flex justify-start">
                                        <span class="bg-gray-200 pr-2 text-sm text-gray-500">Posted By</span>
                                    </div>
                                </div>

                                <div class="min-w-0 m-2 flex-1">

                                    <p class="text-xs font-medium text-gray-900">
                                        <p class="text-sm hover:underline"> {{ $job->user->name }} </p>
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        <div class="text-sm text-gray-500 hover:underline">
                                            <time datetime="2020-12-09T11:43:00">Joined
                                                {{ $job->user->created_at->format('M Y') }}</time>
                                        </div>
                                    </p>
                                </div>
                        </li>
                    </a>

                @empty
                    <li>No job (s) found</li>
                @endforelse

            </ul>
        </div>


        {{-- Pinned Job --}}
        @if (isset($pinned_job))
            <div class="shadow-2xl m-4 rounded-2xl p-6">
                <div>
                    <section aria-labelledby="profile-overview-title" class="bg-gray-100  rounded-xl p-4">
                        <div>
                            <div class="-ml-4 -mt-2 flex flex-wrap items-center justify-between sm:flex-nowrap">

                                <div class="px-4 py-4 sm:px-6">
                                    <div class="flex items-center justify-between">
                                        <p class="truncate text-sm font-medium text-gray-700"> {{ $pinned_job->title }}
                                        </p>
                                    </div>
                                    <div class="mt-2 sm:flex sm:justify-between">
                                        <div class="sm:flex">
                                            <p class="flex items-center text-sm text-gray-500">
                                                <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M7 8a3 3 0 100-6 3 3 0 000 6zM14.5 9a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM1.615 16.428a1.224 1.224 0 01-.569-1.175 6.002 6.002 0 0111.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 017 18a9.953 9.953 0 01-5.385-1.572zM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 00-1.588-3.755 4.502 4.502 0 015.874 2.636.818.818 0 01-.36.98A7.465 7.465 0 0114.5 16z" />
                                                </svg>
                                                {{ $pinned_job->category->name }}
                                            </p>
                                            <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                                <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 103 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 002.273 1.765 11.842 11.842 0 00.976.544l.062.029.018.008.006.003zM10 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                {{ $pinned_job->location }} &nbsp;
                                            </p>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                            <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <p class="text-right">

                                                @php
                                                    $now = Carbon\Carbon::now();
                                                    $daysRemaining = $now->diffInDays($pinned_job->deadline, false);
                                                @endphp

                                                <span
                                                    class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-gray-800">{{ $daysRemaining . ' days to the deadline' }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="relative">
                                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                    <div class="w-full border-t border-gray-300"></div>
                                </div>
                                <div class="relative flex justify-start">
                                    <span class="bg-gray-100 pr-2 text-sm text-gray-500">Posted By</span>
                                </div>
                            </div>

                            <div class="min-w-0 m-2 flex-1">

                                <p class="text-xs font-medium text-gray-900">
                                    <a href="#" class="hover:underline"> {{ $pinned_job->user->name }} </a>
                                </p>
                                <p class="text-xs text-gray-500">
                                    <a class="hover:underline">
                                        <time datetime="2020-12-09T11:43:00">Joined
                                            {{ $pinned_job->user->created_at->format('M Y') }}</time>
                                    </a>
                                </p>
                            </div>

                            {{-- More about job --}}
                            <div class="relative">
                                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                  <div class="w-full border-t border-gray-300"></div>
                                </div>
                                <div class="relative flex justify-start">
                                  <span class="bg-gray-100 pr-2 text-sm text-gray-500">More About the Job</span>
                                </div>
                              </div>
                            
                            <p class="mt-1">
                                {{ $pinned_job->user->bio }}
                            </p>
            
                            <p class="font-semibold mt-2">Job Description</p>
                            <p class="mt-4">
                                {{ $pinned_job->description }}
                                <br><br>
                            <p class="font-semibold">Responsibilities:</p>
                            <ul class="list-disc">
            
                                {{ $pinned_job->responsibilities }}
        
                            </ul>
                            <br>
                            <p class="font-semibold">Requirements:</p>
                            <ul class="list-disc">
                                {{ $pinned_job->requirements }}
            
                            </ul>
                            </p>
                    </section>

                    <hr>
                </div>
                <div class="relative flex flex-1 justify-right">

                    @if ($pinned_job->isAppliedBy(Auth::user()))
                        <a disabled href=""
                            class="mt-3 inline-flex items-center flex-shrink-0 rounded-md border border-transparent bg-gradient-to-r from-pink-800 to-pink-900 bg-origin-border px-4 py-2 text-base font-medium text-white shadow-sm hover:from-pink-700 hover:to-pink-900">Already
                            Applied
                            Job</a>
                    @else
                        <a href="{{ route('job.apply', $pinned_job->id) }}"
                            class="mt-3 inline-flex items-center flex-shrink-0 rounded-md border border-transparent bg-gradient-to-r from-pink-800 to-pink-900 bg-origin-border px-4 py-2 text-base font-medium text-white shadow-sm hover:from-pink-700 hover:to-pink-900">Apply
                            Job</a>
                    @endif



                    @if (session('success'))
                        <div class="rounded-md bg-green-50 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-green-800"> {{ session('success') }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- check if the job is saved --}}

                    @if (in_array($pinned_job->id, $savedjobs))
                        <button
                            class="mt-3 ml-3 inline-flex items-center flex-shrink-0 rounded-md border border-pink-800 px-4 py-2 text-base font-medium text-black shadow-sm hover:from-pink-700 hover:to-pink-900">Saved</button>
                    @else
                        <div x-data="{ inputVal: '{{ $pinned_job->id }}' }">
                            {{-- <input type="text" x-model="inputVal"> --}}
                            <button
                                class="mt-3 ml-3 inline-flex items-center flex-shrink-0 rounded-md border border-pink-800 px-4 py-2 text-base font-medium text-black shadow-sm hover:from-pink-700 hover:to-pink-900"
                                x-on:click.prevent="submitForm">Save</button>

                            <form x-ref="hiddenForm" method="POST" action="{{ route('saved-jobs.store') }}"
                                style="display:none" @submit.prevent>
                                @csrf
                                <input type="hidden" name="job_id" x-bind:value="inputVal">
                            </form>
                        </div>
                    @endif

                </div>
            </div>
        @endif
    </div>
    </div>
    </div>
    </div>
    <script>
        function submitForm() {
            var form = this.$refs.hiddenForm;
            form.submit();
        }
        window.Alpine.data('submitForm', submitForm);
    </script>

</x-app-layout>
