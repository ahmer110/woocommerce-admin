<?php
/**
 * Rule processor that negates the rules in the rule's operand.
 *
 * @package WooCommerce Admin/Classes
 */

namespace Automattic\WooCommerce\Admin\RemoteInboxNotifications;

defined( 'ABSPATH' ) || exit;

/**
 * Rule processor that negates the rules in the rule's operand.
 */
class NotRuleProcessor {
	/**
	 * Constructor.
	 *
	 * @param RuleEvaluator $rule_evaluator The rule evaluator to use.
	 */
	public function __construct( $rule_evaluator ) {
		$this->rule_evaluator = $rule_evaluator;
	}

	/**
	 * Evaluates the rules in the operand and negates the result.
	 *
	 * @param object $rule The specific rule being processed by this rule processor.
	 * @param object $data Remote inbox notificationss data.
	 *
	 * @return bool The result of the operation.
	 */
	public function process( $rule, $data ) {
		$evaluated_operand = $this->rule_evaluator->evaluate(
			$rule->operand,
			$data
		);

		return ! $evaluated_operand;
	}
}
