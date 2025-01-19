<x-app-layout title="Foods">
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Foods') }}
            </h2>
            @haspermission('create-post')
            <a class="text-cyan-500 font-bold" href={{ route('foods.create') }}>Create</a>
            @endhaspermission
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-5">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <tbody>
                        @foreach ($foods as $food)
                            <tr class="border-b border-gray-800">
                                <!-- Title -->
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $food->title }}
                                </td>

                                <!-- Image -->
                                <td class="px-6 py-4">
                                    <img class="w-14 h-14 sm:h-20 sm:w-20 mx-auto" src="{{ $food->image }}"
                                        alt="{{ $food->title }}">
                                </td>

                                <!-- Actions -->
                                <td class="px-6 py-4 flex gap-2 items-center justify-end">
                                    <!-- Show Button -->
                                    <a href="{{ route('foods.show', $food->id) }}"
                                        class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                                        Show
                                    </a>

                                    <!-- Edit Button (Hidden on small screens) -->
                                    <a class="hidden sm:inline" href="{{ route('foods.edit', $food->id) }}"
                                        class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                                        Edit
                                    </a>

                                    <!-- Delete Form (Hidden on small screens) -->
                                    <form class="hidden sm:inline" action="{{ route('foods.destroy', $food->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>