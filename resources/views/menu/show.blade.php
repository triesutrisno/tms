@extends('layouts.main')

@section('breadcrumb','Master Menu')
@section('subBreadcrumb','Detail Master Menu')
@section('link','menu')
@section('title','Detail Master Menu')
@section('subTitle','Merupakan halaman detail menu dalam sistem')

@section('container')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            <div class="clearfix">
                <a href="{{url('/menu')}}" class="btn btn-white btn-primary btn-bold">
                        <i class="ace-icon fa fa-folder-open-o bigger-120 blue"></i>
                        Lihat Data
                </a>
                <a href="{{url('/menu/create')}}" class="btn btn-white btn-success btn-bold">
                        <i class="ace-icon glyphicon glyphicon-plus bigger-120 blue"></i>
                        Tambah Data
                </a>
                <a href="{{url('/menu')}}/{{$menu->menu_id}}/edit" class="btn btn-white btn-warning btn-bold">
                        <i class="ace-icon fa fa-pencil bigger-120 blue"></i>
                        Ubah Data
                </a>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    <tr>
                      <td class="mailbox-name" width="90">Nama Menu</td>
                      <td class="mailbox-star" width="10">:</td>
                      <td class="mailbox-subject">{{ $menu->menu_nama }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Link</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $menu->menu_link }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Keterangan</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $menu->menu_keterangan }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Parent</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $menu->$parentDesc }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Jenis</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">
                           @if ($menu->menu_type=='1')
                                Root
                            @elseif($menu->menu_type=='2')
                                Level 1
                            @else 
                                Level 2
                            @endif
                      </td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Status</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $menu->menu_status=='1' ? "Aktif" : "Tidak Aktif" }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Urut</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $menu->menu_sort }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Crated At</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $menu->created_at }}</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">Last Update</td>
                      <td class="mailbox-star">:</td>
                      <td class="mailbox-subject">{{ $menu->updated_at }}</td>
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