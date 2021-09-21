@extends('layouts.main')

@push('styles')
 
@endpush

@section('breadcrumb','Menu User')
@section('subBreadcrumb','Ubah Menu User')
@section('link','user')
@section('title','Ubah Menu User')
@section('subTitle','Merupakan halaman ubah menu user dalam sistem')

@section('container')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="{{url('/user')}}/{{$datas->id}}" method="post" autocomplete="off">
            @method('patch')
            @csrf
                <!-- text input -->
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-username">Username *</label>
                        <input type="text" class="form-control" required name='username' id="form-username" value="{{$datas->username}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-name">Nama *</label>
                        <input type="text" class="form-control" required name='name' id="form-name" value="{{$datas->name}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-email">Email </label>
                        <input type="text" class="form-control" name='email' id="form-email" value="{{$datas->email}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-email">Password *</label>
                        <input type="password" class="form-control" required name='password' id="form-password" value="{{$datas->password}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-status">Status</label>
                        <select class="form-control" name='status' id="form-status">
                            <option  value="">Silakan Pilih</option>
                            <option value="1" @if($datas->status == "1") Selected @endif>Aktif</option>
                            <option value="2" @if($datas->status == "2") Selected @endif>Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="box-footer col-sm-12 col-md-12">
                    <button class="btn btn-sm btn-success" type="submit" class="btn btn-primary">Simpan</button>
                    <button class="btn btn-sm btn-danger" type="reset" class="btn btn-primary">Reset</button>
                    <a href="{{ url('/user') }}" class="btn btn-sm btn-warning">Kembali</a>
                </div>
            </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->      
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
@endsection


@push('scripts') 
<!-- page specific plugin scripts -->
@endpush