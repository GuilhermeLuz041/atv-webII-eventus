O Eventus é uma plataforma web que permite a criação, gerenciamento e participação em eventos.
Usuários podem se cadatrar com visitantes ou organizadores para começarem a utilizar

## 🛠️ Tecnologias Utilizadas

  - Laravel 12 – Framework back-end
  - Laravel Breeze – Sistema de autenticação
  - Tailwind CSS – Estilização 
  - Docker – Para ambiente de desenvolvimento 
  - DomPDF – Geração de PDF
  - Laravel Storage – Upload de foto de perfil

## 🎲 Funcionalidades

Visitantes:
  - Ver eventos disponíveis
  - Comprar ingressos
  - Acompanhar eventos adquiridos
  - Gerenciar seu perfil

Organizadores:
  - Criar, editar e excluir eventos
  - Acompanhar eventos criados
  - Gerenciar seu perfil

Administradores:
  - Aprovar ou rejeitar eventos pendentes
  - Gerenciar usuários do sistema
  - Gerenciar eventos do sistema

## ℹ️ Instruções de Execução

    Após clonar o repositório

    - Instalar dependências:
        - composer install
        - npm install 

    - Gerar os arquivos do front (desenvolvimento)
        - npm run dev

    - Configurar o env
        - clonar o .env.example
        - php artisan key:generate

    - Subir os containers do docker
        - docker-compose up -d

    - Acessar o container e rodar migrations
        - winpty docker exec -it laravel-app bash
        - php artisan migrate --seed
    
    - Ativar armazenamento público
        - php artisan storage:link

## 🧪 Usuários teste

    - Organizador 1:
        - Email: ana.organizador@example.com
        - senha: 123456

    - Organizador 2:
        - Email: bruno.organizador@example.com
        - senha: 123456

    - Visitante 1:
        - Email: carlos.visitante@example.com
        - Senha: 123456
    
    - Visitante 2:
        - Email: diana.visitante@example.com
        - Senha: 123456

    - Admin:
        - Email: admin@example.com
        - Senha: 123456












