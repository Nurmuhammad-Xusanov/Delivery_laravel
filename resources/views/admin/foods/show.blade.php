<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <a href={{ route('foods.index') }}><i class="fa-solid fa-chevron-left"></i></a>
                {{ __('Food info') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 space-y-5 bg-gray-800 rounded py-2">

            <div class="flex flex-col lg:flex-row items-center lg:items-stretch space-y-4 lg:space-y-0 lg:space-x-4">
                <!-- Image Section -->
                <div class="w-full lg:w-1/3 flex-shrink-0">
                    <img class="w-full h-full object-cover rounded" src="{{$food->image}}" alt="{{$food->title}}">
                </div>

                <!-- Description Section -->
                <div class="flex flex-col gap-2 w-full lg:w-2/3">
                    <h1 class="text-white text-lg font-bold text-center lg:text-left">{{$food->title}}</h1>
                    <div class="flex-1 overflow-y-auto">
                        <p class="text-white">{{$food->description}}</p>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto space-y-5">
                <div class="flex justify-between items-center border-b border-gray-700">
                    <h1 id={{ $food->id }} class="text-white">{{ ucfirst($food->title) }}</h1>
                    <div class="flex gap-1 items-center">
                        <a class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:px-5 sm:py-2.5 py-1 px-2 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800"
                            href={{ route('role.edit', $food->id) }}>Edit</a>
                        <form action="{{ route('role.destroy', $food->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm sm:px-5 sm:py-2.5 py-1 px-2 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="flex flex-col justify-end">
                <p class="text-gray-300 text-xs"><span class="text-cyan-500">Created at:</span>
                    {{ $food->created_at->format('Y-m-d H:i') }}</p>
                <p class="text-gray-300 text-xs"><span class="text-cyan-500">Updated at:</span>
                    {{ $food->updated_at->format('Y-m-d H:i') }}</p>
            </div>

            <div class="flex justify-end">
                <div class="flex gap-1 items-center">
                    <a class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:px-5 sm:py-2.5 py-1 px-2 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800"
                        href={{ route('role.edit', $food->id) }}>Edit</a>
                    <form action="{{ route('role.destroy', $food->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm sm:px-5 sm:py-2.5 py-1 px-2 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>