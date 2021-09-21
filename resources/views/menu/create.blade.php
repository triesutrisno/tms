@extends('layouts.main')

@push('styles')
 <!-- page specific plugin style --> 
<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('breadcrumb','Master Menu')
@section('subBreadcrumb','Tambah Master Menu')
@section('link','menu')
@section('title','Tambah Master Menu')
@section('subTitle','Merupakan halaman tambah menu dalam sistem')

@section('container')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="{{ url('/menu')}}" method="post" autocomplete="off">
            @csrf
                <!-- text input -->
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-menu_nama">Nama Menu *</label>
                        <input type="text" class="form-control" required name='menu_nama' id="form-menu_nama" value="{{old('menu_nama')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-menu_link">Link</label>
                        <input type="text" class="form-control" name='menu_link' id="form-menu_link" value="{{old('menu_link')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-menu_keterangan">Keterangan</label>
                        <input type="text" class="form-control" name='menu_keterangan' id="form-menu_keterangan" value="{{old('menu_keterangan')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-menu_parent">Parent</label>
                        <select class="form-control select2" name='menu_parent' id="form-menu_parent" style="width: 100%;">
                            <option value="">Silakan Pilih</option>
                            @foreach($menus as $menu)
                                <option value="{{$menu->menu_id}}">{{$menu->menu_nama}}</option>
                            @endforeach                                    
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-menu_type">Jenis</label>
                        <select class="form-control" name='menu_type' id="form-menu_type">
                            <option  value="">Silakan Pilih</option>
                            <option value="1">Root</option>
                            <option value="2">Level 1</option>
                            <option value="3">Level 2</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-menu_status">Status</label>
                        <select class="form-control" name='menu_status' id="form-menu_status">
                            <option  value="">Silakan Pilih</option>
                            <option value="1">Aktif</option>
                            <option value="2">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-menu_sort">Urutan</label>
                        <input type="text" class="form-control" name='menu_sort' id="form-menu_sort" value="{{old('menu_sort')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-menu_icon">Icon</label>
                        <input type="text" class="form-control" name='menu_icon' id="form-menu_sort" value="{{old('menu_icon')}}">
                    </div>
                </div>
                <div class="box-footer col-sm-12 col-md-12">
                    <button class="btn btn-sm btn-success" type="submit" class="btn btn-primary">Simpan</button>
                    <button class="btn btn-sm btn-danger" type="reset" class="btn btn-primary">Reset</button>
                    <a href="{{ url('/menu') }}" class="btn btn-sm btn-warning">Kembali</a>
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
<script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}" type="text/javascript"></script>

<script>
    jQuery(document).ready(function () {
        // For select 2
        $(".select2").select2();
    });
</script>
@endpush