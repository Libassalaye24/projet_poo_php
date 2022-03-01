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
 /*  foreach ($pavillons as $pavillon) {
      $idPavillon=$pavillon->id_pavillon;
      $nomPavillon=$pavillon->nom_pavillon;
      $nbrEtage=$pavillon->nbr_etage;
  } */
 ?>
 <!-- 
<div class="container mt-5 ">
<div class="card  shadow p-5 ml-auto mr-auto" style="width: 80%;"">
<h4 class="card-title"> Ajout Pavillon</h4>
    <?php if(isset($successInsert[0])): ?>
    <div class="alert alert-success" role="alert">
        <div class="row">
            <div class="col-md-6">
                 <strong><?=$successInsert[0];?></strong>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="border ">
    <div class="card-body ">
        
        <form action="<?=WEBROOT.'pavillon/addPavillon'?>" method="POST">
            <input type="hidden" name="controller" value="pavillon">
            <input type="hidden" name="idPavillon" value="">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                      <label for="">Nom Pavillon</label> 
                      <input type="text" name="nom_pavillon" id="" class="form-control" value="<?= isset($post['nom_pavillon']) ? $post['nom_pavillon'] : "" ?>"> <br>
                      <small id="helpId" class="text-danger"><?=isset($arrayError['nom_pavillon'])?$arrayError['nom_pavillon']: ""?></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                      <label for="">Nombre Etage</label>
                      <input type="text" name="nbr_etage" id="" value="<?= isset($post['nbr_etage']) ? $post['nbr_etage'] : "" ?>" class="form-control" placeholder="" aria-describedby="helpId"> <br>
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
                           <input class="form-check-input" type="checkbox" name="chambre[]" id="" value="<?=$chambre->id_chambre?>"> <?=$chambre->num_chambre?>
                       </label>
                   </div>
               </div>
                <?php endforeach ?>
            </div>
           
            <div class="row mt-4">
                 <input type="submit" class="fadeIn fourth ml-auto mr-auto w-25" value="<?=isset($idPavillon) ? 'Modifier' : "Valider" ?>">
           </div>
        </form>
    </div>
    </div>
</div>
</div>
 -->
<div class="body">
 <div class="container">
        <form class="form" method="POST" action="<?=WEBROOT.'pavillon/addPavillon'?>" id="form">
                <input type="hidden" name="idPavillon" value="<?=isset($pavillons[0]->id_pavillon) ? $pavillons[0]->id_pavillon : "0" ?>">
            <!-- <h2>Register With Us</h2> -->
            <h2><?=isset($pavillons[0]->id_pavillon) ? "Modifier" : "Ajout"?> Pavillon</h2>
                <div class="form-control">
                    <label for="nomPavillon">Nom Pavillon</label>
                    <input type="text" id="nomPavillon" class="input" value="<?=isset($pavillons[0]->nom_pavillon) ? $pavillons[0]->nom_pavillon : "" ?>" name="nom_pavillon" placeholder="Enter Nom Pavillon">
                    <small>Error message</small>
                    <p style="color: #dc3545;margin-top: 2%;"><?=isset($arrayError['nom_pavillon'])?$arrayError['nom_pavillon']: ""?></p>
                </div>
                <div class="form-control" >
                    <label for="nbrEtage">Nbr Etage</label>
                    <input type="text" id="nbrEtage" class="input" value="<?=isset($pavillons[0]->nbr_etage) ? $pavillons[0]->nbr_etage : "" ?>" name="nbr_etage" placeholder="Enter Nbr Etage">
                    <small>Error message</small>
                    <p style="color: #dc3545;margin-top: 2%;"><?=isset($arrayError['nbr_etage'])?$arrayError['nbr_etage']: ""?></p>
                </div>
            <div class="form-control" >
                <label for="radio">Chambre(facultatif)</label>
                    <select onclick="handleClick(this);" name="select" id="choice">
                         <option value="0">Choisir</option>
                         <option value="affecter">Affecter</option>
                         <option value="creer">Creer un chambre</option>
                    </select>
                <small>Error message</small>
            </div>
            <div class="checkbox" id="affecter" style="display: none;">
              <label class="label" style="margin-bottom: 5px;" for="">Chambre</label>
              <div class="check">
                <?php foreach($chambres as $chambre): ?>
                    <label for="" class="form-check"> 
                         <?=$chambre->num_chambre?>
                    </label>
                    <input type="checkbox" id="vehicle1" class="check" name="ch[]" value="<?=$chambre->id_chambre?>"> 
                <?php endforeach ?>
                    
              </div>
            
            </div>
            <div style="display: none;"  id="creer">
                <div class="form-control">
                    <label for="type_chambre">Type Chambre</label>
                    <select name="type_chambre" id="type_chambre">
                        <option value="0">Choisir</option>
                        <?php foreach($typeChambres as $type): ?>
                            <option value="<?=$type->id_type_chambre?>" class=""><?=$type->nom_type_chambre?></option>
                        <?php endforeach; ?>
                    </select>
                    <small>Error message</small>
                    <p style="color: #dc3545;margin-top: 2%;"><?=isset($arrayError['type_chambre'])?$arrayError['type_chambre']: ""?></p>
                </div>
                <div class="form-control">
                    <label for="NumEtage">Numero Etage</label>
                    <input type="text" id="numEtage" class="input" value="<?=isset($chamTypePav[0]->num_etage) ? $chamTypePav[0]->num_etage : "" ?>" name="num_etage" placeholder="Enter Num Etage">
                    <small>Error message</small>
                    <p style="color: #dc3545;margin-top: 2%;"><?=isset($arrayError['numEtage'])?$arrayError['numEtage']: ""?></p>
                </div>
            </div>
            <button name="button" type="submit" >Submit</button>
        </form>
    </div>
</div>
<script src="<?=WEBROOT.'/js/pav.js'?>"></script>
