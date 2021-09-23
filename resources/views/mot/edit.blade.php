@extends('layouts.main')

@push('styles')
 
@endpush

@section('breadcrumb','Master MOT')
@section('subBreadcrumb','Ubah Master MOT')
@section('link','role')
@section('title','Ubah Master MOT')
@section('subTitle','Merupakan halaman ubah mot dalam sistem')

@section('container')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="{{url('/mmot')}}/{{$datas->mtmot}}" method="post" autocomplete="off">
            @method('patch')
            @csrf
                <!-- text input -->
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-mtmot">Kode MOT *</label>
                        <input type="hidden" class="form-control" required name='mtmot'  id="form-mtmot" maxlength="10" value="{{$datas->mtmot}}">
                        <input type="text" class="form-control" disabled="true" name='mtmot2'  id="form-mtmot" maxlength="10" value="{{$datas->mtmot}}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="form-mtdesc">Keterangan</label>
                        <input type="text" class="form-control" name='mtdesc' id="form-mtdesc" maxlength="40" value="{{$datas->mtdesc}}">
                    </div>
                </div>
                <div class="box-footer col-sm-12 col-md-12">
                    <button class="btn btn-sm btn-success" type="submit" class="btn btn-primary">Simpan</button>
                    <button class="btn btn-sm btn-danger" type="reset" class="btn btn-primary">Reset</button>
                    <a href="{{ url('/mmot') }}" class="btn btn-sm btn-warning">Kembali</a>
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