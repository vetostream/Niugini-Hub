@extends('layouts.base')

@section('content')
<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">

    <!-- row -->
    <div class="row">
      <div class="col-sm">
        <h3 class="title">Profile</h3>
      </div>
    </div>
    <!-- /row -->

    <!-- row -->
    <div class="row">
      <div class="col-sm">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sellerModal">
          Apply as Seller
        </button>
      </div>
    </div>
    <!-- /row -->

  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->
@endsection

@section('modals')
<!-- Delete Category Modal -->
<div class="modal fade bd-example-modal-sm" id="sellerModal" tabindex="-1" role="dialog" aria-labelledby="sellerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <!-- Note: Flexbox used to align contents in modal header -->
      <div class="modal-header" style="padding: 1rem; display: flex; align-items: flex-start; justify-content: space-between; ">
        <h4 class="modal-title" id="sellerModalLabel" style="font-weight: 500; font-size: 1.5rem;" >Apply?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: -1rem -1rem -1rem auto; padding: 1rem;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="{{ route('home') }}" role="button">Confirm</a>
      </div>
    </div>
  </div>
</div>
@endsection
