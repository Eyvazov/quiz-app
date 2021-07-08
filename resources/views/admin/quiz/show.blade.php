<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>

    <div class="card">
        <div class="card-body">
            <p class="card-text">
                <a href="{{route('quizzes.index')}}" class="btn btn-primary btn-sm">
                    <i class="fa fa-arrow-left"></i>
                    Testlərə Qayıt
                </a>
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
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
                        @if($quiz->my_rank)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Mənim Sıram
                                <span class="badge bg-primary rounded-pill">{{$quiz->my_rank}}</span>
                            </li>
                        @endif
                    </ul>

                    @if(count($quiz->topTen) > 0)
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5 class="card-title">İlk 10</h5>
                                <ul class="list-group">
                                    @foreach($quiz->topTen as $result)
                                        <li class="list-group-item d-flex align-items-center">
                                            <strong class="h5 mr-5">{{$loop->iteration}}</strong>
                                            <img src="{{$result->user->profile_photo_url}}"
                                                 class="rounded-full w-8 mr-5" alt="">
                                            <span class="@if(auth()->user()->id == $result->user_id) text-primary text-xl @endif">{{$result->user->name}}</span>
                                            <span
                                                class="badge bg-dark rounded-pill position-absolute right-3">{{$result->point}}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-md-8">
                    {{$quiz->description}}
                    <table class="table table-bordered mt-3">
                        <thead>
                        <tr>
                            <th scope="col">Ad Soyad</th>
                            <th scope="col">Xal</th>
                            <th scope="col">Doğru Cavablar</th>
                            <th scope="col">Səhv Cavablar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quiz->results as $result)
                            <tr>
                                <td>{{$result->user->name}}</td>
                                <td>{{$result->point}}</td>
                                <td><span class="text-success">{{$result->correct}}</span></td>
                                <td><span class="text-danger">{{$result->wrong}}</span></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </p>

        </div>
    </div>

</x-app-layout>
