<?php
include "head.php";
echo '<body>
<div class="page">';
/* On prépare le tableau avec les images pour la répartition aléatoire */
for ($i=1;$i<9;$i++)  
{
    $tab[]=$i;
    $tab[]=$i;
  
}   // $tab contient 2 fois les numeros de 1 à 8
for ($lig=1;$lig<5;$lig++)  // on boucle pour faire les lignes
{
    echo '
        <div class="ligne"> 
        <div class="demi"></div>';  // demi permet un espace entre les images
    for ($i=1;$i<5;$i++)        // on boucle sur les images d'une ligne
    {
        //on choisit un numero aléatoirement dans le tableau.
        $key = array_rand($tab);
        $num = $tab[$key];
        //on enlève la valeur du tableau
        array_splice($tab,$key,1);
        echo ' <div class="case">
            <img class="recto" src="Images/plage.jpg" alt="">
            <img class="verso" src="Images/'.$num.'.jpg" alt="">
        </div>
        <div class="demi"></div>'; // on place les 2 images, une est cachée (display none)
    }
    echo '  </div>';
    echo '<div class="espaceHor"></div>';   // permet un espace entre 2 lignes
}
echo '
</body>
</html>';
