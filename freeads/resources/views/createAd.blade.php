
 @extends('layout')


@section('contenu')
<section class="entire-page">

<h1> Ajouter une Ad</h1>
<form action="createAd" method="post" enctype= multipart/form-data>


    {{ csrf_field() }}

      @if($errors->has('title'))
            <p>{{$errors->first('title')}}</p>
        @endif
   <p> <input type="text" name="title" placeholder="Title" value="{{ old('title') }}"></p>

  
        @if($errors->has('category'))
            <p>{{$errors->first('category')}}</p>
        @endif
   <p> <input type="text" name="category" placeholder="Category" value="{{ old('category') }}"></p>

 
       @if($errors->has('description'))
            <p>{{$errors->first('description')}}</p>
        @endif
   <p> <textarea  name="description" placeholder="Description" value="{{ old('location') }}"></textarea></p>

   
       @if($errors->has('location'))
            <p>{{$errors->first('location')}}</p>
        @endif
   <p> <textarea type="text" name="location" placeholder="Location" value="{{ old('location') }}"></textarea></p>

  
       @if($errors->has('price'))
            <p>{{$errors->first('price')}}</p>
        @endif
    <p><input type="text" name="price" placeholder="Price" value="{{ old('price') }}"></p>

    @if($errors->has('picture'))
            <p>{{$errors->first('picture')}}</p>
        @endif
    <p><input type="file" name="picture" value="{{ old('picture') }}"></p>

    <input type="submit" value="Valider">
</form>
</section>
@endsection

