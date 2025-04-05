<x-app-layout>
    @section('title', 'Delivery | ' . $user->name)

    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between items-center">
            <p>{{ $user->name }}</p>
            <p class="text-base text-gray-500 dark:text-gray-400"> {{ $user->getRoleNames()->first() }}</p>
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ showModal: false }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="w-full">
                        <p>Email: <a class="text-gray-500 dark:text-gray-400"
                                href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>
                        <p>Phone: <a class="text-gray-500 dark:text-gray-400"
                                href="tel:{{ $user->phone }}">{{ $user->phone }}</a></p>
                        <div class="flex mt-2 justify-end">
                            @if (auth()->user()->id === $user->id)
                                <a href="{{ route('profile.edit', $user->id) }}"
                                    class="text-blue-700 transition-all duration-150 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Edit</a>
                            @else
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="text-blue-700 transition-all duration-150 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Edit</a>
                            @endif

                            @if (auth()->user()->id !== $user->id)
                                <button @click="showModal = true" type="button"
                                    class="text-red-700 transition-all duration-150 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Window -->
        <div x-show="showModal" class="fixed  inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
            <div x-show="showModal" x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="scale-90 opacity-0" x-transition:enter-end="scale-100 "
                x-transition:leave="transition ease-in duration-300 transform"
                x-transition:leave-start="scale-100 opacity-100" x-transition:leave-end="scale-90 opacity-0" <div
                @click.away="showModal = false"
                class="bg-white dark:bg-gray-900 p-5 rounded-lg shadow-lg max-w-sm w-full">
                <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100">Confirm Deletion</h2>
                <p class="mb-4 text-gray-700 dark:text-gray-300">Are you sure you want to delete <strong>{{$user->name}}?</strong></p>
                <div class="flex justify-end space-x-2">
                    <button @click="showModal = false"
                        class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 dark:bg-gray-700 dark:text-white rounded text-sm">
                        Cancel
                    </button>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="ml-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded text-sm">
                            Yes, Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
</x-app-layout>
