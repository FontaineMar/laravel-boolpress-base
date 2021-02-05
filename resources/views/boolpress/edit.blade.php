@extends('layouts.main')
@section('content')
<form method="POST" action="{{route('boolpress.update',$post->id)}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="tilte" class="form-label">Titolo</label>
      <input type="text" class="form-control"  name="title" value="{{ $post->title }}">
    </div>
    <div class="mb-3">
        <label for="author" class="form-label">Autore</label>
        <input type="text" class="form-control"  name="author" value="{{ $post->author }}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <input type="text" class="form-control"  name="description" value="{{ $post->information->description }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Categoria</label>
        <select class="form-label" name="category_id" >
            @foreach($categories as $category)
                <option  value="{{$category->id}}" {{$category->id == $post->category->id ? 'selected' : ''}}>{{ $category->title }} </option>
            @endforeach
        </select>
        <fieldset>
            <legend>scegli il tag</legend>
            @foreach ($tags as $tag)
            <div>
                <input type="checkbox" id="coding" name="tags[]" value="{{ $tag->id }}" >
                <label for="coding">{{ $tag->name }}</label>
            </div>
                
            @endforeach
        </fieldset>
    
    </div> 
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection