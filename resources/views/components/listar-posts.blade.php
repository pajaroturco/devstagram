<div>
    @if (!$posts->count())
            <p class="text-center text-gray-700 text-sm uppercase font-bold">No hay publicaciones</p>
        @else
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($posts as $post)
                    <div>
                        <a href="{{route('posts.show', ['post' => $post, 'user' => $post->user])}}">
                            <img src="{{asset('uploads/'.$post->imagen)}}" alt="Imagen de post {{$post->titulo}}" />  
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="my-10">
                {{$posts->links()}}
            </div>
        @endif
</div>