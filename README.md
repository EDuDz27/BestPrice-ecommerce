Instruções rodar o projeto

Acessar o repositório do Git e baixar o projeto:

Acesse o repositório do projeto no GitHub.
Faça o download do projeto ou clone o repositório na sua máquina local com o comando:
<br>
git clone https://github.com/EDuDz27/BestPrice-ecommerce.git


Instalar o XAMPP:

Baixe e instale o XAMPP a partir do site oficial: https://www.apachefriends.org/index.html.
Após a instalação, abra o painel de controle do XAMPP e ligue os servidores Apache e MySQL.


Criar o banco de dados no MySQL:

No painel de controle do XAMPP, clique em "Admin" ao lado de MySQL para acessar o phpMyAdmin.
No phpMyAdmin, clique em "Novo" para criar um novo banco de dados.
Digite o nome do banco de dados "ecommerce", e clique em "Criar".
Depois de criar o banco de dados, abra o SQL do phpMyAdmin e execute o script para criar as tabelas. O código de criação das tabelas está disponível no repositório do projeto, na pasta "database", em um arquivo chamado "ecommerce.sql".


Configurar a conexão com o banco de dados:

No repositório do projeto, procure o arquivo de configuração de banco de dados "BestPrice\config\database.php".
Abra esse arquivo e ajuste as credenciais do banco de dados (usuário, senha, nome do banco) conforme a configuração do seu MySQL.
(Caso tenha seguido os passos ao pé da letra, não sera necessario alterar nada).


Rodar o projeto no navegador:

Mova os arquivos do projeto baixado para a pasta htdocs dentro da instalação do XAMPP (mova a pasta raiz "BestPrice" para dentro da htdocs)

No navegador, digite:
localhost/BestPrice/


Verificar o funcionamento do projeto:

Após acessar localhost/bestprice, o projeto deverá estar funcionando corretamente no seu navegador.





Observações Final

recomendamos usar essas versões:
xampp v3.3.0

