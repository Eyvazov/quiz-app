<x-app-layout>
    <x-slot name="header">Testi Redaktə Et</x-slot>

    <style>
        .form-group{
            margin: 10px 0;
        }
    </style>
    <div class="card">
        <div class="card-body">
            <form action="{{route('quizzes.update', $quiz->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Test Başlığı</label>
                    <input type="text" name="title" value="{{$quiz->title}}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Test Açıqlaması</label>
                    <textarea name="description"  class="form-control" rows="4">{{$quiz->description}}</textarea>
                </div>
                <div class="form-group">
                    <input type="checkbox" @if($quiz->finished_at) checked @endif id="isFinished">
                    <label for="isFinished">Test Bitiş Tarixi Olsun?</label>
                </div>
                <div class="form-group" id="finishedInput" @if(!$quiz->finished_at) style="display: none;" @endif>
                    <label>Test Bitiş Tarixi</label>
                    <input type="datetime-local" @if($quiz->finished_at) value="{{date('Y-m-d\TH:i', strtotime($quiz->finished_at))}}" @endif name="finished_at" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm" type="submit">Redaktə Et</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
            $('#isFinished').change(function (){
                if ($('#isFinished').is(':checked')){
                    $('#finishedInput').show();
                }else{
                    $('#finishedInput').hide();
                }
            });
        </script>
    </x-slot>
</x-app-layout>
