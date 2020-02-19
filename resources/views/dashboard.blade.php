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
            </div>
            <div class="card-body">
              <h4 class="card-title">Customers Growth</h4>
               <p class="card-category"> Jumlah Customer yang didaftarkan perbulan, ditahun ini</p>
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
                <canvas id="toptenloc"></canvas>
            </div>
            <div class="card-body">
              <h4 class="card-title">Top 10 Kecamatan</h4>
               <p class="card-category">Jumlah order yang masuk perbulan, ditahun ini</p>
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
        <div class="col-md-12">
            <div class="card card-chart">
              <div class="card-header card-header-danger">
                  <canvas style="height: 200px" id="orderchart"></canvas>
              </div>
              <div class="card-body">
                <h4 class="card-title">Order Growth</h4>
                 <p class="card-category">Jumlah order yang masuk perbulan, ditahun ini</p>
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
<!-- chartjs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
        var comexOT = <?php echo json_encode($dataCustomer) ?> ;
        console.log(comexOT);
        var ctx = document.getElementById("dailySalesChart");
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
           // labels: ["Jun", "Jul", "Aug", "Sep", "Oct", "Nov"],
            datasets: [{
              label: 'Customer',
              data: comexOT,
              backgroundColor: [
                'rgba(255, 255, 255, 0.2)',
              ],
              borderColor: [
                'rgba(255,255,255,1)',
              ],
              borderWidth: 3,
              lineTension:0.4,

            },
            ]
          },
          options: {
            scales: {
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
                   type: 'category',
                   labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep','Oct','Nov','Des'],
                   /* type: 'time',
                   time: {
                     unit: 'month',
                     round: 'month',
                   }, */
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
        
        //outstanding barchart
        var top10KecamatanVal = <?php echo $top10KecamatanVal; ?>;
        var top10KecamatanLbl = <?php echo $top10KecamatanLbl; ?>;
        var ctx = document.getElementById("toptenloc");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
            datasets: [{
                data: top10KecamatanVal,
                backgroundColor:
                 'rgba(255, 255, 255, 1)',

            }],
            labels: top10KecamatanLbl,
            },
            options: {
                scales: {
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
                   type: 'category',
                   distribution: 'series'
                  }]
            },
                legend: {
                    display: false,

                },
                plugins: {
                datalabels: false
                },
                title: {
                display: false,
                text:  'Top 10 Kecamatan'
                }
            }
        });
      </script>


      <script>
        var order = <?php echo json_encode($dataOrder) ?> ;
        var ctx = document.getElementById("orderchart");
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            //labels: ["Jun", "Jul", "Aug", "Sep", "Oct", "Nov"],
            datasets: [{
              label: 'Order',
              data: order,
              backgroundColor: [
                'rgba(255, 255, 255, 0)',
              ],
              borderColor: [
                'rgba(255,255,255,1)',
              ],
              borderWidth: 3,
              lineTension:0.4,
            },
            ]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
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
                   type: 'category',
                   labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep','Oct','Nov','Des'],
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
              text: 'a'
            }
          }
        });
      </script>
@endpush
