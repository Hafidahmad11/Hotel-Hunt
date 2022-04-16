
@extends('layouts.layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Room Type
                    <a href="{{ url('admin/room') }}" class="float-right btn btn-success btn-sm">View All</a>
                </h6>
            </div>
            <div class="card-body">
                @if (Session::has('success'))
                    <p class="text-success">{{ session('success') }}</p>
                @endif
                <div class="table-responsive">
                    <form method="post" , action="{{ url('admin/room') }}">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th>Select Hotel Type</th>
                                <td>
                                    <select name="rt_id" class="form-control">
                                        <option value="0">--- Select ---</option>
                                    @foreach ($roomtypes as $rt)
                                    <option value="{{$rt->id}}">{{$rt->title}}</option>
                                    @endforeach
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th>Select Bintang Type</th>
                                <td>
                                    <select name="rt_id" class="form-control">
                                        <option value="0">--- Select ---</option>
                                    @foreach ($roomtypes as $rt)
                                    <option value="{{$rt->id}}">{{$rt->bintang}}</option>
                                    @endforeach
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th>Select Fasilitas Type</th>
                                <td>
                                    <select name="rt_id" class="form-control">
                                        <option value="0">--- Select ---</option>
                                    @foreach ($roomtypes as $rt)
                                    <option value="{{$rt->id}}">{{$rt->fasilitas}}</option>
                                    @endforeach
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td colspan="2">
                                    <input type="submit" class="btn btn-primary" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
