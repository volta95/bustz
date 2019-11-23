@extends('layouts.app')

@section('content')

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Schedules</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Schedules</li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-8">
                <div class="card calender">
                    <div class="body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card headers">
                    <div class="body">
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addevent">Add New Bus schedule</button>
                    </div>
                </div>
                <div class="card">

                </div>
            </div>
        </div>
    </div>
</div>

</div>


<!-- Default Size -->
<div class="modal animated jello" id="addevent" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="title" id="defaultModalLabel">Add schedule</h4>
        </div>
        <div class="modal-body">
            <form method="post" name="form-buses" action="{{ route('schedules.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="form-group">
                <div class="form-line">
                    <select name="bus" id="bus-company" class="form-control">
                            <option value="">Select bus name</option>
                            @foreach ($buses as $bus)
                            <option value="{{$bus->id}}">{{$bus->plate_no.' '.$bus->model}}</option>
                            @endforeach

                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="route_from" class="form-control" placeholder="Route from">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="route_to" class="form-control" placeholder="Route to">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="price" class="form-control" placeholder="Price">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <input type="date" class="form-control" placeholder="Date" name="date">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="rep_time" class="form-control" placeholder="Reporting time">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="dep_time" class="form-control" placeholder="Departure time">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="ari_time" class="form-control" placeholder="Arriving time">
                </div>
            </div>
            <div class="form-group">
            <div class="form-line">
                <select name="condoctor" id="condoctor" class="form-control">
                        <option value="">Select condoctor</option>
                        @foreach ($staffs as $staff)
                        @if($staff->user->role->name=='Condoctor')
                        <option value="{{$staff->id}}">{{$staff->user->fname.' '.$staff->user->lname}}</option>
                        @endif
                        @endforeach

                </select>
            </div>
            </div>

            <div class="form-group">
            <div class="form-line">
                <select name="driver" id="driver" class="form-control">
                        <option value="">Select Driver</option>
                        @foreach ($staffs as $staff)
                        @if($staff->user->role->name=='Driver')
                        <option value="{{$staff->id}}">{{$staff->user->fname.' '.$staff->user->lname}}</option>
                        @endif
                        @endforeach

                </select>
            </div>
            </div>
        </div>
        <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Add">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">CLOSE</button>
        </div>

    </div>
</form>

</div>

</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>

<script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="bus"]').on('change',function(){
               var busID = jQuery(this).val();
               if(busID)
               {
                  jQuery.ajax({
                     url : 'schedules/getroute' +busID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="route_from"]').empty();
                        jQuery('select[name="route_to"]').empty();
                        jQuery.each(data, function(key,value){
                          $('select[name="route_from"]').append('<option value="'+ key +'">'+ value +'</option>');
                           $('select[name="route_to"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="route_from"]').empty();
                  $('select[name="route_to"]').empty();
               }
            });
    });

"use strict";
$('#calendar').fullCalendar({
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
    },

    defaultDate: '{{date('Y-m-d')}}',
    editable: false,
    droppable: false, // this allows things to be dropped onto the calendar
    drop: function() {
        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
            // if so, remove the element from the "Draggable Events" list
            $(this).remove();
        }
    },
    eventLimit: true, // allow "more" link when too many events
    events: [

        @foreach($schedules as $schedule)
        {

            start: '{{$schedule->dep_date}}'+'T'+ '{{$schedule->rep_time}}',
            end: '{{$schedule->dep_date}}'+'T'+ '{{$schedule->dep_time}}',
            className: 'bg-info',

        },
        @endforeach


    ]
});
</script>

    @endsection
