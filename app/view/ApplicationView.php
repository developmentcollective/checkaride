<?php

class ApplicationView extends FoundationView {

	const TITLE = "Check A Ride";
	const CREATORS = "The Development Collective";
	
	public function header (){
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
            <meta HTTP-EQUIV="Content-Type" Content="text/html; charset=Windows-1252">
	    <meta name="description" content="Get home fast and in safety. Before getting into that mini cab, make sure its licensed with TFL.">
	    <meta name="keywords" content="taxi, minicab, london, saftey, night, cabbie, ride, taxi rides">
            <meta name="google-site-verification" content="5aAOWgl7F7BBP25zdeITsc32EBgCGmLkx8RTS-oRtRI" />
	    <title><?php echo APPLICATION_NAME ?> by the development collective</title>
            <link rel="stylesheet" type="text/css" href="/style/style.css">
            <script>
function do_onload(){
    var input = document.getElementById("text");
    text.focus();
}
            </script>
	</head>
        <body onload="do_onload();">
        <div id="contents">
            <div id="banner">
                <a href="/">
                    <img id="logo" src="/images/logo.jpg"/>
                    <img id="cab_logo" src="/images/cab.jpg"/>
                    <a href="http://itunes.apple.com/app/check-a-ride/id402439756?mt=8"><img id="apple_store" align="right" src="/images/app_store.png"></a>
                </a>
            </div>

            <div id="strap">
                <p id="text">
                    Get home fast and in safety. Before getting into that cab, make
                    sure its licensed. We can check your rides the registration number and findout if your cabbie is legit.
                    Please see our <a href="/site/terms_and_conditions">terms and conditions</a> for more information.
                </p>
                
            </div>
<?php
    }
	public function contents (){
?>
<?php
	}	
	public function footer (){
?>
            <div id="lower_banner">
                <div id="call_to_action_container">
                    <img id="call_to_action" src="/images/checkaride_fb_profile.png"><br/>

                    <a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="simondelliott">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
                    &nbsp;
                    <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="http://checkaride.com"></fb:like>
                </div>
                <div id="share">
                    <p>
                        <strong>unlicensed cabs are dangerous</strong> <br/>
                        In London alone, recent statistics show that 11 women are attacked each month after taking an unlicensed minicab and that 80% of stranger rapes are committed by unlicensed cab drivers.
                    </p>
                    <p>
                        <strong>unlicensed cabs are uninsured</strong> <br/>
                        If you are travelling in an unlicensed minicab, you may not be insured.
                    </p>
                    <p>
                         Get home safe > always book your cab and when it arrives check that its licensed with checkaride.
                    </p>
                </div>
            </div>
            <div id="footer">
                    created by the <a href="http://www.developmentcollective.com">development collective</a>
            </div>
        </div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-4534332-8']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
    </body>

</html>
<?php
    }
    public function show (){
        $this->header();
        $this->contents();
        $this->footer();
    }
}
?>
