@extends('layouts.dashboard')

@section('title')
  Candidat : {{ $user->fullname }}
@endsection

@section('content')
  <div class="d-flex flex-row flex-column-fluid container">
    <!--begin::Content Wrapper-->
    <div class="main d-flex flex-column flex-row-fluid">
      <!--begin::Subheader-->
      <div class="subheader py-2 py-lg-6" id="kt_subheader">
        <div class="w-100 d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
          <!--begin::Info-->
          <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline flex-wrap mr-5">
              <!--begin::Page Title-->
              <h5 class="text-dark font-weight-bold my-1 mr-5">Mes Modules</h5>
              <!--end::Page Title-->
              <!--begin::Breadcrumb-->
              <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                  <a href="{{ url()->current() }}" class="text-muted">Mes Modules</a>
                </li>
              </ul>
              <!--end::Breadcrumb-->
            </div>
            <!--end::Page Heading-->
          </div>
          <!--end::Info-->
        </div>
      </div>
      <!--end::Subheader-->
      <div class="content flex-column-fluid" id="kt_content">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
          <div class="card-body">
            <form class="" action="{{ route('choix-modules') }}" method="post">
              @csrf
              @foreach ($modules as $module)
                <div class="form-group row">
                  <label class="col-3 col-form-label"></label>
                  <div class="col-9 col-form-label">
                    <div class="checkbox-inline">
                      <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                        <input type="checkbox" class="ch-modules" name="modules[]" value="{{ $module->id }}" @if($user->modules->contains($module)) checked @endif />
                        <span></span>
                        {{ $module->nom }} ({{ $module->code }})
                      </label>
                    </div>
                  </div>
                </div>
              @endforeach

            </form>
          </div>
        </div>
        <!--end::Card-->
      </div>
      <!--end::Content-->
    </div>
    <!--begin::Content Wrapper-->
  </div>
@endsection
@section('specific-js')
  <script type="text/javascript">
    $(document).ready(function(){
      $('.ch-modules').change(function() {
        let f = $(this).closest('form'),
  	      dat = new FormData(f[0]);
  	    KTApp.blockPage({
  	      overlayColor: '#000000',
  				state: 'primary',
  				message: 'Veuillez patienter...',
  				size: 'lg',
  				opacity: 0.2,
  	    });
  	    $.ajax({
  	      url: f.attr('action'),
  	      type: "POST",
  	      dataType: 'JSON',
  	      data: dat,
  	      processData: false,
  	      contentType: false,
  	      error: function(error) {
  	        KTApp.unblockPage();
  	        let txt = "";
  	        if(error.status == 422) {
  	          txt += "<div class='text-left'>"
  	          for(let m in error.responseJSON.errors) {
  	            for (let n in error.responseJSON.errors[m]) {
  	              txt += "- " + error.responseJSON.errors[m][n] + "<br>";
  	            }
  	          }
  	          txt += "</div>"
  	        } else {
  	          txt = error.responseJSON.message;
  	        }
  	        swal.fire({
  	          html: txt,
  	          icon: "error",
  	          buttonsStyling: false,
  	          confirmButtonText: "D'accord",
  	          customClass: {
  	            confirmButton: "btn font-weight-bold btn-light-primary"
  	          }
  	        }).then(function() {
  	          // KTUtil.scrollTop();
  	          console.log("Form submission failed.");
  	        });
  	      },
  	      success: function(data) {
  	        KTApp.unblockPage();
  	      }
  	    });
      })
    })
  </script>
@endsection
