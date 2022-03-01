<!-- <div class="container" style="margin-top: 5%;">
          
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
    <a name="" id="" class="btn mr-auto" href="<?=WEBROOT."chambre/showChambre"?>" role="button" style=""><i class="fa-solid fa-circle-arrow-left"></i> Liste Chambres </a>
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
                             <a name="" id="" class="btn btn-warning mr-2" href="<?=WEBROOT.'chambre/showUpdateChambre/idChambre/'.$chambre->id_chambre?>" role="button"><i class="fa-solid fa-pen-to-square"></i>update</a>
                             <form action="<?=WEBROOT.'chambre/archiveChambre'?>" method="POST">
                                <input type="hidden" name="id" value="<?=$chambre->id_chambre?>">
                                <button type="submit"   class="btn btn-danger" >
                                <i class="fa-solid fa-folder-open"></i> Desarchiver
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
 </div>
 -->
 <div class="conatainer">
     <div class="column">
            <form action="<?=WEBROOT.'chambre/showArchiveChambre'?>" class="form-inline" method="post">
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
               <div class="float2">
                    <a href="<?=WEBROOT."chambre/showChambre"?>" class="link">
                        <i class="fa fa-arrow-left ml-2" aria-hidden="true"></i>
                        Liste Chambres
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
                        <a href="<?=WEBROOT.'etudiant/showEtudiantByChambre/idChambre/'.$chambre->id_chambre?>" class="btn">
                                <i class="fas fa-plus "></i>
                                Voir
                            </a>
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
                                       Desarchiver
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
                    <a  href="<?=WEBROOT.'chambre/showArchiveChambre/&page=/'.$page-1?>" class="laquo">&laquo;</a>
                   <?php endif; ?>
                    <?php for($i=1;$i<=$total_page;$i++): ?>
                        <?php if($i==$page): ?>
                         <a class="active" href="<?=WEBROOT.'chambre/showArchiveChambre/&page=/'.$i?>"><?=$i?></a>
                         <?php else: ?>
                        <a class="a" href="<?=WEBROOT.'chambre/showArchiveChambre/&page=/'.$i?>"><?=$i?></a>
                         <?php endif; ?>
                    <?php endfor; ?>
                    <?php if($page<$total_page): ?>
                    <a href="<?=WEBROOT.'chambre/showArchiveChambre/&page=/'.$page+1?>" class="laquo">&raquo;</a>
                    <?php endif; ?>
                </div>
            </div>
     </div>
 </div>

