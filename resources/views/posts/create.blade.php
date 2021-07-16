<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">Create new post</h1>
    </x-slot>
    <x-slot name="slot">
        <div class="container px-4 px-lg-5 rounded-md shadow-sm">
            <div class="row gx-4 gx-lg-5">
                <br>
                <div class="col-md-10 col-lg-8 col-xl-7">
                    @if(session('status'))
                        <div class="alert alert-success p-4">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="/posts" method="POST" enctype="multipart/form-data">
                        @csrf                    
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="col-span-6 sm:col-span-4">
                                <textarea name="title" rows="1" cols="70" placeholder="Title" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm @error('title') is-invalid @enderror">{{ old('title') }}</textarea><br>
                                @error('title')
                                    <div class="alert alert-danger text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <textarea name="content" rows="7" cols="70" placeholder="Content" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm @error('content') is-invalid @enderror">{{ old('content') }}</textarea><br>
                                @error('content')
                                    <div class="alert alert-danger text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <textarea type="text" name="tags" rows="1" cols="70" placeholder="Tags" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm @error('tags') is-invalid @enderror">{{ old('tags') }}</textarea><br>
                                @error('tags')
                                    <div class="alert alert-danger text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <label class="block font-medium text-sm text-gray-700">Select categories</label><br>
                            @foreach($categories as $cat)
                                  <label class="block font-medium text-sm text-gray-700" for="{{ $cat->id }}">
                                    <input type="checkbox" class="form-checkbox border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm @error('category') is-invalid @enderror" name="category[]" value="{{ old('category[]') }}">
                                    <span class="ml-2">{{ $cat->title }}</span>
                                  </label>
                            @endforeach
                                @error('category')
                                    <div class="alert alert-danger text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-span-6 sm:col-span-4">
                                <label class="block font-medium text-sm text-gray-700">Upload image</label><br>
                                <input type="file" name="image" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm @error('image') is-invalid @enderror" value="{{ old('image') }}" ><br>
                                @error('image')
                                    <div class="alert alert-danger text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-80 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Post</button>
                        </div>
                        <br>
                    </form>
                </div>       
            </div>
        </div>
    </x-slot>
</x-app-layout>

