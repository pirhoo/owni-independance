<?php
    define("APP_URL"  , "http://");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title>RFI: Indépendances Africaines</title>
        <link rel="stylesheet" href="./theme/style.css" type="text/css" media="screen" />
        <!--[if lt IE 7.]>
            <script defer type="text/javascript" src="./includes/js/pngfix.js"></script>
        <![endif]-->

        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script type="text/javascript">
              google.load("jquery", "1.4.2");
        </script>
        <script type="text/javascript" src="./includes/js/soundmanager/script/soundmanager2-nodebug-jsmin.js"></script>
        
        <?php if(!isset($_GET['embed'])) { ?>
            <style type="text/css">
                #app {
                    
                    box-shadow:0px 10px 50px #7c6515;
                    -webkit-box-shadow:0px 10px 50px #7c6515;
                    -khtml-box-shadow:0px 10px 50px #7c6515;
                    -moz-box-shadow:0px 10px 50px #7c6515;
                    
                }
            </style>
        <?php } ?>
    </head>
    <body>
        
        <div id="app">

            <div id="popup">
                <div id="bg">
                    
                </div>
                
                <div id="popup-content">
                    
                    <div class="description-objet">
                        <div class="brief coll">
                            <div class="fermer">fermer </div>

                            <h2 class="title"></h2>
                            <p></p>
                        </div>

                        <div class="photo"></div>
                        <div class="player play"></div>
                    </div>

                    
                    <div class="embed-app">
                        <div class="fermer">fermer </div>
                        <div class="brief right coll">
                            <h2>Version mobile</h2>
                            <small>Cette version exportable de X pixels par X pixels, est déstinée aux pages à largeur réduite.</small>
                            <textarea cols="30" class="export" rows="4">&lt;a href="<?php echo APP_URL; ?>"&gt;&lt;img src="" alt="RFI: Indépendace Africaines" /&gt;&lt;/a&gt;</textarea>
                        </div>
                        <div class="left coll">
                            <h2>Version large</h2>
                            <small>Cette version exportable de 800 par 600 pixels, permet d'utiliser l'application directement dans la page où elle est intégrée.</small>
                            <textarea cols="30" class="export" rows="4">&lt;object data="<?php echo APP_URL; ?>?embed" type="text/html" width="800" height="600"&gt;&lt;/object&gt;</textarea>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div id="ctrls">
                <?php
                    include("./includes/share.php");
                ?>

                <a href="http://www.rfi.fr/" title="RFI.fr" target="_blank">
                    <img src="./theme/images/RFI-logo.png" alt="RFI" />
                </a>

            </div>
            
        </div>


        <script type="text/javascript" src="./includes/js/Objet.js"></script>
        <script type="text/javascript">
            initObjet( $("#app") );
        </script>
    </body>
</html>