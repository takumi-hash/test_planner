@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="prior-tab" data-toggle="tab" href="#prior" role="tab" aria-controls="prior" aria-selected="true">事前の分析</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" id="posterior-tab" data-toggle="tab" href="#posterior" role="tab" aria-controls="posterior" aria-selected="false">事後の分析</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="prior" role="tabpanel" aria-labelledby="prior-tab">
                    <div class="col-md-12 p-3">
                        <div class="">
                            <h2>事前の分析とは</h2>
                            <p>ABテストに向けて、必要なサンプルサイズを見積もるために行います。</p>
                            <p></p>
                        </div>
                        <div class="card">
                            <div class="card-header">必要なサンプルサイズを求める</div>
                                <div class="card-body">
                                    {!! Form::open(['route' => 'prior.show']) !!}
                                        <div class="form-group">
                                            {!! Form::label('control_ctr', '統制群の見込みCTR') !!}
                                            {!! Form::input('number', 'control_ctr', 0.1, ['class' => 'form-control', 'step'=>'0.0001', 'min'=>'0.0', 'max'=>'0.9999'])!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('ctr_lift', '統制群の見込みCTR') !!}
                                            {!! Form::input('number', 'ctr_lift', 0.05, ['class' => 'form-control', 'step'=>'0.0001', 'min'=>'0.0', 'max'=>'0.9999'])!!}
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
                </div>
                <div class="tab-pane fade" id="posterior" role="tabpanel" aria-labelledby="posterior-tab">
                    <div class="col-md-12 p-3">
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
        </div>
    </div>
</div>
@endsection
