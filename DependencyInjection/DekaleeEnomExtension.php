<?php

namespace Dekalee\EnomBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class DekaleeEnomExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('dekalee_enom.credentials.uid', $config['uid']);
        $container->setParameter('dekalee_enom.credentials.password', $config['password']);
        $container->setParameter('dekalee_enom.api.base_url', $config['base_url']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('query.yml');

        $bundles = $container->getParameter('kernel.bundles');
        if (!array_key_exists('EightPointsGuzzleBundle', $bundles)) {
            $loader->load('client.yml');
        }
    }

    /**
     * Allow an extension to prepend the extension configurations.
     *
     * @param ContainerBuilder $container
     */
    public function prepend(ContainerBuilder $container)
    {
        $bundles = $container->getParameter('kernel.bundles');

        if (array_key_exists('EightPointsGuzzleBundle', $bundles)) {
            $config = $container->getExtensionConfig('eight_points_guzzle');
            $config[0]['clients']['enom'] = [
                'base_url' => ''
            ];
            $processedConfiguration = $this->processConfiguration(new \EightPoints\Bundle\GuzzleBundle\DependencyInjection\Configuration('eight_points_guzzle'), $config);

            $container->prependExtensionConfig('eight_points_guzzle', $processedConfiguration);
        }
    }
}
