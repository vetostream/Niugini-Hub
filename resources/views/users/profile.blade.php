@extends('layouts.base')

@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
		<!-- row -->
        <div class="row">
			<!-- ASIDE -->
			<div class="col-md-4">
				<!-- aside Widget -->
				<div class="aside">
                    <div class="card text-center">
                        <div class="card-header">
                            <img src="{{ asset('img/blank.png') }}" class="rounded-circle img-fluid img-thumbnail" alt="pic" height="250" width="250" />
                        </div>
                    </div>
				</div>
                <!-- /aside Widget -->

 				<!-- aside Widget -->
                <div class="aside row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <button type="button" class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#deleteProfileModal">
                                Deactivate
                        </button>
                    </div>
                </div>
                <!-- /aside Widget -->
			</div>
            <!-- /ASIDE -->

            <!-- ASIDE -->
			<div class="col-md-8">
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
                <form method="POST" action="{{route('users.update', $user)}}">
                    @csrf
                    {{ method_field('patch') }}

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name}}">
                    </div>

                    <div class="form-group">
                        <label for="name">Age</label>
                        <input type="text" class="form-control" id="age" name="age" value="{{ $age}}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="bday">Date of Birth</label>
                        <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="{{ $user->date_of_birth }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" class="form-control" name="gender">
                            <option @if ($user->gender == "Male") selected @endif>Male</option>
                            <option @if ($user->gender == "Female") selected @endif>Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input id="address" type="text" class="form-control" name="address" value="{{ $user->address }}">
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input id="phone_number" class="form-control" type="number" name="phone_number" value="{{ $user->phone_number }}">
                    </div>
                    <div class="row">
                        <div class="col-xs-2 col-xs-offset-10">
                            <button type="submit" class="btn btn-primary btn-small btn-block">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /ASIDE -->
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
        <a class="btn btn-primary" href="{{ route('home') }}" role="button">Confirm</a>
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
