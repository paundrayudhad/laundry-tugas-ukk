@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <div class="row">
                @if(auth()->user()->role == 'admin')
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total User</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalUsers }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Semua Pesanan</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalOrders }}
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pesanan Pending</h4>
                            </div>
                            <div class="card-body">
                                {{ $pendingOrders }}
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pesanan Diproses</h4>
                            </div>
                            <div class="card-body">
                                {{ $processingOrders }}
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pesanan Selesai</h4>
                            </div>
                            <div class="card-body">
                                {{ $completedOrders }}
                            </div>
                        </div>
                    </div>
                </div>
                @if(auth()->user()->role == 'admin')
                @foreach($branches as $branch)
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card card-statistic-2">
                            <div class="card-stats">
                                <div class="card-stats-title">Order Statistics - {{ ucwords($branch->nama) }}
                                </div>
                                <div class="card-stats-items">
                                    <div class="card-stats-item">
                                        <div class="card-stats-item-count">{{ $transaksi->where('cabang_id', $branch->id)->where('status', 'pending')->count() }}</div>
                                        <div class="card-stats-item-label">Pending</div>
                                    </div>
                                    <div class="card-stats-item">
                                        <div class="card-stats-item-count">{{ $transaksi->where('cabang_id', $branch->id)->where('status', 'proses')->count() }}</div>
                                        <div class="card-stats-item-label">Proses</div>
                                    </div>
                                    <div class="card-stats-item">
                                        <div class="card-stats-item-count">{{ $transaksi->where('cabang_id', $branch->id)->where('status', 'selesai')->count() }}</div>
                                        <div class="card-stats-item-label">Selesai</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-icon shadow-primary bg-primary">
                                <i class="fas fa-archive"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Orders</h4>
                                </div>
                                <div class="card-body">
                                    {{ $ordersPerBranch[$branch->id] ?? 0 }}
                                </div>
                                <div class="card-footer">
                                    <h6>Total Pendapatan: Rp {{ number_format($revenuePerBranch[$branch->id] ?? 0, 2, ',', '.') }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            </div>
        </div>
    </section>
@endsection
