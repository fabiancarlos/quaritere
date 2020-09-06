<!doctype html>
<html class="no-js" lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta name="description" content="Coletivo Audiovisual Negro Quariterê">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <meta name="google-site-verification" content="eoWYBO-f5-afHoyVHzlgxpqOHFwVMR26tVGjLpVO-bk" />

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="/css/normalize.css">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/main.css">
  <link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet" />
  <link rel="stylesheet" href="/css/quaritere.css?v=1.15">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>

  <meta name="theme-color" content="#fafafa">

  <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

  <!-- The core Firebase JS SDK is always required and must be listed first -->
  <script src="https://www.gstatic.com/firebasejs/7.19.0/firebase-app.js"></script>

  <!-- TODO: Add SDKs for Firebase products that you want to use
      https://firebase.google.com/docs/web/setup#available-libraries -->
  <script src="https://www.gstatic.com/firebasejs/7.19.0/firebase-analytics.js"></script>

  <script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
      apiKey: "AIzaSyDzU2qRDrrn1f_6D-M2JNZOzy8RAXnQbi0",
      authDomain: "quaritere-a2d45.firebaseapp.com",
      databaseURL: "https://quaritere-a2d45.firebaseio.com",
      projectId: "quaritere-a2d45",
      storageBucket: "quaritere-a2d45.appspot.com",
      messagingSenderId: "279887295638",
      appId: "1:279887295638:web:ea6710ee81b5b49315beb7",
      measurementId: "G-MNPFM531CG"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
  </script>


  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '2670464023166275',
        cookie     : true,
        xfbml      : true,
        version    : 'v8.0'
      });
      FB.AppEvents.logPageView();

      // $(document).trigger('fbload');
    };

    (function(d, s, id){
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {return;}
      js = d.createElement(s); js.id = id;
      js.src = "https://connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>
</head>

<body>

  @yield('content')

  <!-- Scripts -->
  <script src="/js/vendor/modernizr-3.11.2.min.js"></script>
  <script src="/js/vendor/bootstrap.min.js"></script>
  <script src="/js/plugins.js"></script>
  <script src="https://vjs.zencdn.net/7.8.4/video.js"></script>
  <script src="/js/main.js?v=1.15"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>
