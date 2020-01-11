<?php

/**
 * Hooking Class
 *
 * @package Codeigniter
 * @author Yvo van Dillen
 * @copyright 2012
 * @version $Id$
 * @access public
 */

class Hooking
{
    private $_actions; // array with actions
    public $_filters; // array with filters

    /**
     * Hooking::__construct()
     *
     * @return void
     */
    function __construct()
    {
        $this->_actions = array();
        $this->_filters = array();
    }

    /**
     * Hooking::add_action()
     *
     * Adds (registers) an action with a custom function and desired priority
     * e.g.
     * add_action('after_welcome_title', array($this, 'after_welcome_title'));
     *
     * function after_welcome_title() {
   	 *     echo '<h2>This is my subtitle</h2>';
   	 * }
     *
     * @param string $name The name of the action to perform the action on
     * @param function $callback The function to call when the action is triggered
     * @param integer $priority The priority to execute (default = 50)
     * @return void
     */
    public function add_action($name, $callback, $priority = 50)
    {
        if (is_callable($callback))
        {
            $this->_actions[$name][] = array(
            	'callback' => $callback,
				'priority' => $priority,
			);
			usort($this->_actions[$name], array($this, '_usort'));
        }
    }

    /**
     * Hooking::remove_action()
     *
     * Removes the action from the list
     *
     * @param string $name The name of the action to perform the action on
     * @param function $callback The function to call when the action is triggered
     * @return void
     */
    public function remove_action($name, $callback)
    {
    	if (isset($this->_actions[$name]))
    	{
    		foreach($this->_actions[$name] as $key => $action)
			{
				if ($action['callback'] == $callback)
				{
					unset($this->_actions[$name][$key]);
					return;
				}
    		}
 		}
    }

    /**
     * Hooking::do_action()
     *
     * Calls the actual action (usually placed in a view)
     *
     * @param string $name The name of the action to execute
     * @param array  $args The list of parameters to pass on to the action (optional)
     * @return
     */
    public function do_action($name, $args = array())
    {
        if (isset($this->_actions[$name]) && is_array($this->_actions[$name]))
        {
            foreach ($this->_actions[$name] as $key => $action)
            {
                call_user_func_array($action['callback'], $args);
            }
        }
    }

    /**
     * Hooking::add_filter()
     *
     * Adds (registers) a filter with a custom function and desired priority
     * e.g.
     * add_filter('welcome_title', array($this, 'welcome_title'));
     *
     * function welcome_title($title) {
   	 *     return $title . '(this title is filtered)';
     * }
     *
     * @param string $name The name of the filter
     * @param function $callback The function to call when the filter is triggered
     * @param integer $priority The priority to execute (default = 50)
     * @return void
     */
    public function add_filter($name, $callback, $priority = 50)
    {
        if (is_callable($callback))
        {
            $this->_filters[$name][] = array(
            	'callback' => $callback,
				'priority' => $priority,
			);
			usort($this->_filters[$name], array($this, '_usort'));
        }
    }

    /**
     * Hooking::remove_filter()
     *
     * Removes the filter from the call-stack
     *
     * @param string $name The name of the filter
     * @param function $callback The function to call when the filter is triggered
     * @return void
     */
    public function remove_filter($name, $callback)
    {
        if (isset($this->_filters[$name]))
    	{
    		foreach($this->_filters[$name] as $key => $filter)
			{
				if ($filter['callback'] == $callback)
				{
					unset($this->_filters[$name][$key]);
					return;
				}
    		}
 		}
    }

    /**
     * Hooking::do_filter()
     *
     * Calls the actual filter (usually placed in a view)
     * e.g.
     * <h1><?php echo do_filter('welcome_title', 'Welcome to Codeigniter'); ?></h1>
     *
     * @param string $name The name of the action to execute
     * @param array  $args The list of parameters to pass on to the action (optional)
     * @return string
     */
    public function do_filter($name, $value = '')
    {
        $result = $value;
        if (isset($this->_filters[$name]) && is_array($this->_filters[$name]))
        {
            foreach ($this->_filters[$name] as $key => $filter)
            {
                $result = call_user_func($filter['callback'], $result);
            }
        }
        return $result;
    }

    /**
     * Hooking::_usort()
     *
	 * Private callback function for the usort function called by the add_xxx functions
     *
     * @param array $a action or filter
     * @param array $b action or filter
     * @return integer comparision
     */
    private function _usort($a, $b)
    {
    	if (isset($a['priority']) && isset($b['priority']))
    	{
    		$priority1 = (int)$a['priority'];
    		$priority2 = (int)$b['priority'];

    		if ($priority1 < $priority2)
    		{
    			return -1;
    		}
    		else if ($priority1 > $priority2)
    		{
    			return 1;
    		}
    	}
    	return 0;
    }
}
 