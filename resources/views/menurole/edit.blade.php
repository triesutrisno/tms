@extends('layouts.main')

@push('styles')
 
@endpush

@section('breadcrumb','Menu Role')
@section('subBreadcrumb','Ubah Menu Role')
@section('link','menurole')
@section('title','Ubah Menu Role')
@section('subTitle','Merupakan halaman ubah menu role dalam sistem')

@section('container')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="{{url('/menurole')}}/{{$menurole->menurole_id}}" method="post" autocomplete="off">
            @method('patch')
            @csrf
                <!-- text input -->
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-role_nama">Nama Role *</label>
                        <select class="form-control" required name='role_nama' id="form-role_nama">
                            <option value="">Silakan Pilih</option>
                            @foreach($roles as $role)
                                <option value="{{$role->role_nama}}" @if($role->role_nama == $menurole->role_nama) Selected @endif>{{$role->role_nama}}</option>
                            @endforeach                                     
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-role_nama">Nama Menu *</label>
                        <select class="form-control" required name='menu_id' id="form-menu_parent">
                            <option value="">Silakan Pilih</option>
                            @foreach($menus as $menu)
                                <option value="{{$menu->menu_id}}" @if($menu->menu_id == $menurole->menu_id) Selected @endif>{{$menu->menu_nama}}</option>
                            @endforeach                                     
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-menurole_status">Status</label>
                        <select class="form-control" name='menurole_status' id="form-menurole_status">
                            <option  value="">Silakan Pilih</option>
                            <option value="1" @if($menurole->menurole_status == "1") Selected @endif>Aktif</option>
                            <option value="2" @if($menurole->menurole_status == "2") Selected @endif>Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="checkbox inline">
                      <label>
                          <input type="checkbox" name="mrc" value="1" @if($menurole->mrc == "1") checked="true" @endif> Create
                      </label>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox inline">
                      <label>
                        <input type="checkbox" name="mrr" value="1" @if($menurole->mrr == "1") checked="true" @endif> Read
                      </label>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox inline">
                      <label>
                        <input type="checkbox" name="mru" value="1" @if($menurole->mru == "1") checked="true" @endif> Update
                      </label>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox inline">
                      <label>
                        <input type="checkbox" name="mrd" value="1" @if($menurole->mrd == "1") checked="true" @endif> Delete
                      </label>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox inline">
                      <label>
                        <input type="checkbox" name="mr01" value="1" @if($menurole->mr01 == "1") checked="true" @endif> Option 1
                      </label>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox inline">
                      <label>
                        <input type="checkbox" name="mr02" value="1" @if($menurole->mr02 == "1") checked="true" @endif> Option 2
                      </label>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="checkbox inline">
                      <label>
                        <input type="checkbox" name="mr03" value="1" @if($menurole->mr03 == "1") checked="true" @endif> Option 3
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
@endpush