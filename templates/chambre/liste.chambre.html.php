
<?php

/* use App\Core\Pagination;

$pag = new Pagination();
$data = array("Hello","Rex","Prosper","Adrivan","Hehe");
$numbers = $pag->Paginate($data,2);
$result = $pag->fetchResult();
foreach($result as $r){
echo '<div>'.$r.'</div>';
 
}
 
foreach($numbers as $num){ 
echo '<a href="classpagination.php?page='.$num.'">'.$num.'</a>';
} */
/* use App\Core\Pagination;

    $pagine = new Pagination();
    $numbers = $pagine->paginate(array_values((array)$chambres),1);
    $rs = $pagine->fetResults(); */
?>
<!-- 
<div class="container" style="margin-top: 3%;">
        
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
                     <a name="" id="" class="btn btn-dark" href="<?=WEBROOT."chambre/showAddChambre"?>" role="button" style="float: right;right:auto"><i class="fa-solid fa-circle-plus"></i> Ajout Chambre</a>
               </div>
           </div>
    <div class="column mt-5">
    <div class="card shadow p-3">
    <a name="" id="" class="btn ml-auto" href="<?=WEBROOT."chambre/showArchiveChambre"?>" role="button" style="">Chambres archivés <i class="fa-solid fa-circle-arrow-right"></i></a>

        <table class="table border border-secondary">
            <thead>
                <tr class="border border-secondary">
                    <th scope="col">#</th>
                    <th scope="col">Numero Chambre</th>
                    <th scope="col">Numero Etage</th>
                    <th scope="col">Type Chambre</th>
                    <th scope="col">Etudiant</th>
                    <th scope="col">Pavillon</th>
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
                    <a name="" id="" class="btn btn-warning mr-2" href="<?=WEBROOT.'etudiant/showEtudiantByChambre/idChambre='.$chambre->id_chambre?>" role="button">Voir <i class="fa-solid fa-circle-plus"></i></a>

                    </td>
                    <td></td>
                    <td>
                         <div class="ligne " style="display: flex;">
                             <a name="" id="" class="btn btn-warning mr-2" href="<?=WEBROOT.'chambre/showUpdateChambre/idChambre/'.$chambre->id_chambre?>" role="button"><i class="fa-solid fa-pen-to-square"></i>update</a>

                             <?php if($chambre->etat=='non_archiver'): ?>
                             <form action="<?=WEBROOT.'chambre/archiveChambre'?>" method="POST">
                                <input type="hidden" name="id" value="<?=$chambre->id_chambre?>">
                                <button type="submit"   class="btn btn-danger" >
                                <i class="fa-solid fa-box-archive"></i> archiver
                                     </span>
                                </button>
                             </form>
                             <?php endif; ?>
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
 <?php //var_dump($pavillons); die; ?>
 <div class="conatainer">
     <div class="column">
            <form action="<?=WEBROOT.'chambre/showChambre'?>" class="form-inline" method="post">
                <div class="form-filtre" >
                    <div class="selectCheck">
                        <label for="">Etat</label>
                        <select name="etat" id="">
                            <option <?=(isset($post['etat']) && $post['etat']=='non_archiver') ? 'selected' : "" ?> value="non_archiver">Non Archiver</option>
                            <option <?=(isset($post['etat']) && $post['etat']=='archiver') ? 'selected' : "" ?> value="archiver">Archiver</option>
                        </select>
                    </div>
                    <div class="selectCheck">
                        <label for="">Type Chambre</label>
                        <select name="type" id="">
                        <option value="">Choisir</option>
                            <option <?=(isset($post['type']) && $post['type']=='double') ? 'selected' : "" ?> value="double">Collectif</option>
                            <option <?=(isset($post['type']) && $post['type']=='perso') ? 'selected' : "" ?> value="perso">Personnel</option>
                        </select>
                    </div>
                    
                    <div class="selectCheck">
                        <label for="">Pavillon</label>
                        <select name="idPavillon" id="">
                        <option value="">Choisir</option>
                            <?php foreach($pavillons as $pav): ?>
                            <option <?=(isset($post['idPavillon']) && $post['idPavillon']==$pav->id_pavillon) ? 'selected' : "" ?> value="<?=$pav->id_pavillon?>"><?=$pav->nom_pavillon?></option>
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
                    <a href="<?=WEBROOT."chambre/showArchiveChambre"?>" class="link">
                        Chambres Archives
                        <i class="fa fa-arrow-right ml-2" aria-hidden="true"></i>
                    </a>
                    
               </div>
             <table >
                 <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Numero Chambre</th>
                        <th scope="col">Numero Etage</th>
                        <th scope="col">Type Chambre</th>
                        <th scope="col">Etudiant</th>
                        <th scope="col">Pavillon</th>
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
                        <td class="thbottom">
                        <a href="<?=WEBROOT.'etudiant/showEtudiantByChambre/idChambre/'.$chambre->id_chambre?>" class="btn">
                                <i class="fas fa-plus "></i>
                                Voir
                            </a>
                        </td>
                        <td class="thbottom">
                            <?=isset($chambre->id_pavillon) ? $chambre->nom_pavillon : "Pas de Pavillon" ?>
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
 </div>

