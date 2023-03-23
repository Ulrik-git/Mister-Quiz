@extends('app')

@section('content')

<a class="top-left-corner red-btn" href="{{ route('home') }}">< Back</a>
<table class="leaderboard-table">
    <thead>
        <tr>
            <th>Username</th>
            <th>XP</th>
            <th>Total Correct Answers</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->username }}</td>
            <td>{{ $user->xp }}</td>
            <td>{{ $user->total_correct }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection