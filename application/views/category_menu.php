<div id="collapseDVR3" class="panel-collapse sidenav">
              <div class="tree" >
                  <h4>Select Category:</h4>
                  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                 
                   <ul> 
                      <?php foreach($listfamily as $f) {?>
                      <li> 
                         <?php
                            $fno = $f->Level1No;
                            $listcategorybyfamily = array_filter( $listcategory,  function ($e) use ($fno) { return $e->Level1No == $fno; } ); 
                            $setFamilyActive = "";
                            if(count($family) > 0){
                              $setFamilyActive = ($family[0]->Level1No == $fno) ? "class=\"active\"" : "";
                            }
                         ?> 
                           <span data-id='{"l1":"<?=$fno;?>"}' data-name='["<?=$f->Name1?>"]' <?=$setFamilyActive;?>><i <?=(($listcategorybyfamily) ? "class=\"fa fa-plus-square\"" : "")?>></i> <?=$f->Name1;?></span> 

                         <?php if($listcategorybyfamily) {?>
                           <ul>
                           <?php foreach($listcategorybyfamily as $c) {?>
                           
                               <li>  
                                  <?php
                                      $cno = $c->Level2No; 
                                      $listSubcategorybyfamily = array_filter( $listsubcategory,  function ($e) use ($fno, $cno) { return $e->Level1No == $fno && $e->Level2No == $cno;  } ); 
                                  ?>
                                   <span data-id='{"l1":"<?=$fno;?>","l2":"<?=$cno;?>"}' data-name='["<?=$f->Name1?>","<?=$c->Name2?>"]'><i <i <?=(($listSubcategorybyfamily) ? "class=\"fa fa-plus-square\"" : "")?>></i> <?=$c->Name2;?></span>  
                                   <?php if($listSubcategorybyfamily) {?>
                                     <ul>
                                     <?php foreach($listSubcategorybyfamily as $sc) {?> 
                                         <li><span data-id='{"l1":"<?=$fno;?>","l2":"<?=$cno;?>","l3":"<?=$sc->Level3No;?>"}' data-name='["<?=$f->Name1?>","<?=$c->Name2?>","<?=$sc->Name3?>"]'><i></i> <?=$sc->Name3;?></span></li> 
                                     <?php } ?>
                                     </ul>
                                   <?php } ?>
                               </li> 
                           <?php } ?>

                           </ul>
                         <?php } ?>  
                      </li>
                     <?php } ?>
                       
                    </ul>
                 
              </div>
          </div>
        </div>
 