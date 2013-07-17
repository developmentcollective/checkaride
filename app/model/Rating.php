<?php

class Rating extends FoundationModel {

    public $id;
    public $cab_id;
    public $email;
    public $score;
    public $comment;

    const EMAIL_MAX_LENGTH = 50;
    const EMAIL_MIN_LENGTH = 4;
    const EMAIL_SIZE = 30;

    const COMMENT_MAX_LENGTH = 250;
    const COMMENT_MIN_LENGTH = 0;
    const COMMENT_SIZE = 30;

    public function validate (){
        $ret = true;

        //clear the validation errors
        $this->_validate_errors = array();

        //email
        $ret &= $this->validate_length_of( "email", array("less_than" => Rating::EMAIL_MAX_LENGTH) );
        $ret &= $this->validate_length_of( "email", array("greater_than" => Rating::EMAIL_MIN_LENGTH) );
        $ret &= $this->validate_pattern( "email","/^[A-Z0-9._%-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i","Must be a valid email address");

        //rating
        $ret &= $this->validate_in_range("score", 0, 5);

        return $ret;
    }

    public static function find_by_cab_id($obj){
         return get_result_set_for_model_object(__CLASS__, $obj);
    }


}

?>
