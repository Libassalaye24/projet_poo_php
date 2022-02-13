<?php
use App\Core\Session;
use App\Repository\PavillonRepository;

$arrayError=[];
  if (Session::KeyExist("arrayError")) {
      $arrayError=Session::getSession("arrayError");
      Session::removeKey("arrayError");
  }
  foreach ($chambres as $chambre) {
    $idChambre=$chambre->id_chambre;
    $numEtage=$chambre->num_etage;
    $typeChambre=$chambre->type_chambre;
    $idPavillon=$chambre->id_pavillon;
    $nomPavillon=$chambre->nom_pavillon;
  }   

 ?>
<div class="container mt-5">
    <div class="row ml-auto mr-auto" style="width: 80%;">
        <div class="col-md-6">
          <h4 class="">Add chambre</h4>
        </div>
        <div class="col-md-6">
            <a href="<?=WEBROOT.'chambre/showChambre'?>" class="lcm" style="text-decoration: none;color:#152032">Liste des chambres</a>
        </div>
    </div>
    
    <div class="column shadow p-3" >
        <div class=" card-center border border-secondary  ml-auto mr-auto">
            <div class="ml-4 mr-4 mt-4">
                <form action="<?=WEBROOT.'chambre/addChambre'?>" method="POST" class="">
                    <input type="hidden" name="idChambre" value="<?=isset($idChambre) ? $idChambre : "" ?>">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                              <label for="">Type de chambre</label>
                              <select class="form-control" name="type_chambre" id="">
                                <option value="<?=isset($typeChambre) ? $typeChambre : "0" ?>"><?=isset($typeChambre) ? ucfirst($typeChambre) : "Choisir" ?></option>
                                <option value="double" class="<?=($typeChambre=='double') ? 'd-none' : "" ?>" >Double</option>
                                <option value="perso"  class="<?=($typeChambre=='perso') ? 'd-none' : "" ?>" >Perso</option>
                              </select>
                              <small id="helpId" class="text-danger"><?=isset($arrayError['type_chambre'])?$arrayError['type_chambre']: ""?></small>
                            </div>                  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                              <label for="">Pavillon</label>
                              <select class="form-control" name="pavillon" id="">
                              <option value="<?=isset($idPavillon) ? $idPavillon : "0" ?>"><?=isset($nomPavillon) ? ucfirst($nomPavillon) : "Choisir" ?></option>
                                    <?php foreach ($pavillons as $pavillon): ?>
                                      <option value="<?=$pavillon->id_pavillon;?>" class="<?=($nomPavillon==$pavillon->nom_pavillon) ? 'd-none' : "" ?>" ><?=$pavillon->nom_pavillon;?></option>
                                    <?php endforeach; ?>
                              </select>
                              <small id="helpId" class="text-danger"><?=isset($arrayError['pavillon'])?$arrayError['pavillon']: ""?></small>
                            </div>                 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Numero Etage</label>
                              <input type="text" name="num_etage" value="<?=isset($numEtage) ? $numEtage : "" ?>" id="" class="form-control" placeholder="num etage" aria-describedby="helpId">
                              <small id="helpId" class="text-danger"><?=isset($arrayError['numEtage'])?$arrayError['numEtage']: ""?></small>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn  mb-3" style="background-color:#152032;color:#fff;" name="btn"><?=isset($idChambre) ? 'Modifier' : "Valider" ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
