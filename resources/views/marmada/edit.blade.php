@extends('layouts.main')

@push('styles')
 <!-- page specific plugin style -->
@endpush

@section('breadcrumb','Master Armada')
@section('subBreadcrumb','Ubah Master Armada')
@section('link','marmada')
@section('title','Ubah Master  Armada')
@section('subTitle','Merupakan halaman ubah master armada dalam sistem')

@section('container')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="{{ url('/marmada')}}/{{$datas->vmvehid}}" method="post" autocomplete="off">
            @method('patch')
            @csrf
                <!-- text input -->
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmvnum">No Pintu / Lambung *</label>
                        <input type="text" class="form-control" required name='vmvnum' id="form-vmvnum" maxlength="10" value="{{$datas->vmvnum}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmdesc">Keterangan *</label>
                        <input type="text" class="form-control" required name='vmdesc' id="form-vmdesc" maxlength="40" value="{{$datas->vmdesc}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmsernum">No Seri Armada </label>
                        <input type="text" class="form-control" name='vmsernum' id="form-vmsernum" maxlength="40" value="{{$datas->vmsernum}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmplate">Nomer Polisi *</label>
                        <input type="text" class="form-control" required name='vmplate' id="form-vmplate" maxlength="20" value="{{$datas->vmplate}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmpltype">Type Plat</label>
                        <input type="text" class="form-control" name='vmpltype' id="form-vmpltype" maxlength="10" value="{{$datas->vmpltype}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmennum">Nomer Mesin</label>
                        <input type="text" class="form-control" name='vmennum' id="form-vmennum" maxlength="40" value="{{$datas->vmennum}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmbrand">Merk *</label>
                        <input type="text" class="form-control" required name='vmbrand' id="form-vmbrand" maxlength="30" value="{{$datas->vmbrand}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmvown">Pemilik *</label>
                        <input type="text" class="form-control" required name='vmvown' id="form-vmvown" maxlength="10" value="{{$datas->vmvown}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmbrun">Branch *</label>
                        <input type="text" class="form-control" required name='vmbrun' id="form-vmbrun" maxlength="10" value="{{$datas->vmbrun}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmmfyr">Tahun Pembuatan *</label>
                        <input type="text" class="form-control" required name='vmmfyr' id="form-vmmfyr" maxlength="4" value="{{$datas->vmmfyr}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmaqyr">Tahun Beli *</label>
                        <input type="text" class="form-control" required name='vmaqyr' id="form-vmaqyr" maxlength="4" value="{{$datas->vmaqyr}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmvtyp">Type Armada *</label>
                        <select class="form-control select2" required name='vmvtyp' id="form-vmvtyp" style="width: 100%">>
                            <option value="">Silakan Pilih</option>
                            @foreach($mtpype as $dtMtype)
                                <option value="{{$dtMtype->vtvtyp}}" @if($dtMtype->vtvtyp == $datas->vmvtyp) Selected @endif>{{$dtMtype->vtdesc}}</option>
                            @endforeach                                    
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmhanac">Group Muatan</label>
                        <input type="text" class="form-control" name='vmhanac' id="form-vmhanac" maxlength="10" value="{{$datas->vmhanac}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmwuom">Satuan Berat</label>
                        <input type="text" class="form-control" required name='vmwuom' id="form-vmwuom" maxlength="3" value="{{$datas->vmwuom}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmeweight">Berat Armada Kosong</label>
                        <input type="text" class="form-control" name='vmeweight' id="form-vmeweight" value="{{$datas->vmeweight}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmcweight">Kapasitas Berat</label>
                        <input type="text" class="form-control" name='vmcweight' id="form-vmcweight" value="{{$datas->vmcweight}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmvuom">Satuan Volume</label>
                        <input type="text" class="form-control" name='vmvuom' id="form-vmvuom" maxlength="3" value="{{$datas->vmvuom}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmcvolume">Kapasitas Volume</label>
                        <input type="text" class="form-control" name='vmcvolume' id="form-vmcvolume" value="{{$datas->vmcvolume}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmpuom">Satuan Jumlah Muatan</label>
                        <input type="text" class="form-control" name='vmpuom' id="form-vtpuom" maxlength="3" value="{{$datas->vmpuom}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmcpiece">Kapasitas Jumlah Muatan</label>
                        <input type="text" class="form-control" name='vmcpiece' id="form-vmcpiece" value="{{$datas->vmcpiece}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmdpool">Kode Pool</label>
                        <input type="text" class="form-control" name='vmdpool' id="form-vmdpool" maxlength="10" value="{{$datas->vmdpool}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmdcarrier">Kode Pengelola</label>
                        <input type="text" class="form-control" name='vmdcarrier' id="form-vmdcarrier" maxlength="10" value="{{$datas->vmdcarrier}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmouts">Status Armada *</label>
                        <select class="form-control" required name='vmouts' id="form-vmouts">
                            <option  value="">Silakan Pilih</option>
                            <option value="0" @if($datas->vmouts == "0") Selected @endif>Aktif</option>
                            <option value="1" @if($datas->vmouts == "1") Selected @endif>Pemeliharaan</option>
                            <option value="2" @if($datas->vmouts == "2") Selected @endif>Blokir</option>
                            <option value="3" @if($datas->vmouts == "3") Selected @endif>Dijual</option>
                            <option value="4" @if($datas->vmouts == "4") Selected @endif>Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="form-vmtaxrate">Nilai Pajak</label>
                        <input type="text" class="form-control" name='vmtaxrate' id="form-vmtaxrate" value="{{$datas->vmtaxrate}}">
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