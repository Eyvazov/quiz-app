<x-app-layout>
    <x-slot name="header">Testlər</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Test
                    Yarat</a>
            </h5>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Test</th>
                    <th>Sual Sayı</th>
                    <th scope="col">Status</th>
                    <th scope="col">Bitmə Tarixi</th>
                    <th scope="col">Əməliyyatlar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($quizzes as $quiz)
                    <tr>
                        <td>{{$quiz->title}}</td>
                        <td>{{$quiz->questions_count}}</td>
                        <td>
                            @if($quiz->status == 'publish')
                                <span class="btn btn-sm btn-success">
                                Aktiv
                            </span>
                            @elseif($quiz->status == 'passive')
                                <span class="btn btn-sm btn-danger">
                                Passiv
                            </span>
                            @elseif($quiz->status == 'draft')
                                <span class="btn btn-sm btn-warning">
                                Qaralama
                            </span>
                            @endif
                        </td>
                        <td><span title="{{$quiz->finished_at}}">{{$quiz->finished_at ? $quiz->finished_at->diffForHumans() : '-'}}</span></td>
                        <td>
                            <a href="{{route('questions.index', $quiz->id)}}" class="btn btn-warning"><i
                                    class="fa fa-question"></i></a>
                            <a href="{{route('quizzes.edit', $quiz->id)}}" class="btn btn-primary"><i
                                    class="fa fa-edit"></i></a>
                            <a href="{{route('quizzes.destroy', $quiz->id)}}" class="btn btn-danger"><i
                                    class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$quizzes->links()}}
        </div>
    </div>
</x-app-layout>
