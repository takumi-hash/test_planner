@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <ul>
                <li>
                    Control CTR: {{ $res->control_ctr}}
                </li>
                <li>
                    Expecting CTR: {{ $res->experimental_ctr }}
                </li>
                <li>
                    Significant Level: {{ $p_value }}
                </li>
                <li>
                    Power: {{ $power }}
                </li>
                <li>
                    必要なサンプルサイズ：1群あたり{{ $res->result_n }}
                </li>
            </ul>
        </div>
    </div>
@endsection
