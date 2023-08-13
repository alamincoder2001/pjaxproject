<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel PJAX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />


    <style>
        #pjax-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 9999;
        }

        .loading-bar {
            position: absolute;
            top: 50%;
            left: 0;
            width: 0;
            height: 4px;
            background-color: #007bff;
            animation: loading 2s infinite;
        }

        @keyframes loading {
            0% {
                width: 0;
            }

            50% {
                width: 50%;
            }

            100% {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div id="pjax-loader" class="d-none">
        <div class="loading-bar"></div>
    </div>

    <nav class="bg-dark py-2">
        <ul class="d-flex my-0 gap-5 container" style="list-style: none;">
            <li><a class="text-white text-decoration-none" href="/">Home</a></li>
            <li>
                <a class="text-white text-decoration-none" title="About Page" href="{{ route('about') }}" data-pjax="#pjax-container">About</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <div id="pjax-container">
            @yield('content')
        </div>
    </div>

    <div class="footer bg-dark p-3 fixed-bottom">
        <p class="m-0 text-center text-white">Footer Page</p>
    </div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
    <script>
        $(document).on('click', 'a[data-pjax]', function(event) {
            event.preventDefault();

            $('#pjax-loader').removeClass('d-none');

            $.ajax({
                url: event.target.href,
                headers: {
                    'X-PJAX': 'true'
                },
                beforeSend: function() {
                    $('#pjax-container').html("");
                },
                success: function(data) {
                    setTimeout(() => {
                        history.pushState(null, event.target.title, event.target.href);
                        document.title = event.target.title
                        $('#pjax-container').html(data);
                    }, 1000)
                },
                complete: function() {
                    setTimeout(() => {
                        $('#pjax-loader').addClass('d-none');
                    }, 1000)
                }
            });
        });
    </script>

    @stack('webjs')
</body>

</html>