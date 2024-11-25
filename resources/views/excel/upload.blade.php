<form action="{{ route('excel.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="vocabularyguidelineid" value="1">
    <input type="file" name="excel_file" />
    <button type="submit">{{ __('label.upload') }}</button>
</form>
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">{{ $errors->first() }}</div>
@endif
