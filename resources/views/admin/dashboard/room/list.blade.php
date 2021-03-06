@extends('admin.index')
@section('title','Danh sách phòng')
@push('css')
    <link href="https://cdn.datatables.net/1.15/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <style>
        .table-plus img:hover {
            transform: scale(5);
                /* Safari & Google Chrome */
                -webkit-transform: scale(5);
                /* Mozilla Firefox */
                -moz-transform: scale(5); 
                /* Opera */
                -o-transform: scale(5);
                /* IE 9 */
                -ms-transform: scale(5);
            cursor: pointer; 
        }
    </style>
@endpush
@section('content')
<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4">Quản lý phòng ban</h4>
        </div>
        <div class="pull-right">
            <a href="{{route('get.room.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Thêm</a>
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
                    <th scope="col">Tên phòng</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Website</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <td>{{$room->id}}</td>
                        <td>{{$room->name}}</td>
                        <td>{{$room->email }}</td>
                        <td>{{$room->phone}}</td>
                        
                        <td class="table-plus">
                            <img src="{{asset($room->avatar)}}" width="70" height="70" alt="">
                        </td>
                        <td class="text-center">
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item" href="{{route('get.room.edit',$room->id)}}"><i class="dw dw-edit2"></i> Edit</a>
                                    <a class="dropdown-item" href="{{route('get.room.delete',$room->id)}}"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>  
    </div>
</div> 
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.15/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function () {
    $('#datatables').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.15/i18n/vi.json"
        }
    });
});
</script>
@endpush