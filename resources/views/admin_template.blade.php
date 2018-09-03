<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mockfire</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset("/bower_components/bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("/bower_components/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset("/bower_components/Ionicons/css/ionicons.min.css") }}" rel="stylesheet" type="text/css" />
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset("/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset("/bower_components/select2/dist/css/select2.min.css") }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css") }}" rel="stylesheet" type="text/css" >
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{ asset("/bower_components/admin-lte/dist/css/skins/skin-blue-light.min.css") }}" rel="stylesheet" type="text/css" >
  <style>
  .highlight {
    background-color: yellow;
  }
  </style>
<!--   <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
  <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  @include('include.header')

  <!-- Left side column. contains the logo and sidebar -->
  @include('include.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $page_title or "Mockfire" }}
        <small>{{ $page_description or "- v1" }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">{{ Request::segment(1) }}/{{ Request::segment(2) }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('include.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset("/bower_components/jquery/dist/jquery.min.js") }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset("/bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<!-- Select2 -->
<script src="{{ asset("/bower_components/select2/dist/js/select2.full.min.js") }}"></script>
<!-- DataTables -->
<script src="{{ asset("/bower_components/datatables.net/js/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("/bower_components/admin-lte/dist/js/adminlte.min.js") }}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
<script>
  $(document).ready(function () {
    $('#data').DataTable()
    $('#table').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
		
<script type="text/javascript">

		function nospaces(t){
			if(t.value.match(/\s/g)){
				// alert('Sorry, you are not allowed to enter any spaces');
				t.value=t.value.replace(/\s/g,'');
			}
		}
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

                    $(wrapper).append('<div class="skema"><div class="col-xs-4"><input class="form-control namefield" onkeyup="nospaces(this)" type="text" name="'+tes+'[key]" placeholder="Field Name"></div><div class="col-xs-4"><select class="form-control select2 select_type" name="'+tes+'[value]" style="width: 100%;" id="type">@isset($data_opsigroup) @foreach($data_opsigroup as $databaru)<optgroup label="{{ $databaru->option_grup }}">@isset($data_opsi) @foreach($data_opsi as $opsi) @if($opsi->skemaopsigroup_id == $databaru->id)<option value="{{ $opsi->name_opsi }}">{{ $opsi->value_opsi }}</option> @endif @endforeach @endisset</optgroup>@endforeach @endisset</select></div><p class="add_array"><a href="#" class="btn btn-danger remove_field" title="Delete"><i class="fa fa-remove"></i></a> </p><div class="col-xs-4"></div><div class="form-skema"><div class="col-md-4 skema2"></div><div class="col-md-3 skema3"></div></div><div class="col-md-1 skema4"></div><br></div>'); 	
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
                          	$(this).parents(".skema").find(".add_array").append("<a class='skema_add_field btn btn-primary' title='Add New Array' ><i class='fa fa-plus'></i></a>");
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
       				$(this).parents(".skema").find(".skema3").append('<div class="new_form2 d'+x+' form-group"><select class="form-control select2" name="'+search_field+'['+isi+'][type][]" style="width: 100%;" id="type">@isset($data_opsigroup) @foreach($data_opsigroup as $databaru)<optgroup label="{{ $databaru->option_grup }}">@isset($data_opsi) @foreach($data_opsi as $opsi) @if($opsi->name_opsi == 'array') @elseif($opsi->skemaopsigroup_id == $databaru->id)<option value="{{ $opsi->name_opsi }}">{{ $opsi->value_opsi }}</option> @endif @endforeach @endisset</optgroup>@endforeach @endisset</select>');
              $(this).parents(".skema").find(".skema4").append('<div class="remove-button d'+x+'"><p class="remove_array"><a class="text-danger"><i class="fa fa-close"></i></a></p><br></div>');
       				
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

                    $(wrapper).append('<div class="skema"><div class="col-xs-4"><input class="form-control namefield" onkeyup="nospaces(this)" type="text" name="'+tes+'[key]" placeholder="Field Name"></div><div class="col-xs-4"><select class="form-control select2 select_type" name="'+tes+'[value]" style="width: 100%;" id="type">@isset($data_opsigroup) @foreach($data_opsigroup as $databaru)<optgroup label="{{ $databaru->option_grup }}">@isset($data_opsi) @foreach($data_opsi as $opsi) @if($opsi->skemaopsigroup_id == $databaru->id)<option value="{{ $opsi->name_opsi }}">{{ $opsi->value_opsi }}</option> @endif @endforeach @endisset</optgroup>@endforeach @endisset</select></div><p class="add_array"><a href="#" class="btn btn-danger remove_field" title="Delete"><i class="fa fa-remove"></i></a> </p><div class="col-xs-4"></div><div class="form-skema"><div class="col-md-4 skema2"></div><div class="col-md-3 skema3"></div></div><div class="col-md-1 skema4"></div><br></div>');
            }
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
                            $(this).parents(".skema").find(".add_array").append("<a class='skema_add_field btn btn-primary' title='Add New Array' ><i class='fa fa-plus'></i></a>");
                            } else {
                              // console.log($(this).parents(".add_array").find(".skema_add_field").remove()) 
                              // $(this).parent(".skema").find(".skema2").remove()
                              console.log($(this).parents(".skema").find(".skema_add_field").remove())
                              console.log($(this).parents(".skema").find(".skema2").empty())
                              console.log($(this).parents(".skema").find(".skema3").empty())
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
                $(this).parents('.skema').find('.br').empty();
                $(cari_a1).find(dibalik).empty()
                $(cari_a2).find(dibalik).empty()
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
              $(this).parents(".skema").find(".skema4").last().append('<div class="remove-button d'+x+'"><p class="remove_array"><a class="text-danger"><i class="fa fa-close"></i></a></p><br></div>');
              
            }
          });

        </script>
@endif
<script>
  $(document).ready(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
</body>
</html>