<?php
require_once __DIR__ . "/../php/movieinformation.php";

class movienameextractor extends \PHPUnit_Framework_TestCase
{

	protected $filename;

	public function setUp()
	{
		$this->filename = "Iron.Man.2.2012.3D.1080p";
	}

	public function testForMovie()
	{
		$arr = (getmovieDetails($this->filename));

		//assertion for array output
		$this->assertSame(5,count($arr));

		//assertion for part
		$this->assertSame(2,intval($arr['part']));

		//assertion for resolution
		$this->assertSame("1080p",$arr['resolution']);

		//assertion for year
		$this->assertSame("2012",$arr['year']);

		//assertion for dimension
		$this->assertSame("3D",$arr['dimension']);

		//assertion for name
		$this->assertSame("Iron Man 2",$arr['title']);
	}

	public function testForSeries()
	{
		$this->filename = "Breaking Bad [s2e13]";

		$arr = getmovieDetails($this->filename);

		//assertion for array count
		$this->assertSame(3,count($arr));

		//assertion for season
		$this->assertSame(2,intval($arr['season']));

		//assertion for season episode
		$this->assertSame(13,intval($arr['episode_no']));

		//assertion for serial name
		$this->assertSame("Breaking Bad",$arr['title']);
	}
};