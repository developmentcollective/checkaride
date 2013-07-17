<?php
class CityView extends ApplicationView {

    private $city;

    public function __construct( $city ) {
        $this->city = $city;
    }

    public function contents (){

?>
    <div id="city_banner">
        <table>
            <tr>
                <td>
                    <img id="" src="<?php echo $this->city->icon_graphic ?>">
                </td>
                <td>
                    <div id="city_heading">
                        <h1><?php echo $this->city->name ?></h1>
<?php
    if ($this->city->text_service){
?>
                        <h2>You can use text to access this service simply text <?php echo $this->city->text_service ?> and the cabs registration number, to check your ride.</h2>
<?php

    }
?>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div id="car_reg_form" >
        <form method="GET" action="/city/<?php echo $this->city->name ?>/cabs">
            <input id="text" name="vehicle_registration_number" type="text" value="<?php echo $car_registration ?>" class="search" style="background-image:url(<?php echo $this->city->license_plate_graphic ?>)" >
            <input type="submit" value="GO" class="submit">
        </form>
    </div>
    
<?php

    }
}
?>
