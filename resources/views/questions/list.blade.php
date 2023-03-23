@extends('app')

@section('content')

<form id="form" action="{{ route('quiz', $quiz) }}" method="post">
    @csrf

    @if ($quiz)
    @foreach ($quiz['questions'] as $question)
    <x-question :question="$question" :index="$loop->index+1" />
    @endforeach
    @endif

    <button type="submit" class="center green-btn">Submit</button>
</form>

<script>
    document.getElementById('form').addEventListener("submit", function(e) {
        // Get all radio buttons for this question
        var radios = document.getElementsByClassName("answer");
        // Check if at least one radio button is checked
        var checked = 0;
        for (var i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                checked++;
            }
        }
        // If no radio button is checked, prevent the form from submitting and show an error message
        if (checked < 20) {
            e.preventDefault();
            alert("Please answer all questions.");
        }
    });
</script>

@endsection