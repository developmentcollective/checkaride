<?php
class CityIndexView extends ApplicationView {

    private $cities;

    public function __construct( $cities ) {
        $this->cities = $cities;
    }

    public function contents (){
?>
    <table id="cities">
        <tr>
<?php
        foreach ($this->cities as $city) {
?>
            <td>
    <a href="/city/<?php echo $city->name ?>">
        <div class="city">
            <div class="city_icon">
                <img id="" src="<?php echo $city->icon_graphic ?>">
            </div>
            <div class="city_details">
                <?php echo $city->name ?>
            </div>
        </div>
    </a>
                </td>
<?php
        }
        ?>
        </tr>
    </table>
<?php
    }
}
?>
