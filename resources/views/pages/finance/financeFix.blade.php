@extends('layouts.app')

@section('title', 'Finance')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Finance</h1>
            </div>

            {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1" onclick="window.location.href='{{ url('order') }}'"
                    style="cursor: pointer;">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Data Orders</h4>
                        </div>
                        <div class="card-body" class="mb-0">
                            <?= $orders_total > 0 ? $orders_total : 'Data belum tersedia' ?>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <div style="display: flex; gap: 20px; margin-bottom: 20px; flex-wrap: wrap;">



            </div> --}}

            <div class="row mb-4">
                <div class="col-md-6 mb-3">
                    <div class="card p-4 d-flex flex-row align-items-center justify-content-start"
                        style="background-color: #f4f6f9;">
                        <div class="rounded-circle bg-secondary text-white d-flex justify-content-center align-items-center"
                            style="width: 40px; height: 40px;">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        <div class="ml-3">
                            <div class="text-muted small">Hari Ini
                                ({{ \Carbon\Carbon::now()->translatedFormat('l, d M Y') }})</div>
                            <div class="h5 font-weight-bold">Rp {{ number_format($incomeToday, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card p-4 d-flex flex-row align-items-center justify-content-start"
                        style="background-color: #f4f6f9;">
                        <div class="rounded-circle bg-secondary text-white d-flex justify-content-center align-items-center"
                            style="width: 40px; height: 40px;">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="ml-3">
                            <div class="text-muted small">Bulan Ini ({{ \Carbon\Carbon::now()->translatedFormat('F Y') }})
                            </div>
                            <div class="h5 font-weight-bold">Rp {{ number_format($incomeThisMonth, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pendapatan Harian</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="dailyChart" height="182">

                            </canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pendapatan Bulanan</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="monthlyChart" height="182">
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Panggil Chart.js --}}
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                // === Pendapatan Harian ===
                const labels = {!! json_encode($dailyIncome->pluck('day')) !!};
                const today = new Date().toLocaleDateString('id-ID', {
                    weekday: 'long'
                });

                const updatedLabels = labels.map(label =>
                    label.toLowerCase() === today.toLowerCase() ? `${label} / Hari Ini` : label
                );

                const dailyCtx = document.getElementById('dailyChart').getContext('2d');
                const dailyChart = new Chart(dailyCtx, {
                    type: 'line',
                    data: {
                        labels: updatedLabels,
                        datasets: [{
                            label: 'Pendapatan Harian',
                            data: {!! json_encode($dailyIncome->pluck('total')) !!},
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: '#36A2EB',
                            borderWidth: 2,
                            fill: true,
                            tension: 0.3,
                            pointRadius: 5,
                            pointBackgroundColor: function(context) {
                                const index = context.dataIndex;
                                const current = context.dataset.data[index];
                                const previous = context.dataset.data[index - 1] ?? current;
                                return current > previous ? '#28a745' : (current < previous ? '#dc3545' :
                                    '#ffc107');
                            }
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return 'Rp ' + value.toLocaleString('id-ID');
                                    }
                                }
                            }
                        },
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                                    }
                                }
                            }
                        }
                    }
                });

                // === Pendapatan Bulanan ===
                const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
                const monthlyData = {!! json_encode($monthlyIncome->pluck('total')) !!};

                const monthlyColors = monthlyData.map((value, index, array) => {
                    const prev = index > 0 ? array[index - 1] : value;
                    if (value > prev) return '#28a745'; // naik
                    if (value < prev) return '#dc3545'; // turun
                    return '#ffc107'; // tetap
                });

                const monthLabels = {!! json_encode($monthlyIncome->pluck('month_name')) !!};
                const currentMonth = new Date().toLocaleDateString('id-ID', {
                    month: 'long'
                });

                const updatedMonthLabels = monthLabels.map(label =>
                    label.toLowerCase() === currentMonth.toLowerCase() ? `${label} / Bulan Ini` : label
                );

                const monthlyChart = new Chart(monthlyCtx, {
                    type: 'line',
                    data: {
                        labels: updatedMonthLabels,
                        datasets: [{
                            label: 'Pendapatan Bulanan',
                            data: monthlyData,
                            backgroundColor: monthlyColors,
                            borderColor: '#218838',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return 'Rp ' + value.toLocaleString('id-ID');
                                    }
                                }
                            }
                        },
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                                    }
                                }
                            }
                        }
                    }
                });
            </script>


            {{-- <script type="https://code.highcharts.com/12.2.0/highcharts.js"></script> --}}


    </div>
    </div>
    </div>
    </div>
    </section>
    {{-- @if (isset($dailyIncome) && isset($monthlyIncome))
        <script>
            // Data Pendapatan Harian (dari controller)
            const dailyData = @json($dailyIncome);
            const monthlyData = @json($monthlyIncome);

            // Grafik Harian
            const dailyLabels = dailyData.map(item => item.date);
            const dailyTotals = dailyData.map(item => item.total);

            new Chart(document.getElementById('dailyChart'), {
                type: 'line',
                data: {
                    labels: dailyLabels,
                    datasets: [{
                        label: 'Pendapatan Harian',
                        data: dailyTotals,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            beginAtZero: true,
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        }
                    }
                }
            });

            // Grafik Bulanan
            const monthlyLabels = monthlyData.map(item => item.month);
            const monthlyTotals = monthlyData.map(item => item.total);

            new Chart(document.getElementById('monthlyChart'), {
                type: 'bar',
                data: {
                    labels: monthlyLabels,
                    datasets: [{
                        label: 'Pendapatan Bulanan',
                        data: monthlyTotals,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        }
                    }
                }
            });
        </script>
    @else
        <p style="color:red;">Data penghasilan tidak tersedia atau gagal diambil dari controller.</p>
    @endif --}}
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
