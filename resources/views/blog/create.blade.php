<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="w-4/5 mx-auto">
    <div class="text-center pt-20">
        <h1 class="text-3xl text-gray-700">
            Add new post
        </h1>
        <hr class="border border-1 border-gray-300 mt-10">
    </div>

    <div class="m-auto pt-20">

        <div class="pb-8">
            @if($errors->any())
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    Something went wrong...
                </div>
                <ul class="border border-t-0 border-red-400 rounded-b border-red-100 px-4 py-3 text-red-700">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <form
            action="{{route('blog.store')}}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <input
                    type="text"
                    name="title"
                    class="bg-gray-50 border border-gray-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Title..." required>


                <input
                    type="text"
                    name="excerpt"
                    placeholder="Excerpt..."
                    class="bg-gray-50 border border-gray-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                <input
                    type="number"
                    name="min_to_read"
                    placeholder="Minutes to read..."
                    class="bg-gray-50 border border-gray-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                <textarea
                    name="body"
                    placeholder="Body..."
                    class="bg-gray-50 border border-gray-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>

                <div class="bg-grey-lighter py-10">
                    <label
                        class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                    <span class="mt-2 text-base leading-normal">
                        Select a file
                    </span>
                        <input
                            type="file"
                            name="image"
                            class="hidden">
                    </label>
                </div>

                <input
                    type="text"
                    name="meta_description"
                    placeholder="Meta Description..."
                    class="bg-gray-50 border border-gray-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                <input
                    type="text"
                    name="meta_keywords"
                    placeholder="Meta Keywords..."
                    class="bg-gray-50 border border-gray-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                <input
                    type="text"
                    name="meta_robots"
                    placeholder="Meta Robots..."
                    class="bg-gray-50 border border-gray-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <div class="flex items-center mb-4">
                    <input name="is_published" type="checkbox" value=""
                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="is_published" class="ml-2 text-sm font-medium text-black-900 dark:text-black-300">Is
                        Published</label>
                </div>
            </div>
            <button
                type="submit"
                class="uppercase mt-15 bg-blue-500 text-black-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Submit Post
            </button>
        </form>
    </div>
</body>
</html>
