<x-app-layout>
    <x-slot name="header">Test Yarat</x-slot>
    <style>
        .form-group{
            margin: 10px 0;
        }
    </style>
    <div class="card">
        <div class="card-body">
            <form action="{{route('quizzes.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Test Başlığı</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label>Test Açıqlaması</label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <input type="checkbox" id="isFinished">
                    <label for="isFinished">Test Bitiş Tarixi Olsun?</label>
                </div>
                <div class="form-group" id="finishedInput" style="display: none;">
                    <label>Test Bitiş Tarixi</label>
                    <input type="datetime-local" name="finished_at" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm" type="submit">Əlavə Et</button>
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
