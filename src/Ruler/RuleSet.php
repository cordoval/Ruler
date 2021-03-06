<?php

/*
 * This file is part of the Ruler package, an OpenSky project.
 *
 * (c) 2011 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ruler;

use Ruler\Context;

/**
 * A Ruler RuleSet.
 *
 * @author Justin Hileman <justin@shopopensky.com>
 */
class RuleSet
{
    protected $rules = array();

    /**
     * RuleSet constructor.
     *
     * @param array $rules Rules to add to RuleSet
     */
    public function __construct(array $rules = array())
    {
        foreach ($rules as $rule) {
            $this->addRule($rule);
        }
    }

    /**
     * Add a Rule to the RuleSet.
     *
     * Adding duplicate Rules to the RuleSet will have no effect.
     *
     * @param Rule $rule
     */
    public function addRule(Rule $rule)
    {
        $this->rules[spl_object_hash($rule)] = $rule;
    }

    /**
     * Execute all Rules in the RuleSet.
     *
     * @param Context $context
     */
    public function executeRules(Context $context)
    {
        foreach ($this->rules as $rule) {
            $rule->execute($context);
        }
    }
}