@extends('layouts.main')

@push('styles')
 <!-- page specific plugin style -->
@endpush

@section('breadcrumb','Master Type Armada')
@section('subBreadcrumb','Ubah Master Type Armada')
@section('link','mtparmada')
@section('title','Ubah Master Type Armada')
@section('subTitle','Merupakan halaman ubah master type armada dalam sistem')

@section('container')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="{{ url('/mtparmada')}}/{{$datas->vtvtyp}}" method="post" autocomplete="off">
            @method('patch')
            @csrf
                <!-- text input -->
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vtvtyp">Type Armada *</label>
                        <input type="hidden" class="form-control" required name='vtvtyp'  id="form-vtvtyp" maxlength="10" value="{{$datas->vtvtyp}}">
                        <input type="text" class="form-control"  disabled="true" name='vtvtyp2' id="form-vtvtyp2" maxlength="10" value="{{$datas->vtvtyp}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vtdesc">Keterangan *</label>
                        <input type="text" class="form-control" required name='vtdesc' id="form-vtdesc" maxlength="40" value="{{$datas->vtdesc}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vtmot">MOT *</label>
                        <select class="form-control select2" required name='vtmot' id="form-vtmot" style="width: 100%">>
                            <option value="">Silakan Pilih</option>
                            @foreach($mot as $dtMot)
                                <option value="{{$dtMot->mtmot}}" @if($dtMot->mtmot == $datas->vtmot) Selected @endif>{{$dtMot->mtdesc}}</option>
                            @endforeach                                    
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vtwuom">Satuan Berat</label>
                        <input type="text" class="form-control" required name='vtwuom' id="form-vtwuom" maxlength="3" value="{{$datas->vtwuom}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vteweight">Berat Armada Kosong</label>
                        <input type="text" class="form-control" name='vteweight' id="form-vteweight" value="{{$datas->vteweight}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vtcweight">Kapasitas Berat</label>
                        <input type="text" class="form-control" name='vtcweight' id="form-vtcweight" value="{{$datas->vtcweight}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vtvuom">Satuan Volume</label>
                        <input type="text" class="form-control" name='vtvuom' id="form-vtvuom" maxlength="3" value="{{$datas->vtvuom}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vtcvolume">Kapasitas Volume</label>
                        <input type="text" class="form-control" name='vtcvolume' id="form-vtcvolume" value="{{$datas->vtcvolume}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vtpuom">Satuan Jumlah Muatan</label>
                        <input type="text" class="form-control" name='vtpuom' id="form-vtpuom" maxlength="3" value="{{$datas->vtpuom}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vtcpiece">Kapasitas Jumlah Muatan</label>
                        <input type="text" class="form-control" name='vtcpiece' id="form-vtcpiece" value="{{$datas->vtcpiece}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vtnaxl">Jumlah Sumbu Roda</label>
                        <input type="text" class="form-control" name='vtnaxl' id="form-vtnaxl" value="{{$datas->vtnaxl}}">
                    </div>
                </div>                
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vtcby">Kapasitas Limit by *</label>
                        <select class="form-control" required name='vtcby' id="form-vtcby">
                            <option  value="">Silakan Pilih</option>
                            <option value="W" @if($datas->vtcby == "W") Selected @endif>Berat</option>
                            <option value="V" @if($datas->vtcby == "V") Selected @endif>Volume</option>
                            <option value="P" @if($datas->vtcby == "P") Selected @endif>Pieces</option>
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