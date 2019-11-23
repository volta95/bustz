@extends('layouts.app')

@section('content')
<script type="text/javascript">

    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

      // Create the data table.
      var data_incomestat = new google.visualization.DataTable();
      data_incomestat.addColumn('string', 'Topping');
      data_incomestat.addColumn('number', 'Slices');
      data_incomestat.addRows([
        ['Luxury', {{ $L }}],
        ['Semi Luxury',{{ $S }}],
        ['Normal', {{ $N }}]

      ]);

      // Set chart options
      var options_incomestat = {'title':'',
                     'width':287,
                     'height':300,
                     is3D: true,
                     'legend':'bottom',
                     };

    var data_salarystat = google.visualization.arrayToDataTable([
    ['Quarks', 'Leptons', 'Gauge Bosons', 'Scalar Bosons'],
    [2/3, -1, 0, 0],
    [2/3, -1, 0, null],
    [2/3, -1, 0, null],
    [-1/3, 0, 1, null],
    [-1/3, 0, -1, null],
    [-1/3, 0, null, null],
    [-1/3, 0, null, null]
  ]);

        var options_salarystat = {
            title: 'Charges of subatomic particles',
    legend: { position: 'top', maxLines: 2 },
    colors: ['#5C3292', '#1A8763', '#871B47', '#999999'],
    interpolateNulls: false,
        };



      // Instantiate and draw our chart, passing in some options.
      var chart_incomestat = new google.visualization.PieChart(document.getElementById('bus-type'));
      chart_incomestat.draw(data_incomestat,options_incomestat);
      var chart_salarystat = new google.visualization.Histogram(document.getElementById('salary-stat'));
        chart_salarystat.draw(data_salarystat, options_salarystat);
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

    <div class="row panel-cont">
        <div class="col-lg-3 col-md-3 col-sm-12 ">
            <div class="employer-panel">
                <div class="container">
                    <div class="panel-employee">
                            <span class="icon"><i class="fa fa-user icons"></i> </span>
                            <div class="contentss">
                                    <div class="text">Total Bus</div>
                                    <h5 class="number">{{count($buses) }}</h5>
                                </div>

                    </div><hr><div class="panel-employees">
                                <span class="icon"><i class="fa fa-users icons"></i> </span>
                                <div class="contentsss">
                                        <div class="text">Total Users</div>
                                        <h5 class="number">{{ Counter::allHits() }}</h5>
                                    </div>
                    </div>

                </div>
            </div>
                <div class="employer-p">
                        <div class="container">
                                <div class="salary-total">
                                        <span class="icon"><i class="fa fa-user icons"></i> </span>
                                        <div class="salary-total-content">
                                                <div class="text">Total income</div>
                                                <h5 class="number">Tsh 60M</h5>
                                            </div>
                                        </div><hr>
                                        <div class="salary-avg">
                                                <span class="icon"><i class="fa fa-user icons"></i> </span>
                                                <div class="salary-avg-content">
                                                        <div class="text">Profit</div>
                                                        <h5 class="number">Tsh 600k</h5>
                                                    </div>
                                                </div>

                        </div>
            </div>
            </div>


  <div class="col-lg-3 col-md-3 col-sm-12 ">
      <div class="income-analysis">
          <h4>Buses Statistic</h4>
          <div id="bus-type"></div>
      </div>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-12 ">
          <div class="salary-statistic">
                  <h4>Ticket Statistic</h4>
                  <div id="salary-stat"></div>
          </div>
      </div>

  </div>
  <div class="row hr-panel-sec">
      <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="company-admin" style="padding:10px;">

                <div class="header">
                        <h2 style="color: #444;padding: 20px;position: relative;box-shadow: none;font-size:25px;font-weight:800">Staffs</h2>
                    </div>
                <table id="dt-table-big" class="table table-striped hover table-bordered table-sm" cellspacing="0" width="100%">
                        <thead style="background-color:#212529;color:#fff;height:30px;border-radius:5px;padding-bottom:5px;" >
                          <tr>
                            <th class="th-sm">No:</th>
                            <th class="th-sm">First Name</th>
                            <th class="th-sm">Second Name</th>
                            <th class="th-sm">Email</th>
                            <th class="th-sm">Phones</th>
                            <th class="th-sm">Gender</th>
                            <th class="th-sm">Role</th>
                            <th class="th-sm"></th>

                          </tr>
                        </thead>
                        <tbody>



                              @foreach ($staffs as $staff )
                              <tr>
                                    <td class="style-list-table">{{ $i++ }}</td>
                                    <td class="style-list-table">{{ $staff->user->fname }}</td>
                                    <td class="style-list-table">{{ $staff->user->lname }}</td>
                                    <td class="style-list-table">{{ $staff->user->email }}</td>
                                    <td class="style-list-table">{{ $staff->user->phone_number }}</td>
                                    @if($staff->user->gender==1)
                                    <td class="style-list-table">Male</td>
                                    @elseif($staff->user->gender==0)
                                    <td class="style-list-table">Female</td>
                                    @endif

                                    <td class="style-list-table">{{  $staff->user->role->name  }}</td>

                                    <td class="style-list-table"> <a  href="staffs/{{$staff->id}}" >View</a></td>

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
                        <th class="th-sm">Plate no

                        </th>
                        <th class="th-sm">Type

                        </th>
                        <th class="th-sm">

                        </th>
                      </tr>
                    </thead>
                    <tbody>



                          @foreach ($buses as $bus )
                          <tr>
                                <td class="style-list-table">{{ $j++ }}</td>
                                <td class="style-list-table">{{ $bus->plate_no }}</td>
                                <td class="style-list-table">{{ $bus->bustype }}</td>
                                <td class="style-list-table"> <a  href="buses/{{$bus->id}}" >View</a></td>
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
