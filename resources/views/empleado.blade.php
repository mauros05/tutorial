<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('public/CSS/estilo.css')}}">
    <title>Document</title>
</head>
<body>
    <h1>Empresa Troncoso</h1>
    <div>
        <p>Bienvenido {{$nombre}}, tu numero de dias trabajados es: {{$dias_trabajados}}.</p>
        <h3>El total de tu pago es: ${{$nomina}}</h3>
        <p>Por lo tanto te has ganado una Torta:</p>
        @if ($nombre == "Mauricio")
            <p>Hola Mauricio</p>
            <img src="{{asset('public\fotos\IMG_20190423_174033893.jpg')}}" alt="Foto de Torta de Pierna">
        @else 
            Sin foto
        @endif

        @if ($nombre == "Andy")
            <p>Hola Andy</p>    
            <img src="{{asset('public/fotos/TORTA-DE-LA-BARDA-1536x1152.jpg')}}" alt="Foto de Torta de la Barda">
        @endif
    </div>
{{-- public\fotos\TORTA-DE-LA-BARDA-1536x1152.jpg --}}
    <div>
        {{-- Para usar la funcion route debemos de renombrar la ruta en el archivo web.php --}}
        <a href="{{route('salir')}}">Cerrar Nomina</a>
        <a href="{{route('bootstrapview')}}">Ir a Bootstrap</a>
    </div>
</body>
</html>