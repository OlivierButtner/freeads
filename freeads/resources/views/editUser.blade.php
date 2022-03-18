
 @extends('layout')


@section('contenu')
<section class="entire-page">

<h1>Mise à jour des informations persos</h1>

<form action="editUser" method="POST">


    {{ csrf_field() }}
       <p> <input type="hidden" name="id"  value="{{ $user->id }}"></p>
      @if($errors->has('nickname'))
            <p>{{$errors->first('nickname')}}</p>
        @endif
   <p> <input type="text" name="nickname" placeholder="Nickname" value="{{ $user->nickname }}"></p>


        @if($errors->has('email'))
            <p>{{$errors->first('email')}}</p>
        @endif
   <p> <input type="email" name="email" placeholder="Email" value="{{ $user->email  }}"></p>


       @if($errors->has('password'))
            <p>{{$errors->first('password')}}</p>
        @endif
   <p> <input type="password" name="password" placeholder="password" ></p>


       @if($errors->has('password_confirmation'))
            <p>{{$errors->first('password_confirmation')}}</p>
        @endif
   <p> <input type="password" name="password_confirmation" placeholder="password confirmation"></p>


       @if($errors->has('phone'))
            <p>{{$errors->first('phone')}}</p>
        @endif
    <p><input type="text" name="phone" placeholder="Phone" value="{{ $user->phone }}"></p>

    <input type="submit" value="Mettre à jour">
</form>
</section>
@endsection

