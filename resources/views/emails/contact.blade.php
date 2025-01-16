<!DOCTYPE html>
<html>
<head>
    <title>Contact Bericht</title>
</head>
<body>
    <h1>Nieuw Bericht</h1>
    <p><strong>Naam:</strong> {{ $data['name'] ?? 'Geen naam opgegeven' }}</p>
    <p><strong>Email:</strong> {{ $data['email'] ?? 'Geen e-mailadres opgegeven' }}</p>
    <p><strong>Bericht:</strong> {{ $data['subject'] ?? 'Geen bericht opgegeven' }}</p>
</body>
</html>
