<?php
use App\Core\Session;
$arrayError=[];

  if (Session::KeyExist("arrayError")) {
      $arrayError=Session::getSession("arrayError");
      Session::removeKey("arrayError");
  }
  if (Session::KeyExist('successInsert')) {
    $successInsert=Session::getSession('successInsert');
    Session::removeKey('successInsert');
  }
  if (Session::KeyExist('ok')) {
    $post=Session::getSession('ok');
    Session::removeKey('ok');
  }
  foreach ($pavillons as $pavillon) {
      $idPavillon=$pavillon->id_pavillon;
      $nomPavillon=$pavillon->nom_pavillon;
      $nbrEtage=$pavillon->nbr_etage;
  }
 ?>
<div class="container mt-5">
<h4>Add Pavillon</h4>
<div class="card  shadow p-3">
    <?php if(isset($successInsert[0])): ?>
    <div class="alert alert-success" role="alert">
        <div class="row">
            <div class="col-md-6">
                 <strong><?=$successInsert[0];?></strong>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="border border-secondary">
    <div class="card-body ">
        <h4 class="card-title"> Ajout Pavillon</h4>
        <form action="<?=WEBROOT.'pavillon/addPavillon'?>" method="POST">
            <input type="hidden" name="controller" value="pavillon">
            <input type="hidden" name="idPavillon" value="<?=isset($idPavillon) ? $idPavillon : "" ?>">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                      <label for="">Nom Pavillon</label> 
                      <input type="text" name="nom_pavillon" id="" class="form-control" value="<?=isset($nomPavillon) ? $nomPavillon : "" ?><?= isset($post['nom_pavillon']) ? $post['nom_pavillon'] : "" ?>">
                      <small id="helpId" class="text-danger"><?=isset($arrayError['nom_pavillon'])?$arrayError['nom_pavillon']: ""?></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                      <label for="">Nombre Etage</label>
                      <input type="text" name="nbr_etage" id="" value="<?=isset($nbrEtage) ? $nbrEtage : "" ?><?= isset($post['nbr_etage']) ? $post['nbr_etage'] : "" ?>" class="form-control" placeholder="" aria-describedby="helpId">
                      <small id="helpId" class="text-danger"><?=isset($arrayError['nbr_etage'])?$arrayError['nbr_etage']: ""?></small>
                    </div>
                </div>
            </div>
           
            
            <div class="row">
               <label for="">Selectionnez des chambres(Facultatif)</label><?php $i=0; ?>
                <?php foreach($chambres as $chambre): ?>
                    <?php $i++; ?>
               <div class="col-md-3">
                   <div class="form-check form-check-inline">
                       <label class="form-check-label">
                           <input class="form-check-input" type="checkbox" name="<?='chambre'.$i?>" id="" value="<?=$chambre->id_chambre?>"> <?=$chambre->num_chambre?>
                       </label>
                   </div>
               </div>
               
            </div>
            <?php endforeach ?>
            <div class="row mt-4">
                <button type="submit" name="btn_valider" class="btn  w-25 ml-auto mr-auto" style="background-color: #152032;color:#fff"><?=isset($idPavillon) ? 'Modifier' : "Valider" ?></button>
            </div>
        </form>
    </div>
    </div>
</div>
</div>