<?php

class RatingControler extends ApplicationControler{

    public function save(){

        $city = City::find_by_name($this->params["city_name"]);
        if (is_null($city)){
            $view = new CityNotCovered();
            $view->show();
            exit();
        }

        $cabs = Cab::find_by_registration($city->id, $this->params["reg"]);
        if (is_null($cabs)){
            $view = new Error404View();
            $view->show();
            exit();
        }


        $cab = array_pop($cabs);
        $rating = new Rating($_REQUEST["rating"]);
        $rating->cab_id = $cab->id;

        if ($rating->save()){
            //cab score is (SC+R)/(C+1)
            $rating_count = intval($cab->rating_count);
            $score = floatval($cab->score);
            $cab->score = (($score * $rating_count) + $rating->score) / ($rating_count +1);
            $cab->rating_count = $rating_count + 1;
            $cab->save();

            $this->redirect_to("/city/" . str_replace(" ", "%20", $city->name) . "/cabs/$cab->vehicle_registration_number");
        }
        else{
            $view = new CabView($cab, $rating);
            $view->show();
        }
    }
}
?>