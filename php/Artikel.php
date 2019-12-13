<?php
    include 'connect.php';
    include 'block.php';

    function reload(){
        echo "<script>
                  if (window.history.replaceState) {
                    window.history.replaceState( null, null, window.location.href);
                    location.reload(true);
                  }
              </script>";
    }

    $artikelFoto  = $_FILES["artikel_foto"]["name"];
    $ArtikelTitle  = $_POST['ArtikelTitle'];
    $ArtikelText =  $_POST['ArtikelText'];
    $ArtikelLabel =  $_POST['ArtikelLabel'];
    $ArtikelStatus =  $_POST['ArtikelStatus'];

    $naamFoto = "Artikel".$artikelFoto;

    if(isset($_POST['Post'])){
        $loc = "pic/artikels/";
        $IMG = "artikel_foto";
        UploadIMG($loc,$IMG);
        $sql = "INSERT INTO `artikels` (`Artikel`,`Text_`,`Label`,`Img`,`Status`) VALUES ('$ArtikelTitle','$ArtikelText','$ArtikelLabel','$naamFoto','$ArtikelStatus');";
        if ($conn->query($sql) === true){
        }
        if(strlen($artikelFoto) > 0){
            $loc = "pic/artikels/";
            $IMG = "artikel_foto";
            UploadIMG($loc,$IMG);//foto function
            rename("pic/artikels/$artikelFoto","pic/artikels/Artikel$artikelFoto");
        }
        reload();
    }
?>
