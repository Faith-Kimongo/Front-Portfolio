<x-app-layout>
    <div class="pt-1">
        <!-- <h2 class="sr-only">Products purchased</h2> -->

        <div class="space-y-6">
          <div class="bg-white sm:rounded-lg ">
            <div class="py-6 px-4 sm:px-6 lg:grid lg:grid-cols-12 lg:gap-x-8 lg:p-8">
              <div class="sm:flex lg:col-span-7">
                <div class="aspect-w-1 aspect-h-1 w-full flex-shrink-0 overflow-hidden rounded-lg sm:aspect-none sm:h-40 sm:w-40">
                  <a href="{{route('profile.show')}}">                  <img src="{{ Auth::user()->profile_photo_url }}" alt="" class="h-full w-full object-cover object-cover sm:h-full sm:w-full rounded-full">
                  </a>
                </div>

                <div class="mt-6 sm:mt-0 sm:ml-6 px-6">
                  <h3 class="text-base font-medium text-gray-900">
                    <a href="#"> {{Auth::user()->name}} </a>
                    <a href="{{route('profile.show')}}"><button type="button" class="ml-40 w-auto px-4 py-2 text-sm font-medium lemodal900 focus:outline-none focus:shadow-outline-blue">Edit Profile</button></a>
                  </h3>
                  <div class="flex flex-wrap items-center justify-start sm:flex-nowrap min-w-0 flex-1 justify-between text:align-right">
                    <p class="mt-2 text-sm font-medium text-gray-900"> {{ ucfirst(Auth::user()->skills->first()->name ?? "No Skill Yet")}}
                    </p> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="blue" class="absolute ml-28 mt-3 w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                    </svg>

                    <!-- <img src="images/Vector.png"> -->
                  </div>

                  <div class="flex flex-row gap-4 text-gray-800 my-auto text-2xl mx-auto md:mx-0 mt-6">
                      <div class="">
                        <dt><p class="hover:cursor-pointer hover:text-pink-800 text-sm font-bold space-x-6">25</p></dt>
                        <dd class="mt-3 space-y-3 text-gray-500 text-sm">
                          Applied
                        </dd>
                      </div>

                      <div class="px-8">
                        <dt><p class="hover:cursor-pointer hover:text-pink-800 text-sm font-bold space-x-6">19</p></dt>
                        <dd class="mt-3 space-y-3 text-gray-500 text-sm">
                          Reviewed
                        </dd>
                      </div>
                      <div class="px-2">
                        <dt><p class="hover:cursor-pointer hover:text-pink-800 text-sm font-bold space-x-6">14</p></dt>
                        <dd class="mt-3 space-y-3 text-gray-500 text-sm">
                          Interview
                        </dd>
                      </div>
                  </div>
                </div>
              </div>
      </div>
    </div>
  </div>
  </div>

  <div class="mt-4 grid grid-row-1 gap-4 sm:grid-cols-2">
    <ul>
      <li class="shadow-xl rounded-2xl p-4">
      <div >
        <div class="-ml-4 -mt-2 flex flex-wrap items-center justify-between sm:flex-nowrap">
          <div class="ml-4 mt-2">
            <h3 class="text-sm font-medium leading-6 text-black font-bold">Career Bio</h3>
          </div>
          <div class="ml-4 mt-4 flex-shrink-0">
            <a  href="{{route('profile.show')}}" id="modal-bio" class="trigger">
              <button type="button" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-pink-800 border border-transparent rounded-lg active:bg-pink-700 hover:bg-pink-900 focus:outline-none focus:shadow-outline-blue">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                <path fill="#fff" d="M21.5 5.5l-3-3c-.5-.5-1.2-.5-1.7 0l-1.8 1.8 3.7 3.7 1.8-1.8c.5-.5.5-1.2 0-1.7zM2.5 18.5V22h3.5l11.6-11.6-3.5-3.5L2.5 18.5z"/>
                <path d="M0 0h24v24H0z" fill="none"/>
              </svg>
              
            </button></a>
          </div>
      </div>
      @if (Auth::user()->bio)
      <p class="text-gray-500 pb-8 text-sm"> {{Auth::user()->bio}} </p>
      @else
      <p class="text-gray-500 pb-8 text-sm"> No career bio now, please click the above code to add </p>

      @endif

    </li>

    {{-- @livewire('update') --}}

    <li class="shadow-xl mt-6 rounded-2xl p-4">
      {{-- <div >
        <div class="-ml-4 -mt-2 flex flex-wrap items-center justify-between sm:flex-nowrap">
          <div class="ml-4 mt-2">
            <h3 class="text-sm font-medium leading-6 text-black font-bold">Education Background</h3>
          </div>
          <div class="ml-4 mt-4 flex-shrink-0">
            <a href="{{route('profile.education.create')}}"><button type="button" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-pink-800 border border-transparent rounded-lg active:bg-pink-700 hover:bg-pink-900 focus:outline-none focus:shadow-outline-blue"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
              <path fill="#fff" d="M10 10V2c0-.6.4-1 1-1h2c.6 0 1 .4 1 1v8h8c.6 0 1 .4 1 1v2c0 .6-.4 1-1 1h-8v8c0 .6-.4 1-1 1h-2c-.6 0-1-.4-1-1v-8H2c-.6 0-1-.4-1-1v-2c0-.6.4-1 1-1h8z"/>
            </svg>
            </button></a>
          </div>
      </div>
      @forelse (Auth::user()->educations as $education)
      <p class="text-gray-500 pb-2 text-sm"> {{$education->name}} - {{$education->field}} 
        <br>
        {{$education->start_date->format('Y')}} - {{$education->end_date->format('Y')}}
        </p> 
      @empty
      <p class="text-gray-500 pb-2 text-sm">Please add education details </p> 
      @endforelse  --}}
    
      <div class="px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
          <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Education</h1>
            <p class="mt-2 text-sm text-gray-700">Your education  list.</p>
          </div>
          <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="{{route('profile.education.create')}}" type="button" class="block rounded-md bg-pink-700 py-1.5 px-3 text-center text-sm font-semibold leading-6 text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                <path fill="#fff" d="M10 10V2c0-.6.4-1 1-1h2c.6 0 1 .4 1 1v8h8c.6 0 1 .4 1 1v2c0 .6-.4 1-1 1h-8v8c0 .6-.4 1-1 1h-2c-.6 0-1-.4-1-1v-8H2c-.6 0-1-.4-1-1v-2c0-.6.4-1 1-1h8z"/>
              </svg>
            </a>
          </div>
        </div>
        <div class="mt-8 flow-root">
          <div class="-my-2 -mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle">
              <table class="min-w-full border-separate border-spacing-0">
                <thead>
                  <tr>
                    <th scope="col" class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 py-3.5 pl-6 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter lg:pl-8">Institution Name</th>
                    <th scope="col" class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:table-cell">Field</th>
                    <th scope="col" class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 py-3.5 pr-6 pl-3 backdrop-blur backdrop-filter lg:pr-8">From - To
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @forelse (Auth::user()->educations as $education)
                  <tr>
                    <td class="whitespace-nowrap border-b border-gray-200 py-4 pl-6 pr-3 text-sm font-medium text-gray-900 lg:pl-8">{{$education->name}} </td>
                    <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500 hidden sm:table-cell">{{$education->field}}</td>
                    {{-- <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500 hidden lg:table-cell">lindsay.walton@example.com</td> --}}
                    {{-- <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500">Member</td> --}}
                    <td class="relative whitespace-nowrap border-b border-gray-200 py-4 pr-6 pl-3 text-left text-sm font-medium lg:pr-8">
                      {{$education->start_date->format('Y')}}-{{$education->end_date->format('Y')}}
                    </td>
                    <td>
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="red" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                      </svg>

                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td class="whitespace-nowrap border-b border-gray-200 py-4 pl-6 pr-3 text-sm font-medium text-gray-900 lg:pl-8">                    
                      No Education added yet
                    </td>

                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </li>

    <li class="shadow-xl mt-6 rounded-2xl p-4">
     
      <div class="px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
          <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Work Experience</h1>
            <p class="mt-2 text-sm text-gray-700">Your job experience list.</p>
          </div>
          <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="{{route('experience.create')}}" type="button" class="block rounded-md bg-pink-700 py-1.5 px-3 text-center text-sm font-semibold leading-6 text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                <path fill="#fff" d="M10 10V2c0-.6.4-1 1-1h2c.6 0 1 .4 1 1v8h8c.6 0 1 .4 1 1v2c0 .6-.4 1-1 1h-8v8c0 .6-.4 1-1 1h-2c-.6 0-1-.4-1-1v-8H2c-.6 0-1-.4-1-1v-2c0-.6.4-1 1-1h8z"/>
              </svg>
            </a>
          </div>
        </div>
        <div class="mt-8 flow-root">
          <div class="-my-2 -mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle">
              <table class="min-w-full border-separate border-spacing-0">
                <thead>
                  <tr>
                    <th scope="col" class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 py-3.5 pl-6 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter lg:pl-8">Employer Name</th>
                    <th scope="col" class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:table-cell">Job Title</th>
                    <th scope="col" class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 py-3.5 pr-6 pl-3 backdrop-blur backdrop-filter lg:pr-8">From - To
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @forelse (Auth::user()->experiences as $experience)
                  <tr>
                    <td class="whitespace-nowrap border-b border-gray-200 py-4 pl-6 pr-3 text-sm font-medium text-gray-900 lg:pl-8">{{$experience->employer_name}} </td>
                    <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500 hidden sm:table-cell">{{$experience->job_title}}</td>
                    {{-- <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500 hidden lg:table-cell">lindsay.walton@example.com</td> --}}
                    {{-- <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500">Member</td> --}}
                    <td class="relative whitespace-nowrap border-b border-gray-200 py-4 pr-6 pl-3 text-left text-sm font-medium lg:pr-8">
                      {{$experience->start_date->format('Y')}}-{{$experience->end_date->format('Y')}}
                    </td>
                    <td>
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="red" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                      </svg>

                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td class="whitespace-nowrap border-b border-gray-200 py-4 pl-6 pr-3 text-sm font-medium text-gray-900 lg:pl-8">No experience added yet
                    </td>

                  </tr>
                  @endforelse
                  
      
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      
      


    </li>

    <li class="shadow-xl mt-6 rounded-2xl p-4 mb-3">
      
      <div class="px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
          <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Skillset</h1>
            <p class="mt-2 text-sm text-gray-700">Your skills list.</p>
          </div>
          <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="{{route('skills.create')}}" type="button" class="block rounded-md bg-pink-700 py-1.5 px-3 text-center text-sm font-semibold leading-6 text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                <path fill="#fff" d="M10 10V2c0-.6.4-1 1-1h2c.6 0 1 .4 1 1v8h8c.6 0 1 .4 1 1v2c0 .6-.4 1-1 1h-8v8c0 .6-.4 1-1 1h-2c-.6 0-1-.4-1-1v-8H2c-.6 0-1-.4-1-1v-2c0-.6.4-1 1-1h8z"/>
              </svg>
            </a>
          </div>
        </div>
        <div class="mt-8 flow-root">
          <div class="-my-2 -mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle">
              <table class="min-w-full border-separate border-spacing-0">
                <thead>
                  <tr>
                    <th scope="col" class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 py-3.5 pl-6 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter lg:pl-8">Skills</th>
                    <th scope="col" class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:table-cell"></th>
                    
                  </tr>
                </thead>
                <tbody>
                  @forelse (Auth::user()->skills as $skill)
                  <tr>
                    <td class="whitespace-nowrap border-b border-gray-200 py-4 pl-6 pr-3 text-sm font-medium text-gray-900 lg:pl-8">{{$skill->name}} </td>
                    
                    {{-- <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500 hidden lg:table-cell">lindsay.walton@example.com</td> --}}
                    {{-- <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500">Member</td> --}}
                    
                    </td>
                    <td>
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="red" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                      </svg>

                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td class="whitespace-nowrap border-b border-gray-200 py-4 pl-6 pr-3 text-sm font-medium text-gray-900 lg:pl-8">                    
                      No Skill added yet
                    </td>

                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </li>

    <li class="shadow-xl mt-6 rounded-2xl p-4 mb-3">
      
      <div class="px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
          <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Curriculum Vitae (CV)</h1>
          </div>
        
        </div>
        <div class="mt-4 flow-root">
          <div class="-my-2 -mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle">
              <table class="min-w-full border-separate border-spacing-0">
               
                <tbody>
                  <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                   
                    
                    <dl>
                     
                      <dd class="mt-1 text-sm text-gray-900">
                          @if (auth()->user()->cv)
                              <div class="flex items-center">
                                  <svg class="h-5 w-5 mr-1 text-green-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                      <path d="M5 13l4 4L19 7"></path>
                                  </svg>
                                  <a href="{{ asset(auth()->user()->cv) }}" class="text-indigo-600 hover:text-indigo-500">{{ auth()->user()->cv }}</a>
                              </div>
                          @else
                              
                              <span class="whitespace-nowrap border-b border-gray-200 py-2 pl-6 pr-3 text-sm font-medium text-red-500 lg:pl-2">No CV uploaded</span>
                          @endif
                      </dd>
                  </dl>
                  

                    
                  </div>
                  <div>
                   
                    <form method="POST" action="{{ route('user-profile.uploadcv') }}" enctype="multipart/form-data">
                      @csrf
                      <div class="mt-2 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                          <div class="space-y-1 text-center">
                              <div class="flex text-sm text-gray-600">
                                  <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                      <span>Upload a file</span>
                                      <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                  </label>
                                  <p class="pl-1">or drag and drop</p>
                              </div>
                              <p class="text-xs text-gray-500">PDF to 10MB</p>
                          </div>
                      </div>
                      <button type="submit" class="mt-3 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-gradient-to-r from-pink-800 to-pink-900 bg-origin-border px-4 py-2 text-base font-medium text-white shadow-sm hover:from-pink-700 hover:to-pink-900 ml-5">Submit</button>
                  </form>
                  </div>
                </div>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </li>
  </ul>

  <div class="shadow-2xl m-4 rounded-2xl p-6">
  

    <div class="mt-10">
      <div class="-ml-4 -mt-2 flex flex-wrap items-center justify-between sm:flex-wrap">
        <div class="ml-4 mt-2">
          <h3 class="text-lg font-medium leading-6 text-black font-bold">Job Applications</h3>
        </div>
        <div class="ml-4 mt-2 flex-shrink-0">
          <a href=""><p class="text-sm text-blue-700">View my job application</p></a>
        </div>
    </div>
    <div class="mt-4 grid grid-cols-1 gap-4 flex items-center">
      <div class="mb-4">
        <ul role="list" class="-mb-8 mt-6">
          @forelse (auth()->user()->applications as $application)
          <li>
            <div class="relative pb-8">
                <span class="block inline-flex items-center justify-center rounded-md p-3" aria-hidden="true"></span>
                <div class="relative flex space-x-3">
                  <div>
                    <span class="h-8 w-8 rounded-full flex items-center justify-center ">
                      <!-- Heroicon name: mini/user -->
                      <img class="h-12 w-12 rounded-full object-cover" src="{{ $application->job->user->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </span>
                  </div>
                  <div class="flex min-w-0 flex-1 justify-between space-x-4 ">
                    <div>
                        <p><a href="#" class="font-medium text-gray-900">{{$application->job->title}}</a></p>
                        <p class="text-gray-600"> {{$application->job->user->name}} </p>
                    </div>

                  </div>

                  <div class="flex min-w-0 flex-1 justify-end space-x-4 pt-1.5">
                    <div>
                        <p><a href="#" class="mt-8 text-gray-600"> {{$application->created_at->diffForHumans()}} </a></p>
                    </div>
                  </div>

                </div>
              </div>
        </li>
          @empty
              
          @endforelse
        

        

       
      </ul>

      </div>
    </div>
    </div>

  </div>



  </div>


  {{-- Bio Modal --}}
  <div id="modal-bio" class="modal">
    <div id="modal-bio" class="mt-24 modal bg-black bg-opacity-50 absolute inset-0 hidden flex justify-center items-center z-10"  >
      <div class="relative w-full max-w-lg h-full lg:h-auto">
        <div id="modal-content" class="bg-gray-200 max-w-4xl rounded-2xl shadow-xl text-gray-800 text-center">
          <div class="modal-title w-full justify-center items-center rounded-xl border-b border-pink-900 bg-gradient-to-r from-teal-800 to-pink-900 shadow-sm hover:from-teal-700 hover:to-pink-900">
            <h3 class="text-md font-medium text-white dark:text-white p-2">Update your Bio</h3>
            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="small-modal">
            </button>
          </div>

          <div class="sm:col-span-2 m-6 rounded-lg">
            <div class="flex justify-between">
              <label for="message" class="block text-sm font-medium text-gray-900">Bio</label>
              <!-- <span id="message-max" class="text-sm text-gray-500">Max. 500 characters</span> -->
            </div>
            <div class="mt-1">
              <textarea id="message" name="message" rows="4" class="block w-full rounded-md border border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" aria-describedby="message-max"></textarea>
            </div>
          </div>
          <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense" id="buttons">
            <input type="submit" class="mb-5 w-full inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-gradient-to-r from-pink-900 to-pink-900 bg-origin-border px-2 py-2 text-base font-medium text-white shadow-sm hover:from-pink-700 hover:to-teal-900">
            <button id="modal-bio" type="button" class="close-modal mb-5 w-full inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-gradient-to-r from-pink-900 to-pink-900 bg-origin-border px-2 py-2 text-base font-medium text-white shadow-sm hover:from-pink-700 hover:to-teal-900" >Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
