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
                        </div>
                        <div class="card">
                            <div class="card-header">必要なサンプルサイズを求める</div>
                            <div class="card-body">
                                <div id="app">
                                    <apriori-component></apriori-component>
                                </div>
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
