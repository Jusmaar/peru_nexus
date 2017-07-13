@extends('layouts.master')

@section('content')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('/CelularesPeru/js/bootstrap-datetimepicker.js')}}" ></script>
<script type="text/javascript" src="{{url('/CelularesPeru/js/bootstrap-datetimepicker.es.js')}}" ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script src="http://html2canvas.hertzen.com/build/html2canvas.js" ></script>



<link rel="stylesheet" type="text/css" href="{{url('/CelularesPeru/css/bootstrap-datetimepicker.css')}}">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>


<!-- Chart code -->

  <h3 class="text-center text-primary">
    REPORTE DE VENTAS 
  </h3><br><br>
 <div class="form-group">
 <form method="post" action="Reporte">
  {{ csrf_field() }}

<div class="col-md-5">
         <label for="dtp_input2" class="col-md-4 control-label">Fecha de inicio</label>
                <div class="input-group date form_date_ini col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="text" value="" name="fecha_ini"  readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>

          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                
                </div>
</div>
<div class="col-md-5">

                <label for="dtp_input2" class="col-md-4 control-label">Fecha fin</label>
                 <div class="input-group date form_date_fin col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="text" value="" name="fecha_fin" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
</div>  
<div class="col-md-2">
<button type="submit" class="btn btn-primary">Generar</button>
</div>  
</form>    
</div>
<p></p>
<!-- HTML -->
<div style="height: 400px">
@if (count($reportes) > 0)
<button id="download">Descargar PDF</button>
<div class="col-md-4 col-md-offset-4" id="prueba">

<br><br><h5 class=" text-center text-danger">Reporte de ventas del {{$fecha1}} al {{$fecha2}}</h5>

<canvas id="myChart" width="300" height="200">

    
</canvas>

<script >
        $('#download').click(function() {       
        html2canvas($("#prueba"), {
            onrendered: function(canvas) {         
                var imgData = canvas.toDataURL(
                    'image/png');              
                var doc = new jsPDF('p', 'mm');
                doc.addImage(imgData, 'PNG', 30, 30);
                doc.save('Reporte_Ventas.pdf');
            }
        });
    });
</script>
<script>
function generarcolores(){
  var color1=Math.floor(Math.random() * 255);
  var color2=Math.floor(Math.random() * 255);
  var color3=Math.floor(Math.random() * 255);
  return('rgba('+color1+','+color2+','+color3+',0.6)');
}
var productos=[];
var cantidad=[];
var colores=[];

@foreach($reportes as $item)
productos.push('{{$item->producto}}');
cantidad.push('{{$item->cantidad}}');

colores.push(generarcolores());


@endforeach

//productos=["a","v","s","e","2","f"];
var ctx = document.getElementById("myChart").getContext('2d');

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: productos,
        datasets: [{
            label: '# de productos',
            data: cantidad,
            backgroundColor: colores,
            borderColor: colores,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

</script>
</div>
@else
<h5 class="text-danger">No se encontraron resultados</h5>
@endif
</div>

<script type="text/javascript">

    
  $('.form_date_ini').datetimepicker({
        language:  'es',
        format: 'yyyy-mm-dd',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });
$('.form_date_fin').datetimepicker({
        language:  'es',
        format: 'yyyy-mm-dd',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });

</script>



@stop