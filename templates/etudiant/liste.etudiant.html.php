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
                   
                    <a name="" id="" class="btn btn-dark" href="<?=WEBROOT."etudiant/addEtudiant"?>" role="button" style="float: right;">Ajout Etudiant</a>
               </div>
           </div>
    <div class="column mt-5">
    <div class="card shadow">
        <table class="table table-borderless">
            <thead>
                <tr class="border border-secondary">
                    <th scope="col">Matricule</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Login</th>
                    <th scope="col">Date Naissance</th>
                    <th scope="col">Adresse</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($etudiants as $etudiant): ?>
                <tr class="border border-bottom">
                    <td scope="row"><?=$etudiant->matricule?></td>
                    <td><?=$etudiant->nom?></td>
                    <td><?=$etudiant->prenom?></td>
                    <td><?=$etudiant->email?></td>
                    <td><?=date_format(date_create($etudiant->date_naissance),'d-m-Y')?></td>
                    <td><?=$etudiant->adresse?></td>
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
