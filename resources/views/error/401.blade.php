@extends('layouts.main')

@push('styles')
 <!-- page specific plugin style -->
@endpush

@section('breadcrumb','401 Error')
@section('title','')
@section('subTitle','')

@section('container')
<!-- Main content -->
<section class="content">
    <div class="error-page">
        <h2 class="headline text-yellow"> 401</h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! You don't have authorization.</h3>
            <p>
              You don't have authorization on this menu.
              Please call your administrator.
            </p>
        </div><!-- /.error-content -->
    </div><!-- /.error-page -->
</section><!-- /.content -->
@endsection


@push('scripts')
@endpush