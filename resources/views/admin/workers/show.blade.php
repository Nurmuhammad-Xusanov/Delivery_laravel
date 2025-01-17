<x-app-layout>
    @foreach ($user->roles as $role)
        <x-slot name="header">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    <a href={{ route('workers.index') }}><i class="fa-solid fa-chevron-left"></i></a>
                    {{ __($user->name) }}
                </h2>
                <a class="text-cyan-500 font-bold"
                    href="{{route('role.show', $role->id)}}">{{ ucfirst(string: $role->name) }} </a>
            </div>
        </x-slot>
        <div class="py-10">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 space-y-5 bg-gray-800 rounded py-2">
                <div>
                    <p class="text-white">Email:</p>
                    <p class="text-gray-500 px-2">{{$user->email}}</p>
                </div>
                <div>
                    <p class="text-white">Number:</p>
                    <p class="text-gray-500 px-2">{{$user->number}}</p>
                </div>
                <div>
                    <ul>
                        <li class="text-white">Permissions:</li>
                        @foreach ($role->permissions as $permission)
                            <li class="text-gray-500 px-2">• {{ ucfirst($permission->name) }}
                            <li>
                        @endforeach
                    </ul>
                </div>
                <div class="flex flex-col justify-end">
                    <p class="text-gray-300 text-xs"><span class="text-cyan-500">Created at:</span>
                        {{ $user->created_at->format('Y-m-d H:i') }}</p>
                    <p class="text-gray-300 text-xs"><span class="text-cyan-500">Updated at:</span>
                        {{ $user->updated_at->format('Y-m-d H:i') }}</p>
                </div>
                <div class="flex justify-end">
                    <div class="flex gap-1 items-center">
                        <div class="flex gap-1 items-center py-1">
                            <a class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:px-5 sm:py-2.5 py-1 px-2 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800"
                                href={{ route('workers.edit', $user->id) }}>Edit</a>
                            <form action="{{ route('workers.destroy', $user->id) }}" method="POST">
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
    @endforeach
</x-app-layout>