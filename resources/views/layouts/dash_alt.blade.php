<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        {{-- Jquery CDN --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
        
        {{-- Bootstrap JS --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        
        {{-- Font Awesome CDN --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        {{-- Google Font (Lato & Raleway) --}}
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400&family=Raleway:wght@300;700&display=swap" rel="stylesheet"> 

        {{-- Style --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>@yield('page-title')</title>
    </head>

    <body class="body body--back">
        
        <div class="outer-wrapper">

            {{-- Header --}}

            <div class="row">            
                <div class="col">
                    @include('layouts.partials.header-back')
                </div>
            </div>
            
            <div class="row no-gutters page-content">            
                <div class="col-md-200px no-gutters">

                    @include('layouts.partials.sidebar-back')

                </div>
                
                <div class="col no-gutters">
                    <main class="main main--back">
                        {{-- Main --}}
                        @yield('content')
                    </main>
                </div>
            </div>


            </div> <!-- Row END -->
        </div>  <!-- Container END -->

    </body>
    
</html>