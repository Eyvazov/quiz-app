<x-app-layout>
    <x-slot name="header">{{$quiz->title}} üçün Yeni Sual Yarat</x-slot>

    <style>
        .form-group{
            margin: 10px 0;
        }
    </style>
    <div class="card">
        <div class="card-body">
            <form action="{{route('questions.store', $quiz->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Sual</label>
                    <textarea name="question"  class="form-control" rows="4">{{old('question')}}</textarea>
                </div>
                <div class="form-group">
                    <label>Şəkil</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cavab 1</label>
                            <textarea name="answer1"  class="form-control" rows="2">{{old('answer1')}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cavab 2</label>
                            <textarea name="answer2"  class="form-control" rows="2">{{old('answer2')}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cavab 3</label>
                            <textarea name="answer3"  class="form-control" rows="2">{{old('answer3')}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cavab 4</label>
                            <textarea name="answer4"  class="form-control" rows="2">{{old('answer4')}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Doğru Cavab</label>
                    <select name="correct_answer" class="form-control">
                        <option @if(old('correct_answer') == 'answer1') selected @endif value="answer1">1-ci cavab</option>
                        <option @if(old('correct_answer') == 'answer2') selected @endif value="answer2">2-ci cavab</option>
                        <option @if(old('correct_answer') == 'answer3') selected @endif value="answer2">3-cü cavab</option>
                        <option @if(old('correct_answer') == 'answer4') selected @endif value="answer4">4-cü cavab</option>
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-sm" type="submit">Əlavə Et</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
