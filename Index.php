<x-app-layout>
    <!-- Hero section -->
    <div class="relative mt-8">
        <div class="absolute inset-x-0 bottom-0 h-1/2"></div>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="relative shadow-xl sm:overflow-hidden sm:rounded-2xl">
                <div class="absolute inset-0 shadow-md">
                    <video autoplay loop muted>
                        <source src="https://assets.mixkit.co/videos/preview/mixkit-set-of-plateaus-seen-from-the-heights-in-a-sunset-26070-large.mp4"
                            type="video/mp4" />
                    </video>
                    <div class="absolute inset-0 bg-gradient-to-r bg-opacity-70 hover:bg-opacity-80"></div>
                </div>
    
                <div class="relative px-4 py-16 sm:px-6 sm:py-24 lg:py-32 lg:px-8 grid lg:grid-cols-1 sm:grid-cols-2">
                    <h6 class="text-center text-md font-bold tracking-tight sm:text-5xl lg:text-md lg:text-black text-white">
                        <span class="block">Find the right job for you</span>
                    </h6>
    
                    <div class="mx-auto mt-10 max-w-sm sm:flex sm:max-w-none grid sm:grid-cols-1">
                        <button id="dropdownDefault" data-dropdown-toggle="dropdown"
                            class="text-black ring-black focus:ring-4 focus:outline-black focus:ring-black-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center bg-white"
                            type="button">Jobs by Profession 
                            <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
    
                        <button id="dropdownDefault" data-dropdown-toggle="dropdown"
                            class="ml-4 text-black ring-black focus:ring-4 focus:outline-black focus:ring-black-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center bg-white invisible md:visible"
                            type="button">Job Title 
                            <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <button id="dropdownDefault" data-dropdown-toggle="dropdown"
                            class="ml-4 text-black ring-black focus:ring-4 focus:outline-black focus:ring-black-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center bg-white invisible md:visible"
                            type="button">Jobs by Location <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg></button>

                        <a href="{{ route('job.index') }}"
                            class="ml-4 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-gradient-to-r from-pink-800 to-pink-900 bg-origin-border px-4 py-2 text-base font-medium text-white shadow-sm hover:from-pink-700 hover:to-pink-900">Find
                            Jobs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto max-w-7xl py-16 px-4 sm:px-6 lg:px-8">
        <p class="text-center text-base font-semibold text-black text-2xl">Featured Jobs</p>
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">



            @forelse ($jobs as $job)
                <div class="pt-6 shadow-xl">
                  <a href=" {{route('job.show',$job->id)}} ">
<div class="flow-root rounded-lg bg-gray-50 px-6 pb-8">
                        <div class="-mt-6">
                            <ul role="list" class="-mb-8 mt-6">
                                <li>
                                    <div class="relative pb-8">
                                        <span class="block inline-flex items-center justify-center rounded-md p-3"
                                            aria-hidden="true"></span>
                                        <div class="relative flex space-x-3">
                                            <div>
                                                <span class="h-8 w-8 rounded-full flex items-center justify-center ">

                                                    <img class="object-cover"
                                                        src="{{ $job->user->profile_photo_url }}" />
                                                   
                                                </span>
                                            </div>
                                            <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                                <div>
                                                    <a href="#"
                                                        class="font-medium text-gray-900">{{ $job->title }}</a></p>
                                                    <p class="text-gray-400"> {{ $job->user->name }} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <h1 class="mt-8 text-md font-medium tracking-tight text-gray-500">{{ $job->title }}</h1>
                            <p class="mt-5 text-base text-black">Urgently Hiring.</p>
                            <ul>
                                <li>
                                    <div class="mt-4 sm:flex sm:justify-between sm:flex">
                                        <p class="flex items-center text-sm text-black"> {{ $job->remuneration }} </p>
                                        <p class="mt-4 flex items-center text-sm text-gblack sm:mt-0 sm:ml-6">
                                            {{ $job->location }} ,
                                            Kenya</p>
                                    </div>
                                </li>
                            </ul>

                            @php
                                $current_date = new DateTime();
                                $diff = $job->deadline->diff($current_date);
                                $days_left = $diff->days;
                            @endphp

                            <p class="text-black text-sm mt-4">{{ $days_left }} days to deadline</p>
                        </div>
                    </div>
                  </a>
                    
                </div>
            @empty
                No Job Posted Yet
            @endforelse



        </div>

    </div>

    <div class="text-pink-800 text-center">
        <a href="{{route('job.index')}}"><button
                class="ml-4 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-gradient-to-r from-pink-800 to-pink-900 bg-origin-border px-4 py-2 text-base font-medium text-white shadow-sm hover:from-pink-700 hover:to-pink-900">Explore
                All Jobs</button></a>
    </div>
    <div class="bg-white">
        <div class="container mx-auto max-w-7xl py-16 px-4 sm:px-6 lg:px-8 md:flex md:shrink-0 sm:shrink-0">
            <div class="mx-auto grid grid-cols-2 sm:grid-cols-2 sm:space-x-6 gap-y-12 gap-x-8 px-4 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">

                <div class="sm:flex shadow-sm sm:ml-5">
                    <div class="sm:flex-shrink-0 ">
                        <div class="flow-root ">
                            <img class="rounded-2xl h-32 w-56"
                                    src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?ixlib=rb-4.0.ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                                    alt="">
                        </div>
                    </div>
                    <div class="mt-3 sm:mt-0 sm:ml-3">
                        <h3 class="text-lg font-bold text-black">Let the Jobs find you</h3>
                        <p class="mt-2 text-sm text-black"> Create your free profile and get interview invites and jobs
                                that work for you </p>
                        <a href="{{route('dashboard')}}"><button class="mt-4 inline-flex items-center rounded-md border border-transparent bg-gradient-to-r from-pink-800 to-pink-900 bg-origin-border px-4 py-2 text-base font-medium text-white shadow-md hover:from-pink-700 hover:to-pink-900">Get
                                    Hired</button>
                        </a>
                    </div>
                </div>

                <div class="sm:flex shadow-sm">
                    @guest
                    <div class="space-x-6 sm:flex-shrink-0">
                        <div class="flow-root ">
                            <img class="rounded-2xl h-20 w-30"
                                src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?ixlib=rb-4.0.ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                                alt="">
                        </div>
                    </div>
                    <div class="mt-3 sm:mt-0 sm:ml-3">
                        <h3 class="text-md font-bold text-black">Are you a job Seeker</h3>
                        <a href="{{route('register')}}"><button
                                class="mt-4 inline-flex items-center rounded-md border border-transparent bg-gradient-to-r from-pink-800 to-pink-900 bg-origin-border px-4 py-2 text-base font-medium text-white shadow-md hover:from-pink-700 hover:to-pink-900">Register
                                Now</button></a>
                    </div>
                    @endguest
                 
                </div>

                <div class="sm:flex shadow-sm">
                    <div class="sm:flex-shrink-0 ">
                        <div class="flow-root ">
                            <img class="rounded-2xl h-32 w-56"
                                src="https://images.unsplash.com/photo-1457694716743-eb419114c894?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                                alt="">
                        </div>
                    </div>
                    <div class="mt-3 sm:mt-0 sm:ml-3">
                        <h3 class="text-lg font-bold text-black">Get top talent</h3>
                        <p class="mt-2 text-sm text-black"> Choose from a pool of great talent </p>
                        <a href=" {{route('register')}} "><button
                                class="mt-4 inline-flex items-center rounded-md border border-transparent bg-gradient-to-r from-pink-800 to-pink-900 bg-origin-border px-4 py-2 text-base font-medium text-white shadow-md hover:from-pink-700 hover:to-pink-900">Hire
                                Talent</button></a>
                    </div>
                </div>

                <div class="sm:flex shadow-sm">
                    <div class="sm:flex-shrink-0 ">
                        <div class="flow-root ">
                            <img class="rounded-2xl h-20 w-30"
                                src="https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=869&q=80"
                                alt="">
                        </div>
                    </div>
                    <div class="mt-3 sm:mt-0 sm:ml-3">
                        <h3 class="text-md font-bold text-black">Are you an employer</h3>
                        <a href="Register.html"><button
                                class="mt-4 inline-flex items-center rounded-md border border-transparent bg-gradient-to-r from-pink-800 to-pink-900 bg-origin-border px-4 py-2 text-base font-medium text-white shadow-md hover:from-pink-700 hover:to-pink-900">Register
                                Now</button></a>
                    </div>
                </div>

                <div class="sm:flex shadow-sm">
                    <div class="sm:flex-shrink-0 ">
                        <div class="flow-root ">
                            <img class="rounded-2xl h-32 w-56"
                                src="https://images.unsplash.com/photo-1625191824427-fe884c7ab3cd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=821&q=80"
                                alt="">
                        </div>
                    </div>
                    <div class="mt-3 sm:mt-0 sm:ml-3">
                        <h3 class="text-lg font-bold text-black">MyHustle</h3>
                        <p class="mt-2 text-sm text-black"> Advertise your Merchandise for free </p>
                        <a href=" {{route('myhustle.index')}} "><button
                                class="mt-4 inline-flex items-center rounded-md border border-transparent bg-gradient-to-r from-pink-800 to-pink-900 bg-origin-border px-4 py-2 text-base font-medium text-white shadow-md hover:from-pink-700 hover:to-pink-900">Advertise</button></a>
                    </div>
                </div>

                <div class="sm:flex shadow-sm">
                    <div class="sm:flex-shrink-0 ">
                        <div class="flow-root ">
                            <img class="rounded-2xl h-20 w-30"
                                src="https://images.unsplash.com/photo-1488190211105-8b0e65b80b4e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                                alt="">
                        </div>
                    </div>
                    <div class="mt-3 sm:mt-0 sm:ml-3">
                        <h3 class="text-md font-bold text-black">Find New Skills</h3>
                        <a href=""><button
                                class="mt-4 inline-flex items-center rounded-md border border-transparent bg-gradient-to-r from-pink-800 to-pink-900 bg-origin-border px-4 py-2 text-base font-medium text-white shadow-md hover:from-pink-700 hover:to-pink-900">Learn
                                New Skills</button></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </x-guest-layout>
