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
                    <td><?=$chambre->type_chambre?></td>
                    <td><?=$chambre->nom_pavillon?></td>
                    <td>
                         <div class="ligne " style="display: flex;">
                             <a name="" id="" class="btn btn-warning mr-2" href="<?=WEBROOT.'chambre/showUpdateChambre/'.$chambre->id_chambre?>" role="button">update</a>
                                <button type="button" disabled  class="btn btn-danger" >
                                     <span class="badge badge-danger">
                                     delete
                                     </span>
                                </button>
                               
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
