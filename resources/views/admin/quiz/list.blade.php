<x-app-layout>
    <x-slot name="header">Testlər</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Test Yarat</a>
            </h5>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Test</th>
                    <th scope="col">Status</th>
                    <th scope="col">Bitmə Tarixi</th>
                    <th scope="col">Əməliyyatlar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($quizzes as $quiz)
                <tr>
                    <th>{{$quiz->title}}</th>
                    <td>{{$quiz->status}}</td>
                    <td>{{$quiz->finished_at}}</td>
                    <td>
                        <a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
            {{$quizzes->links()}}
        </div>
    </div>
</x-app-layout>
