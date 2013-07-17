<?php
    header ("Content-Type:text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>";
?>
<checkmyride>
<?php
    if (empty($cars)){
?>
    <result>
        <title>Bad News</title>
        <description>
<?php echo $car_registration?> does not appear to be a legit minicab.
Please text CAB to 60835 to get 2 mini and 1 black cab tel numbers from Cabwise (costs 35p).
Be careful out there!
        </description>
    </result>
<?php
    }
    else if(count($cars)>1){
?>
    <result>
        <title>Bad News</title>
        <description>
We found <?php echo count($cars) ?> minicabs with this text in the licence plate.

Enter more characters from the licence plate and try again.
        </description>
    </result>
<?php

    }
    else{
?>
    <result>
        <title>Good News</title>
        <description>
Your ride (reg <?php echo html_entity_decode($cars[0]->reg); ?>) is a TFL registered London minicab.

It is a <?php echo html_entity_decode($cars[0]->make); ?> <?php echo html_entity_decode($cars[0]->model); ?>.

Check the make and model before taking the minicab.
        </description>
    </result>
<?php
    }
?>
</checkmyride>
