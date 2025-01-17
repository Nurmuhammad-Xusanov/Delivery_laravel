<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <a href={{ route('workers.index') }}><i class="fa-solid fa-chevron-left"></i></a>
                {{ __('Worker edit') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 space-y-5 bg-gray-800 rounded py-2">
            <form action="{{route('workers.update', $user->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name:</label>
                    <input type="text" name="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{$user->name}}">
                </div>
                <div class="mb-6">
                    <label for="Email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email:</label>
                    <input type="email" name="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{$user->email}}">
                </div>
                <div class="mb-6">
                    <label for="Number"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number:</label>
                    <input type="text" name="number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{$user->number}}">
                </div>
                <div class="mb-6">
                    <label for="Role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role:</label>
                    <select name="role" id="role"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($roles as $role)
                            <option value="{{$role->name}}" {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'selected' : '' }}>{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="Password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number:</label>
                    <input type="password" name="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="password (optional)">
                </div>
                <button
                    class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:px-5 sm:py-2.5 px-2 py-1 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800"
                    type="submit">Edit</button>
            </form>
        </div>
    </div>
</x-app-layout>