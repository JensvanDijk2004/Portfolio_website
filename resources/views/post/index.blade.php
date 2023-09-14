<x-layout title="Hallo world">
    <div class=" grid grid-cols-2  mr-60 ml-60">
        @foreach ($posts as $post)
        
            <x-postCard :post="$post"></x-postCard>
        @endforeach
    </div>

    {{ $posts->links() }}

</x-layout>