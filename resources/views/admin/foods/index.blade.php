<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Foods') }}
            </h2>
            @haspermission('add-foods')
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
                            <tr class=" border-b  border-gray-800">
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $food->title }}
                                </td>
                                <td class="px-6 py-4">
                                    {{$fod->description}}
                                </td>
                                <td>
                                    <img src={{$food->image}} alt="{{$food->title}}">
                                </td>
                                <td class="flex justify-end">
                                    <div class="flex gap-1 items-center py-1">
                                        <a class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm sm:px-5 sm:py-2.5 py-1 px-2 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800"
                                            href={{ route('foods.show', $food->id) }}>Show</a>

                                        <a class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:px-5 sm:py-2.5 py-1 px-2 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800"
                                            href={{ route('foods.edit', $food->id) }}>Edit</a>
                                        <form action="{{ route('foods.destroy', $food->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm sm:px-5 sm:py-2.5 py-1 px-2 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>