<h1>Members</h1>

<?php
    $url = 'http://sfmreport.api/api/v1/members/';
    $json = file_get_contents($url);
    $data = json_decode($json, TRUE);
    //$data = $data['member'];
?>
<pre>
<?php print_r($data); ?>
</pre>
