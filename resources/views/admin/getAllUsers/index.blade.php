<x-app-layout>
    @section('title', 'Delivery | Users')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div  class="w-full">
                        @foreach ($users as $user)
                            <div class="flex justify-between border-b-2 border-gray-100 dark:border-gray-700 pb-2 pt-2">
                                <p>{{ $user->name }}</p>
                                <div>
                                    <a class="hover:text-gray-700 dark:hover:text-gray-300 transition duration-150" href="{{route('users.show', $user->id)}}">show</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
