<?php
class NoCabsFoundView extends ApplicationView {

    public function contents (){
?>
    <div id="warning"  class="result warning">
        <h1>Bad News</h1>
        <p>This does not look like a licenced cab. Be careful.</p>
    </div>
<?php
    }
}
?>