@extends('layouts.main')
@section('content')
<form method="POST" action="{{route('boolpress.store')}}">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Nome Post</label>
      <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
    </div>
    <div class="mb-3">
        <label for="author" class="form-label">Nome autore</label>
        <input type="text" class="form-control" id="author" name="author" value="{{old('author')}}">
    </div>
    <div class="mb-3">
        <label class="form-label">Categoria</label>
        <select class="form-label" name="category_id">
            <option selected >---</option>
            @foreach($category as $cat)
                <option value="{{$cat->id}}">{{ $cat->title }}</option>
            @endforeach
        </select>
    </div>
    <fieldset>
        <legend>scegli il tag</legend>
        @foreach ($tags as $tag)
        <div>
            <input type="checkbox" id="coding" name="tags[]" value="{{$tag->id}}">
            <label for="coding"> {{$tag->name}}</label>
        </div>
            
        @endforeach
    </fieldset>

    <div class="form-floating">
        <label for="floatingTextarea2">Descrizione</label>
        <textarea class="form-control" name="description" id="floatingTextarea2" style="height: 100px" value="{{old('description')}}"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection