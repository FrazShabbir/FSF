<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/settings.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>



<body class="bg-default">
    <div class="main-content">
        <div class="header bg-gradient-primary">
            <div class="container-fluid mt-5" >
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <h2 style="width: 100%">
                            {{$user->first_name}} {{$user->last_name}}
                            <span>
                             <a href="{{route('editProfile', $user->username)}}" role="button" class="btn btn-sm btn-warning" style="float: right">Edit Profile </a>
                            </span>
                        </h2>

                        <div class="row mt-5 mb-2">
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                Card Status
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="cardActive" @if($user->locked == 0) checked="checked" @endif onchange="changeStatus()">
                                    <label class="form-check-label" for="cardActive"></label>
                                  </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="header-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card card-stats mb-4 mb-xl-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title text-uppercase text-muted mb-0">Views</h5>
                                                    <span class="h2 font-weight-bold mb-0">{{ number_format($user->views)}}</span>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                                        <i class="fas fa-eye"></i>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card card-stats mb-4 mb-xl-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title text-uppercase text-muted mb-0">Downloads</h5>
                                                    <span class="h2 font-weight-bold mb-0">{{ number_format($user->downloads)}}</span>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                        <i class="fas fa-download"></i>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Page content -->
    </div>
    <script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

<script>

    function changeStatus(){
        status = $("#cardActive").is(':checked') ? 1: 0;
        console.log(status);
        var url = "{{route('card.status', $user->username)}}?status="+status;
        $.ajax({url:  url,
            success: function(result){
            toastr.success(result, 'Succss');
        },
        error: function(){
            toastr.error("Something went wrong", 'Error')
        }}
       );
    }
</script>
</html>

