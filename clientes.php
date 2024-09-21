<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Mostrar Clientes</title>
</head>
<body>
    <main>
        <h1>Lista de clientes</h1>
        <table border="1" cellpadding = '10'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>
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
                    echo '<tr>';
                    echo  '<td>' . $row['id_cliente'] .'</td>';
                    echo  '<td>' . $row['nome_cliente'] .'</td>';
                    echo  '<td>' . $row['email_cliente'] .'</td>';
                    echo '</tr>';
                }}else{
                    echo 'Não há nenhum cliente registrado';
                }
            } else {
                echo 'Erro na consulta do Banco:' . mysqli_error($conn);
            }
    
        ?>
        </table>
    </main>
</body>
</html>