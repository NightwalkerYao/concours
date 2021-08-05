$(document).ready(function(){
  // Form Submit
  $('.form-submiter').click(function(){
    let btn = $(this),
      f = $(btn.data('target')),
      dat = new FormData(f[0]);
    btn[0].disabled = true;
    KTApp.blockPage({
      overlayColor: '#000000',
      state: 'info',
      message: 'Veuillez patienter...'
    });
    $.ajax({
      url: btn.hasClass('custom-action') ? btn.data('href') : f.attr('action'),
      type: "POST",
      dataType: 'JSON',
      data: dat,
      processData: false,
      contentType: false,
      error: function(error) {
        KTApp.unblockPage();
        btn[0].disabled = false
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
        btn[0].disabled = false
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
    return false;
  })

  // With button spinner
  $('.form-xhr').submit(function(e){
    e.preventDefault();
    let btn = KTUtil.getById("kt_btn_spinner");
    KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "Veuillez patienter");
    // KTUtil.btnRelease(btn);
    let f = $(this),
      dat = new FormData(f[0]);
    $.ajax({
      url: f.attr('action'),
      type: f.attr('method'),
      dataType: 'JSON',
      data: dat,
      processData: false,
      contentType: false,
      error: function(error) {
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
          KTUtil.btnRelease(btn);
        });
      },
      success: function(data) {
        if(data.success) {
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
            KTUtil.btnRelease(btn);
            if(typeof(data.redirect) != 'undefined')
              document.location.href = data.redirect
            else
              return true;
          });
        } else {
          swal.fire({
            html: data.message,
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "D'accord",
            customClass: {
              confirmButton: "btn font-weight-bold btn-light-primary"
            }
          }).then(function() {
            KTUtil.btnRelease(btn);
          });
        }
      }
    });
  });

  $('.w-action').click(function(e){
    e.preventDefault();
    let f = $(this);
    $.ajax({
      url: f.attr('data-href'),
      type: "POST",
      dataType: "JSON",
      data: {'uri': f.attr('data-href'), '_token': $('meta[name=csrf-token]').attr('content')},
      error: function(error) {
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
          return false;
        });
      },
      success: function(data) {
        if(data.success) {
          f.closest('tr').find('.status-cel').html($(data.status));
          f.closest('tr').find('.w-action').each(function() {
            $(this).remove();
          });
        } else {
          swal.fire({
            html: data.message,
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "D'accord",
            customClass: {
              confirmButton: "btn font-weight-bold btn-light-primary"
            }
          }).then(function() {
            return false;
          });
        }
      }
    });
  });

  // Post inline actions
  $.fn.hiddenPost = function(e) {
    let a = $(this)
    if(a.hasClass('confirm')) {
      Swal.fire({
        title: "Attention !",
        text: a.data('confirm'),
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Oui, continuer",
        cancelButtonText: "Annuler"
      }).then(function(result) {
        if (result.value) {
          $('.hidden-form').attr('action', a.data('href'))[0].submit()
        }
      });
    } else {
      $('.hidden-form').attr('action', a.data('href'))[0].submit()
    }
  }

  // Pickers
  $.fn.datepicker.dates['fr'] = {
    days: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"],
    daysShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"],
    daysMin: ["Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa"],
    months: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
    monthsShort: ["Jan", "Fév", "Mar", "Avr", "Mai", "Juin", "Juil", "Aoû", "Sep", "Oct", "Nov", "Déc"],
    today: "Aujourd'hui",
    clear: "Effacer",
    format: "yyyy-mm-dd",
    titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
    weekStart: 1
  };
});




// Class definition
var KTBootstrapDatepicker = function () {

  var arrows;
  if (KTUtil.isRTL()) {
    arrows = {
      leftArrow: '<i class="la la-angle-right"></i>',
      rightArrow: '<i class="la la-angle-left"></i>'
    }
  } else {
    arrows = {
      leftArrow: '<i class="la la-angle-left"></i>',
      rightArrow: '<i class="la la-angle-right"></i>'
    }
  }

  // Private functions
  var pickdates = function () {
    // minimum setup
    $('#dob').datepicker({
      rtl: KTUtil.isRTL(),
      todayHighlight: true,
      orientation: "bottom left",
      templates: arrows,
      format: "yyyy-mm-dd",
      clearBtn: true,
      language: "fr",
      autoclose: true,
      templates: arrows
    });

    // minimum setup for modal demo
    $('#kt_datepicker_1_modal').datepicker({
      rtl: KTUtil.isRTL(),
      todayHighlight: true,
      orientation: "bottom left",
      templates: arrows
    });

    // input group layout
    $('#kt_datepicker_2').datepicker({
      rtl: KTUtil.isRTL(),
      todayHighlight: true,
      orientation: "bottom left",
      templates: arrows,
      format: "yyyy-mm-dd",
      clearBtn: true,
      language: "fr",
      autoclose: true,
      templates: arrows
    });

    // input group layout for modal demo
    $('#kt_datepicker_2_modal').datepicker({
      rtl: KTUtil.isRTL(),
      todayHighlight: true,
      orientation: "bottom left",
      templates: arrows
    });

    // enable clear button
    $('#kt_datepicker_3, #kt_datepicker_3_validate').datepicker({
      rtl: KTUtil.isRTL(),
      todayBtn: "linked",
      clearBtn: true,
      todayHighlight: true,
      templates: arrows
    });

    // enable clear button for modal demo
    $('#kt_datepicker_3_modal').datepicker({
      rtl: KTUtil.isRTL(),
      todayBtn: "linked",
      clearBtn: true,
      todayHighlight: true,
      templates: arrows
    });

    // orientation
    $('#kt_datepicker_4_1').datepicker({
      rtl: KTUtil.isRTL(),
      orientation: "top left",
      todayHighlight: true,
      templates: arrows
    });

    $('#kt_datepicker_4_2').datepicker({
      rtl: KTUtil.isRTL(),
      orientation: "top right",
      todayHighlight: true,
      templates: arrows
    });

    $('#kt_datepicker_4_3').datepicker({
      rtl: KTUtil.isRTL(),
      orientation: "bottom left",
      todayHighlight: true,
      templates: arrows
    });

    $('#kt_datepicker_4_4').datepicker({
      rtl: KTUtil.isRTL(),
      orientation: "bottom right",
      todayHighlight: true,
      templates: arrows
    });

    // range picker
    $('#kt_datepicker_5').datepicker({
      rtl: KTUtil.isRTL(),
      todayHighlight: true,
      format: "yyyy-mm-dd",
      clearBtn: true,
      language: "fr",
      autoclose: true,
      templates: arrows
    });

    // inline picker
    $('#kt_datepicker_6').datepicker({
      rtl: KTUtil.isRTL(),
      todayHighlight: true,
      templates: arrows
    });
  }

  return {
    // public functions
    init: function() {
      pickdates();
    }
  };
}();

// Form repeater
// Class definition
var KTFormRepeater = function() {
  // Private functions
  var FormRepeat_ = function() {
    $('#kt_repeater_1').repeater({
      initEmpty: false,

      defaultValues: {
        'text-input': 'foo'
      },

      show: function () {
        $(this).slideDown();
      },

      hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
      }
    });
  }

  return {
    // public functions
    init: function() {
      FormRepeat_();
    }
  };
}();

jQuery(document).ready(function() {
  KTBootstrapDatepicker.init();
  KTFormRepeater.init();
});
