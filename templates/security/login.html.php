<?php
use App\Core\Session;
$arrayError=[];
  if (Session::KeyExist("arrayError")) {
      $arrayError=Session::getSession("arrayError");
      Session::removeKey("arrayError");
  }
 ?>

 <div class="body">
 <div class="container-login">
        <form class="form" method="POST" action="<?=WEBROOT.'security/seConnecter'?>" id="form">
            <!-- <h2>Register With Us</h2> -->
            <h2>Se connecter</h2>
            <?php if(isset($arrayError['connexion'])): ?>
              <div class="alert alert-danger " style="background-color: #dc3545;padding:10px;text-align:center;border-radius:5px;margin-bottom:5px" role="alert">
                 <strong><?=$arrayError['connexion']?></strong>
              </div>
              <?php endif; ?>
            <div class="form-control">
                <label class="label" for="email">Email</label>
                <input type="text" id="email" class="input" name="login" placeholder="Enter Email">
                <small>Error message</small>
                <p style="color: #dc3545;font-size: 15px;margin-top:2%"><?=isset($arrayError['login']) ? $arrayError['login'] : "";?></p>

            </div>
            <div class="form-control">
                <label class="label" for="password">Password</label>
                <input type="password" id="password" class="input" name="password" placeholder="Enter Password">
                <small>Error message </small>
                <p style="color: #dc3545;font-size: 15px;margin-top:2%"><?=isset($arrayError['password']) ? $arrayError['password'] : "";?></p>
            </div>
           
            <button name="button" class="btn-login" id="button" value="Valider" type="submit" >Se connecter</button>
        </form>
    </div>
</div>

<script src="<?=WEBROOT.'/js/login.js'?>"></script>