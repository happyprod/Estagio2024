<?php
require_once __DIR__ . '/../../vendor/autoload.php'; // Inclui o autoload do Composer

use App\Controllers\UserController;
use App\Models\User;
use App\Helpers\Database;

// Conecta ao banco de dados
$db = Database::connect();

// Cria instâncias do modelo e do controlador
$model = new User($db);
$controller = new UserController($model);

// Verifica se as variáveis foram passadas na requisição
if (isset($_GET['var1']) && isset($_GET['var2'])) {
    // Recupera os valores das variáveis
    $count = $_GET['var1'];
    $p_id = $_GET['var2'];
} else {
    // Se as variáveis não foram passadas, retorne um erro ou uma mensagem adequada
    echo "Erro: Variáveis não foram passadas na requisição.";
}

// Obtém os dados
$data = $controller->getEditarPrivacy($p_id);

// Gera o HTML
$html = '';
foreach ($data as $row) {
    $id_projects = htmlspecialchars($row->PrivacyProjects);
    $id_likes = htmlspecialchars($row->PrivacyLikes);
    $id_comments = htmlspecialchars($row->PrivacyComments);

    $html .= '  
                        <div class="row h-100">
                            <div class="col-4">
                                <div class="left-pane w-100 h-100 mx-auto">
                                    <div class="radio-input">
                                        <div id="DivProjeto' . $count . '" onclick="showProject(' . $count . ')">
                                            <input type="radio" id="value-1" name="value-radio" value="value-3">
                                            <label for="value-1">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAABsUlEQVR4nO2YMUvDQBTHf4rYRaWzfgHBCn4FNycVByfdBaud3B0FP4KCs7uD7iLtoNZJVweVdhHUxcUnB6/lCE2a2ti7hPvDg0vukbzf+ydHchDkr0rAHlAHvjTMeAeYICeaA5qAxMQ1UCYHTjS14EdgDZjWWAeedO4KGMNj7VsQvbpetmBW8VgNLdI4EacNzTnHY31qkeZRitNMwvvjS9Ad9JHrQiWAROS64xIcich1xyU4EpHrjkueHDka4v5egUgCjDcg70A7Ze6BryAvwBIwD7z2yW0Diz6C3AOz1nUqQCsFRCXijFOQS+tjdBlYSICJQnTmD12DnFq/yFvAtxbXCyYOQiyYkYP8WF00qum5Xp0378xD5Pjtj+5nCmK6vq35xo2TmLyWdt5oPMEJcQHyAaxo7hRw0Se/nZETkjXImeaZFeou5c2NA5tDOiH/8WgdA88ZFCWuQVwGAQT3LkihHSnpJnbD2sQ246rO5QbkNiEpaS6Nm1lI0oIM1Y2igIgHgesCAggRRzq78XkP6kUBqRYFZHKAz26fY+B/CF+jK+PMLnCT0wUgKCgoKIiR6xep8tEcHYPuTwAAAABJRU5ErkJggg==" alt="Ícone Projeto">
                                                Projeto
                                            </label>
                                        </div>

                                        <div id="DivGostos' . $count . '" onclick="showLikes(' . $count . ')">
                                            <input type="radio" id="value-2" name="value-radio" value="value-2">
                                            <label for="value-2">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAC3UlEQVR4nO2azUtUYRTGfwR1py81NA2iEipoU7tqWVBoQZFL003rQFKJVu1aqSVFQbQKXPQHVFO5dRESrctRIUr7IK2W+VG+8cIRZLpz575fdy7iAw8Mzp3nPY/vO+eec+7ABtYvdgEdwBBQBCaAn8CiUL9+L+/pay4BDeQEEdANjAJ/AGVI/ZmXQJdoZY6tQD/w2SL4SpwFeoFCVibOA9MeDZRzCmgPaUBv/b2ABso5IjvvFS3A2wxNKOEboNmXiVbZblUjTkoMTtgtaVTVmNPAHlsThRodJ5VwzKxS9MMcBK/KeN8mxaqcsi2tCb19pRwErCpwKu1Nsz8HwaoqvJZmN2ZzEKiqwplqX/zuHASpUvJykpFRC8HfwB3gOLAdqJdaaSzm2jF5r16uPQEMAwsW675I6idMS3Fd/R6toLcJ6AP+Cvvkb3E4BnwxXHsZqIsT6zAUWpL/aDVcFVbDSQnOJIaLcUK3DUUe4x8jhjEMxokUDUXOBjDSbhjD0ziRSUORxgBGmgxj0AXtf5g3FNkSwEhkGMNcnMiiocihAEYOG8aw4MOITqe+cd2HkR+GIjrvb/NoYgfwzTCG73FCNhXvTY9Gblmsrwd+zulXyQ3slAcTZyxuhqpS+h2yENL8CuxzMHHQImMq4YCPEqW82dlrYeIA8MFh3Qtxog2W89tVlgzHNkeAjw7rLVUqGjVeOQgrOSKnU5g4B/xyXOt50gJdjuKruf1Kwho3HHdeCTuzanV1s7V5jfZO4Ikn7U9pSqReT4tpvgb2S9/ic4LfQwoUPM965yxbWZVQ8Uah+oKsuGLTBz3IQeCqjHexQCSDY5UTjrv0QE05eqzQgiNaLdpgnyxJKeMFzTU6ZuPysCnIw9CVjEw8Cv3svS3wUZsINGqKRSSj/RmPBnTZ0VOrX0BEMhUvWnZ4y1LFdgYaL1mhTmaxeoz5TPrp+TU/qtGv30l7OiBNkS4kN7Au8Q+VNlCnUHu31AAAAABJRU5ErkJggg==" alt="Ícone Contagem de Gostos">
                                                Contagem de Gostos
                                            </label>
                                        </div>

                                        <div id="DivComentarios' . $count . '" onclick="showComments(' . $count . ')">
                                            <input type="radio" id="value-3" name="value-radio" value="value-3">
                                            <label for="value-3">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACL0lEQVR4nO2ZT0sVYRTGf2UIgUEZKJnQIvsAgpVb/QgS4ndwr3RbZf4p3BgVfQMFLRHvyp3fQEt3RX8o6IbmptRrmyMDZxEXbnNm5tyZ98I88Gwu3HOe8877nvPMO1CiRAkPXASGgQrwFtgHjoC/yiP97Q3wELiv/ykc/cAC8B2QhPwGzAM3ixB+HXgNnKUQ3sg68Arozkv8BHDoILyRB8B4K4Vf0lWXFvOl5nLFZaCag3hRbmpOF3QA6zmKF2XV60nksW2kCV94HFgpmA/Siu/WzlB0AYfatttq60jWrdTvNKS8WE86sRdiAkZ+phM/dKqP+l/OuSRtM87bdOGPKzE5v1oN4LDhkVZa8AQeGfLeswSzBCqK05YCipi6YuSapYD9AIRKE763FPDLEOgDsAg8deKixozLGw3WWFj6/238ccc4D2Jxagg0EHIBNeMWmtGu4MEnwEevLbTX7od4JQCh0oSrlgKmAxAqWQbZoCGQ1cxZTJok4JClgAtqnLzMXJxJEyPNZg7tMB5mzmrSxMDZBItGj3Ee5MU60EdCfApAuCifJxU/EIBoUf4EriUtYDIA4aIcIwU2AxAuwFIa8VHn+B2A+Graq8WRAMRvZLncfRZAx+kgA3YKEl5Le2AbcWJM+FkHTFbhp7rqV3HCdpNEf7Q7Tf7zRtYLPAa+pPQ2s8ANnHEL2AKOgV09E6MG7xO52ClgWV88fujqnulFwTu9Foks8d1QPrOWKEGb4xws8HXGpqFIIgAAAABJRU5ErkJggg==" alt="Ícone Gostos">
                                                Comentarios
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-8" style="padding-left: 0px;">
                                <div class="right-pane w-100 h-100 mx-auto" style="padding-left: 0px;" id="rightPaneContent' . $count . '">
                                    <!-- Conteúdo dinâmico será carregado aqui -->
                                </div>
                            </div>
                        </div>
                    ';
}

// Retorna o HTML
echo $html;

echo '  <script>    
            inserirPrivacyLikes(' . $id_likes . ', ' . $count . ');
            inserirPrivacyComments(' . $id_comments . ', ' . $count . ');
            inserirPrivacyProject(' . $id_projects . ', ' . $count . ');
            showProject(' . $count . ');
            selectCard("cardButton" + ' . $id_projects . ', ' . $count . ');
        </script>';
