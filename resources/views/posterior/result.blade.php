@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <ul>
                <li>
                    Effect Size: {{ $effect_size }}
                </li>
                <li>
                    Significant Level: {{ $p_value }}
                </li>
                <li>
                    Power: {{ $power }}
                </li>
                <li>
                    {{ $res->result_n }}
                </li>
            </ul>
        </div>
    </div>
@endsection