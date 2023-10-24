<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-3">
            <div class=" flex items-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </div>

            <div class="flex items-center justify-center ">
                 @include('person.toast')
            </div>
           
            <div class="flex items-center justify-end ">
                <a href="{{ route('person.add') }}" class=" rounded-lg group flex justify-center items-center bg-gray-900 px-3.5 py-2 font-com text-sm capitalize text-white shadow shadow-black/60 hover:bg-slate-50 hover:text-gray-900">
                    <svg class="w-[12px] h-[12px] mr-1 group-hover:dark:text-gray-900 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                        <path stroke="currentColor" stroke-linecap="round" str  oke-linejoin="round" stroke-width="2" d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
                    </svg>
                    Add Person
                </a>
           </div>
        </div>
        
    </x-slot>




    @foreach ($persons as $person)
    <div class="pt-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ $person->name  }}
                </div>
           
                    <div class="flex justify-between items-center mr-3">
                        <form action="{{ route('person.destroy', ['id' => $person->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button  class=" group flex justify-center items-center rounded-l-full bg-gray-900 px-3.5 py-2 font-com text-sm capitalize text-white shadow shadow-black/60 hover:bg-slate-50 hover:text-gray-900" type="submit">
                                <svg class="w-[12px] h-[12px] mr-1 group-hover:dark:text-gray-900 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                  </svg>
                                Delete
                            </button>
                        </form>
            
                        <a href="{{ route('person.details', ['id' => $person->id]) }}" class="  group flex justify-center items-center bg-gray-900 px-3.5 py-2 font-com text-sm capitalize text-white shadow shadow-black/60 hover:bg-slate-50 hover:text-gray-900">
                            <svg class="w-[12px] h-[12px] mr-1 group-hover:dark:text-gray-900 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-2 3h4a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
                              </svg>
                            Detail
                        </a>
                        <a href="{{ route('person.edit', ['id' => $person->id]) }}" class=" group flex justify-center items-center  rounded-r-full bg-gray-900 px-3.5 py-2 font-com text-sm capitalize text-white shadow shadow-black/60 hover:bg-slate-50 hover:text-gray-900">
                            <svg class="w-[12px] h-[12px] mr-1 group-hover:dark:text-gray-900 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12.25V1m0 11.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M4 19v-2.25m6-13.5V1m0 2.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M10 19V7.75m6 4.5V1m0 11.25a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM16 19v-2"/>
                              \</svg>
                            Update
                        </a>
                    </div>
                
            </div>
        </div>
    </div>
    @endforeach

</x-app-layout>
