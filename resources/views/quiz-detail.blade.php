<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>

    <div class="card">
        <div class="card-body">
            <p class="card-text">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Sual Sayısı
                            <span class="badge bg-primary rounded-pill">{{$quiz->questions_count}}</span>
                        </li>
                        @if($quiz->finished_at)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Son İştirak Tarixi
                                <span title="{{$quiz->finished_at}}" class="badge bg-primary rounded-pill">{{$quiz->finished_at->diffForHumans()}}</span>
                            </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            İştirakçı Sayısı
                            <span class="badge bg-primary rounded-pill">14</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Ortalama Xal
                            <span class="badge bg-primary rounded-pill">2</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8">
                    {{$quiz->description}}
                    <a href="{{route('quiz.join', $quiz->slug)}}">
                    <div class="d-grid gap-2 mt-3">
                        <button class="btn btn-primary btn-sm">Test-ə Qatıl</button>
                    </div>
                    </a>
                </div>
            </div>
            </p>

        </div>
    </div>

</x-app-layout>
