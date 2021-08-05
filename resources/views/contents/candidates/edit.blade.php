@extends('layouts.dashboard')

@section('title')
  Modification des Infos
@endsection

@section('specific-styles')
  <link href="/assets/css/pages/wizard/wizard-5.css" rel="stylesheet" type="text/css" />
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
              <h5 class="text-dark font-weight-bold my-1 mr-5">Modification des Infos </h5>
              <!--end::Page Title-->
              <!--begin::Breadcrumb-->
              <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                  <a href="{{ url()->full() }}" class="text-muted">{{ $user->fullname }}</a>
                </li>
              </ul>
              <!--end::Breadcrumb-->
            </div>
            <!--end::Page Heading-->
          </div>
          <!--end::Info-->
          <!--begin::Toolbar-->
          <div class="d-flex align-items-center">
            <a href="{{ url()->previous()}}" class="btn btn-light-primary font-weight-bolder">
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
        <!--begin::Card-->
        <div class="card card-custom">
          <!--begin::Card Body-->
          <div class="card-body p-0">
            <!--begin::Wizard 5-->
            <div class="wizard wizard-5 d-flex flex-column flex-lg-row flex-row-fluid" id="kt_wizard" data-wizard-state="first">
              <!--begin::Aside-->
              <div class="wizard-aside bg-white d-flex flex-column flex-row-auto w-100 w-lg-300px w-xl-400px w-xxl-500px">
                <!--begin::Aside Top-->
                <div class="d-flex flex-column-fluid flex-column px-xxl-30 px-10">
                  <!--begin: Wizard Nav-->
                  <div class="wizard-nav d-flex justify-content-center pt-10 pt-lg-20 pb-5">
                    <!--begin::Wizard Steps-->
                    <div class="wizard-steps">
                      <!--begin::Wizard Step 1 Nav-->
                      <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                        <div class="wizard-wrapper">
                          <div class="wizard-icon">
                            <i class="wizard-check ki ki-check"></i>
                            <span class="wizard-number">1</span>
                          </div>
                          <div class="wizard-label">
                            <h3 class="wizard-title">Identité</h3>
                            <div class="wizard-desc">Informations de base</div>
                          </div>
                        </div>
                      </div>
                      <!--end::Wizard Step 1 Nav-->
                      <!--begin::Wizard Step 2 Nav-->
                      <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                        <div class="wizard-wrapper">
                          <div class="wizard-icon">
                            <i class="wizard-check ki ki-check"></i>
                            <span class="wizard-number">2</span>
                          </div>
                          <div class="wizard-label">
                            <h3 class="wizard-title">Identifiant</h3>
                            <div class="wizard-desc">E-mail</div>
                          </div>
                        </div>
                      </div>
                      <!--end::Wizard Step 2 Nav-->
                      <!--begin::Wizard Step 3 Nav-->
                      <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                        <div class="wizard-wrapper">
                          <div class="wizard-icon">
                            <i class="wizard-check ki ki-check"></i>
                            <span class="wizard-number">3</span>
                          </div>
                          <div class="wizard-label">
                            <h3 class="wizard-title">Autres</h3>
                            <div class="wizard-desc">Photo, Motivation</div>
                          </div>
                        </div>
                      </div>
                      <!--end::Wizard Step 3 Nav-->
                      <!--begin::Wizard Step 4 Nav-->
                      <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                        <div class="wizard-wrapper">
                          <div class="wizard-icon">
                            <i class="wizard-check ki ki-check"></i>
                            <span class="wizard-number">4</span>
                          </div>
                          <div class="wizard-label">
                            <h3 class="wizard-title">Terminer</h3>
                            <div class="wizard-desc">Vérifier &amp; Envoyer</div>
                          </div>
                        </div>
                      </div>
                      <!--end::Wizard Step 4 Nav-->
                    </div>
                    <!--end::Wizard Steps-->
                  </div>
                  <!--end: Wizard Nav-->
                </div>
                <!--end::Aside Top-->
                <!--begin::Aside Bottom-->
                <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-y-bottom bgi-position-x-center bgi-size-contain pt-2 pt-lg-5 h-350px" style="background-image: url(/assets/media/svg/illustrations/features.svg)"></div>
                <!--end::Aside Bottom-->
              </div>
              <!--begin::Aside-->
              <!--begin::Content-->
              <div class="wizard-content bg-gray-100 d-flex flex-column flex-row-fluid py-15 px-5 px-lg-10">
                <!--begin::Title-->
                <div class="text-right mb-lg-30 mb-15 mr-xxl-10">
                  <span class="font-weight-bold text-muted font-size-h5">Un problème ?</span>
                  <a href="javascript:;" class="font-weight-bolder text-primary font-size-h4" id="kt_login_signup">Contacter le Support</a>
                </div>
                <!--end::Title-->
                <!--begin::Form-->
                <div class="d-flex justify-content-center flex-row-fluid">
                  <form class="pb-5 w-100 w-md-450px w-lg-500px fv-plugins-bootstrap fv-plugins-framework" id="kt_form" method="post" enctype="multipart/form-data" action="{{ route('modifier') }}">
                    @csrf
                    <!--begin: Wizard Step 1-->
                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                      <!--begin::Title-->
                      <div class="pb-10 pb-lg-15">
                        <h3 class="font-weight-bolder text-dark font-size-h2">Informations du Candidat</h3>
                        <div class="text-muted font-weight-bold font-size-h5">Veuillez remplir les champs ci-dessous</div>
                      </div>
                      <!--begin::Title-->
                      <!--begin::Form Group-->
                      <div class="form-group fv-plugins-icon-container">
                        <label class="font-size-h6 font-weight-bolder text-dark">Prénom(s)</label>
                        <input type="text" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6" name="prenom" value="{{ $user->prenom }}">
                        <div class="fv-plugins-message-container"></div>
                      </div>
                      <!--end::Form Group-->
                      <!--begin::Form Group-->
                      <div class="form-group fv-plugins-icon-container">
                        <label class="font-size-h6 font-weight-bolder text-dark">Nom</label>
                        <input type="text" class="form-control h-auto p-6 border-0 rounded-lg font-size-h6" name="nom" value="{{ $user->nom }}">
                        <div class="fv-plugins-message-container"></div>
                      </div>
                      <!--end::Form Group-->
                      <!--begin::Form Group-->
                      <div class="form-group fv-plugins-icon-container">
                        <label class="font-size-h6 font-weight-bolder text-dark">Date de Naissance</label>
                        <div class="input-group date">
                          <input type="date" id="dob" min="{{ date("Y-m-d", strtotime("-90 years")) }}" max="{{ date("Y-m-d", strtotime("-16 years")) }}" class="form-control h-auto p-6 border-0 form-control-lg font-size-h6" name="date_naissance" readonly value="{{ $user->date_naissance }}">
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="la la-calendar"></i>
                            </span>
                          </div>
                        </div>
                        <div class="fv-plugins-message-container"></div>
                      </div>
                      <!--end::Form Group-->
                      <!--begin::Form Group-->
                      <div class="form-group fv-plugins-icon-container">
                        <label class="font-size-h6 font-weight-bolder text-dark">Sexe</label>
                        <div class="radio-inline">
                          @foreach ($sexes as $sexe)
                            <label class="radio radio-lg">
                              <input type="radio" name="sexe_id" value="{{ $sexe->id }}" @if($sexe->id == $user->sexe_id) checked @endif />
                              <span></span>
                              {{ $sexe->libelle }}
                            </label>
                          @endforeach
                        </div>
                      </div>
                      <!--end::Form Group-->
                    </div>
                    <!--end: Wizard Step 1-->
                    <!--begin: Wizard Step 2-->
                    <div class="pb-5" data-wizard-type="step-content">
                      <!--begin::Title-->
                      <div class="pb-10 pb-lg-15">
                        <h3 class="font-weight-bolder text-dark font-size-h2">Informations du Candidat</h3>
                        <div class="text-muted font-weight-bold font-size-h4">Identifiants de connexion</div>
                      </div>
                      <!--end::Title-->
                      <!--begin::Form Group-->
                      <div class="form-group fv-plugins-icon-container">
                        <label class="font-size-h6 font-weight-bolder text-dark">Adresse E-mail</label>
                        <input type="email" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6" name="email" value="{{ $user->email }}">
                        <div class="fv-plugins-message-container"></div>
                      </div>
                      <!--end::Form Group-->
                      <!--begin::Form Group-->
                      <div class="form-group fv-plugins-icon-container">
                        <label class="font-size-h6 font-weight-bolder text-dark">Ancien mot de passe</label>
                        <input type="password" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6" name="old_password">
                        <div class="fv-plugins-message-container"></div>
                      </div>
                      <!--end::Form Group-->
                      <!--begin::Form Group-->
                      <div class="form-group fv-plugins-icon-container">
                        <label class="font-size-h6 font-weight-bolder text-dark">Nouveau mot de passe</label>
                        <input type="password" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6" name="password">
                        <div class="fv-plugins-message-container"></div>
                      </div>
                      <!--end::Form Group-->
                      <!--begin::Form Group-->
                      <div class="form-group fv-plugins-icon-container">
                        <label class="font-size-h6 font-weight-bolder text-dark">Confirmation du mot de passe</label>
                        <input type="password" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6" name="password_confirmation">
                        <div class="fv-plugins-message-container"></div>
                      </div>
                      <!--end::Form Group-->
                    </div>
                    <!--end: Wizard Step 2-->
                    <!--begin: Wizard Step 2-->
                    <div class="pb-5" data-wizard-type="step-content">
                      <!--begin::Title-->
                      <div class="pb-10 pb-lg-15">
                        <h3 class="font-weight-bolder text-dark font-size-h2">Informations du Candidat</h3>
                        <div class="text-muted font-weight-bold font-size-h4">Photo &amp; Motivation</div>
                      </div>
                      <!--end::Title-->
                      <div class="row">
                        <div class="col-md-6">
                          <!--begin::Form Group-->
                          <div class="form-group row">
                            <label class="col-12 col-form-label">Photo du Candidat</label>
                            <div class="col-12">
                              <div class="text-center image-input image-input-empty image-input-outline" id="kt_image_5" style="background-image: url('{{ $user->photo_path }}')">
                                <div class="image-input-wrapper"></div>
                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Changer de photo">
                                  <i class="fa fa-pen icon-sm text-muted"></i>
                                  <input type="file" name="photo_file" accept=".png, .jpg, .jpeg">
                                  <input type="hidden" name="remove_photo">
                                </label>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Annuler">
                                  <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Retirer la photo">
                                  <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                              </div>
                              <span class="form-text text-muted">Images : JPG, JPEG, PNG</span>
                            </div>
                          </div>
                          <!--end::Form Group-->
                        </div>
                      </div>
                      <!--begin::Form Group-->
                      <div class="form-group fv-plugins-icon-container">
                        <label class="font-size-h6 font-weight-bolder text-dark">Motivation</label>
                        <textarea class="form-control h-auto p-5 border-0 rounded-lg font-size-h6" name="motivation" rows="5">{{ $user->motivation }}</textarea>
                        <div class="fv-plugins-message-container"></div>
                      </div>
                      <!--end::Form Group-->
                    </div>
                    <!--end: Wizard Step 2-->
                    <!--begin: Wizard Step 3-->
                    <div class="pb-5" data-wizard-type="step-content">
                      <!--begin::Title-->
                      <div class="pb-10 pb-lg-15">
                        <h3 class="font-weight-bolder text-dark font-size-h2">Informations du Candidat</h3>
                        <div class="text-muted font-weight-bold font-size-h4">Vérifier &amp; Envoyer</div>
                      </div>
                      <!--end::Title-->
                      <!--begin::Section-->
                      <h4 class="font-weight-bolder mb-3">Identité du Candidat:</h4>
                      <div class="text-dark-50 font-weight-bold line-height-lg mb-8">
                        <div class="nom"></div>
                        <div class="prenom"></div>
                      </div>
                      <!--end::Section-->
                      <!--begin::Section-->
                      <h4 class="font-weight-bolder mb-3">A propos du Candidat:</h4>
                      <div class="text-dark-50 font-weight-bold line-height-lg mb-8">
                        <div class="sexe" data-sexes='@json($sexes)'></div>
                        <div class="dob"></div>
                      </div>
                      <!--end::Section-->
                      <!--begin::Section-->
                      <h4 class="font-weight-bolder mb-3">Contact :</h4>
                      <div class="text-dark-50 font-weight-bold line-height-lg mb-8">
                        <div class="email"></div>
                      </div>
                      <!--end::Section-->
                    </div>
                    <!--end: Wizard Step 3-->
                    <!--begin: Wizard Actions-->
                    <div class="d-flex justify-content-between pt-3">
                      <div class="mr-2">
                        <button type="button" class="btn btn-light-primary font-weight-bolder font-size-h6 pl-6 pr-8 py-4 my-3 mr-3" data-wizard-type="action-prev">
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
                          Précédent
                        </button>
                      </div>
                      <div>
                        <button type="button" class="btn btn-primary font-weight-bolder font-size-h6 pl-5 pr-8 py-4 my-3" data-wizard-type="action-submit">Soumettre
                          <span class="svg-icon svg-icon-md ml-2">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Right-2.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                <rect fill="#000000" opacity="0.3" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)" x="7.5" y="7.5" width="2" height="9" rx="1"></rect>
                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                              </g>
                            </svg>
                            <!--end::Svg Icon-->
                          </span>
                        </button>
                        <button type="button" class="btn btn-primary font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3" data-wizard-type="action-next" id="next-step">Suivant
                          <span class="svg-icon svg-icon-md ml-1">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Right-2.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                <rect fill="#000000" opacity="0.3" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)" x="7.5" y="7.5" width="2" height="9" rx="1"></rect>
                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                              </g>
                            </svg>
                            <!--end::Svg Icon-->
                          </span>
                        </button>
                      </div>
                    </div>
                    <!--end: Wizard Actions-->
                    <div></div>
                    <div></div>
                  </form>
                </div>
                <!--end::Form-->
              </div>
              <!--end::Content-->
            </div>
            <!--end::Wizard 5-->
          </div>
          <!--end::Card Body-->
        </div>
        <!--end::Card-->
      </div>
      <!--end::Content-->
    </div>
    <!--end::Content Wrapper-->
  </div>
@endsection

@section('specific-js')
  <script src="/assets/js/pages/custom/wizard/wizard-5-1.js"></script>
  <script type="text/javascript">
  var signature_file_input = new KTImageInput('kt_image_6');
  var photo_file_input = new KTImageInput('kt_image_5');
  </script>
@endsection
