@extends('layout.master')

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $posts }}</h3>
                    <p>Tổng số bài đăng</p>
                </div>
                <div class="icon">
                    <i class="far fa-file-alt"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $postsPending }}</h3>
                    <p>Bài Đăng đăng chờ duyệt</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-contract"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $users }}</h3>
                    <p>Người Dùng Hệ Thống</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $hr }}</h3>
                    <p>Nhà Tuyển Dụng</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    {{-- <div class="row"> --}}

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Thống Kê Số Lượng Bài Đăng Và Người Dùng Tháng&#160;&#160;</h3>
            <form id="form-barchart">
                @php
                    $currentMonth = (int) date('m');
                    $currentYear = (int) date('Y');
                @endphp
                <select name="month" id="select-month">
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" @if ($i === $currentMonth) selected @endif>
                            {{ $i }}</option>
                    @endfor
                </select>
                <select name="year" id="select-year">
                    @for ($i = $currentYear; $i >= 2010; $i--)
                        <option value="{{ $i }}" @if ($i === $currentYear) selected @endif>
                            {{ $i }}</option>
                    @endfor
                </select>
            </form>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="chart" id="create-chart">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <canvas id="barChart"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    <!-- DONUT CHART -->
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Thống Kê Tổng Số Bài Đăng Theo Ngôn Ngữ Lập Trình</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body" id="create-donutchart">
            <canvas id="donutChart" style="min-height: 250px; height: 350px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card bg-gradient-success">
                <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">

                    <h3 class="card-title">
                        <i class="far fa-calendar-alt"></i>
                        Calendar
                    </h3>
                    <!-- tools card -->
                    <div class="card-tools">
                        <!-- button with a dropdown -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"
                                data-offset="-52" aria-expanded="false">
                                <i class="fas fa-bars"></i>
                            </button>
                            <div class="dropdown-menu" role="menu" style="">
                                <a href="#" class="dropdown-item">Add new event</a>
                                <a href="#" class="dropdown-item">Clear events</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">View calendar</a>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body pt-0" style="display: block;">
                    <!--The calendar -->
                    <div id="calendar" style="width: 100%">
                        <div class="bootstrap-datetimepicker-widget usetwentyfour">
                            <ul class="list-unstyled">
                                <li class="show">
                                    <div class="datepicker">
                                        <div class="datepicker-days" style="">
                                            <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Month"></span>
                                                        </th>
                                                        <th class="picker-switch" data-action="pickerSwitch"
                                                            colspan="5" title="Select Month">June 2022</th>
                                                        <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="dow">Su</th>
                                                        <th class="dow">Mo</th>
                                                        <th class="dow">Tu</th>
                                                        <th class="dow">We</th>
                                                        <th class="dow">Th</th>
                                                        <th class="dow">Fr</th>
                                                        <th class="dow">Sa</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td data-action="selectDay" data-day="05/29/2022" class="day old weekend">29</td>
                                                        <td data-action="selectDay" data-day="05/30/2022" class="day old">30</td>
                                                        <td data-action="selectDay" data-day="05/31/2022" class="day old">31</td>
                                                        <td data-action="selectDay" data-day="06/01/2022" class="day">1</td>
                                                        <td data-action="selectDay" data-day="06/02/2022" class="day">2</td>
                                                        <td data-action="selectDay" data-day="06/03/2022" class="day">3</td>
                                                        <td data-action="selectDay" data-day="06/04/2022" class="day weekend">4</td>
                                                    </tr>
                                                    <tr>
                                                        <td data-action="selectDay" data-day="06/05/2022" class="day weekend">5</td>
                                                        <td data-action="selectDay" data-day="06/06/2022" class="day">6</td>
                                                        <td data-action="selectDay" data-day="06/07/2022" class="day">7</td>
                                                        <td data-action="selectDay" data-day="06/08/2022" class="day">8</td>
                                                        <td data-action="selectDay" data-day="06/09/2022" class="day">9</td>
                                                        <td data-action="selectDay" data-day="06/10/2022" class="day">10</td>
                                                        <td data-action="selectDay" data-day="06/11/2022" class="day weekend">11</td>
                                                    </tr>
                                                    <tr>
                                                        <td data-action="selectDay" data-day="06/12/2022" class="day weekend">12</td>
                                                        <td data-action="selectDay" data-day="06/13/2022" class="day">13</td>
                                                        <td data-action="selectDay" data-day="06/14/2022" class="day">14</td>
                                                        <td data-action="selectDay" data-day="06/15/2022" class="day">15</td>
                                                        <td data-action="selectDay" data-day="06/16/2022" class="day">16</td>
                                                        <td data-action="selectDay" data-day="06/17/2022" class="day">17</td>
                                                        <td data-action="selectDay" data-day="06/18/2022" class="day active today weekend">18</td>
                                                    </tr>
                                                    <tr>
                                                        <td data-action="selectDay" data-day="06/19/2022" class="day weekend">19</td>
                                                        <td data-action="selectDay" data-day="06/20/2022" class="day">20</td>
                                                        <td data-action="selectDay" data-day="06/21/2022" class="day">21</td>
                                                        <td data-action="selectDay" data-day="06/22/2022" class="day">22</td>
                                                        <td data-action="selectDay" data-day="06/23/2022" class="day">23</td>
                                                        <td data-action="selectDay" data-day="06/24/2022" class="day">24</td>
                                                        <td data-action="selectDay" data-day="06/25/2022" class="day weekend">25</td>
                                                    </tr>
                                                    <tr>
                                                        <td data-action="selectDay" data-day="06/26/2022" class="day weekend">26</td>
                                                        <td data-action="selectDay" data-day="06/27/2022" class="day">27</td>
                                                        <td data-action="selectDay" data-day="06/28/2022" class="day">28</td>
                                                        <td data-action="selectDay" data-day="06/29/2022" class="day">29</td>
                                                        <td data-action="selectDay" data-day="06/30/2022" class="day">30</td>
                                                        <td data-action="selectDay" data-day="07/01/2022" class="day new">1</td>
                                                        <td data-action="selectDay" data-day="07/02/2022" class="day new weekend">2</td>
                                                    </tr>
                                                    <tr>
                                                        <td data-action="selectDay" data-day="07/03/2022" class="day new weekend">3</td>
                                                        <td data-action="selectDay" data-day="07/04/2022" class="day new">4</td>
                                                        <td data-action="selectDay" data-day="07/05/2022" class="day new">5</td>
                                                        <td data-action="selectDay" data-day="07/06/2022" class="day new">6</td>
                                                        <td data-action="selectDay" data-day="07/07/2022" class="day new">7</td>
                                                        <td data-action="selectDay" data-day="07/08/2022" class="day new">8</td>
                                                        <td data-action="selectDay" data-day="07/09/2022" class="day new weekend">9</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="datepicker-months" style="display: none;">
                                            <table class="table-condensed">
                                                <thead>
                                                    <tr>
                                                        <th class="prev" data-action="previous">
                                                            <span class="fa fa-chevron-left" title="Previous Year"></span>
                                                        </th>
                                                        <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2022</th>
                                                        <th class="next" data-action="next">
                                                            <span class="fa fa-chevron-right" title="Next Year"></span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="7">
                                                            <span data-action="selectMonth" class="month">Jan</span>
                                                            <span data-action="selectMonth" class="month">Feb</span>
                                                            <span data-action="selectMonth" class="month">Mar</span>
                                                            <span data-action="selectMonth" class="month">Apr</span>
                                                            <span data-action="selectMonth" class="month">May</span>
                                                            <span data-action="selectMonth" class="month active">Jun</span>
                                                            <span data-action="selectMonth" class="month">Jul</span>
                                                            <span data-action="selectMonth" class="month">Aug</span>
                                                            <span data-action="selectMonth" class="month">Sep</span>
                                                            <span data-action="selectMonth" class="month">Oct</span>
                                                            <span data-action="selectMonth" class="month">Nov</span>
                                                            <span data-action="selectMonth" class="month">Dec</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="datepicker-years" style="display: none;">
                                            <table class="table-condensed">
                                                <thead>
                                                    <tr>
                                                        <th class="prev" data-action="previous"><span
                                                                class="fa fa-chevron-left" title="Previous Decade"></span>
                                                        </th>
                                                        <th class="picker-switch" data-action="pickerSwitch"
                                                            colspan="5" title="Select Decade">2020-2029</th>
                                                        <th class="next" data-action="next"><span
                                                                class="fa fa-chevron-right" title="Next Decade"></span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="7"><span data-action="selectYear" class="year old">2019</span>
                                                            <span data-action="selectYear" class="year">2020</span>
                                                            <span data-action="selectYear" class="year">2021</span>
                                                            <span data-action="selectYear" class="year active">2022</span>
                                                            <span data-action="selectYear" class="year">2023</span>
                                                            <span data-action="selectYear" class="year">2024</span>
                                                            <span data-action="selectYear" class="year">2025</span>
                                                            <span data-action="selectYear" class="year">2026</span>
                                                            <span data-action="selectYear" class="year">2027</span>
                                                            <span data-action="selectYear" class="year">2028</span>
                                                            <span data-action="selectYear" class="year">2029</span>
                                                            <span data-action="selectYear" class="year old">2030</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="datepicker-decades" style="display: none;">
                                            <table class="table-condensed">
                                                <thead>
                                                    <tr>
                                                        <th class="prev" data-action="previous">
                                                            <span class="fa fa-chevron-left" title="Previous Century"></span>
                                                        </th>
                                                        <th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th>
                                                        <th class="next" data-action="next">
                                                            <span class="fa fa-chevron-right" title="Next Century"></span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="7">
                                                            <span data-action="selectDecade" class="decade old" data-selection="2006">1990</span>
                                                            <span data-action="selectDecade" class="decade" data-selection="2006">2000</span>
                                                            <span data-action="selectDecade" class="decade" data-selection="2016">2010</span>
                                                            <span data-action="selectDecade" class="decade active" data-selection="2026">2020</span>
                                                            <span data-action="selectDecade" class="decade" data-selection="2036">2030</span>
                                                            <span data-action="selectDecade" class="decade" data-selection="2046">2040</span>
                                                            <span data-action="selectDecade" class="decade" data-selection="2056">2050</span>
                                                            <span data-action="selectDecade" class="decade" data-selection="2066">2060</span>
                                                            <span data-action="selectDecade" class="decade" data-selection="2076">2070</span>
                                                            <span data-action="selectDecade" class="decade" data-selection="2086">2080</span>
                                                            <span data-action="selectDecade" class="decade" data-selection="2096">2090</span>
                                                            <span data-action="selectDecade" class="decade old" data-selection="2106">2100</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </li>
                                <li class="picker-switch accordion-toggle"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {

            function DonutChart(dataLabel, dataId) {
                var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
                var donutData = {
                    labels: dataLabel,
                    datasets: [{
                        data: dataId,
                        backgroundColor: [
                            '#f56954',
                            '#00a65a',
                            '#f39c12',
                            '#00c0ef',
                            '#3c8dbc',
                            '#d2d6de',
                            '#333',
                            '#B26BC5',
                            '#FFF176',
                            '#F5B2C8',
                            '#827717',
                        ],
                    }]
                }

                var donutOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                }
                new Chart(donutChartCanvas, {
                    type: 'doughnut',
                    data: donutData,
                    options: donutOptions
                })
            }

            function LoadDonutChart() {
                let url = "{{ route('admin.donutchart') }}";
                var dataLabel = [];
                var dataId = [];
                $.ajax({
                    type: "get",
                    url: url,
                    dataType: "json",
                    success: function(response) {
                        let valueRes = Object.values(response);
                        for (const item of valueRes) {
                            dataLabel.push(item.language);
                            dataId.push(item.total_id);
                        }
                    },
                    error: function(response) {
                        alert(response);
                    }
                });
                setTimeout(() => {
                    DonutChart(dataLabel, dataId);
                }, 700);
            }


            var resetCanvas = function() {
                $('#barChart').remove();
                $('#create-chart').append(
                    '<canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"><canvas>'
                );
                canvas = document.querySelector('#barChart');
                ctx = canvas.getContext('2d');
                ctx.canvas.width = $('#graph').width();
                ctx.canvas.height = $('#graph').height();

                var x = canvas.width / 2;
                var y = canvas.height / 2;
                ctx.font = '10pt Verdana';
                ctx.textAlign = 'center';
                ctx.fillText('This text is centered on the canvas', x, y);
            };

            function createBarChart(dataLabel, dataPost, dataUser) {

                var barChartCanvas = $('#barChart').get(0).getContext('2d');
                var barChartOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    datasetFill: false,
                    responsive: true
                }
                var barChartData = {
                    labels: dataLabel,
                    datasets: [{
                        label: 'Posts',
                        data: dataPost,
                        backgroundColor: "rgba(60,141,188,0.9)"
                    }, {
                        label: 'Users',
                        data: dataUser,
                        backgroundColor: "rgba(210, 214, 222, 1)"
                    }]
                }
                new Chart(barChartCanvas, {
                    type: 'bar',
                    data: barChartData,
                    options: barChartOptions
                })

            }

            function loadBarChart(month, year) {

                let url = "{{ route('admin.barchart') }}";
                $.ajax({
                    type: "get",
                    url: url,
                    data: {
                        month,
                        year
                    },
                    dataType: "json",
                    success: function(response) {
                        let dataLabel = $.map(Object.keys(response), function(value) {
                            return value = value + '/' + month;
                        });
                        let dataPost = [];
                        let dataUser = [];
                        for (const item of Object.values(response)) {
                            dataPost.push(item.post);
                            dataUser.push(item.user);
                        }
                        // DonutChart(dataLabel, dataId);
                        createBarChart(dataLabel, dataPost, dataUser);
                    },
                    error: function(response) {
                        alert(response);
                    }
                });
            }


            $(document).on("change", '#select-month,#select-year', function() {
                resetCanvas();
                // $("#form-barchart").submit();
                let month = $('#select-month').val();
                let year = $('#select-year').val();
                loadBarChart(month, year);

            });

            var month = new Date().getMonth() + 1; // get current month
            var year = new Date().getFullYear(); // get current year
            setTimeout(() => {
                loadBarChart(month, year);
            }, 500);
            LoadDonutChart();


        });
    </script>
@endpush
