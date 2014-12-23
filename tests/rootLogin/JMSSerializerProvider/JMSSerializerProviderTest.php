<?php

namespace rootLogin\Tests\JMSSerializerProvider;

use Silex\Application;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use rootLogin\JMSSerializerProvider\JMSSerializerProvider;

class JMSSerializerProviderTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var \Silex\Application
	 */
	protected $app;

	public function __construct()
	{
		// Build Sample Application
		$this->app = new Application();
		$this->app->register(new JMSSerializerProvider());
	}

	public function testJMSBundle()
	{
		/** @var \JMS\Serializer\Serializer $serializer */
		$serializer = $this->app['jmsserializer'];

		$this->assertInstanceOf('JMS\Serializer\Serializer', $serializer);
	}

	public function testDefaults()
	{
		$this->assertEquals(null, $this->app['jmsserializer.cache_dir']);
		$this->assertEquals(null, $this->app['jmsserializer.metadata_dir']);
		$this->assertEquals(false, $this->app['jmsserializer.debug']);
	}
}
