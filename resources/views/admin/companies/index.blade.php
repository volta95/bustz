@extends('layouts.app')

@section('content')

<div class="container col-md-9 col-lg-9">

    <div class="panel panel-primary ">
        <div class="panel-heading">
            <h1> Companies</h1>
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
                                              <th>company Name</th>
                                              <th>Address </th>
                                              <th>Email</th>
                                              <th>Phone</th>
                                              <th>TIN</th>
                                              <th>Status</th>
                                              <th></th>
                                            </tr>
                                          </thead>
                                          <tbody>

                                                @foreach($companies as $company)

                                          <tr id="tr-id-{{$i++}}" class="tr-class-{{$i}}" data-title="bootstrap table" >
                                              <td id="td-id-{{$i}}" class="td-class-{{$i}}" data-title="bootstrap table">
                                                <a  href="companies/{{$company->id}}" >{{$company->name}}</a>
                                              </td>
                                              <td >{{$company->address}}</td>

                                              <td>{{$company->email}} </td>

                                              <td>{{$company->phone}}</td>
                                              <td>{{$company->tin}}</td>
                                              @if($company->status==0)
                                              <td>Pedding</td>
                                              <td><a href="#" onclick="var result=confirm('Are you sure you want to confirm {{$company->name}}?');
                                                if(result){
                                                    event.preventDefault();
                                                    document.getElementById('confirm-form').submit();
                                                }
                                                ">Confirm</a>
                                                    <form id="confirm-form" action="{{route('companies.update',[$company->id])}}" method="POST" style="display:none">
                                                        <input type="hidden" name="_method" value="put">
                                                        {{ csrf_field() }}
                                                    </form></td>
                                            @elseif($company->status==1)
                                            <td>Active</td>
                                            <!--<td><a href="#" onclick="var result=confirm('Are you sure you want to ban this company?');
                                                if(result){
                                                    event.preventDefault();
                                                    document.getElementById('confirm-form').submit();
                                                }
                                                ">Ban</a>
                                                    <form id="confirm-form" action="{{route('companies.update',[$company->id])}}" method="POST" style="display:none">
                                                        <input type="hidden" name="_method" value="put">
                                                        {{ csrf_field() }}
                                                    </form></td>-->
                                            @endif
                                            </tr>

                                            @endforeach

                                          </tbody>
                                        </table>
                            </div>
                        </div>
                    </div>
                </div>


    @endsection
