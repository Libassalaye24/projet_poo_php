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
<div class="container mt-5">
    
    <div class="column shadow p-4">
     <h4>Add Etudiant</h4>
        <div class="card text-left border border-secondary">
          <div class="card-body">
                <form action="<?=WEBROOT.'etudiant/'.$action?>" method="POST">
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
                            <div class="form-group">
                            <label for="">Adresse</label>
                            <input type="text" name="adresse" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <small id="helpId" class="text-danger"><?=isset($arrayError['adresse'])?$arrayError['prenom']: ""?></small>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($url[1] !="showAddEtudiantNBoursier" ): ?>
                    <div class="row">
                        <div class="col">
                             <div class="form-group">
                              <label for="">Bourse</label>
                              <select class="form-control" name="bourse" id="">
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
                        <div class="col">
                             <div class="form-group">
                              <label for="">Chambre</label>
                              <select class="form-control" name="chambre" id="">
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
                        <div class="">
                            <button type="submit" name="btn" class="btn btn-primary " style="background-color: #152032;color:#fff">Valider</button>
                        </div>
                </form>
          </div>
        </div>
    </div>
</div>