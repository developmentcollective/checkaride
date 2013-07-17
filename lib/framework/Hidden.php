<?php

class Hidden {

	public function __construct($model_object, $field, $value ){
	
		$field_name = $model_object . "_" . $field;
		$pretty_field_name = str_replace("_", " ", $field);
?>
            <input id="<?php echo $field_name ?>"
                    type="hidden"
                    name="<?php echo $model_object ?>[<?php echo $field?>]"
                    value="<?php echo $value ?>" />
<?php		
	}
}
?>