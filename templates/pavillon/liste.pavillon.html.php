<style>
   
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
               <div class="col-md-6">
                   
                    <a name="" id="" class="btn btn-dark" href="<?=WEBROOT."pavillon/showAddPavillon"?>" role="button" style="float: right;">Ajout Pavillon</a>
               </div>
           </div>
    <div class="column mt-5">
    <div class="card shadow p-3">
        <table class="table border border-secondary">
            <thead class="" style="background-color:#152032;color:white">
                <tr class="border border-secondary">
                    <th scope="col">#</th>
                    <th scope="col">Nom Pavillon</th>
                    <th scope="col">Numero Pavillon</th>
                    <th scope="col">Nombre Etage</th>
                    <th scope="col">Chambre</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody><?php $i=0; ?>
            <?php foreach($pavillons as $pavillon): ?>
                <tr class="border border-bottom">
                    <td scope="row"><?=$i++;?></td>
                    <td scope="row"><?=$pavillon->nom_pavillon?></td>
                    <td><?=$pavillon->num_pavillon?></td>
                    <td><?=$pavillon->nbr_etage?></td>
                    <td>
                        <div class="ligne " style="display: flex;">
                            <a name="" id="" class="btn  " style="background-color:#152032;color:white;" href="<?=WEBROOT.'chambre/showChambreByPavillon/idPavillon'.$pavillon->id_pavillon?>" role="button"><i class="fa-solid fa-square-plus"></i> voir</a>                            
                        </div>
                    </td>
                    <td>
                         <a name="" id="" class="btn btn-warning " href="<?=WEBROOT.'pavillon/showUpdatePavillon/'.$pavillon->id_pavillon?>" role="button"><i class="fa-solid fa-pen-to-square"></i>update</a>
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

