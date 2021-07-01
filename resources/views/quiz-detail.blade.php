<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>

    <div class="card">
        <div class="card-body">
            <p class="card-text">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if($quiz->myResult)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Xal
                                <span class="badge bg-primary rounded-pill">{{$quiz->myResult->point}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Doğru və Səhv Cavab
                                <div class="float-right">
                                    <span
                                        class="badge bg-success rounded-pill">{{$quiz->myResult->correct}} Doğru</span>
                                    <span class="badge bg-danger rounded-pill">{{$quiz->myResult->wrong}} Səhv</span>
                                </div>
                            </li>
                        @endif
                        @if($quiz->questions_count)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Sual Sayı
                                <span class="badge bg-dark rounded-pill">{{$quiz->questions_count}}</span>
                            </li>
                        @endif
                        @if($quiz->finished_at)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Son İştirak Tarixi
                                <span title="{{$quiz->finished_at}}"
                                      class="badge bg-primary rounded-pill">{{$quiz->finished_at->diffForHumans()}}</span>
                            </li>
                        @endif
                        @if($quiz->details)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                İştirakçı Sayı
                                <span class="badge bg-dark rounded-pill">{{$quiz->details['join_count']}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Ortalama Xal
                                <span class="badge bg-dark rounded-pill">{{$quiz->details['average']}}</span>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="col-md-8">
                    {{$quiz->description}}
                    @if($quiz->myResult)
                        <a href="{{route('quiz.join', $quiz->slug)}}">
                            <div class="d-grid gap-2 mt-3">
                                <button class="btn btn-secondary btn-sm">Test-ə Bax</button>
                            </div>
                        </a>
                    @else
                        <a href="{{route('quiz.join', $quiz->slug)}}">
                            <div class="d-grid gap-2 mt-3">
                                <button class="btn btn-primary btn-sm">Test-ə Qatıl</button>
                            </div>
                        </a>
                    @endif
                </div>
            </div>
            </p>

        </div>
    </div>

</x-app-layout>
