@extends('admin.master')
@section('css')
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/promise-polyfill@7.1.0/dist/promise.min.js"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
<style type="text/css">
#loaderSvgWrapper{
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: #fff;
  z-index: 99;
}
#preLoader{
  position: absolute;
  top: 50%;
  left: 45%;
}
path{
  fill: #024038;
  stroke: #f00;
}
#T1{
  animation: visible 2s ease .2s infinite;
}
#T2{
  animation: visible 2s ease .4s infinite;
}
#T3{
  animation: visible 2s ease .6s infinite;
}
#T4{
  animation: visible 2s ease .8s infinite;
}
#T5{
  animation: visible 2s ease 1s infinite;
}
#T6{
  animation: visible 2s ease 1.2s infinite;
}
@keyframes visible {
  0%{
    opacity: 1;
    stroke-opacity: 1;
  }
  50%{
    opacity: 0;
    stroke-opacity: 0;
  }
  100%{
    opacity: 1;
    stroke-opacity: 1;
  }
}  
</style>
@endsection
@section('content')
<div id="loaderSvgWrapper">
  <svg xmlns:svg="http://www.w3.org/2000/svg" viewbox="0 0 100 100" id="preLoader" width="100px" height="100px">
    <path style="stroke-width:0.26458332px;stroke-linecap:butt;stroke-linejoin:miter" d="m 58.26475,43.628481 15.7247,-27.287018 -31.4936,0.02553 z" id="T1"/>
    <path style="stroke-width:0.26458332px;stroke-linecap:butt;stroke-linejoin:miter" d="m 58.26475,43.628481 31.4936,-0.02553 -15.7689,-27.261492 z" id="T2"/>
    <path style="stroke-width:0.26458332px;stroke-linecap:butt;stroke-linejoin:miter" d="M 58.26475,43.628481 74.03365,70.88997 89.75835,43.602954 Z" id="T3"/>
    <path style="stroke-width:0.26458332px;stroke-linecap:butt;stroke-linejoin:miter" d="M 58.26475,43.628481 42.54006,70.915503 74.03365,70.889973 Z" id="T4"/>
    <path style="stroke-width:0.26458332px;stroke-linecap:butt;stroke-linejoin:miter" d="m 58.26475,43.628481 -31.49359,0.02553 15.7689,27.261491 z" id="T5"/>
    <path style="stroke-width:0.26458332px;stroke-linecap:butt;stroke-linejoin:miter" d="M 58.26475,43.628481 42.49585,16.366995 26.77116,43.654011 Z" id="T6"/>
  </svg>
</div>
@if(session()->get('message')=='Berhasil')
<script type="text/javascript">
  swal
  ({
    title: 'Berhasil',
    text: 'Akun berhasil terdaftar',
    type: 'success',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Gagal')
<script type="text/javascript">
  swal
  ({
    title: 'Gagal',
    text: 'Coba lagi',
    type: 'error',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Gagal1')
<script type="text/javascript">
  swal
  ({
    title: 'Gagal',
    text: 'Coba lagi',
    type: 'error',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Berhasil1')
<script type="text/javascript">
  swal
  ({
    title: 'Berhasil',
    text: 'Akun berhasil terupdate',
    type: 'success',
    confirmButtonText: 'Iya'
  })
</script>
@endif
<div class="col-12">
  <div
  class="card">
  <div class="card-body">
    <h4 class="card-title">Rumah Sakit</h4>
    <form class="forms-sample" method="post" action="{{url('rumahsakitnya')}} ">
      <div class="form-group">
        <label for="exampleInputPassword1">Nama Rumah Sakit</label>
        <div class="input-group">
          <div class="input-group-prepend">
          </div>
          <input type="text" class="form-control" name="nama" id="nama" placeholder="RSUD Dr.Suetomo">
          <div class="input-group-append bg-primary border-primary">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Alamat Rumah Sakit</label>
        <div class="input-group">
          <div class="input-group-prepend">
          </div>
          <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Jl. Dr Sutomo no. 9 Jakarta" >
          <div class="input-group-append">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect2">Ketrangan</label>
        <select class="form-control" name="ket" id="ket">
          <option value="Pemerintah">Pemerintah</option>
          <option value="Swasta">Swasta</option>
        </select>
      </div>
      <input type="hidden" id="id_rumah" name="id_rumah">
      {{ csrf_field() }}
      <button type="submit" class="btn btn-primary">Kirim</button>
      <button type="reset" class="btn btn-light">Reset</button>
    </form>
  </div>
</div>
</div>
@if ($data!=null)
<input type="hidden" name="id" id="id" value="{{$data->id_rumah}}">
@endif
@endsection
@section('js')
<script type="text/javascript">
  var bla = $('#id').val();
            // alert(bla);
            if(bla)
            {
              $.ajax({    
                type: 'get',
                url: '/ajax4/'+bla,
                datatype: 'JSON',
                success:function(data){
                  console.log(JSON.parse(data));
                  $("#nama").val(JSON.parse(data).nama_rumah);
                  $("#alamat").val(JSON.parse(data).alamat_rumah);
                  $("#id_rumah").val(JSON.parse(data).id_rumah);
                  $("#ket").val(JSON.parse(data).keterangan_rumah);
                },
                error:function(data){
                  console.log('data belum ada');
                }
              }); 
            }
            else
            {
              console.log('data belum ada');
            }
            
          </script>
          <script type="text/javascript">
            $(window).on('load', function(){
              $('#loaderSvgWrapper').fadeOut(500);
              $('#preloader').delay(350).fadeOut('slow');
              $('body').delay(350).css({'overflow':'visible'});
            });
          </script>
          <!-- <script src="{{asset('node_modules/jquery/dist/jquery.min.js')}}"></script> -->
          @endsection