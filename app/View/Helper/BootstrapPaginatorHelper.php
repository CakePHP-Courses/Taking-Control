<?php

App::uses('PaginatorHelper', 'View/Helper');

class BootstrapPaginatorHelper extends PaginatorHelper {

/**
 * Protected method for generating prev/next links
 *
 * @param string $which
 * @param string $title
 * @param array $options
 * @param string $disabledTitle
 * @param array $disabledOptions
 * @return string
 */
	protected function _pagingLink($which, $title = null, $options = array(), $disabledTitle = null, $disabledOptions = array()) {
		$check = 'has' . $which;
		$_defaults = array(
			'url' => array(), 'step' => 1, 'escape' => true,
			'model' => null, 'tag' => 'li', 'class' => strtolower($which)
		);
		$options = array_merge($_defaults, (array)$options);
		$paging = $this->params($options['model']);
		if (empty($disabledOptions)) {
			$disabledOptions = $options;
		}

		if (!$this->{$check}($options['model']) && (!empty($disabledTitle) || !empty($disabledOptions))) {
			if (!empty($disabledTitle) && $disabledTitle !== true) {
				$title = $disabledTitle;
			}
			$options = array_merge($_defaults, (array)$disabledOptions);
		} elseif (!$this->{$check}($options['model'])) {
			return null;
		}

		foreach (array_keys($_defaults) as $key) {
			${$key} = $options[$key];
			unset($options[$key]);
		}
		if ($this->{$check}($model)) {
			$url = array_merge(array('page' => $paging['page'] + ($which == 'Prev' ? $step * -1 : $step)), $url);
		} else {
			$url = array('#' => '');
		}
		return $this->Html->tag($tag, $this->link($title, $url, array_merge($options, compact('escape'))), compact('class'));
	}

/**
 * Returns a set of numbers for the paged result set
 * uses a modulus to decide how many numbers to show on each side of the current page (default: 8).
 *
 * `$this->Paginator->numbers(array('first' => 2, 'last' => 2));`
 *
 * Using the first and last options you can create links to the beginning and end of the page set.
 *
 * ### Options
 *
 * - `before` Content to be inserted before the numbers
 * - `after` Content to be inserted after the numbers
 * - `model` Model to create numbers for, defaults to PaginatorHelper::defaultModel()
 * - `modulus` how many numbers to include on either side of the current page, defaults to 8.
 * - `separator` Separator content defaults to ' | '
 * - `tag` The tag to wrap links in, defaults to 'span'
 * - `first` Whether you want first links generated, set to an integer to define the number of 'first'
 *    links to generate.
 * - `last` Whether you want last links generated, set to an integer to define the number of 'last'
 *    links to generate.
 * - `ellipsis` Ellipsis content, defaults to '...'
 *
 * @param mixed $options Options for the numbers, (before, after, model, modulus, separator)
 * @return string numbers string.
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/paginator.html#PaginatorHelper::numbers
 */
	public function numbers($options = array()) {
		if ($options === true) {
			$options = array(
				'before' => ' | ', 'after' => ' | ', 'first' => 'first', 'last' => 'last'
			);
		}

		$defaults = array(
			'tag' => 'span', 'before' => null, 'after' => null, 'model' => $this->defaultModel(), 'class' => null,
			'modulus' => '8', 'separator' => ' | ', 'first' => null, 'last' => null, 'ellipsis' => '...',
		);
		$options += $defaults;

		$params = (array)$this->params($options['model']) + array('page' => 1);
		unset($options['model']);

		if ($params['pageCount'] <= 1) {
			return false;
		}

		extract($options);
		unset($options['tag'], $options['before'], $options['after'], $options['model'],
			$options['modulus'], $options['separator'], $options['first'], $options['last'],
			$options['ellipsis'], $options['class']
		);

		$out = '';

		if ($modulus && $params['pageCount'] > $modulus) {
			$half = intval($modulus / 2);
			$end = $params['page'] + $half;

			if ($end > $params['pageCount']) {
				$end = $params['pageCount'];
			}
			$start = $params['page'] - ($modulus - ($end - $params['page']));
			if ($start <= 1) {
				$start = 1;
				$end = $params['page'] + ($modulus  - $params['page']) + 1;
			}

			if ($first && $start > 1) {
				$offset = ($start <= (int)$first) ? $start - 1 : $first;
				if ($offset < $start - 1) {
					$out .= $this->first($offset, compact('tag', 'separator', 'ellipsis', 'class'));
				} else {
					$out .= $this->first($offset, compact('tag', 'separator', 'class') + array('after' => $separator));
				}
			}

			$out .= $before;

			for ($i = $start; $i < $params['page']; $i++) {
				$out .= $this->Html->tag($tag, $this->link($i, array('page' => $i), $options), compact('class'))
					. $separator;
			}

			$currentClass = 'current';
			if ($class) {
				$currentClass .= ' ' . $class;
			}
			$out .= $this->Html->tag($tag, $params['page'], array('class' => $currentClass));
			if ($i != $params['pageCount']) {
				$out .= $separator;
			}

			$start = $params['page'] + 1;
			for ($i = $start; $i < $end; $i++) {
				$out .= $this->Html->tag($tag, $this->link($i, array('page' => $i), $options), compact('class'))
					. $separator;
			}

			if ($end != $params['page']) {
				$out .= $this->Html->tag($tag, $this->link($i, array('page' => $end), $options), compact('class'));
			}

			$out .= $after;

			if ($last && $end < $params['pageCount']) {
				$offset = ($params['pageCount'] < $end + (int)$last) ? $params['pageCount'] - $end : $last;
				if ($offset <= $last && $params['pageCount'] - $end > $offset) {
					$out .= $this->last($offset, compact('tag', 'separator', 'ellipsis', 'class'));
				} else {
					$out .= $this->last($offset, compact('tag', 'separator', 'class') + array('before' => $separator));
				}
			}

		} else {
			$out .= $before;

			for ($i = 1; $i <= $params['pageCount']; $i++) {
				$cls = empty($class) ? null : $class;
				if ($i == $params['page']) {
					$cls .= ' active';
				}
				$out .= $this->Html->tag($tag, $this->link($i, array('page' => $i), $options), array('class' => $cls));
				if ($i != $params['pageCount']) {
					$out .= $separator;
				}
			}

			$out .= $after;
		}

		return $out;
	}
}
