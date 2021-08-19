<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.componen.head')
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                @include('layouts.componen.sidebar')
                @include('layouts.componen.top_nav')
                @include('layouts.componen.main_content')
                @include('layouts.componen.footer')
            </div>
        </div>


        @include('layouts.componen.script')
        @section('technical_document_input_goods')
        
    </body>
</html>
