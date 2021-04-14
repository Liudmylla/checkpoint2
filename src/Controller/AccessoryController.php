<?php
namespace App\Controller;

use App\Model\AccessoryManager;
use App\Model\CupcakeManager;

/**
 * Class AccessoryController
 *
 */
class AccessoryController extends AbstractController
{
    /**
     * Display accessory creation page
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
            $accessory= array_map('trim', $_POST);
            $accessoryManager = new AccessoryManager();
            $accessoryManager->insert($accessory);
          
         
            header('Location:/accessory/list');
        }
        
       $cupcakeManager = new CupcakeManager();
       $cupcakes = $cupcakeManager->selectAll();

        return $this->twig->render('Accessory/add.html.twig',

        [
        'cupcakes'=>$cupcakes
        
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
    { $accessoryManager = new AccessoryManager();
        $accessories = $accessoryManager->selectAll();
        //TODO Add your code here to retrieve all accessories
        return $this->twig->render('Accessory/list.html.twig', ['accessories'=>$accessories]);
    }
}
