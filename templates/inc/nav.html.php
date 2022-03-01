<nav class="navbar">
     <!-- LOGO -->
     <!-- NAVIGATION MENU -->
     <ul class="nav-links">
       <!-- USING CHECKBOX HACK -->
       <input type="checkbox" id="checkbox_toggle" />
       <label for="checkbox_toggle" class="hamburger">&#9776;</label>
       <!-- NAVIGATION MENUS -->
       <div class="menu">
         <li><a href="/">Logo</a></li>
         <li class="services">
           <a href="<?=WEBROOT."etudiant/showEtudiantBoursier"?>" style="cursor: pointer;" >Etudiant</a>
         </li>
         <li><a href="<?=WEBROOT."pavillon/showPavillon"?>">Pavillon</a></li>
         <li><a href="<?=WEBROOT."chambre/showChambre"?>">Chambre</a></li>
       </div>
     </ul>
     <!-- <div class="logo">
        <a href="http://">  Deconnexion</a>
      </div> -->
     <form action="<?=WEBROOT."security/logout"?>" method="POST">
        <button type="submit" class="button">
          Deconnexion
        </button>
     </form>

   </nav>
