
<div class="conatainer">
     <div class="column">
         <div class="card">
               <div class="row">
                     <h4>Liste des Pavillons</h4>
                     <a href="<?=WEBROOT.'pavillon/showAddPavillon'?>" class="btnajout">
                         <i class="fas fa-plus "></i>Ajout
                    </a>
                    
               </div>
               <div style="overflow-x:auto;">
             <table >
                 <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom Pavillon</th>
                        <th scope="col">Numero Pavillon</th>
                        <th scope="col">Nombre Etage</th>
                        <th scope="col">Chambre</th>
                        <th scope="col">Action</th>
                    </tr>
                 </thead>
                 <?php $i=0; ?>
                 <?php foreach( $pavillons as $pavillon): ?>            
                    <tr>
                        <td class="thbottom"><?=$i++;?></td>
                        <td class="thbottom"><?=$pavillon->nom_pavillon?></td>
                        <td class="thbottom"><?=$pavillon->num_pavillon?></td>
                        <td class="thbottom"><?=$pavillon->nbr_etage?></td>
                        <td class="thbottom">
                        <a href="<?=WEBROOT.'chambre/showChambreByPavillon/idPavillon='.$pavillon->id_pavillon?>" class="btn">
                                <i class="fas fa-plus "></i>
                                Voir
                            </a>
                        </td>
                        <td class="thbottom">
                            <a href="<?=WEBROOT.'pavillon/showUpdatePavillon/idPavillon/'.$pavillon->id_pavillon?>" class="btnUpdate">
                                <i class="fas fa-edit edit"></i>
                                
                                Update
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                   
                    
            </table>
               </div>
         </div>
       
        
             <div class="p">
                <div class="pagination">
                    <?php if($page>=2): ?>
                    <a  href="<?=WEBROOT.'pavillon/showPavillon/page='.$page-1?>" class="laquo">&laquo;</a>
                   <?php endif; ?>
                    <?php for($i=1;$i<=$total_page;$i++): ?>
                        <?php if($i==$page): ?>
                         <a class="active" href="<?=WEBROOT.'pavillon/showPavillon/page='.$i?>"><?=$i?></a>
                         <?php else: ?>
                        <a class="a" href="<?=WEBROOT.'pavillon/showPavillon/page='.$i?>"><?=$i?></a>
                         <?php endif; ?>
                    <?php endfor; ?>
                    <?php if($page<$total_page): ?>
                    <a href="<?=WEBROOT.'pavillon/showPavillon/page='.$page+1?>" class="laquo">&raquo;</a>
                    <?php endif; ?>
                </div>
            </div>
     </div>

 </div>

