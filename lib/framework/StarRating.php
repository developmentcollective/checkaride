<?php

class StarRating {

    public function __construct($model_object, $field, $score, $input=false){
        $field_name = $model_object . "_" . $field;
        $score_as_percent = intval(($score/ 5) * 100);

        if($input){
?>
    <script>
        function on_star_rating_click(pos){
            for (var i=1;i<=5;i++){
                div = document.getElementById("<?php echo $field_name ?>_" + i);
                if(i<=pos)
                    div.className = "star_rating_input_full";
                else
                    div.className = "star_rating_input_blank";
            }
            hidden_field = document.getElementById("<?php echo $field_name ?>");
            hidden_field.value = pos;
        }
    </script>
    <div id="<?php echo $field_name ?>_rating_outer_container" class="star_rating_outer_container">
        <div id="<?php echo $field_name ?>_rating_container" class="star_rating_container">
            <div id="<?php echo $field_name ?>_1" class="star_rating_input_blank" onclick="on_star_rating_click(1)"></div>
            <div id="<?php echo $field_name ?>_2" class="star_rating_input_blank" onclick="on_star_rating_click(2)"></div>
            <div id="<?php echo $field_name ?>_3" class="star_rating_input_blank" onclick="on_star_rating_click(3)"></div>
            <div id="<?php echo $field_name ?>_4" class="star_rating_input_blank" onclick="on_star_rating_click(4)"></div>
            <div id="<?php echo $field_name ?>_5" class="star_rating_input_blank" onclick="on_star_rating_click(5)"></div>
        </div>
    </div>
    <?php new Hidden($model_object, $field, $score) ?>

<?php
        }
        else{
?>
    <div id="<?php echo $field_name ?>_rating_outer_container" class="star_rating_outer_container">
        <div id="<?php echo $field_name ?>_rating_container" class="star_rating_container">
            <div id="<?php echo $field_name ?>_rating"
                class="star_rating"
                style="width:<?php echo $score_as_percent ?>%">
            </div>
        </div>
        <div><?php echo number_format($score, 1) ?></div>
    </div>
<?php
        }
    }
}
?>