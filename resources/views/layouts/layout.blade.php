<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Inscrições {{date('m')>=5 ? date('Y')+1: date('Y')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{url('/css/style.css')}}">
    <!--<script src="{{url('/js/jquery.maskedinput.js')}}"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!--  Google Analytics: UA-43399606-3 Google Tag Manager: GTM-MJJJ37K 
     Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-43399606-3"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-43399606-3');
    </script>

    <!-- Facebook Pixel Code --> 
    <script> 
    !function(f,b,e,v,n,t,s) {
        if(f.fbq)return;n=f.fbq=function(){
            n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)
            }; 
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0'; n.queue=[];t=b.createElement(e);t.async=!0; t.src=v;s=b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s)}(window, document,'script', 'https://connect.facebook.net/en_US/fbevents.js'); fbq('init', '333047660827509'); fbq('track', 'PageView'); 
            </script> 
            <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=333047660827509&ev=PageView&noscript=1" />
    </noscript> 
    <!-- End Facebook Pixel Code -->
</head>
<body>
<div class="container ">
    <img src="{{url("images/logo.png")}}" alt="" class="img-logo">
</div>
@yield('content')

</body>
</html>
