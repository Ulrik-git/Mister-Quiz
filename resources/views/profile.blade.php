@extends('app')

@section('content')
@php $xp = auth()->user()->xp; @endphp
<a class="top-right-corner red-btn" href="{{ route('home') }}">Back ></a>

<div style="margin-top:100px">
    <div class="profile-header">
        <p class="title profile-name">{{ auth()->user()->username }}</p>
        <p class="title profile-email">{{ auth()->user()->email }}</p>
    </div>

    <div class="profile-header">
        <p class="title profile-xp">{{ $xp }} XP</p>
        @if ($xp < 1500)
            <p class="title profile-rank">Quiz Aprentice</p>
        @elseif ($xp >= 1500 && $xp < 5000)
            <p class="title profile-rank">Average Quizer</p>
        @elseif ($xp >= 5000 && $xp < 10000)
            <p class="title profile-rank">Epic Quizer</p>
        @else
            <p class="title profile-rank">Quiz Master</p>
        @endif
    </div>
    <div class="profile-category">
        <h2>Art</h2>
        <p>Correct answers: {{ $art[1] != 0 ? round($art[0] * 100 / $art[1]) : 0 }} % ( {{ $art[0] }} / {{ $art[1] }} )</p>
        <h2>Geography</h2>
        <p>Correct answers: {{ $geography[1] != 0 ? round($geography[0] * 100 / $geography[1]) : 0 }} % ( {{ $geography[0] }} / {{ $geography[1] }} )</p>
        <h2>History</h2>
        <p>Correct answers: {{ $history[1] != 0 ? round($history[0] * 100 / $history[1]) : 0 }} % ( {{ $history[0] }} / {{ $history[1] }} )</p>
        <h2>Science</h2>
        <p>Correct answers: {{ $science[1] != 0 ? round($science[0] * 100 / $science[1]) : 0 }} % ( {{ $science[0] }} / {{ $science[1] }} )</p>
        <h2>Sports</h2>
        <p>Correct answers: {{ $sports[1] != 0 ? round($sports[0] * 100 / $sports[1]) : 0 }} % ( {{ $sports[0] }} / {{ $sports[1] }} )</p>
    </div>

</div>



@endsection