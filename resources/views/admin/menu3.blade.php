<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Side Bar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    {{-- iconoss --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>
<style>
    nav,
    .offcanvas {
        background-color: #1e293b
    }

    .navbar-toggler {
        border: none;
    }

    .navbar-toggler:focus {
        outline: none;
        box-shadow: none;
    }

    @media (max-width: 768px) {
        .navbar-nav>li:hover {
            background-color: #0dcaf0
        }
    }
</style>

<body>
    {{-- Menu principal --}}
    <nav class="navbar navbar-exoand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="" class="navbar-brand text-info fw-semibold fs-4">Generic</a>

            {{-- boton de navegacion --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuLateral">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- canvas main container. contenedor principal --}}
            <section class="offcanvas offcanvas-start bg-dark" id="menuLateral" tabindex="-1">
                <div class="offcanvas-header" data-bs-theme="dark">
                    <h5 class="offcanvas-title text-info">generic</h5>0
                    <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="offcanvas"></button>
                </div>

                {{-- canvas links --}}
                <div class="offcanvas-body d-flex flex-column justify-content-between px-0">

                    <ul class="navbar-nav fs-5 justify-content-evenly">
                        <li class="nav-item p3 py-md-1"><a href="" class="nav-link">HOME</a></li>
                        <li class="nav-item p3 py-md-1"><a href="" class="nav-link">PROJECTS</a></li>
                        <li class="nav-item p3 py-md-1"><a href="" class="nav-link">ABOUT</a></li>
                        <li class="nav-item p3 py-md-1"><a href="" class="nav-link">CONTACT</a></li>
                    </ul>

                    {{-- enlace redes sociales --}}
                      {{-- d-lg-none ->clase para que no aparezca en pantalla grande --}}
                    <div class=" align-self-center py-3"> 
                        <a href=""><i class="bi bi-twitter px-2 text-info fs-2"></i></a>
                        <a href=""><i class="bi bi-facebook px-2 text-info fs-2"></i></a>
                        <a href=""><i class="bi bi-github px-2 text-info fs-2"></i></a>
                        <a href=""><i class="bi bi-whatsapp px-2 text-info fs-2"></i></a>
                    </div>
                </div>

            </section>


        </div>

    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
