

 <div class="conatainer">
     <div class="column">
            <form action="<?=WEBROOT.'chambre/showChambre'?>" class="form-inline" method="post">
                <div class="form-filtre" >
                   
                    <div class="selectCheck">
                        <label for="">Pavillon</label>
                        <select name="pav" id="">
                        <option value="">Choisir</option>
                        <?php foreach($pavillons as $pavillon): ?>
                            <option <?=(isset($post['pav']) && $post['pav']==$pavillon->id_pavillon) ? 'selected' : "" ?> value="<?=$pavillon->id_pavillon?>"><?=$pavillon->nom_pavillon?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                            
                    <div class="valide">
                       <button name="button" class="btn-valide" value="ok" type="submit" >Filtrer</button>
                    </div>
                </div>
            </form>
         <div class="card">
               <div class="row">
                    <a href="<?=WEBROOT.'chambre/showAddChambre'?>" class="btnajout">
                         <i class="fas fa-plus "></i>Ajout
                    </a>
                    <a href="<?=WEBROOT.'chambre/showArchiveChambre'?>" class="link">
                      Liste des archives <i class="fas fa-arrow-right "></i>
                    </a>
                   
               </div>
               <div style="overflow-x:auto;">
             <table >
                 <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Numero Chambre</th>
                        <th scope="col">Numero Etage</th>
                        <th scope="col">Type Chambre</th>
                        <?php if(isset($post['button'])): ?>
                        <th scope="col">Pavillon</th>
                        <?php endif; ?>
                        <th scope="col">Etudiant</th>
                        <th scope="col">Etat(Occupation)</th>
                        <th scope="col">Action</th>
                    </tr>
                 </thead>
                 <?php $i=0; ?>
                 <?php foreach($chambres as $chambre): ?>            
                    <tr>
                        <td class="thbottom"><?=$i++;?></td>
                        <td class="thbottom"><?=$chambre->num_chambre?></td>
                        <td class="thbottom"><?=$chambre->num_etage?></td>
                        <td class="thbottom"><?=$chambre->nom_type_chambre?></td>
                        <?php if(isset($post['button'])): ?>
                         <td class="thbottom"><?=$chambre->nom_pavillon?></td>
                        <?php endif; ?>
                        <td class="thbottom">
                        <a href="<?=WEBROOT.'etudiant/showEtudiantByChambre/idChambre/'.$chambre->id_chambre?>" class="btn btn2">
                                <i class="fas fa-plus "></i>
                                Voir
                            </a>
                        </td>
                        <td class="thbottom">
                          <?php $chambre->occupee=='true' ? $oc='Occupee' : $oc='Non occupee' ?>
                          <?=$oc;?>
                        </td>
                      
                        <td class="thbottom action">
                            <a href="<?=WEBROOT.'chambre/showUpdateChambre/idChambre/'.$chambre->id_chambre?>" class="btnUpdate">
                                <i class="fas fa-edit edit"></i>
                                Update
                            </a>
                            <form action="<?=WEBROOT.'chambre/archiveChambre'?>" method="POST">
                                <input type="hidden" name="id" value="<?=$chambre->id_chambre?>">
                                <button name="btn" class="btnArchive">
                                   <i class="fas fa-file-archive archive"></i>
                                   <?=$chambre->etat=='archiver' ? 'Desrchiver' : " Archiver" ?>
                                </button>
                             </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                   
                    
            </table>
            </div>
         </div>
             <div class="p <?= isset($post['button']) ? 'd-none' : "" ?>">
                <div class="pagination">
                    <?php if($page>=2): ?>
                    <a  href="<?=WEBROOT.'chambre/showChambre/&page=/'.$page-1?>" class="laquo">&laquo;</a>
                   <?php endif; ?>
                    <?php for($i=1;$i<=$total_page;$i++): ?>
                        <?php if($i==$page): ?>
                         <a class="active" href="<?=WEBROOT.'chambre/showChambre/&page=/'.$i?>"><?=$i?></a>
                         <?php else: ?>
                        <a class="a" href="<?=WEBROOT.'chambre/showChambre/&page=/'.$i?>"><?=$i?></a>
                         <?php endif; ?>
                    <?php endfor; ?>
                    <?php if($page<$total_page): ?>
                    <a href="<?=WEBROOT.'chambre/showChambre/&page=/'.$page+1?>" class="laquo">&raquo;</a>
                    <?php endif; ?>
                </div>
            </div>
     </div>
 </div>

