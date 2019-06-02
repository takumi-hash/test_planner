<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Test Planner') }}</title>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <script>
        function changeReadOnly(){
            var obj = document.getElementById('power_input');
            if(obj.readOnly == true){
                obj.readOnly = false;
            }else{
                obj.readOnly = true;
            }
            var radios1 = document.getElementById('radios1');
            if(radios1.disabled == true){
                radios1.disabled = false;
            }else{
                radios1.disabled = true;
            }
            var radios2 = document.getElementById('radios2');
            if(radios2.disabled == true){
                radios2.disabled = false;
            }else{
                radios2.disabled = true;
            }
        };
        </script>

    </head>
    <body>
        @include('commons.navbar')

        @yield('cover')

        @include('commons.error_messages')
        @yield('content')

        @include('commons.footer')
        <!-- Optional JavaScript -->
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
