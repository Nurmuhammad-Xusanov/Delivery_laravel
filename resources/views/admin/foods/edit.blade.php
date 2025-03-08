<x-app-layout title="Foods create">
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <a href="{{ route('foods.index') }}"><i class="fa-solid fa-chevron-left"></i></a>
                {{ __('Food add') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 space-y-5 bg-gray-800 rounded py-2">
            <form action="{{ route('foods.update', $food->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="title"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" id="title" name="title" value="{{ $food->title }}"
                        class="bg-gray-50 border @error('title') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Title">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea id="description" name="description" rows="4"
                        class="bg-gray-50 border @error('description') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Description">{{ $food->description}}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="image"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                    <input accept="image/*" type="file" id="image" name="image"
                        class="bg-gray-50 border @error('image') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Image">
                    <div id="previewCont" class="mt-4">
                        <a data-fancybox="gallery" id="preview" href="{{$food->image}}">
                            <img id="previewImg" src="{{$food->image}}" alt="Preview"
                                class="{{ $food->image ? 'block' : 'hidden'}} h-32 object-cover rounded-lg">
                        </a>
                    </div>
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="price"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                    <input step="0.001" min="0" type="number" id="price" name="price" value="{{ $food->price }}"
                        class="bg-gray-50 border @error('image') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter price">
                    @error('price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex sm:justify-start justify-end">
                    <button
                        class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:px-5 sm:py-2.5 px-2 py-1 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800"
                        type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
<script>
    document.getElementById('image').addEventListener('change', function () {
        const file = this.files[0];
        const previewImg = document.getElementById('previewImg');
        const preview = document.getElementById('preview');
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                preview.href = e.target.result;
                previewImg.src = e.target.result;
                previewImg.classList.remove('hidden');
                previewImg.classList.add('w-28', 'h-28', 'rounded', 'mt-2');
            };
            reader.readAsDataURL(file);
        }
    });
</script>