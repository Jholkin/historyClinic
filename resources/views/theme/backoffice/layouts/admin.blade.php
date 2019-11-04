<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    @include('theme.backoffice.layouts.includes.head')
  </head>
  <body>    
    @include('theme.backoffice.layouts.includes.loader')
    @include('theme.backoffice.layouts.includes.header')
    <!-- START MAIN -->
    <div id="main">
      <div class="wrapper">        
        @include('theme.backoffice.layouts.includes.left-sidebar')
        <section id="content">
          <div class="container">
            @yield('content')
          </div>
        </section>
      </div>
    </div>
    <!-- END MAIN -->
    @include('theme.backoffice.layouts.includes.footer')
    @include('theme.backoffice.layouts.includes.foot')   
  </body>
</html>