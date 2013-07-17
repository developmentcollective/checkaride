<?php

class SiteControler extends ApplicationControler{

    public function terms_and_conditions(){
        $view = new TermsAndConditionsView();
        $view->show();
    }

}
?>

