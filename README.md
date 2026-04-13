# **Aplicações para Internet - Trabalho A1**

> Site PHP com autenticação por sessão e conteúdo restrito.
> Desenvolvido como atividade avaliativa da disciplina **Aplicações para Internet**.

## Sobre o projeto

Site web que exige login para acessar uma área restrita com conteúdo educacional sobre desenvolvimento web, PHP, MySQL, persistência e Web Services.

## Tecnologias e conceitos aplicados

| Camade | Tecnologia |
|--------|--------|
| Backend | PHP 8+ |
| Frontend | HTML5 · CSS3 · JavaScript |
| Persistência | Arquivo JSON (Sem banco de dados nesta etapa) |
| Segurança |  · Controle de sessão PHP |

## Funcionalidades

- **Autenticação:** Login com e-mail (com filtro de domínio) e senha (regra de complexidade mínima);
- **Cadastro:** Novo usuário gravado no JSON com senha criptografada via ();
- **Controle de sessão:** Timeout de 15 minutos de iniciativa ou logout manual, com checagem de sessão em toda página;
- **Tela de acesso negado:** Redirecionalmento customizado para tentativas sem sessão;
- **Área de conteúdo:** 5 seções com âncoras, navegação interna e retomada de leitura.

## Segurança implementada

- Senhas armazenadas com 'PASSWORD_BCRYPT'
- Validação de domínio de e-mail e complexidade de senha no servidor
- Sessão invalidada por inatividade e por logout explícito
- Acesso às páginas restritas bloqueado sem sessão ativa

## Como rodar localmente

**Pré-requisito:** PHP 8+ instalado (ou XAMPP/WAMPP/Laragon)

```bash

```

## Estrutura de arquivos

## Autor 

Gabriel Garcia G. de Carvalho · UVA · 2026