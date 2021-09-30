@extends('layouts.main')

@push('styles')
 <!-- page specific plugin style -->
@endpush

@section('breadcrumb','Master Armada')
@section('subBreadcrumb','Tambah Master Armada')
@section('link','marmada')
@section('title','Tambah Master  Armada')
@section('subTitle','Merupakan halaman tambah master armada dalam sistem')

@section('container')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="{{ url('/marmada')}}" method="post" autocomplete="off">
            @csrf
                <!-- text input -->
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmvnum">No Pintu / Lambung *</label>
                        <input type="text" class="form-control" required name='vmvnum' id="form-vmvnum" maxlength="10" value="{{old('vmvnum')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmdesc">Keterangan *</label>
                        <input type="text" class="form-control" required name='vmdesc' id="form-vmdesc" maxlength="40" value="{{old('vmdesc')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmsernum">No Seri Armada </label>
                        <input type="text" class="form-control" name='vmsernum' id="form-vmsernum" maxlength="40" value="{{old('vmsernum')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmplate">Nomer Polisi *</label>
                        <input type="text" class="form-control" required name='vmplate' id="form-vmplate" maxlength="20" value="{{old('vmplate')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmpltype">Type Plat</label>
                        <input type="text" class="form-control" name='vmpltype' id="form-vmpltype" maxlength="10" value="{{old('vmpltype')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmennum">Nomer Mesin</label>
                        <input type="text" class="form-control" name='vmennum' id="form-vmennum" maxlength="40" value="{{old('vmennum')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmbrand">Merk *</label>
                        <input type="text" class="form-control" required name='vmbrand' id="form-vmbrand" maxlength="30" value="{{old('vmbrand')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmvown">Pemilik *</label>
                        <input type="text" class="form-control" required name='vmvown' id="form-vmvown" maxlength="10" value="{{old('vmvown')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmbrun">Branch *</label>
                        <input type="text" class="form-control" required name='vmbrun' id="form-vmbrun" maxlength="10" value="{{old('vmbrun')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmmfyr">Tahun Pembuatan *</label>
                        <input type="text" class="form-control" required name='vmmfyr' id="form-vmmfyr" maxlength="4" value="{{old('vmmfyr')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmaqyr">Tahun Beli *</label>
                        <input type="text" class="form-control" required name='vmaqyr' id="form-vmaqyr" maxlength="4" value="{{old('vmaqyr')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmvtyp">Type Armada *</label>
                        <select class="form-control select2" required name='vmvtyp' id="form-vmvtyp" style="width: 100%">>
                            <option value="">Silakan Pilih</option>
                            @foreach($mtype as $dtMtype)
                                <option value="{{$dtMtype->vtvtyp}}">{{$dtMtype->vtdesc}}</option>
                            @endforeach                                    
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmhanac">Group Muatan</label>
                        <input type="text" class="form-control" name='vmhanac' id="form-vmhanac" maxlength="10" value="{{old('vmhanac')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmwuom">Satuan Berat</label>
                        <input type="text" class="form-control" required name='vmwuom' id="form-vmwuom" maxlength="3" value="{{old('vmwuom')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmeweight">Berat Armada Kosong</label>
                        <input type="text" class="form-control" name='vmeweight' id="form-vmeweight" value="{{old('vmeweight')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmcweight">Kapasitas Berat</label>
                        <input type="text" class="form-control" name='vmcweight' id="form-vmcweight" value="{{old('vmcweight')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmvuom">Satuan Volume</label>
                        <input type="text" class="form-control" name='vmvuom' id="form-vmvuom" maxlength="3" value="{{old('vmvuom')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmcvolume">Kapasitas Volume</label>
                        <input type="text" class="form-control" name='vmcvolume' id="form-vmcvolume" value="{{old('vmcvolume')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmpuom">Satuan Jumlah Muatan</label>
                        <input type="text" class="form-control" name='vmpuom' id="form-vtpuom" maxlength="3" value="{{old('vmpuom')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmcpiece">Kapasitas Jumlah Muatan</label>
                        <input type="text" class="form-control" name='vmcpiece' id="form-vmcpiece" value="{{old('vmcpiece')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmdpool">Kode Pool</label>
                        <input type="text" class="form-control" name='vmdpool' id="form-vmdpool" maxlength="10" value="{{old('vmdpool')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmdcarrier">Kode Pengelola</label>
                        <input type="text" class="form-control" name='vmdcarrier' id="form-vmdcarrier" maxlength="10" value="{{old('vmdcarrier')}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmouts">Status Armada *</label>
                        <select class="form-control" required name='vmouts' id="form-vmouts">
                            <option  value="">Silakan Pilih</option>
                            <option value="0">Aktif</option>
                            <option value="1">Pemeliharaan</option>
                            <option value="2">Blokir</option>
                            <option value="3">Dijual</option>
                            <option value="4">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmtaxrate">Nilai Pajak</label>
                        <input type="text" class="form-control" name='vmtaxrate' id="form-vmtaxrate" value="{{old('vmtaxrate')}}">
                    </div>
                </div>
                <div class="box-footer col-sm-12 col-md-12">
                    <button class="btn btn-sm btn-success" type="submit" class="btn btn-primary">Simpan</button>
                    <button class="btn btn-sm btn-danger" type="reset" class="btn btn-primary">Reset</button>
                    <a href="{{ url('/marmada') }}" class="btn btn-sm btn-warning">Kembali</a>
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
<script>
    $(function () {        
        $('#form-vmvtyp').on('change', function() {
            idType = $('#form-vmvtyp').find(":selected").val();
            //alert(idType);
            $.get("{{url('marmada')}}/gettype/"+idType)
            .done(function( data ) {
                var dt = JSON.parse(data);        
                //alert( "Data Loaded: " + dt[0]['vtwuom'] );
                 $('#form-vmwuom').val(dt[0]['vtwuom']);
                 $('#form-vmeweight').val(dt[0]['vteweight']);
                 $('#form-vmcweight').val(dt[0]['vtcweight']);
                 $('#form-vmvuom').val(dt[0]['vtvuom']);
                 $('#form-vmcvolume').val(dt[0]['vtcvolume']);
                 $('#form-vtpuom').val(dt[0]['vtpuom']);
                 $('#form-vmcpiece').val(dt[0]['vtcpiece']);
            });
        });
    });
</script>
@endpush