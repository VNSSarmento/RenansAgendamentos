📅 Sistema de Agendamento Laravel

Um sistema robusto de agendamento de horários desenvolvido com Laravel 11, focado em precisão de fuso horário e experiência do usuário (UX).
🚀 Funcionalidades

    📅 Calendário Dinâmico: Seleção de datas com bloqueio de dias passados.

    ⏰ Filtro de Horário Real-time: O sistema esconde automaticamente horários que já passaram no dia atual.

    🌅 Divisão de Turnos: Organização visual entre horários da Manhã e Tarde/Noite.

    🛡️ Proteção de Fuso Horário: Lógica implementada para garantir que o horário selecionado seja exatamente o gravado no banco, sem distorções de timezone.

    📄 Comprovante PDF: Geração de recibo de agendamento após a confirmação.

    🚫 Regra de Cancelamento: Permite cancelamentos apenas com 24h de antecedência.

🛠️ Tecnologias Utilizadas

    Backend: PHP 8.2+ & Laravel 11

    Frontend: Blade Templates & Tailwind CSS

    Banco de Dados: MySQL / MariaDB

    Documentos: DomPDF (para comprovantes)

📦 Como Instalar o Projeto

Siga os passos abaixo para rodar o sistema na sua máquina:
1. Clonar o repositório
Bash

git clone https://github.com/seu-usuario/nome-do-repositorio.git
cd nome-do-repositorio

2. Instalar dependências
Bash

composer install
npm install && npm run dev

3. Configurar o Ambiente

Copie o arquivo de exemplo e configure suas credenciais de banco de dados:
Bash

cp .env.example .env
php artisan key:generate

4. Migrações e Dados Iniciais (Seeders)

Este passo é fundamental para criar as tabelas e gerar os horários de atendimento (Slots):
Bash

php artisan migrate:fresh --seed --seeder=SlotSeeder

5. Iniciar o Servidor
Bash

php artisan serve

📖 Como Funciona o Sistema
Para o Usuário:

    Login/Registro: O usuário acessa sua conta protegida pelo Laravel Breeze.

    Dashboard: Visualiza um resumo de seus agendamentos ativos e o próximo compromisso.

    Novo Agendamento: * Escolhe uma data no calendário.

        O sistema carrega os horários disponíveis (slots).

        Horários que já passaram (ex: tentar agendar para as 08:00 sendo que já são 10:00) são ocultados automaticamente.

    Confirmação: Ao confirmar, o horário fica indisponível para outros usuários.

Regras de Negócio:

    Horários: O sistema é populado via SlotSeeder, configurado por padrão das 08:00 às 21:00.

    Fuso Horário: O sistema utiliza America/Sao_Paulo. Se você mudar o servidor de país, a lógica de string implementada garante que o horário exibido não mude.

🔧 Comandos Úteis

    Limpar todos os agendamentos e resetar horários:
    php artisan migrate:fresh --seed --seeder=SlotSeeder

    Limpar cache de rotas e visualizações (em caso de bugs visuais):
    php artisan view:clear && php artisan route:clear