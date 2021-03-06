<?php

namespace homevip;


trait ResponseJson
{


	private $package = array();


	/**
	 * 成功返回
	 *
	 * @param array $data	返回数据内容
	 * @return void
	 */
	public function outSuccess(array $data = [])
	{
		return $this->template(0, config('response_code')[0], $data);
	}


	/**
	 * 异常返回
	 *
	 * @param integer $code 错误码
	 * @return void
	 */
	public function outError(int $code, string $data = NULL)
	{
		return $this->template($code, config('response_code')[$code], [$data]);
	}


	/**
	 * 唯一的(16进制)数字串
	 *
	 * @return void
	 */
	private function trace_id()
	{
		if (!function_exists('uuid_create')) {
			return sprintf(
				'%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
				mt_rand(0, 0xffff),
				mt_rand(0, 0xffff),
				mt_rand(0, 0xffff),
				mt_rand(0, 0x0fff) | 0x4000,
				mt_rand(0, 0x3fff) | 0x8000,
				mt_rand(0, 0xffff),
				mt_rand(0, 0xffff),
				mt_rand(0, 0xffff)
			);
		} else {
			return uuid_create();
		}
	}


	/**
	 * 返回数据模板
	 *
	 * @param [type] $code		错误码
	 * @param [type] $message	成功/错误 消息
	 * @param [type] $data		返回数据内容
	 * @return json
	 */
	private function template(int $code, string $message, array $data)
	{
		$this->package = [
			'code' 		=> $code,
			'msg' 		=> $message,
			'data' 		=> $data,
			'trace_id' 	=> $this->trace_id(),
		];
		return response()
			->json($this->package)
			->setEncodingOptions(JSON_UNESCAPED_UNICODE);
	}
}
