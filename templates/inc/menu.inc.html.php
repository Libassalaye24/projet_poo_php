<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Liste Etudiants
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?=WEBROOT."etudiant/showEtudiantBoursier"?>">Etudiants Boursiers</a></li>
            <li><a class="dropdown-item" href="<?=WEBROOT."etudiant/showEtudiantNBoursier"?>">Non Boursiers</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         Ajouter Etudiants
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?=WEBROOT."etudiant/showEtudiants"?>">Liste Etudiant</a></li>
            <li><a class="dropdown-item" href="<?=WEBROOT."etudiant/showAddEtudiantBoursierNLoge"?>">Boursier Non Loge</a></li>
            <li><a class="dropdown-item" href="<?=WEBROOT."etudiant/showAddEtudiantBoursierLoge"?>">Boursier Loge</a></li>
            <li><a class="dropdown-item" href="<?=WEBROOT."etudiant/showAddEtudiantNBoursier"?>">Non Boursier</a></li>
          </ul>
        </li>
  
  <style>
    a {
  text-decoration: none;
}

nav {
  font-family: monospace;
}

li:hover,
li:focus-within {
  cursor: pointer;
}

li:focus-within a {
  outline: none;
}

ul li ul {
  background: orange;
  visibility: hidden;
  opacity: 0;
  min-width: 5rem;
  position: absolute;
  transition: all 0.5s ease;
  margin-top: 1rem;
  left: 0;
  display: none;
}

ul li:hover > ul,
ul li:focus-within > ul,
ul li ul:hover,
ul li ul:focus {
   visibility: visible;
   opacity: 1;
   display: block;
}

ul li ul li {
  clear: both;
  width: 100%;
}

  </style>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=WEBROOT."pavillon/showPavillon"?>">Pavillon</a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link active" href="<?=WEBROOT."chambre/showChambre"?>">Chambre</a>
        </li>
      </ul>
      <div class="d-flex">
      <a class="nav-link btn " style="color: white;background-color:#152032" href="<?=WEBROOT."security/logout"?>">Deconnexion</a>

      </div>
    </div>
  </div>
</nav>
 -->
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