# Sharks Consultoria - Sistema de Gestão de Empréstimos

<div align="center">
  <img src="public/imagens/logo.png" alt="CobraCerta Logo" width="200"/>
  
  [![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
  [![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
  [![TailwindCSS](https://img.shields.io/badge/TailwindCSS-4.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
  [![Vite](https://img.shields.io/badge/Vite-6.x-646CFF?style=for-the-badge&logo=vite&logoColor=white)](https://vitejs.dev)
</div>

## 📋 Sobre o Projeto

O CobraCerta é um sistema completo de gestão de empréstimos desenvolvido com Laravel e TailwindCSS. Ele oferece uma solução robusta para empresas que precisam gerenciar empréstimos, clientes, contratos e pagamentos de forma eficiente e organizada.

## ✨ Funcionalidades Principais

### 👥 Gestão de Clientes
- Cadastro completo de clientes
- Dados pessoais e de contato
- Endereço completo com CEP
- Histórico de empréstimos
- Validação de CPF e email únicos

### 📄 Gestão de Contratos
- Criação de contratos de empréstimo
- Cálculo automático de juros
- Definição de período e valor das parcelas
- Status do contrato (ativo, finalizado, cancelado)
- Histórico completo de pagamentos

### 💰 Gestão de Parcelas
- Geração automática de parcelas
- Registro de pagamentos
- Múltiplas formas de pagamento
- Status de parcelas (pendente, pago, atrasado)
- Pagamento em lote ou individual

### 📊 Dashboard
- Visão geral do negócio
- Métricas financeiras em tempo real
- Gráficos de pagamentos por mês
- Gráficos de novos clientes
- Filtros por período e cliente

## 🛠️ Tecnologias Utilizadas

- **Backend**
  - Laravel 12
  - PHP 8.2
  - MySQL/SQLite
  - Laravel Sanctum (API)

- **Frontend**
  - TailwindCSS 4
  - Vite 6
  - Chart.js
  - JavaScript

- **Ferramentas**
  - Laravel Vite Plugin
  - Axios
  - Laravel Mix

## 🚀 Instalação

1. Clone o repositório
```bash
git clone https://github.com/seu-usuario/cobracerta.git
cd cobracerta
```

2. Instale as dependências do PHP
```bash
composer install
```

3. Instale as dependências do Node.js
```bash
npm install
```

4. Configure o arquivo .env
```bash
cp .env.example .env
php artisan key:generate
```

5. Configure o banco de dados no arquivo .env
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cobracerta
DB_USERNAME=root
DB_PASSWORD=
```

6. Execute as migrações
```bash
php artisan migrate
```

7. Inicie o servidor de desenvolvimento
```bash
php artisan serve
npm run dev
```

## 🔒 Segurança

- Autenticação completa com Laravel
- Proteção contra CSRF
- Validação de dados
- Sanitização de inputs
- Tokens de API seguros
- Senhas criptografadas

## 📱 Responsividade

- Design totalmente responsivo
- Menu lateral adaptativo
- Interface otimizada para mobile
- Experiência consistente em todos os dispositivos

## 🤝 Contribuindo

1. Faça um Fork do projeto
2. Crie uma Branch para sua Feature (`git checkout -b feature/AmazingFeature`)
3. Faça o Commit das suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Faça o Push para a Branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 👨‍💻 Autor

Seu Nome - [@seu-usuario](https://github.com/seu-usuario)

## 🙏 Agradecimentos

- [Laravel](https://laravel.com)
- [TailwindCSS](https://tailwindcss.com)
- [Vite](https://vitejs.dev)
- [Chart.js](https://www.chartjs.org)
