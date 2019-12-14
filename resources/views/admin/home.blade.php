@extends('layouts.app')

@section('content')
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Year', 'Sales', 'Expenses'],
        ['2004',  1000,      400],
        ['2005',  1170,      460],
        ['2006',  660,       1120],
        ['2007',  1030,      540]
      ]);

      var options = {
        title: 'Company Performance',
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      chart.draw(data, options);
    }
  </script>


<div class="container-fluid dash-content">
  <div class="row">
    <div class="col-lg-3 col-md-3">
        <h5><a href="#" id="panel-expand" class="arrow-left"><i class="fa fa-arrow-left"></i></a>Dashboard</h5>
            <div class="link-div"><i class="fa fa-home icon-blue"></i><span class="link-dash"> / Dashboard</span></div>

     </div>
    <div class="col-lg-9 col-md-9"></div>

</div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dash-card dash-card1">
               <i class="fa fa-users dashcard-icon"></i>
                <h5 class="number">{{ Counter::allHits() }}</h5>
                <div class="dash-text">Total Visitor</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dash-card dash-card2">
                    <i class="fas fa-bus-alt dashcard-icon"></i>
                    <h5 class="number">{{count($companies) }}</h5>
                    <div class="dash-text">Total companies</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dash-card dash-card3">
                    <i class="fas fa-road dashcard-icon"></i>
                    <h5 class="number">{{count($routes) }}</h5>
                    <div class="dash-text">Total routes</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="dash-card dash-card4">
                    <i class="fas fa-comments dashcard-icon"></i>
                    <h5 class="number">10</h5>
                    <div class="dash-text">chats</div>
            </div>
        </div>
        </div>
    <div class="row panel-cont">
        <div class="dash-statistic col-lg-12 col-md-12">
            <h4 class="dash-cont-header">Busses Companies</h4>
            <div id="curve_chart" style=" height:500px;background-color:none"></div>

        </div>

  </div>
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="dash-content-card">
        <div class="dah-contents-card">
                <i class="fas fa-envelope card-icon"></i>
            <p class="card-text">Inbox <span class="card-number b-orange">405</span></p>

        </div>
        <div class="dah-contents-card">
                <i class="fas fa-eye card-icon"></i>
            <p class="card-text">Site Visitor <span class="card-number b-blue">{{ Counter::allHits() }}</span></p>

        </div>
        <div class="dah-contents-card">
                <i class="fas fa-comments card-icon"></i>
            <p class="card-text">Chat <span class="card-number b-pink">405</span></p>

        </div>
        <div class="dah-contents-card">
                <i class="fas fa-bus card-icon"></i>
            <p class="card-text">Companies <span class="card-number b-yellow">405</span></p>

        </div>
        <div class="dah-contents-card">
                <i class="fas fa-bell card-icon"></i>
            <p class="card-text">Notifications <span class="card-number b-black">405</span></p>

        </div>
        <div class="dah-contents-card">
                <i class="fas fa-road card-icon"></i>
            <p class="card-text">Routes <span class="card-number b-green">405</span></p>

        </div>


        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="dash-content-card">

        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="dash-content-card">

        </div>
    </div>

</div>
  <div class="row hr-panel-sec">
      <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="company-admin" style="padding:10px;">

                <div class="header">
                        <h2 style="color: #444;padding: 20px;position: relative;box-shadow: none;font-size:25px;font-weight:800">Companies</h2>
                    </div>
                <table id="dt-table-big" class="table table-striped hover table-bordered table-sm" cellspacing="0" width="100%">
                        <thead style="background-color:#212529;color:#fff;height:30px;border-radius:5px;padding-bottom:5px;" >
                          <tr>
                            <th class="th-sm">No:</th>
                            <th class="th-sm">Name</th>
                            <th class="th-sm">Address</th>
                            <th class="th-sm">TIN</th>
                            <th class="th-sm">Buses</th>
                            <th class="th-sm">Mobile</th>
                            <th class="th-sm"></th>
                            <th class="th-sm"></th>
                          </tr>
                        </thead>
                        <tbody>



                              @foreach ($companies as $Company )
                              <tr>
                                    <td class="style-list-table">{{ $i++ }}</td>
                                    <td class="style-list-table">{{ $Company->name }}</td>
                                    <td class="style-list-table">{{ $Company->address }}</td>
                                    <td class="style-list-table">{{ $Company->tin }}</td>
                                    <td class="style-list-table">{{ Count($Company->buses) }}</td>
                                    <td class="style-list-table">{{ $Company->phone }}</td>
                                    <td class="style-list-table"> <a  href="companies/{{$Company->id}}" >View</a></td>
                                    <td class="style-list-table">
                                         @if($Company->status==0)
                                            <a href="">Activate</a>
                                    @elseif($Company->status==1)
                                   <a href="">Deactivate</a>
                                    @endif
                                </td>

                             </tr>
                              @endforeach




                        </tbody>

                      </table>


          </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 " >
          <div class="carding"  style="padding:10px;">
                <div class="header">
                        <h2 style="color: #444;padding: 20px;position: relative;box-shadow: none;font-size:25px;font-weight:800">Routes</h2>
                    </div>
                  <table id="dt-table" class="table table-striped hover table-bordered table-sm" cellspacing="0" width="100%">
                        <thead style="background-color:#212529;color:#fff;height:30px;border-radius:5px;padding-bottom:5px;" >
                      <tr>
                        <th class="th-sm">No:

                        </th>
                        <th class="th-sm">From

                        </th>
                        <th class="th-sm">to

                        </th>
                        <th class="th-sm">

                        </th>
                      </tr>
                    </thead>
                    <tbody>



                          @foreach ($routes as $route )
                          <tr>
                                <td class="style-list-table">{{ $j++ }}</td>
                                <td class="style-list-table">{{ $route->route_from }}</td>
                                <td class="style-list-table">{{ $route->route_to }}</td>
                                <td class="style-list-table"> <a  href="routes/{{$route->id}}" >View</a></td>
                         </tr>
                          @endforeach




                    </tbody>

                  </table>

              </div>
          </div>

          </div>
      </div>
</div>

<script type="text/javascript">
        $(document).ready(function() {
            $('#dt-table').DataTable(

                 {
        "lengthMenu": [[ 5, 4, -1], [ 5, 4, 3]],
        "info":     false,
        "searching": false ,
    }
            );
            $('#dt-table-big').DataTable(

{
"lengthMenu": [[7, 5, 4, -1], [7, 5, 4, 3]],
"info":     false,
"searching": true ,
}
);


        } );
</script>

@endsection
