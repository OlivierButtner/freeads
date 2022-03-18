
 @extends('layout')


@section('contenu')
<section class="entire-page">

<form action="signup" method="post">


    {{ csrf_field() }}

      @if($errors->has('nickname'))
            <p>{{$errors->first('nickname')}}</p>
        @endif
   <p> <input type="text" name="nickname" placeholder="Nickname" value="{{ old('name') }}"></p>

  
        @if($errors->has('email'))
            <p>{{$errors->first('email')}}</p>
        @endif
   <p> <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"></p>

 
       @if($errors->has('password'))
            <p>{{$errors->first('password')}}</p>
        @endif
   <p> <input type="password" name="password" placeholder="password"></p>

   
       @if($errors->has('password_confirmation'))
            <p>{{$errors->first('password_confirmation')}}</p>
        @endif
   <p> <input type="password" name="password_confirmation" placeholder="password confirmation"></p>

  
       @if($errors->has('phone'))
            <p>{{$errors->first('phone')}}</p>
        @endif
    <p><input type="text" name="phone" placeholder="Phone" value="{{ old('phone') }}"></p>

    <input type="submit" value="M'inscrire">
</form>
</section>
@endsection

