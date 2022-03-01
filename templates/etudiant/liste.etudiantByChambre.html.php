<!-- <style>
   
</style>
<div class="container" style="margin-top: 5%;">
           <div class="row">
               <div class="col-md-6">
                    <form method="POST" action="<?php ?>" class="form-inline  " >
                        <input type="hidden" name="controllers" >
                        <input type="hidden" name="action" value="filterCours">
                        <div class="form-group ml-2 top">
                              <label for="">Type</label>
                              <select class="form-control ml-2" name="" id="">
                                <option>Boursier</option>
                                <option>Non Boursier</option>
                                
                              </select>
                        </div>
                         <div class="form-group ml-4">
                                <label for="">Heure de fin</label>
                                <select class="form-control ml-2" name="fin" id="" value="">
                                    <option>kkkkkk</option>
                                    <option>kkkkkk</option>
                                </select>
                        </div>
                        
                            <button type="submit" name="ok" class="btn  ml-4 ok-btn" style="background-color: #152032;color:#fff;  padding: 7px 9px;text-align: center;text-decoration: none; font-size: 13px;">OK</button>

                    </form>
               </div>
              
           </div>
    <div class="column mt-5 rounded-pill">
    <div class="card shadow p-3  ">
    <a name="" id="" class="btn mr-auto" href="<?=WEBROOT.'chambre/showChambre'?>" role="button"><i class="fa-solid fa-circle-arrow-left"></i> Liste des chambre</a>

        <table class="table border border-secondary">
            <thead class="" >
                <tr class="border border-secondary">
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody><?php $i=0; ?>
            <?php foreach($etudiantChambres as $etudiantChambre): ?>
                <tr class="border border-bottom">
                    <td scope="row"><?=$i++;?></td>
                    <td scope="row"><?=$etudiantChambre->nom?></td>
                    <td><?=$etudiantChambre->prenom?></td>
                    <td><?=$etudiantChambre->email?></td>
                   
                   
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
</div>

 -->
 <div class="conatainer">
     <div class="column">
         <div class="card">
                <h4 style="margin-bottom: 8px;">Liste des Etudiants Par Chambre</h4>
                <div style="overflow-x:auto;">
             <table>
                 <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Date Naiss</th>
                        <th>Bourse</th>
                        <th>Chambre(Num)</th>
                    </tr>
                 </thead>
                 <?php $i=0; ?>
                 <?php if(count($etudiantChambres)!=0):?>
                 <?php foreach($etudiantChambres as $etudiantChambre): ?>            
                    <tr>
                        
                        <td class="thbottom"><?=$i++;?></td>
                        <td class="thbottom"><?=$etudiantChambre->nom?></td>
                        <td class="thbottom"><?=$etudiantChambre->prenom?></td>
                        <td class="thbottom"><?=$etudiantChambre->email?></td>
                        <td class="thbottom"><?=$etudiantChambre->date_naissance?></td>
                        <td class="thbottom"><?=($etudiantChambre->id_bourse==1) ? 'bourse_entier' : "demi_bourse" ?></td>
                        <td class="thbottom">
                          <?=$etudiantChambre->num_chambre." (".$etudiantChambre->nom_pavillon.")"?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?> 
                    <h5>Tableau Vide</h5>
                <?php endif; ?>  
                    
            </table>
            </div>
         </div>
     </div>
 </div>