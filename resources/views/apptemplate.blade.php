<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>MyBlog</title>

        <!-- Fonts -->
        

        
        </head>
        <body>
        <div id='app'>
        <v-app >
            @if($user = Sentinel::check())
                <nav-bar checklogin>
                
                </nav-bar>
            @else
                <nav-bar >
                
                </nav-bar>
            @endif
            @yield("content")

            <app-footer
            @if(Sentinel::getUser() !== null)

                @if(Sentinel::getUser()->inRole("admin"))
                    admin
                @endif

            @endif
             :icons="{{$icons}}"></app-footer>
        </v-app>
                 
        </div>

        </body>
        <script src="{{asset('js/app.js')}}">
            
        </script>
</html>
