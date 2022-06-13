@extends('admin.index')
@section('title','Thêm sự kiện')
@section('content')
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Thêm sự kiện</h4>
        </div>
    </div>
    <hr>
    
    @if(session()->has('errors'))
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif

    <form method="POST" enctype="multipart/form-data" action="{{route('post.event.create')}}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Tên sự kiện</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="{{old('name')}}" name="name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nội dung</label>
            <div class="col-sm-12 col-md-10">
                <textarea id="intro" class="form-control ckeditor" name="content">{{ old('content')}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Ảnh</label>
            <div class="col-sm-12 col-md-6">
                <input type="file" class="form-control-file" oninput="pic.src=window.URL.createObjectURL(this.files[0])" name="avatar">
            </div>
            <div class="col-md-4">
                <img style="height: 120px;" class="img-fluid" id="pic"/>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button type="submit" class="btn btn-success">Thêm</button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function () {
    $('#datatables').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/vi.json"
        }
    });
});
</script>

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('intro');
</script>
@endpush