<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha256-NuCn4IvuZXdBaFKJOAcsU2Q3ZpwbdFisd5dux4jkQ5w=" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        
        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            body {
                background: url('/images/letter.png');
                background-image: 
                    url('/images/letter.svg');
                background-position:
                    top right;
                background-repeat: no-repeat;
                background-size: 18rem;
            }

            .full-height {
                height: 100vh;
            }
            /*
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }
            */
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        
            <div class="container bg-white">
                <nav class="py-4">
                    <div class="float-right">
                        @auth
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>
                            </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ route('register') }}">Register</a>
                                </li>
                            </ul>
                            
                        @endauth
                    </div>
                </nav>
            
                <div class="row">
                    <div class="col-12">
                        <h1>Send A Message To Santa</h1>
                        
                    </div>
                </div>
                <hr>
                <div class="row mb-5 align-items-center">
                    <div class="col-md-6">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('posts.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="sr-only" for="name">Your Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Your name ...">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="email">Email address</label>
                                <input type="email" name="email" value="{{ old('email') }}"  class="form-control" placeholder="Your email ...">
                            </div>
                            <div class="form-group">
                                <label for="body" class="sr-only">Your Message</label>
                                <textarea name="body" class="form-control" placeholder="Your message ...">{{ old('body') }}</textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Send To Santa</button>
                        </form>
                    </div>
                    <div class="col-md-6 d-none d-md-table-cell text-center">
                        <img class="img-fluid m-0" style="max-width: 200px;" src="/images/santa.png">
                    </div>
                </div>
                
                @if($posts->count() > 0)
                    <div class="card-columns">
                    @foreach($posts as $post)
                        <div class="card mb-3 p-2">
                            
                            <div class="card-body">
                                <div class="mb-3 text-right text-muted small font-italic">{{ $post->created_at->diffForHumans() }}</div>
                                <blockquote class="blockquote mb-0">
                                    <p>{{ $post->body }}</p>
                                    <footer class="blockquote-footer">{{ $post->name }} <cite title="Source Title">{{ $post->email }}</cite></footer>
                                </blockquote>
                                
                            </div>
                            @auth
                                @if(auth()->user()->id == $post->user_id)
                                    <div class="float-right">
                                        <span class="my-3">
                                            <button class="btn btn-light">
                                                <i class="fa fa-trash text-danger"></i>
                                            </button>
                                        </span>
                                    </div>
                                @endif 
                            @endauth
                        </div>
                    @endforeach
                    </div>
                @else
                    No messages to show.
                @endif

                {{ $posts->onEachSide(5)->links() }}
                    
                        
                    
            </div>
        </div>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <div id="flash">
            @include('partials.flash')
        </div>
        
    </body>
</html>
