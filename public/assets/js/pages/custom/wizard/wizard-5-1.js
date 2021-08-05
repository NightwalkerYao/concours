"use strict";

// Class definition
var KTWizard5 = function () {
	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizardObj;
	var _validations = [];

	// Private functions
	var _initWizard = function () {
		// Initialize form wizard
		_wizardObj = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: true  // allow step clicking
		});

		// Validation before going to next page
		_wizardObj.on('change', function (wizard) {
			if (wizard.getStep() > wizard.getNewStep()) {
				return; // Skip if stepped back
			}

			// Validate form before change wizard step
			var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						wizard.goTo(wizard.getNewStep());

						KTUtil.scrollTop();
					} else {
						Swal.fire({
							text: "Désolé, le formulaire comporte des erreurs. Veuillez vérifier et réessayer.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "D'accord",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
						}).then(function () {
							KTUtil.scrollTop();
						});
					}
				});
			}

			return false;  // Do not change wizard step, further action will be handled by he validator
		});

		// Change event
		_wizardObj.on('changed', function (wizard) {
			KTUtil.scrollTop();
		});

		// Submit event
		_wizardObj.on('submit', function (wizard) {
			let f = $('#kt_form'),
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
	        f[0].reset()
	        swal.fire({
	          html: data.message,
	          icon: "success",
	          buttonsStyling: false,
	          confirmButtonText: "Continuer",
	          customClass: {
	            confirmButton: "btn font-weight-bold btn-light-primary"
	          }
	        }).then(function() {
	          if(data.redirect)
	            document.location.href = data.redirect
	        });
	      }
	    });
		});
	}

	var _initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					nom: {
						validators: {
							notEmpty: {
								trim: true,
									message: 'Le nom est requis.'
							}
						}
					},
					prenom: {
						validators: {
							notEmpty: {
								trim: true,
								message: 'Le prénom est requis.'
							}
						}
					},
					sexe_id: {
						validators: {
							notEmpty: {
								trim: true,
								message: 'Veuillez indiquer le sexe.'
							}
						}
					},
					date_naissance: {
						validators: {
							notEmpty: {
								trim: true,
								message: 'Veuillez indiquer la date de naissance.'
							},
							date: {
								format: 'YYYY-MM-DD',
								separator: '-',
								message: 'La date de naissance n\'est pas valide.'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					email: {
						validators: {
							notEmpty: {
								trim: true,
								message: 'L\'Adresse mail est requise.'
							},
							emailAddress: {
								trim: true,
								message: 'L\'Adresse mail n\'est pas valide.'
							}
						}
					},
					password_confirmation: {
						validators: {
							identical: {
								compare: function() {
									return document.querySelector('[name="password"]').value;
								},
								message: 'Le mot de passe et sa confirmation ne correspondent pas.'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 3
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					photo_file: {
						validators: {
							file: {
								extension: 'jpg,jpeg,png',
								message: 'Veuillez choisir une image valide.'
							}
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));
	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_wizard');
			_formEl = KTUtil.getById('kt_form');

			_initWizard();
			_initValidation();
		}
	};
}();

jQuery(document).ready(function () {
	KTWizard5.init();

	// Fill final step placeholders
	$('#next-step').click(function(){
		$('.prenom').text($('[name=prenom]').val());
		$('.nom').text($('[name=nom]').val().toUpperCase());
		$('.dob').text('Né(e) le '+$('[name=date_naissance]').val());
		$('.email').text($('[name=email]').val());

		let t = $('.sexe'), sexes = t.data('sexes');
		for(let s in sexes) {
			if(sexes[s].id == parseInt($('#kt_form')[0].sexe_id.value)) {
				t.text(sexes[s].libelle);
				break;
			}
		}
	});
});
