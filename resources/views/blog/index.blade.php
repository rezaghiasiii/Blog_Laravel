@php use Illuminate\Support\Facades\Auth; @endphp
<html>
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    />
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    />
    <title>
        Laravel App
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="dark:bg-gradient-to-b from-gray-700 to-gray-900">
<div class="w-4/5 mx-auto">
    <div class="text-center pt-10">
        <h1 class="text-3xl text-gray-500">
            All Articles
        </h1>
        <hr class="border border-1 border-gray-300 mt-10">
    </div>

    @if(Auth::user())
        <div class="py-10 sm:py-20 text-center">
            <a class="primary-btn inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400"
               href="{{ route('blog.create') }}">
                New Article
            </a>
            <a class="ml-2 primary-btn inline text-base sm:text-xl bg-purple-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-purple-400"
               href="{{ route('dashboard') }}">
                Dashboard
            </a>
        </div>
    @endif
</div>

@if(session()->has('message'))
    <div class="mx-auto w-4/5 p-10">
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
            Warning
        </div>
        <div class="border border-t-1 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            {{session()->get('message')}}
        </div>
    </div>
@endif

@if(Auth::check())
    <div class="mx-auto w-4/5">
        <div class="grid grid-cols-3 grid-rows-4 gap-6">
            @foreach($posts as $post)
                <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="relative bottom-2 w-full  px-4 ">
                        <a class=" inline-block h-40 overflow-hidden w-full rounded-lg" href="#">
                            <img
                                class="w-full h-full object-cover transform transition duration-200 hover:scale-110"
                                src="{{$post->image_path}}" alt=""/>
                        </a>
                    </div>
                    <div class="p-5">
                        <a href="{{route('blog.index')}}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{strlen($post->title) < 30 ? $post->title : substr($post->title,'0','30').' ... '}}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            {{strlen($post->excerpt) < 30 ? $post->excerpt : substr($post->excerpt,'0','30').' ... '}}
                        </p>
                        <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            Made by: {{$post->user->name}} on {{$post->updated_at->format('d/m/y')}}
                        </p>

                        @if(Auth::id()===$post->user->id)

                            <div class="grid grid-cols-2 gap-2 py-3">
                                <div
                                    class="py-2 font-bold text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <a href="{{route('blog.edit',$post->id)}}"
                                       class="">
                                        Edit
                                    </a>
                                </div>
                                <div
                                    class="font-bold text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    <form
                                        action="{{route('blog.destroy',$post->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="inline-block" type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="w-4/5 mx-auto p-10 grid grid-cols-2">
        {{$posts->links('pagination::tailwind')}}
    </div>
@else
    <div class="w-4/5 mx-auto pb-10">
        <div class="bg-white pt-10 rounded-lg drop-shadow-2xl sm:basis-3/4 basis-full sm:mr-8 pb-10 sm:pb-0">
            <div class="w-11/12 mx-auto pb-10">
                <h2 class="text-gray-900 text-2xl font-bold pt-6 pb-0 sm:pt-0 hover:text-gray-700 transition-all text-center">
                    You are UnAuthorize! Please Login or Register
                </h2>
                <a href="{{route('login')}}"
                   class="block italic text-center text-blue-600 border-b border-green-400">
                    Login
                </a>
                <a href="{{route('register')}}"
                   class="block italic text-center text-green-500 border-b border-green-400">
                    Register
                </a>
            </div>
        </div>
    </div>
@endif

</body>
</html>
