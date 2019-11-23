@extends('layouts.app')

@section('content')

<div class="container col-md-9 col-lg-9">
        <div class="container col-md-12 col-lg-12">
            <div class="panel panel-primary ">

                <div class="panel-body">
                        <div class="card">
                                <div class="header">
                                    <h2>Employee List</h2>
                                    <ul class="header-dropdown">
                                        <li><a href="javascript:void(0);" class="btn btn-info" data-toggle="modal" data-target="#addcontact">Add New</a></li>
                                    </ul>
                                </div>
                                <div class="body">


                           <table
                              data-toggle="table"
                              data-search="true"
                             >
                              <thead>
                                <tr>
                                  <th>Image</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Phone number</th>
                                  <th>Role </th>
                                  <th>Gender</th>


                                </tr>
                              </thead>
                              <tbody>

                                    @foreach($staffs as $staff)

                              <tr id="tr-id-{{$i}}" class="tr-class-{{$i}}" data-title="bootstrap table" >
                                  <td id="td-id-{{$i}}" class="td-class-{{$i}}" data-title="bootstrap table">
                                    <a  href="profile/{{$staff->user->id}}" > <img class="profile-pic round-pic" src="{{asset('images/'.$staff->user->image)}}"></a>
                                  </td>
                                  <td>{{$staff->user->lname.' '.$staff->user->fname}}</td>
                                  <td>{{ $staff->user->email }}</td>
                                  <td>{{ $staff->user->phone_number }}</td>
                                  <td>{{ $staff->user->role->name }}</td>




                                  @if($staff->user->gender==1)
                                  <td>Male</td>
                                @elseif($staff->user->gender==0)
                                <td>Female</td>
                                @endif
                                </tr>
                                {{$i++}}
                                @endforeach

                              </tbody>
                            </table>
                </div>
            </div>
        </div>
    </div>
            </div></div>

<!-- Default Size -->
<div class="modal animated zoomIn" id="addcontact" tabindex="-1" role="dialog">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Add New staff</h6>
                </div>
                <div class="modal-body">
                        <form method="post" name="form-buses" action="{{ route('staff.store') }}" enctype="multipart/form-data">
                    <div class="row clearfix">

                                {{ csrf_field() }}
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="fname" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="lname" placeholder="Last Name">
                                </div>
                            </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Email ID">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                    <select name="role" id="role" class="form-control">
                                        <option value="">Role..</option>
                                            @foreach ($roles as $role)
                                                @if($role->id==1||$role->id==3)
                                                @else
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">Gender..</option>
                                    <option value="1">Male</option>
                                    <option value="0">Female</option>
                                    </select>
                            </div>
                        </div>

                        <!--<div class="col-12">
                            <div class="form-group">
                                <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                            </div>
                            <hr>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Facebook">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Twitter">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Linkedin">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="instagram">
                            </div>
                        </div>-->
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Add">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
            </div>

        </div>
    </div>


    @endsection
