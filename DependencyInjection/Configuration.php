<?php

namespace dterranova\Bundle\CryptoBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('dterranova_crypto');

        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('temp_folder')
                    ->defaultValue('%kernel.root_dir%/../web')
                    ->cannotBeEmpty()
                    ->info('Set the temp dir')
                ->end()
                ->scalarNode('chunk_file_size')
                    ->defaultValue(1)
                    ->cannotBeEmpty()
                    ->info('Set the chunk file size in Mo')
                ->end()
            ->end()
        ;
        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
