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

            <div class="relative min-h-52 p-4">
                <a data-fancybox="gallery" href="{{$food->image}}">
                    <img class="sm:max-h-40 md:max-h-44 max-h-40 rounded-lg float-left mr-4 mb-2" src="{{$food->image}}"
                        alt="{{$food->title}}">
                </a>

                <h1 class="text-white text-lg font-bold">{{$food->title}}</h1>
                <p class="text-white">{{$food->description}}</p>
            </div>

            <div
                class="fixed bottom-0 left-1/2 transform -translate-x-1/2 w-full max-w-7xl mx-auto px-6 lg:px-8 bg-gray-800">
                <div class="w-full pt-2 flex justify-between items-center">
                    <div class="flex flex-col justify-end">
                        <p class="text-gray-300 text-xs"><span class="text-cyan-500">Created at:</span>
                            {{ $food->created_at->format('Y-m-d H:i') }}</p>
                        <p class="text-gray-300 text-xs"><span class="text-cyan-500">Updated at:</span>
                            {{ $food->updated_at->format('Y-m-d H:i') }}</p>
                    </div>
                    <div class="flex justify-end ">
                        <div class="flex gap-1 items-center">
                            <a class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:px-5 sm:py-2.5 py-1 px-2 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800"
                                href={{ route('foods.edit', $food->id) }}>Edit</a>
                            <form action="{{ route('foods.destroy', $food->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm sm:px-5 sm:py-2.5 py-1 px-2 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</x-app-layout>