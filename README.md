# Super Gestão


## Sobre

Super Gestão, é um sistema desenvolvido em Laravel Utilizando Laravel UI junto com Bootstrap. Sistema totalmente acadêmico, a fim de aprimorar e relembrar lógica e alguns conhecimentos a funcionamento.

## Instalação

- Acesse o repositório do projeto a ser clonado, clique no botão verde “code” e
copie o link do repositório clicando no botão destacado

![image](https://user-images.githubusercontent.com/25908504/155620731-d449cd17-0e5c-41fd-99de-e309d0b2ec53.png)


- Acesse a pasta onde deseja clonar o projeto no seu computador (para quem
usa o XAMPP, pode ser na pasta htdocs), abra um terminal e digite e execute o
comando:
    ### git clone <LINK DO REPOSITÓRIO> 

- Quando subimos um projeto para o repositório remoto, algumas pastas e
arquivos não são enviados, normalmente por serem muito grandes.
É o caso da pasta vendor, que contém as dependências do Laravel e do
projeto. (o arquivo que configura o que não vai ser enviado para o repositório é o
.gitignore, encontrado na raiz do projeto).
- Para que o projeto funcione, precisamos gerar essa pasta vendor, para isso,
entre na pasta do projeto clonado com o comando: 
    ### cd < NOME DA PASTA DO PROJETO CLONADO >
- e depois disso digite e execute o comando 
    ### composer install:
- Após executar o comando composer install, você verá no terminal que serão
instaladas diversas dependências (esse processo pode demorar um pouco).

- Esse comando vai ler o arquivo composer.lock (onde estão descritas as
dependências necessárias e suas respectivas versões) e gerar a pasta vendor com
todas as dependências.

- Você pode perceber que também está faltando o arquivo .env no projeto
clonado, e isso acontece pois este arquivo também está configurado para ser
ignorado nos commits, e normalmente não estará presente nos repositórios, pois
contém dados sensíveis, como as credenciais do banco de dados, servidor de email
e outros.

- Para resolver isso, entra na pasta do projeto (pode ser com o explorador de
arquivos mesmo), procure um arquivo chamado env.example. Este arquivo contém
um template do arquivo .env

- Para resolver isso, entra na pasta do projeto (pode ser com o explorador de
arquivos mesmo), procure um arquivo chamado env.example. Este arquivo contém
um template do arquivo .env

- Agora, abra o terminal novamente na pasta do projeto clonado e execute o
comando php artisan key:generate para gerar uma chave que será inserida
automaticamente no arquivo .env (esse passo é essencial para o funcionamento do
sistema).

![image](https://user-images.githubusercontent.com/25908504/155615603-f1a0205a-1ba9-4889-9153-0ac013457b6c.png)

- Pronto! O projeto clonado já está pronto para ser executado. Lembre-se que
talvez seja necessário executar o comando php artisan migrate para gerar as
tabelas no banco de dados e depois o comando php artisan serve para executar o
projeto
