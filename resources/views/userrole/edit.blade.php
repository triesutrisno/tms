@extends('layouts.main')

@push('styles') 
 <!-- page specific plugin style --> 
<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('breadcrumb','User Role')
@section('subBreadcrumb','Ubah User Role')
@section('link','userrole')
@section('title','Ubah User Role')
@section('subTitle','Merupakan halaman ubah user role dalam sistem')

@section('container')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="{{url('/userrole')}}/{{$userroles->userrole_id}}" method="post" autocomplete="off">
            @method('patch')
            @csrf
                <!-- text input -->
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-menu_username">Username *</label>
                        <input type="hidden" class="form-control" required name='username' id="form-role_nama" value="{{$userroles->username}}">
                        <select class="form-control select2" name='username2' disabled="true" id="form-username2" style="width: 100%">
                            <option value="">Silakan Pilih</option>
                            @foreach($users as $user)
                                <option value="{{$user->username}}" @if($user->username == $userroles->username) Selected @endif>{{$user->name}}</option>
                            @endforeach                                     
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-role_nama">Role *</label>
                        <select class="form-control select2" required name='role_nama' id="form-role_nama" style="width: 100%">>
                            <option value="">Silakan Pilih</option>
                            @foreach($roles as $role)
                                <option value="{{$role->role_nama}}" @if($role->role_nama == $userroles->role_nama) Selected @endif>{{$role->role_nama}}</option>
                            @endforeach                                   
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-userrole_status">Status</label>
                        <select class="form-control" name='userrole_status' id="form-userrole_status">
                            <option  value="">Silakan Pilih</option>
                            <option value="1" @if($userroles->userrole_status == "1") Selected @endif>Aktif</option>
                            <option value="2" @if($userroles->userrole_status == "2") Selected @endif>Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="box-footer col-sm-12 col-md-12">
                    <button class="btn btn-sm btn-success" type="submit" class="btn btn-primary">Simpan</button>
                    <button class="btn btn-sm btn-danger" type="reset" class="btn btn-primary">Reset</button>
                    <a href="{{ url('/userrole') }}" class="btn btn-sm btn-warning">Kembali</a>
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