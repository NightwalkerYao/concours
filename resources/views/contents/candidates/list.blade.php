@extends('layouts.dashboard')

@section('title')
  Clients
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
              <h5 class="text-dark font-weight-bold my-1 mr-5">Liste des Clients</h5>
              <!--end::Page Title-->
              <!--begin::Breadcrumb-->
              <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                  <a href="{{ route('list-clients') }}" class="text-muted">Clients</a>
                </li>
              </ul>
              <!--end::Breadcrumb-->
            </div>
            <!--end::Page Heading-->
          </div>
          <!--end::Info-->
          <!--begin::Toolbar-->
          <div class="d-flex align-items-center">
            <a href="{{ url()->previous() }}" class="btn btn-light-primary font-weight-bolder">
              <span class="svg-icon svg-icon-md mr-1">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Left-2.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                    <rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000)" x="14" y="7" width="2" height="10" rx="1"></rect>
                    <path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997)"></path>
                  </g>
                </svg>
                <!--end::Svg Icon-->
              </span>
              Retour
            </a>
          </div>
          <!--end::Toolbar-->
        </div>
      </div>
      <!--end::Subheader-->
      <div class="content flex-column-fluid" id="kt_content">
        <div class="card card-custom gutter-b">
          <!--begin::Header-->
          <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
              <span class="card-label font-weight-bolder text-dark">Clients</span>
              <span class="text-muted mt-3 font-weight-bold font-size-sm">Liste des {{ $count }} Clients</span>
            </h3>
            <div class="card-toolbar">
              <a href="{{ route('create-client') }}" class="btn btn-success font-weight-bolder font-size-sm">
                <span class="svg-icon svg-icon-md svg-icon-white">
                  <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <polygon points="0 0 24 0 24 24 0 24"></polygon>
                      <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                      <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                    </g>
                  </svg>
                  <!--end::Svg Icon-->
                </span>Ajouter Client</a>
              </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">

              <div class="mb-7">
							<div class="row align-items-center">
								<div class="col-lg-9 col-xl-8">
									<div class="row align-items-center">
										<div class="col-md-8 my-2 my-md-0">
											<div class="input-icon">
												<input type="text" class="form-control" placeholder="Chercher..." id="kt_datatable_search_query" />
												<span>
													<i class="flaticon2-search-1 text-muted"></i>
												</span>
											</div>
										</div>
										<div class="col-md-4 my-2 my-md-0">
											<div class="d-flex align-items-center">
												<label class="mr-3 mb-0 d-none d-md-block">Sexe: </label>
												<select class="form-control custom-select" id="kt_datatable_search_sexe">
													<option value="all">Tout</option>
                          @foreach ($sexes as $sexe)
                            <option value="{{ $sexe->id }}">{{ $sexe->libelle }}</option>
                          @endforeach
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
									<a class="btn btn-light-primary px-6 font-weight-bold" id="kt_search_trigger">Chercher</a>
								</div>
							</div>
						</div>

              <!--begin: Datatable-->
              <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
              <!--end: Datatable-->

            </div>
            <!--end::Body-->
          </div>
        </div>
        <!--end::Content-->
      </div>
      <!--end::Content Wrapper-->
    </div>
  @endsection

  @section('specific-js')
    <script type="text/javascript">
    "use strict";
    // Class definition

    var KTDatatableRemoteAjax = function() {
      // Private functions

      // basic demo
      var demo = function() {

        var datatable = $('#kt_datatable').KTDatatable({
          // datasource definition
          data: {
            type: 'remote',
            source: {
              read: {
                method: 'get',
                url: window.location.href,
                // sample custom headers
                // headers: {'x-my-custom-header': 'some value', 'x-test-header': 'the value'},
                map: function(raw) {
                  // sample data mapping
                  var dataSet = raw;
                  if (typeof raw.data !== 'undefined') {
                    dataSet = raw.data;
                  }
                  return dataSet;
                },
              },
            },
            pageSize: 10,
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true,
            saveState: false
          },

          // layout definition
          layout: {
            scroll: false,
            footer: false,
            spinner: {
              message: "Chargement des données..."
            }
          },

          // column sorting
          sortable: true,

          pagination: true,

          search: {
            input: $('#kt_datatable_search_query'),
            key: 'q',
            delay: 400
          },

          translate: {
            records: {
              processing: "Chargement des données...",
              noRecords: "Il n'y a rien à afficher."
            },
            toolbar: {
              pagination: {
                items: {
                  default: {
                    first: "Début",
                    prec: "Précédent",
                    next: "Suivant",
                    last: "Fin",
                    more: "Plus",
                    input: "Numéro de page",
                    select: "Sélectionner la page"
                  },
                  info: "{{ str_replace(["(", ")"], ["{", "}"], 'Clients ((start)) - ((end)) sur ((total))') }}"
                }
              }
            }
          },

          // columns definition
          columns: [{
            field: 'DT_RowIndex',
            title: '#',
            sortable: 'asc',
            width: 48,
            type: 'number',
            selector: false,
            textAlign: 'center',
            template: function(row) {
              return `<span class="text-dark-75 font-weight-bolder d-block font-size-lg">`+row.DT_RowIndex+`</span>`;
            }
          }, {
            field: 'nom_complet',
            title: 'Nom du Client',
            width: 300,
            template: function(row) {
              let output = `
              <div class="d-flex align-items-center">
                <div class="symbol symbol-50 flex-shrink-0 mr-4">
                  <div class="symbol-label" style="background-image: url('`+row.photo+`')"></div>
                </div>
                <div>
                  <a href="{{ route("show-client", ['client' => "__id__"]) }}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">`+row.nom_complet+`</a>
                  <span class="text-muted font-weight-bold d-block">`+ row.sexe.libelle +`</span>
                </div>
              </div>
              `;
              return output.replace(/__id__/g, row.id);
            }
          }, {
            field: 'telephone',
            title: 'Téléphone',
            width: 120,
            template: function(row) {
              return `<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><a class="text-dark-50" href="tel:`+row.telephone+`">`+row.telephone+`</a></span>`;
            }
          }, {
            field: 'profession',
            title: 'Profession',
            width: 120,
            autoHide: false,
            template: function(row) {
              return `<span class="text-muted font-weight-bolder d-block font-size-lg">`+row.profession+`</span>`
            },
          }, {
            field: 'created_at',
            title: 'Enregistré le',
            width: 130,
            type: 'date',
            format: 'DD/MM/YYYY',
            template: function(row) {
              return `<span class="text-muted font-weight-bolder d-block font-size-lg">`+row.created_at+`</span>`
            }
          }, {
            field: 'Actions',
            title: 'Actions',
            sortable: false,
            width: 150,
            textAlign: 'right',
            overflow: 'visible',
            autoHide: false,
            template: function(row) {
              let tpl = `
              <a href="{{ route('show-client', ['client' => '__id__']) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                <span class="svg-icon svg-icon-md svg-icon-primary">
                  <!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <rect x="0" y="0" width="24" height="24"></rect>
                      <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"></path>
                      <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"></path>
                    </g>
                  </svg>
                  <!--end::Svg Icon-->
                </span>
              </a>
              <a href="{{ route('edit-client', ['client' => '__id__']) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                <span class="svg-icon svg-icon-md svg-icon-primary">
                  <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <rect x="0" y="0" width="24" height="24"></rect>
                      <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"></path>
                      <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                    </g>
                  </svg>
                  <!--end::Svg Icon-->
                </span>
              </a>
              <a onClick="$(this).hiddenPost();" data-href="{{ route('delete-client', ['client' => '__id__']) }}" class="confirm btn btn-icon btn-light btn-hover-primary btn-sm" data-confirm="Souhaitez-vous vraiment retirer ce Client ?">
                <span class="svg-icon svg-icon-md svg-icon-primary">
                  <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <rect x="0" y="0" width="24" height="24"></rect>
                      <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                      <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                    </g>
                  </svg>
                  <!--end::Svg Icon-->
                </span>
              </a>
              `
              return tpl.replace(/__id__/g, row.id);
            }
          }],

        });

        $('#kt_datatable_search_sexe').on('change', function() {
          datatable.search($(this).val().toLowerCase(), 'sexe');
        });

        $('#kt_datatable_search_sexe').selectpicker();

        $('#kt_search_trigger').click(function(e){
          e.preventDefault();
          datatable.setDataSourceParam("query[q]", $("#kt_datatable_search_query").val());
          datatable.setDataSourceParam("query[sexe]", $("#kt_datatable_search_sexe").val());
          datatable.load();
        });
      };

      return {
        // public functions
        init: function() {
          demo();
        },
      };
    }();

    jQuery(document).ready(function() {
      KTDatatableRemoteAjax.init();
    });
  </script>
@endsection
