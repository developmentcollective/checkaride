<?php
class CabView extends ApplicationView {

    private $cab;
    private $rating;

    public function __construct( $cab, $rating ) {
        $this->cab = $cab;
        $this->rating = $rating;
    }

    public function contents (){

?>
        <div class="result">
            <h1>Good News</h1>
            <h1><?php echo $this->cab->vehicle_registration_number ?> is a registered cab</h1>
            <?php new StarRating("cab", "score", $this->cab->score) ?>

            <p>please also check these details</p>
            <?php echo $this->cab->get_html() ?>
        </div>
        <div class="rate">
            <h2>Rate this cab</h2>


            <form method="post" action="/<?php echo $GLOBALS["route"]->get_route() ?>/ratings">

                <?php new StarRating("rating", "score", 0, true) ?>
                <?php new Input("rating", "email", Rating::EMAIL_MAX_LENGTH, $this->rating->email, Rating::EMAIL_SIZE, $this->get_validation_error_div($this->rating->_validate_errors["email"])) ?>
                <?php new TextArea("rating", "comment", 5, $this->rating->comment, 20, $this->get_validation_error_div($this->rating->_validate_errors["comment"])) ?>
                <div class="form_row">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>

        <div>
            <h2>Ratings</h2>
            <ul class="ratings">
<?php
    $ratings = $this->cab->rating;
    foreach($ratings as $rating){
?>
                <li>
                    <?php new StarRating("rating", "score_" . $rating->id, $rating->score) ?>
                    <div><?php echo $rating->comment ?></div>
                </li>
<?php
    }
?>
            </ul>
        </div>

<?php
    }
}
?>