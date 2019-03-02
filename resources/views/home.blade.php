@extends('layouts.base')

@section('content')
@include('layouts.header')
@include('layouts.navigation')

<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <!-- section title -->
      <div class="col-md-12">
        <div class="section-title">
          <h3 class="title">Categories</h3>
        </div>
      </div>
      <!-- /section title -->

      <!-- STORE -->
      <div id="store" class="col-sm">
            <!-- store categories -->
            @foreach($categories->chunk(4) as $categories_chunk)
                <div class="row">
                    @foreach ($categories_chunk as $category)
                        <!-- product -->
                        <div class="col-md-3 col-xs-3">
                            <div class="product">
                                <div class="product-img">
                                    @if ($category->filename)

                                        <img src="{{ url('uploads/'.$category->filename) }}" alt="{{ $category->filename }}" />
                                    @else
                                        <img src="{{ asset('img/blank.png') }}" alt="blank" />
                                    @endif
                                </div>

                                <div class="product-body">
                                    <h3 class="product-name">
                                        <a href="{{ url('/categories/'.$category->id) }}">
                                            {{ $category->name }}
                                        </a>
                                    </h3>
                                    <p class="product-category">
                                        {{ $category->desc }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- /categories -->
                    @endforeach
                </div>
            @endforeach
             <!-- /categories -->
        <!-- Next and Previous links -->
        <div class="row text-center">
          {{ $categories->links() }}
        </div>

      </div>
      <!-- /STORE -->

    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->
@endsection

@section('modals')

<div class="modal fade bd-example-modal-sm" id="popupmodal" tabindex="-1" role="dialog" aria-labelledby="checkoutLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <!-- Note: Flexbox used to align contents in modal header -->
            <div class="modal-header" style="padding: 1rem; display: flex; align-items: flex-start; justify-content: space-between; ">
                <h4 class="modal-title" id="checkoutLabel" style="font-weight: 500; font-size: 1.5rem;" >Checkout confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: -1rem -1rem -1rem auto; padding: 1rem;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


        <div class="modal-body">
            <p>
                {{ Session::get('success') }}
            </p>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@if( Session::has('success'))
    <script type="text/javascript">
        $(document).ready(function() {
            $('#popupmodal').modal();
        });
    </script>
@endif
@endsection
