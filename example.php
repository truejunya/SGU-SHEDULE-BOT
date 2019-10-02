
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
        $task = array('id' => $peer_id, 'stage' => '0');
        file_put_contents('files/' . $peer_id . '.json', json_encode($task));
    }
    $info = json_decode(file_get_contents('files/' . $peer_id . '.json'));
    $stage = $info->{'stage'};
    if (isset($payload['command']) or mb_strtolower($message) == 'привет') {
        $vk->sendButton($peer_id, 'Выбери пункт.', [[BTN_STU, BTN_ZSTU],[BTN_PRE]]);
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
				    if ($stage == 'zao')
					{
					 $task = array('id' => $peer_id, 'stage' => 'bf/zo');	
					}
					else
					{
                    $task = array('id' => $peer_id, 'stage' => 'bf/do');
					}
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'gf':
                   if ($stage == 'zao')
					{
					 $task = array('id' => $peer_id, 'stage' => 'gf/zo');	
					}
					else
					{
                    $task = array('id' => $peer_id, 'stage' => 'gf/do');
					}
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
				case 'zstu':                    
                 $vk->sendButton($peer_id, 'Выбери факультет.', [[BTN_BF, BTN_GF, BTN_GL], [BTN_IDPO, BTN_II, BTN_IMO], [BTN_UF, BTN_IFG,BTN_FNT], [BTN_MM, BTN_SF, BTN_FI], [ BTN_FN,BTN_FP, BTN_EF,], [BTN_FPS, BTN_FPPSO, BTN_FF]]);
               	 $task = array('id' => $peer_id, 'stage' => 'zao');						
                 file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                break;
                case 'gl':
                   if ($stage == 'zao')
					{
					 $task = array('id' => $peer_id, 'stage' => 'gl/zo');	
					}
					else
					{
                    $task = array('id' => $peer_id, 'stage' => 'gl/do');
					}
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'idpo':
                   if ($stage == 'zao')
					{
					 $task = array('id' => $peer_id, 'stage' => 'idpo/zo');	
					}
					else
					{
                    $task = array('id' => $peer_id, 'stage' => 'idpo/do');
					}
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'ii':
                   if ($stage == 'zao')
					{
					 $task = array('id' => $peer_id, 'stage' => 'ii/zo');	
					}
					else
					{
                    $task = array('id' => $peer_id, 'stage' => 'ii/do');
					}
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'imo':
                    if ($stage == 'zao')
					{
					 $task = array('id' => $peer_id, 'stage' => 'imo/zo');	
					}
					else
					{
                    $task = array('id' => $peer_id, 'stage' => 'imo/do');
					}
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'ifk':
                    if ($stage == 'zao')
					{
					 $task = array('id' => $peer_id, 'stage' => 'ifk/zo');	
					}
					else
					{
                    $task = array('id' => $peer_id, 'stage' => 'ifk/do');
					}
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'ifg':
                    if ($stage == 'zao')
					{
					 $task = array('id' => $peer_id, 'stage' => 'ifg/zo');	
					}
					else
					{
                    $task = array('id' => $peer_id, 'stage' => 'ifg/do');
					}
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'ih':
                    if ($stage == 'zao')
					{
					 $task = array('id' => $peer_id, 'stage' => 'ih/zo');	
					}
					else
					{
                    $task = array('id' => $peer_id, 'stage' => 'ih/do');
					};
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'mm':
                    if ($stage == 'zao')
					{
					 $task = array('id' => $peer_id, 'stage' => 'mm/zo');	
					}
					else
					{
                    $task = array('id' => $peer_id, 'stage' => 'mm/do');
					}
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'sf':
                   if ($stage == 'zao')
					{
					 $task = array('id' => $peer_id, 'stage' => 'sf/zo');	
					}
					else
					{
                    $task = array('id' => $peer_id, 'stage' => 'sf/do');
					}
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'fi':
                    if ($stage == 'zao')
					{
					 $task = array('id' => $peer_id, 'stage' => 'fi/zo');	
					}
					else
					{
                    $task = array('id' => $peer_id, 'stage' => 'fi/do');
					}
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'knt':
                    if ($stage == 'zao')
					{
					 $task = array('id' => $peer_id, 'stage' => 'knt/zo');	
					}
					else
					{
                    $task = array('id' => $peer_id, 'stage' => 'knt/do');
					}
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'fn':
                   if ($stage == 'zao')
					{
					 $task = array('id' => $peer_id, 'stage' => 'fn/zo');	
					}
					else
					{
                    $task = array('id' => $peer_id, 'stage' => 'fn/do');
					}
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'fnp':
                    if ($stage == 'zao')
					{
					 $task = array('id' => $peer_id, 'stage' => 'fnp/zo');	
					}
					else
					{
                    $task = array('id' => $peer_id, 'stage' => 'fnp/do');
					}
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'fps':
                    if ($stage == 'zao')
					{
					 $task = array('id' => $peer_id, 'stage' => 'fps/zo');	
					}
					else
					{
                    $task = array('id' => $peer_id, 'stage' => 'fps/do');
					}
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'fppso':
                   if ($stage == 'zao')
					{
					 $task = array('id' => $peer_id, 'stage' => 'fppso/zo');	
					}
					else
					{
                    $task = array('id' => $peer_id, 'stage' => 'fppso/do');
					}
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'ff':
                    if ($stage == 'zao')
					{
					 $task = array('id' => $peer_id, 'stage' => 'ff/zo');	
					}
					else
					{
                    $task = array('id' => $peer_id, 'stage' => 'ff/do');
					}
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'fp':
                     if ($stage == 'zao')
					{
					 $task = array('id' => $peer_id, 'stage' => 'fp/zo');	
					}
					else
					{
                    $task = array('id' => $peer_id, 'stage' => 'fp/do');
					}
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'ef':
                      if ($stage == 'zao')
					{
					 $task = array('id' => $peer_id, 'stage' => 'ef/zo');	
					}
					else
					{
                    $task = array('id' => $peer_id, 'stage' => 'ef/do');
					}
                    file_put_contents('files/' . $peer_id . '.json', json_encode($task));
                    $vk->sendButton($peer_id, 'Введи номер группы', [[BTN_BACK]]);
                break;
                case 'uf':
                   if ($stage == 'zao')
					{
					 $task = array('id' => $peer_id, 'stage' => 'uf/zo');	
					}
					else
					{
                    $task = array('id' => $peer_id, 'stage' => 'uf/do');
					}
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
