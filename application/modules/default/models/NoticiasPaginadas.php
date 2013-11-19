<?php

    use DoctrineExtensions\Paginate\PaginationAdapter;

class Default_Model_NoticiasPaginadas
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

    public function ListNoticias($page)
    {

        $this->_doctrineContainer = Zend_Registry::get('doctrine');
        $this->_em = $this->_doctrineContainer->getEntityManager();


        $query = $this->_em->createQuery('SELECT n FROM My\Entity\Noticia n ORDER BY n.fecha DESC');


        $paginationAdapter = new PaginationAdapter($query);
        

        $this->paginator = new Zend_Paginator($paginationAdapter);
        $this->paginator->setItemCountPerPage(8)
                ->setCurrentPageNumber($page)
                ->setPageRange(10);


        $noticias = array();
        foreach ($this->paginator as $noticia)
        {
            $noticiaObj = new My\Entity\Noticia();
            $noticiaObj = $noticia;

            $noticias[$noticia->getId()] = $noticiaObj;
        }

        return $noticias;
    }

    public function getPaginator()
    {
        return $this->paginator;
    }

}