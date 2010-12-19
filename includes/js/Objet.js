var canChange = true;
// variable globale: tableau d'Objet'
var objets = new Array();
var objetActif = -1;
var page = 0;


    // sound manager, pour jouer des sons

    soundManager.url = 'includes/js/soundmanager/swf/'; // directory where SM2 .SWFs live

    // Experimental HTML5 audio support (force-enabled for iPad), flash-free sound for Safari + Chrome. Enable if you want to try it!
    // soundManager.useHTML5Audio = true;

    // do this to skip flash block handling for now. See the flashblock demo when you want to start getting fancy.
    soundManager.useFlashBlock = false;



function Objet(nom_objet, texte, credits, adresse_image, position_image, adresse_son) {

    this.index = null;
    this.nom_objet = nom_objet;
    this.texte = texte;
    this.credits = credits;
    this.adresse_image = adresse_image;
    this.position_image = position_image;
    this.adresse_son = adresse_son;

    this.append = function (workspace, index) {

        this.index = index;

        // le "togglers" contient l'ensemble des toggler(s)'
        if( $(".togglers", $(workspace) ).length == 0 )
             // on le créé dans le workspace s'il n'existe pas déjà
             $(workspace).html("<div class='togglers'></div>" + $(workspace).html() );

        // ce contener ne doit pas prendre de place
        $(".togglers", $(workspace) ).css({
            height:0,
            width:0
        });

        // on insère le toggler dans le togglers...

        $(".togglers", $(workspace) ).append("<div id='objet_"+index+"' class='toggleObjet'><img class='objet' src='./media/img/toggle_" + this.adresse_image + "' /></div>");

        // on place le toggler sur le worspace
        if(this.position_image != "") {
            var x=this.position_image.split("x")[0]+"px";
            var y=this.position_image.split("x")[1]+"px";

            $("#objet_"+index).css({
                left:x,
                top:y
            });
        }
        
    }
}

function isIE() {
    return navigator.appName.indexOf("Internet Explorer") > -1;
}

function initObjet(workspace) {
    isIE();
    $.ajax({
            url: "./xhr/getGooSpreadsheet.php",
            success: function(json) {
                // évalue la chaine reçu comme un objet JSON
                json = eval('('+ json +')');

                // pour chaque item du tableau, le convertie en objet Scandale
                for(var i in json.data)
                    objets.push( new Objet( json.data[i].nom_objet,
                                                  json.data[i].texte,
                                                  json.data[i].credits,
                                                  json.data[i].adresse_image,
                                                  json.data[i].position_image,
                                                  json.data[i].adresse_son) );

                
                // on place et dessinne les scandales sur le workspace
                for(var j in objets)
                    objets[j].append(workspace, j);


                // on met les évent
                
                $(".toggleObjet").hover(function () {

                    if( ! $("#app").hasClass("shady") ) {
                        if(isIE())
                            $("img", this).css({visibility: "visible"});
                        else {
                            $("img", this).css({opacity:0,visibility: "visible"});
                            $("img", this).animate({opacity:1},400);
                        }
                    }
                } , function () {

                    if(isIE())
                        $("img", this).css({visibility: "hidden"});
                    else {
                        $("img", this).animate({opacity:0},400, function () {
                            $("img", this).css({visibility: "hidden"});
                        });
                    }
                
                });

                $(".toggleObjet").click(function () {

                    objetActif = $(this).attr("id").replace("objet_", "");
                    page = 0;
                    showObjet();

                });

                $("#bg").click(function () {
                    $("#popup").fadeOut(400);
                    $("#app").removeClass("shady");
                    soundManager.stop('description_'+objetActif);
                });

                $("#popup .fermer").click(function () {
                    $("#popup").fadeOut(400);
                    $("#app").removeClass("shady");
                    soundManager.stop('description_'+objetActif);
                });

                $("#popup .player").click(function () {
                    if( $(this).hasClass("pause") ) {
                        soundManager.pause('description_'+objetActif);
                        $(this).removeClass("pause");
                     } else {
                        soundManager.play('description_'+objetActif);
                        $(this).addClass("pause");
                     }
                });

                $('textarea.export').click(function () { $(this).select(); });
            }
    });
}

function showObjet() {

    // affiche la popup
    $("#app").addClass("shady");
    $("#popup").stop().fadeIn(400);
    
    $("#popup .embed-app").hide();
    $("#popup .description-objet").show();

    // rempli les champs
    $("#popup .title").html(objets[objetActif].nom_objet);
    $("#popup .brief p").html(objets[objetActif].texte);
    $("#popup .photo").html("<img src='./media/img/" + objets[objetActif].adresse_image + "' alt='' />");
    $("#popup .player").html(objets[objetActif].credits);

    if( objets[objetActif].adresse_son != "") {
        
        $("#popup .player").show().addClass("pause");
        soundManager.createSound({
          id: 'description_'+objetActif,
          url: './media/son/'+objets[objetActif].adresse_son,
          autoLoad: true,
          autoPlay: true,
          volume: 500,
          onload: function () {
            soundManager.play('description_'+objetActif);
          }
        });
        soundManager.play('description_'+objetActif);
        
        
    } else {
        $("#popup .player").hide();        
    }
}


function showEmbed() {

    // affiche la popup
    $("#app").addClass("shady");
    $("#popup").stop().fadeIn(400);

    // stop eventuellement le son
    soundManager.stop('description_'+objetActif);

    $("#popup .embed-app").show();
    $("#popup .description-objet").hide();
    
}

