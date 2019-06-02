@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
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
                                            {!! Form::label('experimental_ctr', '実験群の見込みCTR') !!}
                                            {!! Form::input('number', 'experimental_ctr', 0.15, ['class' => 'form-control', 'step'=>'0.0001', 'min'=>'0.0', 'max'=>'0.9999'])!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('p_value', '有意水準：「本当は差がないのに差がある」と判断することへの許容度')!!}
                                            <div class="form-check form-check-inline">
                                                {!! Form::radio('p_value', '0.001', false, ['class' => 'form-check-input', 'id' => 'radios1', 'disabled' => '']) !!}
                                                {!! Form::label('radios1', '0.001', ['class' => 'form-check-label']) !!}
                                            </div>
                                            <div class="form-check form-check-inline">
                                                {!! Form::radio('p_value', '0.01', false, ['class' => 'form-check-input', 'id' => 'radios2','disabled'=>'']) !!}
                                                {!! Form::label('radios2', '0.01', ['class' => 'form-check-label']) !!}
                                            </div>
                                            <div class="form-check form-check-inline">
                                                {!! Form::radio('p_value', '0.05', true, ['class' => 'form-check-input', 'id' => 'radios3']) !!}
                                                {!! Form::label('radios3', '0.05', ['class' => 'form-check-label']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('power', '検定力：「本当は差がないのに差がある」と判断することへの許容度') !!}
                                            {!! Form::input('number', 'power', 0.8, ['class' => 'form-control', 'id' => 'power_input', 'step'=>'0.1', 'min'=>'0.0', 'max'=>'1.0', 'readonly'=>''])!!}
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                {!! Form::checkbox('agree', 1, false, ['class' => 'form-check-input', 'id' => 'modifyCheck', 'onclick' => 'changeReadOnly()']) !!}
                                                {!! Form::label('modifyCheck', '結果に与える影響を理解しているので有意水準と検定力を変更する。', ['class' => 'form-check-label']) !!}
                                            </div>
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
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    {!! Form::label('$control_imp', '統制群のサンプルサイズ') !!}
                                                    {!! Form::input('number', 'control_imp', 3000, ['class' => 'form-control'])!!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('experimental_imp', '実験群のサンプルサイズ') !!}
                                                    {!! Form::input('number', 'experimental_imp', 3000, ['class' => 'form-control'])!!}
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    {!! Form::label('control_cv', '統制群のCV数') !!}
                                                    {!! Form::input('number', 'control_cv', 100, ['class' => 'form-control'])!!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('experimental_cv', '統制群のCV数') !!}
                                                    {!! Form::input('number', 'experimental_cv', 250, ['class' => 'form-control'])!!}
                                                </div>
                                            </div>
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
