<?php
Class Image { 
	public static function random($nombre) {
		$string = "";
		$chaine = "abcdefghijklmnpqrstuvwxy1234567890";
		srand((double)microtime()*1000000);
		for($i=0; $i<$nombre; $i++)
			$string .= $chaine[rand()%strlen($chaine)];
		return $string;
	}

	public static function upload($file, $width=150, $height=150, $folder = "photos"){
		if(!empty($file["name"])){
			$aleatoire = Image::random(20);
			$img_src_chemin = LOCALISATION."data/tmp/".$file["name"];
			$img_dst_chemin = LOCALISATION."data/".$folder."/".$aleatoire.".png";
			// On met l'image dans un répertoire qui nous est propre de façon temporaire
			move_uploaded_file($file["tmp_name"], $img_src_chemin);
			// Taille Max de la photo à redimensionner
			$defaut_largeur_max = $width;
			$defaut_hauteur_max = $height;
			// Et on redimmensionne.
			$size_im=getimagesize($img_src_chemin);
			$largeur_max = $defaut_largeur_max;
			$hauteur_max = $defaut_hauteur_max;
			if($size_im[0]>=$size_im[1] && $size_im[0]>$largeur_max) {
				$largeur=$largeur_max;
				$hauteur=ceil(($largeur/$size_im[0])*$size_im[1]);
			}
			elseif($size_im[1]>=$size_im[0] && $size_im[1]>$hauteur_max) {
				$hauteur=$hauteur_max;
				$largeur=ceil(($hauteur/$size_im[1])*$size_im[0]);
			}
			else {
				$largeur=$size_im[0];
				$hauteur=$size_im[1];
			}
			if(preg_match('/\.jpg$/i',$img_src_chemin) || preg_match('/\.jpeg$/i',$img_src_chemin))
				$img_in = imagecreatefromjpeg($img_src_chemin);
			else if(preg_match('/\.gif$/i',$img_src_chemin)) 
				$img_in = imagecreatefromgif($img_src_chemin);
			else if(preg_match('/\.png$/i',$img_src_chemin))
				$img_in = imagecreatefrompng($img_src_chemin);
			else
				$img_in = imagecreatefromjpeg($img_src_chemin);
			$img_out = imagecreatetruecolor($largeur, $hauteur);
			imagealphablending($img_out , false);
			imagesavealpha($img_out, true);
			//imagecolortransparent($img_out,imagecolorallocate($img_out,255,0,140));
			imagecopyresampled($img_out, $img_in, 0, 0, 0, 0, imagesx($img_out), imagesy($img_out), imagesx($img_in), imagesy($img_in));
			// Et on sauvegarde notre image redimensionné, en JPEG et dans son dossier
			$t = imagepng($img_out, $img_dst_chemin);
			unlink($img_src_chemin);
			return $aleatoire.".png";
		}
	}
}