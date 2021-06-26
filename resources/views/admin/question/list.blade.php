<x-app-layout>
    <x-slot name="header">{{$quiz->title}} Testinə Aid Suallar</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{route('questions.create', $quiz->id)}}" class="btn btn-sm btn-primary"><i
                        class="fa fa-plus"></i> Sual Yarat</a>
            </h5>
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">Sual</th>
                    <th scope="col">Şəkil</th>
                    <th scope="col">1-ci cavab</th>
                    <th scope="col">2-ci cavab</th>
                    <th scope="col">3-cü cavab</th>
                    <th scope="col">4-cü cavab</th>
                    <th scope="col">Doğru cavab</th>
                    <th scope="col" >Əməliyyatlar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($quiz->questions as $question)
                    <tr>
                        <td>{{$question->question}}</td>
                        <td><img src="{{asset($question->image)}}" width="150" alt=""></td>
                        <td>{{$question->answer1}}</td>
                        <td>{{$question->answer2}}</td>
                        <td>{{$question->answer3}}</td>
                        <td>{{$question->answer4}}</td>
                        <td class="text-success">{{substr($question->correct_answer, -1)}}. Cavab</td>
                        <td>
                            <a href="{{route('questions.edit', [$quiz->id,$question->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
