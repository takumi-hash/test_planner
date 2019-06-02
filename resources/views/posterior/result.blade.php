@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <ul>
                <li>
                    Control Imp: {{ $control_imp }}
                </li>
                <li>
                    Control CV: {{ $control_cv }}
                </li>
                <li>
                    Experimental Imp: {{ $experimental_imp }}
                </li>
                <li>
                    Expeerimental CV: {{ $experimental_cv }}
                </li>
                <li>
                    Significant Level: {{ $res->p_value }}
                </li>
                <li>
                    Power: {{ $res->power }}
                </li>
            </ul>
        </div>
    </div>
@endsection
