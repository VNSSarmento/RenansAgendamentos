<!DOCTYPE html>
<html>
<head>
    <title>Comprovante de Agendamento</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .header { text-align: center; border-bottom: 2px solid #3b82f6; padding-bottom: 10px; }
        .content { margin-top: 30px; }
        .info-box { background: #f3f4f6; padding: 20px; border-radius: 8px; }
        .footer { margin-top: 50px; text-align: center; font-size: 12px; color: #666; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Comprovante de Agendamento</h1>
    </div>

    <div class="content">
        <p>Olá, <strong>{{ $appointment->user->name }}</strong>.</p>
        <p>Seu agendamento foi confirmado com sucesso. Confira os detalhes abaixo:</p>

        <div class="info-box">
            <p><strong>Data:</strong> {{ $appointment->slot->start_time->format('d/m/Y') }}</p>
            <p><strong>Horário:</strong> {{ $appointment->slot->start_time->format('H:i') }} às {{ $appointment->slot->end_time->format('H:i') }}</p>
            <p><strong>Status:</strong> {{ $appointment->status }}</p>
            <p><strong>Código:</strong> #{{ $appointment->id }}</p>
        </div>
    </div>

    <div class="footer">
        <p>Gerado em {{ date('d/m/Y H:i') }} - Sistema de Agendamentos</p>
    </div>
</body>
</html>