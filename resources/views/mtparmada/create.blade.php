@extends('layouts.main')

@push('styles')
 <!-- page specific plugin style -->
@endpush

@section('breadcrumb','Master Type Armada')
@section('subBreadcrumb','Tambah Master Type Armada')
@section('link','mtparmada')
@section('title','Tambah Master Type Armada')
@section('subTitle','Merupakan halaman tambah type armada dalam sistem')

@section('container')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="{{ url('/mtparmada')}}" method="post" autocomplete="off">
            @csrf
                <!-- text input -->
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vtvtyp">Type Armada *</label>
                        <input type="text" class="form-control" required name='vtvtyp' id="form-vtvtyp" maxlength="10" value="{{old('vtvtyp')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vtdesc">Keterangan *</label>
                        <input type="text" class="form-control" required name='vtdesc' id="form-vtdesc" maxlength="40" value="{{old('vtdesc')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vtmot">MOT *</label>
                        <select class="form-control select2" required name='vtmot' id="form-vtmot" style="width: 100%">>
                            <option value="">Silakan Pilih</option>
                            @foreach($mot as $dtMot)
                                <option value="{{$dtMot->mtmot}}">{{$dtMot->mtdesc}}</option>
                            @endforeach                                    
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vtwuom">Satuan Berat</label>
                        <input type="text" class="form-control" required name='vtwuom' id="form-vtwuom" maxlength="3" value="{{old('vtwuom')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vteweight">Berat Armada Kosong</label>
                        <input type="text" class="form-control" name='vteweight' id="form-vteweight" value="{{old('vteweight')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vtcweight">Kapasitas Berat</label>
                        <input type="text" class="form-control" name='vtcweight' id="form-vtcweight" value="{{old('vtcweight')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vtvuom">Satuan Volume</label>
                        <input type="text" class="form-control" name='vtvuom' id="form-vtvuom" maxlength="3" value="{{old('vtvuom')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vtcvolume">Kapasitas Volume</label>
                        <input type="text" class="form-control" name='vtcvolume' id="form-vtcvolume" value="{{old('vtcvolume')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vtpuom">Satuan Jumlah Muatan</label>
                        <input type="text" class="form-control" name='vtpuom' id="form-vtpuom" maxlength="3" value="{{old('vtpuom')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vtcpiece">Kapasitas Jumlah Muatan</label>
                        <input type="text" class="form-control" name='vtcpiece' id="form-vtcpiece" value="{{old('vtcpiece')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vtnaxl">Jumlah Sumbu Roda</label>
                        <input type="text" class="form-control" name='vtnaxl' id="form-vtnaxl" value="{{old('vtnaxl')}}">
                    </div>
                </div>                
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vtcby">Kapasitas Limit by *</label>
                        <select class="form-control" required name='vtcby' id="form-vtcby">
                            <option  value="">Silakan Pilih</option>
                            <option value="W">Berat</option>
                            <option value="V">Volume</option>
                            <option value="P">Pieces</option>
                        </select>
                    </div>
                </div>
                <div class="box-footer col-sm-12 col-md-12">
                    <button class="btn btn-sm btn-success" type="submit" class="btn btn-primary">Simpan</button>
                    <button class="btn btn-sm btn-danger" type="reset" class="btn btn-primary">Reset</button>
                    <a href="{{ url('/mtparmada') }}" class="btn btn-sm btn-warning">Kembali</a>
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