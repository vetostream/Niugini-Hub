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

    <!-- Profile -->
    <div class="row">
      <div class="col-sm">
        <div class="card text-center">
          <div class="card-header">
            <img src="{{ asset('img/blank.png') }}" class="rounded-circle img-fluid" alt="pic" />
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">Email: {{ $user->email }}</p>
            <p class="card-text">Birthdate: {{ $user->date_of_birth }}</p>
            <p class="card-text">Gender: {{ $user->gender }}</p>
            <p class="card-text">Address: {{ $user->address }}</p>
            <p class="card-text">Phone: {{ $user->phone_number }}</p>
          @if ($sellerIsEmpty)
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sellerModal">
              Apply as Seller
            </button>
          @endif
            <a class="btn btn-secondary" href="{{ route('updateUserForm') }}">Edit Profile</a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteProfileModal">
              Deactivate
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- /row -->

  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->
@endsection

@section('modals')
<!-- Apply Seller Modal -->
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
        <a class="btn btn-primary" href="{{ url('/sellers/apply/'.$user->id) }}" role="button">Confirm</a>
      </div>
    </div>
  </div>
</div>

<!-- Delete Profile Modal -->
<div class="modal fade bd-example-modal-sm" id="deleteProfileModal" tabindex="-1" role="dialog" aria-labelledby="deleteProfileLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <!-- Note: Flexbox used to align contents in modal header -->
      <div class="modal-header" style="padding: 1rem; display: flex; align-items: flex-start; justify-content: space-between; ">
        <h4 class="modal-title" id="deleteProfileLabel" style="font-weight: 500; font-size: 1.5rem;" >Deactivate Account?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: -1rem -1rem -1rem auto; padding: 1rem;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a class="btn btn-danger" href="" role="button">Confirm</a>
      </div>
    </div>
  </div>
</div>
@endsection
