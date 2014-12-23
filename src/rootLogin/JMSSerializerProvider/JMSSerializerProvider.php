<?php

namespace rootLogin\JMSSerializerProvider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class JMSSerializerProvider implements ServiceProviderInterface
{
  public function register(Application $app)
  {
    foreach ($this->getDefaults() as $key => $value) {
      if (!isset($app[$key])) {
        $app[$key] = $value;
      }
    }

    $app["jmsserializer"] = $app->share(function() use ($app) {
      $jmss = \JMS\Serializer\SerializerBuilder::create();
      if($app["jmsserializer.cache_dir"] != null) {
        $jmss->setCacheDir($app["jmsserializer.cache_dir"]);
      }
      if($app["jmsserializer.debug"] == true) {
        $jmss->setDebug(true);
      }
      if($app["jmsserializer.metadata_dir"] != null) {
        $jmss->addMetadataDir($app["jmsserializer.metadata_dir"]);
      }

      return $jmss->build();
    });
  }

  public function boot(Application $app) {}

  public function getDefaults() {
    return array(
      "jmsserializer.cache_dir" => null,
      "jmsserializer.debug" => false,
      "jmsserializer.metadata_dir" => null
    );
  }
}
