@props(['post'])

<article class="bg-white shadow-md rounded-md p-10 m-10">
    <header class="flex justify-center font-bold text-2xl  ">
        <h2>{{ $post->title }}</h2>
    </header>
    <main class="m-5 truncate">
        <p>{{ $post->content }}</p>
    </main>
    <footer>
        <a class=" bg-blue-400 text-white rounded-lg p-2 hover:bg-blue-500"
            href="{{ route('showPost', [$post->id]) }}">Lees Meer....</a>
    </footer>
</article>