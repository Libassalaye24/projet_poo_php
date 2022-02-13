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
        <h4 class="card-title">Title</h4>
        <p class="card-text">Text</p>
        <form action="<?=WEBROOT.'pavillon/addPavillon'?>" method="POST">
            <input type="hidden" name="controller" value="pavillon">
            <input type="hidden" name="idPavillon" value="<?=isset($idPavillon) ? $idPavillon : "" ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Nom Pavillon</label>
                      <input type="text" name="nom_pavillon" id="" class="form-control" value="<?=isset($nomPavillon) ? $nomPavillon : "" ?>">
                      <small id="helpId" class="text-danger"><?=isset($arrayError['nom_pavillon'])?$arrayError['nom_pavillon']: ""?></small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Nombre Etage</label>
                      <input type="text" name="nbr_etage" id="" value="<?=isset($nbrEtage) ? $nbrEtage : "" ?>" class="form-control" placeholder="" aria-describedby="helpId">
                      <small id="helpId" class="text-danger"><?=isset($arrayError['nbr_etage'])?$arrayError['nbr_etage']: ""?></small>
                    </div>
                </div>
            </div>
            <div class="row ">
                <button type="submit" name="btn" class="btn  w-50 ml-auto mr-auto" style="background-color: #152032;color:#fff"><?=isset($idPavillon) ? 'Modifier' : "Valider" ?></button>
            </div>
        </form>
    </div>
    </div>
</div>
</div>