<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>URL shortener</title>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
    <body>
        <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-6">
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Shortener</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">History</a>
                      </li>

                    </ul>
                </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-6">
                    <!-- Tab panes -->
                    <div class="tab-content" style="height:300px;">
                      <div role="tabpanel" class="tab-pane row active" id="profile"><div id="forma" style="width:100%;height:auto;display:inline-block;"></div></div>
                      <div role="tabpanel" class="tab-pane row " id="buzz"><div id="lista" style="width:100%;height:auto;display:inline-block;"></div></div>
                    </div>
                    </div>
                </div>

            </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
