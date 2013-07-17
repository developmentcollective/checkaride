<?php
class CabIndexView extends ApplicationView {

    private $cabs;

    public function __construct( $cabs ) {
        $this->cabs = $cabs;
    }

    public function contents (){



        if (empty($this->cabs)){
?>
                <div id="warning"  class="result warning">
                    <h1>Bad News</h1>
                    <p>This does not look like a licenced London mini cab. Be careful.</p>
                </div>
<?php
    }
        else if(count($this->cabs)>1){
?>
                <div id="warning"  class="result warning">
                    <h1>Bad News</h1>
                    <h2>We found more than one mini cab</h2>
                    <p>We found <?php echo count($this->cabs) ?> cars with this in the
                    licence plate, try again entering more characters</p>
                </div>
<?php

        }
        else{
            $cab =  array_pop($this->cabs);

            //var_dump($this->cabs);
?>
                <div class="result">
                    <h1>Good News</h1>
                    <h1><?php echo $cab->vehicle_registration_number ?> is a registered cab</h1>
                    <p>please also check these details</p>
                    <?php echo $cab->get_html() ?>
                </div>
<?php
        }
    }
}
?>