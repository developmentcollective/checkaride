<?php
class LogIndexView extends ApplicationView {

    private $logs;

    public function __construct( $logs ) {
        $this->logs = $logs;
    }

    public function contents (){
        
        

?>
    <table id="logs">
        <tr>
            <th>city</th>
            <th>mobile</th>
            <th>search</th>
            <th>format</th>
            <th>reg</th>
            <th>lat</th>
            <th>long</th>
            <th>result</th>
        </tr>
<?php
        foreach ($this->logs as $log) {
?>
        <tr>
            <td><?php echo $log->city_id ?></td>
            <td><?php echo $log->mobile_number ?></td>
            <td><?php echo $log->search_method ?></td>
            <td><?php echo $log->format ?></td>
            <td><?php echo $log->vehicle_registration_number ?></td>
            <td><?php echo $log->latitude ?></td>
            <td><?php echo $log->longitude ?></td>
            <td><?php echo $log->result ?></td>
        </tr>
<?php
        }
        ?>
    </table>
<?php
    }
}
?>
