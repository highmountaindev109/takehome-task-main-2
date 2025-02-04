<?php

namespace App;

// TODO: Improve the readability of this file through refactoring and documentation.

require_once dirname(__DIR__) . '/globals.php';

class App
{

	private $articlePath;

	public function __construct()
	{
		global $wgBaseArticlePath;
		$this->articlePath = rtrim($wgBaseArticlePath, '/') . '/';
	}

	/**
	 * Save an article to a file
	 *
	 * @param string $title
	 * @param string $body
	 * @return bool
	 */
	public function save(string $title, string $body): bool
	{
		$filePath = $this->articlePath . basename($title);
		return file_put_contents($filePath, $body) !== false;
	}

	/**
	 * Update an existing article (same as save for now)
	 *
	 * @param string $title
	 * @param string $body
	 * @return bool
	 */
	public function update(string $title, string $body): bool
	{
		return $this->save($title, $body);
	}

	/**
	 * Fetch an article's content
	 *
	 * @param array $params
	 * @return string|null
	 */
	public function fetch(array $params): ?string
	{
		$title = $params['title'] ?? null;
		if (!$title) {
			return null;
		}

		$filePath = $this->articlePath . basename($title);
		return file_exists($filePath) ? file_get_contents($filePath) : null;
	}

	/**
	 * Get a list of available articles
	 *
	 * @return array
	 */
	public function getListOfArticles(): array
	{
		return array_diff(scandir($this->articlePath), ['.', '..', '.DS_Store']);
	}
}

