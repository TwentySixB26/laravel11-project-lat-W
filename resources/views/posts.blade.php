<x-layout>
    <x-slot:title> {{ $title }} </x-slot:title>

    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-md sm:text-center">
            <form action="/posts" method="GET">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                    <div class="relative w-full">
                        <label for="search" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Searching</label>
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Searching artikel" type="search" id="search" name="search">
                    </div>
                    <div>
                        <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-primary-700 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- //posts diambil dari data tabel mana yang ingin ditampilkan  --}}
    {{ $posts->links() }}

    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($posts as $post )
                    {{-- <article class="mt-9  border-b border-b-gray-300 pb-10 max-w-xl">
                        <a href="/posts/{{ $post['slug'] }}">
                            <h1 class="font-bold text-gray-800 text-4xl tracking-tight">{{ $post['title']}}</h1>
                        </a>
                        <div class=" mt-1 text-gray-500 text-sm">
                            Post by
                            <a href="/authors/{{ $post->author->username }}" class="hover:underline">
                                {{ $post->author->name}} 
                            </a>|  
                            <a href="/category/{{ $post->category->slug }}" class="hover:underline">
                                {{ $post->category->title }}
                            </a>| 
                            {{ $post->created_at->diffForHumans() }}
                        </div>
                        <p class="font-light text-gray-700 my-6">{{ Str::limit($post['body'],150)  }}</p>
                        <a href="/posts/{{ $post['slug'] }}" class="text-blue-500 font-medium hover:underline " >Read More &raquo;</a>
                    </article> --}}
                    <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-between items-center mb-5 text-gray-500">
                            <a href="/posts?category={{ $post->category->slug }}">
                                <span class="bg-{{$post->category->color}}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                    {{ $post->category->title }}
                                </span>
                            </a>
                            <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="/posts/{{ $post['slug'] }}">{{ $post['title']}}</a></h2>
                        <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ Str::limit($post['body'],150)}}</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-4">
                                <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Jese Leos avatar" />
                                <a href="/posts?author={{ $post->author->username }}">
                                    <span class="font-medium dark:text-white text-sm">
                                        {{ $post->author->name}} 
                                    </span>
                                </a>
                            </div>
                            <a href="/posts/{{ $post['slug'] }}" class="inline-flex  text-sm items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                Read more &raquo;
                            </a>
                        </div>
                    </article>
                @empty 
                    <div class="block m-auto">
                        <p class="font-semibold text-4xl my-4">Post Not Found</p>
                        <a href="/posts" class="block text-blue-600 hover:underline"> &laquo; Back To All Post </a>
                    </div>
                @endforelse
            </div>  
        </div>
</x-layout>