<x-app-layout>
    <x-slot name="header">{{$quiz->title}} nəticəsi</x-slot>

    <div class="card">
        <div class="card-body">
            <p class="h4">Sizin Xalınız: <strong>{{$quiz->myResult->point}}</strong></p>
            <div class="alert alert-primary">
                <strong><i class="fa fa-check text-success"></i> Doğru Cavab</strong> <br>
               <strong><i class="fa fa-times text-danger"></i> Səhv Cavab</strong> <br>
                <strong><i class="fa fa-square text-danger"></i> Seçilmiş Cavab</strong>
            </div>
            @foreach($quiz->questions as $question)
                @if($question->correct_answer == $question->myAnswer->answer)
                    <i class="fa fa-check text-success" title="Düz Tapdın"></i>
                @else
                    <i class="fa fa-times text-danger" title="Səhv Tapdın"></i>
                @endif
                <strong> {{$loop->iteration}} {{$question->question}}</strong>
                @if($question->image)
                    <img src="{{asset($question->image)}}" width="500" class="img-thumbnail"
                         alt="{{$question->question}}">
                @endif
                    <br />
                    <small>Bu suala <strong>{{$question->true_percent}}%</strong> düzgün cavab verildi</small>
                <div class="form-check">
                    @if('answer1' == $question->correct_answer)
                        <i class="fa fa-check text-success" title="Doğru Cavab"></i>
                        @elseif('answer1' == $question->myAnswer->answer)
                        <i class="fa fa-square text-danger"></i>
                    @endif
                    <label class="@if('answer1' == $question->correct_answer) text-success text-xl @elseif('answer1' == $question->myAnswer->answer) text-danger  @endif form-check-label" for="quiz{{$question->answer1}}">
                        {{$question->answer1}}
                    </label>
                </div>
                <div class="form-check">
                    @if('answer2' == $question->correct_answer)
                        <i class="fa fa-check text-success" title="Doğru Cavab"></i>
                        @elseif('answer2' == $question->myAnswer->answer)
                        <i class="fa fa-square text-danger"></i>
                    @endif
                    <label class="@if('answer2' == $question->correct_answer) text-success text-xl @elseif('answer2' == $question->myAnswer->answer) text-danger  @endif form-check-label" for="quiz{{$question->answer2}}">
                        {{$question->answer2}}
                    </label>
                </div>
                <div class="form-check">
                    @if('answer3' == $question->correct_answer)
                        <i class="fa fa-check text-success" title="Doğru Cavab"></i>
                        @elseif('answer3' == $question->myAnswer->answer)
                        <i class="fa fa-square text-danger"></i>
                    @endif
                    <label class="@if('answer3' == $question->correct_answer) text-success text-xl @elseif('answer3' == $question->myAnswer->answer) text-danger  @endif form-check-label" for="quiz{{$question->answer3}}">
                        {{$question->answer3}}
                    </label>
                </div>
                <div class="form-check">
                    @if('answer4' == $question->correct_answer)
                        <i class="fa fa-check text-success" title="Doğru Cavab"></i>
                        @elseif('answer4' == $question->myAnswer->answer)
                        <i class="fa fa-square text-danger"></i>
                    @endif
                    <label class="@if('answer4' == $question->correct_answer) text-success text-xl @elseif('answer4' == $question->myAnswer->answer) text-danger  @endif form-check-label" for="quiz{{$question->answer4}}">
                        {{$question->answer4}}
                    </label>
                </div>
                @if(!$loop->last)
                    <hr>
                @endif
            @endforeach
        </div>
    </div>

</x-app-layout>
