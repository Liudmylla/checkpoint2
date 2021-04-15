<?php

namespace App\Service;

 class ColorGenerator 
{  
   public function __construct()
   {
       
   }

    public function generateBackground(array $colors): string 

    {
        
        $averageColor ='#';

        foreach ($colors as $color)  {
             $red =+ hexdec($color[1].$color[2]);
             $green =+ hexdec($color[3].$color[4]);
             $blue =+ hexdec($color[5].$color[6]);
        }
        $red = dechex(round($red/3));
        $green = dechex(round($green/3));
        $blue = dechex(round($blue/3));
        $averageColor = $averageColor . $red . $green . $blue;
        return $averageColor;
    }
    
}



 