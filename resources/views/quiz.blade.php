<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{route('quiz.result', $quiz->slug)}}" method="POST">
                @csrf
                @foreach($quiz->questions as $question)
                    <strong> {{$loop->iteration}} {{$question->question}}</strong>
                    @if($question->image)
                        <img src="{{asset($question->image)}}" width="500" class="img-thumbnail"
                             alt="{{$question->question}}">
                    @endif
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{$question->id}}"
                               id="quiz{{$question->answer1}}"
                               value="answer1" required>
                        <label class="form-check-label" for="quiz{{$question->answer1}}">
                            {{$question->answer1}}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{$question->id}}"
                               id="quiz{{$question->answer2}}"
                               value="answer2" required>
                        <label class="form-check-label" for="quiz{{$question->answer2}}">
                            {{$question->answer2}}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{$question->id}}"
                               id="quiz{{$question->answer3}}"
                               value="answer3" required>
                        <label class="form-check-label" for="quiz{{$question->answer3}}">
                            {{$question->answer3}}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{$question->id}}"
                               id="quiz{{$question->answer4}}"
                               value="answer4" required>
                        <label class="form-check-label" for="quiz{{$question->answer4}}">
                            {{$question->answer4}}
                        </label>
                    </div>
                    @if(!$loop->last)
                        <hr>
                    @endif
                @endforeach

                <div class="d-grid gap-2 mt-3">
                    <button type="submit" class="btn btn-primary">Testi Bitir</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
