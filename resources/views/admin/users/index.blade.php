@extends('layouts.app')

@section('content')

<div class="container col-md-9 col-lg-9">

    <div class="panel panel-primary ">
        <div class="panel-heading">
            <h1> Users</h1>
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <!--<p class="word">The more {{ Auth::user()->fname }} does, the more {{ Auth::user()->fname }} can do.</p>-->

                </div>

        

      
                <div class="container col-md-12 col-lg-12">
                        <div class="panel panel-primary ">
                        
                            <div class="panel-body">
                                       <table
                                          data-toggle="table"
                                          data-search="true"
                                         >
                                          <thead>
                                            <tr>
                                            <th>Image</th>
                                              <th>First Name</th>
                                              <th>Last Name</th>
                                              <th>Email</th>
                                              <th>Phone </th>
                                              <th>role</th>
                                              <th></th>  
                                              <th></th>
                                                
                                                    
                                            </tr>
                                          </thead>
                                          <tbody>
                                                @if(Auth::user()->role_id==1)
                                                @foreach($users as $user)
                                                
                                          <tr id="tr-id-{{$i+1}}" class="tr-class-{{$i+1}}" data-title="bootstrap table" >
                                                <td id="td-id-{{$i+1}}" class="td-class-{{$i+1}}" data-title="bootstrap table">
                                                        <img class="profile-pic round-pic" src="{{asset('images/'.$user->image)}}">
                                                        </td>
                                          
                                              <td >
                                              {{$user->fname}}
                                              </td>
                                              <td >{{$user->lname}}</td>
                                           
                                              <td>{{$user->email}} </td>
                                              
                                              <td>{{$user->phone_number}}</td>

                                              <td>{{$user->role->name}}</td>
                                             <td> <a  href="users/{{$user->id}}" >View user</a></td>
                                              @if($user->role_id==3)
                                              <td>Make Admin</td>
                                            @endif
                                           
                                            </tr>
                                          
                                            @endforeach
                                            @endif
                                          </tbody>
                                        </table>
                            </div>
                        </div>
                    </div>
                </div>
  

    @endsection
