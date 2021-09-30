@extends('layouts.main')

@section('breadcrumb','Master Armada')
@section('subBreadcrumb','Detail Master Armada')
@section('link','marmada')
@section('title','Detail Master Armada')
@section('subTitle','Merupakan halaman detail master armada dalam sistem')

@section('container')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            <div class="clearfix">
                @if($hakakses['aur']=='1')
                    <a href="{{url('/marmada')}}" class="btn btn-white btn-primary btn-bold">
                        <i class="ace-icon fa fa-folder-open-o bigger-120 blue"></i>
                        Lihat Data
                    </a>
                @endif
                @if($hakakses['auc']=='1')
                    <a href="{{url('/marmada/create')}}" class="btn btn-white btn-success btn-bold">
                            <i class="ace-icon glyphicon glyphicon-plus bigger-120 blue"></i>
                            Tambah Data
                    </a>
                @endif
                @if($hakakses['auu']=='1')
                    <a href="{{url('/marmada')}}/{{$datas[0]->vmvehid}}/edit" class="btn btn-white btn-warning btn-bold">
                            <i class="ace-icon fa fa-pencil bigger-120 blue"></i>
                            Ubah Data
                    </a>
                @endif
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    <tr>
                      <td class="mailbox-name" width="140">No Pintu / Lambung</td>
                      <td class="mailbox-star" width="10">:</td>
                      <td class="mailbox-subject" width="30%">{{ $datas[0]->vmvnum }}</td>
                      <td class="mailbox-name" width="140">Keterangan</td>
                      <td class="mailbox-star" width="10">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmdesc }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">No Seri Armada</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmsernum }}</td>
                      <td class="mailbox-name">Nomer Polisi</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmplate }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Type Plat</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmpltype }}</td>
                      <td class="mailbox-name">Nomer Mesin</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmennum }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Merk</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmbrand }}</td>
                      <td class="mailbox-name">Pemilik</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmvown }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Branch</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmbrun }}</td>
                      <td class="mailbox-name">Tahun Pembuatan</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmmfyr }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Tahun Beli</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmaqyr }}</td>
                      <td class="mailbox-name">Type Armada</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmvtyp }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Group Muatan</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmhanac }}</td>
                      <td class="mailbox-name">Satuan Berat</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmwuom }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Berat Kosong</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmeweight }}</td>
                      <td class="mailbox-name">Kapasitas Berat</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmcweight }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Satuan Volume</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmvuom }}</td>
                      <td class="mailbox-name">Kapasitas Volume</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmcvolume }}</td>
                    </tr>   
                    <tr>
                      <td class="mailbox-name">Satuan Jumlah</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmpuom }}</td>
                      <td class="mailbox-name">Kapasitas Jumlah</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmcpiece }}</td>
                    </tr>  
                    <tr>
                      <td class="mailbox-name">Kode Pool</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmdpool }}</td>
                      <td class="mailbox-name">Kode Pengelola</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmdcarrier }}</td>
                    </tr>        
                    <tr>
                      <td class="mailbox-name">Nilai Pajak</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmtaxrate }}</td>
                      <td class="mailbox-name">Status Armada</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">
                           @if ($datas[0]->vmouts=='0')
                                Aktif
                            @elseif($datas[0]->vmouts=='1')
                                Pemeliharaan
                            @elseif($datas[0]->vmouts=='2')
                                Blokir
                            @elseif($datas[0]->vmouts=='3')
                                Dijual
                            @elseif($datas[0]->vmouts=='4')
                                Tidak Aktif
                            @else 
                                
                            @endif
                      </td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Create By</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmcrby }}</td>
                      <td class="mailbox-name">Create At</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->created_at }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Update By</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vmedby }}</td>
                      <td class="mailbox-name">Last Update</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->updated_at }}</td>
                    </tr>
                  </tbody>
                </table><!-- /.table -->
            </div><!-- /.mail-box-messages -->
        </div><!-- /.box-body -->
      </div><!-- /.box -->      
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->	
@endsection