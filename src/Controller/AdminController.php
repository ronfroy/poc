<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment as TemplateEngine;

class AdminController
{
    /** @var TemplateEngine */
    private $engine;

    /** @var UrlGeneratorInterface */
    private $router;

    /**
     * AdminController constructor.
     *
     * @param TemplateEngine        $engine
     * @param UrlGeneratorInterface $router
     */
    public function __construct(TemplateEngine $engine, UrlGeneratorInterface $router)
    {
        $this->engine = $engine;
        $this->router = $router;
    }

    /**
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     *
     * @return Response
     */
    public function index(): Response
    {
        $apiEntryPoint = $this->router->generate('api_entrypoint', [], UrlGeneratorInterface::ABSOLUTE_URL);

        $content = $this->engine->render('admin.html.twig', ['apiEntryPoint' => $apiEntryPoint]);

        return new Response($content);
    }
}
