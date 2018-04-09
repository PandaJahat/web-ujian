<a href="javascript:;" class="btn btn-primary btn-sm" onclick="questionCreate()"><i class="fa fa-plus"></i> Tambah Soal</a>

@component('components.modal')

    @slot('id')
        question-modal-create
    @endslot

    @slot('title')
        <i class="fa fa-file-text margin-r-5"></i>Soal Baru
    @endslot

    <form action="{{ route('admin.exam.question.create.submit', $exam) }}" method="post">
        <input type="hidden" name="exam_id" value="{{ $exam->id }}">
        @include('admin.question.formCreate')
    </form>
    <p>Catatan : <code>Pilih salah satu lingkaran untuk menentukan salah satu jawaban benar.</code></p>
    @slot('button')
        <button type="button" class="btn btn-primary" onclick="questionCreateSubmit()">Simpan</button>
    @endslot

@endcomponent

@push('scripts')
    <script>
        function questionCreate() {
            $('#question-modal-create').modal('show')
        }
        function questionCreateSubmit() {
            $('#question-modal-create').find('form').submit()
        }

        @if ($errors->questionPost->any())
            $(function () {
                $('#question-modal-create').modal('show')
            })
        @endif       
    </script>
@endpush
