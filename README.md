# Admin-Secretaria 

Este projeto foi desenvolvido como solução para um "Desafio", com o objetivo de criar uma aplicação para a secretaria gerenciar alunos, turmas e matrículas.

## Visão Geral do Projeto

A aplicação `admin-secretaria` é um sistema web construído em PHP puro, seguindo uma estrutura baseada no padrão MVC. O sistema permite o gerenciamento administrativo das entidades Alunos, Turmas e Matrículas, além de contar com um sistema de autenticação  para proteger o acesso às funcionalidades administrativas.

## Atendimento aos Requisitos do Desafio

Esta seção detalha como o projeto atende aos requisitos especificados no documento do desafio.

### 1. Telas e Funcionalidades Principais

* **Aluno:** 
    * Implementado CRUD completo: Cadastro, Listagem, Edição e Exclusão de alunos.
    * Campos armazenados: Nome, Data de Nascimento, CPF, E-mail e Senha. 
    * *Localização no código:*
        * Controller: `app/controllers/AlunoController.php`
        * Model: `app/models/Aluno.php`
        * Views: `app/views/aluno/`

* **Turma:** 
    * Implementado CRUD completo: Cadastro, Listagem, Edição e Exclusão de turmas. 
    * Campos armazenados: Nome e Descrição.
    * *Localização no código:*
        * Controller: `app/controllers/TurmaController.php`
        * Model: `app/models/Turma.php`
        * Views: `app/views/turma/`

* **Matrícula:** 
    * **Status:** 
    * A funcionalidade de matricular um aluno em uma turma e a visualização de alunos por turma está na tabela de Turma(Botão para isso)
    * *Localização no código:*
        * Controller: `app/controllers/MatriculaController.php`
        * Model: `app/models/Matricula.php`
        * Views: `app/views/matricula/`

* **Bônus - Página de Login:** 
    * Implementada página de login para administradores. 
    * Todas as páginas administrativas principais (Aluno, Turma, Matrícula) são acessíveis somente por usuários logados. 
    * Autenticação via e-mail e senha (com credenciais fixas para demonstração: `user@teste.com` / `=@j14&@bO6ZV`).
    * *Localização no código:*
        * Controller: `app/controllers/UsuarioController.php`
        * View: `app/views/usuario/login.php`

### 2. Regras de Negócio (RN)

Abaixo, o status de implementação de cada regra de negócio solicitada:

* **RN01: As listagens devem ser ordenadas sempre alfabeticamente por padrão.** 
    * **Status:** ✅ Implementado.
    * **Detalhes:** As listagens de Alunos e Turmas são ordenadas pelo nome em ordem ascendente diretamente nas consultas SQL.

* **RN02: Validar se o nome do aluno e da turma possuem no mínimo 3 caracteres.** 
    * **Status:** ✅ Implementado.
    * **Detalhes:** Validação presente nos controllers `AlunoController` e `TurmaController` para as ações de inserção e atualização.

* **RN03: Validar se todos os campos foram preenchidos obrigatoriamente e se os dados inseridos são válidos.** 
    * **Status:** ✅ Implementado (parcialmente para validade completa, mas campos obrigatórios são verificados).
    * **Detalhes:** Os controllers verificam se os campos obrigatórios estão preenchidos. Validações específicas como formato de e-mail (intrínseco ao tipo de input HTML e filtro PHP) e CPF (formato e cálculo) também estão presentes para Alunos.

* **RN04: Um aluno não pode ser matriculado 2x no mesmo curso (turma).** 
    * **Status:** ✅ Implementado.

* **RN05: Um aluno só pode ser cadastrado uma única vez de acordo com o CPF ou e-mail.** 
    * **Status:** ✅ Implementado.
    * **Detalhes:** O `AlunoController` utiliza o método `isAluno()` do `AlunoModel` para verificar a duplicidade antes de inserir um novo aluno.

* **RN06: Na listagem da turma, devem ser exibidos quantos alunos cada turma possui.**
    * **Status:** ✅ Implementado.

* **RN07: O sistema não deve permitir o cadastro de senhas fracas, exigindo o padrão de no mínimo 8 caracteres com letras maiúsculas, minúsculas, letras e símbolos.**
    * **Status:** ✅ Implementado.
    * **Detalhes:** A função `isSenhaForte()` no `AlunoController` valida a senha dos alunos durante o cadastro e atualização.

* **RN08: A senha deve ser armazenada criptografada no banco de dados.** 
    * **Status:** ✅ Implementado.
    * **Detalhes:** A senha dos alunos é criptografada usando `password_hash()` antes de ser salva no banco de dados.

* **RN09: As turmas devem ser exibidas de maneira paginada a cada 10 itens.** 
    * **Status:** ✅ Implementado (via DataTables).
    * **Detalhes:** A listagem de turmas utiliza a biblioteca JavaScript DataTables, que por padrão já oferece paginação (configurada para 10 itens por página) e outras funcionalidades de interação.

* **RN10: Deve ser possível buscar alunos pelo nome.**
    * **Status:** ✅ Implementado (via DataTables).
    * **Detalhes:** A listagem de alunos utiliza DataTables, que inclui um campo de busca permitindo filtrar alunos por qualquer um dos campos visíveis, incluindo o nome.

### 3. Tecnologias Utilizadas 

* **PHP:** Versão 7.4 ou superior (projeto desenvolvido com PHP puro, sem frameworks). 
* **MySQL:** Para persistência dos dados. 
* **HTML5, CSS3, JavaScript**
* **Bootstrap 5:** Para estilização e componentes de front-end.
* **jQuery:** Dependência para DataTables.
* **DataTables:** Para melhorar a interatividade e usabilidade das listagens.
* **Servidor Web:** Requer um servidor web com suporte a PHP (ex: Apache, Nginx, ou o servidor embutido do PHP para desenvolvimento).

### 4. Orientações para Instalação e Execução 

1.  **Pré-requisitos:**
    * PHP >= 7.4 
    * MySQL Server
    * Servidor Web: Apache foi desenvolvindo com esse ou do proprio.
    * Git 

2.  **Clone o Repositório:**
    ```bash
    git clone https://github.com/laurielylourenco/admin-secretaria
    cd admin-secretaria-dev # ou o nome da pasta do projeto
    ```

3.  **Banco de Dados:** 
    * Crie um banco de dados MySQL. O nome `admin_secretaria` é usado no `dump.sql` e `config.php`.
    * Importe o arquivo `dump.sql` fornecido na raiz do projeto para criar as tabelas (`usuarios`, `alunos`, `turmas`) e o usuário `admin` para acesso ao banco.
        ```bash
        mysql -u seu_usuario_root_mysql -p < dump.sql
        ```
        * **Observação:** O `dump.sql` tenta criar um usuário `'admin'@'localhost'` com a senha `'qUlH45013{'`. Se preferir usar um usuário MySQL existente, ajuste as permissões para o banco `admin_secretaria` e atualize o arquivo `config/config.php`.

4.  **Configuração da Aplicação:**
    * Verifique o arquivo `config/config.php`.
    * Ajuste as constantes `DB_HOST`, `DB_NAME`, `DB_USER`, e `DB_PASS` conforme sua configuração do MySQL, caso não tenha usado o usuário criado pelo `dump.sql`.
    * Ajuste a `URL_BASE` para a URL raiz do seu projeto no servidor local (ex: `http://localhost/admin-secretaria-dev/public/`). É crucial que termine com `/public/`.

5.  **Servidor Web:**
    * Configure seu servidor web para que o *DocumentRoot* (diretório raiz do site) aponte para a pasta `public/` dentro do projeto.
    * **Usando o servidor embutido do PHP (para desenvolvimento):**
        Navegue até a pasta `public/` do projeto no terminal e execute:
        ```bash
        php -S localhost:8000
        ```
        Neste caso, a `URL_BASE` seria `http://localhost:8000/` (sem o `/public/` no final, pois já estamos servindo a partir dela). Adapte a `URL_BASE` em `config.php` se usar este método.

6.  **Acesso ao Sistema:**
    * Abra o navegador e acesse a `URL_BASE` configurada.
    * **Credenciais de Login (Administrador do Sistema - Bônus):** 
        * **Email:** `user@teste.com`
        * **Senha:** `=@j14&@bO6ZV`
        (Estas credenciais são vindas BD no `UsuarioController.php` para fins de demonstração).

### 5. Estrutura do Projeto

O projeto adota uma arquitetura MVC simplificada para organizar o código:

* `public/`: Ponto de entrada da aplicação (`index.php`).
* `app/`: Núcleo da aplicação.
    * `controllers/`: Lógica de controle e requisições.
    * `models/`: Interação com o banco de dados e regras de negócio dos dados.
    * `views/`: Camada de apresentação (HTML).
* `core/`: Classes base do sistema (Roteamento, Conexão com BD, Controller Base).
* `config/`: Arquivos de configuração.
* `dump.sql`: Script do banco de dados.

### 6. Observações Adicionais

* **Usabilidade:** O layout foi desenvolvido utilizando Bootstrap 5 para garantir uma interface limpa e responsiva. A biblioteca DataTables foi incorporada para facilitar a visualização, ordenação e busca de dados nas listagens.
* **PHP Puro:** Conforme solicitado, o projeto foi desenvolvido sem o uso de frameworks PHP. 
