
<?php
ini_set('display_errors', 'Off');
include 'inc/vk_api.php';
include 'inc/config.php';
include 'inc/button.php';
echo ('ok');
$vk = new vk_api(VK_KEY, VERSION);
$data = json_decode(file_get_contents('php://input'));
if (isset($data->type) and $data->type == 'message_new') {
    $id = $data->object->from_id;
    $message = $data->object->text;
    if (isset($data->object->peer_id)) $peer_id = $data->object->peer_id;
    $peer_id = $id;
    if (isset($data->object->payload)) {
        $payload = json_decode($data->object->payload, True);
    } else {
        $payload = null;
    }
    if (!file_exists('files/' . $peer_id . '.json')) {
        $task = array('id' => $peer_id, 'stage' => '0', 'rj' => '0');
        file_put_contents('files/' . $peer_id . '.json', json_encode($task));
    }
    $info = json_decode(file_get_contents('files/' . $peer_id . '.json'));
    $stage = $info->{'stage'};
    if (isset($payload['command']) or mb_strtolower($message) == 'привет') {
        $vk->sendButton($peer_id, 'Выбери пункт.', [[BTN_PRE, BTN_STU]]);
        unlink('img/' . $peer_id . '.png');
        $task = array('id' => $peer_id, 'stage' => '0');
        file_put_contents('files/' . $peer_id . '.json', json_encode($task));
    } elseif (isset($payload['fac'])) {
        if ($payload != null) {
            switch ($payload['fac']) {
                case 'main':
                    $vk->sendButton($peer_id, ' ', [[BTN_BF, BTN_GF, BTN_GL], [BTN_IDPO, BTN_II, BTN_IMO], [BTN_IFK, BTN_IFG, BTN_IH], [BTN_MM, BTN_SF, BTN_FI], [BTN_FNT, BTN_FN, BTN_FNP], [BTN_FPS, BTN_FPPSO, BTN_FF], [BTN_FP, BTN_EF, BTN_UF]]);
                break;
                case 'stu':
                    $vk->sendButton($peer_id, 'Выбери факультет.', [[BTN_BF, BTN_GF, BTN_GL], [BTN_IDPO, BTN_II, BTN_IMO], [BTN_IFK, BTN_IFG, BTN_IH], [BTN_MM, BTN_SF, BTN_FI], [BTN_FNT, BTN_FN, BTN_FNP], [BTN_FPS, BTN_FPPSO, BTN_FF], [BTN_FP, BTN_EF, BTN_UF]]);
                break;
                case 'pre':
                    $task = array('id' => $peer_id, 'stage' => 'pre');
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи фамилию преподавателя', [[BTN_BACK]]);
                break;
                case 'bf':
                    $task = array('id' => $peer_id, 'stage' => 'bf');
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'gf':
                    $task = array('id' => $peer_id, 'stage' => 'gf');
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'gl':
                    $task = array('id' => $peer_id, 'stage' => 'gl');
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'idpo':
                    $task = array('id' => $peer_id, 'stage' => 'idpo');
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'ii':
                    $task = array('id' => $peer_id, 'stage' => 'ii');
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'imo':
                    $task = array('id' => $peer_id, 'stage' => 'imo');
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'ifk':
                    $task = array('id' => $peer_id, 'stage' => 'ifk');
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'ifg':
                    $task = array('id' => $peer_id, 'stage' => 'ifg');
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'ih':
                    $task = array('id' => $peer_id, 'stage' => 'ih');
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'mm':
                    $task = array('id' => $peer_id, 'stage' => 'mm');
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'sf':
                    $task = array('id' => $peer_id, 'stage' => 'sf');
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'fi':
                    $task = array('id' => $peer_id, 'stage' => 'fi');
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'knt':
                    $task = array('id' => $peer_id, 'stage' => 'knt');
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'fn':
                    $task = array('id' => $peer_id, 'stage' => 'fn');
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'fnp':
                    $task = array('id' => $peer_id, 'stage' => 'fnp');
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'fps':
                    $task = array('id' => $peer_id, 'stage' => 'fps');
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'fppso':
                    $task = array('id' => $peer_id, 'stage' => 'fppso');
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'ff':
                    $task = array('id' => $peer_id, 'stage' => 'ff');
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'fp':
                    $task = array('id' => $peer_id, 'stage' => 'fp');
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'ef':
                    $task = array('id' => $peer_id, 'stage' => 'ef');
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'uf':
                    $task = array('id' => $peer_id, 'stage' => 'uf');
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                default:
                break;
            }
        }
    } elseif ($stage == 'pre') {
        $postdata = http_build_query(array('js' => '1', 'search' => $message));
        $opts = array('http' => array('method' => 'POST', 'header' => 'Content-type: application/x-www-form-urlencoded', 'content' => $postdata));
        $context = stream_context_create($opts);
        $result = file_get_contents('https://www.sgu.ru/schedule/teacher/search', false, $context);
        $vk->sendMessage($peer_id, "Введите id преподавателя");
        $res = str_replace(array('[{"id":"id', '"fio": "', '"}]', '",', ''), ' ', $result);
        $res = str_replace('"},{"id":"id', '<br>', $res);
        $vk->sendMessage($peer_id, $res);
        $task = array('id' => $peer_id, 'stage' => 'pre1');
        file_put_contents('files/' . $peer_id . '.json', json_encode($task));
    } elseif ($stage != '0') {
        if ($stage == 'pre1') {
            $vk->genImageT($peer_id, $message);
        } else {
            $vk->genImage($peer_id, $message);
        }
        if ((filesize('img/' . $peer_id . '.png')) > 30000) {
            $vk->sendMessage($peer_id, "Принимай работу :)");
            $vk->sendDocMessage($peer_id, 'img/' . $peer_id . '.png');
            $vk->sendMessage($peer_id, "Не забудь рассказать друзьям о нашем боте!");
            $task = array('id' => $peer_id, 'stage' => '0');
            file_put_contents('files/' . $peer_id . '.json', json_encode($task));
        } else {
            $vk->sendMessage($peer_id, "Ошибка при обработке запроса, попробуйте еще раз.");
        }
        unlink('img/' . $peer_id . '.png');
    }
}
?>
