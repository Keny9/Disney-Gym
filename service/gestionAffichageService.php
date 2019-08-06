<?php
  class GestionAffichageService
  {
    public function getOptionService(){
       $ge = new GestionServices();
       $service = $ge->getAllService(null, null);
       $html = "";

       if (!is_array($service)){
         $html .= "Aucun resultat trouvé.";
       }
       else{
         for ($i = 0; $i < sizeof($service); $i++){
           $html .= "
           <option value=\"".$service[$i]->getIdService()."\">".$service[$i]->getNomService()."</option>";
         }
       }


       return $html;
     }
   }
?>
