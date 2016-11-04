<?php
namespace ApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('api');
        $rootNode->children()
                    ->scalarNode('privateKey')
                        ->isRequired()
                        ->cannotBeEmpty()
                        ->end()
                    ->scalarNode('publicKey')
                        ->isRequired()
                        ->cannotBeEmpty()
                        ->end()
                    ->scalarNode('url')
                        ->isRequired()
                        ->cannotBeEmpty()
                        ->end()
                    ->end();

        // ... add node definitions to the root of the tree

        return $treeBuilder;
    }
}