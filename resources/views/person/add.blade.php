<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Person') }}
        </h2>
    </x-slot>

    <div class="flex flex-col min-h-screen items-center justify-start py-10">
    
        <div class=" flex-col justify-center items-center">
           <form method="POST" action="{{ route('person.store') }}"  enctype="multipart/form-data">
    
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="name">Name:</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
    
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="quote">Quote:</label>
                    <input type="text" id="quote" name="quote" value="{{ old('quote') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="biograph">Biograph:</label>
                    <textarea type="text" id="biograph" name="biograph" value="{{ old('biograph') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" rows="5" required></textarea>
                </div>
    
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Image:</label>
                    <input type="file" name="image" id="image" class="form-control-file p-2.5 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 ">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG or JPEG (MAX. 20MB).</p>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="date">Date:</label>
                    <input type="date" id="date" name="date" value="{{ old('date') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                
                <div class="mb-6 flex justify-center">
                    {{-- <a href="{{ route('guest.index') }}" class="rounded-l-full  bg-neutral-900 px-3.5 py-2 font-com text-sm capitalize text-white shadow shadow-black/60 hover:bg-slate-50 hover:text-neutral-900">Guest List</a> --}}
                    <button type="submit" class="rounded-lg group flex justify-center items-center bg-gray-800 px-3.5 py-2 font-com text-sm capitalize text-white shadow shadow-black/60 hover:bg-slate-50 hover:text-gray-800" >Add</button>
                </div>
                 </form>
            </div>
        </div>
</x-app-layout>
