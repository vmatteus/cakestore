# Setup CakeStore - Api

### Pré-requisitos:
Para trabalhar nesse projeto você ira precisar instalar:
     
*[ Docker ](https://www.docker.com/get-started)			
*[ Docker Compose ](https://docs.docker.com/compose/install/)           

Seguir os tutoriais de acordo com o repositorio:
*[ Infra ](https://bitbucket.org/okpago/deposite-docker/src/master/)

### Preparando o ambiente Docker:

    Entrando no ambiente docker:
        sudo docker exec -it cakestore-api bash // ou nome do repositorio escolhido

    Renomeie o arquivo .env.example para .env
        chmod 777 .env.example
        cp .env.example .env
        
    Verifique se os apontamentos de banco de dados e demais sistemas estão corretos no arquivo .env...