@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Dashboard') }}
        </div>
        <div class="card-body">

            <h4>{{ $chart1->options['chart_title'] }}</h4>
            <div class="">
                {!! $chart1->renderHtml() !!}
            </div>




        </div>
    </div>
@endsection
@section('javascript')
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}
@endsection
