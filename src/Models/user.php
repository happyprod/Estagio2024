<?php

namespace App\Models;

use PDO;

class User
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }


    public function getAccountByDirectory($lastDirectoryName)
    {
        // Prepara uma consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o url corresponde ao nome do último diretório
        $stmt = $this->db->prepare('SELECT * FROM accounts WHERE id = ?');

        // Executa a consulta SQL, substituindo o marcador de posição '?' pelo valor de $lastDirectoryName
        $stmt->execute([$lastDirectoryName]);

        // Obtém o resultado da consulta
        return $result = $stmt->fetch(PDO::FETCH_ASSOC); // Retorna a primeira linha do resultado como um array associativo

    }

    public function getEditarImagens($count, $p_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM projects_images WHERE id_project = ? ORDER BY ordem");
        $stmt->execute([$p_id]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function getProjects($id)
    {
        $sql = "SELECT * FROM projects WHERE id_founder = ?"; // Use placeholder para PDO

        $stmt_projects = $this->db->prepare($sql);
        $stmt_projects->execute([$id]);  // Vincula o parâmetro $id
        $result = $stmt_projects->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getProjectsImages($p_id)
    {
        $sql2 = "SELECT * FROM projects_images WHERE id_project = ? ORDER BY ordem"; // Use placeholder for PDO

        $stmt_projects2 = $this->db->prepare($sql2);
        $stmt_projects2->execute([$p_id]);  // Bind the id parameter
        return $result2 = $stmt_projects2->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEditarInfoProjects($count, $p_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM projects WHERE id = ?");
        $stmt->execute([$p_id]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function getEditarInfoProjectsCollabs($count, $p_id)
    {
        $stmt = $this->db->prepare("SELECT accounts.name as name, accounts.picture as picture, accounts.id_name as idName
        FROM accounts
        JOIN projects_collabs AS ids ON accounts.id = ids.id_user 
        WHERE ids.id_project = ?");
        $stmt->execute([$p_id]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function getBookingUsersComplete($pesquisa)
    {
        session_start();
        $user_id = $_SESSION['user_id'];

        $pesquisa = '%' . $pesquisa . '%'; // Adiciona wildcards para a consulta LIKE
        $stmt = $this->db->prepare("SELECT * FROM accounts WHERE id_name LIKE ? AND identity = ? AND id <> ? LIMIT 5");
        $stmt->execute([$pesquisa, 4, $user_id]);  // Bind the id parameter and the identity value
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Log para verificar o resultado da consulta
        error_log(print_r($result, true));

        return $result;
    }

    public function getEventUsersComplete($pesquisa)
    {
        session_start();
        $user_id = $_SESSION['user_id'];

        $pesquisa = '%' . $pesquisa . '%'; // Adiciona wildcards para a consulta LIKE
        $stmt = $this->db->prepare("SELECT * FROM accounts WHERE id_name LIKE ? AND identity = ? AND id <> ? LIMIT 5");
        $stmt->execute([$pesquisa, 5, $user_id]);  // Bind the id parameter and the identity value
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Log para verificar o resultado da consulta
        error_log(print_r($result, true));

        return $result;
    }

    public function getUsersComplete($pesquisa)
    {
        session_start();
        $user_id = $_SESSION['user_id'];

        $pesquisa = '%' . $pesquisa . '%'; // Adiciona wildcards para a consulta LIKE
        $stmt = $this->db->prepare("SELECT * FROM accounts WHERE id_name LIKE ? AND id <> ? LIMIT 5");
        $stmt->execute([$pesquisa, $user_id]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Log para verificar o resultado da consulta
        error_log(print_r($result, true));

        return $result;
    }

    public function inserirEvento($dadosEvento)
    {
        $nomeEvento = $dadosEvento['nomeEvento'] ?? '';
        $identificacaoEvento = $dadosEvento['identificacaoEvento'] ?? '';
        $descricao = $dadosEvento['descricao'] ?? '';
        $data = $dadosEvento['data'] ?? '';
        $empresaBooking = $dadosEvento['empresaBooking'] ?? '';
        $localizacao = $dadosEvento['localizacao'] ?? '';
        $switchEvento = $dadosEvento['switchEvento'] ?? '';
        $switchData = $dadosEvento['switchData'] ?? '';
        $switchBooking = $dadosEvento['switchBooking'] ?? '';
        $switchLocal = $dadosEvento['switchLocal'] ?? '';
        $switchCollabs = $dadosEvento['switchCollabs'] ?? '';
        $id_projeto = $dadosEvento['id_projeto'] ?? '';

        $stmt = $this->db->prepare("UPDATE Projects SET nome = ?, Event = ?, descricao = ?, data = ?, Booking = ?, local = ?, Active_Event = ?, Active_Data = ?, Active_Booking = ?, Active_local = ?, Active_Collab = ? WHERE id = ?");
        $stmt->bindParam(1, $nomeEvento);
        $stmt->bindParam(2, $identificacaoEvento);
        $stmt->bindParam(3, $descricao);
        $stmt->bindParam(4, $data);
        $stmt->bindParam(5, $empresaBooking);
        $stmt->bindParam(6, $localizacao);
        $stmt->bindParam(7, $switchEvento);
        $stmt->bindParam(8, $switchData);
        $stmt->bindParam(9, $switchBooking);
        $stmt->bindParam(10, $switchLocal);
        $stmt->bindParam(11, $switchCollabs);
        $stmt->bindParam(12, $id_projeto);
        $stmt->execute();
    }

    public function verificarEvento($evento)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];

        $evento = '%' . $evento . '%'; // Adiciona wildcards para a consulta LIKE

        // Mensagem de debug para verificar os parâmetros
        error_log("Parâmetros de verificarEvento: evento = $evento, identity = 5, user_id = $user_id");

        $stmt = $this->db->prepare("SELECT * FROM accounts WHERE id_name LIKE ? AND identity = ? AND id <> ? LIMIT 1");
        $stmt->execute([$evento, 5, $user_id]);  // Bind the id parameter and the identity value

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        // Log para verificar o resultado da consulta
        error_log("Resultado da consulta verificarEvento: " . print_r($result, true));

        // Retorna true se um registro foi encontrado, false caso contrário
        return $result !== false;
    }

    public function verificarBooking($booker)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];

        $booker = '%' . $booker . '%'; // Adiciona wildcards para a consulta LIKE

        // Mensagem de debug para verificar os parâmetros
        error_log("Parâmetros de verificarBooking: booker = $booker, identity = 4, user_id = $user_id");

        $stmt = $this->db->prepare("SELECT * FROM accounts WHERE id_name LIKE ? AND identity = ? AND id <> ? LIMIT 1");
        $stmt->execute([$booker, 4, $user_id]);  // Bind the id parameter and the identity value

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        // Log para verificar o resultado da consulta
        error_log("Resultado da consulta verificarBooking: " . print_r($result, true));

        // Retorna true se um registro foi encontrado, false caso contrário
        return $result !== false;
    }

    function getEditarPrivacy($p_id)
    {
        $stmt = $this->db->prepare("SELECT PrivacyProjects, PrivacyLikes, PrivacyComments FROM projects WHERE id = ?");
        $stmt->execute([$p_id]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    function getEstatisticas7dias($p_id)
    {
        $stmt = $this->db->prepare("SELECT 
                                        DATE_FORMAT(data, '%Y-%m-%d') AS dia,
                                        SUM(impressions) AS impressions,
                                        SUM(likes) AS likes,
                                        SUM(comments) AS comments,
                                        SUM(organic) AS organic
                                    FROM projects_stats_snapshot
                                    WHERE id_projeto = ?
                                        AND data >= DATE_SUB(CURDATE(), INTERVAL 6 DAY)  -- Ajustado para exatamente 7 dias atrás
                                        AND data <= CURDATE()  -- Inclui apenas até a data atual
                                    GROUP BY dia
                                    ORDER BY dia");
        $stmt->execute([$p_id]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    function getEstatisticas30dias($p_id)
    {
        $stmt = $this->db->prepare("SELECT 
                                        DATE_FORMAT(data, '%Y-%u') AS semana,
                                        id_projeto,
                                        SUM(impressions) AS impressions,
                                        SUM(likes) AS likes,
                                        SUM(comments) AS comments,
                                        SUM(organic) AS organic
                                    FROM 
                                        projects_stats_snapshot 
                                    WHERE 
                                        id_projeto = ?
                                        AND data >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)
                                    GROUP BY 
                                        semana, id_projeto
                                    ORDER BY 
                                        semana ASC");
        $stmt->execute([$p_id]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    function getEstatisticas1ano($p_id)
    {
        $stmt = $this->db->prepare("SELECT DATE_FORMAT(data, '%Y-%m') AS mes_ano, SUM(impressions) AS impressions, SUM(likes) AS likes, SUM(comments) AS comments, SUM(organic) AS organic FROM projects_stats_snapshot WHERE id_projeto = ? AND data >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) GROUP BY mes_ano ORDER BY mes_ano");
        $stmt->execute([$p_id]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    function getEstatisticastudo($p_id)
    {
        $stmt = $this->db->prepare("SELECT 
                    DATE_FORMAT(data, '%Y-%m') AS mes_ano,
                    SUM(impressions) AS impressions,
                    SUM(likes) AS likes,
                    SUM(comments) AS comments,
                    SUM(organic) AS organic
                FROM projects_stats_snapshot
                WHERE id_projeto = ?
                GROUP BY mes_ano
                ORDER BY mes_ano");
        $stmt->execute([$p_id]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    function getEstatisticasProjeto($p_id)
    {
        $stmt = $this->db->prepare("SELECT impressions, likes, comments, organic FROM projects_stats_snapshot WHERE id_projeto = ?");
        $stmt->execute([$p_id]);  // Bind the id parameter
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function editarPrivacidade($dados)
    {
        // Ler dados enviados via POST
        $id_projeto = $dados['id_projeto'];
        $projetos = $dados['projetos'];
        $gostos = $dados['gostos'];
        $comentarios = $dados['comentarios'];

        $stmt = $this->db->prepare("UPDATE projects SET 
        PrivacyProjects = ?, 
        PrivacyLikes = ?, 
        PrivacyComments = ? 
        WHERE id = ?");

        $stmt->bindParam(1, $projetos);
        $stmt->bindParam(2, $gostos);
        $stmt->bindParam(3, $comentarios);
        $stmt->bindParam(4, $id_projeto);
        $stmt->execute();
    }

    public function apagarProjeto($p_id)
    {
        $stmt = $this->db->prepare("DELETE FROM projects WHERE id = ?");

        $stmt->bindParam(1, $p_id);
        $stmt->execute();
    }

    public function getAccountById($id)
    {
        // Prepara outra consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o id corresponde ao id obtido anteriormente
        $sql_infos = "SELECT * FROM accounts WHERE id = ?";
        $stmt_infos = $this->db->prepare($sql_infos);
        $stmt_infos->execute([$id]);
        return $row_infos = $stmt_infos->fetch(PDO::FETCH_ASSOC);
    }

    public function getRatings($id)
    {
        // Consulta SQL para obter os dados desejados
        $sql = "SELECT r.stars, r.date, r.comentario, a.picture, a.id, a.name 
         FROM rating AS r
         INNER JOIN accounts AS a ON r.id_send = a.id
         WHERE r.id_receive = ?";

        $stmt_rating = $this->db->prepare($sql);
        $stmt_rating->execute([$id]);  // Bind the id parameter
        return $ratings = $stmt_rating->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRatingsAccounts($id)
    {
        // Prepara outra consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o id corresponde ao id obtido anteriormente
        $sql = "SELECT r.stars, r.comentario, a.picture, a.id, a.name 
        FROM rating AS r
        INNER JOIN accounts AS a ON r.id_send = a.id
        WHERE r.id_receive = ?"; // Use placeholder for PDO

        $stmt_rating = $this->db->prepare($sql);
        $stmt_rating->execute([$id]);  // Bind the id parameter
        return $ratings = $stmt_rating->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getShowsQuantidade($id)
    {
        // Prepara outra consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o id corresponde ao id obtido anteriormente
        $sql_shows = "SELECT COUNT(*) as shows FROM projects WHERE id_founder = ?";
        $stmt_shows = $this->db->prepare($sql_shows);
        $stmt_shows->execute([$id]);
        return $row_shows = $stmt_shows->fetch(PDO::FETCH_ASSOC);
    }

    public function getavgStars($id)
    {
        // Prepara outra consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o id corresponde ao id obtido anteriormente
        $sql_avg_rating = "SELECT AVG(stars) as avg_stars FROM rating WHERE id_receive = ?";
        $stmt_avg_rating = $this->db->prepare($sql_avg_rating);
        $stmt_avg_rating->execute([$id]);
        $row_avg_rating = $stmt_avg_rating->fetch(PDO::FETCH_ASSOC);
        $valor = $row_avg_rating["avg_stars"];
        return $numero_arredondado = round($valor, 1); // arredonda para 12.35
    }

    public function getFollowsQuantidade($id)
    {
        // Prepara outra consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o id corresponde ao id obtido anteriormente
        $sql_follows = "SELECT COUNT(*) as following FROM follows WHERE id_user = ?";
        $stmt_follows = $this->db->prepare($sql_follows);
        $stmt_follows->execute([$id]);
        $row_avg_rating = $stmt_follows->fetch(PDO::FETCH_ASSOC);
        return $following = $row_avg_rating["following"];
    }

    public function getFollowingsQuantidade($id)
    {
        // Prepara outra consulta SQL utilizando o PDO para selecionar todos os campos da tabela 'accounts' onde o id corresponde ao id obtido anteriormente
        $sql_follows = "SELECT COUNT(*) as following FROM follows WHERE id_followed = ?";
        $stmt_follows = $this->db->prepare($sql_follows);
        $stmt_follows->execute([$id]);
        $row_avg_rating = $stmt_follows->fetch(PDO::FETCH_ASSOC);
        return $following = $row_avg_rating["following"];
    }

    public function getVerificarDias($p_id)
    {
        $p_id = 1;  // ID do projeto (exemplo)
        $sql = "SELECT data FROM projects WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$p_id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $dataBanco = $row['data'];

            // Obter a data atual em formato de timestamp
            $dataAtual = time();

            // Converter a data do banco de dados para timestamp
            $dataBancoTimestamp = strtotime($dataBanco);

            // Calcular a diferença em segundos
            $diferencaEmSegundos = $dataAtual - $dataBancoTimestamp;
fff
            // Converter a diferença para dias, semanas, meses e anos
            $diferencaEmDias = floor($diferencaEmSegundos / (60 * 60 * 24));
            $diferencaEmSemanas = floor($diferencaEmDias / 7);
            $diferencaEmMeses = floor($diferencaEmDias / 30);  // Aproximação para meses
            $diferencaEmAnos = floor($diferencaEmDias / 365);  // Aproximação para anos

            echo "Diferença total em dias: $diferencaEmDias dias<br>";
            echo "Diferença total em semanas: $diferencaEmSemanas semanas<br>";
            echo "Diferença total em meses: $diferencaEmMeses meses<br>";
            echo "Diferença total em anos: $diferencaEmAnos anos<br>";
        } else {
            echo "Nenhum registro encontrado para o ID $p_id.";
        }
    }
}
