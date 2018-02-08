@extends('layouts/master')

@section('content')

@javascript(compact('pusherKey', 'pusherCluster', 'usingNodeServer'))

<?php $columns = 8; $rows = 6;?>

<dashboard id="dashboard" columns="{{ $columns }}" rows="{{ $rows }}">
    <?php $count = 1; $rows = ['a','b','c','d','e','f','g','h']; $row_index = 0;?>
    @foreach($bdrs as $bdr)
        <employee employee="{{ $bdr->name }}" email="{{ $bdr->email }}" position="{{ $rows[$row_index] . $count }}:{{ $rows[$row_index+1] . $count }}"></employee>
            <?php $row_index += 2;?>
            @if($row_index >= $columns)
                <?php $row_index = 0; $count++?>
            @endif
    @endforeach

    {{--<twitter :initial-tweets="{{ json_encode($initialTweets) }}" position="a1:a3"></twitter>--}}
    {{--<uptime position="a1:a3"></uptime>--}}
    {{--<packagist position="b1"></packagist>--}}
    {{--<npm position="b2"></npm>--}}
    {{--<github position="b3"></github>--}}
    {{--<music position="c1:d1"></music>--}}
    <?php $count = $count += 2;  $row_index = 0;?>
    @foreach($closers as $closer)
            <employee employee="{{ $closer->name }}" email="{{ $closer->email }}" position="{{ $rows[$row_index] . $count }}:{{ $rows[$row_index+1] . $count }}"></employee>
            <?php $row_index += 2;?>
    @endforeach
    <time-weather position="g6:h7" date-format="ddd DD/MM" time-zone="America/New_York" weather-city="Tampa Bay"></time-weather>
        {{--<calendar position="f2:f3"></calendar>--}}
    {{--<internet-connection></internet-connection>--}}
</dashboard>

@endsection
