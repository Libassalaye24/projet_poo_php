<?php
use App\Core\Session;
$arrayError=[];
  if (Session::KeyExist("arrayError")) {
      $arrayError=Session::getSession("arrayError");
      Session::removeKey("arrayError");
  }
// var_dump($url);
 if ($url[1]=='showAddEtudiantBoursierLoge') {
     $action='addEtudiantBoursierLoge';
 }elseif ($url[1]=='showAddEtudiantBoursierNLoge') {
    $action='addEtudiantBoursierNLoge';
 }elseif ($url[1]=='showAddEtudiantNBoursier') {
    $action='addEtudiantNBoursier';
}

?>
<!-- <div class="container mt-5">
    
    <div class="column shadow p-4 ml-auto mr-auto" style="width: 80%;"">
     <h4>Ajout Etudiant</h4>
        <div class="card text-left border border-borderles">
          <div class="card-body">
                <form action="<?=WEBROOT.'etudiant/addEtudiant'?>" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="">Nom</label>
                            <input type="text" name="nom" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <small id="helpId" class="text-danger"><?=isset($arrayError['nom'])?$arrayError['nom']: ""?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="">Prenom</label>
                            <input type="text" name="prenom" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <small id="helpId" class="text-danger"><?=isset($arrayError['prenom'])?$arrayError['prenom']: ""?></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-danger"><?=isset($arrayError['email'])?$arrayError['email']: ""?></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Date Naissance</label>
                                <input type="date" name="date_naissance" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-danger"><?=isset($arrayError['date_naissance'])?$arrayError['date_naissance']: ""?></small>
                            </div>
                            
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Telephone</label>
                                <input type="text" name="telephone" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-danger"><?=isset($arrayError['telephone'])?$arrayError['telephone']: ""?></small>
                            </div>
                            
                        </div>
                    </div>
                <?php if($url[1]=="showAddEtudiantNBoursier"): ?>
                    <div class="row">
                        <div class="col">
                            <div class="form-group" style="width: 103%;">
                            <label for="">Adresse</label>
                            <input type="text" name="adresse" id="" class="form-control" placeholder="" aria-describedby="helpId"> <br>
                            <small id="helpId" class="text-danger"><?=isset($arrayError['adresse'])?$arrayError['prenom']: ""?></small>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($url[1] =="showAddEtudiantBoursierNLoge" ): ?>
                    <div class="row">
                        <div class="col">
                             <div class="form-group">
                              <label for="">Bourse</label>
                              <select class="form-select select" name="bourse" id="">
                                <option value="0">Choisir</option>
                                <?php  foreach($bourses as $bourse): ?>
                                    <option value="<?=$bourse->id_bourse?>"><?=$bourse->type_bourse?></option>
                                <?php endforeach; ?>
                              </select>
                              <small id="helpId" class="text-danger"><?=isset($arrayError['bourse'])?$arrayError['bourse']: ""?></small>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($url[1]=="showAddEtudiantBoursierLoge"): ?>
                    <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                              <label for="">Bourse</label>
                              <select class="form-select select" name="bourse" id="">
                                <option value="0">Choisir</option>
                                <?php  foreach($bourses as $bourse): ?>
                                    <option value="<?=$bourse->id_bourse?>"><?=$bourse->type_bourse?></option>
                                <?php endforeach; ?>
                              </select>
                              <small id="helpId" class="text-danger"><?=isset($arrayError['bourse'])?$arrayError['bourse']: ""?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="">Chambre</label>
                              <select class="form-select select " name="chambre" id="">
                                <option value="0">Choisir</option>
                                <?php  foreach($chambres as $chambre): ?>
                                    <option value="<?=$chambre->id_chambre?>"><?=$chambre->num_chambre?></option>
                                <?php endforeach; ?>
                              </select>
                              <small id="helpId" class="text-danger"><?=isset($arrayError['chambre'])?$arrayError['chambre']: ""?></small>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                       
                        <div class="row">
                            <input type="submit" class="fadeIn fourth ml-auto mr-auto w-25" value="Valider">
                        </div>
                </form>
          </div>
        </div>
    </div>
</div>
<style>
    .select{
        background-color: #f6f6f6;

    }
</style>
 -->
 <!-- <div class="body">
 <div class="container">
        <form class="form" method="POST" action="<?=WEBROOT.'etudiant/addEtudiant'?>" id="form">
            <h2>Ajout Etudiant</h2>
            <div class="row" >
                <div class="form-control etu" >
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" class="input" name="nom" placeholder="Enter Nom ">
                    <small>Error message</small>
                    <p style="color: #dc3545;margin-top: 2%;"><?=isset($arrayError['nom'])?$arrayError['nom']: ""?></p>

                </div>
                <div class="form-control etu" style="margin-left:1%">
                    <label for="prenom">Prenom</label>
                    <input type="text" id="prenom" class="input" name="prenom" placeholder="Enter Nbr Etage">
                    <small>Error message</small>
                    <p style="color: #dc3545;margin-top: 2%;"><?=isset($arrayError['prenom'])?$arrayError['prenom']: ""?></p>

                </div>
            </div>
            <div class="row" >
                <div class="form-control etu" >
                    <label for="dateNaissance">Date Naissance</label>
                    <input type="text" id="dateNaissance" class="input" name="date_naissance" placeholder="Enter Date Naissance">
                    <small>Error message</small>
                    <p style="color: #dc3545;margin-top: 2%;"><?=isset($arrayError['date_naissance'])?$arrayError['date_naissance']: ""?></p>

                </div>
                <div class="form-control etu" style="margin-left:1%">
                    <label for="telephone">Telephone</label>
                    <input type="text" id="telephone" class="input" name="telephone" placeholder="Enter Telephone">
                    <small>Error message</small>
                    <p style="color: #dc3545;margin-top: 2%;"><?=isset($arrayError['telephone'])?$arrayError['telephone']: ""?></p>
                </div>
            </div>
           
            <div class="form-control">
                <label for="email">Email</label>
                <input type="text" id="email" class="input" name="email" placeholder="Enter Email">
                <small>Error message</small>
                <p style="color: #dc3545;margin-top: 2%;"><?=isset($arrayError['email'])?$arrayError['email']: ""?></p>

            </div>
            <div >
            <div class="radio" style="display: flex;">
                <p style="margin-bottom: 5px;flex:1;">Sltp selectionnez le type d'etudiant:</p>
                 <div class="classs" style="flex: 1;display:flex">
                    <input type="radio" id="myRadio" onclick="handleClick(this);" name="fav_language" value="bourse">
                    <label for="Bourse" style="margin-left: 1%;">Boursier</label><br>
                    <input type="radio" id="myRadio" onclick="handleClick(this);"  style="margin-left: 4%;"  name="fav_language" value="Non Boursier">
                    <label for="NonBoursier"  style="margin-left: 1%;">Non Boursier</label><br>    
                 </div>
               
            </div>
            
            </div>  
            <div class="form-control etu" id="fcb" style="display:none">
                <label for="bourse">Bourse</label>
                    <select name="bourse" id="bourse">
                         <option value="0">Choisir</option>
                       <?php foreach($bourses as $bourse): ?>
                         <option value="<?=$bourse->id_bourse?>"><?=$bourse->type_bourse?></option>
                       <?php endforeach; ?>
                    </select>
                <small>Error message</small>
                <p id="select" style="color: #dc3545;margin-top: 2%;"><?=isset($arrayError['bourse'])?$arrayError['bourse']: ""?></p>

            </div>
            <div class="form-control" id="fca" style="display:none">
                <label for="adresse">Adresse</label>
                <input type="text" id="adresse" class="input" name="adresse" placeholder="Enter Adresse">
                <small>Error message</small>
                <p style="color: #dc3545;margin-top: 2%;"><?=isset($arrayError['adresse'])?$arrayError['adresse']: ""?></p>
            </div>
            <button name="button" type="submit" >Submit</button>
        </form>
    </div>


</div> -->
<div class="body">
 <div class="container">
        <form class="form" method="POST" action="<?=WEBROOT.'etudiant/addEtudiant'?>" id="form">
           <input type="hidden" name="idChambre" value="<?=isset($chamTypePav[0]->id_chambre) ? $chamTypePav[0]->id_chambre : "" ?>">
            <!-- <h2>Register With Us</h2> -->
            <h2>Ajout Etudiant</h2>
            <div class="form-control " >
                <label for="nom">Nom</label>
                <input type="text" id="nom" class="input" name="nom" placeholder="Enter Nom ">
                <small>Error message</small>
                <p style="color: #dc3545;margin-top: 2%;"><?=isset($arrayError['nom'])?$arrayError['nom']: ""?></p>

            </div>
            <div class="form-control " >
                <label for="prenom">Prenom</label>
                <input type="text" id="prenom" class="input" name="prenom" placeholder="Enter Nbr Etage">
                <small>Error message</small>
                <p style="color: #dc3545;margin-top: 2%;"><?=isset($arrayError['prenom'])?$arrayError['prenom']: ""?></p>
            </div>
            <div class="form-control " >
                <label for="dateNaissance">Date Naissance</label>
                <input type="date" id="dateNaissance" class="input" name="date_naissance" placeholder="Enter Date Naissance">
                <small>Error message</small>
                <p style="color: #dc3545;margin-top: 2%;"><?=isset($arrayError['date_naissance'])?$arrayError['date_naissance']: ""?></p>
            </div>
            <div class="form-control ">
                <label for="telephone">Telephone</label>
                <input type="text" id="telephone" class="input" name="telephone" placeholder="Enter Telephone">
                <small>Error message</small>
                <p style="color: #dc3545;margin-top: 2%;"><?=isset($arrayError['telephone'])?$arrayError['telephone']: ""?></p>
            </div>
            <div class="form-control">
                <label for="email">Email</label>
                <input type="text" id="email" class="input" name="email" placeholder="Enter Email">
                <small>Error message</small>
                <p style="color: #dc3545;margin-top: 2%;"><?=isset($arrayError['email'])?$arrayError['email']: ""?></p>
            </div>
            
            <div class="form-control" >
                <label for="radio">Type Etudiant</label>
                    <select onclick="handleClick(this);" name="myRadio" id="type">
                         <option value="0">Choisir</option>
                         <option value="bourse">Boursier</option>
                         <option value="notbourse">Non Boursier</option>
                    </select>
                <small>Error message</small>
            </div>
            <div class="form-control" id="fcb" style="display:none">
                <label for="Bourse">Bourse</label>
                    <select name="bourse" id="bourse">
                         <option value="0">Choisir</option>
                       <?php foreach($bourses as $bourse): ?>
                         <option value="<?=$bourse->id_bourse?>"><?=$bourse->type_bourse?></option>
                       <?php endforeach; ?>
                    </select>
                <small>Error message</small>
            </div>
            <div class="form-control" id="fca" style="display:none">
                <label for="adresse">Adresse</label>
                <input type="text" id="adresse" class="input" name="adresse" placeholder="Enter Adresse">
                <small>Error message</small>
                <p style="color: #dc3545;margin-top: 2%;"><?=isset($arrayError['adresse'])?$arrayError['adresse']: ""?></p>
            </div>
           
            <button name="button" id="button" type="submit" >Submit</button>
        </form>
    </div>
</div>

<script src="<?=WEBROOT.'/js/etu.js'?>"></script>

