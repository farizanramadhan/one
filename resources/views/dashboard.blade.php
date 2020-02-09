@extends('layouts.master')

@section('page-title')
  Dashboard
@endsection

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-chart">
            <div class="card-header card-header-success">
                <canvas id="dailySalesChart"></canvas>
            {{--   <div class="ct-chart" id="dailySalesChart"></div> --}}
            </div>
            <div class="card-body">
              <h4 class="card-title">Customers Growth</h4>
               <p class="card-category">
                <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> compared to previous month.</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> updated daily
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card card-chart">
            <div class="card-header card-header-danger">
                <canvas id="orderchart"></canvas>
          {{--     <div class="ct-chart" id="completedTasksChart"></div> --}}
            </div>
            <div class="card-body">
              <h4 class="card-title">Order Growth</h4>
               <p class="card-category">Compared Monthly</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> updated daily
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach ($order as $item)
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                <i class="material-icons">{{$item->status->icons}}</i>
                </div>
                <p class="card-category">{{$item->status->name}}</p>
                <h3 class="card-title">{{$item->total}}</h3>
            </div>
             <div class="card-footer">
                <div class="stats">
                <i class="material-icons">date_range</i> Update Now
                </div>
            </div>
            </div>
        </div>
        @endforeach
      </div>
      <div class="row">
        @foreach ($customer as $item)
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                <i class="material-icons">poll</i>
                </div>
                <p class="card-category">{{$item->program->name}}</p>
                <h3 class="card-title">{{$item->total}}</h3>
{{--
                <div class="card-body">
                    {{$item->program->budget}}
                  </div> --}}
            </div>
             <div class="card-footer">
                <div class="stats">
                <i class="material-icons">date_range</i> Update Now
                </div>
            </div>
            </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
@push('script')
{{-- <script>
      /* ----------==========     Daily Sales Chart initialization    ==========---------- */
      dataDailySalesChart = {
        labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
        series: [
          [12, 17, 7, 17, 23, 18, 38]
        ]
      };

      optionsDailySalesChart = {
        lineSmooth: Chartist.Interpolation.cardinal({
          tension: 0
        }),
        low: 0,
        high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
        chartPadding: {
          top: 0,
          right: 0,
          bottom: 0,
          left: 0
        },
      }
      var dailySalesChart = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);

      md.startAnimationForLineChart(dailySalesChart);
    </script> --}}
<!-- chartjs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
        var comexOT = <?php echo $dataGraph ?> ;
        var ctx = document.getElementById("dailySalesChart");
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            //labels: ["Jun", "Jul", "Aug", "Sep", "Oct", "Nov"],
            datasets: [{
              label: 'Customer',
              data: comexOT,
              backgroundColor: [
                'rgba(255, 255, 255, 1)',
              ],
              borderColor: [
                'rgba(255,255,255,1)',
              ],
              borderWidth: 3
            },
            ]
          },
          options: {
            scales: {
              /*   scaleLabel: {
                    fontColor : '#FFFF'
                }, */
              yAxes: [{
                ticks: {
                  beginAtZero: false,
                  fontColor: 'rgba(255, 255, 255, 0.8)',
                },
                gridLines : {
                    color : 'rgba(255, 255, 255, 0.5)',
                }
              }],
              xAxes: [{
                display: true,
                 ticks:{
                   source:'data',
                   fontColor: "white",
                   },
                      type: 'time',
                      time: {
                        displayFormats: {
                          month: 'MMM'
                        },
                        unit: 'month',
                        round: 'month',
                      },
                      distribution: 'series'
                  }]
            },
            legend: {
                  display: false,
                  labels: {
                    boxWidth: 10,
                  }
              },
              plugins: {
                datalabels: false
              },
              title: {
              display: false,
              text: 'Outstanding Per LOB'
            }
          }
        });
      </script>
      <script>
        var order = <?php echo $dataOrder ?> ;
        var ctx = document.getElementById("orderchart");
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            //labels: ["Jun", "Jul", "Aug", "Sep", "Oct", "Nov"],
            datasets: [{
              label: 'Order',
              data: order,
              backgroundColor: [
                'rgba(255, 255, 255, 1)',
              ],
              borderColor: [
                'rgba(255,255,255,1)',
              ],
              borderWidth: 3
            },
            ]
          },
          options: {
            scales: {
              /*   scaleLabel: {
                    fontColor : '#FFFF'
                }, */
              yAxes: [{
                ticks: {
                  beginAtZero: false,
                  fontColor: 'rgba(255, 255, 255, 0.8)',
                },
                gridLines : {
                    color : 'rgba(255, 255, 255, 0.5)',
                }
              }],
              xAxes: [{
                display: true,
                 ticks:{
                   source:'data',
                   fontColor: "white",
                   },
                      type: 'time',
                      time: {
                        displayFormats: {
                          month: 'MMM'
                        },
                        unit: 'month',
                        round: 'month',
                      },
                      distribution: 'series'
                  }]
            },
            legend: {
                  display: false,
                  labels: {
                    boxWidth: 10,
                  }
              },
              plugins: {
                datalabels: false
              },
              title: {
              display: false,
              text: 'Outstanding Per LOB'
            }
          }
        });
      </script>
@endpush
