@extends('layouts.main')

@push('styles')
 <!-- page specific plugin style -->
@endpush

@section('breadcrumb','Master Type Armada')
@section('title','Daftar Master Type Armada')
@section('subTitle','Merupakan halaman daftar mater type armada dalam sistem')

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
            </div>
            <br />
            <div class="col-sm-12 col-md-10">
                <div class="box box-warning">
                    <div class="box-header with-border">
                      <h3 class="box-title">Cari Data :</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ url('/mtparmada')}}" method="head">
                        @csrf
                            <!-- text input -->
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label>Kode Type :</label>
                                    <input type="text" class="form-control" name="kode">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label>MOT :</label>
                                    <input type="text" class="form-control" name="mot">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label>Keterangan :</label>
                                    <input type="text" class="form-control" name="nama">
                                </div>
                            </div>
                            <div class="box-footer col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-warning">Cari</button>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            <div class="col-sm-12 col-md-10">
            @if (session('pesan'))
                @if (session('kode')=='99')
                    <div class="alert alert-success">
                        <i class="ace-icon fa  fa-info-circle bigger-120 blue">&nbsp;</i>
                        {{ session('pesan') }}
                    </div>
                @else
                    <div class="alert alert-danger">
                        <i class="ace-icon fa  fa-info-circle bigger-120 red"></i>
                        {{ session('pesan') }}
                    </div>
                @endif
            @endif
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr class="bg-light-blue-gradient">
                <th width="40" align="center">No</th>
                <th width="120">Type Armada</th>
                <th>Keterangan</th>
                <th width="70">MOT</th>
                <th width="70">Satuan Berat</th>
                <th width="90">Berat Kosong</th>
                <th width="90">Kapasitas Berat</th>
                <th width="70">Satuan Volume</th>
                <th width="90">Kapasitas Volume</th>
                <th width="80" align="center">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($datas as $key => $dt)
                <tr>
                    <td align="center">{{ $datas->firstItem() + $key }}</td>
                    <td>{{$dt->vtvtyp}}</td>
                    <td>{{$dt->vtdesc}}</td>
                    <td>{{$dt->vtmot}}</td>
                    <td>{{$dt->vtwuom}}</td>
                    <td>{{$dt->vteweight}}</td>
                    <td>{{$dt->vtcweight}}</td>
                    <td>{{$dt->vtvuom}}</td>
                    <td>{{$dt->vtcvolume}}</td>
                    <td>
                        <div class="hidden-sm hidden-xs action-buttons">
                            @if($hakakses['auu']=='1')
                            <a class="green" href="{{ url('/mtparmada')}}/{{$dt->vtvtyp}}/edit"><i class="ace-icon fa fa-pencil bigger-130"></i></a>
                            @endif
                            @if($hakakses['aud']=='1')
                            <form action="{{ url('/mtparmada')}}/{{$dt->vtvtyp}}" method="post" class="inline hapus">
                                @method('delete')
                                @csrf
                                <button class="red btn-link">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </button>
                            </form>
                            @endif
                        </div>                                                
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>                  
          <div class="pull-left">
                Showing
                {{ $datas->firstItem() }} to {{ $datas->lastItem() }} of {{ $datas->total() }} entries
          </div>
          <div class="pull-right">                        
                {{ $datas->links() }}
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->      
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
@endsection


@push('scripts')
<!-- DataTables -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<!-- page script -->
<script>
    $(function () {
        $('#example1').DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": false,
          "autoWidth": false
        });
        
        $('.hapus').click(function(){
            var jawab = confirm("Anda yakin akan menghapus data ini ?");
            if (jawab === true) {
                return true;
            } else {
                return false;
            }

        });
    });
</script>
@endpush