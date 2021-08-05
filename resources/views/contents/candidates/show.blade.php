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
              <h5 class="text-dark font-weight-bold my-1 mr-5">{{ $user->fullname }}</h5>
              <!--end::Page Title-->
              <!--begin::Breadcrumb-->
              <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                  <a href="{{ url()->current() }}" class="text-muted">Mon Compte</a>
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
            <!--begin::Details-->
            <div class="d-flex mb-9">
              <!--begin: Pic-->
              <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                <div class="symbol symbol-50 symbol-lg-120">
                  <img src="{{ $user->photo_path }}" alt="image">
                </div>
                <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                  <span class="font-size-h3 symbol-label font-weight-boldest">MF</span>
                </div>
              </div>
              <!--end::Pic-->
              <!--begin::Info-->
              <div class="flex-grow-1">
                <!--begin::Title-->
                <div class="d-flex justify-content-between flex-wrap mt-1">
                  <div class="d-flex mr-3">
                    <a href="#" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $user->fullname }}</a>
                    <a href="#">
                      <i class="flaticon2-correct text-success font-size-h5"></i>
                    </a>
                  </div>
                </div>
                <!--end::Title-->
                <!--begin::Content-->
                <div class="d-flex flex-wrap justify-content-between mt-1">
                  <div class="d-flex flex-column flex-grow-1 pr-8">
                    <div class="d-flex flex-wrap mb-4">
                      <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                        <i class="flaticon2-new-email mr-2 font-size-lg"></i>{{ $user->email }}
                      </a>
                      <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                        <i class="flaticon2-calendar-3 mr-2 font-size-lg"></i>{{ $user->sexe->libelle }}
                      </a>
                    </div>
                  </div>
                </div>
                <!--end::Content-->
              </div>
              <!--end::Info-->
            </div>
          </div>
        </div>
        <!--end::Card-->
        <!--begin::Row-->
        <div class="row">
          {{-- <div class="col-lg-1"></div> --}}
          <div class="col-lg-12">
            <!--begin::Advance Table Widget 2-->
            <div class="card card-custom card-stretch gutter-b">
              <!--begin::Header-->
              <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                  <span class="card-label font-weight-bolder text-dark">Modules</span>
                  <span class="text-muted mt-3 font-weight-bold font-size-sm">Modules à présenter pour le concours</span>
                </h3>
              </div>
              <!--end::Header-->
              <!--begin::Body-->
              <div class="card-body pt-2 pb-0 mt-n3">
                <div class="tab-content mt-5" id="myTabTables11">
                  <!--begin::Tap pane-->
                  <div class="tab-pane- -fade" id="kt_tab_pane_11_1-" role="tabpanel" aria-labelledby="kt_tab_pane_11_1">
                    <!--begin::Table-->
                    <div class="table-responsive">
                      <table class="table table-borderless table-vertical-center">
                        <thead>
                          <tr>
                            <th class="p-0 w-100px">CODE</th>
                            <th class="p-0 min-w-300px">INTITULE</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if(!$user->modules->count())
                            <tr>
                              <td class="text-center" colspan="2">
                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Vous n'avez pas encore choisi de Modules.</span>
                              </td>
                            </tr>
                          @endif
                          @foreach ($user->modules as $module)
                            <tr>
                              <td>
                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $module->code }}</span>
                              </td>
                              <td>
                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $module->nom }}</span>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!--end::Table-->
                  </div>
                  <!--end::Tap pane-->
                </div>
              </div>
              <!--end::Body-->
            </div>
            <!--end::Advance Table Widget 2-->
          </div>
          {{-- <div class="col-lg-1"></div> --}}
        </div>
        <!--end::Row-->

      </div>
      <!--end::Content-->
    </div>
    <!--begin::Content Wrapper-->
  </div>
@endsection
