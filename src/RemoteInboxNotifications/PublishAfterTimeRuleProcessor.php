<?php
/**
 * Rule processor for sending after a specified date/time.
 *
 * @package WooCommerce Admin/Classes;
 */

namespace Automattic\WooCommerce\Admin\RemoteInboxNotifications;

defined( 'ABSPATH' ) || exit;

/**
 * Rule processor for sending after a specified date/time.
 */
class PublishAfterTimeRuleProcessor {
	/**
	 * Constructor.
	 *
	 * @param DateTimeProviderInterface $date_time_provider The DateTime provider.
	 */
	public function __construct( $date_time_provider ) {
		$this->date_time_provider = $date_time_provider;
	}

	/**
	 * Process the rule.
	 *
	 * @param object $rule The specific rule being processed by this rule processor.
	 * @param object $data RINDS data.
	 *
	 * @return bool Whether the rule passes or not.
	 */
	public function process( $rule, $data ) {
		return $this->date_time_provider->get_now() >= new \DateTime( $rule->publish_after );
	}
}
