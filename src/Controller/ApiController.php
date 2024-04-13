<?php

namespace App\Controller;

use App\Entity\Forum;
use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/api', name: 'api')]
    public function index(): JsonResponse
    {
        $forums = $this->getDoctrine()->getRepository(Forum::class)->findAll();
        $posts = $this->getDoctrine()->getRepository(Post::class)->findAll();
        $data = [
            'forums' => $forums,
            'posts' => $posts
        ];
        return $this->json($data);
    }
}

