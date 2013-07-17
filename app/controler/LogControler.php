<?php

class LogControler extends ApplicationControler{

    public function index(){
        User::ensure_logged_in();
        $logs = Log::get_all();
        $view = new LogIndexView($logs);
        $view->show();
    }

}
?>