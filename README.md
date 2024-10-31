# Backend para ONG

**Descrição**  
Este projeto é o backend de uma ONG, desenvolvido em PHP, que permite a inscrição de usuários e a criação de eventos e cursos por administradores. O sistema é construído com mysqli para manipulação do banco de dados.

## Tecnologias Utilizadas
- **PHP** para a lógica de negócios
- **MySQL** como sistema de gerenciamento de banco de dados

## Funcionalidades
- **Registro de Usuários**: Os usuários podem se inscrever fornecendo nome, e-mail e senha.
- **Login de Usuários**: Os usuários podem fazer login utilizando suas credenciais.
- **Criação de Eventos**: O administrador pode criar novos eventos com título, descrição e data.
- **Listagem de Eventos**: Os eventos podem ser recuperados e exibidos para os usuários.
- **Criação de Cursos**: O administrador pode criar novos cursos com título, descrição e data.
- **Listagem de Cursos**: Os cursos podem ser recuperados e exibidos para os usuários.


## Passo a Passo de Instalação

1. **Clone o Repositório**  
   Clone o repositório na sua máquina local:

   ```bash
   git clone https://github.com/yann074/backend_carangondePHP
   ```

2. **Configurar as Credenciais do Banco de Dados**  
   No arquivo `config/database.php`, ajuste as variáveis de conexão com o banco de dados conforme necessário.

3. **Instalar Dependências**  
   Este projeto não utiliza dependências externas, mas você pode instalar pacotes adicionais conforme necessário.

4. **Iniciar o Servidor Local**  
   Use um servidor local como XAMPP ou MAMP para executar o projeto. Coloque o diretório `/backend` na pasta `htdocs` (ou equivalente) e acesse `http://localhost/backend/index.php` para testar.

## Próximos Passos
- **Integração com Frontend**: Conectar o backend com a interface do usuário.
- **Validação de Dados**: Melhorar a validação de dados de entrada.

## Contribuições
Contribuições são bem-vindas! Sinta-se à vontade para enviar pull requests ou reportar problemas.

## Licença
Este projeto é desenvolvido para fins de aprendizado e é aberto a contribuições.
```

---

Esse README fornece uma visão clara e abrangente do backend da ONG, incluindo funcionalidades, estrutura de pastas e instruções de instalação. Você pode copiá-lo e colá-lo no seu projeto.
