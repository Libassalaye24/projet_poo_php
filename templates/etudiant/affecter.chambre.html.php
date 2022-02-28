<?php //var_dump($id[1]); die;
use App\Core\Session;
$arrayError=[];
  if (Session::KeyExist("arrayError")) {
      $arrayError=Session::getSession("arrayError");
      Session::removeKey("arrayError");
  }
 ?>
<div class="body">
 <div class="container">
        <form class="form" method="POST" action="<?=WEBROOT.'etudiant/affecterChambre'?>" id="form">
           <input type="hidden" name="idEtudiant" value="<?=(int)$id[1];?>">
            <!-- <h2>Register With Us</h2> -->
            <h2>Affecte Chambre</h2>
            <div class="form-control" >
                <label for="Chambre">Chambre</label>
                    <select name="idChambre" id="Chambre">
                         <option value="0">Choisir</option>
                       <?php foreach($chambres as $chambre): ?>
                         <option value="<?=$chambre->id_chambre?>"><?="Num: ".$chambre->num_chambre?><?=" Type: ".$chambre->nom_type_chambre?><?=" ".ucfirst($chambre->nom_pavillon)?></option>
                       <?php endforeach; ?>
                    </select>
                <p style="color: #dc3545;margin-top: 2%;"><?=isset($arrayError['chambre'])?$arrayError['chambre']: ""?></p>
                <small>Error message</small>
            </div>
            <button name="button" type="submit" >Submit</button>
        </form>
    </div>
</div>
