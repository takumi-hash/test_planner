@extends('layouts.app')

@section('content')
<div class="container" id = "app">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="prior-tab" data-toggle="tab" href="#prior" role="tab" aria-controls="prior" aria-selected="true">ABテストを計画する</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" id="posterior-tab" data-toggle="tab" href="#posterior" role="tab" aria-controls="posterior" aria-selected="false">ABテストの結果を分析する</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="prior" role="tabpanel" aria-labelledby="prior-tab">
                    <div class="col-md-12 p-3">
                        <div class="card">
                            <div class="card-header">必要なサンプルサイズを求める</div>
                            <div class="card-body">
                                <div id="">
                                    <apriori-component></apriori-component>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="posterior" role="tabpanel" aria-labelledby="posterior-tab">
                    <div class="col-md-12 p-3">
                        <div class="card">
                            <div class="card-header">テスト結果を分析する</div>
                            <div class="card-body">
                                <div id="">
                                    <aposteriori-component></aposteriori-component>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
