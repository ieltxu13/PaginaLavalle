<?php

use DoctrineExtensions\Paginate\PaginationAdapter;

class Default_Model_ImagenesVendimiaPaginadas
{

    private $paginator = null;

    /**
     * @var Bisna\Application\Container\DoctrineContainer
     *
     */
    protected $_doctrineContainer = null;

    /**
     * @var Doctrine\ORM\EntityManager
     *
     */
    protected $_em = null;

    public function ListImagenes($page, $galeria = false)
    {

        $this->_doctrineContainer = Zend_Registry::get('doctrine');
        $this->_em = $this->_doctrineContainer->getEntityManager();


        $query = $this->_em->createQuery('SELECT i from My\Entity\ImagenVendimia i where i.paraGaleria = ?1');
        $query->setParameter(1, $galeria);

        $paginationAdapter = new PaginationAdapter($query);
        
        $this->paginator = new Zend_Paginator($paginationAdapter);
        $this->paginator->setItemCountPerPage(10)
                ->setCurrentPageNumber($page)
                ->setPageRange(10);


        $imagenes = array();
        foreach ($this->paginator as $imagen)
        {
            $imagenObj = new My\Entity\Imagen();
            $imagenObj = $imagen;

            $imagenes[$imagen->getId()] = $imagenObj;
        }

        return $imagenes;
    }

    public function getPaginator()
    {
        return $this->paginator;
    }

}