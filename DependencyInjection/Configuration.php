<?php

namespace Dekalee\EnomBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('dekalee_enom');

        $rootNode->children()
            ->scalarNode('uid')->defaultValue('resellid')->end()
            ->scalarNode('password')->defaultValue('resellpw')->end()
            ->scalarNode('base_url')->defaultValue('https://resellertest.enom.com/interface.asp')->end()
        ->end();

        return $treeBuilder;
    }
}
