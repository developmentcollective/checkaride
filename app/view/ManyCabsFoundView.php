<?php
class ManyCabsFoundView extends ApplicationView {

    private $cabs;

    public function __construct( $cabs ) {
        $this->cabs = $cabs;
    }

    public function contents (){
?>
        <div id="warning"  class="result warning">
            <h1>Bad News</h1>
            <h2>We found more than one mini cab</h2>
            <p>We found <?php echo count($this->cabs) ?> cars with this in the
            licence plate, try again entering more characters</p>
        </div>
<?php
    }
}
?>