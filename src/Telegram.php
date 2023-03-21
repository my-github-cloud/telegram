<?php

namespace Telegram;

/**
 * Telegram class
 */
class Telegram
{
	protected static $token;
	
	function __construct($token)
	{
		self::$token = $token;
	}

	protected static $actions = [
        'getUpdates',
        'setWebhook',
        'deleteWebhook',
        'getWebhookInfo',
        'getMe',
        'logOut',
        'close',
        'sendMessage',
        'forwardMessage',
        'copyMessage',
        'sendPhoto',
        'sendAudio',
        'sendDocument',
        'sendSticker',
        'sendVideo',
        'sendAnimation',
        'sendVoice',
        'sendVideoNote',
        'sendMediaGroup',
        'sendLocation',
        'editMessageLiveLocation',
        'stopMessageLiveLocation',
        'sendVenue',
        'sendContact',
        'sendPoll',
        'sendDice',
        'sendChatAction',
        'getUserProfilePhotos',
        'getFile',
        'banChatMember',
        'unbanChatMember',
        'restrictChatMember',
        'promoteChatMember',
        'setChatAdministratorCustomTitle',
        'banChatSenderChat',
        'unbanChatSenderChat',
        'setChatPermissions',
        'exportChatInviteLink',
        'createChatInviteLink',
        'editChatInviteLink',
        'revokeChatInviteLink',
        'approveChatJoinRequest',
        'declineChatJoinRequest',
        'setChatPhoto',
        'deleteChatPhoto',
        'setChatTitle',
        'setChatDescription',
        'pinChatMessage',
        'unpinChatMessage',
        'unpinAllChatMessages',
        'leaveChat',
        'getChat',
        'getChatAdministrators',
        'getChatMemberCount',
        'getChatMember',
        'setChatStickerSet',
        'deleteChatStickerSet',
        'getForumTopicIconStickers',
        'createForumTopic',
        'editForumTopic',
        'closeForumTopic',
        'reopenForumTopic',
        'deleteForumTopic',
        'unpinAllForumTopicMessages',
        'answerCallbackQuery',
        'answerInlineQuery',
        'setMyCommands',
        'deleteMyCommands',
        'getMyCommands',
        'setChatMenuButton',
        'getChatMenuButton',
        'setMyDefaultAdministratorRights',
        'getMyDefaultAdministratorRights',
        'editMessageText',
        'editMessageCaption',
        'editMessageMedia',
        'editMessageReplyMarkup',
        'stopPoll',
        'deleteMessage',
        'getStickerSet',
        'getCustomEmojiStickers',
        'uploadStickerFile',
        'createNewStickerSet',
        'addStickerToSet',
        'setStickerPositionInSet',
        'deleteStickerFromSet',
        'setStickerSetThumb',
        'answerWebAppQuery',
        'sendInvoice',
        'createInvoiceLink',
        'answerShippingQuery',
        'answerPreCheckoutQuery',
        'setPassportDataErrors',
        'sendGame',
        'setGameScore',
        'getGameHighScores',
    ];
  
    public static function __callStatic($name, $arguments)
    {
    	try {
    		if(!in_array($name, self::$actions) || count($arguments[0]) == 0) return json_encode(['result'=>false,'message'=>"Method not found!"]);
           
            return self::request($name,$arguments[0]);
    	} catch (Exception $e) {
    		throw new Exception("Error Processing Request! Message: ".$e->getMessage(), 1);
    	}
    }

    public static function request($method,$data = [])
    {
    	try {
    		if(count($data) == 0) return false;
    		$client = new \GuzzleHttp\Client();

            $result = $client->post(
              'https://api.telegram.org/bot'.self::$token.'/'.$method,
               [
                 'form_params' => $data
               ]
             );

          if($result->getStatusCode() !== 200) return false;

          return $result;
    	} catch (Exception $e) {
    		throw new Exception("Error Processing Request! Message: ".$e->getMessage(), 1);
    		
    	}
      
    }


}