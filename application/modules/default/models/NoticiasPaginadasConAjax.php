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


        $query = $this->_em->createQuery('SELECT n FROM My\Entity\Noticia n');


        $paginationAdapter = new PaginationAdapter($query);
        $paginationAdapter->useArrayResult();

        $this->paginator = new Zend_Paginator($paginationAdapter);
        $this->paginator->setItemCountPerPage(2)
                ->setCurrentPageNumber($page)
                ->setPageRange(10);


        $noticias = array();
        foreach ($this->paginator as $noticia)
        {
            $noticias[$noticia['id']] = $noticia;
        }

        return $noticias;
    }

    public function getPaginator()
    {
        return $this->paginator;
    }

}