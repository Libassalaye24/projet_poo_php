<?php
use App\Core\Session;
use App\Repository\PavillonRepository;

$arrayError=[];
  if (Session::KeyExist("arrayError")) {
      $arrayError=Session::getSession("arrayError");
      Session::removeKey("arrayError");
  }

  
    


 ?>
<!-- <div class="container mt-5">
   
    <div class="column shadow p-5 ml-auto mr-auto" style="width: 80%;" >
    <h4 class="">Ajout chambre</h4>

        <div class=" card-center    border" >
            <div class="ml-4 mr-4 mt-4">
                <form action="<?=WEBROOT.'chambre/addChambre'?>" method="POST" class="">
                    <input type="hidden" name="idChambre" value="<?=isset($chamTypePav[0]->id_chambre) ? $chamTypePav[0]->id_chambre : "" ?>">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group" style="width: 95%;">
                              <label for="">Type de chambre</label>
                              <select class="form-select select" name="type_chambre" id="">
                                <option value="<?=isset($chamTypePav[0]->id_type_chambre) ? $chamTypePav[0]->id_type_chambre : "0" ?>"><?=isset($chamTypePav[0]->id_type_chambre) ? ucfirst($chamTypePav[0]->nom_type_chambre) : "Choisir" ?></option>
                                <?php foreach($typeChambres as $type): ?>
                                  <option value="<?=$type->id_type_chambre?>" class="<?=($chamTypePav[0]->id_type_chambre==$type->id_type_chambre) ? 'd-none' : "" ?>" ><?=$type->nom_type_chambre?></option>
                                <?php endforeach; ?>
                                
                              </select>
                              <small id="helpId" class="text-danger"><?=isset($arrayError['type_chambre'])?$arrayError['type_chambre']: ""?></small>
                            </div>                  
                        </div>
                    </div>
                    <div class="row">
                       
                        <div class="col-12">
                            <div class="form-group">
                              <label for="">Numero Etage</label>
                              <input type="text" name="num_etage" value="<?=isset($chamTypePav[0]->num_etage) ? $chamTypePav[0]->num_etage : "" ?>" id="" class="form-control" placeholder="num etage" aria-describedby="helpId"> <br>
                              <small id="helpId" class="text-danger"><?=isset($arrayError['numEtage'])?$arrayError['numEtage']: ""?></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                          <div class="form-group" style="width: 95%;">
                            <label for="">Pavillon(facultatif)</label>
                            <select class="form-select select" name="pavillon" id="">
                              <option value="<?=isset($chamPavillon[0]->id_pavillon) ? $chamPavillon[0]->id_pavillon:"0" ?>"><?=$chamPavillon[0]->id_pavillon?$chamPavillon[0]->nom_pavillon:"Choisir"?></option>
                              <?php foreach($pavillons as $pavillon): ?>
                                <option value="<?=$pavillon->id_pavillon?>" class="<?=($chamPavillon[0]->id_pavillon==$pavillon->id_pavillon) ? 'd-none' : "" ?>" ><?=$pavillon->nom_pavillon?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          
                    </div>
                    <div class="row">
                    <input type="submit" class="fadeIn fourth ml-auto mr-auto w-25" value="<?=isset($idChambre) ? 'Modifier' : "Valider" ?>">
                    </div>
                </form>
            </div>
        </div>
        
   
    </div>
</div>
 -->
 <div class="body">
 <div class="container">
        <form class="form" method="POST" action="<?=WEBROOT.'chambre/addChambre'?>" id="form">
           <input type="hidden" name="idChambre" value="<?=isset($chamTypePav[0]->id_chambre) ? $chamTypePav[0]->id_chambre : "" ?>">
            <!-- <h2>Register With Us</h2> -->
            <h2>Ajout Chambre</h2>
            <div class="form-control">
                <label for="type_chambre">Type Chambre</label>
                  <select name="type_chambre" id="">
                      <option value="<?=isset($chamTypePav[0]->id_type_chambre) ? $chamTypePav[0]->id_type_chambre : "0" ?>"><?=isset($chamTypePav[0]->id_type_chambre) ? ucfirst($chamTypePav[0]->nom_type_chambre) : "Choisir" ?></option>
                      <?php foreach($typeChambres as $type): ?>
                        <option value="<?=$type->id_type_chambre?>" class="<?=($chamTypePav[0]->id_type_chambre==$type->id_type_chambre) ? 'd-none' : "" ?>" ><?=$type->nom_type_chambre?></option>
                      <?php endforeach; ?>
                  </select>
                <small>Error message</small>
                <p style="color: #dc3545;margin-top: 2%;"><?=isset($arrayError['type_chambre'])?$arrayError['type_chambre']: ""?></p>

            </div>
            <div class="form-control">
                <label for="NumEtage">Numero Etage</label>
                <input type="text" id="nbrEtage" class="input" value="<?=isset($chamTypePav[0]->num_etage) ? $chamTypePav[0]->num_etage : "" ?>" name="num_etage" placeholder="Enter Num Etage">
                <small>Error message</small>
                <p style="color: #dc3545;margin-top: 2%;"><?=isset($arrayError['numEtage'])?$arrayError['numEtage']: ""?></p>
            </div>
            <div class="form-control">
                <label for="pavillon">Pavillon (Facultatif)</label>
                    <select name="pavillon" id="">
                    <option value="<?=isset($chamPavillon[0]->id_pavillon) ? $chamPavillon[0]->id_pavillon:"0" ?>"><?=$chamPavillon[0]->id_pavillon?$chamPavillon[0]->nom_pavillon:"Choisir"?></option>
                       <?php foreach($pavillons as $pavillon): ?>
                            <option value="<?=$pavillon->id_pavillon?>" class="<?=($chamPavillon[0]->nom_pavillon==$pavillon->nom_pavillon) ? 'd-none' : "" ?>" ><?=$pavillon->nom_pavillon?></option>
                       <?php endforeach; ?>
                    </select>
                <small>Error message</small>
            </div>
           
            <button name="button" type="submit" >Submit</button>
        </form>
    </div>
</div>