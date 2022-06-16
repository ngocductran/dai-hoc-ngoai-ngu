@extends('admin.index')
@section('title','Phân công công việc')
@section('content')
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Phân công công việc</h4>
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

    <form method="POST" enctype="multipart/form-data" action="{{route('post.work.create')}}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Tên công việc</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="{{old('name')}}" name="name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Ngày bắt đầu</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="date" value="{{old('date_start')}}" name="date_start">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Ngày kết thúc</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="date" value="{{old('date_end')}}" name="date_end">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Ghi chú</label>
            <div class="col-sm-12 col-md-10">
                <textarea id="intro" class="form-control ckeditor" name="note">{{ old('note')}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Người</label>
            <div class="col-sm-12 col-md-10">
                <select name="user" class="form-control">
                    <option value="">Người</option>
                    @foreach($users as $val))
                        <option value="{{ $val->id }}" {{old('user') == $val->id?'selected':false}}>{{ $val->fullname }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Phòng</label>
            <div class="col-sm-12 col-md-10">
                <select name="room" class="form-control">
                    <option value="">Phòng</option>
                    @foreach($rooms as $val))
                        <option value="{{ $val->id }}" {{old('room') == $val->id?'selected':false}}>{{ $val->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Sự kiện</label>
            <div class="col-sm-12 col-md-10">
                <select name="event" class="form-control">
                    <option value="">Sự kiện</option>
                    @foreach($events as $val))
                        <option value="{{ $val->id }}" {{old('event') == $val->id?'selected':false}}>{{ $val->name }}</option>
                    @endforeach
                </select>
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