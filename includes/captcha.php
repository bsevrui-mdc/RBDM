<?php
    // Cadena
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    function generateString($input, $strength = 5) {
        $string = '';
        for ($i=0;$i<$strength;$i++) {
            $randomChar = $input[mt_rand(0, strlen($input)-1)];
            $string .= $randomChar;
        }
        return $string;
    }

    // IMG
    $image = imagecreatetruecolor(200, 50);

    imageantialias($image, true);

    $colors = [];
    $red = rand(125, 175);
    $green = rand(125, 175);
    $blue = rand(125, 175);

    for ($i=0;$i<5;$i++) {
        $colors[] = imagecolorallocate($image, $red-(20*$i), $green-(20*$i), $blue-(20*$i));
    }

    imagefill($image, 0, 0, $colors[0]);

    for ($i=0;$i<10;$i++) {
        imagesetthickness($image, rand(2, 10));
        $rectColor = $colors[rand(1, 4)];
        imagerectangle($image, rand(-10, 190), rand(-10, 10), rand(-10, 190), rand(40, 60), $rectColor);
    }

    // CAPTCHA
    $black = imagecolorallocate($image, 0, 0, 0);
    $white = imagecolorallocate($image, 0, 0, 0);
    $textColors = [$black, $white];
    $fonts = ['../assets/fonts/Acme.ttf', '../assets/fonts/Merriweather.ttf', '../assets/fonts/Ubuntu.ttf'];
    $captchaString = generateString($chars, 6);

    for ($i=0;$i<6;$i++) {
        $letterSpace = 170/6;
        imagettftext($image, 10, rand(-15, 15), 15+($i*$letterSpace), rand(20, 40), $textColors[rand(0, 1)], $fonts[array_rand($fonts)], $captchaString[$i]);
    }

    header('Content-type: image/png');
    imagepng($image);
    imagedestroy($image);
?>