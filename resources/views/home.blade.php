@extends('layouts.app')

@section('content')
<div class="container">
    <script src="//cdn.jsdelivr.net/npm/jstat@latest/dist/jstat.min.js">
    </script>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="" id="test">
                default
            </div>
            <script>
                var sig_level = 0.05;
                var effect_size = 0.8;
                var sample_size = 35;
                console.log(jStat.normal.pdf(1-(sig_level/2), 0, 1));
                document.getElementById('test').innerHTML = sig_level;
            </script>
            <div class="card">
                <div class="card-header">Prior Analysis</div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'prior.show']) !!}
                            <div class="form-group">
                                {!! Form::label('effect_size', 'Effect Size (Small: 0.2, Medium: 0.5, Large: 0.8)') !!}
                                {!! Form::input('number', 'effect_size', 0.8, ['class' => 'form-control', 'step'=>'0.01', 'min'=>'0.0', 'max'=>'1.0'])!!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('p_value', 'Significant Level (Alpha; Tolerance of false positive)') !!}
                                {!! Form::input('number', 'p_value', 0.05, ['class' => 'form-control', 'step'=>'0.005', 'min'=>'0.0', 'max'=>'1.0'])!!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('power', 'Power (1-Beta; Tolerance of false negative)') !!}
                                {!! Form::input('number', 'power', 0.8, ['class' => 'form-control', 'step'=>'0.1', 'min'=>'0.0', 'max'=>'1.0'])!!}
                            </div>
                            {!! Form::submit('Calculate', ['class' => 'btn btn-primary btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Posterior Analysis</div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'posterior.show']) !!}
                            <div class="form-group">
                                {!! Form::label('sample_size', 'Sample Size') !!}
                                {!! Form::input('number', 'sample_size', 3000, ['class' => 'form-control'])!!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('p_value', 'p-value (Alpha; Tolerance of false positive)') !!}
                                {!! Form::input('number', 'p_value', 0.05, ['class' => 'form-control', 'step'=>'0.005', 'min'=>'0.0', 'max'=>'1.0'])!!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('power', 'Power (1-Beta; Tolerance of false negative)') !!}
                                {!! Form::input('number', 'power', 0.8, ['class' => 'form-control', 'step'=>'0.1', 'min'=>'0.0', 'max'=>'1.0'])!!}
                            </div>
                            {!! Form::submit('Calculate', ['class' => 'btn btn-primary btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
