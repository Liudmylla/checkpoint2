<?php

namespace App\Controller;

use App\Model\AccessoryManager;
use App\Model\CupcakeManager;
use App\Service\ColorGenerator;

/**
 * Class CupcakeController
 *
 */
class CupcakeController extends AbstractController
{
    /**
     * Display cupcake creation page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    
    public function add()
    {
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
          
            $cupcake= array_map('trim', $_POST);
           
            $cupcakeManager = new CupcakeManager();
            $cupcakeManager->insert($cupcake);
          
         
            header('Location:/cupcake/list');
        }
        
       $accessoryManager = new AccessoryManager();
       $accessories = $accessoryManager->selectAll();

        return $this->twig->render('Cupcake/add.html.twig',

        [
        'accessories'=>$accessories
        ]
    );
    }

    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function list()
    {   $cupcakeManager = new CupcakeManager();
        $cupcakes = $cupcakeManager->selectAll();
        //TODO Retrieve all cupcakes
        return $this->twig->render('Cupcake/list.html.twig',
    ['cupcakes'=> $cupcakes]
    );
    }


    public function show($id)
    
    {
        $cupcakeManager = new CupcakeManager();
        $cupcake = $cupcakeManager->selectOneCupcakeById($id);
        $colors = array($cupcake['color1'],$cupcake['color2'],$cupcake['color3']);
        $colorGenerator = new ColorGenerator();
        $color=$colorGenerator->generateBackground($colors);
        
    return $this->twig->render('Cupcake/show.html.twig', ['cupcake'=>$cupcake, 'color' => $color]);

    }
  
}
