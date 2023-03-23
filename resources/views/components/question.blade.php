@props(['question'=>$question, 'index'=>$index])

<a class="top-left-corner red-btn" href="{{ route('home') }}">< Back</a>
<div class="mb4">
    <p class="center title">{{ $question->question }}</p>
    
    <div class="checkboxes-wrapper" class="center">
        @foreach ($question->answers as $answer)
            <div class="checkbox">
                <label>
                    <input class="answer" type="radio" name="question[{{ $index }}][{{$question->id}}]" value="{{$answer->answer}}">
                    <span>{{$answer->answer}}</span>
                </label>
            </div>
        @endforeach
    </div>

    <div class="center line"></div>
</div>
