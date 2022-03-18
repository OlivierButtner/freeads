
 @extends('layout')


@section('contenu')
<section class="entire-page">

<h1> Editer une Ad</h1>
<form action="editAd" method="post" enctype= multipart/form-data>


    {{ csrf_field() }}
    <p> <input type="hidden" name="id"  value="{{ $ad->id }}"></p>
      @if($errors->has('title'))
            <p>{{$errors->first('title')}}</p>
        @endif
   <p> <input type="text" name="title" placeholder="Title" value="{{ $ad->title }}"></p>

  
        @if($errors->has('category'))
            <p>{{$errors->first('category')}}</p>
        @endif
   <p> <input type="text" name="category" placeholder="Category" value="{{ $ad->category }}"></p>

 
       @if($errors->has('description'))
            <p>{{$errors->first('description')}}</p>
        @endif
   <p> <textarea  name="description" placeholder="Description" >{{ $ad->description }}</textarea></p>

   
       @if($errors->has('location'))
            <p>{{$errors->first('location')}}</p>
        @endif
   <p> <textarea type="text" name="location" placeholder="Location" >{{ $ad->location }}</textarea></p>

  
       @if($errors->has('price'))
            <p>{{$errors->first('price')}}</p>
        @endif
    <p><input type="text" name="price" placeholder="Price" value="{{ $ad->price }}"></p>



    <input type="submit" value="Mettre à jour">
</form>
</section>
@endsection

