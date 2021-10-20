# Setup CakeStore - Api

### Postman com os endpoints

https://documenter.getpostman.com/view/2066044/UV5ZAwKV

### Pré-requisitos:
Para trabalhar nesse projeto você ira precisar instalar:
     
*[ Docker ](https://www.docker.com/get-started)			

*[ Docker Compose ](https://docs.docker.com/compose/install/)           

### Instalar o Mysql

*[ Mysql ](https://github.com/vmatteus/docker-mysql)

Descobrindo o ip do docker: docker network inspect genial | grep Gateway

### Preparando o ambiente Docker:

    Subindo ambiente
        sudo docker-compose build
        sudo docker-compose up -d

    Entrando no ambiente docker:
        sudo docker exec -it cakestore-api bash // ou nome do repositorio escolhido

    Renomeie o arquivo .env.example para .env
        chmod 777 .env.example
        cp .env.example .env
        
    Verifique se os apontamentos de banco de dados e demais sistemas estão corretos no arquivo .env...