@extends('layouts.app')
@section('content')
<div class="container">


    <div class="row">
    <div class="col-lg-8 col-md-8">
        <h1 class="dash-header" style="margin-bottom: 0">
            <a href="" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
            Project</h1>
        <ul style="list-style-type: none font-size:20px;margin-top: 0;">
            <li class=""><a href="/home"><i class="fa fa-home iconss"></i></a>
                Project/edit </li>
        </ul>
    </div>
        <!--position all div left-->
        <div class="col-md-9 col-sm-9 col-lg-9 pull-left">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xm-12">

                <form method="POST" action="{{route('projects.update',[$project->id])}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        
                    </div>
                    <div class="form-group">
                        <label for="project-name">Name<span class="required">*</span></label>
                        <input type="text" class="form-control" id="project-name" name="name" spellcheck="false" value="{{$project->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="project-description">description<span class="required">*</span></label>
                        <textarea class="form-control autosize-target text-left" id="project-description" name="description" spellcheck="false" rows="5" required> {{$project->description}} </textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="edit" class="btn btn-primary">
                    </div>
            </div>

        </div>
        <div class="col-md-3 col-sm-3 col-lg-3 pull-right">
            <!--side bar code-->
            <div class="sidebar-module">
                <h4>Action</h4>
                <ol class="list-unstyled">
                    <li><a href="/projects/{{$project->id}}/edit">Edit</a></li>
                    <li><a href="">Delete</a></li>
                    <li><a href="">Add new users</a></li>
                </ol>
            </div>
            <!--
            <div class="sidebar-module">
                <h4>Member</h4>
                <ol class="list-unstyled">
                    <li><a href="">Edit</a></li>

                </ol>
            </div>-->
        </div>
    </div>
</div>
@endsection
