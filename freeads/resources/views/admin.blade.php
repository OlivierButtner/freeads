
     
  @extends('layout')


@section('contenu')
 <section class="entire-page">
 <h1 class="title is-1">Mon Compte Admin // {{ Auth::user()->nickname }}</h1>

        @include('flash::message')
       

        
        
        <h2>Gestion des utilisateurs</h2>

        <table class="content-table">
                     <thead>
                     <tr>
                            <th>nickname</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>Date création</th>
                            <th>is_Admin</th>
                            <th></th>
                            <th></th>
                          
                     </tr>
                     </thead>
                     <tbody>
                              @foreach($users as $user)
                     <tr>
                                   <td>{{ $user->nickname }}</td>
                                   <td>{{ $user->email }}</td>
                                   <td>{{ $user->phone }}</td>
                                   <td>{{ $user->created_at }}</td>
                                   <td>{{ $user->admin ? 'Admin' : 'visiteur' }}</td>
                                   <td><a class="link-topbar" onclick="return confirm('Are you sure?')" href="/editUserAdmin/{{$user->id}}">EDIT</a></td>
                                   <td><a class="link-topbar" onclick="return confirm('Are you sure?')" href="/deleteUser/{{$user->id}}">DELETE</a></td>
                     </tr>

             
                             @endforeach
                            
                         
                     </tbody>
                     </table>
              <h2>Gestion des Ads</h2>
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
                            <th>Edit By</th>
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
                                   <td>{{ $ad->nickname }}</td>
                                   <td><a class="link-topbar" onclick="return confirm('Are you sure?')" href="/editAdAdmin/{{$ad->id}}">EDIT</a></td>
                                   <td><a class="link-topbar" onclick="return confirm('Are you sure?')" href="/deleteAd/{{$ad->id}}">DELETE</a></td>
                                   
                     </tr>

             
                             @endforeach
                            
                         
                     </tbody>
                     </table>
       </section>
           @endsection

          
         

