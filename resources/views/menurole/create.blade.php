@extends('layouts.main')

@push('styles')
 <!-- page specific plugin style --> 
<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('breadcrumb','Menu Role')
@section('subBreadcrumb','Tambah Menu Role')
@section('link','menurole')
@section('title','Tambah Menu Role')
@section('subTitle','Merupakan halaman tambah menu role dalam sistem')

@section('container')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="{{ url('/menurole')}}" method="post" autocomplete="off">
            @csrf
                <!-- text input -->
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-role_nama">Nama Role *</label>
                        <select class="form-control" required name='role_nama' id="form-role_nama">
                            <option value="">Silakan Pilih</option>
                            @foreach($roles as $role)
                                <option value="{{$role->role_nama}}">{{$role->role_nama}}</option>
                            @endforeach                                    
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-role_nama">Nama Menu *</label>
                        <select class="form-control select2" multiple="multiple" required name='menu[]' id="form-menu_parent" style="width: 100%;">
                            <option value="">Silakan Pilih</option>
                            @foreach($menus as $menu)
                                <option value="{{$menu->menu_id}}">{{$menu->menu_nama}}</option>
                            @endforeach                                    
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-menurole_status">Status</label>
                        <select class="form-control" name='menurole_status' id="form-menurole_status">
                            <option  value="">Silakan Pilih</option>
                            <option value="1">Aktif</option>
                            <option value="2">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="checkbox inline">
                      <label>
                        <input type="checkbox" name="mrc" value="1"> Create
                      </label>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox inline">
                      <label>
                        <input type="checkbox" name="mrr" value="1"> Read
                      </label>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox inline">
                      <label>
                        <input type="checkbox" name="mru" value="1"> Update
                      </label>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox inline">
                      <label>
                        <input type="checkbox" name="mrd" value="1"> Delete
                      </label>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox inline">
                      <label>
                        <input type="checkbox" name="mr01" value="1"> Option 1
                      </label>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox inline">
                      <label>
                        <input type="checkbox" name="mr02" value="1"> Option 2
                      </label>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox inline">
                      <label>
                        <input type="checkbox" nama="mr03" value="1"> Option 3
                      </label>
                    </div>
                </div>
                <div class="box-footer col-sm-12 col-md-12">
                    <button class="btn btn-sm btn-success" type="submit" class="btn btn-primary">Simpan</button>
                    <button class="btn btn-sm btn-danger" type="reset" class="btn btn-primary">Reset</button>
                    <a href="{{ url('/menurole') }}" class="btn btn-sm btn-warning">Kembali</a>
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