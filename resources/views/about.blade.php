@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <h2>このツールについて</h2>
            <p>個人・商用とわず自由にご利用ください。正確性には万全を期していますが、無保証です。</p>
            <h3>使っている手法</h3>
            <ul>
                <li>事前の分析：比率の検定を用いてサンプルサイズを見積もり</li>
                <li>事後の分析：カイ二乗検定を用いてCTRに差があったか検定</li>
            </ul>
        </div>
    </div>
</div>

@endsection
