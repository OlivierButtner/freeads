
 
 @extends('layout')


@section('contenu')
<section class="entire-page">
        @include('flash::message')
 <h1 class="title is-1">Mon Compte // {{auth()->user()->nickname}} // <a class="link-topbar" onclick="return confirm('Are you sure?')" href="/editUser/{{Auth::user()->id}}">Edit your profil </a> // <?php 
    if(Auth::user()->admin){
            echo '<a class="link-topbar" href="/admin" class="button">Page admin</a>';
        }
    ?></h1>

         

       
        
       
   
  <h2>Gestion des mes Ads</h2>
               <table class="content-table">
                     <thead>
                     <tr>
                            <th>title</th>
                            <th>category</th>
                            <th>description</th>
                            <th>price</th>
                            <th>location</th>
                            <th>date création</th>
                            <th>picture</th>
                            <th></th>
                            <th></th>
                     
                     </tr>
                     </thead>
                     <tbody>
                              @foreach($ads as $ad)
                     <tr>
                                   <td>{{ $ad->title }}</td>
                                   <td>{{ $ad->category }}</td>
                                   <td>{{ $ad->description }}</td>
                                   <td>{{ $ad->price }}</td>
                                   <td>{{ $ad->location }}</td>
                                   <td>{{ $ad->created_at }}</td>
                                   <td> <img src="storage/{{ $ad->picture }}" > </td>
                                   <td><a class="link-topbar" onclick="return confirm('Are you sure?')" href="/editAd/{{$ad->id}}">EDIT</a></td>
                                    <td><a class="link-topbar" onclick="return confirm('Are you sure?')" href="/deleteAd/{{$ad->id}}">DELETE</a></td>
                                   
                     </tr>

             
                @endforeach
                            
                         
                     </tbody>
                     </table>
                     </section>
     @endsection




