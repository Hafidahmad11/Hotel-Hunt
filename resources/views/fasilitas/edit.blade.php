@extends('layouts.layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Fasilitas
                    <a href="{{ url('admin/fasilitas') }}" class="float-right btn btn-success btn-sm">View All</a>
                </h6>
            </div>
            <div class="card-body">
                @if (Session::has('success'))
                    <p class="text-success">{{ session('success') }}</p>
                @endif
                <div class="table-responsive">
                    <form method="post" , action="{{ url('admin/fasilitas/' . $data->id) }}">
                        @csrf
                        @method('put')
                        <table class="table table-bordered">
                            <tr>
                                <th>Bintang</th>
                                <td><input value="{{ $data->bintang }}" name="bintang" type="text" class="form-control" />
                                </td>
                            </tr>
                            <tr>
                                <th>Fasilitas</th>
                                <td><input value="{{ $data->namafasilitas }}" name="namafasilitas" type="text" class="form-control" />
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
