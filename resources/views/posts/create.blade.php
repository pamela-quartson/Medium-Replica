<x-app-layout>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Create Post</title>

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            input{
                border: 10px 20px;
                padding: 1px solid #666;
                margin: 10px;
                width: 30%;
            }
        </style>
    </head>

    <body class="antialiased">
        <x-slot name="title">
            <h1>Create new post</h1>
        </x-slot>
        <div class="relative min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <h1>Create new post</h1><br>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    
                    <form action="/posts" method="POST" enctype="multipart/form-data">
                        @csrf                    
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="col-span-6 sm:col-span-4">
                                <textarea name="title" rows="1" cols="60" placeholder="Title" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" required=""></textarea><br>
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <textarea name="content" rows="5" cols="60" placeholder="Content" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" required=""></textarea><br>
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <input type="text" name="tags" required="" placeholder="Tags" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"><br>
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <label class="block font-medium text-sm text-gray-700">Select categories</label><br>
                            @foreach($categories as $cat)
                                  <label class="block font-medium text-sm text-gray-700" for="{{ $cat->id }}">
                                    <input type="checkbox" class="form-checkbox border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="{{ $cat->name }}">
                                    <span class="ml-2">{{ $cat->title }}</span>
                                  </label>
                            @endforeach
                            </div>
                            
                            <div class="col-span-6 sm:col-span-4">
                                <label class="block font-medium text-sm text-gray-700">Upload image</label><br>
                                <input type="file" name="image" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" ><br>
                            </div>
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Post</button>
                        </div>
                    </form>       
            </div>
        </div>
    </body>
</html>

</x-app-layout>
