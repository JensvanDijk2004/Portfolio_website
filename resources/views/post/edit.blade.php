<x-layout title="{{ $post->title }}">
    <x-flexRow>
        <article class=" shadow-md rounded-lg p-10  bg-white w-1/3">
            <header class=" mb-5">
                <h2>Edit Post</h2>
            </header>
            <main>
                <form action="" method="POST" class="flex flex-col">
                    @csrf
                    @method('put')
                    <label for="title">Title:</label>
                    <input class=" bg-white border-blue-400 rounded-sm" type="text" name="title"
                        value="{{ old('title', $post->title) }}" id="title" autofocus>
                    @error('title')
                        <div class="text-red-400">{{ $message }}</div>
                    @enderror
                    <label for="subject">subject:</label>
                    <input class=" bg-white border-blue-400 rounded-sm" type="text" name="subject"
                        id="subject" value="{{ old('subject', $post->subject) }}">
                    @error('subject')
                        <div class="text-red-400">{{ $message }}</div>
                    @enderror
                    <label for="content">Content:</label>
                    <textarea class=" bg-white border-blue-400 rounded-sm" name="content" id="content" cols="30"
                        rows="10"> {{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <div class="text-red-400">{{ $message }}</div>
                    @enderror
                    <button class="mt-5 w-full bg-blue-500 text-white hover:bg-blue-800  text-lg" type="submit">
                        Save</button>
                </form>
            </main>
            <footer></footer>
        </article>
    </x-flexRow>
</x-layout>