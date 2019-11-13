

<?php
  include 'block.php';
/*
0 = text kleur
1 = div kleur
2 = white
3 = niks
4 =

*/
  $thema1 =  ["gray","#282828","white","linear-gradient(180deg, rgba(8,8,8,0.8) 7%, rgba(17,17,17,1) 93%)","blue","#191919",];
  $thema2 =  ["gray","#282828","white","linear-gradient(180deg, rgba(8,8,8,0.8) 7%, rgba(17,17,17,1) 93%)","blue","#191919",];
  $thema3 =  ["gray","#282828","white","linear-gradient(180deg, rgba(8,8,8,0.8) 7%, rgba(17,17,17,1) 93%)","blue","#191919",];

  $kleuren = ["gray","#282828","white","linear-gradient(180deg, rgba(8,8,8,0.8) 7%, rgba(17,17,17,1) 93%)","blue","#191919",];

  echo "<style media='screen'>
          .profielkleur{
            color:$kleuren[0];
          }
          .profielkleur2{
            background-color:$kleuren[1];
          }
          .profielkleur3{
            background-color:$kleuren[3];
          }
          .watProfiel{
            background:$kleuren[3];
            color:$kleuren[2];
          }
          body{
            background-color:$kleuren[5];
          }
          .header_div , .kop , .meer{
            color:$kleuren[2];
          }
          .header_div:hover{
            color:$kleuren[0];
          }
          .searchbar , .footer{
            background: $kleuren[3];
          }
        </style>";


 ?>
