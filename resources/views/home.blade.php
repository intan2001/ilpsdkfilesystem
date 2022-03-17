@extends('layouts.template')
@section('title', 'Dashboard')
@section('page', 'DASHBOARD')

@section('content')
    <section class="content">
        <div class="container-fluid"><!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-6"><!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{  $data['countRecord']  }}</h3>
                            <p>Total Records</p>
                        </div>
                    </div>
                </div><!-- ./col -->



                <div class="col-lg-4 col-6"><!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{  $data['countSerahan']  }}</h3>
                            <p>Serahan</p>
                        </div>
                    </div>
                </div><!-- ./col -->

                <div class="col-lg-4 col-6"><!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{  $data['countUser']  }}</h3>
                            <p>Users</p>
                        </div>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Record Chart
                    </h3>
                </div>

                <div class="card-body">
                    <!-- Chart's container -->
                    <div id="chart" style="height: 300px;"></div>
                    <!-- Charting library -->
                    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
                    <!-- Chartisan -->
                    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
                    <!-- Your application script -->
                    <script>
                        const chart = new Chartisan({
                            el: '#chart',
                            url: "@chart('SampleChart')",
                        });
                    </script>
                </div>
            </div>

            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Serahan Chart
                    </h3>
                </div>

                <div class="card-body">
                    <!-- Chart's container -->
                    <div id="chartSerahan" style="height: 300px;"></div>
                    <!-- Charting library -->
                    {{-- <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
                    <!-- Chartisan -->
                    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script> --}}
                    <!-- Your application script -->
                    <script>
                        const chartSerahan = new Chartisan
                        (
                            {
                                el: '#chartSerahan',
                                url: "@chart('SampleChartSerahan')",
                            }
                        );
                    </script>
                </div>
            </div>
        </div><!-- right col -->
    </section><!-- /.content -->
@endsection
