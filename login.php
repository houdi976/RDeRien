<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Chronicle Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/shop.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/styleRegister.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/font-awesome.css" rel="stylesheet">
    
</head>


<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <div id="home">
        <div class="login-form section text-center">
            <div class="container">
                <div id="loginbox" style="margin-top:30px;" class="mainbox  loginbox">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Sign In</div>
                        </div>
                        <div style="padding-top:30px" class="panel-body">
                            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            <form id="loginform" class="form-horizontal" action="" method="post">
                            <?php require_once('loginTreatment.php');?>
                                <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <input id="login-password" type="text" class="form-control" name="email" placeholder="Votre Email" required="true">
                                </div>

                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-lock"></i>
                                    </span>
                                    <input id="login-username" type="password" class="form-control" name="password" placeholder="Votre mot de passe" required="true">
                                </div>

                                
                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                                    <div class="col-sm-12 controls">
                                        <input id="btn-login" name="login" type="submit"  class="btn btn-success" value="Login "/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                            Pas de compte!
                                            <a href="preregister.php">
                                              <h3> Créer</h3>
                                            </a>
                                            
							            <h4><a class="navbar-brand" href="index.php">HOME</a></h4>
						
                                        </div>
                                        
                                    </div>
                                </div>
                               
                            </form>
                        </div>
                    </div>
                </div>
                
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>