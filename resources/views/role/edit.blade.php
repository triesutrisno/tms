@extends('layouts.main')

@push('styles')
 
@endpush

@section('breadcrumb','Master Role')
@section('subBreadcrumb','Ubah Master Role')
@section('link','role')
@section('title','Ubah Master Role')
@section('subTitle','Merupakan halaman ubah role dalam sistem')

@section('container')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="{{url('/role')}}/{{$datas->role_nama}}" method="post" autocomplete="off">
            @method('patch')
            @csrf
                <!-- text input -->
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-role_nama">Nama Role *</label>
                        <input type="text" class="form-control" required name='role_nama' id="form-role_nama" value="{{$datas->role_nama}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-role_keterangan">Keterangan</label>
                        <input type="text" class="form-control" name='role_keterangan' id="form-role_keterangan" value="{{$datas->role_keterangan}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-role_status">Status *</label>
                        <select class="form-control" name='role_status' id="form-role_status">
                            <option  value="">Silakan Pilih</option>
                            <option value="1" @if($datas->role_status == "1") Selected @endif>Aktif</option>
                            <option value="2" @if($datas->role_status == "2") Selected @endif>Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="box-footer col-sm-12 col-md-12">
                    <button class="btn btn-sm btn-success" type="submit" class="btn btn-primary">Simpan</button>
                    <button class="btn btn-sm btn-danger" type="reset" class="btn btn-primary">Reset</button>
                    <a href="{{ url('/role') }}" class="btn btn-sm btn-warning">Kembali</a>
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