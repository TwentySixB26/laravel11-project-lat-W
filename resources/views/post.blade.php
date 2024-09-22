<x-layout>
    <x-slot:title> {{ $title }} </x-slot:title>
    {{-- <article class="mt-9  pb-10 max-w-full">
        <h1 class="font-bold text-gray-800 text-4xl tracking-tight">{{ $post->title}}</h1>
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
        <p class="font-light text-gray-700 my-6">{{ $post->body }}</p>
        <a href="/posts" class="text-blue-500 font-medium hover:underline " >Back To Post</a>
    </article>     --}}


    <!-- 
Install the "flowbite-typography" NPM package to apply styles and format the article content: 

URL: https://flowbite.com/docs/components/typography/ 
-->

<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <a href="/posts" class="font-medium text-sm text-blue-600 hover:underline"> &laquo; Back to Post</a>
                <address class="flex items-center my-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                        <div>
                            <a href="/posts?author={{ $post->author->username }}" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name}} </a>
                            
                            <p class="text-sm text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">
                                <a href="/posts?category={{ $post->category->slug }}">
                                    <span class="bg-{{$post->category->color}}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                        {{ $post->category->title }}
                                    </span>
                                </a> {{ $post->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                </address>
                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $post->title}}</h1>
            </header>
            
            <p>{{ $post->body }}</p>
        </article>
    </div>
  </main>
</x-layout>