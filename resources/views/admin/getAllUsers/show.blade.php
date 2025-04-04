<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between items-center">
            <div class="flex gap-1">
                <a href={{ url()->previous() }}><i
                        class="ri-arrow-left-s-line text-indigo-400 dark:text-indigo-600"></i></a>
                <p>{{ $user->name }}</p>
            </div>
            <p class="text-base text-gray-500 dark:text-gray-400"> {{ $user->getRoleNames()->first() }}</p>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="w-full">
                        <p>Email: <a class="text-gray-500 dark:text-gray-400"
                                href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>
                        <p>Phone: <a class="text-gray-500 dark:text-gray-400"
                                href="tel:{{ $user->phone }}">{{ $user->phone }}</a></p>
                        <div class="flex mt-2 justify-end">
                            <a href="{{ route('users.edit', $user->id) }}"
                                class="text-blue-700 transition-all hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Edit</a>

                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-70 transition-all text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
