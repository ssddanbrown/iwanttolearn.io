<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area</title>

    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/admin">iwanttolearn.io - Admin</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="/admin/resources"><i class="fa fa-book"></i> Resources</a></li>
                <li><a href="/admin/tags"><i class="fa fa-tags"></i> Tags</a></li>
                <li><a href="/admin/formats"><i class="fa fa-file-text"></i> Formats</a></li>
            </ul>

        </div>
    </div>
</nav>

<div class="container">
    <div class="col-md-12">
        @if(Session::has('success'))
            <div class="alert alert-success">
                <p><strong>{{ Session::get('success') }}</strong></p>
            </div>
        @endif
    </div>
</div>

<div class="container">
    @yield('content')
</div>

</body>
</html>
