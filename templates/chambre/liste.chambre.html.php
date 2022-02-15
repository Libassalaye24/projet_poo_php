<div class="container" style="margin-top: 5%;">
          <!--  <div class="row">
               <div class="col-md-6">
                    <a name="" id="" class="btn btn-dark" href="<?=WEBROOT."chambre/showAddChambre"?>" role="button" style="float: right;right:auto">Ajout Chambre</a>
               </div>
           </div> -->
           <div class="row">
               <div class="col-md-6">
                    <form method="POST" action="<?php ?>" class="form-inline  " >
                        <input type="hidden" name="controllers" >
                        <input type="hidden" name="action" value="filterCours">
                        <div class="form-group ml-2 top">
                              <label for="">Type</label>
                              <select class="form-control ml-2" name="" id="">
                                <option>Choisir</option>
                                <option>perso</option>
                                <option>Double</option>
                                
                              </select>
                        </div>
                         <div class="form-group ml-4">
                                <label for="">Etage</label>
                                <select class="form-control ml-2" name="fin" id="" value="">
                                    <option>Choisir</option>
                                    <option>kkkkkk</option>
                                    <option>kkkkkk</option>
                                </select>
                        </div>
                        
                            <button type="submit" name="ok" class="btn  ml-4 ok-btn" style="background-color: #152032;color:#fff;  padding: 7px 9px;text-align: center;text-decoration: none; font-size: 13px;">OK</button>

                    </form>
               </div>
               <div class="col-md-6">
                     <a name="" id="" class="btn btn-dark" href="<?=WEBROOT."chambre/showAddChambre"?>" role="button" style="float: right;right:auto">Ajout Chambre</a>
               </div>
           </div>
    <div class="column mt-5">
    <div class="card shadow p-3">
        <table class="table border border-secondary">
            <thead>
                <tr class="border border-secondary">
                    <th scope="col">#</th>
                    <th scope="col">Numero Chambre</th>
                    <th scope="col">Numero Etage</th>
                    <th scope="col">Type Chambre</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody><?php $ind=0; ?>
            <?php foreach($chambres as $chambre): ?>
                <tr class="border border-bottom">
                    <td scope="row"><?=$ind++;?></td>
                    <td><?=$chambre->num_chambre?></td>
                    <td><?=$chambre->num_etage?></td>
                    <td><?=$chambre->nom_type_chambre?></td>
                    <td>
                         <div class="ligne " style="display: flex;">
                             <a name="" id="" class="btn btn-warning mr-2" href="<?=WEBROOT.'chambre/showUpdateChambre/idChambre='.$chambre->id_chambre?>" role="button"><i class="fa-solid fa-pen-to-square"></i>update</a>
                             <form action="<?=WEBROOT.'chambre/deleteChambre'?>" method="POST">
                                <input type="hidden" name="id" value="<?=$chambre->id_chambre?>">
                                <button type="submit"   class="btn btn-danger" >
                                <i class="fa-solid fa-trash-can"></i>  delete
                                     </span>
                                </button>
                             </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
        <nav aria-label="...">
            <ul class="pagination pagination-lg justify-content-center  mt-4">
               <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item  active"  aria-current="page">
                <span class="page-link">1</span>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
              </li>
            </ul>
        </nav>
    </div>
    
<!-- <style>
    /*	
	Side Navigation Menu V2, RWD
	===================
	Author: https://github.com/pablorgarcia
 */


@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);



h1 {
  font-size:3em; 
  font-weight: 300;
  line-height:1em;
  text-align: center;
  color: #4DC3FA;
}

h2 {
  font-size:1em; 
  font-weight: 300;
  text-align: center;
  display: block;
  line-height:1em;
  padding-bottom: 2em;
  color: #FB667A;
}

h2 a {
  font-weight: 700;
  text-transform: uppercase;
  color: #FB667A;
  text-decoration: none;
}

.blue { color: #185875; }
.yellow { color: #FFF842; }

.container th h1 {
	  font-weight: bold;
	  font-size: 1em;
  text-align: left;
  color: #185875;
}

.container td {
	  font-weight: normal;
	  font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
	   -moz-box-shadow: 0 2px 2px -2px #0E1119;
	        box-shadow: 0 2px 2px -2px #0E1119;
}

.container {
	  text-align: left;
	  overflow: hidden;
	  width: 80%;
	  margin: 0 auto;
  display: table;
  padding: 0 0 8em 0;
}

.container td, .container th {
	  padding-bottom: 2%;
	  padding-top: 2%;
  padding-left:2%;  
}

/* Background-color of the odd rows */
.container tr:nth-child(odd) {
	  background-color: #323C50;
}

/* Background-color of the even rows */
.container tr:nth-child(even) {
	  background-color: #2C3446;
}

.container th {
	  background-color: #1F2739;
}

.container td:first-child { color: #FB667A; }

.container tr:hover {
   background-color: #464A52;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
	   -moz-box-shadow: 0 6px 6px -6px #0E1119;
	        box-shadow: 0 6px 6px -6px #0E1119;
}

/* .container td:hover {
  background-color: #FFF842;
  color: #403E10;
  font-weight: bold;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
	  transition-duration: 0.4s;
	  transition-property: all;
  transition-timing-function: line;
} */

@media (max-width: 800px) {
.container td:nth-child(4),
.container th:nth-child(4) { display: none; }
}
</style> -->
</div>
