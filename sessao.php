<?php
// sessao.php

// Inicia a sessão
session_start();

// Verifica se o usuário está logado
function verificarLogin() {
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || !isset($_SESSION['user_tipo'])) {
        // Se o usuário não está logado, redireciona para a página de login
        header('Location: login-aluno.php');
        
        exit;
    }
}

// Define uma função para obter o ID do usuário
function getUserId() {
    return $_SESSION['user_id'] ?? null;
}

// Define uma função para obter o nome do usuário
function getUserName() {
    return $_SESSION['user_name'] ?? null;
}

// Define uma função para obter o tipo: CRO ou CRP do usuário
function getUserTipo() {
    return $_SESSION['user_tipo'] ?? null;
}