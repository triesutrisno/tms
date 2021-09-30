@extends('layouts.main')

@section('breadcrumb','Master Type Armada')
@section('subBreadcrumb','Detail Master Type Armada')
@section('link','mtparmada')
@section('title','Detail Master Type Armada')
@section('subTitle','Merupakan halaman detail master type armada dalam sistem')

@section('container')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            <div class="clearfix">
                @if($hakakses['aur']=='1')
                    <a href="{{url('/mtparmada')}}" class="btn btn-white btn-primary btn-bold">
                        <i class="ace-icon fa fa-folder-open-o bigger-120 blue"></i>
                        Lihat Data
                    </a>
                @endif
                @if($hakakses['auc']=='1')
                    <a href="{{url('/mtparmada/create')}}" class="btn btn-white btn-success btn-bold">
                            <i class="ace-icon glyphicon glyphicon-plus bigger-120 blue"></i>
                            Tambah Data
                    </a>
                @endif
                @if($hakakses['auu']=='1')
                    <a href="{{url('/mtparmada')}}/{{$datas[0]->vtvtyp}}/edit" class="btn btn-white btn-warning btn-bold">
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
                      <td class="mailbox-name" width="140">Type Armada</td>
                      <td class="mailbox-star" width="10">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vtvtyp }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Keterangan</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vtdesc }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">MOT</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->mtdesc }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Satuan Berat</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vtwuom }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Berat Kosong</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vteweight }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Kapasitas Berat</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vtcweight }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Satuan Volume</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vtvuom }}</td>
                    </tr>   
                    <tr>
                      <td class="mailbox-name">Kapasitas Volume</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vtcvolume }}</td>
                    </tr>   
                    <tr>
                      <td class="mailbox-name">Satuan Jumlah</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vtpuom }}</td>
                    </tr>   
                    <tr>
                      <td class="mailbox-name">Kapasitas Jumlah</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vtcpiece }}</td>
                    </tr>  
                    <tr>
                      <td class="mailbox-name">Jumlah Sumbu Roda</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vtnaxl }}</td>
                    </tr>                    
                    <tr>
                      <td class="mailbox-name">Kapasitas Limit By</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">
                           @if ($datas[0]->vtcby=='W')
                                Berat
                            @elseif($datas[0]->menu_type=='V')
                                Volume
                            @else 
                                Pieces
                            @endif
                      </td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Create By</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vtcrby }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Create At</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->created_at }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Update By</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $datas[0]->vtedby }}</td>
                    </tr>
                    <tr>
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