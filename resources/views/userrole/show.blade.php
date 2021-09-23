@extends('layouts.main')

@section('breadcrumb','User Role')
@section('subBreadcrumb','Detail User Role')
@section('link','userrole')
@section('title','Detail User Role')
@section('subTitle','Merupakan halaman detail user role dalam sistem')

@section('container')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            <div class="clearfix">
                <a href="{{url('/userrole')}}" class="btn btn-white btn-primary btn-bold">
                        <i class="ace-icon fa fa-folder-open-o bigger-120 blue"></i>
                        Lihat Data
                </a>
                <a href="{{url('/userrole/create')}}" class="btn btn-white btn-success btn-bold">
                        <i class="ace-icon glyphicon glyphicon-plus bigger-120 blue"></i>
                        Tambah Data
                </a>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive mailbox-messages">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr class="bg-light-blue-gradient">
                        <th width="40" align="center">No</th>
                        <th width="120">Nama Role</th>
                        <th>Nama Menu</th>
                        <th width="20" align="center">Tambah</th>
                        <th width="20" align="center">Lihat</th>
                        <th width="20" align="center">Ubah</th>
                        <th width="20" align="center">Hapus</th>
                        <th width="20" align="center">Opt01</th>
                        <th width="20" align="center">Opt02</th>
                        <th width="20" align="center">Opt03</th>
                        <th width="80" align="center">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                        @endphp
                        @foreach($datas as $key => $dt)
                            <tr>
                                <td align="center">{{$no++}}</td>
                                <td>{{$dt->role_nama}}</td>
                                <td>{{$dt->menu_nama}}</td>
                                <td align="center">{{$dt->auc}}</td>
                                <td align="center">{{$dt->aur}}</td>
                                <td align="center">{{$dt->auu}}</td>
                                <td align="center">{{$dt->aud}}</td>
                                <td align="center">{{$dt->au01}}</td>
                                <td align="center">{{$dt->au02}}</td>
                                <td align="center">{{$dt->au03}}</td>
                                <td align="center">
                                    @if($dt->aksesuser_status == '1')
                                        <button class="btn btn-xs btn-success">Aktif</button>
                                    @elseif($dt->aksesuser_status == '2')
                                        <button class="btn btn-xs btn-danger">Tidak Aktif</button>
                                    @else

                                    @endif
                                </td>
                            </tr>
                            @php
                            $no++;
                            @endphp
                        @endforeach
                    </tbody>
                  </table>
            </div><!-- /.mail-box-messages -->
        </div><!-- /.box-body -->
      </div><!-- /.box -->      
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->	
@endsection