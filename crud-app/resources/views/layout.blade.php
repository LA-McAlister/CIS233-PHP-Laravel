<!DOCTYPE html>
<html long="en">
    <head> 
        <title>Products</title>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    </head> 
    <body> 
    <h1>Products for Purchase</h1>
        @if( session()->get('success') )
        <div class="alert alert-success" role="alert">
             {{session()->get('success')}}
        </div>
        @endIf

        @yield('content')
        
    </body>
</hmtl>