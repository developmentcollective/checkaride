<?php

class AdminView extends ApplicationView {

	private $user;
	
	public function __construct( $user_to_show = NULL ) {
		$this->user = $user_to_show;
	}	
	
	public function contents (){
?>
        <h1>Welcome <?php echo $this->user->username ?></h1>
        <div>
                <a href="/log/index"  class="admin_button">view log</a>
        </div>
        <h2>SETTINGS</h2>
        <div>
                Settings &gt; db_schema_version = <?echo Setting::get("db_schema_version") ?><br/>
        </div>
        <h2>CONSTANTS</h2>
        <div>
                <div>_DB_SCHEMA_VERSION=<?echo _DB_SCHEMA_VERSION ?></div>
                <div>_DB_NAME=<?echo _DB_NAME ?></div>
                <div>_DB_SERVER=<?echo _DB_SERVER ?></div>
                <div>_DB_USER=<?echo _DB_USER ?></div>
                <div>_DB_PASS=<?echo _DB_PASS ?></div>
                <div>_DEFAULT_TIMEOUT=<?echo _DEFAULT_TIMEOUT ?></div>
                <div>_SESSION_NAME=<?echo _SESSION_NAME ?></div>
        </div>
<?php
	}	
}
?>
