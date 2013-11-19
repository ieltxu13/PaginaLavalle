<?php

    use DoctrineExtensions\Paginate\PaginationAdapter;

class Administracion_Model_MensajesPaginados
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

    public function ListMensajes($page)
    {

        $this->_doctrineContainer = Zend_Registry::get('doctrine');
        $this->_em = $this->_doctrineContainer->getEntityManager();


        $query = $this->_em->createQuery('SELECT m FROM My\Entity\Mensaje m');


        $paginationAdapter = new PaginationAdapter($query);
        
        if($paginationAdapter->count() == 0) {
            return null;
        }
        
        $this->paginator = new Zend_Paginator($paginationAdapter);
        $this->paginator->setItemCountPerPage(10)
                ->setCurrentPageNumber($page)
                ->setPageRange(10);


        $mensajes = array();
        foreach ($this->paginator as $mensaje)
        {
            $mensajeObj = new My\Entity\Mensaje();
            $mensajeObj = $mensaje;

            $mensajes[$mensaje->getId()] = $mensajeObj;
        }

        return $mensajes;
    }

    public function getPaginator()
    {
        return $this->paginator;
    }

}