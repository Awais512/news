<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    @include('admin.layouts.head')

</head>
<body> 
    
    {{-- Left Sidebar --}}
    @include('admin.layouts.sidebar')    
    {{-- Left Sidebar End --}}

    {{-- Right Panel --}}
    <div id="right-panel" class="right-panel">

       
      @include('admin.layouts.header')
       

       @yield('content')
    </div>

    {{-- End Right Panel --}}
   
    {{-- Javascripts Files --}}

    @include('admin.layouts.jsfiles') 

    {{-- End Javascript Files --}}
    
</body>
</html>
