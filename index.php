<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Agendamento 1.0</title>
</head>
<body>
    
    <header>
        <h1>Sistema de Agendamento 1.0</h1>
        <nav>
            <a href="index.php?menuop=home">Home</a> |
            <a href="index.php?menuop=contatos">Contatos</a> |
            <a href="index.php?menuop=tarefas">Tarefas</a> |
            <a href="index.php?menuop=eventos">Eventos</a> |
        </nav>
    </header>
    <main>
        <?php
            $menuop = (isset($_GET["menuop"]))?$_GET["menuop"]:"home";
            switch ($menuop) {
                case 'home':
                    include("pages/home/home.php");
                    break;
                case 'contatos':
                    include("pages/contacts/contatos.php");
                    break;
                case 'tarefas':
                    include("pages/tarefas/tarefas.php");
                    break;
                case 'eventos':
                    include("pages/events/eventos.php");
                    break;
                
                default:
                    include("pages/home/home.php");
                    break;
            }
        ?>
    </main>

</body>
</html>