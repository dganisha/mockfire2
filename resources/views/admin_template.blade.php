<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{ asset("/mockfire/img/favicon.png") }}" rel="icon">
  <link href="{{ asset("/mockfire/img/apple-touch-icon.png") }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  @if(Request::segment(5) == 'new_resource' || Request::segment(5) == 'resource')
  <link rel="stylesheet" href="{{ asset("/bower_components/bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
  @else
  <link href="{{ asset("/mockfire/lib/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
  @endif
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset("/bower_components/select2/dist/css/select2.min.css") }}">
  <!-- Libraries CSS Files -->
  <link href="{{ asset("/mockfire/lib/owlcarousel/assets/owl.carousel.min.css") }}" rel="stylesheet">
  <link href="{{ asset("/mockfire/lib/owlcarousel/assets/owl.theme.default.min.css") }}" rel="stylesheet">
  <link href="{{ asset("/mockfire/lib/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet">
  <link href="{{ asset("/mockfire/lib/animate/animate.min.css") }}" rel="stylesheet">
  <link href="{{ asset("/mockfire/lib/modal-video/css/modal-video.min.css") }}" rel="stylesheet">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="{{ asset("/mockfire/lib/datatables/dataTables.bootstrap4.min.css") }}">
  <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"> -->
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> -->
  <!-- <link rel="stylesheet" href="{{ asset("/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}"> -->

  <!-- Main Stylesheet File -->
  <link href="{{ asset("/mockfire/css/style.css") }}" rel="stylesheet">
  <style>
      .fa-2x{
        font-size:2em !important;
      }
      .fa-1x{
          font-size:1.25em !important;
      }
  </style>

  <!-- =======================================================
    Theme Name: eStartup
    Theme URL: https://bootstrapmade.com/estartup-bootstrap-landing-page-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  
  <!-- #header -->
  @include('include.header')

  <!-- MAIN CONTENT -->
  @yield('content')

  <!--==========================
    Footer
  ============================-->
  @include('include.footer')



  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{ asset("/mockfire/lib/jquery/jquery.min.js") }}"></script>
  <script src="{{ asset("/mockfire/lib/jquery/jquery-migrate.min.js") }}"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="{{ asset("/mockfire/lib/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- DataTables -->
  <!-- <script src="{{ asset("/bower_components/datatables.net/js/jquery.dataTables.min.js") }}"></script> -->
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

  <script src="{{ asset("/mockfire/lib/superfish/hoverIntent.js") }}"></script>
  <script src="{{ asset("/mockfire/lib/superfish/superfish.min.js") }}"></script>
  <script src="{{ asset("/mockfire/lib/easing/easing.min.js") }}"></script>
  <script src="{{ asset("/mockfire/lib/modal-video/js/modal-video.js") }}"></script>
  <script src="{{ asset("/mockfire/lib/owlcarousel/owl.carousel.min.js") }}"></script>
  <script src="{{ asset("/mockfire/lib/wow/wow.min.js") }}"></script>
  <!-- Select2 -->
  <script src="{{ asset("/bower_components/select2/dist/js/select2.full.min.js") }}"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{ asset("/mockfire/contactform/contactform.js") }}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset("/mockfire/js/main.js") }}"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable({
      "language": {
        "search": "",
        "searchPlaceholder": "Masukkan kata kunci"
      }
    });
  });

  function nospaces(t){
      if(t.value.match(/\s/g)){
        // alert('Sorry, you are not allowed to enter any spaces');
        t.value=t.value.replace(/\s/g,'');
      }
  }
  $(document).ready(function () {
    //Initialize Select2 Elements
    // $('.select2').fn.select2.defaults.set('theme', 'bootstrap')
    $('.select2').select2()
  })
</script>

<!-- <script type="text/javascript">
  $(document).on('click', '#modal-invite', function() {
      $('.modal-title').text('invite firends');
      $('#project').val($(this).data('projectid'));
      $('#modal-invite').modal('show');
  });
</script> -->

<script type="text/javascript">
  $(document).on('click', '.delete-resource', function(){
    swal({
      title: "Anda yakin?",
      text: "Ketika menghapusnya, anda tidak akan bisa meng-recover kembali",
      icon: "warning",
      buttons: {
        cancel: "Close",
        catch: {
          text: "OK",
          closeModal: false,
        },
      }
      // dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        var resource = $(this).data('resource')
        $.ajax({
          type: "POST",
          data: "resource_id=" + resource,
          url: '{{ url("/") }}/delete_resource',
          dataType: "json",
          success: function(data) {
            var response = data.result;
            if(response == true){
              swal("Data anda telah berhasil dihapus", {
                icon: "success",
              });
              $("#"+resource).remove()
            }else{
              swal("Something wrong, Your data is not deleted.");
            }
          }, error: function() {
            swal("Something wrong, Your data is not deleted.");
          }
        });        
      } else {
        swal("Your data is safe.");
      }
    });    
  });
</script>
@if(Request::segment(5) === "new_resource")
<script>
        $(document).ready(function() {
          console.log("Powered By LENGKOMEDIA.com")
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $(".daftar-isi"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID
            
            var a = 1; //initlal text box count
            var no = 1;
            // console.log($('.skema').last().find('.namefield').attr('name'))
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(a < max_fields){ //max input box allowed
                    a++; //text box increment
                    // console.log($('.skema').last().find('.namefield').attr('name'))
                    var fieldbaru = $('.skema').last().find('.namefield').attr('name')
                    
                    no++;
                    var tes = fieldbaru.replace(fieldbaru,'field[field'+no+']');
                    console.log(tes);
                    // source: "/tes"

                    $(wrapper).append('<div class="row skema"><div class="col-xs-3 col-md-3 col-lg-3"><input class="form-control namefield" onkeyup="nospaces(this)" type="text" name="'+tes+'[key]" placeholder="Field Name"></div><div class="col-xs-3 col-md-3 col-lg-3"><select class="form-control select2 select_type" name="'+tes+'[value]" style="width: 100%;" id="type">@isset($data_opsigroup) @foreach($data_opsigroup as $databaru)<optgroup label="{{ $databaru->option_grup }}">@isset($data_opsi) @foreach($data_opsi as $opsi) @if($opsi->skemaopsigroup_id == $databaru->id)<option value="{{ $opsi->name_opsi }}">{{ $opsi->value_opsi }}</option> @endif @endforeach @endisset</optgroup>@endforeach @endisset</select></div><p class="add_array"><button type="button" class="btn btn-danger remove_field"><i class="fa fa-remove"></i></button></p><div class="col-xs-3 col-md-3 col-lg-3"></div><div class="form-skema"><div class="col-xs-3 col-md-3 col-lg-3 skema2"></div><div class="col-xs-3 col-md-3 col-lg-3 skema3"></div><div class="col-xs-1 col-md-1 col-lg-1 skema4"></div><div class="col-xs-12 col-md-12 col-lg-12"></div></div></div>').find('.select_type').select2();  
            }
        });
            
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parents('.skema').remove(); a--;
            })

            

        });
            $(document).on('change', '.select_type' ,function() {
                          // alert( this.value );
                          var value_select_type = this.value;
                          if(value_select_type == 'array') {
                            $(this).parents(".skema").find(".add_array").append("<button type='button' class='skema_add_field btn btn-primary' title='Add New Array' ><i class='fa fa-plus'></i></button>");
                            // $(this).parents(".skema").find(".add_array").append("<a class='skema_add_field btn btn-primary' title='Add New Array' ><i class='fa fa-plus'></i></a>");
                            } else {
                              // console.log($(this).parents(".add_array").find(".skema_add_field").remove()) 
                              // $(this).parent(".skema").find(".skema2").remove()
                              console.log($(this).parents(".skema").find(".skema_add_field").remove())
                              console.log($(this).parents(".skema").find(".skema2").empty())
                              console.log($(this).parents(".skema").find(".skema3").empty())
                              console.log($(this).parents(".skema").find(".skema4").empty())
                              console.log("wad")
                              // console.log($(this).find(".skema2").remove())
                              // console.log($(this).parents(".skema3").find(".new_form2").remove())
                            }
                        })
</script>
        <script type="text/javascript">
          var x = 1;
          // x++
          $(this.document).on("click",".remove_array", function(e){ //user click on remove text
                alert('Yakin untuk menghapus?')
                var w = e.preventDefault(); $(this).parents('.skema4'); x--;
                // $(this).parent('.skema4').find('.remove_array').addClass( "highlight" );
                var cari_button = $(this).parent('.remove-button');
                // $(this).
                // console.log(cari_button);
                // var fieldbaru = $('.skema').last().find('.namefield').attr('name')
                var cari_classhps = cari_button.append('').attr('class')
                var wow = cari_classhps.split('remove-button')
                var wow2 = wow[1].split('d');
                var codenya = wow2[1].replace(wow2[1],wow2[1]+'d.');
                // alert("w"+codenya+"w")
                var dibalik = codenya.split("").reverse().join("")
                // console.log($(this).parent('.skema2').find('.d'+wow[1]));
                var cari_a1 = $(this).parents('.skema').find('.skema2')
                var cari_a2 = $(this).parents('.skema').find('.skema3')
                $(cari_a1).find(dibalik).empty()
                $(cari_a2).find(dibalik).empty()
                $(cari_button).remove()
                // console.log(cari_a2)
                // $(this).parent('.skema3').find('.new_form2').remove();
                // $(this).parent('.skema3').find('.remove_field2').remove();

                x--;
            })

          $(document).on('click', '.skema_add_field' ,function() {
            var isi = $(this).parents(".skema").find(".select_type").val()
            // alert($(isi))
            if(x < 11) {
              x++;

              var search_field = $(this).parents('.skema').find('.select_type').attr('name')
              console.log(search_field);
              
              $(this).parents(".skema").find(".skema2").append('<div class="new_form d'+x+' form-group"><input class="get_input form-control" name="'+search_field+'['+isi+'][data][]" onkeyup="nospaces(this)" type="text" placeholder="New Field '+isi+'"/></div>'); //add input box
              
              // $(this).parents(".skema").find(".skema2").append('<div class="new_form form-group"><input class="form-control" name="field2['+isi+'][key]" type="text" placeholder="Input new field '+isi+'"/></div>');
              $(this).parents(".skema").find(".skema3").append('<div class="new_form2 d'+x+' form-group"><select class="form-control select2" name="'+search_field+'['+isi+'][type][]" style="width: 100%;" id="type">@isset($data_opsigroup) @foreach($data_opsigroup as $databaru)<optgroup label="{{ $databaru->option_grup }}">@isset($data_opsi) @foreach($data_opsi as $opsi) @if($opsi->name_opsi == 's') @elseif($opsi->skemaopsigroup_id == $databaru->id)<option value="{{ $opsi->name_opsi }}">{{ $opsi->value_opsi }}</option> @endif @endforeach @endisset</optgroup>@endforeach @endisset</select>');
              var haha = $(this).parents(".skema").find(".skema3")
              $(haha).find(".select2").select2()
              $(this).parents(".skema").find(".skema4").append('<div class="remove-button d'+x+'"><p class="remove_array"><a class="text-danger"><i class="fa fa-close"></i></a></p></div>');
            }
          });

        </script>
@elseif(Request::segment(5) === 'resource')
<script>
        $(document).ready(function() {
          console.log("Powered By LENGKOMEDIA.com - Edit")
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $(".daftar-isi"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID
            
            var a = 1; //initlal text box count
            // var no = 1;

            console.log($('.namefield').last().attr('name'))
            // NGECEK YG TERAKHIR = var carifield = $('.namefield').last().addClass( "highlight" ).attr('name').split('[')
            var carifield = $('.namefield').last().attr('name').split('[')
            var carilagi = carifield[1].split(']');
            var carilagi2 = carilagi[0].split(',');
            var carilagi3 = carilagi2[0].split('field');
            var no = carilagi3[1];
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(a < max_fields){ //max input box allowed
                    a++; //text box increment
                    // console.log($('.skema').last().find('.namefield').attr('name'))
                    // console.log($('.skema').find('.namefield').attr('name'))
                    var fieldbaru = $('.skema').find('.namefield').attr('name')
                    
                    no++;
                    var tes = fieldbaru.replace(fieldbaru,'field[field'+no+']');
                    // console.log(tes);

                    $(wrapper).append('<div class="row skema"><div class="col-xs-3 col-md-3 col-lg-3"><input class="form-control namefield" onkeyup="nospaces(this)" type="text" name="'+tes+'[key]" placeholder="Field Name"></div><div class="col-xs-3 col-md-3 col-lg-3"><select class="form-control select2 select_type" name="'+tes+'[value]" style="width: 100%;" id="type">@isset($data_opsigroup) @foreach($data_opsigroup as $databaru)<optgroup label="{{ $databaru->option_grup }}">@isset($data_opsi) @foreach($data_opsi as $opsi) @if($opsi->skemaopsigroup_id == $databaru->id)<option value="{{ $opsi->name_opsi }}">{{ $opsi->value_opsi }}</option> @endif @endforeach @endisset</optgroup>@endforeach @endisset</select></div><p class="add_array"><button type="button" class="btn btn-danger remove_field" title="Delete"><i class="fa fa-remove"></i></button></p><div class="col-xs-3 col-md-3 col-lg-3"></div><div class="form-skema"><div class="col-xs-3 col-md-3 col-lg-3 skema2"></div><div class="col-xs-3 col-md-3 col-lg-3 skema3"></div></div><div class="col-md-1 skema4"></div></div>').find('.select_type').select2();
            }
            // var haha = $(append)
            // console.log($(haha));
            // $(haha).find(".select2").select2()
        });
            
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parents('.skema').remove(); a--; //.addClass( "highlight" )
            })
            $(wrapper).on("click",".remove_field2", function(e){ //user click on remove text
              // var search_field = $(this).parents('.skema').find('.remove_field2').attr('name')
              e.preventDefault(); $(this).parents('.skema2')  .addClass( "highlight" ); a--;
                e.preventDefault(); $(this).parents('.skema').find('.skema2').addClass( "highlight" ); a--; //.addClass( "highlight" )
                e.preventDefault(); $(this).parents('.skema').find('.skema3').addClass( "highlight" ); a--;
            })

            

        });
            $(document).on('change', '.select_type' ,function() {
                          // alert( this.value );
                          var value_select_type = this.value;
                          if(value_select_type == 'array') {
                            $(this).parents(".skema").find(".add_array").append("<button type='button' class='btn btn-primary skema_add_field'><i class='fa fa-plus'></i></button>")
                            } else {
                              // console.log($(this).parents(".add_array").find(".skema_add_field").remove()) 
                              // $(this).parent(".skema").find(".skema2").remove()
                              console.log($(this).parents(".skema").find(".skema_add_field").remove())
                              console.log($(this).parents(".skema").find(".skema2").empty())
                              console.log($(this).parents(".skema").find(".skema3").empty())
                              console.log($(this).parents(".skema").find(".skema4").empty())
                              // console.log("wad")
                              // console.log($(this).find(".skema2").remove())
                              // console.log($(this).parents(".skema3").find(".new_form2").remove())
                            }
                        })
        </script>
        <script type="text/javascript">
          var x = 1;

          $(this.document).on("click",".remove_array", function(e){ //user click on remove text
                alert('Yakin untuk menghapus?')
                var w = e.preventDefault(); $(this).parents('.skema4'); x--;
                // $(this).parent('.skema4').find('.remove_array').addClass( "highlight" );
                var cari_button = $(this).parent('.remove-button');
                // $(this).
                // console.log(cari_button);
                // var fieldbaru = $('.skema').last().find('.namefield').attr('name')
                var cari_classhps = cari_button.append('').attr('class')
                var wow = cari_classhps.split('remove-button')
                var wow2 = wow[1].split('d');
                var codenya = wow2[1].replace(wow2[1],wow2[1]+'d.');
                // alert("w"+codenya+"w")
                var dibalik = codenya.split("").reverse().join("")
                // console.log($(this).parent('.skema2').find('.d'+wow[1]));
                var cari_a1 = $(this).parents('.skema').find('.skema2')
                var cari_a2 = $(this).parents('.skema').find('.skema3')
                var cari_a3 = $(this).parents('.skema').find('.skema4')
                $(this).parents('.skema').find('.br').empty();
                $(cari_a1).find(dibalik).empty()
                $(cari_a2).find(dibalik).empty()
                $(cari_a3).find(dibalik).empty()
                $(cari_button).remove()
                // console.log(cari_a2)
                // $(this).parent('.skema3').find('.new_form2').remove();
                // $(this).parent('.skema3').find('.remove_field2').remove();

                x--;
            })

          $(document).on('click', '.skema_add_field' ,function() {
            // var isi = $(".select_type").addClass( "highlight" ).val()
            var isi = $(this).parents(".skema").find(".select_type").val()
            // alert(isi)
            if(x < 11) {
              x++;

              var search_field = $(this).parents('.skema').find('.select_type').attr('name')
              // console.log(search_field);
              
              $(this).parents(".skema").find(".skema2").last().append('<div class="new_form  d'+x+' form-group"><input class="get_input form-control" name="'+search_field+'['+isi+'][data][]" onkeyup="nospaces(this)" type="text" placeholder="New Field for '+isi+'" required="required"/></div>'); //add input box
              
              // $(this).parents(".skema").find(".skema2").append('<div class="new_form form-group"><input class="form-control" name="field2['+isi+'][key]" type="text" placeholder="Input new field '+isi+'"/></div>');

              // CODE BEFORE line 216
              // $(this).parents(".skema").find(".skema3").append('<div class="new_form2 form-group"><select class="get_input2 form-control select2" name="'+search_field+'['+isi+'][type][]" style="width: 100%;"><option value="TES">TESS</option></select></div>');

              $(this).parents(".skema").find(".skema3").last().append('<div class="new_form2 d'+x+' form-group"><select class="form-control select2" name="'+search_field+'['+isi+'][type][]" style="width: 100%;" id="type">@isset($data_opsigroup) @foreach($data_opsigroup as $databaru)<optgroup label="{{ $databaru->option_grup }}">@isset($data_opsi) @foreach($data_opsi as $opsi) @if($opsi->skemaopsigroup_id == $databaru->id) @if($opsi->name_opsi == 'array') @else <option value="{{ $opsi->name_opsi }}">{{ $opsi->value_opsi }}</option> @endif @endif  @endforeach @endisset</optgroup>@endforeach @endisset</select></div>');
              var haha = $(this).parents(".skema").find(".skema3")
              $(haha).find(".select2").select2()
              $(this).parents(".skema").find(".skema4").last().append('<div class="remove-button d'+x+'"><p class="remove_array"><a class="text-danger"><i class="fa fa-close"></i></a></p></div>');
              
            }
          });

        </script>
@endif
</body>
</html>
