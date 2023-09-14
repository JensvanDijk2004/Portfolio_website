<x-layout>
    <x-flexRow>
        <article class="shadow-md rounded-lg p-10 bg-white w-1/3"> 
        <header>
            <h2>Create Post</h2>
        </header>
        <main >
            <form action="" method="post" class="flex flex-col" enctype="multipart/form-data">
                @csrf 
                <label for="title">Title:</label>
                <input class="bg-white border-blue-400 rounded-sm" type="text" name="title" id="title" autofocus>
                    @error('title')
                    <div class="text-red-400">{{$message}}</div>
                    @enderror
                <label for="subject">Subject:</label>
                <input class="bg-white border-blue-400 rounded-sm" type="text" name="subject" id="subject" value="{{old('subject')}}">
                    @error('subject')
                    <div class="text-red-400">{{$message}}</div>
                    @enderror
                <label for="content">Content</label>
                <textarea class="bg-white border-blue-400 rounded-sm" name="content" id="content" cols="30" rows="10">
                </textarea>
                    @error('content')
                        <div class="text-red-400">{{$message}}</div>
                    @enderror
                    
                <button type="submit">Create</button>
            </form>
        </main>
        <footer></footer>
        </article>
    </x-flexRow>
</x-layout>