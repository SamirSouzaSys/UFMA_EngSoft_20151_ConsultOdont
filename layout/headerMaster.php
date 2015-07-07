<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?= $pageTitle ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="<?= $url_site; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?= $url_site; ?>/assets/css/business-casual.css" rel="stylesheet">
        <!-- Fonts -->
        <link href="<?= $url_site; ?>/assets/fonts/font1.css" rel="stylesheet" type="text/css">
        <link href="<?= $url_site; ?>/assets/fonts/font2.css" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <!--Collect the nav links, forms, and other content for toggling -->
        <div class="brand">Consultório Sorriso Feliz</div>
        <div class="address-bar">Logo ali no CCET da UFMA</div>

        <!-- Navigation -->
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                    <a class="navbar-brand" href="index.html">Consultório Sorriso Feliz</a>
                </div>
                <div class = "collapse navbar-collapse" id = "bs-example-navbar-collapse-1">
                    <ul class = "nav navbar-nav">
                        <li>
                            <a href = "<?= $url_site; ?>/index.php">Home</a>
                        </li>
                        <li>
                            <a href = "<?= $url_site; ?>/pages/cadastrarAll.php">Cadastrar</a>
                        </li>
                    </ul>
                </div>
                <!--/.navbar-collapse -->
            </div>
            <!--/.container -->
        </nav>
        <?php
        if (isset($_SESSION['logado'])) {
            ?>
            <div class="alert alert-info text-right">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&nbsp;Sair</button>
                <label>
                    <?php
                    echo " Seja bem vindo - " . $_SESSION['nome'] . " - Cargo: " . $_SESSION['tipo'] . " ";
                    ?>        
                </label>
            </div>    
            <?php
        }
        ?>
        <?php
        if (isset($_GET['msgErr'])) {
            ?>
            <div class="alert alert-danger alert-dismissible text-center">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php
                echo $_GET['msgErr'];
                ?>        
            </div>    
            <?php
        }
        ?>