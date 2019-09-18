<?php

use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
	
	protected $article;

	public function setup(): void
	{
		$this->article = new App\Article;
	}

	public function testTitleIsEmptyByDefault()
	{

		$this->assertEmpty($this->article->title);

	}

	public function testSlugIsEmptyWithNoTitle()
	{

		// do bolean comparison between values
		$this->assertEquals("", $this->article->getSlug());

		// check if values are identical
		$this->assertSame("", $this->article->getSlug());

	}

	/* Individual assertion */
	// public function testSlugHasSpacesReplacedByUnderscore()
	// {
	// 	$this->article->title = "An example article";
	// 	$this->assertEquals("An_example_article", $this->article->getSlug());
	// }

	// public function testSlugHasWhiteSpaceReplaceBySingleUnderscore()
	// {
	// 	$this->article->title = "An     example    \n article";
	// 	$this->assertEquals("An_example_article", $this->article->getSlug());
	// }

	// public function testSlugDoesNotStartOrEndWithUnderscore()
	// {
	// 	$this->article->title = " An example article";
	// 	$this->assertEquals("An_example_article", $this->article->getSlug());
	// }


	// public function testSlugDoesNotHaveAnyNonWordCharacters()
	// {
	// 	$this->article->title = "Read This! Now";
	// 	$this->assertEquals("Read_This_Now", $this->article->getSlug());

	// }

	/**
	* Set method as data provider to testSlug method
	*/
	public function titleProvider()
	{

		return array(
			'SlugHasSpacesReplacedByUnderscore' => array(
				"An example article",
				"An_example_article"
			),
			'SlugHasWhiteSpaceReplaceBySingleUnderscore' => array(
				"An     example    \n article",
				"An_example_article"
			),
			'SlugDoesNotStartOrEndWithUnderscore' => array(
				" An example article",
				"An_example_article"
			),
			'SlugDoesNotHaveAnyNonWordCharacters' => array(
				"Read This! Now",
				"Read_This_Now"
			),
		);

	}

	/**
	* @dataProvider titleProvider
	* user titleProvider method as data provider and ran testslug method
	* [will multiple times depending on titleProvider count]
 	*/
	public function testSlug($title, $slug)
	{

		$this->article->title = $title;

		$this->assertEquals($slug, $this->article->getSlug());

	}

}