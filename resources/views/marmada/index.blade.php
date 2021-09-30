@extends('layouts.main')

@push('styles')
 <!-- page specific plugin style -->
@endpush

@section('breadcrumb','Master Armada')
@section('title','Daftar Master Armada')
@section('subTitle','Merupakan halaman daftar master armada dalam sistem')

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
            </div>
            <br />
            <div class="col-sm-12 col-md-10">
                <div class="box box-warning">
                    <div class="box-header with-border">
                      <h3 class="box-title">Cari Data :</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ url('/marmada')}}" method="head">
                        @csrf
                            <!-- text input -->
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label>Kode :</label>
                                    <input type="text" class="form-control" name="kode">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label>Type Armada :</label>
                                    <input type="text" class="form-control" name="mot">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label>Keterangan :</label>
                                    <input type="text" class="form-control" name="nama">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label>Status :</label>
                                    <select class="form-control" required name='status' id="form-status">
                                        <option  value="">Silakan Pilih</option>
                                        <option value="0">Aktif</option>
                                        <option value="1">Pemeliharaan</option>
                                        <option value="2">Blokir</option>
                                        <option value="3">Dijual</option>
                                        <option value="4">Tidak Aktif</option>
                                    </select>
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
                <th width="120">Kode</th>
                <th>Keterangan</th>
                <th width="120">Type</th>
                <th width="120">No Seri Armada</th>
                <th width="110">Nomer Polisi</th>
                <th width="120">Type Plat</th>
                <th width="120">Merk</th>
                <th width="100">Status</th>
                <th width="80" align="center">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($datas as $key => $dt)
                <tr>
                    <td align="center">{{ $datas->firstItem() + $key }}</td>
                    <td>{{$dt->vmvnum}}</td>
                    <td>{{$dt->vmdesc}}</td>
                    <td>{{$dt->vmvtyp}}</td>
                    <td>{{$dt->vmsernum}}</td>
                    <td>{{$dt->vmplate}}</td>
                    <td>{{$dt->vmpltype}}</td>
                    <td>{{$dt->vmbrand}}</td>
                    <td align="center">
                        @if($dt->vmouts == '0')
                            <button class="btn btn-xs btn-success">Aktif</button>
                        @elseif($dt->vmouts == '1')
                            <button class="btn btn-xs btn-danger">Pemeliharaan</button>
                        @elseif($dt->vmouts == '2')
                            <button class="btn btn-xs btn-danger">Blokir</button>
                        @elseif($dt->vmouts == '3')
                            <button class="btn btn-xs btn-danger">Dijual</button>
                        @elseif($dt->vmouts == '4')
                            <button class="btn btn-xs btn-danger">Tidak Aktif</button>
                        @else
                         
                        @endif
                    </td>
                    <td>
                        <div class="hidden-sm hidden-xs action-buttons">
                            @if($hakakses['aur']=='1')
                                <a class="blue" href="{{url('/marmada')}}/{{$dt->vmvehid}}"><i class="ace-icon fa fa-search-plus bigger-130"></i></a>
                            @endif
                            @if($hakakses['auu']=='1')
                            <a class="green" href="{{ url('/marmada')}}/{{$dt->vmvehid}}/edit"><i class="ace-icon fa fa-pencil bigger-130"></i></a>
                            @endif
                            @if($hakakses['aud']=='1')
                            <form action="{{ url('/marmada')}}/{{$dt->vmvehid}}" method="post" class="inline hapus">
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