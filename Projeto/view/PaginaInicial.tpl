<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta http-equiv="Expires" content="Tue, 01 Jan 1995 12:12:12 GMT">
        <meta http-equiv="Pragma" content="no-cache">
        <meta name="author" content="">

        <title>SuperMaps</title>

        <!-- css -->
        <link rel="stylesheet" href="bootstrap-3.3.7/dist/css/bootstrap.min.css">
        <link href="view/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/nivo-lightbox.css" rel="stylesheet" />
        <link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
        <link href="css/animations.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet">
        <link href="view/color/default.css" rel="stylesheet">

    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-custom">

        <section class="hero" id="intro">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-right navicon">
                        <a id="nav-toggle" class="nav_slide_button" href="#"><span></span></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center inner">
                        <div class="animatedParent">
                            <h1>SuperMaps</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <a href="#about" class="learn-more-btn btn-scroll">Leia mais</a>
                    </div>
                </div>
            </div>
        </section>


        <!-- Navigation -->
        <div id="navigation">
            <nav class="navbar navbar-custom" role="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="site-logo">
                                <a href="#" class="brand">SuperMaps</a>
                            </div>
                        </div>
                        <div class="col-md-10">

                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                                    <i class="fa fa-bars"></i>
                                </button>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="menu">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="active"><a href="#intro">Home</a></li>
                                    <li><a href="#about">Sobre</a></li>
                                    <li><a href="#contact">Contato</a></li>
                                    <li><a class="btnRegistrar" href="?">Registro</a></li>
                                    <li><a class="btnLogin" href="?">Login</a></li>
                                </ul>
                            </div>
                            <!-- /.Navbar-collapse -->

                        </div>
                    </div>
                </div>
                <!-- /.container -->
            </nav>
        </div>
        <!-- /Navigation -->

        <!-- Section: about -->
        <section id="about" class="home-section color-dark bg-white">
            <div class="container marginbot-50">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="animatedParent">
                            <div class="section-heading text-center animated bounceInDown">
                                <h2 class="h-bold">Sobre o SuperMaps</h2>
                                <div class="divider-header"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 animatedParent">
                        <div class="text-center">
                            <p>
                                Site com o intuito de agilizar as compras dos clientes da maneira mais eficiente possível, determinando uma mapa com o menor caminho para o cliente adquirir todos os seus produtos.
                            </p>
                            <a href="#service" class="btn btn-skin btn-scroll">O que oferecemos</a>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /Section: about -->


        <!-- Section: contact -->
        <section id="contact" class="home-section nopadd-bot color-dark bg-gray text-center">
            <div class="container marginbot-50">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="animatedParent">
                            <div class="section-heading text-center">
                                <h2 class="h-bold animated bounceInDown">Entre em contato</h2>
                                <div class="divider-header"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="container">

                <div class="row marginbot-80">
                    <div class="col-md-8 col-md-offset-2">
                        <div id="sendmessage">Sua mensagem foi enviada. Obrigado!</div>
                        <div id="errormessage"></div>
                        <form id="contact-form" action="" method="post" role="form" class="contactForm">
                            <div class="row marginbot-20">
                                <div class="col-md-6 xs-marginbot-20">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Nome" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" />
                                        <div class="validation"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                        <div class="validation"></div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Mensagem"></textarea>
                                        <div class="validation"></div>
                                    </div>
                                    <button type="submit" class="btn btn-skin btn-lg btn-block" id="btnContactUs">
                                        Enviar Mensagem</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </section>
        <!-- /Section: contact -->


        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-right copyright">
                        &copy;Copyright - SuperMaps. All Rights Reserved
                    </div>
                </div>
            </div>
        </footer>

        <!-- Core JavaScript Files -->
        <script src="js/jsInicial/jquery.min.js"></script>
        <script src="js/jsInicial/bootstrap.min.js"></script>
        <script src="js/jsInicial/jquery.sticky.js"></script>
        <script src="js/jsInicial/jquery.easing.min.js"></script>
        <script src="js/jsInicial/jquery.scrollTo.js"></script>
        <script src="js/jsInicial/jquery.appear.js"></script>
        <script src="js/jsInicial/stellar.js"></script>
        <script src="js/jsInicial/nivo-lightbox.min.js"></script>

        <script src="js/jsInicial/custom.js"></script>
        <script src="js/jsInicial/css3-animate-it.js"></script>

    </body>

</html>
