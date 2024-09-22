<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Clientes</title>
    <style>
        h1{
            text-transform: uppercase;
        }
        main{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: Arial, Helvetica, sans-serif;
        }
        section{
            display: flex;
            flex-wrap: wrap;
            width: 80vw;
            justify-content: center;
            gap: 50px;
        }
        .cliente{
            display: flex;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            background-color: #00ff00;
            width: 22vw;
            height: 20vh;
            border: 1px solid black;
            font-size: 17px;
            transition: width 0.5s ease, height 0.5s ease;
        }
        .cliente:hover{
            cursor: pointer;
            background-color: green;
            width: 25vw;
            height: 22vh;
        }
    </style>
</head>
<body>
    <main>
        <h1>Lista de clientes</h1>
        <section>
        <?php
        $localhost = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'armazenar_clientes';
        
        $conn = new mysqli($localhost,$user,$password,$database);
        
        if($conn ->connect_error){
            echo 'Falha na conexão' . $conn->connect_error;
        }

        $sql = "SELECT * FROM clientes";
        $result = mysqli_query($conn,$sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                    echo '<div class="cliente">';
                    echo '<p>ID:' . $row['id_cliente'] .'</p>' ;
                    echo '<p>Nome:' . $row['nome_cliente'] .'</p>' ;
                    echo '<p>Email:' . $row['email_cliente'] .'</p>' ;
                    echo '</div>';
                }}else{
                    echo 'Não há nenhum cliente registrado';
                }
            } else {
                echo 'Erro na consulta do Banco:' . mysqli_error($conn);
            }
        ?>
        </section>
    </main>
</body>
</html>
