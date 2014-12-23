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

	public function testGetJMSBundle()
	{
		/** @var \JMS\Serializer\Serializer $serializer */
		$serializer = $this->app['jmsserializer'];
		var_dump($serializer);
	}
}
