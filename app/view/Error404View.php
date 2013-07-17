<?php
class Error404View extends ApplicationView {

    public function __construct( ) {
        header("HTTP/1.0 404 Not Found");
    }
    public function contents (){
?>
        <div>
            <h1>Page Not Found</h1>
        </div>
<?php
    }
}
?>