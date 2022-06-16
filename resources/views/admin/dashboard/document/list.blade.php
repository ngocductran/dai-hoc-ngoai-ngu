@extends('admin.index')
@section('title','Danh sách tài liệu')
@push('css')
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endpush
@section('content')
<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="h4">Quản lý tài liệu</h4>
        </div>
        <div class="pull-right">
            <a href="{{route('get.document.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Thêm</a>
        </div>
    </div>  
    <hr>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table" id="datatables" class="table table-bordered table-hover table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên File</th>
                    <th scope="col">Phòng</th>
                    <th scope="col">Đường dẫn</th>
                    <th scope="col">Lượt tải</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $document)
                    <tr>
                        <td>{{$document->id}}</td>
                        <td>{{$document->name}}</td>
                        <td>{{$document->room->name}}</td>
                        <td><a href="{{asset($document->file)}}">{{asset($document->file)}}</a></td>
                        <td>{{$document->views}}</td>
                        <td class="text-center">
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#file-{{$document->id}}"><i class="dw dw-eye"></i> Xem</a>
                                    <a class="dropdown-item" href="{{route('get.document.edit',$document->id)}}"><i class="dw dw-edit2"></i> Edit</a>
                                    <a class="dropdown-item" href="{{route('get.document.delete',$document->id)}}"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div>
                        </td>

                        <div class="modal fade" id="file-{{$document->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalLabel">{{$document->name}}</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <embed src="https://drive.google.com/viewerng/viewer?embedded=true&url={{asset($document->file)}}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
            </tbody>
        </table>  
    </div>
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
@endpush