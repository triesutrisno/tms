@extends('layouts.main')

@push('styles') 
 <!-- page specific plugin style --> 
<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('breadcrumb','Master Menu')
@section('subBreadcrumb','Ubah Master Menu')
@section('link','menu')
@section('title','Ubah Master Menu')
@section('subTitle','Merupakan halaman ubah menu dalam sistem')

@section('container')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="{{url('/menu')}}/{{$menu->menu_id}}" method="post" autocomplete="off">
            @method('patch')
            @csrf
                <!-- text input -->
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-menu_nama">Nama Menu *</label>
                        <input type="text" class="form-control" required name='menu_nama' id="form-menu_nama" maxlength="50" value="{{$menu->menu_nama}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-menu_link">Link</label>
                        <input type="text" class="form-control" name='menu_link' id="form-menu_link" maxlength="10" value="{{$menu->menu_link}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-menu_keterangan">Keterangan</label>
                        <input type="text" class="form-control" name='menu_keterangan' id="form-menu_keterangan" maxlength="150" value="{{$menu->menu_keterangan}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-menu_parent">Parent</label>
                        <select class="form-control select2" name='menu_parent' id="form-menu_parent" style="width: 100%;">
                            <option value="">Silakan Pilih</option>
                            @foreach($parents as $parent)
                                <option value="{{$parent->menu_id}}" @if($menu->menu_parent == $parent->menu_id) Selected @endif>{{$parent->menu_nama}}</option>
                            @endforeach                                    
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-menu_type">Jenis</label>
                         <select class="form-control" name='menu_type' id="form-menu_type">
                            <option  value="">Silakan Pilih</option>
                            <option value="1" @if($menu->menu_type == "1") Selected @endif>Root</option>
                            <option value="2" @if($menu->menu_type == "2") Selected @endif>Level 1</option>
                            <option value="3" @if($menu->menu_type == "3") Selected @endif>Level 2</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-menu_status">Status</label>
                        <select class="form-control" name='menu_status' id="form-menu_status">
                            <option  value="">Silakan Pilih</option>
                            <option value="1" @if($menu->menu_status == "1") Selected @endif>Aktif</option>
                            <option value="2" @if($menu->menu_status == "2") Selected @endif>Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-menu_sort">Urutan</label>
                        <input type="text" class="form-control" name='menu_sort' id="form-menu_sort" maxlength="6" value="{{$menu->menu_sort}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-menu_icon">Icon</label>
                        <input type="text" class="form-control" name='menu_icon' id="form-menu_sort" maxlength="30" value="{{$menu->menu_icon}}">
                    </div>
                </div>
                <div class="box-footer col-sm-12 col-md-12">
                    <button class="btn btn-sm btn-primary" type="submit" class="btn btn-primary">Simpan</button>
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