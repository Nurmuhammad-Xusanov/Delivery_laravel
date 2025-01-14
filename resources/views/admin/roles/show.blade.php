<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <a href={{ route('role.index') }}><i class="fa-solid fa-chevron-left"></i></a>
                {{ __('Role info') }}
            </h2>
            <h2 class="text-cyan-500 font-bold">{{ ucfirst($role->name) }}</h2>
        </div>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 space-y-5 bg-gray-800 rounded py-2">
            <ul class="">
                @foreach ($role->permissions as $permission)
                    <li class="text-white">{{ $loop->iteration }}. {{ ucfirst($permission->name) }}
                    <li>
                @endforeach
            </ul>
            <div class="flex flex-col justify-end">
                <p class="text-gray-300 text-xs"><span class="text-cyan-500">Created at:</span>
                    {{ $role->created_at->format('Y-m-d H:i') }}</p>
                <p class="text-gray-300 text-xs"><span class="text-cyan-500">Updated at:</span>
                    {{ $role->updated_at->format('Y-m-d H:i') }}</p>
            </div>
            <div class="flex justify-end">
                <div class="flex gap-1 items-center">
                    <a class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:px-5 sm:py-2.5 py-1 px-2 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800"
                        href={{ route('role.edit', $role->id) }}>Edit</a>
                    <form action="{{ route('role.destroy', $role->id) }}" method="POST">
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
