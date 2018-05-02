<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Post;


/**
 * Class ContentController
 * @package AppBundle\Controller
 */
class ContentController extends Controller
{

    /**
     * @Route("/content/list", name="content_list")
     *
     * @return Response
     */
    public function listAction(){
        $repository = $this->getDoctrine()->getRepository(Post::class);
        $posts = $repository->findBy(array('active' => true));
        return $this->render('posts.html.twig', array(
            'posts' => $posts,
        ));
    }


    /**
     * @Route("/content/detail/{post_id}", name="content_detail")
     *
     * @param $post_id
     * @return Response
     */
    public function detailAction($post_id){
        $repository = $this->getDoctrine()->getRepository(Post::class);
        $post = $repository->findOneBy(array('id' => $post_id)); //Limit to 1 record
        return $this->render('detail.html.twig', array(
            'post' => $post,
        ));
    }

}
