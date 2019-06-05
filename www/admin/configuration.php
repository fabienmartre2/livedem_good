<div id="localisation"> > Configuration</div>

<?php

$datas = array('youtube', 'facebook', 'twitter', 'duree_vote', 'duree_debat', 'duree_soutien', 'pourcentage_soutien', 'paypal',
                'meta_titre_prop', 'meta_desc_prop', 'meta_titre_prop2', 'meta_desc_prop2', 'meta_titre_prop3', 'meta_desc_prop3', 'meta_titre_prop4', 'meta_desc_prop4');

if (isset($_POST['submit'])){
	foreach($datas as $data){
        Config::set($data, $_POST[$data]);
	}
	echo "<div class=\"success\">La configuration a bien été mise à jour.</div>";
}

?>

<form method="post" id="fomulaire" action="<?php echo $_SERVER['REQUEST_URI']; ?>" >
<table class="responsive table table-bordered">
    <tr>
        <td>Youtube</td>
        <td style="text-align:left;"><input type="text" style="width:350px;" name="youtube" value="<?php echo Config::get('youtube'); ?>" /></td>
    </tr>
    <tr>
        <td>Facebook</td>
        <td style="text-align:left;"><input type="text" style="width:350px;" name="facebook" value="<?php echo Config::get('facebook'); ?>" /></td>
    </tr>
    <tr>
        <td>Twitter</td>
        <td style="text-align:left;"><input type="text" style="width:350px;" name="twitter" value="<?php echo Config::get('twitter'); ?>" /></td>
    </tr>
    <tr>
        <td>Durée pour soutenir</td>
        <td style="text-align:left;"><input type="text" style="width:80px;" name="duree_soutien" value="<?php echo Config::get('duree_soutien'); ?>" /> semaines</td>
    </tr>
    <tr>
        <td>Durée pour débattre</td>
        <td style="text-align:left;"><input type="text" style="width:80px;" name="duree_debat" value="<?php echo Config::get('duree_debat'); ?>" /> semaines</td>
    </tr>
    <tr>
        <td>Durée pour voter</td>
        <td style="text-align:left;"><input type="text" style="width:80px;" name="duree_vote" value="<?php echo Config::get('duree_vote'); ?>" /> semaines</td>
    </tr>
    <tr>
        <td>% de soutien pour valider</td>
        <td style="text-align:left;"><input type="text" style="width:80px;" name="pourcentage_soutien" value="<?php echo Config::get('pourcentage_soutien'); ?>" /> %</td>
    </tr>
    <tr>
        <td>Adresse Paypal</td>
        <td style="text-align:left;"><input type="text" style="width:350px;" name="paypal" value="<?php echo Config::get('paypal'); ?>" /></td>
    </tr>
    <tr>
        <td style="height:10px;"></td>
        <td></td>
    </tr>
    <tr>
        <td>Meta Titre "Proposition"</td>
        <td style="text-align:left;"><input type="text" style="width:350px;" name="meta_titre_prop2" value="<?php echo Config::get('meta_titre_prop2'); ?>" /></td>
    </tr>
    <tr>
        <td>Meta Description "Proposition"</td>
        <td style="text-align:left;"><input type="text" style="width:350px;" name="meta_desc_prop2" value="<?php echo Config::get('meta_desc_prop2'); ?>" /></td>
    </tr>
    <tr>
        <td>Meta Titre "Débat"</td>
        <td style="text-align:left;"><input type="text" style="width:350px;" name="meta_titre_prop3" value="<?php echo Config::get('meta_titre_prop3'); ?>" /></td>
    </tr>
    <tr>
        <td>Meta Description "Débat"</td>
        <td style="text-align:left;"><input type="text" style="width:350px;" name="meta_desc_prop3" value="<?php echo Config::get('meta_desc_prop3'); ?>" /></td>
    </tr>
    <tr>
        <td>Meta Titre "Vote"</td>
        <td style="text-align:left;"><input type="text" style="width:350px;" name="meta_titre_prop4" value="<?php echo Config::get('meta_titre_prop4'); ?>" /></td>
    </tr>
    <tr>
        <td>Meta Description "Vote"</td>
        <td style="text-align:left;"><input type="text" style="width:350px;" name="meta_desc_prop4" value="<?php echo Config::get('meta_desc_prop4'); ?>" /></td>
    </tr>
    <tr>
        <td>Meta Titre "Fin de proposition"</td>
        <td style="text-align:left;"><input type="text" style="width:350px;" name="meta_titre_prop" value="<?php echo Config::get('meta_titre_prop'); ?>" /></td>
    </tr>
    <tr>
        <td>Meta Description "Fin de proposition"</td>
        <td style="text-align:left;"><input type="text" style="width:350px;" name="meta_desc_prop" value="<?php echo Config::get('meta_desc_prop'); ?>" /></td>
    </tr>
    <tr>
        <td style="height:10px;"></td>
        <td></td>
    </tr>
</table>


<div style="text-align:center;margin:5px"><input type="submit" name="submit" value="Enregistrer" /></div>
</form>
