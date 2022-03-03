
 <div class="conatainer">
     <div class="column">
            <form action="<?=WEBROOT.'etudiant/showEtudiantBoursier'?>" class="form-inline" method="post">
                <div class="form-filtre" >
                    <div class="selectCheck">
                        <label for="">Type</label>
                        <select id="type"  name="type" >
                            <option value="">Choisir</option>   
                            <option <?=(isset($post['type']) && $post['type']=='boursier') ? 'selected' : "" ?> value="boursier">Boursier N loge</option>
                            <option <?=(isset($post['type']) && $post['type']=='loge') ? 'selected' : "" ?> value="loge">Boursier Loge</option>
                            <option <?=(isset($post['type']) && $post['type']=='nonboursier') ? 'selected' : "" ?> onclick="myFunction()" value="nonboursier">Non Boursier</option>
                        </select>
                    </div>
                    <div id="selectCheck" class="selectCheck">
                        <label  for="">Bourse</label>
                        <select name="bourse" >
                        <option value="">Choisir</option>
                            <option <?=(isset($post['bourse']) && $post['bourse']=='bourse_entier') ? 'selected' : "" ?> value="bourse_entier">Entiere</option>
                            <option <?=(isset($post['bourse']) && $post['bourse']=='demi_bourse') ? 'selected' : "" ?> value="demi_bourse">Demi</option>
                        </select>
                    </div>
                 
                    <div class="valide">
                       <button name="button" class="btn-valide" value="ok" type="submit" >Filtrer</button>
                    </div>
                </div>
            </form>
         <div class="card">
              <div class="row">
                    <h4>Liste des Etudiants</h4>
                    <a href="<?=WEBROOT.'etudiant/showAddEtudiantBoursierNLoge'?>" class="btnajout">
                         <i class="fas fa-plus "></i>Ajout
                    </a>
               </div>
               <div style="overflow-x:auto;">
             <table>
                 <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Date Naiss</th>
                        <th>Adresse</th>
                        <th>Bourse</th>
                        <th class="">Chambre</th>
                        <th>Telephone</th>
                    </tr>
                 </thead>
                 <?php $i=0; ?>
                 <?php foreach($etudiant as $etu): ?>        
                    <?php $etu->id_bourse==1 ? $b='bourse_entier' : "";$etu->id_bourse==2 ? $b='demi_bourse' : "" ?>     
                    <tr>
                        <td class="thbottom"><?=$etu->matricule?></td>
                        <td class="thbottom"><?=$etu->nom?></td>
                        <td class="thbottom"><?=$etu->prenom?></td>
                        <td class="thbottom"><?=$etu->email?></td>
                        <td class="thbottom"><?=$etu->date_naissance?></td>
                        <td class="thbottom"><?=isset($etu->adresse) ? $etu->adresse : "-" ?></td>
                        <td class="thbottom" > <?=isset($etu->id_bourse) ? $b : "-" ?> </td>

                        <td class="thbottom ">
                        <?php if(isset($etu->id_bourse) && !isset($etu->id_chambre)): ?>

                            <a href="<?=WEBROOT.'etudiant/showAffecterChambre/idEtudiant/'.$etu->id_personne?>" class="btn">
                                <i class="fas fa-plus "></i>
                                Affecter
                            </a>
                        <?php elseif(isset($etu->id_chambre)): ?>
                            <p style="padding: 10px;"><?=isset($post['type']) && $post['type']=='loge' ? $etu->num_chambre.' ('.$etu->nom_pavillon.')' : "Loge" ?></p>
                        <?php else: ?>
                            <p style="padding: 10px;">-</p>
                        <?php endif ;?>
                        </td>
                        <td class="thbottom"><?=$etu->telephone?></td>
                    </tr>
                <?php endforeach; ?>
                   
                    
            </table>
               </div>
         </div>
         <div  class="p <?= isset($post['button']) ? 'd-none' : "" ?>">
                <div class="pagination">
                    <?php if($page>=2): ?>
                    <a  href="<?=WEBROOT.'etudiant/showEtudiantBoursier/page='.$page-1?>" class="laquo">&laquo;</a>
                   <?php endif; ?>
                    <?php for($i=1;$i<=$total_page;$i++): ?>
                        <?php if($i==$page): ?>
                         <a class="active" href="<?=WEBROOT.'etudiant/showEtudiantBoursier/page='.$i?>"><?=$i?></a>
                         <?php else: ?>
                        <a class="a" href="<?=WEBROOT.'etudiant/showEtudiantBoursier/page='.$i?>"><?=$i?></a>
                         <?php endif; ?>
                    <?php endfor; ?>
                    <?php if($page<$total_page): ?>
                    <a href="<?=WEBROOT.'etudiant/showEtudiantBoursier/page='.$page+1?>" class="laquo">&raquo;</a>
                    <?php endif; ?>
                </div>
            </div>
     </div>
 </div>
 <script>
function myFunction() {
  document.getElementById("selectCheck").style.display = 'none';
}
</script>

