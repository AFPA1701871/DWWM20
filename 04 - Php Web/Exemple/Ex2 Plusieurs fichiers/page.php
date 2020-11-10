<?php

$titrePage ="Titre page 1";
include 'head.php';
include 'header.php';
 echo  '<div class="corps">';
for ($i=1;$i<4;$i++)
    echo '    <div class="div'.$i.' espace">toto</div>';

echo '        
    </div>
</body>
</html>';