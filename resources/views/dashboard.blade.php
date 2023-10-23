<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @foreach ($persons as $person)
    <div class="py-12">
        <div class="py-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ $person->name  }}
                </div>
           
                    <div class="flex justify-between items-center">
                        <form action="{{ route('person.destroy', ['id' => $person->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button  class="rounded-full bg-neutral-900 px-3.5 py-2 font-com text-sm capitalize text-white shadow shadow-black/60 hover:bg-slate-50 hover:text-neutral-900" type="submit">Delete</button>
                        </form>
            
                        <a href="{{ route('person.details', ['id' => $person->id]) }}" class="rounded-full bg-neutral-900 px-3.5 py-2 font-com text-sm capitalize text-white shadow shadow-black/60 hover:bg-slate-50 hover:text-neutral-900">Detail</a>
                        <a href="{{ route('person.edit', ['id' => $person->id]) }}" class="rounded-full bg-neutral-900 px-3.5 py-2 font-com text-sm capitalize text-white shadow shadow-black/60 hover:bg-slate-50 hover:text-neutral-900">Update</a>
                    </div>
                
            </div>
        </div>
    </div>
    @endforeach

</x-app-layout>
