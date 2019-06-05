<?php session_start();

// type de flood
$name = $_GET['name'];

// nb de caractères
$strlen = (int) $_GET['strlen'];

// taille de l'image ( width )
$width = $strlen * 30 + 20;
$height = 60;

// création
$img = imagecreatetruecolor( $width, $height );
// antialising, c'est plus bô! :-)
//imageantialias( $img, 1 );

// chaine
$string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$chaine = '';
for( $i = 0; $i < $strlen; $i++ )
  $chaine .= $string[ mt_rand( 0, 24 ) ];
  
$_SESSION[ $name ] = $chaine;

// couleur de départ
$c1 = array( mt_rand( 200, 255), mt_rand( 200, 255), mt_rand( 200, 255) );
// couleur finale
$c2 = array( mt_rand( 150, 200), mt_rand( 150, 200), mt_rand( 150, 200) );

$colors = array( imagecolorallocate( $img, 0, 0, 0 ) , 
                 imagecolorallocate( $img, 0, 0, 0 ), 
                 imagecolorallocate( $img, 0, 0, 0 ), 
                 imagecolorallocate( $img, 0, 0, 0 ), 
                 imagecolorallocate( $img, 0, 0, 0 ) );

// création de l'image
for( $i = 0; $i < $width; $i++ )
{
  $r = $c1[0] + $i * ( $c2[0] - $c1[0] ) / $width;
  $v = $c1[1] + $i * ( $c2[1] - $c1[1] ) / $width;
  $b = $c1[2] + $i * ( $c2[2] - $c1[2] ) / $width;
  $color = imagecolorallocate( $img, 255, 255, 255 );
  
  imageline( $img, $i, 0, $i, $height, $color );
}

// caractères
for( $i = 0; $i < $strlen; $i++ )
{
  $col = imagecolorallocate( $img, mt_rand( 0, 120 ),mt_rand( 0, 120 ), mt_rand( 0, 120 ));
  
             imagettftext( $img, mt_rand( 20, 25 ), 
                           mt_rand( -30, 30 ), 
                           10 + $i * 30, 35, 
                           $col, 
                           '../data/media/GeometricSerif.ttf', 
                           $chaine[ $i ] );
}

// quelques lignes qui embêtent
for( $i = 0; $i < 8; $i++ )
{
imageline( $img, mt_rand(0, $width), 
           mt_rand(0, $height), mt_rand(0, $width), mt_rand(0, $height), $colors[mt_rand( 0, 4 )] );
}

$noir = imagecolorallocate( $img, 0, 0, 0 );

// header: image
header("Content-type: image/png");
imagepng( $img ); 
imagedestroy( $img );
//imageline($img, $width - 1, 0, $width - 1, $height, $noir );

?>