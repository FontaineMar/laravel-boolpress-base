@extends('layouts.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo post</th>
            <th scope="col">Categoria</th>
            <th scope="col">Tag</th>
            <th scope="col">Descrizione</th>
        </tr>
        </thead>
        <tbody> 
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <th scope="row">{{$post->title}}</th>
                    <th scope="row">{{$post->category->title}}</th>
                    <th scope="row">
                        @foreach ($post->tags as $tag)
                            {{ $tag->name }}
                        @endforeach
                    </th>
                    <th scope="row">{{$post->information->description}}</th>
                    <th scope="row"><a href="{{route('boolpress.edit' , $post->id )}}">Aggiorna</a></th>
                    <th> 
                        <form action="{{route('boolpress.destroy', $post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">X</button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $posts->links() }}
    </div>
@endsection