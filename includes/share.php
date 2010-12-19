<?php
    define("DOC_URL"  , "http://owni.fr/2010/06/11/hadopi-les-paris-sont-lances/");
    define("DOC_TITLE", "OWNI, Digital Journalist");
?>
<style type="text/css">

    
    .sharing .inputEmbed span {
        color:white;
        font-weight:bold;
        text-decoration:underline;
        cursor:pointer;
    }

    .sharing a, .sharing .share{
       font-size:12px;
       color:gray;
       text-decoration:none;
       float:right;
       margin-right:5px;
    }

    .sharing .bg-white {
        background:white;
        padding:1px 2px;
        padding-bottom:0px;
        border:1px solid gray;
        margin-top:-1px;
        height:17px;
    }

    .sharing .share.twitter {  }
    .sharing a img{ border:0px; }
    
</style>

<div class="sharing">
    
    <a class="share mini-embed bg-white " href="#" onclick="showEmbed()">
        &lt;intégrer&gt;
    </a>

    <a class="share mini-share-mail bg-white" 
       target="_blank"
       href='http://www.addtoany.com/email?linkurl=<?php echo  rawurlencode(DOC_URL);  ?>&linkname=<?php echo   rawurlencode(DOC_TITLE);  ?>&t=<?php echo rawurldecode(DOC_TITLE); ?>'>
        <img alt="share mail" src="./theme/images/mini-email.png" /> email
    </a>

    <a  class="share facebook"
        name="fb_share"
        type="button_count"
        share_url="<?php echo DOC_URL;  ?>"
        href="http://www.facebook.com/sharer.php">
        Partager
    </a>
    <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>


    <!--div class="share">
        <div id="fblikehome" >
            <script type="text/javascript" src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php/fr_FR"></script>
            <script type="text/javascript">FB.init("2725117df67e250b205434cbbd61d918");</script>
            <fb:fan profile_id="67334499441" stream="0" connections="0" logobar="0" width="300" css=""></fb:fan>
        </div>
    </div-->

    <span class="share twitter bg-white">
        <iframe width="90"
                scrolling="no"
                height="20"
                frameborder="0"
                src="http://api.tweetmeme.com/button.js?url=<?php echo rawurlencode(DOC_URL); ?>&amp;style=compact&amp;hashtags=RFI">
        </iframe>
    </span>
    
</div>