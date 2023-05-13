## Como executar a API

Para executar a API, primeiro execute o comando que instala todas as dependências utilizadas:

` composer install `

Após isso, crie um arquivo .env com base no arquivo .env.example fornecido. Nele estará as configurações de servidor, como a configuração de conexão com o banco de dados.

Com a conexão com banco de dados estabelecida, o próximo passo é gerar as tabelas e popular cada uma delas. Para isso, execute o comando:

` php artisan migrate --seed `

O próximo passo é iniciar o servidor, para isso execute o comando:

` php artisan serve `
