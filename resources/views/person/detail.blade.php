<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Person Information') }}
        </h2>
    </x-slot>

<div class="flex items-center justify-center h-screen">
  
    <div class="p-5 border rounded text-center text-gray-500 max-w-sm flex flex-col justify-center items-center">
        <div class="my-1">
            <img class="rounded-full object-contain w-32 h-32  mx-auto" src="{{ asset('storage/' . $person->image) }}" alt="" />
        </div>
        <div class="text-sm mt-1">
            <a href="#"
                class="font-medium leading-none text-white hover:text-indigo-600 transition duration-500 ease-in-out">{{ $person->name }}
            </a>
            <p>{{ $person->quote }}</p>
        </div>

        <div class="flex mt-4 justify-center">
            <p class="mt-2 text-sm text-white"> {{ $person->biograph }} </p>
        </div>
    
        <div class="flex mt-4 justify-center">
            <p>{{ $person->date }}</p>
        </div>
    
    </div>
</div>


</x-app-layout>
