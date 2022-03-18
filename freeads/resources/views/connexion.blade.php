
  @extends('layout')


@section('contenu')
 

<section class="entire-page">
    <h1>LOGIN</h1>
     @include('flash::message')
<form action="/connexion" method="post">
        {{ csrf_field() }}


            <div class="field">


                <p><input class="input" type="text" name="login" placeholder="Nickname or Email"
                          value="{{ old('login') }}"></p>

                @if($errors->has('login'))
                    <p>{{ $errors->first('login') }}</p>
                @endif


                <input class="input" type="password" name="password" placeholder="password">

                @if($errors->has('password'))
                    <p>{{ $errors->first('password') }}</p>
                @endif



                <input type="submit" value="LOGIN">
        
        </div>
    </form>
</section>
    @endsection

