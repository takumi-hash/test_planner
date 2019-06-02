@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <h2>このツールについて</h2>
            <p>仕事でABテストをするときに、p値だけでなく検定力も見ながら実施したいなと思い自分用に作ったものを公開しています！　似たようなツールはすでにいくつかありますが、裏側で使っている手法なども把握しておきたかったのも自作した理由のひとつです。</p>
            <p>個人・商用とわず自由にご利用ください。正確性には万全を期していますが、無保証です。</p>
            <h3>使っている手法</h3>
            <ul>
                <li>事前の分析：比率の検定を用いてサンプルサイズを見積もり</li>
                <li>事後の分析：カイ二乗検定を用いてCTRに差があったか検定</li>
            </ul>
            <h3>その他</h3>
            {{--
            <p>サーバー維持費を気持ちだけでも支援していただけると大変ありがたいです…＞＜</p>
            <a href="https://paypal.me/takumihash?locale.x=ja_JP">安全なPayPal投げ銭で支援</a>
            --}}
        </div>
    </div>
</div>

@endsection
