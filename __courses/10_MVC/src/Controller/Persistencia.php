<?php

namespace Alura\Cursos\Controller;
use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Controller\InterfaceControladorRequisicao;

class Persistencia implements InterfaceControladorRequisicao
{
    private $entityManager;

    function __construct()
    {
        $this->entityManager = EntityManagerCreator::getEntityManager();
    }

    public function processaRequisicao(): void
    {
        if ($_POST['descricao'] === "") {
            header('Location: /cursos', true, 302);
            return;
        }

        $descricao = filter_input(
            INPUT_POST,
            'descricao',
            FILTER_SANITIZE_STRING
        );

        $curso = new Curso();
        $curso->setDescricao($descricao);
        $this->entityManager->persist($curso);
        $this->entityManager->flush();
        header('Location: /cursos', true, 302);
    }
}
