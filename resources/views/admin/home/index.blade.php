@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            @foreach ([
                ['count' => '32,451', 'label' => 'Visits', 'change' => '+14.00(+0.50%)'],
                ['count' => '15,236', 'label' => 'Impressions', 'change' => '+138.97(+0.54%)'],
                ['count' => '7,688', 'label' => 'Conversation', 'change' => '+57.62(+0.76%)'],
                ['count' => '1,553', 'label' => 'Downloads', 'change' => '+138.97(+0.54%)']
            ] as $stat)
            <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                <div class="d-flex">
                    <div class="wrapper">
                        <h3 class="mb-0 font-weight-semibold">{{ $stat['count'] }}</h3>
                        <h5 class="mb-0 font-weight-medium text-primary">{{ $stat['label'] }}</h5>
                        <p class="mb-0 text-muted">{{ $stat['change'] }}</p>
                    </div>
                    <div class="wrapper my-auto ml-auto ml-lg-4">
                        <canvas height="50" width="100" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
